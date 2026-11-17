<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_ujian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['materi_id', 'nama_ujian', 'durasi_menit', 'tanggal_mulai', 'tanggal_selesai'];

    // Ambil jadwal beserta nama materinya menggunakan JOIN
    public function getJadwalWithMateri()
    {
        return $this->select('jadwal_ujian.*, materi.nama_materi')
                    ->join('materi', 'materi.id = jadwal_ujian.materi_id')
                    ->findAll();
    }
}