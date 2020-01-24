<?php require_once "header.php" ?>

<?php
require_once 'classes.php';
require_once 'functions.php';
$first_name = $last_name = $user = $phone = $mail = $address = $town = $pass = $pass2 = "";

// if there is input
if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass2'])){
$first_name = sanitizeString($_POST['first_name']);
$last_name = sanitizeString($_POST['last_name']);
$user = sanitizeString($_POST['user']);
$phone = sanitizeString($_POST['phone']);
$mail = sanitizeString($_POST['mail']);
$address = sanitizeString($_POST['address']);
$town = sanitizeString($_POST['town']);
$pass = sanitizeString($_POST['pass']);
$pass2 = sanitizeString($_POST['pass2']);
$stateId = $_POST['states_of_nigeria'];
$type = $_POST['type'];
$query = "SELECT * FROM users WHERE Username = '$user' OR email ='$mail'";
$connect = new Connection;
@$reos = $connect->connection();
if(@$res = $reos->query($query)){
$row = $res->num_rows;
}else{
	$row = -1;
}
}

//if any field is empty
if ($first_name == "" || $last_name == "" || $user == "" || $phone == "" || $mail == "" || $address == "" ||
     $town == "" || $pass == "" || $pass2 == ""){
    echo "<span class=\"redink\">***</span>  all fields are required here<br /><br />";
}

//if there is a password error
elseif ($pass2 !== $pass){
    echo "passwords do not match";
    echo "$pass2 and $pass";
}

// if username exists
elseif ($row > 0) {
    echo "Username already exists";
}

//else create account
else{
    $query = "INSERT INTO users (First_name, Last_name, Username, Phone, Mail, Addresss, Town, Passwordd, State_Id, Account_Type) values 
    ('$first_name','$last_name','$user','$phone','$mail','$address','$town', MD5('$pass'), '$stateId', '$type')";
    if (@$reos->query($query)){
        die(header('location:index.php'));
    }
    else{
        die('unsuccessful');
    }
    }
?>

<!-- checkout section  -->
<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post" action="">
						<div class="cf-title">Sign Up</div>
						<div class="row address-inputs">
							<input type="hidden" name="type" value="NOTA">
							<div class="col-md-6">
								<input type="text" placeholder="first name" name="first_name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="last name" name="last_name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="username" name="user">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no." name="phone">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="e-mail" name="mail">
								<input type="password" placeholder="password" name="pass">
								<input type="password" placeholder="re-type password" name="pass2">
								<input type="text" placeholder="Address" name="address">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="town" name="town">
							</div>
							<div class="col-md-6">
								<select name="states_of_nigeria" id="select">
									<option selected="selected" value="1">abia</option>
									<option value="2">adamawa</option>
									<option value="3">akwa ibom</option>
									<option value="4">anambra</option>
									<option value="5">bauchi</option>
									<option value="6">bayelsa</option>
									<option value="7">benue</option>
									<option value="8">borno</option>
									<option value="9">cross river</option>
									<option value="10">delta</option>
									<option value="11">ebonyi</option>
									<option value="12">edo</option>
									<option value="13">ekiti</option>
									<option value="14">enugu</option>
									<option value="15">gombe</option>
									<option value="16">imo</option>
									<option value="17">jigawa</option>
									<option value="18">kaduna</option>
									<option value="19">kano</option>
									<option value="20">katsina</option>
									<option value="21">kebbi</option>
									<option value="22">kogi</option>
									<option value="23">kwara</option>
									<option value="24">lagos</option>
									<option value="25">nassarawa</option>
									<option value="26">niger</option>
									<option value="27">ogun</option>
									<option value="28">ondo</option>
									<option value="29">osun</option>
									<option value="30">oyo</option>
									<option value="31">plateau</option>
									<option value="32">rivers</option>
									<option value="33">sokoto</option>
									<option value="34">taraba</option>
									<option value="35">yobe</option>
									<option value="36">zamfara</option>
									<option value="37">abuja fct</option>
								</select>

							</div>
						</div>
						<button class="site-btn submit-order-btn">Sign Up</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->
<?php require_once "footer.php" ?>