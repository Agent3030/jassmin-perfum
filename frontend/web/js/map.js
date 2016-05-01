;(function(exports){	
	function GoogleMaps(container, config) {
		this.container = container;
		this.config = {};
		this.config.center = config.center;
		this.config.zoom = config.zoom;
		this.config.disableDefaultUI = config.disableDefaultUI;
		this.config.scrollwheel= config.scrollwheel;
		this.config.zoomControl= config.zoomControl;
		this.config.scaleControl = config.scaleControl;
		this.config.streetViewControl = config.streetViewControl;
		this.config.rotateControl = config.rotateControl;
		
	}	
	

	GoogleMaps.prototype.getMap = function() {
		this.map = new google.maps.Map(document.getElementById(this.container), this.config);
		
	};

	GoogleMaps.prototype.setMarker = function(config) {
		this.marker = new google.maps.Marker({
			position: config.latlng,
			map: this.map,
			title: config.title
		});


	};



	exports.GoogleMaps = GoogleMaps;


})(this.maps = {});

