<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_log extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_log_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_log/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_log/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_log/index.html';
            $config['first_url'] = base_url() . 'tbl_log/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_log_model->total_rows($q);
        $tbl_log = $this->Tbl_log_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_log_data' => $tbl_log,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tbl_log/tbl_log_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_log_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kyn' => $row->id_kyn,
		'nama_kyn' => $row->nama_kyn,
		'tgl' => $row->tgl,
		'log_masuk' => $row->log_masuk,
		'log_keluar' => $row->log_keluar,
	    );
            $this->load->view('tbl_log/tbl_log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_log'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_log/create_action'),
	    'id_kyn' => set_value('id_kyn'),
	    'nama_kyn' => set_value('nama_kyn'),
	    'tgl' => set_value('tgl'),
	    'log_masuk' => set_value('log_masuk'),
	    'log_keluar' => set_value('log_keluar'),
	);
        $this->load->view('tbl_log/tbl_log_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kyn' => $this->input->post('nama_kyn',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'log_masuk' => $this->input->post('log_masuk',TRUE),
		'log_keluar' => $this->input->post('log_keluar',TRUE),
	    );

            $this->Tbl_log_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_log'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_log_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_log/update_action'),
		'id_kyn' => set_value('id_kyn', $row->id_kyn),
		'nama_kyn' => set_value('nama_kyn', $row->nama_kyn),
		'tgl' => set_value('tgl', $row->tgl),
		'log_masuk' => set_value('log_masuk', $row->log_masuk),
		'log_keluar' => set_value('log_keluar', $row->log_keluar),
	    );
            $this->load->view('tbl_log/tbl_log_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_log'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kyn', TRUE));
        } else {
            $data = array(
		'nama_kyn' => $this->input->post('nama_kyn',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'log_masuk' => $this->input->post('log_masuk',TRUE),
		'log_keluar' => $this->input->post('log_keluar',TRUE),
	    );

            $this->Tbl_log_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_log'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_log_model->get_by_id($id);

        if ($row) {
            $this->Tbl_log_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_log'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_log'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kyn', 'nama kyn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('log_masuk', 'log masuk', 'trim|required');
	$this->form_validation->set_rules('log_keluar', 'log keluar', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_log.php */
/* Location: ./application/controllers/Tbl_log.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-13 08:15:13 */
/* http://harviacode.com */