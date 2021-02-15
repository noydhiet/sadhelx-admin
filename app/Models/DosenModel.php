<?php namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = "dosen";
    protected $primaryKey = 'id_dosen';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    public function getDosen($id = false)
    {        
        if($id === false){
            return $this->table('id_dosen')
            ->get()
            ->getResultArray();
        } else {
            return $this->table('id_dosen')
                        ->where('guidelines_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
}