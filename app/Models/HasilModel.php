<?php namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil_ujian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'jadwal_id', 'jumlah_benar', 'jumlah_salah', 'nilai'];
}