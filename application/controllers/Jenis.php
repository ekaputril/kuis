<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->library('pagination');
    }

    public function index()
    {

        $data = [];
        $total = $this->jenis_model->getTotal();
        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(3, 0);
            $config = [
                'base_url' => site_url() . '/jenis/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,
                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);
            $data = [
                'title' => 'Katalog kamera :: Data jenis',
                'jenis' => $this->jenis_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
            ];
        }

        
        $this->load->view('jenis/index', $data);
    }

    public function create()
    {
        $error = array('error' => ' ' );
        $this->load->view('jenis/create', $error);
    }

    public function store()
    {
        // Ambil value 
        $jabatan = $this->input->post('jenis');

        // Validasi
        $dataval = $jenis;
        $errorval = $this->validate($dataval);

        // Pesan Error atau Upload
        if ($errorval==false)
        {
            
            // Insert data
            $data = [
                'jenis' => $jenis,
                ];
            $result = $this->jenis_model->insert($data);
            
            if ($result)
            {
                redirect(jenis);
            }
            else
            {
                $error = array('error' => 'Gagal');
                $this->load->view('jenis/create', $error);
            }
        }
        else
        {
            $error = ['error' => validation_errors()];
            $this->load->view('jenis/create', $error);
        }
    }

    public function edit($id_jenis,$error='')
    {
      // TODO: tampilkan view edit data
        $jenis = $this->jenis_model->show($id_jenis);
        $data = [
            'data' => $jenis,
            'error' => $error
        ];
        $this->load->view('jenis/edit', $data);
      
    }

    public function update($id_jenis)
    {
        //Ambil Value
        $id_jenis=$this->input->post('id_jenis');
        $jenis = $this->input->post('jenis');

        // Validasi
        $dataval = $jenis;
        $errorval = $this->validate($dataval);

        if ($errorval==false)
        {
            $data = [ 'jenis' => $this->input->post('jenis') ];
            $result = $this->jenis_model->update($id_jenis,$data);

            if ($result)
            {
                redirect('jenis');
            }
            else
            {
                $data = array('error' => 'Gagal');
                $this->load->view('jenis/edit', $data);
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($id_jenis,$error=' ');
        }

        
    }

    public function destroy($id_jenis)
    {
        $jenis = $this->jenis_model->show($id_jenis);
        $data = [ 'data' => $jenis ];
        $this->jenis_model->delete($id_jenis);
        redirect('jenis');
    }

    public function validate($dataval)
    {
        // Validasi
        $this->form_validation->set_rules('jenis','jenis','trim|required|callback_alpha_space');

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 

    public function alpha_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }
}