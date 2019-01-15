<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_izin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_izin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_izin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_izin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_izin/index.html';
            $config['first_url'] = base_url() . 'tbl_izin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_izin_model->total_rows($q);
        $tbl_izin = $this->Tbl_izin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_izin_data' =>$this->Tbl_izin_model->duatabel(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page']='lainnya';
        $this->load->view('tbl_izin/tbl_izin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_izin_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_kyn' => $row->id_kyn,
            'nama_kyn' => $row->nama_kyn,
            'tgl' =>$this->tanggal($row->tgl),
            'alasan' => $row->alasan,
            'keperluan' => $row->keperluan,
            );
        $data['page']='lainnya';
        $this->load->view('tbl_izin/tbl_izin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_izin'));
        }
        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_izin/create_action'),
            'id_kyn' => set_value('id_kyn'),
            'nama_kyn' => $this->Tbl_izin_model->GetKary()->result_array(),
            'tgl' => set_value('tgl'),
            'alasan' => set_value('alasan'),
            'keperluan' => set_value('keperluan'),
        );
        $data['page']='lainnya';
        $this->load->view('tbl_izin/tbl_izin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            // 'nama_kyn' => $this->input->post('nama_kyn',TRUE),
            'tgl' => $this->input->post('tgl',TRUE),
            'alasan' => $this->input->post('alasan',TRUE),
            'keperluan' => $this->input->post('keperluan',TRUE),
	    );

            $this->Tbl_izin_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert" align="left">Data<strong> Berhasil </strong>ditambah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(site_url('tbl_izin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_izin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('tbl_izin/update_action'),
                'id_kyn' => set_value('id_kyn', $row->id_kyn),
                'nama_kyn' => set_value('nama_kyn', $row->nama_kyn),
                'tgl' => set_value('tgl', $row->tgl),
                'alasan' => set_value('alasan', $row->alasan),
                'keperluan' => set_value('keperluan', $row->keperluan),

                'nama_karyawan'=> $this->Tbl_izin_model->GetKary()->result_array(),
            );
            $data['page']='lainnya';
            $this->load->view('tbl_izin/tbl_izin_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_izin'));
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
                'alasan' => $this->input->post('alasan',TRUE),
                'keperluan' => $this->input->post('keperluan',TRUE),
	        );

            $this->Tbl_izin_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"align="left">Data<strong> Berhasil </strong>diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_izin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_izin_model->get_by_id($id);

        if ($row) {
            $this->Tbl_izin_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(site_url('tbl_izin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_izin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kyn', 'nama kyn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function tanggal($date){
        return date("d-m-Y", strtotime($date));
     }

}

/* End of file Tbl_izin.php */
/* Location: ./application/controllers/Tbl_izin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-12 04:45:01 */
/* http://harviacode.com */