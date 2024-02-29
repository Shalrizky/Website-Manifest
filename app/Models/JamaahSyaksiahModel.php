<?php 
namespace App\Models;

use CodeIgniter\Model;

class JamaahSyaksiahModel extends Model
{
    protected $table = 'jamaah_syaksiah';
    protected $primaryKey = 'id_jamaah_syaksiah';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $allowedFields = [
      'nama_jamaah_syaksiah', 
      'jenis_kelamin', 
      'no_passpor', 
      'tanggal_lahir', 
      'expired_passpor', 
      'created_at', 
      'vfs', 
      'status_visa', 
      'status_passpor', 
      'request', 
      'id_mustanad', 
      'mustanad', 
      'no_enjaz', 
      'no_visa'
   ];
}
