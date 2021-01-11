<?php
	
	$connect = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	function redirect($url){
		header("location: ".URL_ROOT."$url");
	}

	function verify($password, $hash) {
		return password_verify($password, $hash);
	}

	function hashing($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

	function notify($type,$message,$success) {
		echo json_encode(['type' => $type, 'message' => $message, 'success' => $success]);
	}

	function notify_amaran($data) {
		echo json_encode(['success'=>$data[0],'bgcolor'=>$data[1],'color'=>$data[2],'message'=>$data[3]]);
	}

	function error_message($data){
		echo '<div class="errorMsg">'; 
		foreach ($data as $message )
		echo "$message\n";
		echo '</div>';
	}

	function success_message($data){
		echo '<div class="successMsg">'; 
		foreach ($data as $message )
		echo "$message\n";
		echo '</div>';
	} 