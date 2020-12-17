<?php
	class Controller {
		
		public function model($model) {

			$var ='app/models/' . $model . '.php';
			if (file_exists($var)){
				require_once $var;	
				return new $model();
			} else{
				exit();
			}
		}
		 
		public function view ($view, $data = [], $fields = []) {
			$var = 'app/views/' . $view . '.php';	 
			 
			(file_exists($var))? require_once $var : '';
		}

		
		public function url() {
			if(isset($_GET['url'])){
				$url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
				return $url;
			} 	
		}

	} 
