<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginPemilik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemilik_model');
    }

    public function index()
    {
		if($this->session->userdata('logined') && $this->session->userdata('logined') == true) //jika ada session maka akan ke home
		{
			redirect('Welcome/Home_pemilik');
		}
		
		if(!$this->input->post()) //jika tidak ada input data post maka akan ke halaman login
		{
			$this->load->view('Pemilik/Login_pemilik');
		}
		else
		{
			$cek_login = $this->Pemilik_model->cek_login(
				$this->input->post('email_pemilik'),
				$this->input->post('pass_pemilik')
				);
			if(!empty($cek_login))
			{
				$this->session->set_userdata('logined',true);	
				$this->session->set_userdata('email_pemilik', $cek_login->email_pemilik);
				redirect("Welcome/Home_pemilik");
			}
			else 
			{
	$this->session->set_flashdata('gagal', 'Email atau Password salah!!');
				redirect("/LoginPemilik");
			}
		}
      
    } 
	
	public function logout()
    {
		$this->session->unset_userdata('logined');//hapus session userdata
		redirect("/LoginPemilik");
    } 
}

/* End of file Workflows.php */
/* Location: ./application/controllers/Workflows.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 00:43:10 */
/* http://harviacode.com */