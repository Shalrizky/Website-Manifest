<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientSyaksiahModel extends Model
{
    protected $table = 'client_syaksiah';
    protected $primaryKey = 'id_client_syaksiah';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = ['nama_client_syaksiah'];

    public function getClient()
    {
       return $this->db->table($this->table)->get()->getResult();
    }

    public function getIdClient($id)
    {
        return $this->db->table($this->table)->where('id_customer', $id)->get()->getRow();
    }
}
