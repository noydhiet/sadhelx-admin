<?php namespace App\Models;

use CodeIgniter\Model;

class ModUsers extends Model
{
    protected $table = "users";
    protected $primaryKey = 'user_id';
	protected $allowedFields = ['user_level','username','password','active'];


	public function detail($id)
	{
		$this->select('*');
		$this->where(array(	'user_id'	=> $id));
		$query = $this->get();
		return $query->getRowArray();
	}

}