<?php
class Staff extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper(array('url','download'));
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
			$this->load->view('Staff/v_hal_utama_staff',$data);
		}else{
			redirect(base_url('Login'));
		}
	}

	function data_tabel_staff(){
    	if($this->session->userdata('status') == "staff"){
			$data['t_data_utama'] = $this->M_data->tampil_data_staff()->result();
			$this->load->view('Staff/v_data_tabel_staff',$data);
		}
		else{
			redirect(base_url('Login'));
		}
    }

    function daily_report_staff(){
		 if($this->session->userdata('status') == "staff"){
		 $data['t_data_report'] = $this->M_data->tampil_data_report()->result();
		 $this->load->view('Staff/v_daily_report_staff',$data);
	 	 }
	 	 else{
		 redirect(base_url('Login'));
	 	}
	}

	function tampil_log_staff(){
		$nama_pic = $this->input->get('nama_pic');
		$nama_project = $this->input->get('nama_project');
		$instansi = $this->input->get('instansi');

		$where = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);
		$data ["data_log"] = $this->M_data->log_detail($where,'t_log')->result();
		$this->load->view('Staff/v_detail_log_staff',$data);
	}

	function kembali_log_staff(){
		$nama_pic = $this->input->get('nama_pic');
		$nama_project = $this->input->get('nama_project');
		$instansi = $this->input->get('instansi');

		$where = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);
		$data ["data_log"] = $this->M_data->log_detail($where,'t_log')->result();
		$this->load->view('Staff/v_detail_log_staff',$data);
	}

	function update_progres_staff(){
		$nama_pic = $this->input->get('nama_pic');
		$nama_project = $this->input->get('nama_project');
		$instansi = $this->input->get('instansi');

		$where = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);

		$data['edit_prog'] = $this->M_data->tampil_update_log($where,'t_data_utama')->result();
		$this->load->view('Staff/v_update_prog_staff',$data);
	}

	public function tambah_log_staff(){ 
		$nama_pic = $this->input->post('nama_pic');
		$nama_project = $this->input->post('nama_project');
		$instansi = $this->input->post('instansi');
		$rincian_log = $this->input->post('rincian');

		$progres = $this->input->post('progres');
		$tanggal_update = $this->input->post('tgl_update');

		$data = array(
			'progres' => $progres,
			'tanggal_update' => $tanggal_update,
		);

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['remove_spaces']		= TRUE;
		// $config['overwrite']			= TRUE;
        $config['max_size']             = '2048000';
        $config['max_filename']			= '0';

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');

        $data_image	= $this->upload->data();
  		$file_name  =   $data_image['file_name'];
		$location	= '';
		$pict		= $location.$file_name;

          
		$data_log = array('nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi,'rincian_log' => $rincian_log,'progress_log' => $progres,'update_log' => $tanggal_update,'file' => $pict);

		$where = array(	'nama_pic' => $nama_pic,'nama_project' => $nama_project,'instansi' => $instansi);

		$this->M_data->update_data($where,$data,'t_data_utama');
		$this->M_data->tambah_log ($data_log,'t_log');

		$email   ="dodih127@gmail.com";
		$subject ="Time Excelindo";
		$message ="Test Boy";
		$this->sendEmail($email,$subject,$message);

		redirect('Staff/daily_report_staff');
	}
	
	public function tampil_detail_log_staff(){
    	$id_log = $this->input->get('id_log');
    	$hasil  = array('id_log' => $id_log);
    	$t['data_log'] = $this->M_data->tampil_detail_log($hasil,'t_log')->result();
		$this->load->view('Staff/v_detail_rincian_staff',$t);
    }

    public function download($filename = NULL){		
  		$file = $this->input->get('file');
  		$data = array('file' => $file);		
		// force_download('$data',NULL);
		// force_download('uploads/1.JPG',NULL);

		// $this->load->helper('download');
	    // read file contents
	    // $hasil = file_get_contents(base_url('/uploads/'.NULL));
	    // force_download(NULL, $hasil);

	    $this->load->helper('download');
	    $data = file_get_contents(base_url('/uploads/'.$filename));
	    force_download($filename, $data);
		
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
}
?>