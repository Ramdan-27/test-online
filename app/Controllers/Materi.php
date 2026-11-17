<?php namespace App\Controllers;

use App\Models\MateriModel;

class Materi extends BaseController
{
    protected $materiModel;

    public function __construct()
    {
        // Validasi keamanan login admin
        if (session()->get('role') != 'admin') {
            header('Location: ' . base_url('/login'));
            exit();
        }

        // INI YANG KURANG: Inisialisasi model materi
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $data['materi'] = $this->materiModel->findAll();
        return view('materi/index', $data);
    }

    public function create()
    {
        return view('materi/create');
    }

    public function store()
    {
        $this->materiModel->save([
            'nama_materi' => $this->request->getPost('nama_materi'),
            'deskripsi'   => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/materi')->with('success', 'Materi berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $this->materiModel->delete($id);
        return redirect()->to('/materi')->with('success', 'Materi berhasil dihapus!');
    }
}