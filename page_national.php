<!DOCTYPE html>
<html>
<head>
	<title>Strategi Adaptasi</title>
	<style>
	* {box-sizing:border-box}

    body {
        font-family:Arial;
        background-color:#CCF1FC;
    }
    
    .title {
        color:#243C81;
        font-size: 1em; 
        font-weight:bold;
    }
    
	.desc {
		border-collapse: collapse;
		width: 100%;
		padding: 3px;
		margin-left: 0;
		margin-right: 0;
	}
	.desc th, .desc td {
		padding: 3px;
		text-align: left;
		border-bottom: 1px solid #ddd;
		font-size:0.8em;
		font-weight: normal;
		font-family: "Trebuchet MS";
	}
    
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }
    
    /* Hide the images by default */
    .mySlides {
      display: none;
    }
    
    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }
    
    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }
    
    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }
    
    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }
    
    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    
    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }
    
    .active, .dot:hover {
      background-color: #717171;
    }
    
    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }
    
    @keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }
	</style>
</head>
<body>
	<?php
	
		$cluster = $_GET['cluster'];
		
		//echo "<h1> Cluster: ".$cluster."</h1>";

// MySQL database credentials
$host = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to retrieve data from the table
$sql = "SELECT * FROM clusters WHERE cluster = '$cluster'";

$result = mysqli_query($conn, $sql);

// Check if there is any result
if (mysqli_num_rows($result) > 0) {
    
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // Output the variables
		$desc1 = $row["desc1"];
		$desc2 = $row["desc2"];


    }
} else {
    echo "No data found.";
}

mysqli_close($conn);

			?>
	<table class="desc">
		<tr>
			<th colspan="2">Cluster Description: <BR>
			<?php echo "<p>".$desc1."<BR><BR>".$desc2."</p>"; ?>
			</th>
		<tr>
		
    </table>


</body>
</html>
