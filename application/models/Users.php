<?php 
	/**
	* this is a user table
	*/
	class Users extends MY_Model
	{
		
		function __construct()
		{
			parent::__construct('users');
			$this->load->library('Connections');
			// $this->_assign_libraries();
			$this->conn_id = $this->connections->get_database_object();

		}

		// need to update insert function in my_model 

		function insert($data)
		{
			
			$query = $this->conn_id->prepare("INSERT INTO users(name, email, mobileno, profilepic, passwd, hash_key) VALUES (?,?,?,?,?,?)");
			$query->execute($data);
		}

		function login($email, $password)
		{
			$query = $this->conn_id->query("select user_id,email from users where email = " . "'".$email."'" ." and passwd = '".md5($password)."' limit 1;");
			$result = $query -> fetchAll(PDO::FETCH_ASSOC);
			
			if(count($result)  == 1)
			{
				return $result;
			}
			else
			{
				return false;
			}
		}

	}

	?>