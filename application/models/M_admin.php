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

	// admin data admin model
	function admin_data_admin()
	{
		return $this->db->query("SELECT * FROM admin")->result_object();
	}

	function admin_add_data_admin()
	{
		return $this->db->insert('admin', [
			'admin_username'=> $this->post['username'],
			'admin_nama'=> $this->post['nama'],
			'no_telp'=> $this->post['telp'],
			'email'=> $this->post['email'],
			'alamat'=> $this->post['alamat'],
			'admin_level'=> 'admin',
			'admin_password'=> $this->post['password']
			] );
	}
		
	function admin_edit_data_admin(){		
		return $this->db->query("SELECT * FROM admin WHERE admin_id='{$this->admin_id}' ")->row();
	}
	
	function admin_update_data_admin()
	{
		return $this->db->update('admin',[
			'admin_username'=> $this->post['username'],
			'admin_nama'=> $this->post['nama'],
			'no_telp'=> $this->post['telp'],
			'email'=> $this->post['email'],
			'alamat'=> $this->post['alamat'],
			'admin_level'=> 'admin',
		],
		['admin_id'=>$this->post['admin_id']]);
	}

	function admin_delete_data_admin()
	{
		return $this->db->delete('admin', [ 'admin_id'=>$this->admin_id ]);
	}
	// admin data admin model

	// guru add data materi
	function guru_data_materi()
	{
		return $this->db->query("
			SELECT *
			FROM materi
				LEFT JOIN pbm
					ON materi.pelajaran_id=pbm.pelajaran_id
				LEFT JOIN pelajaran
					ON materi.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
			WHERE pbm.guru_id='{$this->session->userdata["id"]}'
			ORDER BY materi.tanggal_upload DESC
		")->result_object();
	}
	public function guru_data_materi_input_pelajaran()
	{
		return $this->db->query("
			SELECT *
			FROM pbm
				LEFT JOIN pelajaran
					ON pbm.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
			WHERE pbm.guru_id='{$this->guru_id}' 
		")->result_object();
	}

	function guru_add_data_materi()
	{
		return $this->db->insert('materi', [
			'judul_materi'=> $this->post['judul_materi'],
			'pelajaran_id'=> $this->post['pelajaran_id'],
			'tanggal_upload'=> date('Y-m-d'),
			'nama_file'=> $this->post['upload_data']['file_name'],
		] );
	}
	
	function guru_edit_data_materi()
	{
		return $this->db->query("
			SELECT *
			FROM materi
			WHERE materi_id='{$this->materi_id}'
		")->row();
	}

	public function guru_update_materi()
	{
		$_data= [
			'judul_materi'=> $this->post['judul_materi'],
			'pelajaran_id'=> $this->post['pelajaran_id']
		];
		if ( ! empty($this->post['nama_file']) ) {
			$_data['nama_file']= $this->post['nama_file'];
		}
		return $this->db->update('materi',$_data,['materi_id'=>$this->post['materi_id']]);
	}

	public function guru_delete_materi()
	{
		return $this->db->delete('materi', [ 'materi_id'=>$this->materi_id ]);
	}
	// guru add data materi

	// guru add data upload
	function guru_data_upload()
	{
		return $this->db->query("
			SELECT *
			FROM soal
				LEFT JOIN materi
					ON soal.materi_id=materi.materi_id
				LEFT JOIN pelajaran
					ON materi.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
				ORDER BY soal.tanggal_upload DESC
		")->result_object();
	}

	function guru_add_data_upload()
	{
		return $this->db->insert('soal', [
			'nama_soal'=> $this->post['nama_soal'],
			'materi_id'=> $this->post['materi_id'],
			'tanggal_upload'=> date('Y-m-d'),
			'nama_file'=> $this->post['upload_data']['file_name'],
			// 'file'=> $this->post['upload_data']['file_type'],
			// 'file'=> $this->post['upload_data']['file_ext'],
			] );
	}

	public function guru_edit_data_upload()
	{
		return $this->db->query("SELECT * FROM soal WHERE soal_id='{$this->soal_id}' ")->row();
	}

	public function guru_update_upload()
	{
		$_data= [
			'nama_soal'=> $this->post['nama_soal'],
			'materi_id'=> $this->post['materi_id']
		];
		if ( ! empty($this->post['nama_file']) ) {
			$_data['nama_file']= $this->post['nama_file'];
		}
		return $this->db->update('soal',$_data,['soal_id'=>$this->post['soal_id']]);
	}
	public function guru_delete_upload()
	{
		return $this->db->delete('soal', [ 'soal_id'=>$this->soal_id ]);
	}
	public function siswa_store_jawaban()
	{
		return $this->db->insert('jawaban', [
			'soal_id'=> $this->post['soal_id'],
			'nama_file'=> $this->post['nama_file'],
			'siswa_id'=> $this->session->userdata['id'],
			// 'file'=> $this->post['upload_data']['file_type'],
			// 'file'=> $this->post['upload_data']['file_ext'],
		] );
	}
	// guru add data upload

	// start guru data download
	public function guru_data_download()
	{
		return $this->db->query("
			SELECT 
				jawaban.nama_file,
				siswa.siswa_nama,
				soal.nama_soal,
				kelas.kelas_nama
			FROM jawaban
				LEFT JOIN siswa
					ON jawaban.siswa_id=jawaban.siswa_id
				LEFT JOIN soal
					ON jawaban.soal_id=soal.soal_id
				LEFT JOIN materi
					ON soal.materi_id=materi.materi_id
				LEFT JOIN pbm
					ON materi.pelajaran_id=pbm.pelajaran_id
				LEFT JOIN pelajaran
					ON materi.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
			WHERE pbm.guru_id='{$this->session->userdata["id"]}'
		")->result_object();
	}
	// end guru data download

	// start guru siswa belum kumpul
	public function guru_siswa_belum_kumpul()
	{
		return $this->db->query("
			SELECT
				soal.nama_soal,
				siswa.siswa_nama,
				kelas.kelas_nama
			FROM soal
				LEFT JOIN materi
					ON soal.materi_id=materi.materi_id
				LEFT JOIN pbm
					ON materi.pelajaran_id=pbm.pelajaran_id
				LEFT JOIN pelajaran
					ON pbm.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
				LEFT JOIN siswa
					ON pbm.siswa_id=siswa.siswa_id
			WHERE NOT EXISTS (SELECT jawaban_id
								FROM jawaban
								WHERE jawaban.soal_id = soal.soal_id AND jawaban.siswa_id = pbm.siswa_id)
				AND pbm.guru_id='{$this->session->userdata["id"]}'
		")->result_object();
	}
	// end guru siswa belum kumpul
	
	// start admin_pbm model
	public function admin_pbm()
	{
		return $this->db->query("
		SELECT pbm.tahun_ajaran,siswa.siswa_nis,siswa.siswa_nama,kelas.kelas_nama,pelajaran.pelajaran_nama,guru.guru_nama
		FROM pbm
        	LEFT JOIN siswa
				ON pbm.siswa_id = siswa.siswa_id
            LEFT JOIN pelajaran
				ON pbm.pelajaran_id = pelajaran.pelajaran_id
            LEFT JOIN guru
				ON pbm.guru_id = guru.guru_id
            LEFT JOIN kelas
				ON pelajaran.kelas_id = kelas.kelas_id
		")->result_object();
	}
	public function admin_pbm_siswa()
	{
		return $this->db->query("SELECT * FROM siswa WHERE siswa_nis='{$this->post["nis"]}' ");
	}
	public function admin_pbm_pelajaran()
	{
		return $this->db->query("
			SELECT pelajaran_id, pelajaran_nama,kelas_nama 
				FROM   pelajaran
					LEFT JOIN kelas
						ON pelajaran.kelas_id=kelas.kelas_id
				WHERE pelajaran_id
					NOT IN (SELECT pelajaran_id FROM pbm WHERE siswa_id='{$this->siswa_id}')
		")->result_object();
	}
	public function admin_add_pbm()
	{
		return $this->db->insert('pbm', [
			'tahun_ajaran'=> $this->post['tahun_ajaran'],
			'siswa_id'=> $this->post['siswa_id'],
			'pelajaran_id'=> $this->post['pelajaran_id'],
			'guru_id'=> $this->post['guru_id'],
		] );
	}
	// end admin_pbm model
	
	// start siswa materi model
	public function siswa_data_materi()
	{
		return $this->db->query("
			SELECT *
			FROM materi
				LEFT JOIN pbm
					ON materi.pelajaran_id=pbm.pelajaran_id
				LEFT JOIN pelajaran
					ON materi.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN kelas
					ON pelajaran.kelas_id=kelas.kelas_id
			WHERE pbm.siswa_id='{$this->session->userdata["id"]}'
		")->result_object();
	}
	// end siswa materi model

	// start siswa tugas upload model
	public function siswa_data_upload()
	{
		return $this->db->query("
			SELECT 
				soal.*,
				soal.nama_file AS soal_file,
				materi.*,
				materi.nama_file AS materi_file,
				pelajaran.*,
				pbm.*,
				IF((SELECT COUNT(jawaban_id) FROM jawaban WHERE jawaban.soal_id=soal.soal_id) > 0,'true','false') AS status
			FROM soal
				LEFT JOIN materi
					ON soal.materi_id=materi.materi_id
				LEFT JOIN pelajaran
					ON materi.pelajaran_id=pelajaran.pelajaran_id
				LEFT JOIN pbm
					ON pelajaran.pelajaran_id=pbm.pelajaran_id
					
			WHERE pbm.siswa_id='{$this->session->userdata["id"]}'
		")->result_object();
	}
	// end siswa tugas upload model

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