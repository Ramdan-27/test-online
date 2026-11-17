<?php namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\SoalModel;
use App\Models\HasilModel;

class Ujian extends BaseController
{
    protected $jadwalModel;
    protected $soalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->soalModel = new SoalModel();
    }

    public function index()
    {
        if (session()->get('role') != 'peserta') {
            return redirect()->to('/login');
        }

        $data['jadwal'] = $this->jadwalModel->getJadwalWithMateri();
        return view('ujian/index', $data);
    }

    public function kerjakan($jadwal_id)
    {
        if (session()->get('role') != 'peserta') {
            return redirect()->to('/login');
        }

        $jadwal = $this->jadwalModel->find($jadwal_id);
        $tipe_pilihan = $this->request->getGet('tipe');

        // JIKA BELUM MEMILIH TIPE SOAL, arahkan ke halaman pilih tipe dulu
        if (empty($tipe_pilihan)) {
            $data['jadwal'] = $jadwal;
            return view('ujian/pilih_tipe', $data);
        }

        // JIKA SUDAH MEMILIH, ambil soal sesuai tipenya
        $soalModel = new \App\Models\SoalModel();
        $builder = $soalModel->where('materi_id', $jadwal['materi_id']);

        if ($tipe_pilihan == 'pg') {
            $builder->where('tipe_soal', 'pg');
        } elseif ($tipe_pilihan == 'esai') {
            $builder->where('tipe_soal', 'esai');
        }

        $data['jadwal'] = $jadwal;
        $data['soal'] = $builder->findAll();
        $data['tipe_pilihan'] = $tipe_pilihan;

        return view('ujian/kerjakan', $data);
    }

    public function submit()
    {
        if (session()->get('role') != 'peserta') {
            return redirect()->to('/login');
        }

        $session = session();
        $user_id = $session->get('id');
        $user_email = $session->get('email');
        $user_nama = $session->get('nama');

        $jadwal_id = $this->request->getPost('jadwal_id');
        $soal_ids = $this->request->getPost('soal_id');
        $jawabans = $this->request->getPost('jawaban');
        $tipe_soals = $this->request->getPost('tipe_soal');

        $soalModel = new \App\Models\SoalModel();
        $hasilModel = new \App\Models\HasilModel();

        $jumlah_benar = 0;
        $jumlah_salah = 0;
        $soal_benar_list = [];
        $soal_salah_koreksi = [];

        foreach ($soal_ids as $s_id) {
            $soal = $soalModel->find($s_id);
            $jawaban_peserta = isset($jawabans[$s_id]) ? trim(strtoupper($jawabans[$s_id])) : '';
            $kunci = trim(strtoupper($soal['kunci_jawaban']));

            // Cek benar/salah sederhana
            if ($jawaban_peserta == $kunci) {
                $jumlah_benar++;
                $soal_benar_list[] = $soal;
            } else {
                $jumlah_salah++;
                // Simulasi koreksi AI untuk soal salah
                $soal_salah_koreksi[] = [
                    'pertanyaan' => $soal['pertanyaan'],
                    'jawaban_kamu' => $jawaban_peserta ?: '(Tidak diisi)',
                    'kunci_benar' => $soal['kunci_jawaban'],
                    'analisis_ai' => 'Analisis AI: Kamu keliru karena kurang teliti pada konsep dasar. Seharusnya perhatikan kembali materi terkait.'
                ];
            }
        }

        $total_soal = count($soal_ids);
        $nilai_mentah = ($total_soal > 0) ? ($jumlah_benar / $total_soal) * 100 : 0;
        
        // SEDERHANAKAN NILAI: Bulatkan menjadi 2 angka dibelakang koma (contoh: 66.67) 
        // atau gunakan round($nilai_mentah) jika ingin bilangan bulat (67)
        $nilai = round($nilai_mentah, 2);
        // Simpan ke database hasil ujian
        $hasilModel->save([
            'user_id' => $user_id,
            'jadwal_id' => $jadwal_id,
            'jumlah_benar' => $jumlah_benar,
            'jumlah_salah' => $jumlah_salah,
            'nilai' => $nilai
        ]);

        // Kirim Email Rekap Belajar (Menggunakan Email Library bawaan CI4)
        $email = \Config\Services::email();
        $email->setTo($user_email);
        $email->setSubject('Hasil Evaluasi & Bahan Belajar Ujian Online');

        $pesanEmail = "Halo $user_nama,\n\nTertera hasil ujianmu:\n";
        $pesanEmail .= "Nilai: $nilai\nBenar: $jumlah_benar | Salah: $jumlah_salah\n\n";
        $pesanEmail .= "=== SOAL YANG DIJAWAB BENAR (UNTUK BAHAN BELAJAR) ===\n";
        foreach ($soal_benar_list as $b) {
            $pesanEmail .= "- Pertanyaan: {$b['pertanyaan']}\n  Kunci: {$b['kunci_jawaban']}\n\n";
        }

        $pesanEmail .= "=== KOREKSI AI UNTUK JAWABAN SALAH ===\n";
        foreach ($soal_salah_koreksi as $k) {
            $pesanEmail .= "- {$k['pertanyaan']}\n  Jawabanmu: {$k['jawaban_kamu']} | Kunci: {$k['kunci_benar']}\n  {$k['analisis_ai']}\n\n";
        }

        $email->setMessage($pesanEmail);
        @$email->send(); // Kirim email (mengabaikan error jika server local belum setup SMTP)

        return redirect()->to('/ujian')->with('success', "Ujian selesai! Nilai kamu: $nilai. Ringkasan hasil telah dikirim ke email.");
    }
}