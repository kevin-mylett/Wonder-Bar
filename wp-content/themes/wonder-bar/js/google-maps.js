
function init_map() {
		var var_location = new google.maps.LatLng(51.224598,0.129667);
 
        var var_mapoptions = {
          center: var_location,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
          zoom: 10
        };
 
		var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title:"Wonder-Bar",
                maxWidth: 500
        });
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
    
    		var contentString = 
			'<div id="infowindow_content">'+
            '<p><strong>Wonder-Bar</strong><br>'+
            'Unit E - Winkhurst Farm Buildings<br>' +
            'Coopers Corner, Ide Hill<br>'+
            'Sevenoaks, Kent<br>'+
            'TN14 6LB</p>'
            '</div>';
    
     var var_infowindow = new google.maps.InfoWindow({
            content: contentString
          });
    
    		google.maps.event.addListener(var_marker, 'click', function() {
		var_infowindow.open(var_map,var_marker);
		  });
    
		var_marker.setMap(var_map);	
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);