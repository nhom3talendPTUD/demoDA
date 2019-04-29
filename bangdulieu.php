<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bảng dữ liệu</title>
<style>
#bang {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#bang td, #bang th {
    border: 1px solid #ddd;
    padding: 8px;
}

#bang tr:nth-child(even){background-color: #f2f2f2;}

#bang tr:hover {background-color: #ddd;}

#bang th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00A8A9;
    color: white;
}
</style>
</head>

<body>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbdemo";

	$conn = mysqli_connect($servername,$username,$password,$dbname);	 
	if(!$conn){	 
	   die('Connection failed:'.mysqli_connect_error());	 
	}
    //Get current date and time
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");

    if(!empty($_POST['nhietdo']) && !empty($_POST['doam']))
    {
    	$nhietdo = $_POST['nhietdo'];
		$doam = $_POST['doam'];

	    $sql = "INSERT INTO dulieu (nhietdo, doam, Date, Time)
		
		VALUES ('".$nhietdo."', '".$doam."', '".$d."', '".$t."')";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();

?>
<div id="cards" class="cards">

<?php 	
	$servername = "localhost";
	$username = "root";
	$dbname = "dbdemo";
	$password = "";	
	//$display = 15;
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
    $sql = "SELECT * FROM dulieu ORDER BY id DESC";
    if ($result=mysqli_query($conn,$sql))
    {
      // Fetch one and one row
      echo "<TABLE id='bang'>";
      echo "<TR><TH>Nhiệt độ</TH><TH>Độ ẩm</TH><TH>DATE</TH><TH>Time</TH></TR>";
      while ($row=mysqli_fetch_row($result))
      {
        echo "<TR>";
        echo "<TD>".$row[0]."</TD>";
        echo "<TD>".$row[1]."</TD>";
        echo "<TD>".$row[2]."</TD>";
        //echo "<TD>".$row[3]."</TD>";
        echo "<TD>".$row[4]."</TD>";
        echo "<TD>".$row[5]."</TD>";
        echo "</TR>";
      }
      echo "</TABLE>";
      // Free result set
      mysqli_free_result($result);
    }
    mysqli_close($conn);
	
?>

</body>
</html>