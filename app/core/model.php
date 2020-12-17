<?php
	class Database {
	
		private $connection;
		protected $db_host   	= DB_HOST; 		// hostname of your server 
		protected $db_username	= DB_USERNAME;	// username of your server
		protected $db_password	= DB_PASSWORD; 	// password of your server (leave this blank if there's no password)
		protected $db_name 		= DB_NAME; 		// database of your server
		
		public function __construct() {
			$this->connection = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
		}
		
		public function connect() {
			return $this->connection;
		}
	}

	class Model {
		protected $db;
		
		public function __construct() {
			$connection = new Database();
			$this->db = $connection->connect();   
		}
		
	}

