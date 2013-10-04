$(document).ready(function() {

	$( "#radiusSlider" ).slider({
      range: "min",
      value: 500,
      min: 1,
      max: 10000,
      slide: function( event, ui ) {
        $( "#radius" ).text(  ui.value +"m");

        //TODO: update graph if a roadwork is selected
      }
    });

	//map creation on default (Gully Overview)
	var map = new L.Map("map", {
	    center: [54.56011889582139, -1.023101806640625],
      	zoom: 11,
      	minZoom: 5,
      	maxZoom:19
	}).addLayer(new L.TileLayer("http://{s}.tile.cloudmade.com/d33d78dd8edd4f61a812a0d56b062f56/998/256/{z}/{x}/{y}.png"));
	var svg = d3.select(map.getPanes().overlayPane).append("svg"),
	    g = svg.append("g").attr("class", "leaflet-zoom-hide");

	//Draw with D3
	d3.json("media/maps/subunits.json", function(error, collection) {
	 	var bounds = d3.geo.bounds(collection),
	    path = d3.geo.path().projection(project);

	  	var feature = g.selectAll("path")
	      	.data(collection.features)
	    	.enter().append("path")
	    	.attr("class", "uk_boundary");	
	  	var div= d3.select(".tooltip").style("opacity", 0);  

	  	initialize();
	  	map.on("viewreset", reset);
	  	reset();
	  	
	  	$(".reset").click(function(){
	  		clear_map();

	  		var mode= $("#dropdown_select").val();

	  		console.log("mode:"+mode);
	  		switch (mode){
	  			case "gully_overview":
	  				get_gully_overview();
	  				break;
	  			case "gully_roadwork":
	  				$("#top-right-box").html("");
	  				get_gully_roadwork();
	  				break;
	  			case "flow_time":
	  				get_flow_time();
	  				break;
	  			case "flow_roadwork":
	  				get_flow_roadwork();
	  				break;
	  		}
	  	});
	  	$("#dropdown_select").change(function(){
			var mode= $(this).val();
			//clear map and filters
			clear_map();
			clear_graph();
			$("#dropdown_filters").html("");
			$(".description").hide();
			$("#slider-box").hide();
			// Create filter options, plot data on map, draw graphs
			switch (mode){
	  			case "gully_overview":
	  				$("#gully_overview_desc").show();
	  				get_gully_overview();
	  				break;
	  			case "gully_roadwork":
	  				$("#gully_roadwork_desc").show();
	  				$("#slider-box").show();
	  				get_gully_roadwork();
	  				break;
	  			case "flow_time":
	  				$("#flow_time_desc").show();
	  				get_flow_time();
	  				break;
	  			case "flow_roadwork":
	  				$("#flow_roadwork_desc").show();
	  				get_flow_roadwork();
	  				break;
	  		}
		});

		function initialize(){
	  		$(".description").hide();
	  		$("#gully_overview_desc").show();
	  		get_gully_overview();
	  	}
		
		function clear_graph(){
			$("#bottom-box").html("");
			$("#top-right-box").html("");
		}

		function clear_map(){
			g.selectAll(".gully-map-points").data([]).exit().remove();
			g.selectAll(".boundary").data([]).exit().remove();
			g.selectAll(".redcar_roadwork_points").data([]).exit().remove();
			g.selectAll(".region_points").data([]).exit().remove();
			g.selectAll(".data_points").data([]).exit().remove();
			g.selectAll(".roadwork_points").data([]).exit().remove();

		}

		function get_gully_roadwork(){
			map.setView(new L.LatLng(54.56011889582139, -1.023101806640625), 11);
			plot_gullies();
				
		}

		function get_gully_overview(){
			map.setView(new L.LatLng(54.56011889582139, -1.023101806640625), 11);
			map_gullies(null);
		}
		function get_flow_time(){
			map.setView(new L.LatLng(52.7, -2), 7);
			plot_regions();
		}

		function get_flow_roadwork(){
			map.setView(new L.LatLng(52.7, -2), 6);
			plot_flow_roadwork();
		}

		function map_gullies(query){
	  		var collection= "gully";
	  		var oldQuery;
	  		makeAPICall('POST', "TrafficExplorer" , "queryMongoBySingleKey", {collection: "gully", query: query}, function(response){
	  			var json= JSON.parse(response);
            	var itemArray=new Array();
            	$.each(json["results"], function (i, ob) {
            		itemArray.push(json["results"][i]);
				});
				oldQuery=json["query"];
				//plot map pins
				g.selectAll(".gully-map-points")
					.data(itemArray)
					.enter()
					.append("circle")
					.attr("class", "gully-dot gully-map-points")
					.attr("cx", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
		            })
		            .attr("cy", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];	                
		            })
		            .attr("r", function(d) {
		            	if (d.silt!=null)
		            		level= parseInt(d["silt"].replace("%",""), 10);		            	
		               	return 2*(1+level/25);
		        	})
		        	.on('mouseover',function(){

		        	});

		        	//cross filter the data by silt levels
				    var gullyFilter= crossfilter(itemArray);
				    var dataBySiltLevel = gullyFilter.dimension(function(d) {return d["silt"]}); 
				    
				    var values=new Array();
				    var levels= ["0%", "25%", "50%", "75%","100%"];
				    for (var i in levels){
				        dataBySiltLevel.filter(levels[i]);
				        var count = gullyFilter.groupAll().reduceCount().value();
				   		var value={};
				        value["label"]= levels[i];
				    	value["value"]= count;
				    	values.push(value);
				    }

				 	siltLevelBarData = [ 
						{
						    key: "Silt Level",
						    values: values
						}
					];

					//graph a bar chart
			       	$("#bottom-box").append("<svg id="+"'gully_silt_chart'"+"></svg>");
		        	nv.addGraph(function() {  
					  	var chart = nv.models.discreteBarChart()
						    .x(function(d) { return d.label })
							.y(function(d) { return d.value })
							.staggerLabels(false)
							.tooltips(false)
							.showValues(true)
							.transitionDuration(250);
						chart.yAxis.axisLabel("Number of Gullies");
						chart.xAxis.axisLabel("Silt Levels (in %)");


						d3.select('#gully_silt_chart')
							.datum(siltLevelBarData)
							.call(chart);
						d3.select('#gully_silt_chart')
						  .append("text")
						  .attr("x", 150)             
						  .attr("y", 0)
						  .attr("class", "graph-title")
						  .attr("text-anchor", "middle")  
						  .text("Gully Silt Levels");
						nv.utils.windowResize(chart.update);
						return chart;
					},function(){
				        d3.selectAll(".nv-bar").on('click',
				            function(e){
				                //clear all 
				               	g.selectAll(".gully-map-points").data([]).exit().remove();
				                //remap gullies
				                var query = {"silt": e.label};
				                if (oldQuery!="null"&&oldQuery!=query){
				                	query = {"$and" : [query, oldQuery]};
				                }
	  							var stringQuery = encodeURIComponent(JSON.stringify( query ));
	  							
	  							map_gullies(stringQuery);
				        });
				    });

					//////state chart
					var stateFilter= crossfilter(itemArray);
					var state_values=new Array();
					var dataByState = stateFilter.dimension(function(d) {return d["state"]}); 

				    var states= ["Clean & Running", "Obstructed", "Blocked & Cleaned", "Cleaned & Not Running", "No Info"];
				    for (var i in states){
				        dataByState.filter(null).filter(states[i]);
				        var count = stateFilter.groupAll().reduceCount().value();
				   		var value={};
				        value["key"]= states[i];
				    	value["y"]= count;
				    	console.log("count: "+count);
				    	state_values.push(value);
				    }

				 	stateData = [ 
						{
						    key: "Gully States",
						    values: state_values
						}
					];
					//graph a bar chart for states
        			var myColors = ["#336699", "crimson", "salmon", "#99ffff", "#cccccc"];
			       	$("#bottom-box").append("<svg id="+"'gully_state_chart'"+" class='gully_overview_chart'></svg>");
					nv.addGraph(function() {
					    var chart = nv.models.pieChart()
					        .x(function(d) { return d.key })
					        .y(function(d) { return d.y })
					        .color(myColors);

					    chart.pie.pieLabelsOutside(false).labelType("percent");
					    d3.select("#gully_state_chart")
					        .datum(state_values)
					        .transition().duration(500)
					          .call(chart);
					    d3.select('#gully_state_chart')
							.append("text")
						    .attr("x", 150)             
					  	  	.attr("y", 0)
							.attr("class", "graph-title")
							.attr("text-anchor", "middle")  
							.text("Gully States");
						//move legend
						// d3.select(".nv-legendWrap")
						// 	.attr("class", "legend-text");


					    return chart;
					},function(){
				        d3.selectAll("#gully_state_chart .nv-slice").on('click',
				            function(e){
				                //clear all 
				               	g.selectAll(".gully-map-points").data([]).exit().remove();
				                //remap gullies
				                var query = {"state": e.data.key};
				                if (oldQuery!="null"&&oldQuery!=query){
				                	query = {"$and" : [query, oldQuery]};

				                }
	  							var stringQuery = encodeURIComponent(JSON.stringify( query ));
	  							console.log("string: "+stringQuery);
	  							map_gullies(stringQuery);
				        });
				    });

					//////type chart
					var typeFilter= crossfilter(itemArray);
					var type_values=new Array();
					var dataByType = typeFilter.dimension(function(d) {return d["type"]}); 
				    var types= ["Top Entry", "Side Entry", "Box", "Rod and Eye"];
				    for (var i in types){
				        dataByType.filter(null).filter(types[i]);
				        var count = typeFilter.groupAll().reduceCount().value();
				   		var value={};
				        value["key"]= types[i];
				    	value["y"]= count;
				    	console.log("count: "+count);
				    	type_values.push(value);
				    }

				 	typeData = [ 
						{
						    key: "Gully Type",
						    values: type_values
						}
					];
					//graph a bar chart for states
        			var myColors2 = ["#336699", "crimson", "salmon", "#99ffff"];
			       	$("#top-right-box").append("<svg id="+"'gully_type_chart'"+"'></svg>");
					nv.addGraph(function() {
					    var chart = nv.models.pieChart()
					        .x(function(d) { return d.key })
					        .y(function(d) { return d.y })
							// .margin ({top: 20, right: 20, bottom: 20, left: 20})
						    .color(myColors2);

					      chart.pie.pieLabelsOutside(false).labelType("percent");
					      d3.select("#gully_type_chart")
					          .datum(type_values)
					        .transition().duration(500)
					          .call(chart);
					      d3.select('#gully_type_chart')
						  	.append("text")
						    .attr("x", 170)             
					  	  	.attr("y", 0)
							.attr("class", "graph-title")
							.attr("text-anchor", "middle")  
							.text("Gully Types");
						//move legend
						// d3.select(".nv-legendWrap")
						// 	.attr("class", "legend-text");
  							// .attr("transform", "translate(-10,-20)");

					    return chart;
					},function(){
				        d3.selectAll("#gully_type_chart .nv-slice").on('click',
				            function(e){
				                //clear all 
				                g.selectAll(".gully-map-points").data([]).exit().remove();
				                 var query = {"type": e.data.key};
				                if (oldQuery!="null"&&oldQuery!=query){
				                	query = {"$and" : [query, oldQuery]};
				                }
				                //remap gullies
	  							var stringQuery = encodeURIComponent(JSON.stringify( query ));
	  							console.log("string q: "+stringQuery);
	  							map_gullies(stringQuery);
				        });
				    });
	  		});
	  	}

	  	function plot_redcar_roadworks(query){
	  		$("#top-right-box").html("");
	  		$("#top-right-box").append( "<div style='margin: 0 auto; display:table; margin-top:40%;'><strong>Select a roadwork on map to view chart.</strong><div>" );
	  		//make api calls to plot gullies
	  		makeAPICall('POST', "TrafficExplorer" , "getEntireMongoCollection", {collection: "redcarRoadwork"}, function(response){
	  			var json= JSON.parse(response);
            	var itemArray=new Array();
            	$.each(json, function (i, ob) {
            		itemArray.push(json[i]);
				});
				//plot with d3
				g.selectAll(".redcar_roadwork_points")
					.data(itemArray)
					.enter()
					.append("path")
					.attr("class", "redcar_roadwork_points")
			      	.attr('d', function(d) { 
			        	var x = project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0]; 
			        	y = project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
			        	return 'M ' + x +' '+ y + ' l 10 10 l -20 0 z';
			      	})
		        	.attr("stroke", "white")
		        	.attr("fill", function(d){
		        		var latest_record_index= d["records"].length-1;
		        		if (d["records"][latest_record_index]["jobstatus"]=="In Progress"){
		        			return "#FFCC00";
		        		}
		        		else if (d["records"][latest_record_index]["jobstatus"]=="Completed"){
		        			return "#E68A00";
		        		}else if (d["records"][latest_record_index]["jobstatus"]=="Paused"){
		        			return "#CC3300";
		        		}else if (d["records"][latest_record_index]["jobstatus"]=="Scheduled -Active"){
		        			return "#6699FF";
		        		}
		        		else{
		        			if (d["records"][latest_record_index]["jobstatus"]=="Scheduled -Pending")
		        			return "#a3a3a3";
		        		}
		        	})
		        	.attr("opacity", function(d){
		        		var latest_record_index= d["records"].length-1;
		        		if (query != null){
		        			if (d["records"][latest_record_index]["jobstatus"]==query){
			        			return 1;
			        		}else{
			        			return 0;
			        		}
		        		}
		        	})
		        	.on("click", function(d, i){
		        		$("#top-right-box").html("");
		        		var latest_record_index= d["records"].length-1;

		        		var geo = d["geo"];
		        		var radius=$( "#radiusSlider" ).slider("option", "value");
		        		var lat = d["geo"]["coordinates"][1];
		        		var lng= d["geo"]["coordinates"][0];
		        		var query = {"$near": {$geometry: geo, $maxDistance: radius}};
					  	var stringQuery = JSON.stringify( query );
		        		//graph silt levels of gullies within 500m radius
		        		//search mongo for gullies within 500 radius
		        		makeAPICall('POST', "TrafficExplorer" , "mongoGeoRadiusSearch", {collection: "gully", lat: lat, lng: lng, radius: radius}, function(response){
		        			
		        			//cross filter the data
		        			//filter 
		        			var flatArray= new Array();
		        			response= JSON.parse(response);
		        			jQuery.each(response, function (key, value) {
			            		flatArray.push(response[key]);
							});

				        	var siltFilter= crossfilter(flatArray);
				        	var dataBySiltLevel = siltFilter.dimension(function(d) {console.log ("silt: "+d["silt"]); return d["silt"]}); 
				        	var values=new Array();
				        	var levels= ["0%", "25%", "50%", "100%"];
				        	for (var i in levels){
				        		dataBySiltLevel.filter(levels[i]);
				        		var count = siltFilter.groupAll().reduceCount().value();
				        		var value={};
				        		value["label"]= levels[i];
				        		value["value"]= count;
				        		values.push(value);
				        	}
							  //data:
							  historicalBarChart = [ 
								  {
								    key: "Silt Level",
								    values: values
								  }
								];
							//graph a bar chart
							var chart;
					       	$("#top-right-box").append("<svg id="+"'gully_roadwork_chart'"+" class='chart'></svg>");
		        			nv.addGraph(function() {  

							  	var chart = nv.models.discreteBarChart()
							      .x(function(d) { return d.label })
							      .y(function(d) { return d.value })
							      .tooltips(false)
							      .showValues(true)
							      .transitionDuration(250)
							      ;

							  	d3.select('#gully_roadwork_chart')
							      .datum(historicalBarChart)
							      .call(chart);
							  	nv.utils.windowResize(chart.update);
							  	return chart;
							});
		        		});
		        	});
					//graph overall roadwork distribution!!!
					//cross filter the data by silt levels
				    var roadworkFilter= crossfilter(itemArray);
				    var dataByJobStatus = roadworkFilter.dimension(function(d) {
				    	var latest_record_index= d["records"].length-1;
				    	return d["records"][latest_record_index]["jobstatus"];
				    }); 
				    
				    var values=new Array();
				    var statuses= ["In Progress", "Completed", "Paused", "Scheduled -Active","Scheduled -Pending"];
				    for (var i in statuses){
				        dataByJobStatus.filter(statuses[i]);
				        var count = roadworkFilter.groupAll().reduceCount().value();
				   		var value={};
				        value["label"]= statuses[i];
				    	value["value"]= count;
				    	values.push(value);
				    }

				 	barChartData = [ 
						{
						    key: "Roadwork Statuses",
						    values: values
						}
					];

					//graph a bar chart
					var myColors = ["#FFCC00", "#E68A00", "#CC3300", "#6699FF", "#cccccc"];
			       	$("#bottom-box").append("<svg id="+"'gully_roadwork_status_chart'"+" class='chart'></svg>");
		        	nv.addGraph(function() {  
					  	var chart = nv.models.discreteBarChart()
						    .x(function(d) { return d.label })
							.y(function(d) { return d.value })
							.staggerLabels(false)
							.tooltips(false)
							.color(myColors)
							.showValues(true)
							.transitionDuration(250);
						chart.yAxis.axisLabel("# of Roadworks");
						chart.xAxis.axisLabel("Roadwork Status");


						d3.select('#gully_roadwork_status_chart')
							.datum(barChartData)
							.call(chart);
						d3.select('#gully_roadwork_status_chart')
						  .append("text")
						  .attr("x", 150)             
						  .attr("y", 0)
						  .attr("text-anchor", "middle")  
						  .text("Roadwork Statuses");
						nv.utils.windowResize(chart.update);
						return chart;
					},function(){
				        d3.selectAll(".nv-bar").on('click',
				            function(e){
				                //clear all 
				               	g.selectAll(".redcar_roadwork_points").data([]).exit().remove();
				                //remap roadworks
	  							plot_redcar_roadworks(e.label);
				        });
				    });

	  		});
	  	}

	  	function plot_gullies(){
	  		//make api calls to plot gullies

	  		var collection= "gully";

	  		makeAPICall('POST', "TrafficExplorer" , "getEntireMongoCollection", {collection: "gully"}, function(response){
	  			var json= JSON.parse(response);
            	var itemArray=new Array();
            	$.each(json, function (i, ob) {
            		itemArray.push(json[i]);
				});
				//plot with d3
				g.selectAll(".gully-map-points")
					.data(itemArray)
					.enter()
					.append("circle")
					.attr("class", "gully-dot gully-map-points")
					.attr("cx", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
		            })
		            .attr("cy", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];	                
		            })
		            .attr("r", function(d) {
		            	if (d.silt!=null)
		            		level= parseInt(d["silt"].replace("%",""), 10);
		            	if (level==0)
		                	r=0;
		                else if (level < 30)
		                	r=1;
		                else if (level<=50)
		                	r=3;
		                else if (level <=75)
		                	r=5;
		                else 
		                	r=7;
		               	return r;
		        	})
		        	.on("click", function(d, i){
		        		console.log ("silt level: "+d["silt"]);
		        	});

		        //map redcar roadworks
		        plot_redcar_roadworks(null);
	  		});
	  	}

	  	function plot_flow_roadwork(){
	  		var query= { rw_starttime: { $exists: true } } ;
	  		var stringQuery= encodeURIComponent(JSON.stringify( query ));
	  		makeAPICall('POST', "TrafficExplorer" , "queryMongoBySingleKey", {collection: "correlation", query: stringQuery}, function(response){
            	//parse results here and draw plots
            	var json= JSON.parse(response);
            	var itemArray=new Array();
            	var roadwork_array=new Array(); // this array contains unique roadwork ids
            	var color_array=new Array(); // this array contains unique color
            	$.each(json["results"], function (i, ob) {
            		//populate json item array
            		json["results"][i]["tf_recordedtime"]= json["results"][i]["tf_recordedtime"]["sec"];
            		itemArray.push(json["results"][i]);
            		if ($.inArray(json["results"][i]["rw_id"], roadwork_array)==-1){
            			var item={};
            			color_array.push(getRandomColor());
            			roadwork_array.push(json["results"][i]["rw_id"]);
            			console.log("rodwork uniqque id :"+ json["results"][i]["rw_id"]);
            		}
				});

				console.log("response: "+ response);
				//plot with d3
		        g.selectAll(".roadwork_points")
		                .data(itemArray)
		                .enter()
		                .append("circle")
		                .attr("class", "roadwork_points")
		                .attr("cx", function(d) {
		                    return project([d["rw_geo"]["coordinates"][0], d["rw_geo"]["coordinates"][1]])[0];
		                })
		                .attr("cy", function(d) {
		                    return project([d["rw_geo"]["coordinates"][0], d["rw_geo"]["coordinates"][1]])[1];	                
		                })
		                .attr("r", function(d) {
		                	r=10;
		                	return r;
		        		})
		        		.attr("fill", function(d){
		        			var id= d["rw_id"];
		        			return color_array[$.inArray(id,roadwork_array)];
		        		})
		        		.on('mouseover', function(d, i){
		                    //display region name and stats
		                })
		                .on('click', function(d, i){
		                	$("#top-right-box").html("");
		                	// $("#top-right-box").addClass("flow_roadwork_text");
		                	// display roadwork details on overview plot
		                	var htmlToInsert =[];
		                	htmlToInsert[i++]= "<div class='flow_roadwork_text'> ";
		                	var color= color_array[$.inArray(d["rw_id"],roadwork_array)];
		                	htmlToInsert[i++]= "<div> ";
		                	htmlToInsert[i++]= "<div><svg width='15' height='15' >  <circle cx='6' cy='9' r='5' fill='"+ color+"'/> ";
		                	htmlToInsert[i++]= d["region"];
		                	htmlToInsert[i++]= " </svg>";

		                	htmlToInsert[i++]= "<b>Roadwork ID: </b> ";
		                	htmlToInsert[i++]= d["rw_id"];
		                	htmlToInsert[i++]= " </div><br>";
					 
		                	htmlToInsert[i++]= "<div><b> Region:</b> ";
		                	htmlToInsert[i++]= d["region"];
		                	htmlToInsert[i++]= " </div>";

		                	
		                	var time = new Date(d["rw_starttime"]["sec"]*1000);
		                	htmlToInsert[i++]= "<div> <b>Start Time: </b>";
		                	htmlToInsert[i++]= time;
		                	htmlToInsert[i++]= " </div>";
		                	time = new Date(d["rw_endtime"]["sec"]*1000);
		                	htmlToInsert[i++]= "<div> <b>End Time: </b>";
		                	htmlToInsert[i++]= time;
		                	htmlToInsert[i++]= " </div>";

		                	htmlToInsert[i++]= "<div> <b>Expected Roadwork Impact: </b>";
		                	htmlToInsert[i++]= d["rw_impact"];
		                	htmlToInsert[i++]= " </div>";

		                	htmlToInsert[i++]= "<div> <b>Comment: </b>";
		                	htmlToInsert[i++]= d["rw_comment"];
		                	htmlToInsert[i++]= " </div>";
		                	htmlToInsert[i++]= " </div>";

		                	$("#top-right-box").append(htmlToInsert.join(''));
		                });
						
						//PREP DATA
						var data=new Array();
					    var roadworks= roadwork_array;
						for (var i in roadwork_array){
							var roadworkFilter= crossfilter(itemArray);
							var dataByRid = roadworkFilter.dimension(function(d) {return d["rw_id"];});
							dataByRid.filter(roadwork_array[i]);// filter by data with current id 
							var tempFlow = dataByRid.top(Infinity);

							//sort the allFlow items by date
							var dateFilter= crossfilter(tempFlow);
							var dataByDate = dateFilter.dimension(function(d) {return d["tf_recordedtime"];});
							var allFlow = dataByDate.bottom(Infinity);

							var flow =[];
							for (var j in allFlow){
								var x_value = new Date (allFlow[j]["tf_recordedtime"]*1000);
								var totalFlow= allFlow[j]["tf_medflow"]+allFlow[j]["tf_longflow"]+allFlow[j]["tf_smallflow"]+allFlow[j]["tf_largeflow"];
								var y_value = totalFlow;
								console.log("item id="+ allFlow[j]["tf_id"]);
								console.log("item geo="+allFlow[j]["tf_geo"]["coordinates"][0]+ ", "+allFlow[j]["tf_geo"]["coordinates"][1]);
								console.log("item datetime="+ x_value);
								flow.push({x: x_value, y: y_value, speed:allFlow[j]["tf_avgspeed"], region:allFlow[j]["region"]});
							}
							var value={};
					        value["color"]= color_array[i];
					    	value["key"]= roadwork_array[i];
					    	value["values"]= flow;
					    	data.push(value);
						}
						//graph the line chart 
						var chart;
					    $("#bottom-box").append("<svg id="+"'flow_roadwork_plot'"+"></svg>");
						nv.addGraph(function() {  
						  var chart = nv.models.lineChart();
						  chart.xAxis // chart sub-models (ie. xAxis, yAxis, etc) when accessed directly, return themselves, not the parent chart, so need to chain separately
						      .tickFormat(function(d) { return d3.time.format('%I:%M %p')(new Date(d)); })
						  chart.yAxis
						      .axisLabel('Flow')
						      .tickFormat(d3.format(',.2f'));
						  chart.tooltipContent(function(key, y, e, graph){
						  	var x = graph.point.x;
				            var y = String(graph.point.y);
				            tooltip_str = '<center><b>#'+key+'</b></center>' +'Traffic Flow: '+ y + ' vehicles</br> Avg. Speed: ' + graph["point"]["speed"]+'km/hr</br>Time: '+x;
				            return tooltip_str;
						  });
						  d3.select('#flow_roadwork_plot')
						      .datum(data)
						    .transition().duration(500)
						      .call(chart);

						  //TODO: Figure out a good way to do this automatically
						  nv.utils.windowResize(chart.update);
						  //nv.utils.windowResize(function() { d3.select('#chart1 svg').call(chart) });
						  return chart;
						});
					    //update the right-box
					    $("#top-right-box").html("");
		                	// display roadwork details on overview plot
		                	var htmlToInsert =[];
		                	htmlToInsert[i++]= "<div class='flow_roadwork_text' style='margin: 0 auto; display:table; margin-top:40%;'> ";
		                	htmlToInsert[i++]= "<div><strong>There are currently "
		                						+ roadwork_array.length
		                						+" roadworks in progress. <br>"
		                						+"Select a roadwork on map to view its details.</div> ";
		                	htmlToInsert[i++]= " </strong></div>";
		                	$("#top-right-box").append(htmlToInsert.join(''));

					 
            });    
	  	}

	  	function plot_regions(){
	  		$("#bottom-box").html("");
	  		$("#top-right-box").html("");
	  		$("#top-right-box").append( "<div style='margin: 0 auto; display:table; margin-top:40%;'><strong>Select a data point from the chart below.</strong><div>" );
	  		$("#bottom-box").append( "<div style='margin: 0 auto; display:table; top:40%; position: relative;'><strong>No Data! Begin by selecting a region on the map.</strong><div>" );
	  		var query= {name: {$in: ["Haringey Roadside","London Harrow Stanmore","Southampton Centre","Walsall Woodlands","Leeds Centre","Salford Eccles","Coventry Memorial Park","London Hillingdon","Portsmouth","Horley","Bristol St Paul's"]}};
	  		var stringQuery= encodeURIComponent(JSON.stringify( query ));
	  		makeAPICall('POST', "TrafficExplorer" , "queryMongoBySingleKey", {collection: "region", query: stringQuery}, function(response){
            	//parse results here and draw plots
            	var json= JSON.parse(response);
            	var itemArray=new Array();
            	$.each(json["results"], function (i, ob) {
            		//populate json item array
            		itemArray.push(json["results"][i]);
				});
				//plot with d3
				g.selectAll(".region_rect")
		                .data(itemArray)
		                .enter()
		                .append("rect")
		                .attr("class", "region_rect")
		                .attr("d", function(d){
		                	return d["name"];
		                })
		                .attr("x", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0]+40;
		                })
		                .attr("y", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1]+15;	                
		                })
		                .attr("width", "80px")
	                    .attr("height", "30px")
		                ;

		        g.selectAll(".region_points")
		                .data(itemArray)
		                .enter()
		                .append("svg:text")
		                .attr("class", "region_points")
		                .attr("x", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0]-40;
		                })
		                .attr("y", function(d) {
		                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1]-15;	                
		                })
		                .attr("dy", ".35em")
					    .attr("text-anchor", "middle")
					    .text(function(d){
					    	return d["name"];
					    })
		        		.on('mouseover', function(d, i){
		                    //display region name and stats
		                })
		                .on('click', function(d, i){
		                	g.selectAll(".boundary").data([]).exit().remove();
		                	$(".region_points").attr("class", "region_points");
		                	$(".region_rect").attr("class", "region_rect");
		                	$(this).attr("class", "region_points selected");
		                	$("#"+d["name"].replace("'"," ")).attr("class", "region_rect selected");
		                	$("#bottom-box").html("");
		                	var region_lat=d["geo"]["coordinates"][1];
		                	var region_lng=d["geo"]["coordinates"][0];
		                	g.selectAll(".data_points")
								.data([])
								.exit()
				                .remove();
		                	console.log("region name: "+ i);
		                	//build queries
							var start = new Date("2013-09-23 00:00:00") ;
							var end = new Date("2013-09-25 00:00:00") ;
							var query = {"tf_recordedtime": {$gte: start, $lt: end}, "region":d["name"]};
					  		var stringQuery = JSON.stringify( query );
					  		console.log("stringQuery:"+stringQuery);

		                	//plot correlation graph 
		                	makeAPICall('POST', "TrafficExplorer" , "getMongoCorrelation", {collection: "correlation", query:stringQuery}, function(response){
				            	//parse results here and draw plots
				            	console.log("results: "+response);
				            	var json= JSON.parse(response);
				            	var itemArray=new Array();
				            	var junctionArray= new Array();
				            	var colorArray= new Array();
				            	var boundary_data={};
				            	boundary_data["region_lat"]=region_lat;
				            	boundary_data["region_lng"]=region_lng;
				            	$.each(json, function (i, ob) {
				            		//populate json item array
				            		itemArray.push(json[i]);
				            		if ($.inArray(json[i]["tf_geo"]["coordinates"][0], junctionArray)==-1){
				            			junctionArray.push(json[i]["tf_geo"]["coordinates"][0]);
				            			colorArray.push(getRandomColor());

				            			//find biggest radius
				            			boundary_data["radius"]=45;
				            		}
								});
								//draw boundary
								var boundaryArray= new Array();
								boundaryArray.push(boundary_data);
								g.selectAll(".boundary")
									.data(boundaryArray)
									.enter()
									.append("circle")
									.attr("class", "boundary")
									.attr("cx", function(d){
										return project([d["region_lng"], d["region_lat"]])[0];
									})
									.attr("cy", function(d){
										return project([d["region_lng"], d["region_lat"]])[1];
									})
									.attr("r", function(d){
										return d["radius"];
									})
									.attr("fill", "white")
									.attr("opacity", "0.3");
								//plot the dots on map
								var region;
								
								g.selectAll(".data_points")
					                .data(itemArray)
					                .enter()
					                .append("circle")
					                .attr("class", "data_points")
					                .attr("fill", function(d) {
										//search me
										var lng= d["tf_geo"]["coordinates"][0];
		        						return colorArray[$.inArray(lng,junctionArray)];
					                })
					                .attr("cx", function(d) {
										return project([d["tf_geo"]["coordinates"][0], d["tf_geo"]["coordinates"][1]])[0];
					                })
					                .attr("cy", function(d) {
					                    return project([d["tf_geo"]["coordinates"][0], d["tf_geo"]["coordinates"][1]])[1];
					                })
					                .attr("r", function(d) {
					                	region= d["region"];
					                	return r=5;
					        		});
					        	//prep data
					        	var data=[];
					        	//
					        	for (var i = 0; i < junctionArray.length; i++) {
								    data.push({
								      key: 'Junction ' + i,
								      values: []
								    });
								}
					        	for (var i in itemArray){
					        		
					        		var totalFlow= itemArray[i]["tf_medflow"]+itemArray[i]["tf_longflow"]+itemArray[i]["tf_smallflow"]+itemArray[i]["tf_largeflow"];
					        		var timeRatio= itemArray[i]["tt_historictime"]/itemArray[i]["tt_idealtime"];
					        		var speed = itemArray[i]["tf_avgspeed"];
					        		var medflow = itemArray[i]["tf_medflow"];
					        		var largeflow = itemArray[i]["tf_largeflow"];
					        		var smallflow = itemArray[i]["tf_smallflow"];
					        		var longflow = itemArray[i]["tf_longflow"];
					        		var timestamp = new Date(itemArray[i]["tf_recordedtime"]["sec"]*1000);
					        		var lng = itemArray[i]["tf_geo"]["coordinates"][0];
					        		var index = $.inArray(lng, junctionArray);
					        		data[index]["values"].push({x:totalFlow, y:timeRatio, time: timestamp, speed: speed,medflow: medflow,smallflow: smallflow,largeflow: largeflow,longflow: longflow});
					        	}
					        	//graph a chart
					        	var chart;
					        	$("#bottom-box").append("<svg id="+"'testplot'"+" class='scatterplot chart'></svg>");
								nv.addGraph(function() {
								  chart = nv.models.scatterChart()
								                .showDistX(true)
								                .showDistY(true)
								                .useVoronoi(true)
								                .interactive(true)
								                .color(colorArray)
								                .transitionDuration(300)
								                ;
								  chart.xAxis.tickFormat(d3.format('.02f'));
								  chart.yAxis.tickFormat(d3.format('.02f'));
								  chart.tooltipContent(function(key, x, y, d) {
								      return '<div> Average Speed: ' + d["point"]["speed"] + 'km/hr</div>'
								      		 +'Timestamp: '+d["point"]["time"];
								  });
								  d3.select('#testplot')
								      .datum(data)
								      .call(chart);
								  nv.utils.windowResize(chart.update);
								  chart.scatter.dispatch.on('elementClick', function(point) {
								  	$("#top-right-box").html("");
								  	console.log(" clicked point paths");
							                var values=new Array();
										    var flows= ["Small", "Medium", "Large", "Long"];
										    for (var i in flows){
										   		var value={};
										        value["label"]= flows[i];
										        if (flows[i]=="Small")
										    		value["value"]= point["point"]["smallflow"];
										    	if (flows[i]=="Medium")
										    		value["value"]= point["point"]["medflow"];
										    	if (flows[i]=="Large")
										    		value["value"]= point["point"]["largeflow"];
										    	if (flows[i]=="Long")
										    		value["value"]= point["point"]["longflow"];
										    	values.push(value);
										    }
										 	barChartData = [ 
												{
												    key: "Flow Distribution",
												    values: values
												}
											];
							                $("#top-right-box").append("<svg id="+"'flow_dist_chart'"+" class='gully_overview_chart'></svg>");
								        	nv.addGraph(function() {  
											  	var chart = nv.models.discreteBarChart()
												    .x(function(d) { return d.label })
													.y(function(d) { return d.value })
													.staggerLabels(false)
													.tooltips(false)
													.showValues(true)
													.transitionDuration(250);
												chart.yAxis.axisLabel("# of Vehicles");
												chart.xAxis.axisLabel("Vehicle Size");


												d3.select('#flow_dist_chart')
													.datum(barChartData)
													.call(chart);
												d3.select('#flow_dist_chart')
												  .append("text")
												  .attr("x", 150)             
												  .attr("y", 0)
												  .attr("text-anchor", "middle")  
												  .text("Traffic Flow Dist.");
												nv.utils.windowResize(chart.update);
												return chart;
											},function(){
										     	//TODO
										    });
								  });
								  return chart;
								});
				            });  
		                });
            });    
	  	}

	  	//D3 functions

	  	// Reposition the SVG to cover the features.
	  	function reset() {
	  	 	var bottomLeft = project(bounds[0]),
	        	topRight = project(bounds[1]);
		    svg .attr("width", topRight[0] - bottomLeft[0])
		        .attr("height", bottomLeft[1] - topRight[1])
		        .style("margin-left", bottomLeft[0] + "px")
		        .style("margin-top", topRight[1] + "px");
		    g   .attr("transform", "translate(" + -bottomLeft[0] + "," + -topRight[1] + ")");
		    feature.attr("d", path);
		    //redraw the pins due to zoom level
				g.selectAll(".data_points")
		    		.attr("cx", function(d) {
										return project([d["tf_geo"]["coordinates"][0], d["tf_geo"]["coordinates"][1]])[0];
					                })
					                .attr("cy", function(d) {
					                    return project([d["tf_geo"]["coordinates"][0], d["tf_geo"]["coordinates"][1]])[1];
					                });
				g.selectAll(".region_rect")
		    		.attr("x", function(d) {
										return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
					                })
					                .attr("y", function(d) {
					                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
					                });
				g.selectAll(".region_points")
		    		.attr("x", function(d) {
										return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
					                })
					                .attr("y", function(d) {
					                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
					                });
				g.selectAll(".gully-map-points")
		    		.attr("cx", function(d) {
										return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
					                })
					                .attr("cy", function(d) {
					                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
					                });
				g.selectAll(".trafficFlow_points")
		    		.attr("cx", function(d) {
										return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0];
					                })
					                .attr("cy", function(d) {
					                    return project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
					                });
				g.selectAll(".redcar_roadwork_points")
		    		.attr('d', function(d) { 
			        	var x = project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[0]; 
			        	y = project([d["geo"]["coordinates"][0], d["geo"]["coordinates"][1]])[1];
			        	return 'M ' + x +' '+ y + ' l 10 10 l -20 0 z';
			      	})

			    g.selectAll(".roadwork_points")
		    		.attr("cx", function(d) {
						return project([d["rw_geo"]["coordinates"][0], d["rw_geo"]["coordinates"][1]])[0];
					})
					.attr("cy", function(d) {
					    return project([d["rw_geo"]["coordinates"][0], d["rw_geo"]["coordinates"][1]])[1];
					});
				g.selectAll(".boundary")
		    		.attr("cx", function(d) {
						return project([d["region_lng"], d["region_lat"]])[0];
					})
					.attr("cy", function(d) {
					    return project([d["region_lng"], d["region_lat"]])[1];
					});

			
		  
	  	}
	  	// Use Leaflet to implement a D3 geographic projection.
		function project(x) {
		    var point = map.latLngToLayerPoint(new L.LatLng(x[1], x[0]));
		    return [point.x, point.y];
		}

		function get_key_by_object_value(searchKey, searchVal){
			    for( var key in layer ) {
			    	var obj= layer[key];
			    	if( obj.hasOwnProperty(searchKey)) {
			    		if (obj[searchKey]=== searchVal)
			    			return key;
			    	}
			    }
		}

	});//end of D3 loop

	$("#map").on('click', function(event) {
	    if ($(".tooltip").css('opacity')>0 && ($(event.target).attr('class') !== 'tooltip')){
	    	$(".tooltip").css("opacity",0)
                     	.css("display", "none");
	    } 
	});
	$(".tooltip").on('dblclick click', function(event) {
		event.stopPropagation();
	});


	function getRandomColor() {
		var letters = '0123456789ABCDEF'.split('');
		var color = '#';
		for (var i = 0; i < 6; i++ ) {
			color += letters[Math.round(Math.random() * 15)];
		}
		return color;
	}
});
