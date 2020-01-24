<?php
require_once "header.php";
require_once "classes.php";
require_once "functions.php";

$connect = new Connection;
@$reos = $connect->connection();


//submitting the message
if(isset($_POST['request']) && isset($_POST['submit'])){
    @$request = sanitizeString($_POST['request']);
    @$UserId = (string)$_SESSION['Username']->UserId;
    $query = "INSERT INTO messages (UserID, Messages) values ('$UserId', '$request')";
    if ($reos->query($query)){
        die(header('location:index.php'));
    }
}

//if you are an admin, view messages and reply messages
if(isset($_SESSION["Username"]->Username)){
    if($_SESSION["Username"]->Account_type == 'Admin'){
        
        echo <<<e
            <!-- cart section end -->
            <section class="cart-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <h3>Your Messages</h3>
                                <div class="cart-table-warp">
                                    <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th class="quy-th"><h5>User name</h5></th>
                                            <th class="size-th"><h5>Message</h5></th>
                                            <th class="size-th"><h5>Reply</h5></th>
                                            <th class="total-th"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
e;
                            $query = "SELECT * FROM messages";
                                    @$con = $reos->query($query);

                                    while($row = $con->fetch_assoc()){
                                    
                                    $query1 = "SELECT * FROM users WHERE UserId = $row[UserID]";
                                    @$con1 = $reos->query($query1);
                                    @$row1 = $con1->fetch_assoc();

                                  echo<<<o
                                    <tr>
                                    <td class="quy-col">
                                            <div class="quantity">
                                            <form action="" method="post">
                                            <input type="hidden" name="First_name" value="$row1[First_name]"></input>
                                            <input type="hidden" name="email" value="$row1[Mail]"></input>
o;

                                            echo "$row1[First_name]";


                                                    echo<<<e
                                                            </div>
                                                    </td>
                                                    <td class="quy-col">
                                                    <div class="quantity">
                                                    <textarea name="text" cols="40" rows="5">$row[Messages]</textarea>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <textarea name="Message" cols="40" rows="5">$row[Reply]</textarea>
                                                    </td>
                                                    <td class="size-col">
                                                        <h4>
                                                                <button type="submit" name="reply" class="site-btn">reply</button>
                                                                </form>
                                                        </h4>
                                                    </td>
                                                </tr>
e;
                                    }
                                    echo<<<e
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart section end -->

e;

    }else{
        //if you are not an admin, send a message
        echo<<<e
            <!-- checkout section  -->
            <section class="checkout-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <form class="checkout-form" method="post" action="">
                                    <a href="mailto:nonny@gmail.com">send us an email</a>
                                    </br>
                                    </br>
                                    <div class="row address-inputs">
                                        <div class="col-lg-12">
                                        <textarea cols="38" rows="12" name="request" placeholder="Make your request"></textarea>
                                        </div>
                                    </div>
                                    <button class="site-btn submit-order-btn" name="submit">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- checkout section end -->
e;
    }
}else{
    die(header("location:Sign_in_page.php"));
}

if(isset($_POST['reply'])){
$name = $_POST['First_name'];
$mail = $_POST['email'];
$message = $_POST['Message'];
$text = $_POST['text'];

$query = "UPDATE messages SET Reply='$message' WHERE Messages='$text'";
@$con = $reos->query($query);
@mail($mail, $name, $message);
}
require_once "footer.php";
?>