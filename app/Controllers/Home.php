<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{

	public function index()
	{ 
		$session = session();
        $data = array(	'title'		=> 'Data',
						'content'	=> 'welcome_message');
		return view('admin/_partials/wrapper',$data);
        
    }

}
