<!-- district_map.php -->
<?php
    include "library.php";
    $tab = $_GET['tab'];
    $id_district = $_GET['id_district'];
    $district = $_GET['district'];
    $extent = getExtent($id_district);
?>

<html>
<head>
    <title>Strategi Adaptasi</title>
	<meta charset="us-ascii">
    <meta content="Strategi Adaptasi" name="description" />
	<meta content="adaptasi, strategi adaptasi, adaptasi perubahan iklim, iklim, perubahan iklim" name="keywords" />
	<meta content="Mohammad Fadli" name="author" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/main.css"/>
	
     <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
       integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
       crossorigin=""/>
       
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
       integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
       crossorigin=""></script>
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="js/leaflet-providers.js"></script>
    <script src="js/leaflet.ajax.min.js"></script>
    <script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js"></script>
    <script src="js/basic.js"></script>
    
    <style>
    	* {box-sizing:border-box}

        body {
            background-color:#F4F8FB;
            padding:0;margin:0;
        }
        
        .map_container {
            width:100%;
            height:100%;
            background-color:#dfecf2;
        }
        
        #map_overview {
            height: 100%;
            width: 100%;
            padding:0;margin:0;
            position:relative;
        }
        
        @media only screen and (max-width: 767px) {
          /* Styles for mobile devices */
          .desc {
            /* Mobile styles */
            font-size:1.2em;
          }
        }
        
        .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          display: none;
          align-items: center;
          justify-content: center;
          z-index: 9999;
        }
        
        /* Styling for the close button */
        .overlay .close-btn {
          position: absolute;
          top: 5%;
          right: 4%;
          padding: 5px;
          width: 20px;
          height: 20px;
          border-radius: 3px;
          color: #fff;
          text-align:center;
          background-color:#f00;
          font-size: 18px;
          cursor: pointer;
          z-index:99;
        }
        
        /* Styling for the iframe */
        .overlay iframe {
          width: 95%;
          height: 95%;
            /*background-color: rgba(0, 0, 0, 0.7);*/
          background-image: url("img/loading.gif");
          background-color: #fff;
          background-position: center;
          background-repeat: no-repeat;
          background-size:100px;
        }
        
        /*Baloon Map*/
        .leaflet-popup-content-wrapper, .leaflet-popup-tip {
            background: #F4F8FB;
        }
        .leaflet-container {
            font-family:'andes';
        }
    	
    </style>  
</head>
    <body>
        
        <div class='map_container'>
            <div id='map_overview'></div>
        </div>

        <script>

        
        /*Disaster Layers Group*/
        
        /*Hazard Layers*/
        var flood_hazard = L.esri.dynamicMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_banjir/MapServer', layers: [0]
        });
        var flash_flood_hazard = L.esri.dynamicMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_banjir_bandang/MapServer', layers: [0]
        });
        var extreme_weather_hazard = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_cuaca_ekstrim/ImageServer'
        });
        var extreme_wave_hazard = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_gelombang_ekstrim_dan_abrasi/ImageServer'
        });
        var forest_land_fire_hazard = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_kebakaran_hutan_dan_lahan/ImageServer'
        });
        var drought_hazard = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_kekeringan/ImageServer'
        });
        var landslide_hazard = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_bahaya_tanah_longsor/ImageServer'
        });
        
        /*Vulnerability Layers*/
        var flood_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_banjir/ImageServer'
        });
        var flash_flood_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_banjir_bandang/ImageServer'
        });
        var extreme_weather_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_cuaca_ekstrim/ImageServer'
        });
        var extreme_wave_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_gelombang_ekstrim_dan_abrasi/ImageServer'
        });
        var forest_land_fire_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_kebakaran_hutan_dan_lahan/ImageServer'
        });
        var drought_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_kekeringan/ImageServer'
        });
        var landslide_vuln = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_kerentanan_tanah_longsor/ImageServer'
        });
        
        /*Risk Layers*/
        var flood_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir/ImageServer'
        });
        var flash_flood_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir_bandang/ImageServer'
        });
        var extreme_weather_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_cuaca_ekstrim/ImageServer'
        });
        var extreme_wave_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_gelombang_ekstrim_dan_abrasi/ImageServer'
        });
        var forest_land_fire_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_kebakaran_hutan_dan_lahan/ImageServer'
        });
        var drought_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_kekeringan/ImageServer'
        });
        var landslide_risk = L.esri.imageMapLayer({
            url: 'https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_tanah_longsor/ImageServer'
        });
        

        
        /*Vulnerability Layers*/
        <?php echo 'var clusterLayer = new L.GeoJSON.AJAX("data/cluster/'.$id_district.'.geojson",{
            filter: function (f) {
            var id_district = f.properties.id_dist;
            return (id_district === '.$id_district.');
          },
            onEachFeature: function (f, l) {
                var village = f.properties.village;
                var id_village = f.properties.id_village;
                l.bindPopup(\'<h3><a href="village.php?id_village=\'+id_village+\'&village=\'+village+\'&tab=overview" target="_parent">\' + toTitleCase(village) + \' Village</a></h3>\'+f.properties.pca_srclus);'; ?>
            var defStyle = {
                "fillColor": "#B2B2B2",
                "fillOpacity":0.8,
                "weight": 0.7,
                "opacity": 1,
                "color": "#000000"
            };
                l.setStyle(defStyle);
                var group = f.properties.pca_srclus;
                applyStyleByGroup(l, group);
                
            }
        });
        

                
        /*Base Map*/	
        var 
        mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        	'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> GFDRR v1.0, ' +
        	'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFkbGlnZW8iLCJhIjoiY2xnN2RiZ2FsMDVmYzN1bWNwZ3ZtZ3owNCJ9.z4THQRUYi13b73yehavwTg';
        
        var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
        	streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
        	
        
        /*Subdistrict Boundary*/
        <?php echo 'var subdistrictBoundary = new L.GeoJSON.AJAX("data/subdistrict/subdistrict_'.$id_district.'.geojson",{'; ?>
          onEachFeature: function (f, l) {
            var subdistrict = f.properties.subdistric;
            var id_subdistrict = f.properties.id_subdist;
            l.bindPopup('<h3><a href=\'subdistrict.php?id_subdistrict='+id_subdistrict+'&subdistrict='+subdistrict+'&tab=overview\' target=\'_parent\'>'+toTitleCase(subdistrict)+'</h3>');
            var defStyle = {
              "color": "#0000FF",
              "weight": 1,
              "opacity": 1,
              "fillOpacity": 0
            };
            l.setStyle(defStyle);
          }
        });
        
        var subdistrictBoundaryWMS = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/boundary/wms', {
          <?php echo 'layers: \'boundary:subdistrict_'.$id_district.'\','; ?>
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        
        /*Layer Grouping*/
        
        var baseLayers = {
        	"Grayscale": grayscale,
        	"Streets": streets
        };
        
        var basicLayers = {
        	"Subdistrict Boundary": subdistrictBoundary
        };

        var disasterLayers = {
            "Flood Hazard": flood_hazard,
        	"Flash Flood Hazard Hazard": flash_flood_hazard,
        	"Extreme Weather Hazard": extreme_weather_hazard,
        	"Extreme Wave & Coastal Erosion Hazard": extreme_wave_hazard,
        	"Forest & Land Fire Hazard": forest_land_fire_hazard,
        	"Drought Hazard": drought_hazard,
        	"Landslide Hazard": landslide_hazard,
        	
            "Flood Vulnerability": flood_vuln,
        	"Flash Flood Hazard Vulnerability": flash_flood_vuln,
        	"Extreme Weather Vulnerability": extreme_weather_vuln,
        	"Extreme Wave & Coastal Erosion Vulnerability": extreme_wave_vuln,
        	"Forest & Land Fire Vulnerability": forest_land_fire_vuln,
        	"Drought Vulnerability": drought_vuln,
        	"Landslide Vulnerability": landslide_vuln,
        	
            "Flood Risk": flood_risk,
        	"Flash Flood Hazard Risk": flash_flood_risk,
        	"Extreme Weather Risk": extreme_weather_risk,
        	"Extreme Wave & Coastal Erosion Risk": extreme_wave_risk,
        	"Forest & Land Fire Risk": forest_land_fire_risk,
        	"Drought Risk": drought_risk,
        	"Landslide Risk": landslide_risk
        };
        
        var fakebase = {}

        var vulnerabilityLayers = {
        	"Village Cluster": clusterLayer
        };
        
        /*Define Map Overview*/	
        <?php echo "var extent = L.latLngBounds([".$extent['ymin'].", ".$extent['xmin']."], [".$extent['ymax'].", ".$extent['xmax']."]);" ?>
        var centroid = extent.getCenter();
        var mymap = L.map('map_overview', {
        	minZoom: 7,
        	maxZoom: 15,
        	layers: [grayscale],
        	zoomSnap: 0.5
        });
        
        mymap.fitBounds(extent);
        var zoomLevel = mymap.getZoom();
        
        L.control.layers(baseLayers, basicLayers).addTo(mymap);


        // Add the legend control
        var legendControl = L.control({
          position: 'bottomright'
        });
        
        <?php
            if ($tab == 'disaster') {
                echo "flood_risk.addTo(mymap);";
                echo "subdistrictBoundary.addTo(mymap);";
                echo "L.control.layers(disasterLayers).addTo(mymap);";
             } elseif ($tab == 'vulnerability') {
                echo "clusterLayer.addTo(mymap);";
                echo "L.control.layers(fakebase, vulnerabilityLayers).addTo(mymap);";
                echo "subdistrictBoundary.bringToFront();";
            } elseif ($tab == 'adaptation') {
                echo "agri_sulteng.addTo(mymap);";
                echo "subdistrictBoundary.addTo(mymap);";
                echo "L.control.layers(adaptationLayers).addTo(mymap);";
            };
        ?>

        </script>
    </body>
</html>