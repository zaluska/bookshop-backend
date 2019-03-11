<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$city = $_POST['city'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['address'] = $address;
		$_SESSION['postcode'] = $postcode;
		$_SESSION['city'] = $city;

		$conn = $pdo->open();

					$stmt = $conn->prepare("INSERT INTO users (email, firstname, lastname, address, postcode, city) VALUES (:email, :firstname, :lastname, :address, :postcode, :city)");
					$stmt->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'postcode'=>$postcode, 'city'=>$city]);

					foreach($_SESSION['cart'] as $row){
					$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
					$stmt->execute(['id'=>$row['productid']]);
					$userid = $conn->lastInsertId();
					
						

					$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>your adress: ".$_POST['address']."</p>
						<p>your cart: ".$row['productid']."</p>
						<p>Just testing om att skicka mail är fungerad</p>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
				        $mail->isSMTP();                                     
				        $mail->Host = 'cpsrv17.misshosting.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'sales@threeboxes.se';     
						$mail->Password = 'salespwd11';                 
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('sales@threeboxes.se');
				        
				        //Recipients
				        $mail->addAddress($email);              
						$mail->addReplyTo('sales@threeboxes.se');
						//$mail->addCC('cvlpa1@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Backed-VT19';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Check your email!';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				
				// catch(PDOException $e){
				// 	$_SESSION['error'] = $e->getMessage();
				// 	header('location: register.php');
				// }

				$pdo->close();}
				
	// 		}

	// 	}

	// }
	// else{
	// 	$_SESSION['error'] = 'Fill up signup form first';
	// 	header('location: signup.php');
	// }
	}

?>