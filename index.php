<html>
<head><meta charset="us-ascii">

	<title>Strategi Adaptasi</title>
    <meta charset="us-ascii">
    <meta content="Strategi Adaptasi" name="description" />
	<meta content="adaptasi, strategi adaptasi, adaptasi perubahan iklim, iklim, perubahan iklim" name="keywords" />
	<meta content="Mohammad Fadli" name="author" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.22.0/css/uikit.almost-flat.min.css"/>
   
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.22.0/js/uikit.min.js"></script>
<style>
body {background-color:#FFee00;padding:0;margin:0;}

html, body, #mapid {
    height: 100%;
    width: 100vw;
    padding:0;margin:0;
}

@font-face {
  font-family: 'andes';
  src: url('font/AndesRegular.otf') format('opentype');
}
@font-face {
  font-family: 'andes-bold';
  src: url('font/AndesBold.otf') format('opentype');
}

h1,h2,h3 {
    font-family:'andes-bold';
    color:#279be6;
    padding-bottom:0;
}

.leaflet-popup-content-wrapper {
    background-color:#F4F8FB;
}
.leaflet-popup-content {
    min-width:0;
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
.left-align {
  text-align: left;
}

.right-align {
  text-align: right;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:none;
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
}

/* Styling for the iframe */
.overlay iframe {
  width: 95%;
  height: 95%;
    background-color: rgba(0, 0, 0, 0.7);
}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <script src="js/leaflet-providers.js"></script>
  <script src="js/leaflet.ajax.min.js"></script>

</head>
<body>
<a href="http://geo.co.id/strada">
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
    <iframe id="iframe" src="#"></iframe>
  </div>

<button id="locate-position" class="uk-button uk-button-success"><i class="uk-icon-map-marker"></i></button>

<script>
	
	const overlay = document.getElementById('overlay');
	const closeButton = document.getElementById('closeButton');
	
    function showOverlay(overlaycontent) {
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
    
    function toTitleCase(str) {
      return str.replace(
        /\w\S*/g,
        function(txt) {
          return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }
      );
    }

    function clearLayers() {
    mymap.eachLayer(function (layer) {
          if (layer !== streets && layer !== grayscale) { // don't remove the base layer
            mymap.removeLayer(layer);
          }
        });  
    };

    function applyStyleByGroup(l, group) {
      var defStyle;
      if (group == "Java 1")  {
            var defStyle = { "fillColor": "#006100" };
            l.setStyle(defStyle);
       } else if (group == "Java 2")  {
            var defStyle = { "fillColor": "#2d7500" };
            l.setStyle(defStyle);
       } else if (group == "Java 3")  {
            var defStyle = { "fillColor": "#4d8c00" };
            l.setStyle(defStyle);
       } else if (group == "Java 4")  {
            var defStyle = { "fillColor": "#70a300" };
            l.setStyle(defStyle);
       } else if (group == "Java 5")  {
            var defStyle = { "fillColor": "#97bd00" };
            l.setStyle(defStyle);
       } else if (group == "Java 6")  {
            var defStyle = { "fillColor": "#bdd600" };
            l.setStyle(defStyle);
       } else if (group == "Java 7")  {
            var defStyle = { "fillColor": "#e8f000" };
            l.setStyle(defStyle);
       } else if (group == "Java 8")  {
            var defStyle = { "fillColor": "#fff200" };
            l.setStyle(defStyle);
       } else if (group == "Java 9")  {
            var defStyle = { "fillColor": "#ffd000" };
            l.setStyle(defStyle);
       } else if (group == "Java 10")  {
            var defStyle = { "fillColor": "#ffb300" };
            l.setStyle(defStyle);
       } else if (group == "Java 11")  {
            var defStyle = { "fillColor": "#ff9100" };
            l.setStyle(defStyle);
       } else if (group == "Java 12")  {
            var defStyle = { "fillColor": "#ff7300" };
            l.setStyle(defStyle);
       } else if (group == "Java 13")  {
            var defStyle = { "fillColor": "#ff5100" };
            l.setStyle(defStyle);
       } else if (group == "Java 14")  {
            var defStyle = { "fillColor": "#ff2600" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 1")  {
            var defStyle = { "fillColor": "#006100" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 2")  {
            var defStyle = { "fillColor": "#619900" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 3")  {
            var defStyle = { "fillColor": "#c5db00" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 4")  {
            var defStyle = { "fillColor": "#ffd900" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 5")  {
            var defStyle = { "fillColor": "#ff8400" };
            l.setStyle(defStyle);
       } else if (group == "Sulawesi 6")  {
            var defStyle = { "fillColor": "#ff2600" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 1")  {
            var defStyle = { "fillColor": "#006100" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 2")  {
            var defStyle = { "fillColor": "#337A00" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 3")  {
            var defStyle = { "fillColor": "#5A9600" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 4")  {
            var defStyle = { "fillColor": "#86B300" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 5")  {
            var defStyle = { "fillColor": "#B3CF00" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 5")  {
            var defStyle = { "fillColor": "#B3CF00" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 6")  {
            var defStyle = { "fillColor": "#e4f000" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 7")  {
            var defStyle = { "fillColor": "#ffee00" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 8")  {
            var defStyle = { "fillColor": "#ffc800" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 9")  {
            var defStyle = { "fillColor": "#ffa200" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 10")  {
            var defStyle = { "fillColor": "#ff8000" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 11")  {
            var defStyle = { "fillColor": "#ff5500" };
            l.setStyle(defStyle);
       } else if (group == "Papua/Maluku 12")  {
            var defStyle = { "fillColor": "#ff2200" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 1")  {
            var defStyle = { "fillColor": "#498A00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 2")  {
            var defStyle = { "fillColor": "#2B7500" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 3")  {
            var defStyle = { "fillColor": "#8BB500" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 4")  {
            var defStyle = { "fillColor": "#B0CF00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 5")  {
            var defStyle = { "fillColor": "#D6E600" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 6")  {
            var defStyle = { "fillColor": "#B0CF00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 7")  {
            var defStyle = { "fillColor": "#D6E600" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 8")  {
            var defStyle = { "fillColor": "#ffff00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 9")  {
            var defStyle = { "fillColor": "#ffe600" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 10")  {
            var defStyle = { "fillColor": "#ffc800" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 11")  {
            var defStyle = { "fillColor": "#ffa600" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 12")  {
            var defStyle = { "fillColor": "#ff8c00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 13")  {
            var defStyle = { "fillColor": "#ff6f00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 14")  {
            var defStyle = { "fillColor": "#ff4d00" };
            l.setStyle(defStyle);
       } else if (group == "Sumatra 15")  {
            var defStyle = { "fillColor": "#ff2600" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 1")  {
            var defStyle = { "fillColor": "#006100" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 2")  {
            var defStyle = { "fillColor": "#619900" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 3")  {
            var defStyle = { "fillColor": "#C5DB00" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 4")  {
            var defStyle = { "fillColor": "#70A300" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 5")  {
            var defStyle = { "fillColor": "#97BD00" };
            l.setStyle(defStyle);
       } else if (group == "Bali/NT 6")  {
            var defStyle = { "fillColor": "#BDD600" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 1")  {
            var defStyle = { "fillColor": "#006100" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 2")  {
            var defStyle = { "fillColor": "#498a00" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 3")  {
            var defStyle = { "fillColor": "#8bb500" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 4")  {
            var defStyle = { "fillColor": "#d6e600" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 5")  {
            var defStyle = { "fillColor": "#ffe600" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 6")  {
            var defStyle = { "fillColor": "#ffa600" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 7")  {
            var defStyle = { "fillColor": "#ff6f00" };
            l.setStyle(defStyle);
       } else if (group == "Kalimantan 8")  {
            var defStyle = { "fillColor": "#ff2200" };
            l.setStyle(defStyle);
       };
       l.setStyle(defStyle);
    };
    
    function flyToFeature(feature, map) {
      // Get the layer bounds from the feature's geometry
      var layerBounds = L.geoJSON(feature).getBounds();
    
      // Calculate the center of the layer bounds
      var center = layerBounds.getCenter();
    
      // Get the maximum and minimum coordinates of the layer bounds
      var north = layerBounds.getNorth();
      var south = layerBounds.getSouth();
      var east = layerBounds.getEast();
      var west = layerBounds.getWest();
    
      // Calculate the extent of the layer bounds
      var extent = [[south, west], [north, east]];
    
      // Calculate the maximum zoom level to fit the extent
      var maxZoom = map.getBoundsZoom(extent);
    
      // Fly to the center of the layer with the maximum zoom level
      map.flyTo(center, maxZoom);
    }
    
    
 /*District Layer*/
 
    function showCluster(districtname,map) {
    
    var district = new L.GeoJSON.AJAX("data/"+districtname+".geojson",{
        
        onEachFeature: function (f, l) {
            var strIDDESA = f.properties.IDDESA.toString();
            /*
            l.bindPopup('<b style="color:#279be6;font-size: 1.4em;font-family:\'andes-bold\'">Desa '+toTitleCase(f.properties.DESA)+' ('+strIDDESA+')</b><iframe src="page.php?id='+strIDDESA+'&cluster='+f.properties.pca_srclus+'" width="280" height="350" style="border:none;"></iframe>',customOptions);
            */
            l.on('click', function(e) {
               var url = 'page.php?id='+strIDDESA+'&cluster='+f.properties.pca_srclus;
               showOverlay(url);
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
    
   // $.getJSON("data/"+districtname+".geojson", function(data) {
    //    district.addData(data);
        district.addTo(map);
        /*
        var layerBounds = district.getBounds();
        var center = layerBounds.getCenter();
        var north = layerBounds.getNorth();
        var south = layerBounds.getSouth();
        var east = layerBounds.getEast();
        var west = layerBounds.getWest();
        var extent = [[south, west], [north, east]];
        var maxZoom = map.getBoundsZoom(extent);
        map.flyTo(center, maxZoom);
        */
    //    });
    
    map.setMaxZoom(20);
    }
    
 /*National Layer*/
 
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

    /*Province Boundary*/
    var provinceBoundary = new L.GeoJSON.AJAX("data/provinceBoundary.geojson",{
        onEachFeature: function (f, l) {
            /*
            l.bindPopup('<iframe src="page_province.php?id_province='+f.properties.PROVNO+'" width="280" height="350" style="border:none;"></iframe>',customOptions);
            */
            l.on('click', function(e) {
               var url = 'page_province.php?id_province='+f.properties.PROVNO;
               showOverlay(url);
            });
    
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
            
            /*
            l.bindPopup('<table class="district_title"><tr class="district_title"><td class="district_title left-align"><h2>'+toTitleCase(f.properties.KABKOT)+'</h2></td></tr><tr><td class="district_titile right-align"><a href="#" onclick="showCluster(\''+f.properties.KABKOT+'\',mymap);" class="button" style="font-size: 0.8em;">See Village Profiles</a> <a href="#" onclick="showOverlay(\'page_district.php?district='+f.properties.KABKOT+'\');" class="button" style="font-size: 0.8em;">See District Profiles</a></td></tr></table><BR></<iframe src="page_district.php?district='+f.properties.KABKOT+'" width="280" height="350" style="border:none;"></iframe>');
            */
            
            l.bindPopup('<h2>'+toTitleCase(f.properties.KABKOT)+'</h2><a href="#" onclick="showOverlay(\'page_district.php?district='+f.properties.KABKOT+'\');" class="button see-profiles">District Profiles</a> <a href="#" onclick="showCluster(\''+f.properties.KABKOT+'\',mymap);" class="button see-profiles">Village Profiles</a><iframe src="page_district_short.php?district='+f.properties.KABKOT+'" width="301" height="350" style="border:none;"></iframe>');
            
            
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
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> Peta Pesepeda v1.0, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFkbGlnZW8iLCJhIjoiY2xnN2RiZ2FsMDVmYzN1bWNwZ3ZtZ3owNCJ9.z4THQRUYi13b73yehavwTg';

	var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
	
	var baseLayers = {
		"Grayscale": grayscale,
		"Streets": streets
	};
	
	var clusterLayers  = {
      "Cluster": clusters
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
		layers: [streets, provinceBoundary],
		zoomSnap: 1
	});

	/*List Layers*/
	L.control.layers(baseLayers, clusterLayers).addTo(mymap);
	L.control.layers(boundaryLayers).addTo(mymap);
    
    /*Initiate initial layers
    clusterLayers.addTo(mymap);
    provinceBoundary.addTo(mymap);*/

    
    /*zoom change*/
      //On zoomend event handler
      mymap.on("zoomend", function (event) {
        if (mymap.getZoom() > 5 && mymap.getZoom() < 8 ) {
          clearLayers();
          clusters.addTo(mymap);
          provinceBoundary.addTo(mymap);
        } else if (mymap.getZoom() >= 8 && mymap.getZoom() < 9) {
          clearLayers();
          clusters.addTo(mymap);
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
    
    function flyto() {
        mymap.eachLayer(function (layer) {
          if (layer !== streets && layer !== grayscale) { // don't remove the base layer
            mymap.removeLayer(layer);
          }
        });
        if (document.getElementById("fly2dd").value == 1){
            mymap.flyTo([-1.34383549, 119.95691824], 9);
            showCluster('SIGI').addTo(mymap);
        }     
        else if (document.getElementById("fly2dd").value == 2){
            showCluster('MALANG').addTo(mymap);
            mymap.flyTo([-8.08276208, 112.63395661], 10);
        }
        else if (document.getElementById("fly2dd").value == 3){
            mymap.flyTo([-7.5178517439958, 112.48096292882529], 10.7);
            showCluster('MOJOKERTO').addTo(mymap);
        }
        else if (document.getElementById("fly2dd").value == 4){
            mymap.flyTo([-4.242698916532362, 122.42544633610287], 10);
            showCluster('KONAWE SELATAN').addTo(mymap);
        }
        else if (document.getElementById("fly2dd").value == 5){
            mymap.flyTo([-3.6731774782356754, 128.1727310457602], 11);
            showCluster('AMBON').addTo(mymap);
        }
        else if (document.getElementById("fly2dd").value == 6){
            mymap.flyTo([4.507450, 96.825448], 10);
            showCluster('ACEH TENGAH').addTo(mymap);
        }
        else if (document.getElementById("fly2dd").value == 7){
            mymap.flyTo([-1.2528581084339656, 116.86094954763317], 12);
            showCluster('BALIKPAPAN').addTo(mymap);
        }
        else if (document.getElementById("fly2dd").value == 8){
            mymap.flyTo([-8.65366773275109, 115.22049070066736], 12);
            showCluster('DENPASAR').addTo(mymap);
        }
        
    }
    
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


<p></p>
</body>
</html>