<?php namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\MateriModel;

class Dashboard extends BaseController
{
    public function peserta()
    {
        if (session()->get('role') != 'peserta') {
            return redirect()->to('/login');
        }

        $jadwalModel = new JadwalModel();
        $materiModel = new MateriModel();

        // Tangkap input filter materi dari dropdown (jika ada)
        $materi_id = $this->request->getGet('materi_id');

        if (!empty($materi_id)) {
            // Ambil jadwal berdasarkan materi yang dipilih
            $jadwal = $jadwalModel->select('jadwal_ujian.*, materi.nama_materi')
                                  ->join('materi', 'materi.id = jadwal_ujian.materi_id')
                                  ->where('jadwal_ujian.materi_id', $materi_id)
                                  ->findAll();
        } else {
            // Ambil semua jadwal jika tidak ada filter
            $jadwal = $jadwalModel->getJadwalWithMateri();
        }

        $data['jadwal'] = $jadwal;
        $data['materi'] = $materiModel->findAll(); // Untuk pilihan di dropdown
        $data['selected_materi'] = $materi_id;

        return view('dashboard/peserta', $data);
    }
}