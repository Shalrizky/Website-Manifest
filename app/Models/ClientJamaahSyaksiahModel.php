<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientJamaahModel extends Model
{
    protected $table = 'client_jamaah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_client_syaksiah', 'id_jamaah_syaksiah'];
}
