<?php 
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
		$this->load->helper('string'); 
	}
	
	function staff(){
		if($this->session->userdata('status') == "staff"){
			$tahun = $this->input->post('tahun');
		    $data['data'] = $this->M_data->grafik_pie_staff($tahun);
			$data['hasil_estimasi'] = $this->M_data->jumlah_estimasi_staff($tahun);
			$data['hasil_real'] = $this->M_data->jumlah_real_staff($tahun);
			$data['search'] = $tahun;
			$this->load->view('v_hal_utama_staff',$data);
		}else{
			redirect(base_url('Login'));
		}	
	}

	function manager(){
		if($this->session->userdata('status') == "manager"){
			$tahun = $this->input->post('tahun');
		    $data['hasil'] = $this->M_data->grafik($tahun);
		    $data['data'] = $this->M_data->grafik_pie($tahun);
			$data['hasil_estimasi'] = $this->M_data->jumlah_estimasi($tahun);
			$data['hasil_real'] = $this->M_data->jumlah_real($tahun);
			$data['jml_new'] = $this->M_data->jumlah_new($tahun);
			$data['jml_exist'] = $this->M_data->jumlah_exist($tahun);
			$data['jml_up'] = $this->M_data->jumlah_up($tahun);
			$data['jml_down'] = $this->M_data->jumlah_down($tahun); 
			$data['h_pie'] = $this->M_data->grafik_donut($tahun);
			$data['search'] = $tahun;
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
    public function hapus_pekerjaan($no){
    	$where = array('no' => $no);
    	$this->M_data->hapus_data($where,'t_data_utama');
    	redirect('Admin/monitoring_kerja');
    }
    public function hapus_data_department($id_department){
    	$where = array('id_department' => $id_department);
    	$this->M_data->hapus_data($where,'t_department');
    	redirect('Admin/data_department');
    }
    public function hapus_staff($id_user){
    	$where = array('id_user' => $id_user);
    	$this->M_data->hapus_data($where,'t_data_user');
    	redirect('Admin/daftar_staff');
    }

    function data_tabel(){
    	if($this->session->userdata('status') == "manager"){
			$data['t_data_utama'] = $this->M_data->tampil_data()->result();
			$data['nama_staff'] = $this->M_data->tampil_nama_staff()->result();
			$data['nama_dept'] = $this->M_data->tampil_dept()->result();
			$this->load->view('v_data_tabel',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }
    function monitoring_kerja(){
    	if($this->session->userdata('status') == "manager"){
			$data['t_data_utama'] = $this->M_data->tampil_data()->result();
			$this->load->view('v_tabel_monitoring',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }
     function data_tabel_staff(){
    	if($this->session->userdata('status') == "staff"){
			$data['t_data_utama'] = $this->M_data->tampil_data_staff()->result();
			$this->load->view('v_data_tabel_staff',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

     function data_department(){
    	if($this->session->userdata('status') == "manager"){
			$data['t_department'] = $this->M_data->tampil_dept()->result();
			$this->load->view('v_dept',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

    function daftar_staff(){
    	if($this->session->userdata('status')== "manager"){
    		$data['t_staff'] = $this->M_data->tampil_staff()->result();
    		$data['nama_staff'] = $this->M_data->tampil_nama_staff()->result();
			$data['nama_dept'] = $this->M_data->tampil_dept()->result();
    		$this->load->view('v_daftar_staf',$data);
    	}else{
    		redirect(base_url('Login'));
    	}
    }

    function tambah_data_utama(){
		$nama_pic = $this->input->post('nama');
		$kode_project = $this->input->post('kode_project');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$type = $this->input->post('type');
		$divisi = $this->input->post('divisi');
		$est_pendapatan = $this->input->post('est_pendapatan');
		$real_pendapatan = $this->input->post('real_pendapatan');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'nama_pic' => $nama_pic,
			'kode_project' => $kode_project,
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
	function tambah_data_staff(){
		$nama_staff = $this->input->post('nama');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$sel_nama = $this->M_data->seleksi_nama();
		$data = array(
			'nama' => $nama_staff,
			'password' => $password,
			'level' => $level
			);
		foreach ($sel_nama as $hasil) {
			$cek = $hasil->nama;
		}
		if ($nama_staff == "" || $password == ""){
			echo ("<script LANGUAGE='JavaScript'>
				    window.alert('Nama atau Password Kosong');
				    window.location.href='daftar_staff';
				    </script>");
		}
		elseif ($nama_staff = $cek) {
			echo ("<script LANGUAGE='JavaScript'>
				    window.alert('Nama Sudah Ada');
				    window.location.href='daftar_staff';
				    </script>");
		}
		else{
			$this->M_data->input_data($data,'t_data_user');
			echo ("<script LANGUAGE='JavaScript'>
				    window.alert('Data Berhasil Diinputkan');
				    window.location.href='daftar_staff';
				    </script>");
		}
	 }

	function tambah_data_dept(){
		$nama_dept = $this->input->post('nama');
		$data = array('nama_department' => $nama_dept);
		$this->M_data->input_data($data,'t_department');
		redirect('Admin/data_department');
	}

	function tambah_data(){
		$this->load->view('v_tambah_data_utama');
	}

	function edit($no){
	$where = array('no' => $no);
	$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
	$this->load->view('v_edit_data_utama',$data);
	}

	function edit_pekerjaan($no){
	$where = array('no' => $no);
	$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
	$this->load->view('v_edit_pekerjaan',$data);
	}

	function edit_info_staff($no){
	$where = array('no' => $no);
	$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
	$this->load->view('v_edit_info_staff',$data);
	}

	function edit_staff($id_user){
	$where = array('id_user' => $id_user);
	$data['t_data_staff'] = $this->M_data->edit_data($where,'t_data_user')->result();
	$this->load->view('v_edit_staff',$data);
	}

	function edit_dept($id_department){
		$where = array('id_department' => $id_department);
		$data['t_department'] = $this->M_data->edit_data($where,'t_department')->result();
		$this->load->view('v_edit_dept',$data);
	}

	function update(){
	$no = $this->input->post('no');
	$kode_project = $this->input->post('kode_project');
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
		'kode_project' => $kode_project,
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
	redirect('Admin/data_tabel');
	}

	function update_pekerjaan(){
	$no = $this->input->post('no');
	$kode_project = $this->input->post('kode_project');
	$nama_pic = $this->input->post('nama_pic');
	$nama_project = $this->input->post('nama_project');
	$instansi = $this->input->post('instansi');
	$status = $this->input->post('status');
	$no_spk = $this->input->post('no_spk');
	$tgl_spk = $this->input->post('tgl_spk');
	$info = $this->input->post('info');

	$data = array(
		'no' => $no,
		'kode_project' => $kode_project,
		'nama_pic' => $nama_pic,
		'nama_project' => $nama_project,
		'instansi' => $instansi,
		'status' => $status,
		'no_spk' => $no_spk,
		'tgl_spk' => $tgl_spk,
		'info' => $info,
	);
 
	$where = array(
		'no' => $no
	);
 
	$this->M_data->update_data($where,$data,'t_data_utama');
	redirect('Admin/monitoring_kerja');
	}

	function update_info_staff(){
	$no = $this->input->post('no');
	$nama_project = $this->input->post('nama_project');
	$instansi = $this->input->post('instansi');
	$info = $this->input->post('info');
	$tanggal = $this->input->post('tanggal');
	$status = $this->input->post('status');
	$no_spk = $this->input->post('no_spk');
	$tgl_spk = $this->input->post('tgl_spk');

	$data = array(
		'no' => $no,
		'nama_project' => $nama_project,
		'instansi' => $instansi,
		'info' => $info,
		'tanggal' => $tanggal,
		'status' => $status,
		'no_spk' => $no_spk,
		'tgl_spk' => $tgl_spk,
	);
 
	$where = array(
		'no' => $no
	);
 
	$this->M_data->update_data($where,$data,'t_data_utama');
	redirect('Admin/data_tabel_staff');
	}
	
	function update_staff(){
	$nama = $this->input->post('nama');
	$id_user = $this->input->post('id_user');
	$data = array(
		'id_user' => $id_user,
		'nama' => $nama
	);
 
	$where = array(
		'id_user' => $id_user
	);
 
	$this->M_data->update_data($where,$data,'t_data_user');
	redirect('Admin/daftar_staff');
	}


	function update_dept(){
		$nama = $this->input->post('nama');
		$id_department = $this->input->post('id_department');
		$data = array('id_department' => $id_department ,'nama_department' => $nama);
		$where = array('id_department' =>$id_department);

		$this->M_data->update_data($where,$data,'t_department');
		redirect('Admin/data_department');
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

	public function grafik_d(){
			$hasil_d = $this->M_data->grafik_donut();
		    $responce->cols[] = array( 
		        "id" => "", 
		        "label" => "Topping", 
		        "pattern" => "", 
		        "type" => "string" 
		    ); 
		    $responce->cols[] = array( 
		        "id" => "", 
		        "label" => "Total", 
		        "pattern" => "", 
		        "type" => "number" 
		    ); 
		    foreach($hasil_d as $cd) 
		        { 
		        $responce->rows[]["c"] = array( 
		            array( 
		                "v" => "$cd->divisi", 
		                "f" => null 
		            ) , 
		            array( 
		                "v" => (int)$cd->tot_real, 
		                "f" => null 
		            )
		        );
		        }
		    echo json_encode($responce); 
	}
}