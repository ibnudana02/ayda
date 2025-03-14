<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table      = 'fasilitas';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kdaset', 'kdfasilitas', 'nilai'];
}
