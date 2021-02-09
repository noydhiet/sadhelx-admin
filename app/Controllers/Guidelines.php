<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GuidelinesModel;

class Guidelines extends Controller
{

	public function index()
	{             
        $model = new GuidelinesModel();
		$guideline = $model->getGuidelines();
        $data = array(	'title'		=> 'Data Berita',
                        'guideline'	=> $guideline,
						'content'	=> 'admin/guide/index');
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
            'name'  => $this->request->getPost('name'),
            'file' => $upload->getName()
        );
        $model->insert_Guidelines($data);
        return redirect()->to('')->with('berhasil', 'Data Berhasil di Simpan');
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
        $name = $this->request->getPost('name');
        $file = $this->request->getPost('file');

        $data = [
            'name' => $name,
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