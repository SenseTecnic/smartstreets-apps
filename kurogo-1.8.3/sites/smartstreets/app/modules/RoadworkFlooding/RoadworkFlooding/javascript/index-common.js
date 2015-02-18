$(document).ready(function() {
	
	var base = L.tileLayer('http://{s}.tile.cloudmade.com/d33d78dd8edd4f61a812a0d56b062f56/998/256/{z}/{x}/{y}.png', {
		attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> - Directions Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png"> - Contributors <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> - Imagery © <a href="http://cloudmade.com">CloudMade</a>',
		maxZoom: 18,
	});

	$(function() {
		$("#datepicker").datepicker();
	});

	//var controls = L.control.layers(null, overlayMaps, {collapsed: false});
	// My Key = 1a04ce53-f27c-4ea6-a940-084fdc3c6d60
	// Andy's Key = 5b81d068-b0b3-4b61-bab3-aa6808abeeed
	var key = "1a04ce53-f27c-4ea6-a940-084fdc3c6d60";

	var potholes = [];
	var flooding = [];

	var potholeHeatmapLayer = L.TileLayer.heatMap({
		radius: { value: 50, absolute: true},
		opacity: 0.7,
		visible: true,
		gradient: {
			/*0.25: "rgb(255,255,255)",
			0.45: "rgb(233,150,122)",
			0.65: "rgb(250,128,114)",
			0.85: "rgb(255,140,0)",
			1.0: "rgb(255,99,71)"*/
			/*0.45: "rgb(0,0,255)",
			0.55: "rgb(0,255,255)",
			0.65: "rgb(0,255,0)",
			0.95: "yellow",
			1.0: "rgb(255,0,0)"*/
			1.0: "red"
		}
	});

	var floodingHeatmapLayer = L.TileLayer.heatMap({
		radius: { value: 50, absolute: true},
		opacity: 0.7,
		visible: true,
		gradient: {
			/*0.25: "rgb(255,255,255)",
			0.45: "rgb(233,150,122)",
			0.65: "rgb(250,128,114)",
			0.85: "rgb(255,140,0)",
			1.0: "rgb(255,99,71)"*/
			/*0.45: "rgb(0,0,255)",
			0.55: "rgb(0,255,255)",
			0.65: "rgb(0,255,0)",
			0.95: "yellow",
			1.0: "rgb(255,0,0)"*/
			1.0: "blue"
		}
	});

	var map = L.map('map', {
		center: new L.LatLng(53.447117,-2.639465),
		zoom: 10,
		layers: [base, potholeHeatmapLayer, floodingHeatmapLayer]
	});

	var overlayMaps = {
		'Potholes': potholeHeatmapLayer,
		'Flooding': floodingHeatmapLayer
	};

	var controls = L.control.layers(null, overlayMaps, {collapsed: false});

	map.addControl(controls);

	var processData = (function() {
		console.log("here");
		for(var i = 0; i < potholes.size; i++) {
			var lat = potholes[i].lat;
			var lng = potholes[i].lon;
			var lowerLat = lat - 0.001;
			var upperLat = lat + 0.001;
			var lowerLng = lng - 0.001;
			var upperLng = lng + 0.001;

			console.log(lowerLat + " " + upperLat);
			console.log(lowerLng + " " + upperLng);
		}
	});

	getPotholes();
	console.log("done getPotholes");
	getFlooding();
	console.log("done getFlooding");
	processData();
	//potholeHeatmapLayer.setData(potholes);

	function getFlooding() {
		var floodingURL = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.area-10-flooding-data/data";

		var url = floodingURL/*"/data"*/;
		var arr = new Array();
		var lowestYear = 2012;
		var lowestMonth = 12;
		var lowestDay = 30;
		var highestYear = 0;
		var highestMonth = 1;
		var highestDay = 1;
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			for(var i = 0; i < resp.length; i++) {
				var lat = parseFloat(resp[i].lat);
				var lng = parseFloat(resp[i].lng);
				var val = resp[i].value;
				var date = resp[i].raisedDate;
				var dateParts = date.split("-");

				var month = dateParts[1];

				if(month == "Jan"){
					dateParts[1] = 1;
				}
				else if(month == "Feb"){
					dateParts[1] = 2;
				}
				else if(month == "Mar"){
					dateParts[1] = 3;
				}
				else if(month == "Apr"){
					dateParts[1] = 4;
				}
				else if(month == "May"){
					dateParts[1] = 5;
				}
				else if(month == "Jun"){
					dateParts[1] = 6;
				}
				else if(month == "Jul"){
					dateParts[1] = 7;
				}
				else if(month == "Aug"){
					dateParts[1] = 8;
				}
				else if(month == "Sep"){
					dateParts[1] = 9;
				}
				else if(month == "Oct"){
					dateParts[1] = 10;
				}
				else if(month == "Nov"){
					dateParts[1] = 11;
				}
				else if(month == "Dec"){
					dateParts[1] = 12;
				}

				if(lat == undefined || lng == undefined || val == undefined){
					console.log("undefined " + i);
				}
				else {
					flooding.push({lat: lat, lon: lng, value: val});
				}

				if(dateParts[2] < lowestYear){
					if(dateParts[1] < lowestMonth){
						if(dateParts[0] < lowestDay){
							lowestDay = dateParts[0];
							lowestMonth = dateParts[1];
							lowestYear = dateParts[2];
						}
					}
				}

				if(dateParts[2] > highestYear){
					if(dateParts[1] > highestMonth){
						if(dateParts[0] > highestDay){
							highestDay = dateParts[0];
							highestMonth = dateParts[1];
							highestYear = dateParts[2];
						}
					}
				}
			}
			floodingHeatmapLayer.setData(flooding);

			console.log(lowestDay + "-" + lowestMonth + "-" + lowestYear);
			console.log(highestDay + "-" + highestMonth + "-" + highestYear);
		});
	}

	function getPotholes() {
		var potholesURL = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.area-10-pothole-data/data";

		var url = potholesURL/*"/data"*/;
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			for(var i = 0; i < resp.length; i++) {
				var lat = parseFloat(resp[i].lat);
				var lng = parseFloat(resp[i].lng);
				var val = resp[i].value;

				if(lat == undefined || lng == undefined || val == undefined){
					console.log("undefined " + i);
				}
				else {
					potholes.push({lat: lat, lon: lng, value: val});
				}
			}
			potholeHeatmapLayer.setData(potholes);
		});
	}

	$('#filterButton').click(function(e) {
		var date = document.getElementById("datepicker").value;
		if(date != "") {
			var dateParts = date.split("/");

			var day = dateParts[1];
			var month = dateParts[0];
			var year = dateParts[2];

			console.log(day);
			console.log(month);
			console.log(year);
		}
	});
});