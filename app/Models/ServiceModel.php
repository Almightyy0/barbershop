<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table      = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['nama', 'deskripsi', 'harga', 'foto'];

    
    
}