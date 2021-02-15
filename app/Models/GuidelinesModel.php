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
    public function getGuidelinesById ($guidelines_id)
    {
        return $this->db->table('tbl_mstr_guidelines', array('guidelines_id'=>$guidelines_id));
         
    }

    public function register($identity, $password, $email, $additional_data = [], $groups = [])
	{
		$this->trigger_events('pre_register');

		$manual_activation = $this->config->item('manual_activation', 'ion_auth');

		if ($this->identity_check($identity))
		{
			$this->set_error('account_creation_duplicate_identity');
			return FALSE;
		}
		else if (!$this->config->item('default_group', 'ion_auth') && empty($groups))
		{
			$this->set_error('account_creation_missing_default_group');
			return FALSE;
		}

		// check if the default set in config exists in database
		$query = $this->db->get_where($this->tables['groups'], ['name' => $this->config->item('default_group', 'ion_auth')], 1)->row();
		if (!isset($query->id) && empty($groups))
		{
			$this->set_error('account_creation_invalid_default_group');
			return FALSE;
		}

		// capture default group details
		$default_group = $query;

		// IP Address
		$ip_address = $this->input->ip_address();

		// Do not pass $identity as user is not known yet so there is no need
		$password = $this->hash_password($password);

		if ($password === FALSE)
		{
			$this->set_error('account_creation_unsuccessful');
			return FALSE;
		}

		// Users table.
		$data = [
			$this->identity_column => $identity,
			'username' => $identity,
			'password' => $password,
			'email' => $email,
			'ip_address' => $ip_address,
			'created_on' => time(),
			'active' => ($manual_activation === FALSE ? 1 : 0)
		];

		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$user_data = array_merge($this->_filter_data($this->tables['users'], $additional_data), $data);

		$this->trigger_events('extra_set');

		$this->db->insert($this->tables['users'], $user_data);

		$id = $this->db->insert_id($this->tables['users'] . '_id_seq');

		// add in groups array if it doesn't exists and stop adding into default group if default group ids are set
		if (isset($default_group->id) && empty($groups))
		{
			$groups[] = $default_group->id;
		}

		if (!empty($groups))
		{
			// add to groups
			foreach ($groups as $group)
			{
				$this->add_to_group($group, $id);
			}
		}

		$this->trigger_events('post_register');

		return (isset($id)) ? $id : FALSE;
	}
}