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


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select productLine, textDescription from productlines";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
    while ($row = mysqli_fetch_assoc($result)){
        echo "<div id='cc'>";
        echo "<br>"."productline: ".$row["productLine"]."<br>"."description: ".$row["textDescription"]."<br>" ."\n" ;
        echo "</div>";
    }
}else{
    echo "0 results.";
}

mysqli_close($conn);
?>

<?php include 'footer.php'; ?> 
</body>
</HTML>