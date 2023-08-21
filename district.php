<!-- district.php -->
<?php
    include "library.php";
    $id_district = $_GET['id_district'];
    $id_province = substr($id_district,0,2);
    $province = getProvince($id_province);
    $district = ucwords(strtolower($_GET['district']));
?>

<!DOCTYPE html>
<html>
<head>
	<title>District Description</title>
	<meta charset="us-ascii">
    <meta content="Strategi Adaptasi" name="description" />
	<meta content="adaptasi, strategi adaptasi, adaptasi perubahan iklim, iklim, perubahan iklim" name="keywords" />
	<meta content="Mohammad Fadli" name="author" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/main.css"/>
	  <!-- Jquery -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.22.0/css/uikit.almost-flat.min.css"/>

      <script>
      $( function() {
        $( "#tabs" ).tabs({
          beforeLoad: function( event, ui ) {
            ui.jqXHR.fail(function() {
              ui.panel.html(
                "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                "If this wouldn't be a demo." );
            });
          }
        });
      } );
      </script>
    <style>
    
    	* {box-sizing:border-box}

        body {
            font-family:'andes';
            background-color:#F4F8FB;
            padding:15px 20px 10px 20px;
            margin:0;
        }
        
        p {
            margin-top:0;
            font-size:1em;
        }
        
        h1,h2,h3,h4 {
            font-family:'andes-bold';
            color:#279be6;
            padding-bottom:0;
            margin-bottom:0;
        }
        
        @media only screen and (max-width: 767px) {
          /* Styles for mobile devices */
          .desc {
            /* Mobile styles */
            font-size:1.2em;
          }
        }
        
        /*js ui for tab*/
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
<H2><?php echo '<a href="province.php?id_province='.$id_province.'&province='.$province.'"><img src="img/icon/back.png" width="20px" style="margin-bottom:5px"></a> '.$district; ?></H2>
<div id="tabs">
  <ul>
      
      <?php
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=vulnerability">Vulnerability</a></li>';
    //echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=overview">Overview</a></li>';
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=livelihood">Livelihood</a></li>';
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=climate">Climate</a></li>';
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=disaster">Hazard</a></li>';
    //echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=marine">Marine</a></li>';
    //echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=agriculture">Agriculture</a></li>';
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=water">Water</a></li>';
    //echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=health">Health</a></li>';
    echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=adaptation">Adaptation</a></li>';
    //echo '<li><a href="district_tab.php?id_district='.$id_district.'&tab=policy">Policy</a></li>';
        ?>
  </ul>
</div>
    
</body>
</html>
