function createMap(container){

	var latData = parseFloat($(container).attr('data-lat'));
	var lngData = parseFloat($(container).attr('data-lng'));

	var cords ;
	
	coords = {
		lat: latData,
		lng: lngData
	};
	
	var map = new google.maps.Map(document.getElementById("map"), {
		zoom: 16,
		center: coords,
		disableDefaultUI: true
	});

	 
	var marker = new google.maps.Marker({
		position: coords,
		map: map,
	});

}

$(document).ready(function(){
    createMap($('.mapa-container'));
});