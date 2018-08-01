<?php 
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('t_data_utama');
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
	function jumlah_estimasi($tahun){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti from t_data_utama WHERE tanggal LIKE '%$tahun%' ";
		return $this->db->query($sql);
	}
	function jumlah_real($tahun){
		$sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama WHERE tanggal LIKE '%$tahun%'";
		return $this->db->query($sql);
	} 
	function jumlah_estimasi_staff(){
		$nama = $this->session->userdata('nama'); 
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti from t_data_utama WHERE nama_pic ='$nama'";
		return $this->db->query($sql);
	}
	function jumlah_real_staff(){
		$nama = $this->session->userdata('nama'); 
		$sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama WHERE nama_pic = '$nama'";
		return $this->db->query($sql);
	} 
	function hasil_grafik(){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama";
		return $this->db->query($sql)->result();
	} 
	function grafik($tahun){
		$query = "SELECT nama_pic,SUM(real_pendapatan) AS tot_real FROM t_data_utama WHERE tanggal LIKE '%$tahun%' GROUP BY nama_pic ORDER BY tot_real";
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

	function grafik_donut(){
        $sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama GROUP BY divisi";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $d_hasil = $query->row_array();
            $query->free_result();
            return $d_hasil;
        }
        return array();
	}

	function grafik_pie_staff(){
		$nama = $this->session->userdata('nama'); 
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama WHERE nama_pic='$nama'";
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