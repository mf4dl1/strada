<!-- province.php -->
<?php
    include "library.php";
    $id_province = $_GET['id_province'];
    $province = ucwords(strtolower(getProvince($id_province)));
    //$province = ucwords(strtolower($_GET['province']));
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $province; ?></title>
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
<?php echo "<h2>$province</h2>"; ?>
<div id="tabs">
  <ul>
      
      <?php
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=vulnerability">Vulnerability</a></li>';
   // echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=overview">Overview</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=livelihood">Livelihood</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=climate">Climate</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=disaster">Hazard</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=marine">Marine</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=agriculture">Agriculture</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=water">Water</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=health">Health</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=adaptation">Adaptation</a></li>';
    echo '<li><a href="province_tab.php?id_province='.$id_province.'&tab=policy">Policy</a></li>';
        ?>
  </ul>
</div>
    
</body>
</html>
