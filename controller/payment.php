<?php
include "../model/paymentModle.php";
include "../controller/logs.php";
class Payment
{


    public static function permissions()
    {

        if (!empty($_SESSION["id"])) {
            $id = $_SESSION["id"];
            $result = PaymentModle::checkpermissions($id);
            $row = mysqli_fetch_assoc($result);
			$log = "Run permissions function";
            logger($log);
            return $row;
        } else {
            header("Location: login");
        }
    }
    public static function makeorder()
    {
        if (isset($_POST["submit"])) {
	$order_id = rand(1000, 9999);
	echo "order id " . $order_id . " <br>";
    $_SESSION['order_id'] = $order_id ;
    $id = $_SESSION["id"];
	$user_id = $id;
	echo "user id = " . $user_id;
	//insert into orders 
	
	$total = $_SESSION['total'];
	echo "Total from session: " . $total . "<br>";
	//insert into orders_details 
	PaymentModle::makeorder($order_id,$user_id,$total);
	$log = "Run makeorder function";
    logger($log);
	$totalquantity = 0;
	foreach ($_SESSION['products'] as $product) :
		$totalquantity += $product['quantity'];
		echo $product['id'] . " " . $product['quantity'] . "<br>";
		$product_id = $product['id'];
		$quantity = $product['quantity'];
		echo "product id " . $product_id . "and quantity = " . $quantity . "<br>";
		//insert into orders_product_details 
		PaymentModle::insertorders_details($order_id,$product_id,$quantity);
		PaymentModle::managestock($product_id,$quantity);

	endforeach;
    $_SESSION['confirmedorder'] = $_SESSION['products'] ;
	echo $totalquantity;


	echo "success";
	header("Location: confirmation");
}
    }
}
