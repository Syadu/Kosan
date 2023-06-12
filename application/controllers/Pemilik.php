<?php 
class Pemilik extends CI_Controller
{
	
	function __construct(){
		parent::__construct();		
		$this->load->model('Pemilik_model');
		$this->load->helper('url');
 
	}

	/* Pemilik-REGISTRASI*/
 
	function index(){
		$data['Pemilik'] = $this->Pemilik_model->ambil_data();
		$this->load->view('Pemilik/Login_pemilik',$data);
	}
 
	function daftar(){
		$data = array(
			'aksi' 				=> site_url('Pemilik/daftar_aksi'),
			'nama'		 		=> set_value('nama',$pemilik->nama_pemilik),
			'password' 			=> set_value('password',$pemilik->pass_pemilik),
			'email' 			=> set_value('email',$pemilik->email_pemilik),
			'nohp' 				=> set_value('status',$pemilik->nohp),
			'alamat' 			=> set_value('alamat',$pemilik->alamat_Pemilik),
			'id_Pemilik' 		=> set_value('id_Pemilik',$pemilik->id_Pemilik),
			'button' 			=> 'Daftar'
			);
		$this->load->view('Pemilik/Regis_pemilik',$data);
	}
 	
 	function daftar_aksi(){
	$data = array(	
			'nama_pemilik' 	=> $this->input->post('nama'),
			'pass_pemilik'	=> $this->input->post('password'),
			'email_pemilik' 	=> $this->input->post('email'),
			'nohp' 			=> $this->input->post('nohp'),
			'alamat_pemilik' => $this->input->post('alamat')
 			);
		$this->Pemilik_model->tambah_data($data);
		redirect('LoginPemilik');
	}

/* ADMIN - KELOLA DATA Pemilik*/

	function data_Pemilik()
	{
		//print_r($this->Pemilik_model->ambil_data());
		$data['Pemilik'] = $this->Pemilik_model->ambil_data();
		$this->load->view('Admin/Pemilik_list',$data);
	}


	function delete($id)
	{
		$this->Pemilik_model->hapus_data($id);
		// $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data berhasil dihapus!!</div></div>");
		// redirect(site_url('Pemilik/data_Pemilik'));
	}

	function update($id)
	{
		$Pemilik = $this->Pemilik_model->ambil_data_id($id);
		$data = array(
			'aksi' 				=> site_url('Pemilik/update_aksi'),
			'nama'		 		=> set_value('nama',$pemilik->nama_pemilik),
			'password' 			=> set_value('password',$pemilik->pass_pemilik),
			'email' 			=> set_value('email',$pemilik->email_pemilik),
			'nohp' 				=> set_value('status',$pemilik->nohp),
			'alamat' 			=> set_value('alamat',$pemilik->alamat_pemilik),
			'id_pemilik' 		=> set_value('id_Pemilik',$pemilik->id_pemilik),
			'button' 			=> 'Perbarui'
			);
		$this->load->view('Admin/Pemilik_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'nama_Pemilik' 		=> $this->input->post('nama'),
			'pass_Pemilik'		=> $this->input->post('password'),
			'email_Pemilik' 	=> $this->input->post('email'),
			'nohp' 				=> $this->input->post('nohp'),
			'alamat_Pemilik' 	=> $this->input->post('alamat')
			);	
		$id_Pemilik = $this->input->post('id_Pemilik');
		$this->Pemilik_model->edit_data($id_Pemilik,$data);
		// $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
        redirect('Pemilik/data_Pemilik');
	}

	
}

 ?>