<?php
	session_start();

	// variable declaration
	$firstname = "";
	$lastname = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
// connect to database


	// REGISTER USER
	if (isset($_POST['reg_user']))
	{
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		// $date = mysqli_real_escape_string($db, $_POST['date']);
		$rawdate = htmlentities($_POST['date']);
    $date = date('Y-m-d', strtotime($rawdate));
    // $query = "INSERT INTO user_post (date) VALUES ('$date')";


		// form validation: ensure that the form is correctly filled
		if (empty($firstname)) { array_push($errors, "Firstname is required"); }
		if (empty($lastname)) { array_push($errors, "Lastname is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($date=="1970-01-01") { array_push($errors, "Date is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form

		if (count($errors) == 0) {
			// $password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' ";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1)
			{
						$username = "";
						array_push($errors, "Gmail id already registered");
		  }
		}

		if (count($errors) == 0) {
			$gcheck = substr($email, -10);
			$gcheck = strtolower($gcheck);
			if($gcheck !== "@gmail.com")
			{
				$gcount = strlen($email);
				// echo substr($email,0,$gcount-10);
				array_push($errors, "Gmail id should end with <strong>@gmail.com</strong>");
			}
		}


		if (count($errors) == 0) {
			// profile photo
			$source = "snapit";
			$nophoto = '../images/profile/nophoto.jpg';
			// $email = str_replace("@gmail.com", "", $email);
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (firstname, lastname, email, password, date, profileimg, gender, source)
					  VALUES('$firstname','$lastname', '$email', '$password', '$date', '$nophoto', '$gender', '$source')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $email;
			$_SESSION['success'] = "You are now logged in";

			$folder = "../images/posted/".$email;
			mkdir ($folder, 0755);
			$createfile = "../images/posted/".$email."/".$email.".txt";
			$myfile = fopen($createfile, "w");
			fclose($myfile);
			// create db for friend request
						// $usernamedb = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
						// $tmpemail = str_replace("@gmail.com", "", $email);
						 // ID int NOT NULL AUTO_INCREMENT
						// $query = "CREATE TABLE $tmpemail (PersonID int NOT NULL AUTO_INCREMENT,Request varchar(255),Accept varchar(255),block varchar(255),PRIMARY KEY (PersonID))";
						// $query = "CREATE TABLE $tmpemail (ID int NOT NULL AUTO_INCREMENT,LastName varchar(255) NOT NULL,FirstName varchar(255),Age int,PRIMARY KEY (ID))";
						// mysqli_query($usernamedb, $query);
			// create db for friend request

			header('location: ../Homepage/home_page.php');
		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../Homepage/home_page.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

	//...

	// save changes

	if (isset($_POST['save_user']))
	{
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['savefirstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['savelastname']);
		$email = mysqli_real_escape_string($db, $_POST['saveemail']);
		$password_1 = mysqli_real_escape_string($db, $_POST['savepassword_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['savepassword_2']);
		// $date = mysqli_real_escape_string($db, $_POST['date']);
		$rawdate = htmlentities($_POST['savedate']);
    $date = date('Y-m-d', strtotime($rawdate));
    // $query = "INSERT INTO user_post (date) VALUES ('$date')";


		// form validation: ensure that the form is correctly filled
		// if (empty($firstname)) { array_push($errors, "Firstname is required"); }
		// if (empty($lastname)) { array_push($errors, "Lastname is required"); }
		// if (empty($email)) { array_push($errors, "Email is required"); }
		// if (empty($password_1)) { array_push($errors, "Password is required"); }
		// if ($date=="1970-01-01") { array_push($errors, "Date is required"); }

		if ($password_1 != $password_2 && $password_1 !="") {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form

		if (count($errors) == 0 && $email!="") {
			// $password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' ";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1)
			{
						$username = "";
						array_push($errors, "Gmail id already registered");
		  }
		}

		if (count($errors) == 0 && $email!="") {
			$gcheck = substr($email, -10);
			$gcheck = strtolower($gcheck);
			if($gcheck !== "@gmail.com")
			{
				$gcount = strlen($email);
				// echo substr($email,0,$gcount-10);
				array_push($errors, "Gmail id should end with <strong>@gmail.com</strong>");
			}
		}


		if (count($errors) == 0) {
					// profile photo
					// $nophoto = '../images/profile/nophoto.jpg';
					$tmpemail = $_SESSION['username'];
					if($firstname!="")
					{
					echo $tmpemail;
					echo $firstname;
					$query = "UPDATE users SET firstname='$firstname' WHERE email='$tmpemail'";
					mysqli_query($db, $query);
				  }
					if($lastname!="")
					{
					$query = "UPDATE users SET lastname='$lastname' WHERE email='$tmpemail'";
					mysqli_query($db, $query);
				  }
					if($email!="")
					{
					$query = "UPDATE users SET email='$email' WHERE email='$tmpemail'";
					mysqli_query($db, $query);
				  }
					if($password_1!="")
					{
					$password = md5($password_1);//encrypt the password before saving in the database
					$query = "UPDATE users SET password='$password' WHERE email='$tmpemail'";
					mysqli_query($db, $query);
				  }
					if($date!="1970-01-01")
					{
					$query = "UPDATE users SET date='$date' WHERE email='$tmpemail'";
					mysqli_query($db, $query);
				  }
					// if($password!="")
					// {
					// $password = md5($password_1);//encrypt the password before saving in the database
					// $query = "INSERT INTO users (firstname, lastname, email, password, date, profileimg)
					// 		  VALUES('$firstname','$lastname', '$tmpemail', '$password', '$date', '$nophoto')";
					// mysqli_query($db, $query);
				  // }
					// $tmp_SESSION['username'] = $email;
					// $_SESSION['success'] = "You are now logged in";
					// header('location: ../Homepage/home_page.php');
		}

	}

?>
