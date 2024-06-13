<?php

namespace App\Models;

use CodeIgniter\Model;

class BarberModel extends Model
{
    protected $table      = 'barber';
    protected $primaryKey = 'id_barber';
    protected $allowedFields = ['nama', 'alamat', 'foto', 'id_akun'];

    
    
}