<?php

namespace App\Models;

use CodeIgniter\Model;

class CabangModel extends Model
{
    protected $table      = 'cabang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['sandi_ktr', 'nama_ktr', 'jenis'];
}
