<!-- province_map.php -->
<?php
    include "library.php";
    $tab = $_GET['tab'];
    $id_province = $_GET['id_province'];
    $extent = getExtent($id_province);
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
    
    <script src="js/basic.js"></script>
    <script src="js/leaflet-providers.js"></script>
    <script src="js/leaflet.ajax.min.js"></script>
    <script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js"></script>
    
    <style>
    	* {box-sizing:border-box}
    

    
        body {
            font-family:'andes';
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
        
        .leaflet-container {
            font: 12px/1.5 'andes', Arial, Helvetica, sans-serif;
        }
        
        p {
            margin-top:0;
            font-size:1em;
        }
        
        .leaflet-popup-content-wrapper {
            background-color:#F4F8FB;
        }
        .leaflet-popup-content {
            min-width:0;
        }
        
        @media only screen and (max-width: 767px) {
          /* Styles for mobile devices */
          .desc {
            /* Mobile styles */
            font-size:1.2em;
          }
        }

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
        
        /*District Boundary*/
        var districtBoundary = new L.GeoJSON.AJAX("data/districtBoundary.geojson",{
            filter: function (f) {
            var provno = f.properties.PROVNO;
            <?php echo "return (provno === '".$id_province."');"; ?>
          },
            onEachFeature: function (f, l) {
                l.bindPopup('<h3><a href=\'district.php?id_district='+f.properties.PROVNO+f.properties.KABKOTNO+'&district='+f.properties.KABKOT+'&tab=overview\' target=\'_parent\'>'+toTitleCase(f.properties.KABKOT)+'</h3>');
                var defStyle = {
                        "color": "#000000",
                        "weight": 0.4,
                        "opacity": 1,
                        "fillOpacity":0
                };
                l.setStyle(defStyle);
            }
        });
        
        <?php
        
        /*Basic Statistics*/
        statisticLayer('popLayer', 'pop','Population: ','','0','450000','teal');
        statisticLayer('popdensLayer', 'popd_sqm','Population Density','(sqm)','0','100','red');
        statisticLayer('giniLayer', 'gini','Gini Ratio','','0.2','0.35','yellow');
        statisticLayer('poorLayer', 'poor','Poor People','Million','0','60','purple');
        
        /*Livelihood*/
        statisticLayer('affLayer', 'aff','Agriculture, Forestry, and Fishing: ',' person','6200','140000','green');
        statisticLayer('mmcLayer', 'mmc','Mining, Construction, Manufacturing, etc.',' person','6100','31600','red');
        statisticLayer('traLayer', 'tra','Trade & Services',' person','14800','148000','yellow');
        		

        /*Marine*/
        statisticLayer('fcLayer', 'fc_vol','Fish Capture Volume','Ton','182','26274','purple');
        statisticLayer('fc_valLayer', 'fc_val','Fish Capture Value','Rupiah','911500','646695651','blue');
        statisticLayer('ifcLayer', 'ifc','Inland Fishery Catching','HH','0','270','teal');
        statisticLayer('fhh_mfcatchLayer', 'fhh_mfcatch','Marine Fishery Catching','HH','0','7500','red');
        statisticLayer('fhh_ifcLayer', 'fhh_ifc','Inland Fishery Culture','HH','0','2544','green');
        statisticLayer('fhh_mfcLayer', 'fhh_mfc','Marine Fishery Culture','HH','0','8902','purple');
        statisticLayer('fhhLayer', 'fhh','Number of Fishery','HH','0','9779','blue');
        
        /*Agriculture*/
        statisticLayer('i_wetlandLayer', 'i_wetland','Irrigated Wet Land','Ha','0','31000','green');
        statisticLayer('ni_wlLayer', 'ni_wl','Non-irrigated Wet Land','Ha','0','5750','blue');
        statisticLayer('r_paLayer', 'r_pa','Rubber Planted Area','Ha','0','1750','yellow');
        statisticLayer('r_proLayer', 'r_pro','Palm Oil Planted Area','Ha','0','950','red');
        statisticLayer('po_paLayer', 'po_pa','Rubber Production','Ton','0','40000','teal');
        statisticLayer('po_proLayer', 'po_pro','Palm Oil Production','Ton','0','40000','green');
        
        /*Health*/
        statisticLayer('hosLayer', 'hos','Hospital','','1','10','red');
        statisticLayer('mhosLayer', 'mhos','Maternity Hospital','','0','5','yellow');
        statisticLayer('phcLayer', 'phc','Public Health Center','','1','30','blue');
        statisticLayer('chcLayer', 'chc','Child Health Center','','80','450','purple');

        ?>
        
        /*Climate layer*/
        var zom = new L.GeoJSON.AJAX("data/zom_sulawesi.geojson",{
            onEachFeature: function (f, l) {
                l.bindPopup('<h3>'+f.properties.NO_ZOM+'</h3><img width="301px" src="img/climate/'+f.properties.NO_ZOM+'.png" style="cursor:pointer;" onclick="showOverlay(\'img/climate/'+f.properties.NO_ZOM+'.png\');">');
                var defStyle = {
                        "color": "#306da9",
                        "weight": 1,
                        "opacity": 1,
                        "fillOpacity":0.1
                };
                l.setStyle(defStyle);
            }
        });
        
        /*Projection Layers*/
        var proj_rain_djf = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/projection/wms', {
          layers: 'projection:rainfall_sulawesi_djf',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var proj_rain_mam = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/projection/wms', {
          layers: 'projection:rainfall_sulawesi_mam',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var proj_rain_jja = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/projection/wms', {
          layers: 'projection:rainfall_sulawesi_jja',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var proj_rain_son = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/projection/wms', {
          layers: 'projection:rainfall_sulawesi_son',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
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
        
        /*Water Layers Group*/
        /*Watershed Layer*/
        var watershed = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/watershed/wms', {
          layers: 'watershed:DAS Sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var sabodam = new L.GeoJSON.AJAX("data/water/ast_sabodam_fulltable.geojson",{
            onEachFeature: function (f, l) {
                /*nm_balai, provinsi, nm_ws, nm_das, kab_kota, kecamatan, kel_desa, */
                l.bindPopup('<h3>'+toTitleCase(f.properties.nm_balai)+'</h3><BR>Wilayah Sungai: '+f.properties.nm_ws+'<BR>DAS: '+f.properties.nm_das+'<BR>Provinsi: '+f.properties.provinsi+'<BR>Kabupaten/Kota: '+f.properties.kab_kota+'<BR>Kecamatan: '+f.properties.kecamatan+'<BR>Kelurahan/Desa: '+f.properties.kel_desa+'<BR>Sumber Data: <a href="https://sigi.pu.go.id/ast/index.php?layer=ast_bendung_fulltable">Kementerian PUPR</a>');
                var sabodamIcon = L.icon({
                  iconUrl: 'img/icon/damicon.png',
                  iconSize: [20, 20]
                });
                l.setIcon(sabodamIcon);
            }
        });
        
        /*Major River Sulteng*/
        var majorRiverSultengAR = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/water/wms', {
          layers: 'water:river_sulteng_ar',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var majorRiverSultengLN = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/water/wms', {
          layers: 'water:major_river_sulteng_ln',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        var majorRiverSultengJSON = new L.GeoJSON.AJAX("data/water/river_sulteng_ar_s.geojson",{
            onEachFeature: function (f, l) {
                l.bindPopup('<h3>'+f.properties.NAMOBJ+'</h3>');
                var defStyle = {
                        "color": "#306da9",
                        "weight": 1,
                        "opacity": 0,
                        "fillOpacity":0
                };
                l.setStyle(defStyle);
            }
        });
        
        var majorRiverGroup = L.layerGroup([majorRiverSultengAR, majorRiverSultengLN, majorRiverSultengJSON]);
        
        /*Medium River*/
        var mediumRiverSulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/water/wms', {
          layers: 'water:medium_river_sulteng_ln_s',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        /*Health Layers*/
        var hospitalLayer = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/health/wms', {
          layers: 'health:hospital_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        /*Vulnerability Layers*/
        var cluster_province = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/vulnerability/wms', {
        <?php echo "layers: 'vulnerability:cluster_".$id_province."',"; ?>
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        
        /*Adaptation Layers*/
        var marine_sulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/adaptation/wms', {
          layers: 'adaptation:marine_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        var coastal_sulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/adaptation/wms', {
          layers: 'adaptation:coastal_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        var water_sulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/adaptation/wms', {
          layers: 'adaptation:water_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        var agri_sulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/adaptation/wms', {
          layers: 'adaptation:agri_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
        var health_sulteng = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/adaptation/wms', {
          layers: 'adaptation:health_sulteng',
          version: '1.1.0',
          format: 'image/png',
          transparent: true,
          crs: L.CRS.EPSG4326
        });
                
        /*Base Map*/	
        var 
        mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        	'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> GFDRR v1.0, ' +
        	'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFkbGlnZW8iLCJhIjoiY2xnN2RiZ2FsMDVmYzN1bWNwZ3ZtZ3owNCJ9.z4THQRUYi13b73yehavwTg';
        
        var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
        	streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
        
        var baseLayers = {
        	"Grayscale": grayscale,
        	"Streets": streets
        };
        
        var basicLayers = {
        	"District Boundary": districtBoundary
        };
        
        var overviewLayers = {
        	"Population": popLayer,
        	"Population Density (sqm)": popdensLayer,
        	"Gini Ratio": giniLayer,
        	"Poor People (Mil)": poorLayer
        };
        
        var livelihoodLayers = {
            "Number of Fishery Household": fhhLayer,
            "Agriculture, Forestry, & Fishing":affLayer,
            "Mining, Manufacturing, Construction, etc.":mmcLayer,
            "Trade, Services, Transportation, etc.":traLayer
        };  
        
        var climateLayers = {
            "Seasonal Zone": zom,
            "Rainfall Projection Dec-Jan-Feb": proj_rain_djf,
        	"Rainfall Projection Mar-Apr-May": proj_rain_mam,
        	"Rainfall Projection Jun-Jul-Aug": proj_rain_jja,
        	"Rainfall Projection Sep-Oct-Nov": proj_rain_son
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
        var waterLayers = {
            "Watershed": watershed,
            "Major River" : majorRiverGroup,
            "Medium River" : mediumRiverSulteng, 
            "Sabo Dam": sabodam
        }

        
        var marineLayers = {
            "Number of Fishery Household": fhhLayer,
            "Fish Capture Volume":fcLayer,
            "Fish Capture Value":fc_valLayer,
            "Fishery Catching":ifcLayer,
            "Marine Fishery Catching": fhh_mfcatchLayer,
            "Inland Fishery Culture": fhh_ifcLayer,
            "Marine Fishery Culture": fhh_mfcLayer
        }
        
        var agricultureLayers = {
            "Irrigated Wet Land": i_wetlandLayer,
            "Not Irrigated Wet Land": ni_wlLayer,
            "Rubber Planted Area": r_paLayer,
            "Palm Oil Planted Area": r_proLayer,
            "Rubber Production": po_paLayer,
            "Palm Oil Production": po_proLayer
        }
        
        var healthLayers = {
            "Hospital Number": hosLayer,
            "Hospital Location": hospitalLayer,
            "Maternity Hospital": mhosLayer,
            "Public Health Center": phcLayer,
            "Child Health Center": chcLayer
        }
        
        var vulnerabilityLayers = {
        	"Village Cluster": cluster_province
        };
        
        var adaptationLayers = {
        	"Marine Subsector": marine_sulteng,
        	"Coastal Subsector": coastal_sulteng,
        	"Water Sector": water_sulteng,
        	"Agriculture Sector": agri_sulteng,
        	"Health Sector": health_sulteng
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
    
        function showLegend(workspace,layer) {
            legendControl.onAdd = function (map) {
              var div = L.DomUtil.create('div', 'legend');
              div.innerHTML = '<img src="https://geoserver.geo.co.id/geoserver/'+workspace+'/wms?REQUEST=GetLegendGraphic&VERSION=1.1.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER='+workspace+':'+layer+'">';
              return div;
            };
            legendControl.addTo(mymap);
        };
        
        <?php
            if ($tab == 'overview') {
                echo "popdensLayer.addTo(mymap);";
                echo "L.control.layers(fakebase, overviewLayers).addTo(mymap);";
            } elseif ($tab == 'climate') {
                echo "zom.addTo(mymap);";
                echo "districtBoundary.addTo(mymap);";
                echo "L.control.layers(fakebase, climateLayers).addTo(mymap);";
            } elseif ($tab == 'disaster') {
                echo "flood_risk.addTo(mymap);";
                echo "districtBoundary.addTo(mymap);";
                echo "L.control.layers(fakebase, disasterLayers).addTo(mymap);";
            } elseif ($tab == 'livelihood') {
                echo "fhhLayer.addTo(mymap);";
                echo "L.control.layers(fakebase, livelihoodLayers).addTo(mymap);";  
            } elseif ($tab == 'water') {
                echo "majorRiverGroup.addTo(mymap);";
                echo "L.control.layers(fakebase, waterLayers).addTo(mymap);";
            } elseif ($tab == 'marine') {
                echo "fcLayer.addTo(mymap);";
                echo "L.control.layers(fakebase, marineLayers).addTo(mymap);";
            } elseif ($tab == 'agriculture') {
                echo "L.control.layers(fakebase, agricultureLayers).addTo(mymap);";
                echo "i_wetlandLayer.addTo(mymap);";
            } elseif ($tab == 'health') {
                echo "L.control.layers(fakebase, healthLayers).addTo(mymap);";
                echo "chcLayer.addTo(mymap);";
                echo "hospitalLayer.bringToFront();";
            } elseif ($tab == 'vulnerability') {
                echo "cluster_province.addTo(mymap);";
                echo "districtBoundary.addTo(mymap);";
                echo "L.control.layers(fakebase, vulnerabilityLayers).addTo(mymap);";
                echo "showLegend('vulnerability','cluster_".$id_province."');";
            } elseif ($tab == 'adaptation') {
                echo "coastal_sulteng.addTo(mymap);";
                echo "L.control.layers(fakebase, adaptationLayers).addTo(mymap);";
            };
        ?>
        
        function getColor(value,min,max,palette) {
            
          // Return the color based on the index
          switch(palette) {
              case "red":
                colorPalette = ['#FFEDA0', '#FED976', '#FEB24C', '#FD8D3C', '#FC4E2A', '#E31A1C', '#BD0026'];
                break;
              case "blue":
                colorPalette = ['#EFF3FF', '#C6DBEF', '#9ECAE1', '#6BAED6', '#4292C6', '#2171B5', '#08519C', '#08306B', '#042B48', '#021D38'];
                break;
              case "yellow":
                colorPalette = ['#FFFFCC', '#FFFF99', '#FFFF66', '#FFFF33', '#FFFF00', '#FFCC00', '#FF9900', '#FF6600', '#FF3300', '#FF0000'];
                break;
              case "green":
                colorPalette = ['#EDF8E9', '#C7E9C0', '#A1D99B', '#74C476', '#41AB5D', '#238B45', '#006D2C', '#00441B', '#002700', '#001800'];
                break;
              case "purple":
                colorPalette = ['#F2F0F7', '#DADAEB', '#BCBDDC', '#9E9AC8', '#807DBA', '#6A51A3', '#54278F', '#3F007D', '#2D004B', '#1B0032'];
                break;
              case "cyan":
                colorPalette = ['#EDF8FB', '#B2E2E2', '#66C2A4', '#2CA25F', '#006D2C', '#238B45', '#41AE76', '#66C2A5', '#99D8C9', '#CCECE6'];
                break;
              case "teal":
                colorPalette = ['#F0F9F6', '#CCECE6', '#99D8C9', '#66C2A5', '#41AE76', '#238B45', '#006D2C', '#005C24', '#003C14', '#00280D'];
                break;
              default:
                return colorPalette[index];
            }

          // Calculate the population range
          var range = max - min;
          
          // Calculate the index based on the population value
          var index = Math.floor((value - min) / (range / colorPalette.length));
         
          return colorPalette[index];
          
        }
 
        </script>
    </body>
</html>