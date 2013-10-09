smartstreets-apps
=================

Example applications for the smart streets project including the interop API. These applications are built on the Kurogo Platform. 

Overview:
---------
There are currently 3 example applications:

1. Catalogue Browser
	* A simple data browsing application to demonstrate the use of the Interop API for accessing data from participating datahubs. Interop API is used to fetch data and Apache Solr is used for data indexing. 

2. Roadwork Mashup
	* An application that aggregates UK highway traffic related data and visualises the impacts on a map interface. Currently all data is pulled from the SmartStreets datahub using the WoTkit API, the following data sources are used:
		* UK current roadworks
		* UK VMS messages
		* UK Unplanned Events

3. Traffic Explorer
	* An application that contains four canned interactive traffic visualisation tools to explore highway traffic data in the UK. Solr is used to fetch all gully related sensors, while MongoDB is used to store sensor data as collections. The canned interactive tools include:
		* Gully Status Overview (Redcar and Cleveland)
		* Roadwork Impact on Gully Silt Levels
		* Highway Travel Flow's Impact on Travel Time
		* Roadwork Impact on Traffic Flow and Speed

Note: More datasources will be added to show interoperability across datahubs as more data becomes available. 

Open Source Projects Used:
--------------------------
* Kurogo
* Apache Solr
* MongoDB
* JQuery
* JQuery UI
* D3.js
* NVD3

Setting Up Solr: (Catalogue Browser)
------------------------------------
**Step 1:** Install Apache Solr (Get it here: http://lucene.apache.org/solr/downloads.html)

**Step 2:** Copy paste the entire "solr" folder from the "solrCoreConfigs" directory in this repo to replace \<Solr Directory\>/example/solr

**Step 3:** Go to \<Solr Directory\>/example/

**Step 4:** to start Solr, run command
> java -jar start.jar

**Step 5:** Index Solr with following Kurogo shell commands:

1. To retrieve data: "retrieveAll"
2. To delete all documents in Solr: "deleteAllFeeds"

To run the above commands, change directory to the folder where the file "SolrAggregationShellModule.php" resides, then enter the following command:

> sudo \<Kurogo Main Directory\>/lib/KurogoShell SolrAggregation \<Shell Command Name\>


Setting Up MongoDB (Traffic Explorer only):
-------------------------------------------
**Step 1:** Install MongoDB (Get it here: http://www.mongodb.org/downloads)

**Step 2:** Install PHP Mongo Drivers
Commands for unix users:
> sudo apt-get install php5-dev php5-cli php-pear  
> sudo pecl install mongo  

Then locate the "php.ini" file and add this line of code to the file
> extension=mongo.so

Save file and restart Apache Web server

**Step 3:** Start Mongo

**Step 4:** Populate Mongo Collections

To populate the data needed for the Traffic Explorer app, the following Kurogo shell commands need to be run in order:

1. "loadLocations"
2. "retrieveAirQuality"
3. "retrieveTrafficTime"
4. "retrieveTrafficFlow"
5. "retrieveRoadwork"
6. "joinCorrelation"
7. "retrieveGully" (requires Solr to be indexed first, see "Setting Up Solr")
8. "retrieveRedcarRoadwork"(requires Solr to be indexed first, see "Setting Up Solr")

To run the above commands, change directory to the folder where the file "TrafficExplorerShellModeule.php" resides, then enter the following command:
> sudo \<Kurogo Main Directory\>/lib/KurogoShell TrafficExplorer \<Shell Command Name\>

To drop the entire database, issue the command "deleteAll"
Note: Use the mongo client to check that data is populated successfully



