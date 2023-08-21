<!-- library.php -->
<?php

function connect() {
    $host = "";
    $username = "";
    $password = "!";
    $dbname = "";
    
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

/*getCentroid*/
function getCentroid($id) {
    // Connect to the database
    $conn = connect();
    
    // Prepare the SQL statement
    $sql = "SELECT lat, lon FROM extent WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter and execute the query
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Bind the result to variables
    $stmt->bind_result($lat, $lon);
    
    // Fetch the result
    $stmt->fetch();
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
    
    // Return the lat and lon values
    return array("lat" => $lat, "lon" => $lon);
}

/*getExtent*/
function getExtent($id) {
    // Connect to the database
    $conn = connect();
    
    // Prepare the SQL statement
    $sql = "SELECT lat, lon, xmin, xmax, ymin, ymax FROM extent WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter and execute the query
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Bind the result to variables
    $stmt->bind_result($lat, $lon, $xmin, $xmax, $ymin, $ymax);
    
    // Fetch the result
    $stmt->fetch();
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
    
    // Return the lat and lon values
    return array("lat" => $lat, "lon" => $lon, "xmin" => $xmin, "xmax" => $xmax, "ymin" => $ymin, "ymax" => $ymax);
}

/*getProvince*/
function getProvince($id_province) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT name FROM province WHERE id_province = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $id_province);
    $statement->execute();

    // Fetch the result
    $result = $statement->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the province value
        $row = $result->fetch_assoc();
        $province = $row['name'];
    } else {
        $province = "Province not found";
    }

    // Close the statement and database connection
    $statement->close();
    $connection->close();

    // Return the province value
    return $province;
}

/*getDistrict*/
function getDistrict($id_district) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT district FROM district WHERE id_district = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $id_district);
    $statement->execute();

    // Fetch the result
    $result = $statement->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the province value
        $row = $result->fetch_assoc();
        $district = $row['district'];
    } else {
        $district = "District not found";
    }

    // Close the statement and database connection
    $statement->close();
    $connection->close();

    // Return the province value
    return $district;
}

/*getSubdistrict*/
function getSubdistrict($id_subdistrict) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT subdistrict FROM subdistrict WHERE id_subdistrict = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $id_subdistrict);
    $statement->execute();

    // Fetch the result
    $result = $statement->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the province value
        $row = $result->fetch_assoc();
        $subdistrict = $row['subdistrict'];
    } else {
        $subdistrict = "Subdistrict not found";
    }

    // Close the statement and database connection
    $statement->close();
    $connection->close();

    // Return the value
    return $subdistrict;
}

/*Province Level*/
function statisticLayer ($layer,$attr,$prefix,$endfix,$min,$max,$color) {
    
    echo "var $layer = new L.GeoJSON.AJAX(\"data/districtBoundarySulteng.geojson\",{
            onEachFeature: function (f, l) {
                var kabkot = f.properties.KABKOT;
                var id_district = f.properties.PROVNO+f.properties.KABKOTNO;
                fetch('data/statistic.json')
                    .then(response => response.json())
                    .then(data => {
                        var statisticData = data[kabkot];
                        var popupContent = '<h3><a href=\'district.php?tab=overview&id_district=' + id_district + '&district=' + kabkot + '\' target=\'_parent\'>' + kabkot + '</a></h3>';
                        popupContent += '<strong>$prefix: </strong> ' + statisticData.$attr + ' $endfix<br>';
                        l.bindPopup(popupContent);
                        var defStyle = {
                          fillColor: getColor(statisticData.$attr,$min,$max,'$color'), fillOpacity: 0.7, weight: 1, color: '#000000', opacity: 1
                        };
                        l.setStyle(defStyle);
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }
        });";
}

/*District Level*/
function statDistrict ($id_district,$layer,$attr,$prefix,$endfix,$min,$max,$color) {
    
    echo "var $layer = new L.GeoJSON.AJAX(\"data/subdistrict/".$id_district."_subdistrict.geojson\",{
            onEachFeature: function (f, l) {
                var subdistrict = f.properties.subdistrict;
                fetch('data/subdistrict/".$id_district."_subdistrict.json')
                    .then(response => response.json())
                    .then(data => {
                        var statisticData = data[subdistrict];
                        var popupContent = '<h3><a href=\'subdistrict.php?id_subdistrict='+f.properties.id_subdistrict+'&subdistrict='+f.properties.subdistrict+'&tab=overview\' target=\'_parent\'>' + subdistrict + '</a></h3>';
                        popupContent += '<strong>$prefix: </strong> ' + statisticData.$attr + ' $endfix<br>';
                        l.bindPopup(popupContent);
                        var defStyle = {
                          fillColor: getColor(statisticData.$attr,$min,$max,'$color'), fillOpacity: 0.7, weight: 1, color: '#000000', opacity: 1
                        };
                        l.setStyle(defStyle);
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }
        });
        ";
}

/*Subdistrict Level*/
function statSubDistrict ($id_subdistrict,$layer,$attr,$prefix,$endfix,$min,$max,$color) {
    
    echo "var $layer = new L.GeoJSON.AJAX(\"data/cluster/".substr($id_subdistrict,0,4).".geojson\",{
          filter: function (f) {
            var provno = f.properties.PROVNO;
            var kabkotno = f.properties.KABKOTNO;
            var kecno = f.properties.KECNO;
            var id_subdistrict = provno + kabkotno + kecno;
            return (id_subdistrict === '".$id_subdistrict."');
          },
            onEachFeature: function (f, l) {
                var village = f.properties.DESA;
                var id_village = f.properties.IDDESA;
                fetch('data/village/".$id_subdistrict."_village.json')
                    .then(response => response.json())
                    .then(data => {
                        var statisticData = data[id_village];
                        var popupContent = '<h3><a href=\'village.php?id_village='+id_village+'&village='+village+'&tab=overview\' target=\'_parent\'>' + toTitleCase(village) + ' Village</a></h3>';
                        popupContent += '<strong>$prefix: </strong> ' + statisticData.$attr + ' $endfix<br>';
                        l.bindPopup(popupContent);
                        var defStyle = {
                          fillColor: getColor(statisticData.$attr,$min,$max,'$color'), fillOpacity: 0.7, weight: 1, color: '#000000', opacity: 1
                        };
                        l.setStyle(defStyle);
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }
        });
        ";
}

function readGeojsonAttribute($file, $featureIndex) {
    $data = file_get_contents($file);
    $geojson = json_decode($data, true);

    if ($geojson === null) {
        throw new Exception('Failed to decode GeoJSON file.');
    }

    $attributes = array();

    if (isset($geojson['features'][$featureIndex]['properties'])) {
        $properties = $geojson['features'][$featureIndex]['properties'];
        foreach ($properties as $key => $value) {
            $attributes[] = $key;
        }
    }

    return $attributes;
}

function createWaterLayer($layername, $file, $title, $iconURL) {
    $attributes = readGeojsonAttribute($file,0);

    $javascript = "
    var $layername = new L.GeoJSON.AJAX('$file', {
        onEachFeature: function (f, l) {
            l.bindPopup('<h3>' + toTitleCase(f.properties.$title) + '</h3><BR>";

    foreach ($attributes as $attribute => $values) {
        if ($attribute !== $title) {
            $javascript .= trim(json_encode($values), "\"").": '+properties." . trim(json_encode($values), "\"") . "+'<BR>";
        }
    }

    $javascript .= "Sumber Data: <a href=\"https://sigi.pu.go.id/ast/index.php?layer=ast_bendung_fulltable\">Kementerian PUPR</a>');
    
            var layerIcon = L.icon({
                iconUrl: '$iconURL',
                iconSize: [20, 20]
            });
    
            l.setIcon(layerIcon);
        }
    });";

    echo $javascript;
}

function getClusterGroup($id_province) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT cluster_group FROM province WHERE id_province = ?");
    $stmt->bind_param("i", $id_province);
    $stmt->execute();
    $stmt->bind_result($cluster_group);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $cluster_group;
}

/*getClusterDesc*/
function getClusterDesc($group_cluster) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT id_cluster, cluster, desc1, desc2 FROM clusters WHERE group_cluster = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $group_cluster);
    $statement->execute();

    $result = $statement->get_result();
    
    $clusterData = array();
    while ($row = $result->fetch_assoc()) {
        $clusterData[] = $row;
    }
    
    // Close the statement and database connection
    $statement->close();
    $connection->close();
    
    // Return  values
    return $clusterData;
}

function getClusterById($id_cluster) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT group_cluster, cluster, desc1, desc2 FROM clusters WHERE id_cluster = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $id_cluster);
    $statement->execute();
    
    // Bind the result to variables
    $statement->bind_result($group_cluster, $cluster, $desc1, $desc2);
    
    // Fetch the result
    $statement->fetch();
    
    // Close the statement and database connection
    $statement->close();
    $connection->close();
    
    // Return the lat and lon values
    return array("group_cluster" => $group_cluster, "cluster" => $cluster, "desc1" => $desc1, "desc2" => $desc2);
}

function getExposure($id_village) {
    // Connect to the database
    $connection = connect();
    
   // Prepare and execute the SQL query
    $query = "SELECT temp18_mn, temp18_sd, tempchg1802_mn, tempchg1802_sd, tempmax5018_mn, tempmax5018_sd, tempmax10018_mn, tempmax10018_sd, pre18_mn, pre18_sd, prechg1802_mn, prechg1802_sd, pre5018_mn, pre5018_s, pre10018_mn, pre10018_sd FROM desa WHERE IDDESA = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $id_village);
    $statement->execute();
    
    // Bind the result to variables
    $statement->bind_result($temp18_mn, $temp18_sd, $tempchg1802_mn, $tempchg1802_sd, $tempmax5018_mn, $tempmax5018_sd, $tempmax10018_mn, $tempmax10018_sd, $pre18_mn, $pre18_sd, $prechg1802_mn, $prechg1802_sd, $pre5018_mn, $pre5018_s, $pre10018_mn, $pre10018_sd);
    
    // Fetch the result
    $statement->fetch();
    
    // Close the statement and database connection
    $statement->close();
    $connection->close();
    
    // Return the lat and lon values
    return array(
        "temp18_mn" => $temp18_mn,
        "temp18_sd" => $temp18_sd,
        "tempchg1802_mn" => $tempchg1802_mn,
        "tempchg1802_sd" => $tempchg1802_sd,
        "tempmax5018_mn" => $tempmax5018_mn,
        "tempmax5018_sd " => $tempmax5018_sd ,
        "tempmax10018_mn" => $tempmax10018_mn,
        "tempmax10018_sd " => $tempmax10018_sd ,
        "pre18_mn" => $pre18_mn,
        "pre18_sd" => $pre18_sd,
        "prechg1802_mn" => $prechg1802_mn,
        "prechg1802_sd" => $prechg1802_sd,
        "pre5018_mn" => $pre5018_mn,
        "pre5018_sd" => $pre5018_sd,
        "pre10018_mn" => $pre10018_mn,
        "pre10018_sd" => $pre10018_sd
        );
}

?>