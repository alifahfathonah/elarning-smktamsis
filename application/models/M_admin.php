<?php 

class M_admin extends CI_Model{	
    // admin kelas model
    function admin_kelas()
    {
        return $this->db->query("SELECT * FROM kelas")->result_object();
    }
    
    function admin_add_kelas()
	{
		return $this->db->insert('kelas', ['kelas_nama'=> $this->post['kelas'] ] );
	}
	
	function admin_edit_kelas(){		
		return $this->db->query("SELECT * FROM kelas WHERE kelas_id='{$this->kelas_id}' ")->result_object();
	}

	function admin_update_kelas()
	{
		return $this->db->update('kelas',['kelas_nama'=>$this->post['kelas']], ['kelas_id'=>$this->post['kelas_id']]);
	}

	function admin_delete_kelas()
	{
		return $this->db->delete('kelas', [ 'kelas_id'=>$this->kelas_id ]);
	}
	// admin kelas model

	// admin pelajaran model
	function pelajaran()
	{
		return $this->db->query("SELECT * FROM pelajaran, kelas WHERE kelas.kelas_id=pelajaran.kelas_id")->result_object();
	}

	function admin_add_pelajaran()
	{
		return $this->db->insert('pelajaran', [
			'pelajaran_nama'=> $this->post['pelajaran'],
			'kelas_id'=> $this->post['kelas_id'],
		] );
	}

	function admin_edit_pelajaran(){		
		return $this->db->query("SELECT * FROM pelajaran WHERE pelajaran_id='{$this->pelajaran_id}' ")->row();
	}

	function admin_update_pelajaran()
	{
		return $this->db->update('pelajaran',[
			'pelajaran_nama'=>$this->post['pelajaran'],
			'kelas_id'=>$this->post['kelas_id']
		],
		['pelajaran_id'=>$this->post['pelajaran_id']]);
	}

	function admin_delete_pelajaran()
	{
		return $this->db->delete('pelajaran', [ 'pelajaran_id'=>$this->pelajaran_id ]);
	}
	// admin pelajaran model
}