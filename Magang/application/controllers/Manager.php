<?php
class Manager extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('string');	
	}

	function manager(){
		if($this->session->userdata('status') == "manager"){
			$tahun = $this->input->post('tahun');
		    $data['hasil'] = $this->M_data->grafik($tahun);
		    $data['hasil_tabel'] = $this->M_data->tabel_grafik($tahun);
		    $data['data'] = $this->M_data->grafik_pie($tahun);
			$data['hasil_estimasi'] = $this->M_data->jumlah_estimasi($tahun);
			$data['hasil_real'] = $this->M_data->jumlah_real($tahun);
			$data['jml_new'] = $this->M_data->jumlah_new($tahun);
			$data['jml_exist'] = $this->M_data->jumlah_exist($tahun);
			$data['jml_up'] = $this->M_data->jumlah_up($tahun);
			$data['jml_down'] = $this->M_data->jumlah_down($tahun);
			$data['h_pie'] = $this->M_data->grafik_donut($tahun);
			$data['search'] = $tahun;
			$this->load->view('Manager/v_hal_utama_manager',$data);
		}
		else{
			redirect(base_url('Login'));
		}
	}
	public function detail_log_manager(){
    	$id_log = $this->input->get('id_log');
    	$hasil  = array('id_log' => $id_log);
    	$t['data_log'] = $this->M_data->tampil_detail_log($hasil,'t_log')->result();
		$this->load->view('Manager/v_detail_log_manager',$t);
    }

    function daily_report_manager(){
		 if($this->session->userdata('status') == "manager"){
		 $data['t_data_report'] = $this->M_data->tampil_daily_manager()->result();
		 $this->load->view('Manager/v_daily_report_manager',$data);
	 }
	 else{
		 redirect(base_url('Login'));
	 }
	 }

	function detail_project_manager(){
		$instansi = $this->input->get('instan');
		$nama_pic = $this->input->get('nama');
		$nama_project = $this->input->get('project');

		$where = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$data ['data_log'] = $this->M_data->prog_detail_manager($where,'t_log')->result();
		$this->load->view('Manager/v_data_detail_manager',$data);
	}

	function tambah_komentar(){
		$id_log = $this->input->post('id_log');
		$komentar = $this->input->post('komentar');

		$data = array('komentar' => $komentar);
		$where = array('id_log' => $id_log);

		$this->M_data->input_data_komen($where,'t_log',$data);
		redirect('Manager/daily_report_manager');
	}
}
?>