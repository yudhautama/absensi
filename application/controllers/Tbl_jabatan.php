<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_jabatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_jabatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_jabatan/index.html';
            $config['first_url'] = base_url() . 'tbl_jabatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_jabatan_model->total_rows($q);
        $tbl_jabatan = $this->Tbl_jabatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_jabatan_data' => $tbl_jabatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page']='data_master';
        
        $this->load->view('tbl_jabatan/tbl_jabatan_list', $data);
       
    }

    // public function read($id) 
    // {
    //     $row = $this->Tbl_jabatan_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
	// 	'kd_jabatan' => $row->kd_jabatan,
	// 	'jabatan' => $row->jabatan,
	//     );
    //     $this->load->view('templates/header', $data);    
    //     $this->load->view('tbl_jabatan/tbl_jabatan_read', $data);
    //     $this->load->view('templates/footer', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('tbl_jabatan'));
    //     }
    // }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_jabatan/create_action'),
            'kd_jabatan' => set_value('kd_jabatan'),
            'jabatan' => set_value('jabatan'),
	);
       
    $data['page']='data_master';
    $this->load->view('tbl_jabatan/tbl_jabatan_list', $data);
    
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

        
            $this->Tbl_jabatan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_jabatan/update_action'),
		'kd_jabatan' => set_value('kd_jabatan', $row->kd_jabatan),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
           
        $this->load->view('tbl_jabatan/tbl_jabatan_form', $data);
       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_jabatan', TRUE));
        } else {
            $data = array(
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Tbl_jabatan_model->update($this->input->post('kd_jabatan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_jabatan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_jabatan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_jabatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('kd_jabatan', 'kd_jabatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_jabatan.php */
/* Location: ./application/controllers/Tbl_jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 04:04:26 */
/* http://harviacode.com */