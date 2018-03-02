<DOCTPYE>
    <div >
   <?php include 'navigation.php'; ?> 
    </div>
<HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" a href="style.css">
</head>

<body>
<?php
    header('Content-Type:text/html; charset=ISO-8859-1');
?>



<?php
require 'dbconfig.php';


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select customerName, country,city, phone 
        from customers 
        ORDER BY country";
$result = mysqli_query($conn, $sql);

?>
    <div>

            <table>
                 <thead>
                     <tr>
                        <th>customerName</th>
                        <th>city</th>
                        <th>phoneNumber</th>
                        <th>country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = mysqli_fetch_assoc($result)): ?>
                       
                    <tr>
                        <td><?php echo utf8_encode($r['customerName']);?></td>
                        <td><?php echo utf8_encode($r['city']); ?></td>
                        <td><?php echo htmlspecialchars($r['phone']); ?></td>
                        <td><?php echo htmlentities($r['country']); ?></td>
                        <?php endwhile; ?>
                    </tr>
                  
                </tbody>
            </table>
        </div>
<?php mysqli_close($conn); ?>
<?php include 'footer.php'; ?> 
</body>
</HTML>