<?php
class PaymentModle
{

    public static function checkpermissions($id)
    {
        include "../controller/config.php";
        $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
        return $result;
    }
    public static function makeorder($order_id,$user_id,$total)
    {
        require '../controller/config.php';
        mysqli_query($conn, "INSERT into orders (order_id , user_id ) VALUES ('$order_id' , '$user_id')");
        mysqli_query($conn, "INSERT into orders_details (order_id , status , total ) VALUES ('$order_id' , 'Pending' , '$total' )");
    }
    public static function  insertorders_details($order_id,$product_id,$quantity)
    {
        require '../controller/config.php';
        mysqli_query($conn, "INSERT into  order_product_details  (order_id , product_id , quantity ) VALUES ('$order_id' , '$product_id' , '$quantity' )");
    }
}
