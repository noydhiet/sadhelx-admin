<?php namespace App\Models;

use CodeIgniter\Model;

class ModUsers extends Model
{
    protected $table = "users";
    protected $primaryKey = 'user_id';
	protected $allowedFields = ['user_level','username','password','active'];

	public function __construct()
	{
    }
    public function detail($user_id)
	{
		$this->select('*');
		$this->where(array(	'user_id'	=> $user_id));
		$query = $this->get();
		return $query->getRowArray();
	}

}