<?php 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
		// $this->load->helper('form');
		// $this->load->helper('url');
 
	}
	
	function staff(){
		if($this->session->userdata('status') == "staff"){
			$this->load->view('v_hal_utama_staff');
		}else{
			redirect(base_url('Login'));
		}	
	}

	function manager(){
		if($this->session->userdata('status') == "manager"){
		    $data['hasil'] = $this->M_data->grafik();
		    $data['data'] = $this->M_data->grafik_pie();
			$data['hasil_estimasi'] = $this->M_data->jumlah_estimasi();
			$data['hasil_real'] = $this->M_data->jumlah_real();
			$this->load->view('v_hal_utama_manager',$data);
		}
		else{
			redirect(base_url('Login'));
		}
	}

	public function hapus_data_staff($no){
    	$where = array('no' => $no);
    	$this->M_data->hapus_data($where,'t_data_utama');
    	redirect('Admin/data_tabel');
    }

    function data_tabel(){
    	$data['t_data_utama'] = $this->M_data->tampil_data()->result();
		$this->load->view('v_data_tabel',$data);
    }

    function tambah_data_utama(){
		$nama_pic = $this->input->post('nama');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$type = $this->input->post('type');
		$divisi = $this->input->post('divisi');
		$est_pendapatan = $this->input->post('est_pendapatan');
		$real_pendapatan = $this->input->post('real_pendapatan');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'nama_pic' => $nama_pic,
			'nama_project' => $nama_project,
			'instansi' => $instansi,
			'type' => $type,
			'divisi' => $divisi,
			'esti_pendapatan' => $est_pendapatan,
			'real_pendapatan' => $real_pendapatan,
			'tanggal' => $tanggal
			);

		$this->M_data->input_data($data,'t_data_utama');
		redirect('Admin/data_tabel');
	}

	function tambah_data(){
		$this->load->view('v_tambah_data_utama');
	}

	function edit($no){
	$where = array('no' => $no);
	$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
	$this->load->view('v_edit_data_utama',$data);
	}

	function update(){
	$no = $this->input->post('no');
	$nama = $this->input->post('nama_pic');
	$nama_project = $this->input->post('nama_project');
	$instansi = $this->input->post('instansi');
	$type = $this->input->post('type');
	$divisi = $this->input->post('divisi');
	$est_pendapatan = $this->input->post('est_pendapatan');
	$real_pendapatan = $this->input->post('real_pendapatan');
	$tanggal = $this->input->post('tanggal');

	$data = array(
		'no' => $no,
		'nama_pic' => $nama,
		'nama_project' => $nama_project,
		'instansi' => $instansi,
		'type' => $type,
		'divisi' => $divisi,
		'esti_pendapatan' => $est_pendapatan,
		'real_pendapatan' => $real_pendapatan,
		'tanggal' => $tanggal
	);
 
	$where = array(
		'no' => $no
	);
 
	$this->M_data->update_data($where,$data,'t_data_utama');
	redirect('Admin/manager');
}
	function type(){
 	$data = array('get_category'=> $this->M_data->pilihan_type());  
 	$this->load->view('v_tambah_data_utama',$data);
	}

	function data_grafik(){
 		  		$data  = $this->M_data->hasil_grafik();
 			
				$asd->cols[] = array( 
		            "id" => "", 
		            "label" => "Topping", 
		            "pattern" => "",
		            "type" => "string"
		        ); 
		        $asd->cols[] = array( 
		            "id" => "", 
		            "label" => "Total_esti", 
		            "pattern" => "", 
		            "type" => "number" 
		        );

		        foreach($data as $cd){ 
		        $asd->rows[]["c"] = array( 
		                array( 
		                    "v" => "", 
		                    "f" => "Total Estimasi Pendapatan"
		                ),
		                array( 
		                    "v" => (int)$cd->tot_esti,
		                    "f" => null
		                )
		            );
		        }
        echo json_encode($asd);   
	}

	function coba(){
		// $data['data']  = $this->M_data->coba();
		$this->load->view('v_grafik_coba');
	}

	function model(){
		$this->load->view('v_model');
	}
}