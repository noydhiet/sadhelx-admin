<?php namespace App\Models;

use CodeIgniter\Model;

class GuidelinesModel extends Model
{
    protected $table = "tbl_mstr_guidelines";
    protected $primaryKey = 'guidelines_id';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    public function getGuidelines($id = false)
    {

        
        if($id === false){
            return $this->table('tbl_mstr_guidelines')
            ->get()
            ->getResultArray();
        } else {
            return $this->table('tbl_mstr_guidelines')
                        ->where('guidelines_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    public function simpan($i,$n,$f){
		$hasil=$this->db->query("INSERT INTO guideline ('id', 'name', 'file')VALUES('$i','$n','$f')");
		return $hasil;
	}
    public function insert_Guidelines($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_Guidelines($data, $guidelines_id)
    {
        return $this->db->table($this->table)->update($data, ['guidelines_id' => $guidelines_id]);
    }

    public function delete_Guidelines($guidelines_id)
    {
        return $this->db->table($this->table)->delete(['guidelines_id' => $guidelines_id]);
    }
}