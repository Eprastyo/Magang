<?php 
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('t_data_utama');
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
	function jumlah_estimasi(){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti from t_data_utama";
		return $this->db->query($sql);
	}
	function jumlah_real(){
		$sql = "SELECT SUM(real_pendapatan) as tot_real from t_data_utama";
		return $this->db->query($sql);
	} 
	function hasil_grafik(){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama";
		return $this->db->query($sql)->result();
	} 
	function grafik(){
		$query = "SELECT nama_pic,SUM(real_pendapatan) AS tot_real FROM t_data_utama GROUP BY nama_pic ORDER BY tot_real";
        return $this->db->query($query)->result();
	}
	function grafik_pie(){
		$sql = "SELECT SUM(esti_pendapatan) as tot_esti,SUM(real_pendapatan) as tot_real from t_data_utama";
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
}