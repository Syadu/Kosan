<?php 
/**
* 
*/
class Pemilik_model extends CI_Model
{
	public $pemilik			= 'pemilik';
	public $id				= 'id_pemilik';
	public $order			= 'ASC';
	public $email 			= 'email_pemilik';

	function __construct()
	{
		parent::__construct();
	}

	function cek_login($email_pemilik,$pass_pemilik)
	{
		$this->db->where('email_pemilik',$email_pemilik);
		$this->db->where('pass_pemilik',$pass_pemilik);
		return $this->db->get($this->pemilik)->row();
	}

	function ambil_data()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->pemilik)->result();//banyak data
	}

	function tambah_data($data)//array
	{
		return $this->db->insert($this->pemilik,$data);
	}

	function ambil_data1($email)
	{
		$this->db->where($this->email,$email);
		return $this->db->get($this->pemilik)->row();
	}

	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->pemilik);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->pemilik,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->pemilik)->row();
	}	
}
?>