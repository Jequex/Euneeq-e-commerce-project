<?php
require_once 'functions.php';
require_once 'classes.php';
?>

<?php require_once "classes.php";
if(!isset($_SESSION)){
	session_start();
}
?>

<?php
//the login process starts here
if (isset($_POST['user']) && isset($_POST['pass']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $con = new Connection;
    $connect = $con->connection();
	$login = login($user, $pass, $connect);
}


function login($user, $pass, $connect){
    if (($user == "") || ($pass == ""))
    {
        $error = "All fields are required";
        die($error);
    }
    else
    {
        $query = "SELECT * FROM users
        WHERE Passwordd = MD5('$pass') AND Username = '$user' OR Mail = '$user'";
        $res = $connect->query($query);
        if ($res->num_rows <= 0){
            $error = "<span class='error'>Username/Password invalid<br /><br /><a href=\"\">click to try again</a>";
            die($error);
        }
        else{
            $row = $res->fetch_assoc();
            $Username = $row['Username'];
            $Account_Type = $row['Account_Type'];
            session_start();
            $_SESSION["Username"] = $Username;
            $_SESSION["Account_type"] = $Account_Type;
            
            header("location:index.php");
        }
    }
}

?>

<?php
//the log out process starts here

if (isset($_GET['sign_out']))
{
    session_destroy();
    die(header("location:index.php"));
}
?>


<?php require_once "header.php";
?>
<?php
if (isset($_GET['forgot'])){echo <<<t
    <!-- checkout section  -->
    <section class="checkout-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <form class="checkout-form" method="post" action="">
                            <div class="cf-title">Reset Password</div>
                            <div class="row address-inputs">
                                <div class="col-md-12">
                                    <input type="text" placeholder="e-mail" name="user">
                                </div>
                            </div>
                            <button class="site-btn submit-order-btn">Reset Password</button>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout section end -->
t;
}
elseif(!isset($_SESSION['Username'])){
    echo<<<o
    <!-- checkout section  -->
    <section class="checkout-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <form class="checkout-form" method="post" action="">
                            <div class="cf-title">Sign In</div>
                            <div class="row address-inputs">
                                <div class="col-md-12">
                                    <input type="text" placeholder="username or e-mail" name="user">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" placeholder="password" name="pass">
                                </div>
                            </div>
                            <button class="site-btn submit-order-btn">Sign In</button>
                            <br />
                            <a href="?forgot='password'">forgot password</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout section end -->
o;
}else{header("location:index.php");}
?>
<?php require_once "footer.php" ?>