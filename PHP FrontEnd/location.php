<?php

    $pre_cond_location = $_GET['pre_cond_location'];
    $bounce_back_url = $_GET['bounce_back_url'];
    
    
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">

//ip = "10.0.0.3";
//ip = "128.61.117.131";
//ip = "128.61.120.62";
ip = "192.168.1.37";

<?php
    
    ?>


function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
    var R = 6371000; // Radius of the earth in m
    var dLat = deg2rad(lat2-lat1);  // deg2rad below
    var dLon = deg2rad(lon2-lon1);
    var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c; // Distance in km
    return d;
}

function deg2rad(deg) {
    return deg * (Math.PI/180)
}

function onPositionUpdate(position)
{
    
    var locationDict = {};
    locationDict["home"] = [33.78993767316806, -84.40232517205588];
    locationDict["klaus"] = [33.777019815443666, -84.395708077745];
    locationDict["student center"] = [33.774760024794205, -84.39822595329571];
    locationDict["coc"] = [33.77711075959649, -84.39740382745507];
    locationDict["crc"] = [33.777420124145195, -84.40475668529567];
    locationDict["howey"] = [33.777019815443666, -84.395708077745];
    locationDict["van leer"] = [33.777019815443666, -84.395708077745];
    
    
    //document.write (locationDict["home"]);
    //var defLat = 33.789820277867065;
    //var defLng = -84.40245833391934;
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    
    var distance = getDistanceFromLatLonInKm(locationDict["<?php echo $pre_cond_location; ?>"][0],locationDict["<?php echo $pre_cond_location; ?>"][1], lat, lng);
    
    var accuracy = position.coords.accuracy;
    
    
    
    
    if (distance<2000.0){
        top.location.href="<?php echo $bounce_back_url; ?>";
    }
    else{
        document.write('No, current position: ' + lat + ' ' + lng + ' ' + distance + ' ' + accuracy + '<br>');
    }
    
    //document.write('Current position: ' + lat + ' ' + lng + ' ' + distance + ' ' + accuracy);
    
    
    navigator.geolocation.getCurrentPosition(onPositionUpdate);
    //return distance;
    
    //ip = "192.168.3.7";
    //url = "http://" + ip + ":8080/topics/" + lat + "/" + lng;
    //document.write(url);
    //top.location.href=url;
    
    
}

if(navigator.geolocation){
document.write ('<font size="24">'+'Tracking... Go to location: '+'<br><br>'+'<?php echo $pre_cond_location; ?>'+'</font>');
navigator.geolocation.getCurrentPosition(onPositionUpdate);
}
//document.write(dis);
else
document.write ("failed");

</script>
