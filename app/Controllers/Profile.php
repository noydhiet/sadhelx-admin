<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Notification;
use App\Models\ModUsers;

class Profile extends Controller
{
	
		protected $helpers = ['form','date'];
		protected $session = null;
		protected $request = null;
	
		public function __construct()
		{
			$this->session = session();
			$this->request = \Config\Services::request();
			$this->notif = new Notification();
			$this->moduser = model('App\Models\ModUsers');
		}
	public function index()
	{ 
		$session = session();	
        $data = array(	'title'		=> 'Data',
						'user'		=> $session,
						'content'	=> 'admin/profile/index');
		return view('admin/_partials/wrapper',$data);
        
    }

}