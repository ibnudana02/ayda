<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table      = 'aplikasi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_pt', 'nm_aplikasi', 'fnama_aplikasi',
        'email_pt', 'telp_pt', 'logo', 'alamat_pt'
    ];
}
