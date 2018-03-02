
<DOCTPYE>
     <div>
   <?php include 'navigation.php'; ?> 
    </div>
<HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" a href="style.css">
</head>

<body>
<div id="aa">       
<form method="post" action="products.php">
    <select  name="proline">
         <option value="">--Choose a productline--</option>
        <option value="Motorcycles">Motorcycles</option>
        <option value="Classic Cars">Classic Cars</option>
        <option value="Planes">Planes</option>
        <option value="Ships">Ships</option>
        <option value="Trains">Trains</option>
        <option value="Trucks and Buses">Trucks and Buses</option>
        <option value="Vintage Cars">Vintage Cars</option>
    </select>
    <button type="submit" name="button">Show Details</button>
    </form>
</div> 

<?php
require 'dbconfig.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $productline = ($_POST['proline']);
    $productsline ="
    select * from products where products.productLine = '$productline'
";  

$prodetails = mysqli_query($conn, $productsline);
?>
<div>

            <table>
                 <thead>
                     <tr>
                         <th>productLine</th>
                        <th>productCode</th>
                        <th>productName</th>
                        <th>productScale</th>
                        <th>productVendor</th>
                        <th>quantityInStock</th>
                        <th>buyPrice</th>
                        <th>MSRP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = mysqli_fetch_assoc($prodetails)) { ?>
                       
                    <tr>
                        <td><?php echo htmlentities($r['productLine']);?></td>
                        <td><?php echo htmlentities($r['productCode']);?></td>
                        <td><?php echo htmlentities($r['productName']); ?></td>
                        <td><?php echo htmlspecialchars($r['productScale']); ?></td>
                        <td><?php echo htmlentities($r['productVendor']); ?></td>
                        <td><?php echo htmlentities($r['quantityInStock']); ?></td>
                        <td><?php echo htmlentities($r['buyPrice']); ?></td>
                        <td><?php echo htmlentities($r['MSRP']); ?></td>
                    </tr>
                  <?php }; mysqli_close($conn); ?>
                </tbody>
            </table>
        </div>
<?php }; ?>   
<?php include 'footer.php'; ?> 
</body>
</HTML>