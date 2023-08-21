<!-- map.php -->

<?php
    include "library.php";
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.22.0/css/uikit.almost-flat.min.css"/>
    
    <script src="js/basic.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.22.0/js/uikit.min.js"></script>
    <style>
        body {
            background-color:#FFee00;
            padding:0;
            margin:0;
        }
        
        html, body, #mapid {
            height: 100%;
            width: 100vw;
            padding:0;margin:0;
        }
        
        h2.overlayTitle {
            margin-left:17px;
            margin-top:10px;
        }
        
        div.overlayTitlediv {
            background-color:#F4F8FB;
            width: 95%;
            position:absolute;
            top:10px;
        }
        
        .leaflet-popup-content-wrapper {
            background-color:#F4F8FB;
        }
        .leaflet-popup-content {
            min-width:0;
        }
        
        .leaflet-popup-content  h1,h2,h3,h4{
            font-family:'andes-bold';
            color:#279be6;
        }
        .leaflet-container a {
            color: #ffffff;
        }
        
        .see-profiles {
          font-size:1.2em;
          top: 5%;
          right: 4%;
          padding: 5px;
          left:10px;
          display: block;
          font-family:'andes-bold';
        }
        
        #locate-position{
          position:absolute;
          bottom: 6vh; right:10px;
          -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          float:none;
          z-index: 5000;
        }
        
        .flybutton {
          position:absolute;
          -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          float:none;
          z-index: 5000;
        }
        
        #fly2dd {
          bottom: 6vh; right:60px; 
          position:absolute;
          -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          float:none;
          z-index: 5000;
          padding:5px;
        }
        
        #fly2village {
          bottom: 6vh; right:200px; 
          position:absolute;
          -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
          float:none;
          z-index: 5000;
          padding:5px;
        }
        
        .district_title {
          width: 100%;
          border-collapse: collapse;
        }
        .district_title tr {
            border: none;
        }
        .district_title td {
            padding: 0;
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
        
        .button, a.button {
          background-color:#306DA9;
          border: none;
          color: white;
          padding: 3px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          margin: 0;
          cursor: pointer;
          border-radius: 3px;
          box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
          transition: all 0.3s ease-in-out;
        }
        
        .button:hover, a.button:hover {
          background-color: #7da7ce;
          box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
          transform: translate(-2px, -2px);
        }
    
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="js/leaflet-providers.js"></script>
  <script src="js/leaflet.ajax.min.js"></script>

</head>
<body>
<a href="https://geo.co.id/strada">
<img src="img/strada.png" 
style="
  height:40px; float:none;  position: absolute;
  top: 10px; left:8vh; z-index: 5000; text-align: center
  " /></a>

<img src="img/supporter.png" style="
  height:40px; float:none;  position: absolute;
  bottom: 10px; left:1vh; z-index: 5000; text-align: center
  " /></a>

<div id="zoom-level" style="
  float:none;  position: absolute;
  top: 60px; left:10vh; z-index: 5000; text-align: center
  "></div>

<div id="mapid"></div>

  <div class="overlay" id="overlay">
    <span class="close-btn" id="closeButton" >&times;</span>
    <!--<div class="overlayTitlediv">
        <h2 class="overlayTitle"></h2>
    </div>-->
    <iframe id="iframe" src="#"></iframe>
  </div>

<button id="locate-position" class="uk-button uk-button-success"><i class="uk-icon-map-marker"></i></button>

<script>
	
	const overlay = document.getElementById('overlay');
	const closeButton = document.getElementById('closeButton');
	
    function showOverlay(title,overlaycontent) {
      //var titleElement = document.querySelector('.overlayTitle');
        //titleElement.innerHTML = toTitleCase(title);
      overlay.style.display = 'flex';
      iframe.src = overlaycontent;
    }
    
    function hideOverlay() {
      overlay.style.display = 'none';
    }
    
    closeButton.addEventListener('click', hideOverlay);
	
    const customOptions = {
     'maxWidth': 'auto', // set max-width
     'className': 'customPopup' // name custom popup
    }

    
    /*District Layer*/
    function showCluster(id_district,map) {
        var district = new L.GeoJSON.AJAX("data/cluster/"+id_district+".geojson", {
            onEachFeature: function (f, l) {
                var village = f.properties.village;
                var id_village = f.properties.id_village;
                l.on('click', function(e) {
                   var url = 'village.php?id_village='+id_village+'&village='+village;
                   showOverlay(village, url);
                });
            
                var defStyle = {
                    "color": "#000000",
                    "fillColor": "#000000",
                    "fillOpacity":0.5,
                    "weight": 2,
                    "opacity": 1,
                    "weight": 0.5
        
                };
                l.setStyle(defStyle);
                
                var group = f.properties.pca_srclus;
                applyStyleByGroup(l, group);
        
                }
            });
        clearLayers();
        district.addTo(map);
        map.setMaxZoom(20);
    }
    
    /*Cluster Layer*/
    var clusters = new L.GeoJSON.AJAX("data/clusters.geojson",{
        onEachFeature: function (f, l) {
            l.bindPopup('<b style="color:#055F3B;font-size:1.4em;font-family: \'andes-bold\';">Cluster '+toTitleCase(f.properties.pca_srclus)+'</b><iframe src="page_national.php?cluster='+f.properties.pca_srclus+'" width="100%" height="350" style="border:none;"></iframe>',customOptions);
        
            var defStyle = {
                "fillColor": "#000000",
                "fillOpacity":0.5,
                "weight": 2,
                "opacity": 1,
                "weight": 0
            };
            l.setStyle(defStyle);
            
            var group = f.properties.pca_srclus;
            applyStyleByGroup(l, group);
        }
    });
    
    var cluster_low = L.tileLayer.wms('https://geoserver.geo.co.id/geoserver/vulnerability/wms', {
      layers: 'vulnerability:cluster_low',
      version: '1.1.0',
      format: 'image/png',
      transparent: true,
      crs: L.CRS.EPSG4326,
      opacity: 0.8
    });
    
    /*Province Boundary*/
    var provinceBoundary = new L.GeoJSON.AJAX("data/provinceBoundary.geojson",{
        onEachFeature: function (f, l) {
            l.on('click', function(e) {
               var url = 'province.php?id_province='+f.properties.PROVNO+'&province='+f.properties.PROVINSI;
               showOverlay(f.properties.PROVINSI,url);
            });
            /*
            l.bindPopup('<h3>'+toTitleCase(f.properties.PROVINSI)+'</h3>');
            
            l.on('mouseover', function (e) {
                this.openPopup();
            });
    
            l.on('mouseout', function (e) {
                this.closePopup();
            });
            */
            var defStyle = {
                    "color": "#000000",
                    "weight": 0.6,
                    "opacity": 1,
                    "fillOpacity":0
            };
            l.setStyle(defStyle);
        }
    }),
    
    /*District Boundary*/
    districtBoundary = new L.GeoJSON.AJAX("data/districtBoundary.geojson",{
        onEachFeature: function (f, l) {
            var id_district=f.properties.PROVNO+f.properties.KABKOTNO;
            /*
            l.bindPopup('<h2>'+toTitleCase(f.properties.KABKOT)+'</h2><a href="#" onclick="showOverlay(\''+f.properties.KABKOT+'\',\'district.php?id_district='+id_district+'\');" class="button see-profiles">District Profiles</a> <a href="#" onclick="showCluster(\''+id_district+'\',mymap);" class="button see-profiles">Village Profiles</a><iframe src="page_district_short.php?id_district='+id_district+'" width="301" height="350" style="border:none;"></iframe>');
            */
            l.on('click', function(e) {
               var url = 'district.php?id_district='+id_district+'&district='+f.properties.KABKOT;
               showOverlay(f.properties.KABKOT,url);
            });
            var defStyle = {
                    "color": "#000000",
                    "weight": 0.4,
                    "opacity": 1,
                    "fillOpacity":0
            };
            l.setStyle(defStyle);
        }
    });
    
    var subdistrictBoundary = new L.GeoJSON.AJAX("data/subdistrictBoundary.geojson",{
        onEachFeature: function (f, l) {
            var defStyle = {
                    "color": "#000000",
                    "weight": 0.2,
                    "opacity": 1,
                    "fillOpacity":0
            };
            l.setStyle(defStyle);
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
	
	var baseLayers = {
		"Grayscale": grayscale,
		"Streets": streets
	};
	
	var clusterLayers  = {
      "Cluster Layers": clusters,
      "Cluster Layers WMS":cluster_low
	};
	
	var boundaryLayers  = {
      "Province Boundary": provinceBoundary,
      "District Boundary": districtBoundary
	};
	

	/*Define My Map*/	
	var mymap = L.map('mapid', {
		center: [-0.7893, 117.957546],
		zoom: 5,
		minZoom: 5,
		maxZoom: 10,
		layers: [streets, cluster_low],
		zoomSnap: 1
	});

	/*List Layers*/
	L.control.layers(baseLayers, clusterLayers).addTo(mymap);
	L.control.layers(boundaryLayers).addTo(mymap);
    
    /*Initiate initial layers*/
    /*clusters.addTo(mymap);*/
    provinceBoundary.addTo(mymap);

    
    /*zoom change*/
      //On zoomend event handler
      mymap.on("zoomend", function (event) {
        if (mymap.getZoom() > 5 && mymap.getZoom() < 8 ) {
          clearLayers();
          cluster_low.addTo(mymap);
          provinceBoundary.addTo(mymap);
        } else if (mymap.getZoom() >= 8 && mymap.getZoom() < 9) {
          clearLayers();
          cluster_low.addTo(mymap);
          districtBoundary.addTo(mymap);
        }
      });
        
    $('#locate-position').on('click', function(){
      mymap.locate({setView: true, maxZoom: 14});
    });
    
    var zoomLevelElement = document.getElementById('zoom-level');
    
    mymap.on('zoomend', function() {
      var zoomLevel = mymap.getZoom();
      zoomLevelElement.textContent = 'Zoom Level: ' + zoomLevel;
    });
    
    function onLocationFound(e) {
        var radius = e.accuracy / 2;
        L.marker(e.latlng).addTo(mymap)
            .bindPopup("Posisimu sekitar " + radius.toFixed(2) + " meter dari titik ini.").openPopup();
    }
    
    mymap.on('locationfound', onLocationFound);
    
    function onLocationError(e) {
        alert(e.message);
    }
    mymap.on('locationerror', onLocationError);
    
    
</script>

</body>
</html>