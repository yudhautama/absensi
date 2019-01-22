<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tbl_karyawan'] = $this->Tbl_karyawan_model->get_all();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if(isset($_GET['jenis_kelamin'])){
            $jenis_kelamin = $_GET['jenis_kelamin'];
        }else{
            $jenis_kelamin = '';
        }
        if(isset($_GET['fromdate'])){
            $fromdate = $_GET['fromdate'];
        }else{
            $fromdate = '';
        }
        if(isset($_GET['todate'])){
            $todate = $_GET['todate'];
        }else{
            $todate = '';
        }
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_karyawan/index.html';
            $config['first_url'] = base_url() . 'tbl_karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_karyawan_model->total_rows($q);
        $tbl_karyawan = $this->Tbl_karyawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_karyawan_data' => $this->Tbl_karyawan_model->filter($jenis_kelamin, $fromdate, $todate),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'j_kel' => $this->Tbl_karyawan_model->GetKel()->result_array(),
        );
        $data['page']='data_master';
        
        
        $this->load->view('tbl_karyawan/tbl_karyawan_list', $data);
        
    }

    public function read($id) 
    {
        $row = $this->Tbl_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
              'nik' => $row->nik,
              'nama_kyn' => $row->nama_kyn,
              't4_lahir' => $row->t4_lahir,
              'tgl_lahir' => $this->tanggal($row->tgl_lahir),
              'j_kel' => $row->j_kel,
              'alamat' => $row->alamat,
              'no_tlp' => $row->no_tlp,
              'email' => $row->email,
              'jabatan' => $row->jabatan,
              'join_date' =>  $this->tanggal($row->join_date),
              'end_date' => $row->end_date,
              'status' => $row->status,
              'stat_kwn' => $row->stat_kwn,
              'foto' => $row->foto,
          );
          $data['page']='data_master';
            $this->load->view('tbl_karyawan/tbl_karyawan_read', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_karyawan/create_action'),
            'nik' => set_value('nik'),
            'nama_kyn' => set_value('nama_kyn'),
            't4_lahir' => set_value('t4_lahir'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'j_kel' => $this->Tbl_karyawan_model->GetKel()->result_array(),
            'alamat' => set_value('alamat'),
            'no_tlp' => set_value('no_tlp'),
            'email' => set_value('email'),
            'jabatan' => $this->Tbl_karyawan_model->GetJab()->result_array(),
            'join_date' => set_value('join_date'),
            'end_date' => set_value('end_date'),
            'status' => $this->Tbl_karyawan_model->GetStat()->result_array(),
            'stat_kwn' => $this->Tbl_karyawan_model->GetKwn()->result_array(),
            'foto' => set_value('foto'),
            
        );
        
        $data['page']='data_master';
        $this->load->view('tbl_karyawan/tbl_karyawan_form', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_kyn' => $this->input->post('nama_kyn',TRUE),
              't4_lahir' => $this->input->post('t4_lahir',TRUE),
              'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
              'j_kel' => $this->input->post('j_kel',TRUE),
              'alamat' => $this->input->post('alamat',TRUE),
              'no_tlp' => $this->input->post('no_tlp',TRUE),
              'email' => $this->input->post('email',TRUE),
              'jabatan' => $this->input->post('jabatan',TRUE),
              'join_date' => $this->input->post('join_date',TRUE),
              'end_date' => $this->input->post('end_date',TRUE),
              'status' => $this->input->post('status',TRUE),
              'stat_kwn' => $this->input->post('stat_kwn',TRUE),
              'foto' => $this->input->post('foto',TRUE),
          );
            
            if (!empty($_POST['foto']['name'])) {
             $upload = $this->_do_upload();
             $data['foto'] = $upload;}

             if ($_POST['end_date']==0) {
               echo "Present";
             }

            //  $data['page']='data_master';
             $this->Tbl_karyawan_model->insert($data);
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil ditambah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button></div>');
             redirect(site_url('tbl_karyawan'));
         }
     }
     
     public function update($id) 
     {
        $row = $this->Tbl_karyawan_model->get_by_id($id);


        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_karyawan/update_action'),
                'nik' => set_value('nik', $row->nik),
                'nama_kyn' => set_value('nama_kyn', $row->nama_kyn),
                't4_lahir' => set_value('t4_lahir', $row->t4_lahir),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'j_kel' => set_value('j_kel', $row->j_kel),
                'alamat' => set_value('alamat', $row->alamat),
                'no_tlp' => set_value('no_tlp', $row->no_tlp),
                'email' => set_value('email', $row->email),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'join_date' => set_value('join_date', $row->join_date),
                'end_date' => set_value('end_date', $row->end_date),
                'status' => set_value('status', $row->status),
                'stat_kwn' => set_value('stat_kwn', $row->stat_kwn),
                'foto' => set_value('foto', $row->foto),

                'select_jabatan'=> $this->Tbl_karyawan_model->GetJab()->result_array(),
                'kawin'=> $this->Tbl_karyawan_model->GetKwn()->result_array(),
                'stat_pegawai'=> $this->Tbl_karyawan_model->GetStat()->result_array(),
                'jenis_kelamin'=> $this->Tbl_karyawan_model->GetKel()->result_array()

                
            );
            $data['page']='data_master';
            $this->load->view('tbl_karyawan/tbl_karyawan_edit', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik', TRUE));
        } else {
            if($this->input->post('foto',TRUE)==""){
                $data = array(
                    'nama_kyn' => $this->input->post('nama_kyn',TRUE),
                    't4_lahir' => $this->input->post('t4_lahir',TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                    'j_kel' => $this->input->post('j_kel',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'no_tlp' => $this->input->post('no_tlp',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'jabatan' => $this->input->post('jabatan',TRUE),
                    'join_date' => $this->input->post('join_date',TRUE),
                    'end_date' => $this->input->post('end_date',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'stat_kwn' => $this->input->post('stat_kwn',TRUE),
                    
                );
            }else{
                $data = array(
                    'nama_kyn' => $this->input->post('nama_kyn',TRUE),
                    't4_lahir' => $this->input->post('t4_lahir',TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                    'j_kel' => $this->input->post('j_kel',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'no_tlp' => $this->input->post('no_tlp',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'jabatan' => $this->input->post('jabatan',TRUE),
                    'join_date' => $this->input->post('join_date',TRUE),
                    'end_date' => $this->input->post('end_date',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'stat_kwn' => $this->input->post('stat_kwn',TRUE),
                    'foto' => $this->input->post('foto',TRUE),
                );


                if (!empty($_POST['foto']['name'])) {
                    $upload = $this->_do_upload();
                    $data['foto'] = $upload;
                }
            }

            $this->Tbl_karyawan_model->update($this->input->post('nik', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Data Berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_karyawan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(site_url('tbl_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_karyawan'));
        }
    }

    public function deleteAll(){

        foreach($_POST['nik'] as $nik){
            $this->Tbl_karyawan_model->delete($nik);
        }
        return redirect('tbl_karyawan');

    }

    public function _rules() 
    {
    //    $this->form_validation->set_rules('nama_kyn', 'nama kyn', 'trim|required');
    //    $this->form_validation->set_rules('t4_lahir', 't4 lahir', 'trim|required');
    //    $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
    //    $this->form_validation->set_rules('j_kel', 'j kel', 'trim|required');
    //    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    //    $this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');
    //    $this->form_validation->set_rules('email', 'email', 'trim|required');
    //    $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
    //    $this->form_validation->set_rules('join_date', 'join date', 'trim|required');
    // //    $this->form_validation->set_rules('end_date', 'end date', 'trim|required');
    //    $this->form_validation->set_rules('status', 'status', 'trim|required');
    //    $this->form_validation->set_rules('stat_kwn', 'stat_kwn', 'trim|required');
    // //    $this->form_validation->set_rules('foto', 'foto', 'trim|required');

       $this->form_validation->set_rules('nik', 'nik', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function _do_upload()
   {
       $config=array(
            'upload_path' 		=> 'assets/img/',
            'allowed_types' 	=> 'gif|jpg|png',
            'max_size' 			=> 1024,
            'max_widht' 		=> 720,
            'max_height'  		=> 1280,
            'file_name' 		=> round(microtime(true)*1000),
       );
      
      
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto')) {
         $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
         redirect('tbl_karyawan');
     }
     return $this->upload->data('file_name');
    }

    public function tanggal($date){
        return date("d-m-Y", strtotime($date));
    }
 

}

/* End of file Tbl_karyawan.php */
/* Location: ./application/controllers/Tbl_karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-23 04:25:29 */
/* http://harviacode.com */