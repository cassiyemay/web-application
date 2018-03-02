<DOCTPYE>
    <div>
   <?php include 'navigation.php'; ?> 
    </div>
<HTML>
<head>
    <link rel="stylesheet" type="text/css" a href="style.css">
</head>
<body>
  
<?php
require 'dbconfig.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql3 = "select orderNumber,orderDate,status from orders where status ='In Process'";
$sql4 = "select orderNumber,orderDate,status from orders where status ='Cancelled'";
$sql5 = "select orderNumber,orderDate,status from orders ORDER BY orderDate DESC LIMIT 20 ";
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);
$result5 = mysqli_query($conn, $sql5);
    
if (isset($_GET['OrderNumber'])) {
   $id = ($_GET['OrderNumber']);
    $sqll ="
    SELECT orders.orderNumber, 
  orders.orderDate,
  orders.comments,
  products.productCode,
   products.productLine,
    products.productName,
    orderdetails.productCode
   FROM (orderdetails INNER JOIN orders ON orderdetails.orderNumber=orders.orderNumber)
   INNER JOIN products on  products.productCode= orderdetails.productCode
   WHERE orders.orderNumber = '$id'";  
$result = mysqli_query($conn, $sqll);
?>
<div>

            <table style="float:right">
                 <thead>
                     <tr>
                        <th>productCode</th>
                        <th>productName</th>
                        <th>productLine</th>
                        <th>commments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                       
                    <tr>
                        <td><?php echo htmlentities($r['productCode']);?></td>
                        <td><?php echo htmlentities($r['productName']); ?></td>
                        <td><?php echo htmlentities($r['productLine']);?></td>
                        <td><?php echo htmlentities($r['comments']);?></td>
        
                    </tr>
                  <?php }; ?>
                </tbody>
            </table>
        </div>
<?php }; ?>   
<div id="container">

            <table>
                 <thead>
                     <tr>
                        <th>orderNumber</th>
                        <th>orderDate</th>
                         <th>status</th>
                    </tr>
                </thead>
                <tbody>
            <?php while ($r = mysqli_fetch_assoc($result3)): ?>
                 <tr>
                     <td><a href="./orders.php?OrderNumber=<?php echo ($r['orderNumber'])?>"><?php echo ($r['orderNumber'])?></a></td>
                     <td><?php echo ($r['orderDate'])?></td>
                     <td><?php echo ($r['status'])?></td>
               
             <?php endwhile; ?>
                      </tr>
                </tbody>
        </table>
       </div>
   <div id="container">

            <table>
                 <thead>
                     <tr>
                        <th>orderNumber</th>
                        <th>orderDate</th>
                         <th>status</th>
                    </tr>
                </thead>
                <tbody>
            <?php while ($r = mysqli_fetch_assoc($result4)): ?>
                 <tr>
                     <td><a href="./orders.php?OrderNumber=<?php echo ($r['orderNumber'])?>"><?php echo ($r['orderNumber'])?></a></td>
                     <td><?php echo ($r['orderDate'])?></td>
                     <td><?php echo ($r['status'])?></td>
               
             <?php endwhile; ?>
                      </tr>
                </tbody>
        </table>
       </div> 
<div>

            <table>
                 <thead>
                     <tr>
                        <th>orderNumber</th>
                        <th>orderDate</th>
                         <th>status</th>
                    </tr>
                </thead>
                <tbody>
            <?php while ($r = mysqli_fetch_assoc($result5)): ?>
                 <tr>
                     <td><a href="./orders.php?OrderNumber=<?php echo ($r['orderNumber'])?>"><?php echo ($r['orderNumber'])?></a></td>
                     <td><?php echo ($r['orderDate'])?></td>
                     <td><?php echo ($r['status'])?></td>
               
             <?php endwhile ;  ?>
                      </tr>
                </tbody>
        </table>
       </div> 
    <?php mysqli_close($conn); ?>
<?php include 'footer.php'; ?> 
</body>
</HTML>