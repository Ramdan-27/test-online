<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Cek password (menggunakan password_verify standar)
            if (password_verify($password, $user['password'])) {
                $sesData = [
                    'id'        => $user['id'],
                    'nama'      => $user['nama'],
                    'email'     => $user['email'],
                    'role'      => $user['role'],
                    'logged_in' => TRUE
                ];
                $session->set($sesData);

                if ($user['role'] == 'admin') {
                    return redirect()->to('/materi');
                } else {
                    return redirect()->to('/dashboard-peserta');
                }
            } else {
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $this->userModel->save([
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'peserta' // Default daftar sebagai peserta
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
// Menampilkan halaman lupa sandi
    public function lupaSandi()
    {
        return view('auth/lupa_sandi');
    }

    // Memproses pembaruan password baru
    // Memproses pembaruan password baru
    public function prosesLupaSandi()
    {
        $email = $this->request->getPost('email'); // Menangkap input name="email"
        $passwordBaru = $this->request->getPost('password_baru');

        $userModel = new \App\Models\UserModel();
        
        // Cari user berdasarkan kolom 'email'
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Update password baru ke database
            $userModel->update($user['id'], [
                'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
            ]);

            return redirect()->to('/login')->with('success', 'Password berhasil diubah! Silakan login dengan password baru.');
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan di database! Pastikan email sudah terdaftar.');
        }
    }
}