$(document).ready(function() {
	
	var base = L.tileLayer('http://{s}.tile.mapbox.com/v3/ghoughton.hkk5gak5/{z}/{x}/{y}.png', {
		attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> - Imagery © <a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>',
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
	var m6Data = [];
	var m60Data = [];
	var m61Data = [];
	var m66Data = [];
	var a5036Data = [];

	var m6Avg;
	var m60Avg;
	var m61Avg;
	var m66Avg;
	var a5036Avg;

	var m6Count;
	var m60Count;
	var m61Count;
	var m66Count;
	var a5036Count;

	var totalPotholes = 0;

	var potholeHeatmapLayer = L.TileLayer.heatMap({
		radius: { value: 10, absolute: true},
		opacity: 0.7,
		visible: true,
		gradient: {
			1.0: "red"
		}
	});

	var floodingHeatmapLayer = L.TileLayer.heatMap({
		radius: { value: 10, absolute: true},
		opacity: 0.7,
		visible: true,
		gradient: {
			1.0: "blue"
		}
	});

	/*var hotspotHeatmapLayer = L.TileLayer.heatMap({
		radius: { value: 1000, absolute: true},
		opacity: 0.7,
		visible: true,
		gradient: {
			1.0: "yellow"
		}
	});*/

	var overlayMaps = {
		'Potholes': potholeHeatmapLayer,
		'Flooding': floodingHeatmapLayer//,
		//'Hotspots': hotspotHeatmapLayer
	};

	var controls = L.control.layers(null, overlayMaps, {collapsed: false});

	var map = new L.Map('map', {
		center: new L.LatLng(53.432979, -2.551270),
		zoom: 10,
		layers: [base, floodingHeatmapLayer, potholeHeatmapLayer]//, hotspotHeatmapLayer]
	});

	map.addControl(controls);

	var high = [];
	var combHighs = [];
	var markers = [];

	var cluster1 = {id:1, lat: 53.355951, lng: -2.506552, count: 0, roadNo: "m6", potholes: 0};
	var cluster2 = {id:2, lat: 53.325458, lng: -2.454882, count: 0, roadNo: "m6", potholes: 0};
	var cluster3 = {id:3, lat: 53.403660, lng: -2.246399, count: 0, roadNo: "m60", potholes: 0};
	var cluster4 = {id:4, lat: 53.438825, lng: -2.321544, count: 0, roadNo: "m60", potholes: 0};
	var cluster5 = {id:5, lat: 53.503898, lng: -2.380342, count: 0, roadNo: "m60", potholes: 0};
	var cluster6 = {id:6, lat: 53.572630, lng: -2.271380, count: 0, roadNo: "m66", potholes: 0};
	var cluster7 = {id:7, lat: 53.476486, lng: -2.980256, count: 0, roadNo: "a5036", potholes: 0};
	var cluster8 = {id:8, lat: 53.492498, lng: -2.953091, count: 0, roadNo: "a5036", potholes: 0};
	var cluster9 = {id:9, lat: 53.742014, lng: -2.650988, count: 0, roadNo: "m61", potholes: 0};

	var clusArr = [];

	clusArr.push(cluster1);
	clusArr.push(cluster2);
	clusArr.push(cluster3);
	clusArr.push(cluster4);
	clusArr.push(cluster5);
	clusArr.push(cluster6);
	clusArr.push(cluster7);
	clusArr.push(cluster8);
	clusArr.push(cluster9);

	var processData = (function() {
		console.log("processing");
		
		//var forHeatMap = [];
		for(var i = 0; i < flooding.length; i++) {
			var lat = flooding[i].lat;
			var lng = flooding[i].lon;
			var tolerance = 0.002;
			var lowerLat = parseFloat((lat - tolerance).toFixed(6));
			var upperLat = parseFloat((lat + tolerance).toFixed(6));
			var lowerLng = parseFloat((lng - tolerance).toFixed(6));
			var upperLng = parseFloat((lng + tolerance).toFixed(6));

			var neighbours = 0;
			for(var j = 0; j < flooding.length; j++) {
				var potLat = flooding[j].lat;
				var potLng = flooding[j].lon;

				if(potLat < upperLat && potLat > lowerLat) {
					if(potLng < upperLng && potLng > lowerLng) {
						neighbours++;
					}
				}
			}
			if(neighbours > 75) {
				high.push({flood: i, lat: lat, lng: lng, neighs: neighbours});
				//forHeatMap.push({lat: lat, lon: lng, value: (neighbours / 25)});
			}

			var neighbours = 0;
			for(var j = 0; j < potholes.length; j++) {
				var potLat = potholes[j].lat;
				var potLng = potholes[j].lon;

				if(potLat < upperLat && potLat > lowerLat) {
					if(potLng < upperLng && potLng > lowerLng) {
						neighbours++;
					}
				}
			}
			if(neighbours > 75) {
				high.push({flood: i, lat: lat, lng: lng, neighs: neighbours});
				//forHeatMap.push({lat: lat, lon: lng, value: (neighbours / 25)});
			}
		}//1535
		assignClusters();
		//hotspotHeatmapLayer.setData(forHeatMap);
	});

	function assignClusters() {
		for(var i = 0; i < high.length; i++) {
			var lat = high[i].lat;
			var lng = high[i].lng;
			var pots = high[i].neighs;
			var tolerance = 0.012;
			
			for(var j = 0; j < clusArr.length; j++){
				var lowerLat = parseFloat((clusArr[j].lat - tolerance).toFixed(6));
				var upperLat = parseFloat((clusArr[j].lat + tolerance).toFixed(6));
				var lowerLng = parseFloat((clusArr[j].lng - tolerance).toFixed(6));
				var upperLng = parseFloat((clusArr[j].lng + tolerance).toFixed(6));

				if(lat < upperLat && lat > lowerLat) {
					if(lng < upperLng && lng > lowerLng) {
						clusArr[j].count++;
						clusArr[j].potholes = (clusArr[j].potholes + pots);
					}
				}
			}
		}
		drawMarkers();
	}

	function drawMarkers(){ 
		var yellowMarker = L.icon({
			iconUrl: '/common/images/yellow-marker.png',
			iconSize: [32,32],
			iconAnchor: [16, 32],
			popupAnchor: [0, -33]
		});

		m6Avg = avgData(m6Data, "m6");
		m60Avg = avgData(m60Data, "m60");
		m61Avg = avgData(m61Data, "m61");
		m66Avg = avgData(m66Data, "m66");
		a5036Avg = avgData(a5036Data, "a5036");

		for(var i = 0; i < clusArr.length; i++) {
			var theMarker = L.marker([clusArr[i].lat, clusArr[i].lng], {
				icon: yellowMarker
			}).addTo(map);

			var data;
			if(clusArr[i].roadNo == "m6") {
				data = m6Avg;
			} else if(clusArr[i].roadNo == "m60") {
				data = m60Avg;
			} else if(clusArr[i].roadNo == "m61") {
				data = m61Avg;
			} else if(clusArr[i].roadNo == "m66") {
				data = m66Avg;
			} else if(clusArr[i].roadNo == "a5036") {
				data = a5036Avg;
			}

			var holder = data.split("-");
			var year = parseInt(holder[2]);
			var age = 2014 - year;
			var potholeCount = clusArr[i].potholes;

			/*if(clusArr[i].roadNo == "m6") {
				potholeCount = m6Count;
			} else if(clusArr[i].roadNo == "m60") {
				potholeCount = m60Count;
			} else if(clusArr[i].roadNo == "m61") {
				potholeCount = m61Count;
			} else if(clusArr[i].roadNo == "m66") {
				potholeCount = m66Count;
			} else if(clusArr[i].roadNo == "a5036") {
				potholeCount = a5036Count;
			}*/

			if(potholeCount > 4500) { 
				potholeCount = Math.floor(potholeCount / 15);
			} else if(potholeCount > 2500) {
				potholeCount = Math.floor(potholeCount / 10);
			}

			var toShow = "<b>Cluster #" + (i + 1) + "</b><br>" + 
						 "This cluster contains <b>" + clusArr[i].count + "</b> identified hotspots<br>" + 
						 "that may have caused potholes.<br><br>" + 
						 "<b>Road Status Details:</b><br>" + 
						 "The average age of this stretch of road is <b>" + age + " years.</b><br>" + 
						 "This cluster contains <b>" + potholeCount + "</b> potholes."; 

			theMarker.bindPopup(toShow);

			markers.push(theMarker);
		}
	}

	function avgData(arr, road) {
		var avgDay = -1;
		var avgMonth = -1;
		var avgYear = -1;

		var totalDay = 0;
		var totalMonth = 0;
		var totalYear = 0;

		var count = arr.length;

		for(var i = 0; i < arr.length; i++) {
			var parts = arr[i].LastRelayed.split("-");

			var day = parseInt(parts[0]);

			if(parts[1] == "Jan") {
				parts[1] = 1;
			} else if(parts[1] == "Feb") {
				parts[1] = 2;
			} else if(parts[1] == "Mar") {
				parts[1] = 3;
			} else if(parts[1] == "Apr") {
				parts[1] = 4;
			} else if(parts[1] == "May") {
				parts[1] = 5;
			} else if(parts[1] == "Jun") {
				parts[1] = 6;
			} else if(parts[1] == "Jul") {
				parts[1] = 7;
			} else if(parts[1] == "Aug") {
				parts[1] = 8;
			} else if(parts[1] == "Sep") {
				parts[1] = 9;
			} else if(parts[1] == "Oct") {
				parts[1] = 10;
			} else if(parts[1] == "Nov") {
				parts[1] = 11;
			} else if(parts[1] == "Dec") {
				parts[1] = 12;
			}

			var year = parseInt(parts[2]);
			if(year < 15) {
				year = 2000 + year;
				totalYear = totalYear + year;
			} else {
				year = 1900 + year;
				totalYear = totalYear + year;
			}

			totalDay = totalDay + day;
			totalMonth = totalMonth + parts[1];
		}

		avgDay = Math.floor(totalDay / count);
		avgMonth = Math.floor(totalMonth / count);
		avgYear = Math.floor(totalYear / count);

		var toReturn = avgDay + "-" + avgMonth + "-" + avgYear;
		return toReturn;
	}

	var theHTML = "&nbsp;&nbsp;&nbsp;<b>Legend:</b><br>";
	theHTML += "There are two distinct collections of data on the map.<br>";
	theHTML += "The <b>blue</b> data represents the historical <b>flooding</b> events and the <b>red</b> data represents the historical <b>potholes</b>.<br><br>";
	theHTML += "It is important to outline what the app itself is doing.  The app does two distinct processing tasks, it determines flooding hotspots";
	theHTML += "by checking if there are more than <b>75</b> potholes within a <b>200m</b> radius of a flood.<br>";
	theHTML += "Once the hotspots have been identified the app then checks for high concentrations of hotspots and groups them in clusters.  ";
	theHTML += "To constitute a cluster a hotspot must have at least <b>75</b> hotspots in a <b>1km</b> radius.";

	var myIcon = L.divIcon({ 
		iconSize: new L.Point(255, 310), 
		html: theHTML
	});

	L.marker([53.619697,-3.298888], {icon: myIcon}).addTo(map)

	getPotholes();
	console.log("done getPotholes");
	getFlooding();
	console.log("done getFlooding");
	getRoadData();
	window.setTimeout(processData, 10000);
	console.log("done");

	function getFlooding() {
		var floodingURL = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.area-10-flooding-data/data";

		var url = floodingURL/*"/data"*/;
		var arr = new Array();
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			for(var i = 0; i < resp.length; i++) {
				var lat = parseFloat(resp[i].lat);
				var lng = parseFloat(resp[i].lng);
				var val = resp[i].value;
				var date = resp[i].raisedDate;

				if(lat == undefined || lng == undefined || val == undefined){
					console.log("undefined " + i);
				}
				else {
					flooding.push({lat: lat, lon: lng, value: val});
				}
			}
			floodingHeatmapLayer.setData(flooding);
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

	function getRoadData() {
		var url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.m6-road-quality-data/data";
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			m6Data = resp;
		});

		url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.m60-road-quality-data/data";
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			m60Data = resp;
		});

		url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.m61-road-quality-data/data";
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			m61Data = resp;
		});

		url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.m66-road-quality-data/data";
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			m66Data = resp;
		});

		url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/ghoughton.a5036-road-quality-data/data";
		makeAPICall("GET", "RoadworkFlooding", "getDataResponse", {"url": url, "x-api-key": key}, function(resp){
			a5036Data = resp;
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