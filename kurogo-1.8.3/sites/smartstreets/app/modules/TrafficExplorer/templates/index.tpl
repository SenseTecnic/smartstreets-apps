<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<div id="mapContainer">	

	{include file="findInclude:common/templates/header.tpl"} 
	<div id ="dropdown">
		<div id = "dropdown_text"> Explore Data: </div>
		<select id="dropdown_select">
<!-- 			<option value="gully_overview">Gully Status Overview (Redcar, UK)</option>
			<option value="gully_roadwork">Roadwork Impact on Gully Silt Level (Redcar, UK)</option> -->
			<!-- <option value="flow_air">UK Traffic Flow Impact on Air Quality</option> -->
			<option value="flow_time">UK Traffic Flow Impact on Travel Time</option>
			<option value="flow_roadwork">UK Roadwork Impact on Traffic Flow and Speed</option>
		</select>
	</div>
	
	<div id="map" >
		<div class="tooltip">
			<div id="tooltip_content"></div>
		</div>

	</div> 
	<!-- <div id= "date-slider"></div> -->
	<div id="chart">
		<div id="top-left-box">

			<div id="gully_overview_desc" class="description">
				<h3 class="title">Gully Status Overview</h3>
				<div class ="text">
					<span>This is an interactive overview of gullies in Redcar and Cleveland, UK.
					Explore the data by clicking on the graphs to filter gullies on the map view. 
					The purple dots 
					<svg class="gully-dot">
					  <circle cx="6" cy="9" r="5"/>
					</svg>
					represent gullies, the larger the dot means the higher the gully silt level. </span>
					<br>
					<span>Use the checkbox controls to toggle the gully map pins and heatmap visualisations.</span>
					<br>

					<span>To reset the map to show all gully data, click the "RESET" button below.</span>

				</div>
			</div>

			<div id="gully_roadwork_desc" class="description" style="display: none;">
				<h3 class="title">Roadworks vs. Gullies</h3>
				<div class ="text smallfont">
					<span>This interactive demo shows all roadworks and gullies in Redcar and Cleveland, UK. The purple dots represent gullies(size increases for higher silt levels). The triangles represent roadworks, which are color-coded based on roadwork statuses(see chart at bottom for color reference). <br><br>
					Explore the impact of roadworks on gully silt levels by:<br>
					1. Clicking on the bars of the "Roadwork Status" chart (below) to filter roadworks by status on the map.<br>
					2. Click on a Roadwork symbol on map to view the silt levels of gullis that are within a certain radius of the roadwork location. Radius can be adjusted by the slider widget. 
					</span>
					<br><br>
					<span>To reset the map to show all data, click the "RESET" button below.</span>
					
				</div>
			</div>

			<div id="flow_time_desc" class="description" style="display: none;">
				<h3 class="title">UK Traffic Flow vs. Travel Time</h3>
				<div class ="text smallfont">
					<span>This interactive demo explores the traffic flow and travel time data to see if there is any correlation between the two. Several regions in UK are sampled. Each region contains multiple highway junctions (color coded differently), of which the traffic flow and travel time data has been mashed up. By selecting a junction point, a scatterplot of traffic flow vs travel time ratio (Actual Travel Time/Ideal Travel Time) is graphed. The goal here is to see if higher traffic flow correlates to a higher travel time ratio of greater than 1. 

					<br><br>
					<b>How to use:</b> <br>
					1. Select a region on map<br>
					2. Select a junction point on map<br>
					3. View scatterplot (each set of data can be filtered using the plot legend)<br>
					4. Select a data point on scatterplot to view the distribution of traffic flow in terms of vehicle size. <br>
					</span>
					<br>
					<span>To reset the map to get latest data, click the "RESET" button below.</span>
					
				</div>
			</div>

			<div id="flow_roadwork_desc" class="description" style="display: none;">
				<h3 class="title">UK Roadworks vs. Traffic Flow</h3>
				<div class ="text">
					<span>This demo explores the impact on traffic flows due to nearby roadworks. The colored circular map pins represent individual roadworks happening right now in UK. Click on each pin to view information about the selected roadwork. <br><br>
					The time series line chart below plots the traffic flow measured within 100 metres of the roadwork site. Each line represents a different roadwork instance. 
					</span>
					<br><br>
					<span>To refresh the data, click the "RESET" button below.</span>
					
				</div>
			</div>

			<a href="#" class="reset">RESET</a>
			<div id="slider-box" class="smallfont" style="display: none;">
				Radius: <span id="radius" >500m</span>
				<div id="radiusSlider"></div>
			</div>

		</div>
		<div id="top-right-box">
		</div>
		<div id="bottom-box">
			
		</div>
	</div>
	
</div>

	
</div>

