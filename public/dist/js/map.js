(function($) {
var locations = [
    ['OUR INFORMATIONS', 21.2064417,72.8371007, 2]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
        styles: [ { "stylers": [ { "hue": "#000" },  {saturation: -100},
            {gamma: 1.6} ] } ],
        center: new google.maps.LatLng(21.2064417,72.8371007),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

        marker = new google.maps.Marker({ 
        position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
        map: map ,
        icon: 'images/marker.png'
        });


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.close(map, marker);
        }
    })(marker, i));
}
})(jQuery);