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

	// admin data guru model
	function admin_data_guru()
	{
		return $this->db->query("SELECT * FROM guru")->result_object();
	}

	function admin_add_data_guru()
	{
		return $this->db->insert('guru', [
			'guru_nip'=> $this->post['nip'],
			'guru_nama'=> $this->post['nama'],
			'guru_username'=> $this->post['username'],
			'guru_password'=> $this->post['password'],
			'guru_level'=> 'guru',
			'guru_telp'=> $this->post['telp'],
			'guru_alamat'=> $this->post['alamat'],
			'guru_email'=> $this->post['email'],
		] );
	}

	function admin_edit_data_guru(){		
		return $this->db->query("SELECT * FROM guru WHERE guru_id='{$this->guru_id}' ")->row();
	}

	function admin_update_data_guru()
	{
		return $this->db->update('guru',[
			'guru_nip'=>$this->post['nip'],
			'guru_nama'=>$this->post['nama'],
			'guru_username'=>$this->post['username'],
			'guru_password'=>$this->post['password'],
			'guru_telp'=>$this->post['telp'],
			'guru_alamat'=>$this->post['alamat'],
			'guru_email'=>$this->post['email'],
		],
		['guru_id'=>$this->post['guru_id']]);
	}

	function admin_delete_data_guru()
	{
		return $this->db->delete('guru', [ 'guru_id'=>$this->guru_id ]);
	}
	// admin data guru model

	// admin data siswa model
	function admin_data_siswa()
	{
		return $this->db->query("SELECT * FROM siswa,kelas WHERE kelas.kelas_id=siswa.kelas_id")->result_object();
	}

	function admin_add_data_siswa()
	{
		return $this->db->insert('siswa', [
			'siswa_nis'=> $this->post['nis'],
			'siswa_nama'=> $this->post['nama'],
			'siswa_username'=> $this->post['username'],
			'siswa_password'=> $this->post['password'],
			'siswa_level'=> 'siswa',
			'siswa_telp'=> $this->post['telp'],
			'siswa_alamat'=> $this->post['alamat'],
			'siswa_email'=> $this->post['email'],
			'kelas_id'=> $this->post['kelas_id'],
		] );
	}

	function admin_edit_data_siswa(){		
		return $this->db->query("SELECT * FROM siswa WHERE siswa_id='{$this->siswa_id}' ")->row();
	}

	function admin_update_data_siswa()
	{
		return $this->db->update('siswa',[
			'siswa_nis'=>$this->post['nis'],
			'siswa_nama'=>$this->post['nama'],
			'siswa_username'=>$this->post['username'],
			'siswa_password'=>$this->post['password'],
			'siswa_telp'=>$this->post['telp'],
			'siswa_alamat'=>$this->post['alamat'],
			'siswa_email'=>$this->post['email'],
			'kelas_id'=>$this->post['kelas_id'],
		],
		['siswa_id'=>$this->post['siswa_id']]);
	}

	function admin_delete_data_siswa()
	{
		return $this->db->delete('siswa', [ 'siswa_id'=>$this->siswa_id ]);
	}
	// admin data guru model

	// cek user already
	function cek_user_admin()
	{
		return $this->db->query("SELECT * FROM admin WHERE admin_username='{$this->username}' ")->num_rows();
	}
	function cek_user_guru()
	{
		return $this->db->query("SELECT * FROM guru WHERE guru_username='{$this->username}' ")->num_rows();
	}
	function cek_user_siswa()
	{
		return $this->db->query("SELECT * FROM siswa WHERE siswa_username='{$this->username}' ")->num_rows();
	}
	// cek user already
}