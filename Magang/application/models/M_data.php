<?php
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('t_data_utama');
	}
	function tampil_data_staff(){
		$nama = $this->session->userdata('nama');
	  $sql = "SELECT * FROM t_data_utama where nama_pic='$nama'";
		return $this->db->query($sql);
	}
	function tampil_data_report(){
		$nama = $this->session->userdata('nama');
		$sql = "SELECT * FROM t_data_utama where nama_pic='$nama'";
		return $this->db->query($sql);
	}
	function tampil_nama_staff(){
		return $this->db->get('t_data_user');
	}
	function tampil_dept(){
		return $this->db->get('t_department');
	}
	function tampil_staff(){
		return $this->db->get('t_data_user');
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function input_data($data,$table){
		return $this->db->insert($table,$data);
	}
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function data_detail($where,$table){
		return $this->db->get_where($table,$where);
	}
	function prog_detail($where,$table){
		$nama = $this->session->userdata('nama');
		return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function pilihan_type(){
		 $this->db->select('*');
		 $this->db->from('t_type');
		 $query = $this->db->get();
		 return $query->result();
	}
	function jumlah_new($tahun){
		$sql = "SELECT COUNT(type) AS tot_new FROM t_data_utama WHERE type='New' && tanggal LIKE '%$tahun%' ";
		return $this->db->query($sql);
	}
	function jumlah_exist($tahun){
		$sql = "SELECT COUNT(type) AS tot_exist FROM t_data_utama WHERE type='Existing' && tanggal LIKE '%$tahun%'";
		return $this->db->query($sql);
	}
	function jumlah_up($tahun){
		$sql = "SELECT COUNT(type) AS tot_up FROM t_data_utama WHERE type='Upgrade' && tanggal LIKE '%$tahun%'";
		return $this->db->query($sql);
	}
	function jumlah_down($tahun){
		$sql = "SELECT COUNT(type) AS tot_down FROM t_data_utama WHERE type='Downgrade' && tanggal LIKE '%$tahun%'";
		return $this->db->query($sql);
	}
	function jumlah_estimasi($tahun){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti from t_data_utama WHERE tanggal LIKE '%$tahun%' ";
		return $this->db->query($sql);
	}
	function jumlah_real($tahun){
		$sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%'";
		return $this->db->query($sql);
	}
	function jumlah_estimasi_staff($tahun){
		$nama = $this->session->userdata('nama');
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti from t_data_utama WHERE tanggal LIKE '%$tahun%' && nama_pic='$nama'";
		return $this->db->query($sql);
	}
	function jumlah_real_staff($tahun){
		$nama = $this->session->userdata('nama');
		$sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%' && nama_pic='$nama'";
		return $this->db->query($sql);
	}
	function hasil_grafik(){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama";
		return $this->db->query($sql)->result();
	}
	function grafik($tahun){
		$query = "SELECT nama_pic,SUM(real_pendapatan) AS tot_real,COUNT(real_pendapatan) AS baris_real FROM t_data_utama WHERE tanggal LIKE '%$tahun%' GROUP BY nama_pic ORDER BY tot_real";
        return $this->db->query($query)->result();
	}
	function prosen_tot_real(){
		$query = "SELECT nama_pic,SUM(real_pendapatan) AS tot_real,COUNT(real_pendapatan) AS baris_real FROM t_data_utama WHERE tanggal LIKE '%$tahun%' GROUP BY nama_pic ORDER BY tot_real";
        return $this->db->query($query)->result();
	}
	function grafik_pie($tahun){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        }
        return array();
	}

	function grafik_donut($tahun){
		$sql = "SELECT divisi,SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%' GROUP BY divisi ";
		return $this->db->query($sql)->result();
	}

	function grafik_pie_staff($tahun){
		$nama = $this->session->userdata('nama');
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%' && nama_pic='$nama'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        }
        return array();
	}

	function coba(){
     $sql = "SELECT nama_pic,SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real FROM t_data_utama";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        }
        return array();
	}
	function seleksi_nama(){
		$query = "SELECT nama from t_data_user";
        return $this->db->query($query)->result();
	}
}
