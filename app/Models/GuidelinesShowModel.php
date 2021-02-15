<?php namespace App\Models;

use CodeIgniter\Model;

class GuidelinesShowModel extends Model
{
    protected $table = "tbl_trx_active_guidelines";
    protected $primaryKey = 'active_id';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    public function getStatusShowGuidelines($id = false)
    {        
        if($id === false){
            return $this->table('tbl_trx_active_guidelines')
            ->get()
            ->getResultArray();
        } else {
            return $this->table('tbl_trx_active_guidelines')
                        ->where('active_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    
    public function simpan($i,$n,$f){
		$hasil=$this->db->query("INSERT INTO guideline ('id', 'name', 'file')VALUES('$i','$n','$f')");
		return $hasil;
	}
    public function insert_active_guidelines($data)
    {
        // $test = $this->db->table($this->table)->insert($data);
        // echo "<pre>";
        // print_r($test);die;
        $this->where(array(	'user_id'	=> $data));
        return $this->db->table($this->table)->insert($data);
    }

    public function update_Guidelines($data, $active_id)
    {
        return $this->db->table($this->table)->update($data, ['active_id' => $active_id]);
    }

    public function delete_Guidelines($active_id)
    {
        return $this->db->table($this->table)->delete(['active_id' => $active_id]);
    }
}