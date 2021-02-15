<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GuidelinesModel;
use App\Models\GuidelinesShowModel;

class Guidelines extends Controller
{
	public function __construct()
	{
		$this->session = session();
		
	}
    public function index()
    {

        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines();
        $data = array(	'title'		=> 'Data',
                        'guideline'	=> $guideline,
						'content'	=> 'admin/guide/index');
		return view('admin/_partials/wrapper',$data);
        
    }
    public function statusshow()
	{             
        $model = new GuidelinesShowModel();
		$guidelinestatusshow = $model->getStatusShowGuidelines();
        $data = array(	'title'		=> 'Data',
                        'guidelinestatusshow'	=> $guidelinestatusshow,
						'content'	=> 'admin/guide/statusshow');
		return view('admin/_partials/wrapper',$data);
        
    }
    public function create_active($id)
    {
        $session = session($id);	
        $model = new GuidelinesShowModel();
        $data = array(
            'active_id' => $id,
            'activated_by'	=> $session,
            'active_date' => date("Y-m-d"),
            'fk_guidelines_id'  => $id,
        );
        $model->insert_active_guidelines($data);
        return redirect()->to(base_url('guidelines'))->with('berhasil', 'Data Berhasil di Simpan');

        // $model->insert_active_guidelines($data);
       
        // echo "<pre>";
        // print_r($data);
        // // $model->insert_Guidelines($data);  
        // // $db->insert('tbl_trx_active_guidelines',$data); 
        // $save = $this->db->table('tbl_trx_active_guidelines')->insert($data);
        // print_r($save);die;
        // $builder->insert($data);
        // echo $db->last_query();die;
        // $model->insert_active_guidelines($data);

            // $fk_guidelines_id = $this->request->getPost('fk_guidelines_id', true);

            // $model = new GuidelinesModel();
            // $data = $model->getGuidelinesById($fk_guidelines_id);
            // $guidelines_name = explode(' ', $model->guidelines_name);
            // $active_id = $guidelines_name[0];
           
            
            // $username = $model->nip;
            // $password = $model->nip;
            // $email = $model->email;
            // $additional_data = [
            //     'active_id'	=> $active_id,
            // ];


            // $group = array('2'); // Sets user to dosen.
    
          
            
            //     $model->register($username, $password, $email, $additional_data, $group);
            //     $data = [
            //         'status'	=> true,
            //         'msg'	 => 'User berhasil dibuat. NIP digunakan sebagai password pada saat login.'
            //     ];
            
            // $this->output_json($data);
        
    }
    public function create()
    {        
        $session = session();
        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines();
        $data = array(	'title'		=> 'Data Berita',
                        'guideline'	=> $guideline,
                        'user' => $session,
						'content'	=> 'admin/guide/create');
		return view('admin/_partials/wrapper',$data);
    }    
        public function store()

        {
        $model = new GuidelinesModel();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/');
        }
        $validation = $this->validate([

            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,application/pdf,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);
 
        if ($validation == FALSE) {
            
            return $this->index();
        } else {
            $upload = $this->request->getFile('file_upload');
            $upload->move(WRITEPATH . '../public/assets/images/');

        $data = array(
            'guidelines_name'  => $this->request->getPost('guidelines_name'),
            'guidelines_description'  => $this->request->getPost('guidelines_description'),
            'guidelines_type'  => $this->request->getPost('guidelines_type'),
            'guidelines_link'  => $this->request->getPost('guidelines_link'),
            'created_date' => date("Y-m-d H:i:s"),
            'created_by'  => $this->request->getPost('created_by'),
            'updated_date' => date("Y-m-d H:i:s"),
            'updated_by'  => $this->request->getPost('updated_by'),

            'file' => $upload->getName()
        );
        
        $model->insert_Guidelines($data);
        return redirect()->to(base_url('guidelines'))->with('berhasil', 'Data Berhasil di Simpan');
        }
    }
    public function edit($id)
    {        
        $session = session();
        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines($id);
        $guideline = array(	'title'		=> 'Data Berita',
                        'guideline'	=> $guideline,
                        'user' => $session,
						'content'	=> 'admin/guide/edit');
		return view('admin/_partials/wrapper',$guideline);
    }
    public function update($id)
    {    
        $guidelines_name = $this->request->getPost('guidelines_name');
        $guidelines_description = $this->request->getPost('guidelines_description');
        $guidelines_type = $this->request->getPost('guidelines_type');
        $guidelines_link = $this->request->getPost('guidelines_link');
        $created_date = date("Y-m-d H:i:s");
        $created_by = $this->request->getPost('created_by');
        $updated_date = date("Y-m-d H:i:s");
        $updated_by = $this->request->getPost('updated_by');
        $file = $this->request->getPost('file');

        $data = 
        [
            'guidelines_name' => $guidelines_name,
            'guidelines_description' => $guidelines_description,
            'guidelines_type' => $guidelines_type,
            'guidelines_link' => $guidelines_link,
            'created_date' => $created_date,
            'created_by' => $created_by,
            'updated_date' => $updated_date,
            'updated_by' => $updated_by,
            'file' => $file
        ];

        $model = new GuidelinesModel();
		$update = $model->update_Guidelines($data, $id);

        if($update)
        {
            session()->setFlashdata('info', 'Updated guide successfully');
            return redirect()->to(base_url('guidelines'));
        }
    }
    public function delete($id)
    {         
            $model 	= new GuidelinesModel();
            $berita = $model->delete_Guidelines($id);
            session()->setFlashdata('info', 'Updated guide successfully');
            return redirect()->to(base_url('guidelines'));
    }
    public function delete_active($id)
    {         
            $model 	= new GuidelinesShowModel();
            $berita = $model->delete_Guidelines($id);
            session()->setFlashdata('info', 'Updated guide successfully');
            return redirect()->to(base_url('guidelines/create_active'));
    }

    
}