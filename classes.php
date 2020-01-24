<?php
/***************************************/
/***** Database Connection  ************/
/***************************************/

class Connection{
    public static $host = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $dbname = "euneeq";

    function connection(){
        $connection = new mysqli(self::$host, self::$username, self::$password, self::$dbname);
        if ($connection->connect_errno){
            return("<h3>404 ERROR: </h3><br />Unable to connect");
        }
        else{
            return($connection);
        }
    }
}
?>

<?php
/***********************/
/*** Products class ***/
/*********************/
class product{
    public $id;
    private $Name;
    private $product_details;
    public $image;
    private $old_price;
    private $new_price;
    private $category;
    private $type;

    function __construct($id, $Name, $product_details, $image, $old_price, $new_price, $category, $type){
    $this->id = $id;
    $this->Name = $Name;
    $this->product_details = $product_details;
    $this->image = $image;
    $this->old_price = $old_price;
    $this->new_price = $new_price;
    $this->category = $category;
    $this->type = $type;
    }

    function calculate_discount(){
        //calculate the percentage discount
        $idiot = ($this->old_price - $this->new_price);
        $chimp = $idiot / $this->old_price;
        $discount = $chimp * 100;
        return $discount."% off";
    }

    function like_button(){
        //the like button

    }

    function add_to_cart(){
        //the add to cart button

    }

    function display(){
        //display some things about a product
        $discount = $this->calculate_discount();
        echo<<<o
        <div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-sale"><b><i>$discount</i></b></div>
									<a href="?id=$this->id"><img src="img/product/$this->image" alt="" width="790" height="415"></a>
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>$this->new_price</h6>
									<a href="product.php"><p>$this->Name</p></a>
								</div>
							</div>
                        </div>
o;
echo<<<o
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/7.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top</p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/8.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top </p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/10.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Black and White Stripes Dress</p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/11.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top</p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/12.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top </p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/5.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top</p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/9.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top</p>
    </div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="product-item">
    <div class="pi-pic">
        <img src="./img/product/1.jpg" alt="">
        <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
        </div>
    </div>
    <div class="pi-text">
        <h6>$35,00</h6>
        <p>Flamboyant Pink Top </p>
    </div>
</div>
</div>
<div class="text-center w-100 pt-3">
<button class="site-btn sb-line sb-dark">LOAD MORE</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Category section end -->
o;
    }

    function display_all(){
        //display some things about a product
        $discount = $this->calculate_discount();
        echo<<<o
        <!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="./category.php"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="img/product/$this->image" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<!--<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="img/single-product/1.jpg"><img src="img/single-product/thumb-1.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/single-product/2.jpg"><img src="img/single-product/thumb-2.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/single-product/3.jpg"><img src="img/single-product/thumb-3.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/single-product/4.jpg"><img src="img/single-product/thumb-4.jpg" alt=""></div>
						</div>-->
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">$this->Name</h2>
					<h3 class="p-price">$this->new_price</h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">SHOP NOW</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									<p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
									<p>Mixed fibres</p>
									<p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="./img/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/3.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/4.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
o;
    }

}


class User{
    public $UserId;
    private $First_Name;
    private $Last_Name;
    public $Username;
    private $Phone;
    private $Mail;
    private $Address;
    private $Town;
    private $State;
    private $Account_Type;

    function __construct($UserId, $First_Name, $Last_Name, $Username, $Phone, $Mail, $Address, $Town, $State, $Account_Type){
        $this->UserId = $UserId;
        $this->First_Name = $First_Name;
        $this->Last_Name = $Last_Name;
        $this->Username = $Username;
        $this->Phone = $Phone;
        $this->Mail = $Mail;
        $this->Address = $Address;
        $this->Town = $Town;
        $this->State = $State;
        $this->Account_type = $Account_Type;       
        $_SESSION['user'] = $this->Username;
        if(!$_SESSION){session_start();}
        $this->logged_in = TRUE;
    }

    
    function cartdisplay(){
        //what to display about the cart

        //$query = "SELECT * FROM cart WHERE UserId = $this->UserId";
        //$connect = new connection;
        //$res = $connect->query($query);
        //while($row = $res->fetch_assoc()){
            echo <<<ooo
                <!-- cart section end -->
                <section class="cart-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="cart-table">
                                    <h3>Your Cart</h3>
                                    <div class="cart-table-warp">
                                        <table>
                                        <thead>
                                            <tr>
                                                <th class="product-th"><h6>Products</h6></th>
                                                <th class="quy-th"><h6>Quantity</h6></th>
                                                <th class="size-th"><h6>Size</h6></th>
                                                <th class="total-th"><h6>Price</h6></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-col">
                                                    <img src="img/cart/2.jpg" alt="">
                                                    <div class="pc-title">
                                                        <h4>Ruffle Pink Top</h4>
                                                        <p>$45.90</p>
                                                    </div>
                                                </td>
                                                <td class="quy-col">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="size-col"><h4>Size M</h4></td>
                                                <td class="total-col"><h4>$45.90</h4></td>
                                            </tr>
                                            <tr>
                                                <td class="product-col">
                                                    <img src="img/cart/3.jpg" alt="">
                                                    <div class="pc-title">
                                                        <h4>Skinny Jeans</h4>
                                                        <p>$45.90</p>
                                                    </div>
                                                </td>
                                                <td class="quy-col">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="size-col"><h4>Size M</h4></td>
                                                <td class="total-col"><h4>$45.90</h4></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="total-cost">
                                        <h6>Total <span>$99.90</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 card-right">
                                <form class="promo-code-form">
                                    <input type="text" placeholder="Enter promo code">
                                    <button>Submit</button>
                                </form>
                                <a href="checkout.php" class="site-btn">Proceed to checkout</a>
                                <a href="index.php" class="site-btn sb-dark">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- cart section end -->
ooo;
        //}
    }
}