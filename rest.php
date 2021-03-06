<?php
include_once "db.php";
session_start();
$_SESSION['customerID'] = 1;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['productList'])) { //แสดงสินค้าทัังหมด
        echo json_encode(showProductList());
    } else if (isset($_GET['showOrderByCustomerID'])) { //แสดงสินค้าที่ลูกค้าซื้อ
        echo json_encode(showOrder($_SESSION['customerID']));
    } else if (isset($_GET['showOrderListByCustomerID'])) { //แสดงบิลสินค้าที่ลูกค้าซื้อ
        echo json_encode(showOrderByCustomerID());
    } else if (isset($_GET['showOrderDetailByCustomerID'])) { //แสดงรายการสินค้าที่อยู๋ในบิล
        echo json_encode(showOrderDetailByCustomerID());
    } else if (isset($_GET['numOrderProductByOrderId'])) { //แสดงจำนวนที่ลูกค้าซื้อ โดยนับจากสินค้าที่ต่างกัน
        echo json_encode(numOrderProductByOrderId());
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insertProuct'])) { //เพิ่มสินค้า ใช้ Postman ในการเพิ่ม
        echo   json_encode(insertProduct());
    } else if (isset($_POST['addOrder'])) { //เพิ่ม order
        if (openOrder()) {
            echo 1;
        } else echo 0;
    } else if (isset($_POST['closeOrder'])) { //ชำระเงินเพื่อปิด order
        if (closeOrder()) {
            echo 1;
        } else echo 0;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') { //ลบสินค้าที่ไม่ต้องการซื้อ
    echo json_encode(deleteProduct());
    // $message = array("status" => print_r($_GET['u_id']));
    // echo json_encode($message);
} else {
    http_response_code(405);
}
function insertProduct()
{
    //for postman
    // $path = $_FILES['img']['tmp_name'];
    // $type = pathinfo($path, PATHINFO_EXTENSION);
    // $data = file_get_contents($path);
    // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $mydb = new db();
    $sql = "INSERT INTO `product`(`image`, `name`, `stock`, `cost`) 
    VALUES ('{$_POST['img']}','{$_POST['name']}',{$_POST['number']},{$_POST['price']})";
    return $mydb->exec($sql);
}
function deleteProduct()
{
    $mydb = new db();
    $sql = "DELETE FROM `orderdetails` WHERE `orderID`={$_GET['oid']} AND `productId`={$_GET['pid']}";
    return $mydb->exec($sql);
}
function showProductList()
{
    $mydb = new db();
    return   $mydb->query("SELECT * FROM `product`", MYSQLI_ASSOC);
    $mydb->close();
}

function showOrder($id)
{
    $mydb = new db();
    $result = $mydb->query("SELECT * FROM `orders` WHERE status =0 AND customerID=$id", MYSQLI_NUM);
    $result2 = $mydb->query("  SELECT p.name,o.quantity,o.unitPrice,p.image,o.orderID,o.productID FROM orderdetails as o,product as p WHERE o.orderID={$result[0][0]} AND o.productId=p.productID", MYSQLI_ASSOC);
    return array("0" => $result, "1" => $result2);
}
function showOrderByCustomerID()
{
    $mydb = new db();
    $sql = "SELECT * FROM `orders` WHERE customerID =1 ORDER By orderID DESC";
    return $mydb->query($sql, MYSQLI_ASSOC);
}
function showOrderDetailByCustomerID()
{
    $mydb = new db();
    $sql = "SELECT orderdetails.*,product.* FROM `orderdetails`,product WHERE     orderdetails.productId=product.productID AND  orderdetails.orderID ={$_GET['id']}";
    return  $mydb->query($sql, MYSQLI_ASSOC);
}
function numOrderProductByOrderId()
{
    $mydb = new db();
    $sql = "SELECT orderID FROM `orders` WHERE status=0";
    $result = $mydb->query($sql, MYSQLI_NUM);
    $sql = "SELECT COUNT(orderID) as num FROM `orderdetails` WHERE `orderID` ={$result[0][0]}";
    return $mydb->query($sql, MYSQLI_ASSOC);
}
function closeOrder()
{
    $mydb = new db();
    return $mydb->exec("UPDATE `orders` SET `status`=1 WHERE `orderID`={$_POST['orderID']}");
}
function openOrder()
{
    $p_id = $_POST['id'];
    $p_qty = $_POST['qty'];
    $p_price = $_POST['price'];

    $db = new db();
    //เช็ครหัสลูกค่ามีบิลป่าว
    $sql = "SELECT orderID, status FROM orders WHERE customerID=1 order by orderID desc limit 1";
    $bill_result = $db->query($sql, MYSQLI_NUM);
    if (sizeof($bill_result) == 0) { //ไม่มีบิลให้สร้าง
        // insert new
        $sql = "INSERT INTO orders(orderID, customerID, status) SELECT MAX(orderID)+1,{$_SESSION['customerID']},0 FROM orders";
        $result = $db->exec($sql);
        $sql = "INSERT INTO orderdetails(orderID, productId, quantity,unitPrice) SELECT MAX(orderID),{$p_id},{$p_qty},{$p_price} FROM orders";
        $result = $db->exec($sql);
    } else { //มีบิล
        // check [0][0] bill_id
        //       [0][1] bill_status
        if ($bill_result[0][1] == 0) { //บิลยังไม่ปิดรายการขาย
            //เช็คสินค่า
            $sql = "SELECT orderID, productId,quantity FROM orderdetails WHERE orderID='{$bill_result[0][0]}' and productId = {$p_id}";
            $result = $db->query($sql, MYSQLI_NUM);
            if (sizeof($result) == 0) { //ยังไม่ได้ซื้อให้เพิ่ม
                // add new product
                $sql = "INSERT INTO orderdetails(orderID, productId, quantity, unitPrice)VALUES ({$bill_result[0][0]}, {$p_id}, {$p_qty}, {$p_price})";
                $result = $db->exec($sql);
            } else { //ซื้อแล้วให้เพิ่มจำนวน
                // update current item
                $total = $p_qty + $result[0][2];
                $sql = "UPDATE orderdetails SET `quantity`='{$total}' WHERE productId = {$p_id} AND orderID={$bill_result[0][0]}";
                //  echo $sql;
                $result = $db->exec($sql);
            }
        } else { //บิลปิดรายการขายแล้วให้สร้างใหม่เพื่อซื้อสินค้า
            // insert new
            $sql = "INSERT INTO orders(orderID, customerID, status) SELECT MAX(orderID)+1,{$_SESSION['customerID']},0 FROM orders";
            $result = $db->exec($sql);
            $sql = "INSERT INTO orderdetails(orderID, productId, quantity,unitPrice) SELECT MAX(orderID),{$p_id},{$p_qty},{$p_price} FROM orders";
            $result = $db->exec($sql);
        }
    }
    $db->close();
    return $bill_result;
}
