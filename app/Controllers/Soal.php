<?php namespace App\Controllers;

use App\Models\SoalModel;
use App\Models\MateriModel;

class Soal extends BaseController
{
    protected $soalModel;
    protected $materiModel;

    public function __construct()
    {
        $this->soalModel = new SoalModel();
        $this->materiModel = new MateriModel();

        // VALIDASI KEAMANAN: Cek apakah user sudah login dan rolenya admin
        // Jika belum, langsung lempar ke halaman login!
        if (session()->get('role') != 'admin') {
            header('Location: ' . base_url('/login'));
            exit();
        }
    }

    public function index()
    {
        // Ambil data soal beserta nama materinya menggunakan JOIN
        $data['soal'] = $this->soalModel->select('bank_soal.*, materi.nama_materi')
                                      ->join('materi', 'materi.id = bank_soal.materi_id')
                                      ->findAll();
        return view('soal/index', $data);
    }

    public function create()
    {
        $data['materi'] = $this->materiModel->findAll();
        return view('soal/create', $data);
    }

    public function store()
    {
        $this->soalModel->save([
            'materi_id'     => $this->request->getPost('materi_id'),
            'pertanyaan'    => $this->request->getPost('pertanyaan'),
            'tipe_soal'     => $this->request->getPost('tipe_soal'),
            'pilihan_a'     => $this->request->getPost('pilihan_a'),
            'pilihan_b'     => $this->request->getPost('pilihan_b'),
            'pilihan_c'     => $this->request->getPost('pilihan_c'),
            'pilihan_d'     => $this->request->getPost('pilihan_d'),
            'kunci_jawaban' => $this->request->getPost('kunci_jawaban'),
        ]);

        return redirect()->to('/soal')->with('success', 'Soal berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $this->soalModel->delete($id);
        return redirect()->to('/soal')->with('success', 'Soal berhasil dihapus!');
    }
}