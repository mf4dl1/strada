<!-- province_tab.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Province Description</title>
	<meta charset="us-ascii">
    <meta content="Strategi Adaptasi" name="description" />
	<meta content="adaptasi, strategi adaptasi, adaptasi perubahan iklim, iklim, perubahan iklim" name="keywords" />
	<meta content="Mohammad Fadli" name="author" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/main.css"/>
	
	<script src="js/basic.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    
    	* {box-sizing:border-box}
    
        body {
            font-family:'andes';
            background-color:white;
            padding:10px 20px 0 20px;margin:0;
        }
        
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
	
		$id_province = $_GET['id_province'];
		$tab = $_GET['tab'];

// MySQL database credentials
include 'library.php';
$conn = connect();

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
		$livelihood = $row["livelihood"];
		$climate = $row["climate"];
		$disaster = $row["disaster"];
		
		$water = $row["water"];
		$marine = $row["marine"];
		$agriculture = $row["agriculture"];
		$health = $row["health"];
		
		$vulnerability = $row["vulnerability"];
		$adaptation = $row["adaptation"];
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
            <td style='padding-right:20px;'>".$overview."</td>
            <td><iframe src='province_map.php?tab=overview&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'livelihood') {
    
    echo "<div id='livelihood'>";
    echo "<h3>Livelihood</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$livelihood."</td>
            <td><iframe src='province_map.php?tab=livelihood&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'climate') {
    
    echo "<div id='climate'>";
    echo "<h3>Climate</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$climate."</td>
            <td><iframe src='province_map.php?tab=climate&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'disaster') {
    
    echo "<div id='disaster'>";
    echo "<h3>Disaster</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$disaster."</td>
            <td><iframe src='province_map.php?tab=disaster&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'water') {
    
    
    echo "<div id='water'>";
    echo "<h3>Water</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$water."</td>
            <td><iframe src='province_map.php?tab=water&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'marine') {
    
    
    echo "<div id='marine'>";
    echo "<h3>Marine & Coastal</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$marine."</td>
            <td><iframe src='province_map.php?tab=marine&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'agriculture') {
    
    
    echo "<div id='agriculture'>";
    echo "<h3>Agriculture</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$agriculture."</td>
            <td><iframe src='province_map.php?tab=agriculture&id_province=".$id_province."' height='480px' width='100%' title='Agriculture'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'health') {
    
    echo "<div id='health'>";
    echo "<h3>Health</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$health."</td>
            <td><iframe src='province_map.php?tab=health&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'vulnerability') {
    
    
    echo "<div id='vulnerability'>";
    echo "<h3>Vulnerability</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$vulnerability."</td>
            <td><iframe src='province_map.php?tab=vulnerability&id_province=".$id_province."' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'adaptation') {
    
    echo "<div id='adaptation'>";
    echo "<h3>Adaptation</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td style='padding-right:20px;'>".$adaptation."</td>
            <td><iframe src='province_map.php?tab=adaptation&id_province=".$id_province."' height='480px' width='100%' title='Hydromet Disaster Profile'></iframe></td>
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
