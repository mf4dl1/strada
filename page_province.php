<!DOCTYPE html>
<html>
<head>
	<title>Province Description</title>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
          $( function() {
            $( "#tabs" ).tabs();
          } );
      </script>
	<style>
	* {box-sizing:border-box}

    @font-face {
      font-family: 'andes';
      src: url('font/AndesRegular.otf') format('opentype');
    }
    @font-face {
      font-family: 'andes-bold';
      src: url('font/AndesBold.otf') format('opentype');
    }

    body {
        font-family:'andes';
        background-color:#F4F8FB;
        padding:0 20px 0 20px;margin:0;
    }
    
    h1,h2,h3 {
        font-family:'andes-bold';
        color:#279be6;
    }
    
    h2,h3 {
        margin-bottom:0;
    }
    
    p {
        margin-top:0;
        font-size:1em;
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
		margin:0;
		font-size:1em;
	}
	
    @media only screen and (max-width: 767px) {
      /* Styles for mobile devices */
      .desc {
        /* Mobile styles */
        font-size:1.2em;
      }
    }
	
	.desc th, .desc td {
		padding: 3px;
		text-align: left;
		border-bottom: 1px solid #ddd;
		font-size:0.8em;
		font-weight: normal;
		font-family: "andes";
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
    
    .ui-draggable, .ui-droppable {
    	background-position: top;
    }
    
    .ui-widget-header {
        /*border: 1px solid #dddddd;*/
        background: #F4F8FB;
        color: #333333;
        font-weight: bold;
    }
    
    .ui-widget {
        font-family:'andes';
        font-size: 1em;
    }
    
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
        /*border: 1px solid #003eff;*/
        background: #306DA9;
        /*font-weight: normal;
        color: #ffffff;*/
    }
    
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        /*border: 1px solid #c5c5c5;*/
        background: #d1e6f9;
        /*font-weight: normal;
        color: #454545;*/
    }
	</style>
</head>
<body>
	<?php
	
		$id_province = $_GET['id_province'];
		
		//echo "<h1> District: ".$district."</h1>";

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
$sql = "SELECT * FROM province WHERE id_province = '$id_province'";

$result = mysqli_query($conn, $sql);

// Check if there is any result
if (mysqli_num_rows($result) > 0) {
    
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // Output the variables
		$name = ucwords(strtolower($row["name"]));
		$overview = $row["overview"];
		$climate = $row["climate"];
		$disaster = $row["disaster"];
		$livelihood = $row["livelihood"];
		$adaptation = $row["adaptation"];
		$policy = $row["policy"];
    }
} else {
    echo "No data found.";
}

mysqli_close($conn);

	echo "<h2>".$name." Province</h2>";
    echo "<div id='tabs'>
    <ul>
        <li><a href='#tabs-1'>Overview</a></li>
        <li><a href='#tabs-2'>Climate</a></li>
        <li><a href='#tabs-3'>Disaster</a></li>
        <li><a href='#tabs-4'>Livelihood</a></li>
        <li><a href='#tabs-5'>Adaptation</a></li>
        <li><a href='#tabs-6'>Policy</a></li>
    </ul>";
  
    echo "<div id='tabs-1'>";
    echo "<h3>Overview</h3>"; 
    echo "<p>".$overview."</p>";
    echo "</div>";
    
    echo "<div id='tabs-2'>";
    echo "<h3>Climate</h3>"; 
    echo "<p>".$climate."</p>";
    echo "</div>";
    
    echo "<div id='tabs-3'>";
    echo "<h3>Disaster</h3>"; 
    echo "<p>".$disaster."</p>";
    echo "</div>";
    
    echo "<div id='tabs-4'>";
    echo "<h3>Livelihood</h3>"; 
    echo "<p>".$livelihood."</p>"; 
    echo "</div>";
    
    echo "<div id='tabs-5'>";
    echo "<h3>Adaptation</h3>"; 
    echo "<p>".$adaptation."</p>"; 
    echo "</div>";
    
    echo "<div id='tabs-6'>";
    echo "<h3>Policy</h3>"; 
    echo "<p>".$policy."</p>"; 
    echo "</div>";
    
    echo "</div>";
	
	?>

</body>
</html>
