<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations=[];
   <?php
        include_once "Database.php";
			  $sec=new Database();
        $result=$sec->GetData("select * from advertising where adsno=1");
        $x=0;
      
			while($row=mysqli_fetch_assoc($result))
			{
        $x++;
         
    ?>
     var ll=["<?php echo($row['Title']); ?>",<?php echo($row['latitude']);?>,<?php echo($row['longitude']); ?>,<?php echo($row['AdsNo']); ?>]; 

     locations.push(ll);
     echo($row['Title']); 
<?php }?>
   
    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(30.0720601, 31.022073),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>