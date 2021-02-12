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
    public function create()
    {        
        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines();
        $data = array(	'title'		=> 'Data Berita',
                        'guideline'	=> $guideline,
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
            $upload->move(WRITEPATH . '../assets/images/');

        $data = array(
            'guidelines_name'  => $this->request->getPost('guidelines_name'),
            'guidelines_description'  => $this->request->getPost('guidelines_description'),
            'guidelines_type'  => $this->request->getPost('guidelines_type'),
            'guidelines_link'  => $this->request->getPost('guidelines_link'),
            'created_date' => date("Y-m-d H:i:s"),
            'created_by'  => $this->request->getPost('created_by'),
            'updated_date' => date("Y-m-d H:i:s"),
            'updated_by'  => $this->request->getPost('updated_by'),
            'status'  => $this->request->getPost('status'),

            'file' => $upload->getName()
        );
        
        $model->insert_Guidelines($data);
        return redirect()->to(base_url('guidelines'))->with('berhasil', 'Data Berhasil di Simpan');
        }
    }
    public function edit($id)
    {        
        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines($id);
        $guideline = array(	'title'		=> 'Data Berita',
                        'guideline'	=> $guideline,
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
        $status = $this->request->getPost('status');
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
            'status' => $status,
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
    

    
}