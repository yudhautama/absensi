<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_lembur_model extends CI_Model
{

    public $table = 'tbl_lembur';
    public $id = 'id_kyn';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //join tabel karyawan dan tabel lembur
    function duatabel(){
        $this->db->select('*');
        $this->db->from('tbl_karyawan');
        $this->db->join('tbl_lembur','$tbl_lembur.nik = tbl_karyawan.nik');
        $query = $this->db->get();
        return $query->result();
    }

    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kyn', $q);
        // $this->db->or_like('nama_kyn', $q);
        $this->db->or_like('PIC', $q);
        $this->db->or_like('approval', $q);
        $this->db->or_like('Task', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kyn', $q);
        // $this->db->or_like('nama_kyn', $q);
        $this->db->or_like('PIC', $q);
        $this->db->or_like('approval', $q);
        $this->db->or_like('Task', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function GetKary($where= "")
    {
      $data = $this->db->query('select * from tbl_karyawan '.$where);
      return $data;
  }

  function GetPic($where= "")
  {
      $data = $this->db->query('select * from pic '.$where);
      return $data;
  }
  
  function GetAppr($where= "")
  {
      $data = $this->db->query('select * from approve '.$where);
      return $data;
  }
  function karyawan($nik){
    return $this->db->query("select * from tbl_karyawan where nik = '$nik'");
}

}

/* End of file Tbl_lembur_model.php */
/* Location: ./application/models/Tbl_lembur_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-12 03:50:45 */
/* http://harviacode.com */