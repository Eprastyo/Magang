<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('string');
	}

	function admin(){
		if($this->session->userdata('status') == "admin"){
			$tahun = $this->input->post('tahun');
		    $data['hasil'] = $this->M_data->grafik($tahun);
		    $data['data'] = $this->M_data->grafik_pie($tahun);
			$data['hasil_estimasi'] = $this->M_data->jumlah_estimasi($tahun);
			$data['hasil_tabel'] = $this->M_data->tabel_grafik($tahun);
			$data['hasil_real'] = $this->M_data->jumlah_real($tahun);
			$data['jml_new'] = $this->M_data->jumlah_new($tahun);
			$data['jml_exist'] = $this->M_data->jumlah_exist($tahun);
			$data['jml_up'] = $this->M_data->jumlah_up($tahun);
			$data['jml_down'] = $this->M_data->jumlah_down($tahun);
			$data['h_pie'] = $this->M_data->grafik_donut($tahun);
			$data['search'] = $tahun;
			$this->load->view('Admin/v_hal_utama_admin',$data);
		}
		else{
			redirect(base_url('Login'));
		}
	}
	public function hapus_data_staff(){
		$no = $this->input->get('no');
		$nama_pic = $this->input->get('nama_pic');
		$nama_project = $this->input->get('nama_project');
		$instansi = $this->input->get('instansi');

    	$where = array('no' => $no);
    	$where_data = array('nama_pic' => $nama_pic ,'nama_project' => $nama_project, 'instansi' => $instansi);

    	$this->M_data->hapus_data($where,'t_data_utama');
    	$this->M_data->hapus_data($where_data,'t_group_mail');
    	$this->M_data->hapus_data($where_data,'t_log');
    	redirect('Admin/data_tabel_admin');
    }
    public function hapus_prog_utama(){
    	$no = $this->input->get('no');
    	$nama_pic = $this->input->get('nama_pic');
    	$nama_project = $this->input->get('nama_project');
    	$instansi = $this->input->get('instansi');
    	$progres = $this->input->get('progres');

    	$where = array('no' => $no,'nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi,'progres' => $progres,);
    	$this->M_data->hapus_data($where,'t_data_utama');
    	redirect('Admin/daily_report_admin');
    }
    public function hapus_log(){
    	$id_log = $this->input->get('id_log');
    	$nama_pic = $this->input->get('nama_pic');
    	$nama_project = $this->input->get('nama_project');
    	$instansi = $this->input->get('instansi');

    	$where = array('id_log' => $id_log);
    	$this->M_data->hapus_data($where,'t_log');

    	$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);
    }

  //   public function tampil_detail_log(){
  //   	$id_log = $this->input->get('id_log');
  //   	$hasil  = array('id_log' => $id_log);
  //   	$t['data_log'] = $this->M_data->tampil_detail_log($hasil,'t_log')->result();
		// $this->load->view('v_detail_rincian',$t);
  //   }
  
    public function hapus_rincian(){
    	$id_detail = $this->input->get('id_detail');
    	$nama_pic = $this->input->get('nama_pic');
    	$nama_project = $this->input->get('nama_project');
    	$instansi = $this->input->get('instansi');

    	$where = array('id_detail' => $id_detail);
    	$this->M_data->hapus_data($where,'t_detail');

    	$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);
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

    function data_tabel_admin(){
    	if($this->session->userdata('status') == "admin"){
			$data['t_data_utama'] = $this->M_data->get_data('t_data_utama')->result();
			$data['nama_staff'] = $this->M_data->tampil_nama_staff()->result();
			$data['nama_dept'] = $this->M_data->tampil_dept()->result();
			$data['mail_data'] = $this->M_data->get_data('t_data_user')->result();
			$this->load->view('Admin/v_data_tabel_admin',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

    function monitoring_kerja(){
    	if($this->session->userdata('status') == "admin"){
			$data['t_data_utama'] = $this->M_data->get_data('t_data_utama')->result();
			$this->load->view('Admin/v_tabel_monitoring_admin',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

	function daily_report_admin(){
		 if($this->session->userdata('status') == "admin"){
		 $data['t_data_report'] = $this->M_data->tampil_daily_report()->result();
		 $this->load->view('Admin/v_daily_report_admin',$data);
	 }
	 else{
		 redirect(base_url('Login'));
	 }
	 }

    function data_department_admin(){
    	if($this->session->userdata('status') == "admin"){
			$data['t_department'] = $this->M_data->tampil_dept()->result();
			$this->load->view('Admin/v_dept_admin',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

    function daftar_staff(){
    	if($this->session->userdata('status')== "admin"){
    		$data['t_staff'] = $this->M_data->tampil_staff()->result();
    		$data['nama_staff'] = $this->M_data->tampil_nama_staff()->result();
			$data['nama_dept'] = $this->M_data->tampil_dept()->result();
    		$this->load->view('Admin/v_daftar_staf_admin',$data);
    	}else{
    		redirect(base_url('Login'));
    	}
    }

    function tambah_data_utama(){
		$nama_pic = $this->input->post('nama');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$type = $this->input->post('type');
		$divisi = $this->input->post('divisi');
		$est_pendapatan = $this->input->post('est_pendapatan');
		$tanggal = $this->input->post('tanggal');
		$pic_instansi = $this->input->post('pic_instansi');
		$no_telp = $this->input->post('no_telp');

		$email = $this->input->post('group_mail');
		$data_email = implode(",",$email);

		$data = array(
			'nama_pic' => $nama_pic,
			'nama_project' => $nama_project,
			'instansi' => $instansi,
			'type' => $type,
			'divisi' => $divisi,
			'esti_pendapatan' => $est_pendapatan,
			'tanggal' => $tanggal,
			'pic_instansi' => $pic_instansi,
			'no_telp' => $no_telp,
			'email_group' => $data_email,
			);

		$this->M_data->input_data($data,'t_data_utama');
		redirect('Admin/data_tabel_admin');
	}

	function tambah_data_report(){
		$nama_pic = $this->input->post('nama_pic');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$rincian = $this->input->post('rincian');
		$progres = $this->input->post('progres');
		$tanggal_update = $this->input->post('tanggal_update');

		$data = array(
			'nama_pic' => $nama_pic,
			'nama_project' => $nama_project,
			'instansi' => $instansi,
			'rincian' => $rincian,
			'progres' => $progres,
			'tgl_update' => $tanggal_update,
			);
		$log = array('nama_project' => $nama_project,
			'instansi' => $instansi,
			'nama_pic' => $nama_pic,
			'rincian_log'  => $rincian,
			'progress_log' => $progres,
			'update_log' => $tanggal_update,);

		$this->M_data->input_data($data,'t_detail');
		$this->M_data->input_data($log,'t_log');

		$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);
	}

	function update_progres(){
		$id_detail = $this->input->post('id_detail');
		$rincian = $this->input->post('rincian');
		$progres = $this->input->post('progres');
		$tanggal_update = $this->input->post('tgl_update');

		$nama_pic = $this->input->post('nama_pic');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');

		$data_log = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi,'rincian_log' => $rincian,'progress_log' => $progres,'update_log' => $tanggal_update);

		$this->M_data->tambah_log ($data_log,'t_log');


		$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);

		$data = array(
			'id_detail' => $id_detail,
			'rincian' => $rincian,
			'progres' => $progres,
			'tgl_update' => $tanggal_update,
		);

		$where = array('id_detail' => $id_detail);

		$this->M_data->update_data($where,$data,'t_detail');
	}

	function update_progres_admin(){
		$id_detail = $this->input->post('id_detail');
		$rincian = $this->input->post('rincian');
		$progres = $this->input->post('progres');
		$tanggal_update = $this->input->post('tgl_update');

		$nama_pic = $this->input->post('nama_pic');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');


		$data = array(
			'id_detail' => $id_detail,
			'rincian' => $rincian,
			'progres' => $progres,
			'tgl_update' => $tanggal_update,
		);

		$data_log = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi,'rincian_log' => $rincian,'progress_log' => $progres,'update_log' => $tanggal_update);

		$where = array('id_detail' => $id_detail);

		$this->M_data->update_data($where,$data,'t_detail');
		$this->M_data->tambah_log ($data_log,'t_log');

		$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);
	}
	
	function tambah_log(){ 
		$nama_pic = $this->input->post('nama_pic');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$rincian_log = $this->input->post('rincian');
		$detail_rincian = $this->input->post('detail_rincian');

		$progres = $this->input->post('progres');
		$tanggal_update = $this->input->post('tgl_update');

		$data = array(
			'progres' => $progres,
			'tanggal_update' => $tanggal_update,
		);

		$data_log = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi,'rincian_log' => $rincian_log,'detail_rincian' => $detail_rincian,'progress_log' => $progres,'update_log' => $tanggal_update);

		$where = array(	'nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);

		$this->M_data->update_data($where,$data,'t_data_utama');
		$this->M_data->tambah_log ($data_log,'t_log');

		redirect('Admin/daily_report_staff');
	}

	function update_progres_utama(){
		$rincian_log = $this->post('rincian');
		$detail_rincian = $this->post('detail_rincian');
		$progres = $this->input->post('progres');
		$nama_project = $this->input->post('nama_project');
		$tanggal_update = $this->input->post('tgl_update');
		$instansi = $this->input->post('instansi');
		$nama_pic = $this->input->post('nama_pic');

		$data_log = array(
			'rincian_log' => $rincian_log,
			'detail_rincian' => $detail_rincian,
			'progress_log' => $progres,
			'nama_project' => $nama_project,
			'update_log' => $tanggal_update,
			'instansi' => $instansi,
			'nama_pic' => $nama_pic,
		);

		$this->M_data->tambah_log($data_log,'t_log');
		redirect('Admin/daily_report_staff');

		// $hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		// $t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		// $t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		// $t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		// $this->load->view('v_data_detail',$t);
	}
	function update_progres_utama_admin(){
		$no = $this->input->post('no');
		$progres = $this->input->post('progres');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$tanggal_update = $this->input->post('tgl_update');
		$nama_pic = $this->input->post('nama_pic');

		$data = array(
			'no' => $no,
			'progres' => $progres,
			'tanggal_update' => $tanggal_update,
			'instansi' => $instansi,
			'nama_project' => $nama_project,
			'nama_pic' => $nama_pic,
		);

		$data_log = array(
			'prog_log_utama' => $progres,
			'update_log_utama' => $tanggal_update,
			'instansi' => $instansi,
			'nama_project' => $nama_project,
			'nama_pic' => $nama_pic,
		);

		$where = array(
			'no' => $no
		);

		$this->M_data->tambah_log($data_log,'t_log');
		$this->M_data->update_data($where,$data,'t_data_utama');

		$hasil = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$t ['prog_detail'] = $this->M_data->prog_detail($hasil,'t_detail')->result();
		$t ['t_data_report'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();
		$t ['t_data_input'] = $this->M_data->prog_detail($hasil,'t_data_utama')->result();

		$this->load->view('Admin/v_data_detail_admin',$t);
	}

	function tambah_data_staff(){
		$nama_staff = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$sel_nama = $this->M_data->seleksi_nama();
		$data = array(
			'nama' => $nama_staff,
			'password' => $password,
			'level' => $level,
			'email' => $email
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
		elseif ($nama_staff == $cek) {
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
		$this->load->view('Admin/v_tambah_data_utama');
	}

	function edit($no){
		$where = array('no' => $no);
		$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
		$this->load->view('Admin/v_edit_data_utama',$data);
	}

	function edit_pekerjaan($no){
		$where = array('no' => $no);
		$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
		$this->load->view('Admin/v_edit_pekerjaan',$data);
	}

	function edit_info_staff($no){
		$where = array('no' => $no);
		$data['t_data_utama'] = $this->M_data->edit_data($where,'t_data_utama')->result();
		$this->load->view('Admin/v_edit_info_staff',$data);
	}

	function edit_progres($id_detail){
		$where = array('id_detail' => $id_detail);
		$data['edit_prog'] = $this->M_data->edit_data($where,'t_detail')->result();
		$this->load->view('Admin/v_edit_progres',$data);
	}

	function edit_progres_admin($id_detail){
		$where = array('id_detail' => $id_detail);
		$data['edit_prog'] = $this->M_data->edit_data($where,'t_detail')->result();
		$this->load->view('v_edit_progres_admin',$data);
	}
	
	function edit_progres_utama_admin(){
		$no = $this->input->get('no');
		$where = array('no' => $no);
		$data['edit_prog'] = $this->M_data->edit_data($where,'t_data_utama')->result();
		$this->load->view('Admin/v_edit_prog_utama_admin',$data);
	}

	function detail_project_admin(){
		$instansi = $this->input->get('instan');
		$nama_pic = $this->input->get('nama');
		$nama_project = $this->input->get('project');

		$where = array('nama_pic' => $nama_pic,'instansi' => $instansi,'nama_project' =>$nama_project);
		$data ['data_log'] = $this->M_data->prog_detail_manager($where,'t_log')->result();
		$this->load->view('Admin/v_data_detail_admin',$data);
	}

	function tampil_log_admin(){
		$nama_pic = $this->input->get('nama_pic');
		$nama_project = $this->input->get('nama_project');
		$instansi = $this->input->get('instansi');

		$where = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);
		$data ["data_log"] = $this->M_data->log_detail($where,'t_log')->result();
		$this->load->view('Admin/v_detail_log_admin',$data);
	}

	function edit_staff($id_user){
		$where = array('id_user' => $id_user);
		$data['t_data_staff'] = $this->M_data->edit_data($where,'t_data_user')->result();
		$this->load->view('Admin/v_edit_staff_admin',$data);
	}

	function edit_dept($id_department){
		$where = array('id_department' => $id_department);
		$data['t_department'] = $this->M_data->edit_data($where,'t_department')->result();
		$this->load->view('Admin/v_edit_dept_admin',$data);
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
		$pic_instansi = $this->input->post('pic_instansi');
		$no_telp = $this->input->post('no_telp');
		
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
			'pic_instansi' => $pic_instansi,
			'no_telp' => $no_telp,
		);

		$where = array(
			'no' => $no
		);

		$this->M_data->update_data($where,$data,'t_data_utama');
		redirect('Admin/data_tabel_admin');
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
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$data = array(
			'id_user' => $id_user,
			'nama' => $nama,
			'email' => $email
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
	 	$this->load->view('Admin/v_tambah_data_utama',$data);
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

	function grafik_d(){
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
	public function detail_log_admin(){
    	$id_log = $this->input->get('id_log');
    	$hasil  = array('id_log' => $id_log);
    	$t['data_log'] = $this->M_data->tampil_detail_log($hasil,'t_log')->result();
		$this->load->view('Admin/v_detail_log_admin',$t);
    }
    public function setemail(){
		$email   ="prastyo050497@gmail.com";
		$subject ="Time Excelindo";
		$message ="Test";
		$this->sendEmail($email,$subject,$message);
	}

	public function sendEmail($email,$subject,$message){
		    $config = Array(
		      'protocol' => 'smtp',
		      'smtp_host' => 'ssl://smtp.googlemail.com',
		      'smtp_port' => 465,
		      'smtp_user' => 'eekoprastyoo@gmail.com', 
		      'smtp_pass' => 'Becakgaul54', 
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
		    );
		       $this->load->library('email', $config);
		       $this->email->set_newline("\r\n");
		       $this->email->from('eekoprastyoo@gmail.com');
		       $this->email->to($email);
		       $this->email->subject($subject);
		       $this->email->message($message);
		       // $this->email->attach('C:\xampp\htdocs\Magang\uploads\asd.jpg');
		  
		       if($this->email->send()){
		          echo 'Email send.';
		         }else{
		         show_error($this->email->print_debugger());
		}
	}
	
	public function download($filename = NULL){		
  		$file = $this->input->get('file');
  		$data = array('file' => $file);		
	    $this->load->helper('download');
	    $data = file_get_contents(base_url('/uploads/'.$filename));
	    force_download($filename, $data);	
	}
	function coba(){
		$this->load->view('coba');
	}
}

