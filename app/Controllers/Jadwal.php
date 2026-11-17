<?php namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\MateriModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $materiModel;

    public function __construct()
    {
        // Validasi keamanan login admin
        if (session()->get('role') != 'admin') {
            header('Location: ' . base_url('/login'));
            exit();
        }

        // INI YANG SEBELUMNYA TERLEWAT: Inisialisasi model
        $this->jadwalModel = new JadwalModel();
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $data['jadwal'] = $this->jadwalModel->getJadwalWithMateri();
        return view('jadwal/index', $data);
    }

    public function create()
    {
        $data['materi'] = $this->materiModel->findAll();
        return view('jadwal/create', $data);
    }

    public function store()
    {
        $this->jadwalModel->save([
            'materi_id'       => $this->request->getPost('materi_id'),
            'nama_ujian'      => $this->request->getPost('nama_ujian'),
            'durasi_menit'    => $this->request->getPost('durasi_menit'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
        ]);

        return redirect()->to('/jadwal')->with('success', 'Jadwal ujian berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/jadwal')->with('success', 'Jadwal ujian berhasil dihapus!');
    }
}