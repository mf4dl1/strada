<!-- subdistrict_tab.php -->

<?php
	
$id_subdistrict = $_GET['id_subdistrict'];
$tab = $_GET['tab'];

// MySQL database credentials
include 'library.php';
$conn = connect();

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to retrieve data from the table
$sql = "SELECT * FROM subdistrict WHERE id_subdistrict = '$id_subdistrict'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Subdistrict Profile</title>
	<meta charset="us-ascii">
    <meta content="Strategi Adaptasi" name="description" />
	<meta content="adaptasi, strategi adaptasi, adaptasi perubahan iklim, iklim, perubahan iklim" name="keywords" />
	<meta content="Mohammad Fadli" name="author" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/main.css"/>
	
	<script src="js/basic.js"></script>
	  <!-- Jquery -->

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    
    	* {box-sizing:border-box}

        p {
            margin-top:0;
            font-size:1em;
        }
        
        @media only screen and (max-width: 767px) {
          /* Styles for mobile devices */
          .desc {
            /* Mobile styles */
            font-size:1.2em;
          }
        }
        
        .two-column {
            border: none;
            background: none;
            margin: 0;
            width: 100%;
        }
        .two-column td {
          width: 50%;
          vertical-align: top;
        }
    </style>    

	
</head>
<body>

<?php

// Check if there is any result
if (mysqli_num_rows($result) > 0) {
    
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // Output the variables
		$subdistrict = $row["subdistrict"];
		$district = ucwords(strtolower($row["district"]));
		$province = ucwords(strtolower($row["province"]));
		$overview = $row["overview"];
		$overview_right = $row["overview_right"];
		$livelihood = $row["livelihood"];
		$livelihood_right = $row["livelihood_right"];
		$climate = $row["climate"];
		$climate_right = $row["climate_right"];
		$disaster = $row["disaster"];
		$disaster_right = $row["disaster_right"];
		
		$water = $row["water"];
		$water_right = $row["water_right"];
		$marine = $row["marine"];
		$marine_right = $row["marine_right"];
		$agriculture = $row["agriculture"];
		$agriculture_right = $row["agriculture_right"];		
		$health = $row["health"];
		$health_right = $row["health_right"];		
		
		$vulnerability = $row["vulnerability"];
		$vulnerability_right = $row["vulnerability_right"];
		$adaptation = $row["adaptation"];
		$adaptation_right = $row["adaptation_right"];
		$policy = $row["policy"];
    }
} else {
    echo "No data found.";
}

mysqli_close($conn);

if ($tab == 'overview') {
    echo "<div id='overview'>";
    echo "<h3>Overview</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$overview."</td>
            <td><iframe src='subdistrict_map.php?tab=overview&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'livelihood') {
    
    echo "<div id='livelihood'>";
    echo "<h3>Livelihood</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$livelihood."</td>
            <td><iframe src='subdistrict_map.php?tab=livelihood&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'climate') {
    
    echo "<div id='climate'>";
    echo "<h3>Climate</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$climate."</td>
            <td><iframe src='subdistrict_map.php?tab=climate&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'disaster') {
    
    echo "<div id='disaster'>";
    echo "<h3>Disaster</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$disaster."</td>
            <td><iframe src='subdistrict_map.php?tab=disaster&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'water') {
    
    
    echo "<div id='water'>";
    echo "<h3>Water</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$water."</td>
            <td><iframe src='subdistrict_map.php?tab=water&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'marine') {
    
    
    echo "<div id='marine'>";
    echo "<h3>Marine & Coastal</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$marine."</td>
            <td><iframe src='subdistrict_map.php?tab=marine&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'agriculture') {
    
    
    echo "<div id='agriculture'>";
    echo "<h3>Agriculture</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$agriculture."</td>
            <td><iframe src='subdistrict_map.php?tab=agriculture&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'health') {
    
    echo "<div id='health'>";
    echo "<h3>Health</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$health."</td>
            <td><iframe src='subdistrict_map.php?tab=health&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'vulnerability') {
    
    
    echo "<div id='vulnerability'>";
    echo "<h3>Vulnerability</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$vulnerability."</td>
            <td><iframe src='subdistrict_map.php?tab=vulnerability&id_subdistrict=$id_subdistrict&subdistrict=$subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'adaptation') {
    
    echo "<div id='adaptation'>";
    echo "<h3>Adaptation</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>".$adaptation."</td>
            <td><iframe src='subdistrict_map.php?tab=adaptation&id_subdistrict=$id_subdistrict' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'policy') {
    
    echo "<div id='policy'>";
    echo "<h3>Policy</h3>"; 
    echo "<p>".$policy."</p>"; 
    echo "</div>";
};
	
	?>
	
  
  </body>
