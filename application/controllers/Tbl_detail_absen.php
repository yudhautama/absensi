<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_detail_absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_detail_absen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_detail_absen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_detail_absen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_detail_absen/index.html';
            $config['first_url'] = base_url() . 'tbl_detail_absen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_detail_absen_model->total_rows($q);
        $tbl_detail_absen = $this->Tbl_detail_absen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_detail_absen_data' => $this->Tbl_detail_absen_model->duatabel(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'bulan'=>$this->Tbl_detail_absen_model->GetBulan()->result_array(),
            'tahun'=>$this->Tbl_detail_absen_model->GetTahun()->result_array()
        );
        $data['page']='lainnya';
        $this->load->view('tbl_detail_absen/tbl_detail_absen_list', $data);
        
    }

    public function read($id) 
    {
        $row = $this->Tbl_detail_absen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kyn' => $row->id_kyn,
		'nik' => $row->nik,
		// 'nama_kyn' => $row->nama_kyn,
		'j_absen' => $row->j_absen,
        'tgl' => $this->tanggal($row->tgl),
		'jam' => $row->jam,
        'keterangan' => $row->keterangan,
        'nama'=>$this->Tbl_detail_absen_model->duatabel(),
	    );
        $data['page']='lainnya';
            $this->load->view('tbl_detail_absen/tbl_detail_absen_read', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_detail_absen'));
        }
        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tbl_detail_absen/create_action'),
            'id_kyn' => set_value('id_kyn'),
            'nik' => $this->Tbl_detail_absen_model->GetKary()->result_array(),
            'nama_kyn' => set_value('nama_kyn'),
            'j_absen' => $this->Tbl_detail_absen_model->GetAbs()->result_array(),
            'tgl' => set_value('tgl'),
            'jam' => set_value('jam'),
            'keterangan' => set_value('keterangan'),
           
	);
    $data['page']='lainnya';
    $this->load->view('tbl_detail_absen/tbl_detail_absen_form', $data);
    
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nik' => $this->input->post('nik',TRUE),
                'j_absen' => $this->input->post('j_absen',TRUE),
                'tgl' => $this->input->post('tgl',TRUE),
                'jam' => $this->input->post('jam',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
	        );

            $this->Tbl_detail_absen_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"align="left">Data<strong> Berhasil </strong>ditambah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(site_url('tbl_detail_absen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_detail_absen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_detail_absen/update_action'),

                'id_kyn' => set_value('id_kyn', $row->id_kyn),
                'nik' => set_value('nik', $row->nik),
                'j_absen' => set_value('j_absen', $row->j_absen),
                'tgl' => set_value('tgl', $row->tgl),
                'jam' => set_value('jam', $row->jam),
                'keterangan' => set_value('keterangan', $row->keterangan),

                'select_nama_karyawan' => $this->Tbl_detail_absen_model->GetKary()->result_array(),
                'select_jenis_absen' => $this->Tbl_detail_absen_model->GetAbs()->result_array(),
	        );
            $data['page']='lainnya';
            $this->load->view('tbl_detail_absen/tbl_detail_absen_edit', $data);
        
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_detail_absen'));
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
                'j_absen' => $this->input->post('j_absen',TRUE),
                'tgl' => $this->input->post('tgl',TRUE),
                'jam' => $this->input->post('jam',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
	        );
        
            $this->Tbl_detail_absen_model->update($this->input->post('id_kyn', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert" align="left">Data <strong>Berhasil</strong> diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(site_url('tbl_detail_absen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_detail_absen_model->get_by_id($id);

        if ($row) {
            $this->Tbl_detail_absen_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"align="left">Data<strong> Berhasil </strong>dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_detail_absen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_detail_absen'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('nama_kyn', 'nama kyn', 'trim|required');
	$this->form_validation->set_rules('j_absen', 'jenis absen', 'trim|required');
	$this->form_validation->set_rules('jam', 'jam', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_kyn', 'id_kyn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function tanggal($date){
        return date("d-m-Y", strtotime($date));
     }

     public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_detail_absen.xls";
        $judul = "tbl_detail_absen";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "NIK");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Absen");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Jam");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Tbl_detail_absen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kyn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->j_absen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Tbl_detail_absen.php */
/* Location: ./application/controllers/Tbl_detail_absen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-30 08:17:10 */
/* http://harviacode.com */