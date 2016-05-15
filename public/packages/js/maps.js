(function(window,google){
	var options = {
		zoom: 10,
		center: {
			lat:-34.397,
			lng:150.644
		}
	},
	map = new google.maps.Map(document.getElementById('map-canvas'),options);
})(window,google);