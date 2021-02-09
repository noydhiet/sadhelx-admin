<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GuidelinesModel;

class Guidelines extends Controller
{
	public function __construct() 
    {
        $this->guideline = new GuidelinesModel();       
    }

	public function index()
	{
        $data['guideline'] = $this->guideline->getGuidelines();

        echo view('admin/_partials/head');
		echo view('admin/_partials/sidebar');
        echo view('admin/_partials/navbar');
        echo view('admin/guide/index', $data);
		echo view('admin/_partials/footer');
		echo view('admin/_partials/modal');
		echo view('admin/_partials/js');        
        
    }
    public function create()
    {
	
        echo view('admin/guide/create');
      

    }    
        public function store()

        {
        $model = new GuidelinesModel();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('upload');
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
            'name'  => $this->request->getPost('name'),
            'file' => $upload->getName()
        );
        $model->insert_Guidelines($data);
        return redirect()->to('guidelines')->with('berhasil', 'Data Berhasil di Simpan');
        }
    }
    public function edit($id)
    {
        $data['guideline'] = $this->guideline->getGuidelines($id);
        echo view('admin/_partials/head');
        return view('admin/guide/edit', $data);
    }
    public function update($id)
    {
        $name = $this->request->getPost('name');
        $file = $this->request->getPost('file');

        $data = [
            'name' => $name,
            'file' => $file
        ];

        $update = $this->guideline->update_Guidelines($data, $id);

        if($update)
        {
            session()->setFlashdata('info', 'Updated guide successfully');
            return redirect()->to(base_url('guidelines'));
        }
    }
    public function delete($id)
    {
        $hapus = $this->guideline->delete_Guidelines($id);

        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted guide successfully');
            return redirect()->to(base_url('guidelines'));
        }
    }
}