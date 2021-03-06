<?php 
/**
 * @author José Flores -  vinygfx@gmail.com
 * @copyright 2017-2018, José Flores -Rights Reserved.
 */
	

class Solicitudes extends CI_Controller
{
	public function index ()
	{
			
			if (isset( $_SESSION['ci'] )) {
				
				$this->load->model( 'user' );
				$this->load->model( 'solicitud' );
				$user = $this->user->getUserCi( $_SESSION['ci'] );
				$soli = $this->solicitud->getSolicitudes()->result();

				for($x = 0; $x < count($soli); $x++) {
					$soli[$x] = (array) $soli[$x];
					$val = $this->user->getUserCi($soli[$x]['user_ci']);
					$nimage = $val->img;
					if(empty($val->img) || $val-> img == "")
						$nimage = 'varun.jpg';
					$soli[$x]['img'] = $nimage;
					$soli[$x] = (object) $soli[$x];
				}

				$data = [ 'profile' => $user,
						  'solicitudes' => $soli 
						];

				$this->load->view( 'dashboard/head.php', $data );
				$this->load->view( 'dashboard/header.php', $data );
				$this->load->view( 'dashboard/solicitudes.php', $data );
				$this->load->view( 'dashboard/footer.php' );

			}else
				header('location: '.base_url());
	}

	public function del($id){
		if ($id != null) {
			$this->db->where('id', $id);
			$this->db->delete('solicitudes');
			header('location: '.base_url().'Solicitudes');
		}else{
			header('location: '.base_url());
		}
	}
	public function checked($id){
		if ($id != null) {
			$data = ['status' => 1];
			$this->db->where('id', $id);
			$this->db->update('solicitudes', $data);
			header('location: '.base_url().'Solicitudes');
		}else{
			header('location: '.base_url());
		}
	}
	public function insert(){
		
		if (isset($_POST)) {

			$this->load->model( 'user' );
			$user = $this->user->getUserCi( $_SESSION['ci'] );

			$insert = [
						'user_ci' => $user->ci,
						'username' => $user->nombres. ' '.$user->apellidos,
						'content' => $_POST['content'],
						'status' => 0,
						'fecha' => $_POST['fecha']
					];
			$this->db->insert('solicitudes', $insert);
			header('location: '. base_url(). 'Solicitudes');
		}
	}
}

?>