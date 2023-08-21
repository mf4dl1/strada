<!-- village_tab.php -->

<?php
	
$id_village = $_GET['id_village'];
$tab = $_GET['tab'];

// MySQL database credentials
include 'library.php';
$conn = connect();

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to retrieve data from the table
$sql = "SELECT * FROM desa WHERE IDDESA = '$id_village'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>village Profile</title>
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
        
        .description-container {
            display: flex;
            width: 100%;
        }
        
        .column {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }
        
        .label {
            font-weight: bold;
            display: block;
        }
        
        .value {
            display: block;
            margin-top: 5px;
        }
        .bigblue {
            color:#2799E5;
            font-size:4em;
            font-weight:bold;
            margin-bottom:20px;
        }
        .temp {
            background-image: url('img/temp.png');
            background-position: top left;
            background-size: 40px auto;
            background-repeat: no-repeat;
        }
        .prec {
            background-image: url('img/prec.png');
            background-size: cover;
            background-position: top left;
            background-repeat: no-repeat;
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
		$village = ucwords(strtolower($row["DESA"]));
		$subdistrict = ucwords(strtolower($row["KECAMATAN"]));
		$district = ucwords(strtolower($row["KABKOT"]));
		$province = ucwords(strtolower($row["PROVINSI"]));
		$cluster = $row["pca_srclus"];
		$cluster_id = $row["pca_clust_"];
		$cluster_desc = getClusterById($cluster_id);
		
		//Exposure
        $temp18_mn = number_format($row["temp18_mn"]-273.15,2);
        $temp18_sd = number_format($row["temp18_sd"],2);
        $tempchg1802_mn = number_format($row["tempchg180"],2);
        $tempchg1802_sd = number_format($row["tempchg1_1"],2);
        $tempmax5018_mn = number_format($row["tempmax501"],2);
        $tempmax5018_sd  = number_format($row["tempmax5_1"],2);
        $tempmax10018_mn = number_format($row["tempmax100"],2);
        $tempmax10018_sd  = number_format($row["tempmax1_1"],2);
        $pre18_mn = number_format($row["pre18_mn"]*1000,2);
        $pre18_sd = number_format($row["pre18_sd"]*1000,2);
        $prechg1802_mn = number_format($row["prechg1802"]*1000,2);
        $prechg1802_sd = number_format($row["prechg18_1"]*1000,2);
        $pre5018_mn = number_format($row["pre5018_mn"]*1000,2);
        $pre5018_sd = number_format($row["pre5018_sd"]*1000,2);
        $pre10018_mn = number_format($row["pre10018_m"]*1000,2);
        $pre10018_sd = number_format($row["pre10018_s"]*1000,2);


		//Sensitivity
        $lc18_water = $row["lc18_water"];
        $lc18_forest = $row["lc18_fores"];
        $lc18_grasslands = $row["lc18_grass"];
        $lc18_croplands = $row["lc18_cropl"];
        $lc18_urban = $row["lc18_urban"];
        $lc18_other = $row["lc18_other"];
        $lc1802_water = $row["lc1802_wat"];
        $lc1802_forest = $row["lc1802_for"];
        $lc1802_grasslands = $row["lc1802_gra"];
        $lc1802_croplands = $row["lc1802_cro"];
        $lc1802_urban = $row["lc1802_urb"];
        $lc1802_other = $row["lc1802_oth"];
        $pop18 = $row["pop18"];
        $popchg1802 = $row["popchg1802"];
        $slope = $row["slope"];
        $topog = $row["topog"];
        $topcst = $row["topcst"];
        $seause = $row["seause"];
        $mngrvs = $row["mngrvs"];
        $fordep = $row["fordep"];


		//Adaptive Capacity
        $incagr = $row["incagr"];
        $incman = $row["incman"];
        $incsrv = $row["incsrv"];
        $majcrp = $row["majcrp"];
        $natwtr = $row["natwtr"];
        $bus_all = $row["busall"];
        $prpelc = $row["prpelc"];
        $mnfuel = $row["mnfuel"];
        $mnsani = $row["mnsani"];
        $mnwatr = $row["mnwatr"];
        $hltsrv = $row["hltsrv"];
        $edcsrv = $row["edcsrv"];
        $sckttl = $row["sckttl"];
        $dthttl = $row["dthttl"];
        $lngdiv = $row["lngdiv"];
        $mnrddv = $row["mnrddv"];
        $crmttl = $row["crmttl"];
        $vilast = $row["vilast"];
        $natdis = $row["natdis"];
        $natevt = $row["natevt"];
        $clmdis = $row["disdth"];
        $clmevt = $row["clmdis"];
        $disdth = $row["clmevt"];
        $proinf = $row["proinf"];
        $nutpov = $row["nutpov"];


		
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
            <td>
                <div class='description-container'>
                    <div class='column'>
                        <span class='label'>Village Name:</span>
                        <span class='value'>".$village."</span>
                    </div>
                    <div class='column'>
                        <span class='label'>Subdistrict:</span>
                        <span class='value'>".$subdistrict."</span>
                    </div>
                    <div class='column'>
                        <span class='label'>District:</span>
                        <span class='value'>".$district."</span>
                    </div>
                    <div class='column'>
                        <span class='label'>Cluster:</span>
                        <span class='value'>".$cluster."</span>
                    </div>
                </div>
    <h3>".$cluster."</h3>
    <p>".$cluster_desc['desc1']."</p>
    <p>".$cluster_desc['desc2']."</p>
            </td>
            <td><iframe src='village_map.php?tab=overview&id_village=$id_village&village=$village' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'exposure') {
    
    echo "<div id='exposure'>";
    echo "<h3>Exposure</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>
            <div class='description-container'>
                <img src='img/temp.png' style='height:80px;'>
                <div class='column'>
                    <span class='label'>Monthly Avg. Temperature (&deg;C)</span>
                    <span class='value'>2018: ".$temp18_mn."</span>
                    <span class='value'>Change between 2018-2002: ".$tempchg1802_mn."</span>
                </div>
                <div class='column'>
                    <span class='label'>Change in Monthly Avg. Max. Temperature (&deg;C)</span>
                    <span class='value'>2018-2050: ".$tempmax5018_mn."</span>
                    <span class='value'>2018-2100: ".$tempmax10018_mn."</span>
                </div>
            </div>
            <div class='description-container'>
                <img src='img/prec.png' style='height:80px;'>
                <div class='column'>
                    <span class='label'>Monthly Avg. Precipitation (mm/day)</span>
                    <span class='value'>2018: ".$pre18_mn."</span>
                    <span class='value'>Change between 2018-2002: ".$prechg1802_mn."</span>
                </div>
                <div class='column'>
                    <span class='label'>Change in Monthly Avg. Precipitation (mm/day)</span>
                    <span class='value'>2018-2050: ".$pre5018_mn."</span>
                    <span class='value'>2018-2100: ".$pre10018_mn."</span>
                </div>
            </div>  
            
            <div class='description-container'>
                <div class='column'>
                    <span class='value bigblue'>".$natevt."</span>
                    <span class='label'>Total number of natural disaster events from the past three years (2015-2017)</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$clmdis."</span>
                    <span class='label'>Summative index of presence/absence of climate disasters</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$clmevt."</span>
                    <span class='label'>Total number of landslide events in village from 2015, 2016, and 2017</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$disdth."</span>
                    <span class='label'>Total deaths from natural and climate disasters in village from 2015, 2016, 2017</span>
                </div>
            </div>  
            
            </td>
            <td><iframe src='village_map.php?tab=exposure&id_village=$id_village' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'sensitivity') {
    
    echo "<div id='sensitivity'>";
    echo "<h3>Sensitivity</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>
            <div class='description-container'>
                <img src='img/lc.png' style='height:80px;'>
                <div class='column'>
                    <span class='value bigblue'>".$lc18_water."</span>
                    <span class='label'>Land covered by water or permanent wetlands within village boundary (km<sup>2</sup>)</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$lc18_forest."</span>
                    <span class='label'>Land covered in evergreen (needle and broadleaf), deciduous (needle and broadleag), or mixed forest within village boundary (km<sup>2</sup>)</span>
                </div>
            </div>
            <div class='description-container'>
                <div class='column'>
                    <span class='value bigblue'>".$lc18_grasslands."</span>
                    <span class='label'>Land covered in shrublands (open and closed), savannahs (woody and non-woody), and grasslands within village boundary (km<sup>2</sup>)</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$lc18_croplands."</span>
                    <span class='label'>Land covered in croplands and cropland/natural vegetation mosaic within village boundary (km<sup>2</sup>)</span>
                </div>
            </div>
            <div class='description-container'>
                <div class='column'>
                    <span class='value bigblue'>".$lc18_urban."</span>
                    <span class='label'>Land covered by urban or built environment (km<sup>2</sup>)</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$lc1802_water."</span>
                    <span class='label'>Difference in land covered by water or permanent wetlands within village boundary from 2002 to 2018 (km<sup>2</sup>)</span>
                </div>
            </div>
            
            </td>
            <td><iframe src='village_map.php?tab=sensitivity&id_village=$id_village' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>";
    
} elseif ($tab == 'adaptivecapacity') {
    
    echo "<div id='adaptivecapacity'>";
    echo "<h3>Adaptive Capacity</h3>"; 
    echo "<table class='two-column'>
        <tr>
            <td>
            <div class='description-container'>
                <img src='img/live.png' style='height:80px;'>
                <div class='column'>
                    <span class='label'>";
    if ($incagr==1) { echo "Main source of income for the majority of people in the village is agriculture or mining."; }
    elseif ($incman==1) { echo "Main source of income for the majority of people in the village is manufacturing."; }
    elseif ($incsrv==1) { echo "Main source of income for the majority of people in the village is the service industry or other."; }
                    
    echo "</span>
                </div>";
    if ($majcrp==1) { echo "<div class='column'>
                    <span class='label'>Main source of agricultural income for majority of agricultural households is food crop or livestock.</span></div>"; }     
                    
    echo "</div>
            <div class='description-container'> 
                <div class='column'>
                    <span class='value bigblue'>".$bus_all."</span>
                    <span class='label'>Sum of industrial clusters, types of micro-industries, and village services. </span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$hltsrv."</span>
                    <span class='label'>Summative index of all health care centers in village. </span>
                </div>
            </div>
            <div class='description-container'>
                <div class='column'>
                    <span class='value bigblue'>".$edcsrv."</span>
                    <span class='label'>Summative diversity index of all schools  in a village. </span>
                </div>

                <div class='column'>
                    <span class='value bigblue'>".$crmttl."</span>
                    <span class='label'>Summative index of different crimes reported in the last year.</span>
                </div>
                <div class='column'>
                    <span class='value bigblue'>".$vilast."</span>
                    <span class='label'>Summative index of village administrative assets. </span>
                </div>
            </div>
            <div class='description-container'>
                <div class='column'>
                    <span class='value bigblue'>".$proinf."</span>
                    <span class='label'>Summative index of protective infrastructure. </span>
                </div>
            </div>
                
            </div>
            </td>
            <td><iframe src='village_map.php?tab=adaptivecapacity&id_village=$id_village' height='480px' width='100%'></iframe></td>
        </tr>
    </table>";
    echo "</div>"; 
};
	
	?>
	
  
  </body>
