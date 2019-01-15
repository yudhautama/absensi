<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_pendidikan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_pendidikan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_pendidikan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_pendidikan/index.html';
            $config['first_url'] = base_url() . 'tbl_pendidikan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_pendidikan_model->total_rows($q);
        $tbl_pendidikan = $this->Tbl_pendidikan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_pendidikan_data' => $tbl_pendidikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page']='data_master';
        $this->load->view('tbl_pendidikan/tbl_pendidikan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kyn' => $row->id_kyn,
		'nik' => $row->nik,
		'tingk_pend' => $row->tingk_pend,
		'nama_sekolah' => $row->nama_sekolah,
		'jurusan' => $row->jurusan,
		'tahun_masuk' => $row->tahun_masuk,
		'tahun_lulus' => $row->tahun_lulus,
        );
        $data['page']='data_master';
            $this->load->view('tbl_pendidikan/tbl_pendidikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_pendidikan/create_action'),
	    'id_kyn' => set_value('id_kyn'),
	    'nik' => $this->Tbl_pendidikan_model->GetKary()->result_array(),
	    'tingk_pend' => $this->Tbl_pendidikan_model->GetPend()->result_array(),
	    'nama_sekolah' => set_value('nama_sekolah'),
	    'jurusan' => set_value('jurusan'),
	    'tahun_masuk' => set_value('tahun_masuk'),
	    'tahun_lulus' => set_value('tahun_lulus'),
    );
    $data['page']='data_master';
        $this->load->view('tbl_pendidikan/tbl_pendidikan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'tingk_pend' => $this->input->post('tingk_pend',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
		'tahun_lulus' => $this->input->post('tahun_lulus',TRUE),
	    );

            $this->Tbl_pendidikan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('tbl_pendidikan/update_action'),
                'id_kyn' => set_value('id_kyn', $row->id_kyn),
                'nik' => set_value('nik', $row->nik),
                'tingk_pend' => set_value('tingk_pend', $row->tingk_pend),
                'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
                'jurusan' => set_value('jurusan', $row->jurusan),
                'tahun_masuk' => set_value('tahun_masuk', $row->tahun_masuk),
                'tahun_lulus' => set_value('tahun_lulus', $row->tahun_lulus),
                'nomor'=>$this->Tbl_pendidikan_model->GetKary()->result_array(),
                'tingkat'=>$this->Tbl_pendidikan_model->GetPend()->result_array(),
            );
            $data['page']='data_master';
            $this->load->view('tbl_pendidikan/tbl_pendidikan_edit', $data);
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
		'tingk_pend' => $this->input->post('tingk_pend',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
		'tahun_lulus' => $this->input->post('tahun_lulus',TRUE),
	    );

            $this->Tbl_pendidikan_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pendidikan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pendidikan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('tingk_pend', 'tingk pend', 'trim|required');
	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('tahun_masuk', 'tahun masuk', 'trim|required');
	$this->form_validation->set_rules('tahun_lulus', 'tahun lulus', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_pendidikan.php */
/* Location: ./application/controllers/Tbl_pendidikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-13 06:24:57 */
/* http://harviacode.com */