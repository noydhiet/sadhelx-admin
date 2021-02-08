<?php namespace App\Models;

use CodeIgniter\Model;

class GuidelinesModel extends Model
{
    protected $table = "guideline";

    public function getGuidelines($id = false)
    {
        if($id === false){
            return $this->table('guidelines')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('guidelines')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function insert_Guidelines($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_Guidelines($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function delete_Guidelines($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}