<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_lembur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_lembur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_lembur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_lembur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_lembur/index.html';
            $config['first_url'] = base_url() . 'tbl_lembur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_lembur_model->total_rows($q);
        $tbl_lembur = $this->Tbl_lembur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_lembur_data' => $this->Tbl_lembur_model->duatabel(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page']='lainnya';
        $this->load->view('tbl_lembur/tbl_lembur_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_lembur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kyn' => $row->id_kyn,
		'nama_kyn' => $row->nama_kyn,
		'PIC' => $row->PIC,
		'approval' => $row->approval,
		'Task' => $row->Task,
		'tanggal' => $row->tanggal,
		'keterangan' => $row->keterangan,
        );
        $data['page']='lainnya';
            $this->load->view('tbl_lembur/tbl_lembur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_lembur'));
        }
        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_lembur/create_action'),
	    'id_kyn' => set_value('id_kyn'),
	    'nama_kyn' =>$this->Tbl_lembur_model->GetKary()->result_array(),
		'PIC' =>$this->Tbl_lembur_model->GetPic()->result_array(),
		'approval' =>$this->Tbl_lembur_model->GetAppr()->result_array(),
	    'Task' => set_value('Task'),
	    'tanggal' => set_value('tanggal'),
	    'keterangan' => set_value('keterangan'),
    );
    $data['page']='lainnya';
        $this->load->view('tbl_lembur/tbl_lembur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kyn' => $this->input->post('nama_kyn',TRUE),
		'PIC' => $this->input->post('PIC',TRUE),
		'approval' => $this->input->post('approval',TRUE),
		'Task' => $this->input->post('Task',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tbl_lembur_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_lembur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_lembur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('tbl_lembur/update_action'),
                'id_kyn' => set_value('id_kyn', $row->id_kyn),
                'nama_kyn' => set_value('nama_kyn', $row->nama_kyn),
                'PIC' =>set_value('PIC', $row->PIC),
                'approval' => set_value('approval', $row->approval),
                'Task' => set_value('Task', $row->Task),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'keterangan' => set_value('keterangan', $row->keterangan),

               'nama_karyawan'=> $this->Tbl_lembur_model->GetKary()->result_array(),
               'app'=>$this->Tbl_lembur_model->GetAppr()->result_array(),
               'nama_pic'=>$this->Tbl_lembur_model->GetPic()->result_array(),
            );
            $data['page']='lainnya';
            $this->load->view('tbl_lembur/tbl_lembur_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_lembur'));
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
		'PIC' => $this->input->post('PIC',TRUE),
		'approval' => $this->input->post('approval',TRUE),
		'Task' => $this->input->post('Task',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tbl_lembur_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_lembur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_lembur_model->get_by_id($id);

        if ($row) {
            $this->Tbl_lembur_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_lembur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_lembur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kyn', 'nama kyn', 'trim|required');
	$this->form_validation->set_rules('PIC', 'pic', 'trim|required');
	$this->form_validation->set_rules('approval', 'approval', 'trim|required');
	$this->form_validation->set_rules('Task', 'task', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_lembur.php */
/* Location: ./application/controllers/Tbl_lembur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-12 03:50:45 */
/* http://harviacode.com */