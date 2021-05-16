<?php

class Acceso{

	protected $user;
	protected $pass;

	private $db_connection = null;
    public $errors = array();
    public $messages = array();

	public function __construct($usuario,$password){
		$this->user = $usuario;
		$this->pass = $password;
	}
	
	public function Login(){

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {

			$sql = "SELECT 	user_id, fullname, user_name, user_email, phone, user_password_hash,lastname,tipodoc,documento
	                        FROM users
	                        WHERE user_name = '" . $this->user . "' OR user_email = '" . $this->user . "';";
	        $result_of_login_check = $this->db_connection->query($sql);

	        // if this user exists
	        if ($result_of_login_check->num_rows == 1) {

	            // get result row (as an object)
	            $result_row = $result_of_login_check->fetch_object();

	            // using PHP 5.5's password_verify() function to check if the provided password fits
	            // the hash of that user's password
	            if (password_verify($this->pass, $result_row->user_password_hash)) {

	                // write user data into PHP SESSION (a file on your server)
	                $nombres = $result_row->fullname;
	                session_start();
					$_SESSION['name_session']="ispcontrol_admin";
					$_SESSION['full_name'] = $nombres;
					$_SESSION['phone'] = $result_row->phone;
					$_SESSION['user_name'] = $result_row->user_name;
	                $_SESSION['user_email'] = $result_row->user_email;
	                $_SESSION['user_login_status'] = 1;
					$_SESSION['user_id']=$result_row->user_id;

					$_SESSION['lastname']=$result_row->lastname;
					$_SESSION['tipodoc']=$result_row->tipodoc;
					$_SESSION['documento']=$result_row->documento;										

					$url_final='index.php?pagina=1&id='.$_SESSION['user_name'];
					header("Location: $url_final");
	            } else {
	                header("Location: procesar.php?error=datos_incorrectos");
	            }
	        } else {
	            header("Location: procesar.php?error=datos_incorrectos");
	        }
	    }
	}
}