<?php
	if (isset($_POST['submit'])) {

		$parser = file_get_contents("user.json");
		$decode_details = json_decode($parser, true);


		function cleanUsersTextInput($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = cleanUsersTextInput($_POST['username']);
		$password = cleanUsersTextInput($_POST['password']);

		foreach ($decode_details['users'] as $result) {
			if ($result['username'] != $username && $result['password'] != $password) {
				echo "
					<h2>Invalid login details, please try again!</h2>
					<br>
					<a href='index.php'> << Back </a>
				";
				exit();
			} else {
				echo "
					<h2>Hello ".$result['username'].", welcome to Codavengers Task. <br>Your email is ".$result['email']."</h2>
					<br>
					<a href='index.php'> << Back </a>
				";
				exit();
			}
		}

		







		// $get = array_column($result['username'], $username);
		// 		print_r($get);
		// 		exit();

				
		
		// $output = "<ul>";
		// foreach ($decode_details['users'] as $data) {
		// 	if ($data['username'] == 'kazeem') {
		// 		$output .= "<h3>".$data['email']."</h3>";
		// 		$output .= "<li>".$data['password']."</li>";
		// 	}
		// }
		// $output .= "</ul>";
		// echo $output;
	}	
?>