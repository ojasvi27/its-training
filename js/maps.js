
		

// When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        var its_centers = [
  ['Gurgaon', 28.466039,77.0604, 4],
  ['Noida', 28.5700, 77.3200, 5],
  ['Delhi ', 28.6100, 77.2300, 3],
  ['Mumbai', 18.9750, 72.8258, 2],
  ['Kolkatta ', 22.5667, 88.3667, 1],
  ['Chennai', 13.0839, 80.2700, 4],
  ['Pune', 18.5203, 73.8567, 5],
  ['Hyderabad ', 17.3660, 78.4760, 3],
  ['Mohali', 30.679946800000000000, 76.722108199999980000, 2],
  ['Banglore', 12.9667, 77.5667, 1]

];

var map;
		
		var markers=[];
		
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng( 28.4700, 77.0300), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    //styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');
				 map = new google.maps.Map(mapElement, mapOptions);
 setMarkers(map, its_centers);

				}
			
			function setMarkers(map, locations) {
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = {
    url: 'images/maplogo.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(35, 50),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon.
  // The type defines an HTML &lt;area&gt; element 'poly' which
  // traces out a polygon as a series of X,Y points. The final
  // coordinate closes the poly by connecting to the first
  // coordinate.
  var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
 var infowindow = new google.maps.InfoWindow();
  for (var i = 0; i < locations.length; i++) {
    var beach = locations[i];
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
    });
	markers.push(marker);
	
	
	
  google.maps.event.addListener(markers[i], 'click', function() {
  var content="";
//	content+='<div class="panel panel-default">';
  //content+='<div class="panel-heading">';
   content+=' <h3 class="panel-title"><img width="120" src="images/logo_new.jpg"/></h3>';
 // content+='</div>';
   content+=' <i class="fa fa-email"></i>	<strong>solution@itstraining.in</strong>';
  content+='<div class="panel-body"><h3> '+this.title+' Center  <h3></div>';
   content+='<i class="fa fa-mobile"></i> +91-9958100619 ';
  content+=' <i class="fa fa-phone"></i>+91-124-4253759';

//content+='</div>';
	
  
  
            infowindow.setContent(content);
            infowindow.open(map, this);
			
        });
		if(i==0){
	//$("#tlist").append('<span id="listitem_'+i+'" class="list-group-item active " onclick="open_some('+i+')">'+markers[i].title+'</span>');
google.maps.event.trigger(markers[i],'click',{});
	}
		else{
	//$("#tlist").append('<span id="listitem_'+i+'" class="list-group-item " onclick="open_some('+i+')">'+markers[i].title+'</span>');

		}
  }
  
  
}



function open_some(obj){
$(".list-group-item").removeClass('active');

$("#listitem_"+obj).addClass('active');

map.panTo(markers[obj].position);
google.maps.event.trigger(markers[obj],'click',{});
markers[obj].setAnimation(google.maps.Animation.BOUNCE)
}


