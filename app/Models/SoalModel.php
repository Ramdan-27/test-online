<?php namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'bank_soal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['materi_id', 'tipe_soal', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'kunci_jawaban'];

    // Fungsi untuk mengambil soal beserta nama materinya menggunakan JOIN
    function getSoalWithMateri()
    {
        return $this->select('bank_soal.*, materi.nama_materi')
                    ->join('materi', 'materi.id = bank_soal.materi_id')
                    ->findAll();
    }
}