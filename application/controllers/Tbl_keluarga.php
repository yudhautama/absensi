<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_keluarga_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_keluarga/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_keluarga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_keluarga/index.html';
            $config['first_url'] = base_url() . 'tbl_keluarga/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_keluarga_model->total_rows($q);
        $tbl_keluarga = $this->Tbl_keluarga_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_keluarga_data' => $tbl_keluarga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page']='data_master';
        $this->load->view('tbl_keluarga/tbl_keluarga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_keluarga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kyn' => $row->id_kyn,
		'nik' => $row->nik,
		'nama_klg' => $row->nama_klg,
		'hubungan' => $row->hubungan,
        );
        $data['page']='data_master';
            $this->load->view('tbl_keluarga/tbl_keluarga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_keluarga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_keluarga/create_action'),
	    'id_kyn' => set_value('id_kyn'),
	    'nik' => $this->Tbl_keluarga_model->GetKary()->result_array(),
	    'nama_klg' => set_value('nama_klg'),
	    'hubungan' => $this->Tbl_keluarga_model->GetKel()->result_array(),
    );
    $data['page']='data_master';
        $this->load->view('tbl_keluarga/tbl_keluarga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_klg' => $this->input->post('nama_klg',TRUE),
		'hubungan' => $this->input->post('hubungan',TRUE),
	    );

            $this->Tbl_keluarga_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_keluarga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('tbl_keluarga/update_action'),
                'id_kyn' => set_value('id_kyn', $row->id_kyn),
                'nik' => set_value('nik', $row->nik),
                'nama_klg' => set_value('nama_klg', $row->nama_klg),
                'hubungan' => set_value('hubungan', $row->hubungan),
                'keluarga'=> $this->Tbl_keluarga_model->GetKel()->result_array(),
                'nomor'=>$this->Tbl_keluarga_model->GetKary()->result_array()
            );
            $data['page']='data_master';
            $this->load->view('tbl_keluarga/tbl_keluarga_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kyn', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_klg' => $this->input->post('nama_klg',TRUE),
		'hubungan' => $this->input->post('hubungan',TRUE),
	    );

            $this->Tbl_keluarga_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_keluarga_model->get_by_id($id);

        if ($row) {
            $this->Tbl_keluarga_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_keluarga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_klg', 'nama klg', 'trim|required');
	$this->form_validation->set_rules('hubungan', 'hubungan', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_keluarga.php */
/* Location: ./application/controllers/Tbl_keluarga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-13 06:24:47 */
/* http://harviacode.com */