<html>

<head>
    <title>PAGASA</title>
    <meta name="viewport" content="width=device-width, initial-scale=.8">
    <link rel="shortcut icon" href="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/ol-popup@4.0.0/src/ol-popup.css" />
    <link href="https://bagong.pagasa.dost.gov.ph/index.php/combine/f7ef8c9f0a2812ec72b9674537a19748-1672119430.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/css/bootstrap-select.css">
</head>

<body>
 

        <div class="row weather hidden-xs" id="current-weather">
            <div class="col-md-12">
                <div class="col-md-12 article-content" style="margin-top:15px;">
                    <div class="row">
                        <div class="col-md-6 curr-weather-div">
                            <!--TROPICAL CYCLONE WARNING-->
                            
                        <div class="map-weather col-md-6 map-weather-wo-tcw map-weather-div">
                            <style type="text/css">
                            #map-canvas {
                                height: 599px;
                                min-width: 100%;
                                max-width: 100%;
                            }

                            .ws_point_marker {
                                color: #000 !important;
                                background: rgba(255, 255, 224, 0.7);
                                border-radius: 5px;
                                padding: 2px
                            }

                            .google-map-layer-control {
                                border: 2px solid rgba(0, 0, 0, 0.5);
                                border-radius: 5px;
                                background: white;
                                padding: 5px;
                            }

                            .layers-control {
                                position: absolute;
                                top: 5;
                                right: 20;
                            }

                            .layers-list {
                                min-width: 130px;
                                position: absolute;
                                top: 0;
                                right: 0;
                                border: 2px solid rgba(0, 0, 0, 0.5);
                                border-radius: 5px;
                                background: white;
                                color: #000;
                            }

                            .layers {
                                padding: 10px;
                            }

                            .layers>.layer-label {
                                font-size: 12px;
                                font-weight: bold;
                            }

                            .layers>.radio {
                                font-size: 12px;
                            }

                            input[type="radio"] {
                                margin: 0px 0 0;
                            }

                            .radio {
                                margin-top: 2px !important;
                                margin-bottom: 2px !important;
                            }

                            .gm-bundled-control>div {
                                top: 50 !important;
                            }

                            .rainrate-legend {
                                position: absolute;
                                top: 130;
                                right: 20;
                                height: 200px !important;
                            }

                            .cyclone-legend {
                                position: absolute;
                                top: 470;
                                left: 20;
                                height: 200px !important;
                            }

                            .expand-icon {
                                position: absolute;
                                top: 340;
                                right: 20;
                                border: 2px solid rgba(0, 0, 0, 0.5);
                                border-radius: 5px;
                                background: white;
                                padding: 5px;
                                color: rgba(0, 0, 0, 0.5);
                            }

                            .play-icon {
                                position: absolute;
                                top: 385;
                                right: 20;
                                border: 2px solid rgba(0, 0, 0, 0.5);
                                border-radius: 5px;
                                background: white;
                                padding: 5px;
                                color: rgba(0, 0, 0, 0.5);
                            }

                            .expand-icon:hover {
                                cursor: pointer;
                            }

                            .dropdown-submenu {
                                position: relative;
                            }

                            .dropdown-submenu>.dropdown-menu {
                                top: 0;
                                left: 100%;
                                margin-top: -5px;
                                margin-left: 0px;
                                -webkit-border-radius: 0 0px 0px 6px;
                                -moz-border-radius: 0 6px 6px;
                                border-radius: 0 0px 0px 6px;
                            }

                            .dropdown-submenu:hover>.dropdown-menu {
                                display: block;
                            }

                            .dropdown-submenu>a:after {
                                display: block;
                                content: " ";
                                float: right;
                                width: 0;
                                height: 0;
                                border-color: transparent;
                                border-style: solid;
                                border-width: 5px 0 5px 5px;
                                border-left-color: #ccc;
                                margin-top: 5px;
                                margin-right: -10px;
                            }

                            .dropdown-submenu:hover>a:after {
                                border-left-color: #fff;
                            }

                            .dropdown-submenu.pull-left {
                                float: none;
                            }

                            .dropdown-submenu.pull-left>.dropdown-menu {
                                left: -100%;
                                margin-left: 10px;
                                -webkit-border-radius: 6px 0 6px 6px;
                                -moz-border-radius: 6px 0 6px 6px;
                                border-radius: 6px 0 6px 6px;
                            }

                            .layer-shortcut {
                                position: absolute;
                                top: 37px;
                                right: 186px;
                            }

                            .layer-shortcut .dropdown-menu li {
                                cursor: pointer;
                            }

                            .c-zoom-control {
                                position: absolute;
                                top: 60px;
                                right: 25px;
                            }

                            .c-zoom-control>.c-zoom-in,
                            .c-zoom-control>.c-zoom-out {
                                width: 25px;
                                padding: 7px;
                                display: block;
                                background: #ffffff;
                                color: #676767;
                            }

                            .c-zoom-control>.c-zoom-in:hover,
                            .c-zoom-control>.c-zoom-out:hover {
                                background: #c2c2c2;
                            }

                            .ol-popup {
                                position: absolute;
                                background-color: white;
                                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
                                padding: 15px;
                                border-radius: 10px;
                                border: 1px solid #cccccc;
                                bottom: 12px;
                                left: -50px;
                                min-width: 230px;
                                color: black;
                                font-size: 12px;
                            }

                            .ol-popup:after,
                            .ol-popup:before {
                                top: 100%;
                                border: solid transparent;
                                content: " ";
                                height: 0;
                                width: 0;
                                position: absolute;
                                pointer-events: none;
                            }

                            .ol-popup:after {
                                border-top-color: white;
                                border-width: 10px;
                                left: 48px;
                                margin-left: -10px;
                            }

                            .ol-popup:before {
                                border-top-color: #cccccc;
                                border-width: 11px;
                                left: 48px;
                                margin-left: -11px;
                            }

                            .ol-popup-closer {
                                text-decoration: none;
                                position: absolute;
                                top: 2px;
                                right: 8px;
                            }

                            .ol-popup-closer:after {
                                content: "✖";
                            }
                            </style>
                            <div id="map-has-warning" class=""></div>
                            <div id="map-canvas"></div> <i class="fa fa-arrows-alt expand-icon fa-2x" id="fullscreen"
                                aria-hidden="true"></i> <i class="fa fa-play play-icon fa-2x" hidden id="play-btn"
                                aria-hidden="true"></i> <img class="rainrate-legend" style="z-index: 0 !important;"
                                src="https://bagong.pagasa.dost.gov.ph/themes/hiraia//assets/images/layout/rainratenew.png">
                            <img class="cyclone-legend" hidden style="z-index: 0 !important;"
                                src="https://www.panahon.gov.ph/assets/legend_cyclone.png">
                            <div class="c-zoom-control" style="position: absolute; top:60px; right: 25px;   "> <i
                                    class="fa fa-plus c-zoom-in"></i> <i class="fa fa-minus c-zoom-out"></i> </div>
                            <div class="layers-control">
                                <div class="google-map-layer-control"> <img
                                        src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/css/images/layers.png">
                                </div>
                                <div class="layers-list" hidden>
                                    <div class="layers">
                                        <div class="layer-label">Radar&nbsp;Layers</div>
                                        <div class="radio">
                                            <label>
                                                <input data-layer="radarLayer" id="radar_mosaic" type="radio"
                                                    name="radio-layers">Radar&nbsp;Mosaic</label>
                                        </div>
                                        <div class="layer-label">Satellite&nbsp;Layers</div>
                                        <div class="radio">
                                            <label>
                                                <input data-layer="himawariSatellite" id="himawari_satellite"
                                                    type="radio" checked name="radio-layers">HIMAWARI IR1</label>
                                        </div>
                                        <!--<div class="radio">
                    <label><input data-layer="visSatellite" id="vis_satellite" type="radio"  name="radio-layers">HIMAWARI VIS</label>
                </div>-->
                                        <!--             <div class="radio">
                    <label><input data-layer="comsSatellite" id="coms_satellite" type="radio"  name="radio-layers">COMS&nbsp;RI</label>
                </div> -->
                                        <!--             <div class="layer-label">Weather</div>
                <div class="radio">
                    <label><input data-layer="currentWeather" id="current_weather" type="radio"  name="radio-layers">Current Weather</label>
                </div> -->
                                        <div class="layer-label">Latest&nbsp;Weather</div>
                                        <div class="radio">
                                            <label>
                                                <input class="aws-btn" data-layer="temperature" type="radio"
                                                    name="radio-layers">Temperature&nbsp;(&degC)</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input class="aws-btn" data-layer="precipitation" type="radio"
                                                    name="radio-layers">Precipitation&nbsp;(mm/hr)</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input class="aws-btn" data-layer="wind" type="radio"
                                                    name="radio-layers">Winds</label>
                                        </div>
                                        <!--             <div class="radio">
                                <label><input data-layer="stationWindSpeed" id="wind_speed_station" type="radio"  name="radio-layers">Wind&nbsp;Speed&nbsp;(m/s)</label>
                            </div>
                            <div class="radio">
                                <label><input data-layer="stationWindDirection" id="wind_direction_station" type="radio"  name="radio-layers">Wind&nbsp;Direction</label>
                            </div> -->
                                        <!--            <div class="radio">
                                                <label><input data-layer="stationWaterLevel" id="water_level_station" type="radio"  name="radio-layers">Water&nbsp;Level</label>
                                        </div> -->
                                        <div class="layer-label">Contours</div>
                                        <div class="radio">
                                            <label>
                                                <input class="contour-btn" data-layer="temperature" type="radio"
                                                    name="radio-layers">Temperature</label>
                                        </div>
                                        <!--             <div class="radio">
                    <label><input data-layer="contourHumidity" id="humidity_contour" type="radio"  name="radio-layers">Humidity</label>
                </div> -->
                                        <div class="radio">
                                            <label>
                                                <input class="contour-btn" data-layer="rain" type="radio"
                                                    name="radio-layers">Rain Fall (1hr Cumulative Data)</label>
                                        </div>
                                        <div class="layer-label">Alerts</div>
                                        <div class="radio">
                                            <label>
                                                <input id="active_warnings" data-layer="activeWarnings" type="radio"
                                                    name="radio-layers">Active Warnings</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input data-layer="lightning" id="lightning" type="radio"
                                                    name="radio-layers">Lightning</label>
                                        </div>
                                        <div class="layer-label">Domain</div>
                                        <div class="radio">
                                            <label>
                                                <input class="domain-line" data-layer="tca" id="tca" type="radio"
                                                    name="radio-layers">Tropical Cyclone Advisory</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input class="domain-line" data-layer="tci" id="tcinfo" type="radio"
                                                    name="radio-layers">Tropical Cyclone Information</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layer-shortcut pull-right hidden-xs">
                                <div class="btn-group a-link" role="group" aria-label="..."> <a
                                        href="https://v2-cloud.meteopilipinas.gov.ph" target="_blank"
                                        class="btn btn-default">Weather Monitoring Tool</a>
                                    <div class="btn-group dropdown" role="group"> <a href="#"
                                            class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Hazard Maps &nbsp;<span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://v2-cloud.meteopilipinas.gov.ph?flood=show"
                                                    target="_blank">Flood</a></li>
                                            <li><a href="https://v2-cloud.meteopilipinas.gov.ph?stormsurge=show"
                                                    id="stormsurge_link">Storm Surge</a></li>
                                            <!-- <li><a href="https://v2.meteopilipinas.gov.ph?stormsurge_modified=show" id="stormsurge_link">Storm Surge (Enhanced)</a></li> -->
                                            <!-- <li class="dropdown-submenu">
                        <a tabindex="-1">Storm Surge (Modified)</a>
                        <ul class="dropdown-menu">
                            <li><a class="strom-surge-lnk" id="SSIM2" tabindex="-1">2 meters</a></li>
                            <li><a class="strom-surge-lnk" id="SSIM3">3 meters</a></li>
                            <li><a class="strom-surge-lnk" id="SSIM4">4 meters</a></li>
                            <li><a class="strom-surge-lnk" id="SSIM5">5 meters</a></li>
                        </ul>
                    </li> -->
                                            <!-- <li><a href="https://v2.meteopilipinas.gov.ph?stormsurge=show" target="_blank">Storm Surge</a></li> -->
                                            <li><a href="https://v2-cloud.meteopilipinas.gov.ph?landslide=show"
                                                    target="_blank">Landslide</a></li>
                                            <!--<li><a href="https://v2.meteopilipinas.gov.ph?severwinds=show" target="_blank">Severe Winds</a></li>-->
                                        </ul>
                                    </div>
                                    <div class="btn-group dropdown" role="group"> <a href="#"
                                            class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Satellite &nbsp;<span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="himawari-ir-map-btn">Himawari IR1</a></li>
                                            <li><a href="https://rainx.pagasa.dost.gov.ph/" target="_blank">SatREx</a>
                                            </li>
                                            <!-- <li><a class="himawari-vis-map-btn">Himawari VIS</a></li> -->
                                            <!-- <li><a class="coms-ri-map-btn">COMS RI</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="map-links pull-right hidden-xs">
                                <div class="btn-group a-link" role="group" aria-label="..."> <a
                                        class="btn btn-default surface-map-btn_">Surface Map Analysis</a> <a
                                        href="https://v2-cloud.meteopilipinas.gov.ph?nwp=show" target="_blank"
                                        class="btn btn-default">Numerical Weather Prediction</a> </div>
                            </div>
                            <div class="active-alerts">
                                <div class="col-md-12 title" data-container="body" data-toggle="popover"
                                    data-placement="right"
                                    data-content="Current alerts and advisories for light to severe hazards and weather disturbances (tropical cyclone, flood, storm surge, thunderstorm, and rainfall) at a glance.">
                                    <span>Active Warnings<i class="fa fa-question-circle pull-right"
                                            aria-hidden="true"></i></span>
                                </div>
                                <div class="col-md-12 alert shown-alert">
                                    <div class="row">
                                        <div class="col-md-12 show-legend"> <a
                                                href="https://bagong.pagasa.dost.gov.ph/index.php/learnings/legend"
                                                target="_blank">Show Legend</a> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center no-active-warnings"> No Active Warnings </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        var map_var = false;
        var auto_skip = false;
        var synop_id = 425;
        var weather = {
            "Weather": {
                "SearchList": {
                    "41031000": {
                        "province": "Batangas",
                        "municipality": "Ambulong Synoptic Station",
                        "latitude": "14.090081",
                        "longitude": "121.055244",
                        "site_id": 432
                    },
                    "175110000": {
                        "province": "Occidental Mindoro",
                        "municipality": "San Jose Synoptic Station",
                        "latitude": "12.359581",
                        "longitude": "121.048061",
                        "site_id": 531
                    },
                    "74610000": {
                        "province": "Negros Oriental",
                        "municipality": "Dumaguete City Synoptic Station",
                        "latitude": "9.333250",
                        "longitude": "123.299167",
                        "site_id": 642
                    },
                    "72226000": {
                        "province": "Cebu",
                        "municipality": "Mactan Intl Airport Synoptic Station",
                        "latitude": "10.316667",
                        "longitude": "123.983333",
                        "site_id": 646
                    },
                    "86407000": {
                        "province": "Southern Leyte",
                        "municipality": "Maasin Synoptic Station",
                        "latitude": "10.133333",
                        "longitude": "124.833333",
                        "site_id": 648
                    },
                    "166724000": {
                        "province": "Surigao Del Norte",
                        "municipality": "Surigao Synoptic Station",
                        "latitude": "9.782717",
                        "longitude": "125.489417",
                        "site_id": 653
                    },
                    "126303000": {
                        "province": "South Cotabato",
                        "municipality": "General Santos Synoptic Station",
                        "latitude": "6.050000",
                        "longitude": "125.100000",
                        "site_id": 851
                    },
                    "20902000": {
                        "province": "Batanes",
                        "municipality": "Itbayat Synoptic Station",
                        "latitude": "20.801433",
                        "longitude": "121.851417",
                        "site_id": 132
                    },
                    "21509000": {
                        "province": "Cagayan",
                        "municipality": "Calayan Synoptic Station",
                        "latitude": "19.266667",
                        "longitude": "121.466667",
                        "site_id": 133
                    },
                    "20901000": {
                        "province": "Batanes",
                        "municipality": "Basco Radar Synoptic Station",
                        "latitude": "20.427731",
                        "longitude": "121.970642",
                        "site_id": 134
                    },
                    "12930000": {
                        "province": "Ilocos Sur",
                        "municipality": "Sinait Synoptic Station",
                        "latitude": "17.890239",
                        "longitude": "120.459706",
                        "site_id": 222
                    },
                    "12812000": {
                        "province": "Ilocos Norte",
                        "municipality": "Laoag City Synoptic Station",
                        "latitude": "18.183147",
                        "longitude": "120.534514",
                        "site_id": 223
                    },
                    "21505000": {
                        "province": "Cagayan",
                        "municipality": "Aparri Synoptic Station",
                        "latitude": "18.359681",
                        "longitude": "121.630433",
                        "site_id": 232
                    },
                    "21529000": {
                        "province": "Cagayan",
                        "municipality": "Tuguegarao City Synoptic Station",
                        "latitude": "17.647636",
                        "longitude": "121.758689",
                        "site_id": 233
                    },
                    "37105000": {
                        "province": "Zambales",
                        "municipality": "Iba Synoptic Station",
                        "latitude": "15.326211",
                        "longitude": "119.969167",
                        "site_id": 324
                    },
                    "15518000": {
                        "province": "Pangasinan",
                        "municipality": "Dagupan City Synoptic Station",
                        "latitude": "16.086881",
                        "longitude": "120.352203",
                        "site_id": 325
                    },
                    "35401000": {
                        "province": "Pampanga",
                        "municipality": "Clark Airport Synoptic Station",
                        "latitude": "15.183333",
                        "longitude": "120.550000",
                        "site_id": 327
                    },
                    "141102000": {
                        "province": "Benguet",
                        "municipality": "Baguio City Synoptic Station",
                        "latitude": "16.404078",
                        "longitude": "120.601411",
                        "site_id": 328
                    },
                    "34903000": {
                        "province": "Nueva Ecija",
                        "municipality": "Cabanatuan Synoptic Station",
                        "latitude": "15.470572",
                        "longitude": "120.951250",
                        "site_id": 330
                    },
                    "37701000": {
                        "province": "Aurora",
                        "municipality": "Baler Radar Synoptic Station",
                        "latitude": "15.750000",
                        "longitude": "121.633333",
                        "site_id": 334
                    },
                    "37702000": {
                        "province": "Aurora",
                        "municipality": "Casiguran Synoptic Station",
                        "latitude": "16.265333",
                        "longitude": "122.128756",
                        "site_id": 336
                    },
                    "133900000": {
                        "province": "Metro Manila",
                        "municipality": "Port Area Synoptic Station",
                        "latitude": "14.587628",
                        "longitude": "120.967958",
                        "site_id": 425
                    },
                    "37114000": {
                        "province": "Zambales",
                        "municipality": "Cubi Pt. Synoptic Station",
                        "latitude": "14.791889",
                        "longitude": "120.270831",
                        "site_id": 426
                    },
                    "45647000": {
                        "province": "Quezon",
                        "municipality": "Tayabas City Synoptic Station",
                        "latitude": "14.018428",
                        "longitude": "121.596575",
                        "site_id": 427
                    },
                    "42105000": {
                        "province": "Cavite",
                        "municipality": "Sangley Point Synoptic Station",
                        "latitude": "14.491647",
                        "longitude": "120.898583",
                        "site_id": 428
                    },
                    "137605000": {
                        "province": "Metro Manila",
                        "municipality": "Naia Synoptic Station",
                        "latitude": "14.506011",
                        "longitude": "121.004731",
                        "site_id": 429
                    },
                    "137404000": {
                        "province": "Quezon City",
                        "municipality": "Science Garden Synoptic Station",
                        "latitude": "14.643847",
                        "longitude": "121.044525",
                        "site_id": 430
                    },
                    "175205000": {
                        "province": "Oriental Mindoro",
                        "municipality": "Calapan Synoptic Station",
                        "latitude": "13.414644",
                        "longitude": "121.186872",
                        "site_id": 431
                    },
                    "45812000": {
                        "province": "Rizal",
                        "municipality": "Tanay Synoptic Station",
                        "latitude": "14.581342",
                        "longitude": "121.369203",
                        "site_id": 433
                    },
                    "45620000": {
                        "province": "Quezon",
                        "municipality": "Infanta Synoptic Station",
                        "latitude": "14.746636",
                        "longitude": "121.649033",
                        "site_id": 434
                    },
                    "45602000": {
                        "province": "Quezon",
                        "municipality": "Alabat Synoptic Station",
                        "latitude": "14.105382",
                        "longitude": "122.017583",
                        "site_id": 435
                    },
                    "51603000": {
                        "province": "Camarines Norte",
                        "municipality": "Daet Synoptic Station",
                        "latitude": "14.128789",
                        "longitude": "122.982747",
                        "site_id": 440
                    },
                    "50506000": {
                        "province": "Albay",
                        "municipality": "Legazpi City Synoptic Station",
                        "latitude": "13.150750",
                        "longitude": "123.728631",
                        "site_id": 444
                    },
                    "52011000": {
                        "province": "Catanduanes",
                        "municipality": "Virac Synoptic Station",
                        "latitude": "13.576419",
                        "longitude": "124.211378",
                        "site_id": 446
                    },
                    "175309000": {
                        "province": "Palawan",
                        "municipality": "Coron Synoptic Station",
                        "latitude": "12.003667",
                        "longitude": "120.199833",
                        "site_id": 526
                    },
                    "175910000": {
                        "province": "Romblon",
                        "municipality": "Romblon Synoptic Station",
                        "latitude": "12.590664",
                        "longitude": "122.275358",
                        "site_id": 536
                    },
                    "61914000": {
                        "province": "Capiz",
                        "municipality": "Roxas City Synoptic Station",
                        "latitude": "11.600099",
                        "longitude": "122.749737",
                        "site_id": 538
                    },
                    "54111000": {
                        "province": "Masbate",
                        "municipality": "Masbate Synoptic Station",
                        "latitude": "12.366183",
                        "longitude": "123.629433",
                        "site_id": 543
                    },
                    "56210000": {
                        "province": "Sorsogon",
                        "municipality": "Juban Synoptic Station",
                        "latitude": "12.839231",
                        "longitude": "123.997147",
                        "site_id": 545
                    },
                    "84805000": {
                        "province": "Northern Samar",
                        "municipality": "Catarman Synoptic Station",
                        "latitude": "12.505517",
                        "longitude": "124.628500",
                        "site_id": 546
                    },
                    "86005000": {
                        "province": "Western Samar",
                        "municipality": "Catbalogan City Synoptic Station",
                        "latitude": "11.775103",
                        "longitude": "124.884167",
                        "site_id": 548
                    },
                    "83747000": {
                        "province": "Leyte",
                        "municipality": "Tacloban City Synoptic Station",
                        "latitude": "0.000000",
                        "longitude": "0.000000",
                        "site_id": 550
                    },
                    "82604000": {
                        "province": "Eastern Samar",
                        "municipality": "Borongan Synoptic Station",
                        "latitude": "11.660608",
                        "longitude": "125.443344",
                        "site_id": 553
                    },
                    "82609000": {
                        "province": "Eastern Samar",
                        "municipality": "Guiuan Synoptic Station",
                        "latitude": "11.045181",
                        "longitude": "125.755583",
                        "site_id": 558
                    },
                    "175316000": {
                        "province": "Palawan",
                        "municipality": "Puerto Princesa City Synoptic Station",
                        "latitude": "9.740275",
                        "longitude": "118.758614",
                        "site_id": 618
                    },
                    "175310000": {
                        "province": "Palawan",
                        "municipality": "Cuyo Synoptic Station",
                        "latitude": "10.850000",
                        "longitude": "121.033333",
                        "site_id": 630
                    },
                    "71219000": {
                        "province": "Bohol",
                        "municipality": "Tagbiliran City Synoptic Station",
                        "latitude": "9.584006",
                        "longitude": "123.818872",
                        "site_id": 644
                    },
                    "129804000": {
                        "province": "Maguindanao",
                        "municipality": "Cotabato City Synoptic Station",
                        "latitude": "7.166667",
                        "longitude": "124.216667",
                        "site_id": 746
                    },
                    "104307000": {
                        "province": "Misamis Oriental",
                        "municipality": "Lumbia Airport Synoptic Station",
                        "latitude": "8.535714",
                        "longitude": "124.557969",
                        "site_id": 747
                    },
                    "101312000": {
                        "province": "Bukidnon",
                        "municipality": "Malaybalay Synoptic Station",
                        "latitude": "8.151333",
                        "longitude": "125.133900",
                        "site_id": 751
                    },
                    "160202000": {
                        "province": "Agusan Del Norte",
                        "municipality": "Butuan City Synoptic Station",
                        "latitude": "8.946969",
                        "longitude": "125.482406",
                        "site_id": 752
                    },
                    "112402000": {
                        "province": "Davao Del Sur",
                        "municipality": "Davao City Synoptic Station",
                        "latitude": "7.116667",
                        "longitude": "125.650000",
                        "site_id": 753
                    },
                    "166809000": {
                        "province": "Surigao Del Sur",
                        "municipality": "Hinatuan Synoptic Station",
                        "latitude": "8.366536",
                        "longitude": "126.337897",
                        "site_id": 755
                    },
                    "97332000": {
                        "province": "Zamboanga Del Sur",
                        "municipality": "Zamboanga Synoptic Station",
                        "latitude": "6.919547",
                        "longitude": "122.063550",
                        "site_id": 836
                    },
                    "97202000": {
                        "province": "Zamboanga Del Norte",
                        "municipality": "Dipolog City Synoptic Station",
                        "latitude": "8.599439",
                        "longitude": "123.343664",
                        "site_id": 741
                    }
                },
                "CurrentWeather": {
                    "133900000": {
                        "datetime": "April 25, 2023, 5:00 pm",
                        "site_id": "425",
                        "temperature": "32\u00b0C",
                        "humidity": "55%",
                        "wind_speed": "14.4 km\/hr",
                        "wind_direction": "ENE",
                        "precipitation": "- mm\/hr",
                        "site_name": "PORT AREA",
                        "latitude": "14.587628",
                        "longitude": "120.967958",
                        "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies.png",
                        "desc": "Partly cloudy skies"
                    },
                    "35401000": {
                        "datetime": "April 25, 2023, 5:00 pm",
                        "site_id": "327",
                        "temperature": "32\u00b0C",
                        "humidity": "55%",
                        "wind_speed": "3.6 km\/hr",
                        "wind_direction": "SE",
                        "precipitation": "- mm\/hr",
                        "site_name": "CLARK",
                        "latitude": "15.183333",
                        "longitude": "120.550000",
                        "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies.png",
                        "desc": "Partly cloudy skies"
                    }
                },
                "NearestAWS": {
                    "133900000": [{
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "98",
                        "temperature": "29\u00b0C",
                        "humidity": "61%",
                        "pressure": "1004.2",
                        "solar_radiation": "0",
                        "wind_speed": "3.6 km\/hr",
                        "wind_direction": "ENE",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Science Garden, Quezon City",
                        "latitude": "14.645101",
                        "longitude": "121.044258"
                    }, {
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "5033",
                        "temperature": "33\u00b0C",
                        "humidity": "36%",
                        "pressure": "939.6",
                        "solar_radiation": "0",
                        "wind_speed": "10.8 km\/hr",
                        "wind_direction": "NE",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Tanay, Rizal AWS",
                        "latitude": "14.581234",
                        "longitude": "121.369240"
                    }, {
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "5035",
                        "temperature": "25\u00b0C",
                        "humidity": "78%",
                        "pressure": "976.2",
                        "solar_radiation": "0",
                        "wind_speed": "0 km\/hr",
                        "wind_direction": "N",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Indang, Cavite AWS",
                        "latitude": "14.197911",
                        "longitude": "120.883586"
                    }, {
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "5112",
                        "temperature": "23\u00b0C",
                        "humidity": "100%",
                        "pressure": "927",
                        "solar_radiation": "0",
                        "wind_speed": "0 km\/hr",
                        "wind_direction": "N",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Tagaytay AWS",
                        "latitude": "14.125971",
                        "longitude": "120.942333"
                    }],
                    "35401000": [{
                        "datetime": "April 18, 2023, 2:50 am",
                        "site_id": "5161",
                        "temperature": "25\u00b0C",
                        "humidity": "85%",
                        "pressure": "1005.3",
                        "solar_radiation": "0",
                        "wind_speed": "7.2 km\/hr",
                        "wind_direction": "W",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Hermosa, Bataan AWS",
                        "latitude": "14.815413",
                        "longitude": "120.479645"
                    }, {
                        "datetime": "April 16, 2023, 7:20 pm",
                        "site_id": "5023",
                        "temperature": "27\u00b0C",
                        "humidity": "89%",
                        "pressure": "-",
                        "solar_radiation": "0",
                        "wind_speed": "0 km\/hr",
                        "wind_direction": "W",
                        "precipitation": "0 mm\/hr",
                        "site_name": "San Marcelino, Zambales AWS",
                        "latitude": "14.971547",
                        "longitude": "120.200460"
                    }, {
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "5032",
                        "temperature": "31\u00b0C",
                        "humidity": "63%",
                        "pressure": "-",
                        "solar_radiation": "0",
                        "wind_speed": "7.2 km\/hr",
                        "wind_direction": "N",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Camiling, Tarlac AWS",
                        "latitude": "15.636773",
                        "longitude": "120.415784"
                    }, {
                        "datetime": "April 25, 2023, 6:30 pm",
                        "site_id": "5028",
                        "temperature": "28\u00b0C",
                        "humidity": "65%",
                        "pressure": "-",
                        "solar_radiation": "0",
                        "wind_speed": "10.8 km\/hr",
                        "wind_direction": "E",
                        "precipitation": "0 mm\/hr",
                        "site_name": "Munoz, Nueva Ecija AWS",
                        "latitude": "15.735934",
                        "longitude": "120.936830"
                    }]
                },
                "WeatherOutlook": {
                    "133900000": {
                        "outlook": [{
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "24\u00b0C",
                            "max": "34\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "24\u00b0C",
                            "max": "34\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "24\u00b0C",
                            "max": "35\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "25\u00b0C",
                            "max": "35\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "25\u00b0C",
                            "max": "35\u00b0C"
                        }]
                    },
                    "35401000": {
                        "outlook": [{
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "26\u00b0C",
                            "max": "36\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "26\u00b0C",
                            "max": "34\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "25\u00b0C",
                            "max": "35\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "25\u00b0C",
                            "max": "34\u00b0C"
                        }, {
                            "desc": "Partly cloudy skies to at times cloudy with rainshowers or thunderstorm",
                            "url": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/icons\/weather\/64\/partly-cloudy-skies-to-at-times.png",
                            "min": "26\u00b0C",
                            "max": "33\u00b0C"
                        }]
                    }
                },
                "BackgroundImages": {
                    "133900000": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/images\/key-cities-background\/metro-manila.png",
                    "35400000": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/images\/key-cities-background\/clark.png"
                },
                "Advisories": [{
                    "id": 3,
                    "title": "PAGASA Advisory",
                    "description": "PAGASA would like to inform and caution the public of unauthorized individuals posing to be officials of the agency soliciting money for a foundation.\r\n<br>\r\n<br>\r\nA report has been received by PAGASA that an email had been sent to a contractor by someone pretending to be a PAGASA Official seeking to solicit donation to a certain foundation. We do not tolerate and detest that misrepresentation.\r\n<br>\r\n<br>\r\nPlease be advised that no individuals or organization are authorized to use the name of PAGASA, its officials and employees for a favor. We request anyone who receive similar mail, email or calls to immediately report the matter to PAGASA Public Information Unit at Telephone No. (02) 8284-0800 local 102 to 103 or email us at information@pagasa.dost.gov.ph.",
                    "type": 0,
                    "active": 1,
                    "image": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/advisories\/pagasa-advisory_5ddf8760519a6.png",
                    "published_at": "2021-03-15",
                    "deleted_at": null,
                    "created_at": "2019-11-28 16:37:53",
                    "updated_at": "2022-12-07 16:58:22",
                    "url": "http:\/\/bagong.pagasa.dost.gov.ph\/",
                    "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/advisories\/thumbnail-pagasa-advisory_5ddf8760519a6.png"
                }],
                "Headlines": [{
                    "id": 3,
                    "title": "PAGASA Institutional Video (2018)",
                    "description": "DOST - PAGASA\r\nThe Weather and Climate Authority",
                    "active": 1,
                    "image": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/pagasa-institutional-video-2018_5b270a3771f31.png",
                    "url": "https:\/\/youtu.be\/cUX14Ry1FCo",
                    "published_at": "2018-04-03",
                    "deleted_at": null,
                    "created_at": "2018-06-18 09:26:18",
                    "updated_at": "2018-06-18 09:26:18",
                    "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/thumbnail-pagasa-institutional-video-2018_5b270a3771f31.png"
                }, {
                    "id": 2,
                    "title": "100th National Climate Outlook Forum",
                    "description": "Fifteen years since its inception, PAGASA will conduct its 100th National Climate Outlook Forum on March 22, 2018, a pre-event of the celebration of World and National Meteorological Day (WNM Day) on March 23, 2018.",
                    "active": 1,
                    "image": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/100th-national-climate-outlook-forum_5b2709f33ab41.png",
                    "url": "https:\/\/www1.pagasa.dost.gov.ph\/images\/climate_and_agromet_files\/concept_note_uploaded.pdf",
                    "published_at": "2018-03-02",
                    "deleted_at": null,
                    "created_at": "2018-06-18 09:25:13",
                    "updated_at": "2018-06-18 09:25:13",
                    "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/thumbnail-100th-national-climate-outlook-forum_5b2709f33ab41.png"
                }, {
                    "id": 1,
                    "title": "PAGASA Modernization Road Map",
                    "description": "PAGASA Modernization road map towards a world class atmospheric\/meteorological-hydrological agency",
                    "active": 1,
                    "image": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/pagasa-modernization-road-map_5b27099214c01.jpg",
                    "url": "http:\/\/pubfiles.pagasa.dost.gov.ph\/tamss\/textfiles\/PAGASAROADMAP.gif",
                    "published_at": "2016-01-01",
                    "deleted_at": null,
                    "created_at": "2018-06-18 09:23:33",
                    "updated_at": "2018-06-18 09:23:33",
                    "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/tamss\/headlines\/thumbnail-pagasa-modernization-road-map_5b27099214c01.jpg"
                }]
            },
            "Map": {
                "Radar": {
                    "id": "13",
                    "radar_name": "mosaic",
                    "version": "v2",
                    "coordinates": "",
                    "bounds": "{\"n\":\"22.322581275\",\"e\":\"129.511990464\",\"w\":\"115.969111093\",\"s\":\"3.80912641587\"}",
                    "is_active": 1,
                    "reason": null,
                    "animated_image": "{\"rainrate\":\"http:\/\/bagong.pagasa.dost.gov.ph\/themes\/hiraia\/assets\/images\/radar\/radar.gif\"}",
                    "order": "0",
                    "files_used": null,
                    "radar_count": null,
                    "product_type": null,
                    "time_executed": "0000-00-00 00:00:00",
                    "time_mosaic": null,
                    "time_finished": null,
                    "output_image_transparent": null,
                    "output_image_ph_background": null,
                    "created_at": "-0001-11-30 00:00:00",
                    "updated_at": "-0001-11-30 00:00:00"
                },
                "RadarTimeline": [
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425164500-final.png",
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425170000-final.png",
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425171500-final.png",
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425173000-final.png",
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425174500-final.png",
                    "https:\/\/api.meteopilipinas.gov.ph\/tmp\/d41d8cd98f00b204e9800998ecf8427e\/radar\/timeline\/mosaic-cmax\/r\/phv2_rain_mosaic_cmax_20230425180000-final.png"
                ],
                "CycloneTrack": [{
                    "cyclone_name": "Amang",
                    "info": {
                        "2023-04-11 02:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "02:00",
                            "latitude": "12.9",
                            "longitude": "128.6",
                            "radius": "0"
                        },
                        "2023-04-11 05:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "05:00",
                            "latitude": "13.2",
                            "longitude": "127.8",
                            "radius": "0"
                        },
                        "2023-04-11 08:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "08:00",
                            "latitude": "13.5",
                            "longitude": "127.1",
                            "radius": "0"
                        },
                        "2023-04-11 11:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "11:00",
                            "latitude": "13.6",
                            "longitude": "126.4",
                            "radius": "0"
                        },
                        "2023-04-11 14:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "14:00",
                            "latitude": "13.6",
                            "longitude": "125.7",
                            "radius": "0"
                        },
                        "2023-04-11 17:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "17:00",
                            "latitude": "13.6",
                            "longitude": "125.3",
                            "radius": "0"
                        },
                        "2023-04-11 20:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "20:00",
                            "latitude": "13.7",
                            "longitude": "124.6",
                            "radius": "0"
                        },
                        "2023-04-11 23:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-11",
                            "time": "23:00",
                            "latitude": "13.7",
                            "longitude": "124",
                            "radius": "0"
                        },
                        "2023-04-12 02:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "02:00",
                            "latitude": "13.5",
                            "longitude": "124",
                            "radius": "0"
                        },
                        "2023-04-12 05:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "05:00",
                            "latitude": "13.3",
                            "longitude": "124.3",
                            "radius": "0"
                        },
                        "2023-04-12 08:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "08:00",
                            "latitude": "13.4",
                            "longitude": "124",
                            "radius": "0"
                        },
                        "2023-04-12 11:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "11:00",
                            "latitude": "13.5",
                            "longitude": "123.8",
                            "radius": "0"
                        },
                        "2023-04-12 14:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "14:00",
                            "latitude": "13.7",
                            "longitude": "123.7",
                            "radius": "0"
                        },
                        "2023-04-12 17:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "17:00",
                            "latitude": "13.9",
                            "longitude": "123.6",
                            "radius": "0"
                        },
                        "2023-04-12 20:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "20:00",
                            "latitude": "14.1",
                            "longitude": "123.5",
                            "radius": "0"
                        },
                        "2023-04-12 23:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-12",
                            "time": "23:00",
                            "latitude": "14.2",
                            "longitude": "123.3",
                            "radius": "0"
                        },
                        "2023-04-13 02:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-13",
                            "time": "02:00",
                            "latitude": "14.3",
                            "longitude": "123",
                            "radius": "0"
                        },
                        "2023-04-13 05:00": {
                            "cyclone_type": "TD",
                            "date": "2023-04-13",
                            "time": "05:00",
                            "latitude": "14.4",
                            "longitude": "122.7",
                            "radius": "0"
                        },
                        "2023-04-13 08:00": {
                            "cyclone_type": "LPA",
                            "date": "2023-04-13",
                            "time": "08:00",
                            "latitude": "14.4",
                            "longitude": "122.2",
                            "radius": "0"
                        }
                    }
                }],
                "ActiveWarning": [],
                "TropicalCycloneWarning": null,
                "Lightning": []
            },
            "Media": {
                "News": [{
                    "id": 131,
                    "tags": "04 April 2023 - 10 April 2023",
                    "title": "SPECIAL WEATHER OUTLOOK ON THE OBSERVANCE OF SEMANA SANTA 2023",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">The ridge of high pressure and the formation of low pressure area are the dominant weather systems to affect the entire archipelago during the observance of \u201cSemana Santa\u201d.<\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">For today until Friday (4-7 April): The whole country will experience warm and humid weather condition associated with sunny to partly cloudy skies apart from isolated rainshowers and thunderstorms mostly over the Visayas and Mindanao. <\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">The public are warned to lessen their physical outdoor activities during day time hours due to extremely high heat index which may result to heat cramps or heat exhaustion and heat stroke. Drink water regularly, avoid wearing dark color clothing and if possible stay indoors particularly between 12:00 to 3:00 in the afternoon.<\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">For Saturday until Monday (8-10 April): Visayas and Mindanao will experience cloudy skies with rainshowers and thunderstorms due to an approaching low pressure system. Luzon will have sunny to partly cloudy skies apart from isolated passing light rains in the afternoon.<\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Light to moderate winds coming from the east and northeast will prevail and the coastal waters throughout the archipelago will be slight to moderate. <\/span><\/span><\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">This weather outlook will be updated if significant changes in weather occurs. For more information, please contact the Weather Division at telephone number (02) 8926-4258, trunk line 82840800 local 4801 or visit our website www.bagong.pagasa@dost.gov.ph.<\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\nSGD.<br \/>\r\n<strong>JUANITO S. GALANG<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2023-04-04",
                    "created_at": "2023-04-04 09:33:55",
                    "updated_at": "2023-04-04 09:33:55",
                    "deleted_at": null
                }, {
                    "id": 126,
                    "tags": "22 December 2022 - 01 January 2023",
                    "title": "SPECIAL WEATHER FORECAST FOR THE CHRISTMAS HOLIDAYS 2022",
                    "image_path": "",
                    "description": "<span style=\"font-size:11.5pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">The <\/span>weather <span style=\"font-size:11.0pt\">systems that <\/span>will likely <span style=\"font-size:11.0pt\">affect <\/span>most parts of <span style=\"font-size:11.0pt\">the country <\/span>during the Christmas Holidays are the prevailing Northeast Monsoon, the passage <span style=\"font-size:11.0pt\">of a <\/span>low-pressure system, <span style=\"font-size:11.0pt\">and <\/span>the southward migration of the Shearline.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.5pt\">December 22-28: <\/span><span style=\"font-size:11.5pt\">Cloudy skies with <\/span>rainshowers <span style=\"font-size:11.5pt\">and thunderstorms <\/span><span style=\"font-size:12.0pt\">over <\/span>Southern <span style=\"font-size:11.5pt\">Luzon, Visayas, and <\/span><span style=\"font-size:11.5pt\">Caraga becoming frequent rains <\/span><span style=\"font-size:12.0pt\">over <\/span><span style=\"font-size:11.5pt\">Eastern Visayas, <\/span>Surigao del Norte, Dinagat Island, <span style=\"font-size:11.5pt\">and Bicol Region by <\/span>Monday <span style=\"font-size:11.5pt\">and Tuesday <\/span>(December <span style=\"font-size:11.5pt\">26 <\/span>& 27). <span style=\"font-size:11.5pt\">Metro Manila <\/span>and <span style=\"font-size:11.5pt\">the rest <\/span>of <span style=\"font-size:11.5pt\">Luzon <\/span>will have <span style=\"font-size:11.5pt\">partly cloudy to cloudy skies with light <\/span>rains <span style=\"font-size:11.5pt\">while the rest <\/span>of <span style=\"font-size:11.5pt\">the <\/span>country <span style=\"font-size:11.5pt\">will be partly cloudy to cloudy <\/span>with isolated <span style=\"font-size:11.5pt\">rainshowers <\/span>or <span style=\"font-size:11.5pt\">thunderstorms.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11.5pt\"><span style=\"font-family:Arial,sans-serif\">December <span style=\"font-size:11.0pt\">29: <\/span>Southern Luzon and Visayas <span style=\"font-size:11.0pt\">will <\/span>have <span style=\"font-size:12.0pt\">cloudy <\/span>skies with rainshowers <span style=\"font-size:11.0pt\">and <\/span>thunderstorms. <span style=\"font-size:11.0pt\">The <\/span>rest <span style=\"font-size:11.0pt\">of <\/span>Luzon will experience partly cloudy to cloudy skies with light rains while Mindanao will experience partly cloudy to cloudy skies with isolated <span style=\"font-size:11.0pt\">rainshowers <\/span>or thunderstorms.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:12.0pt\">December 30, <\/span><span style=\"font-size:11.5pt\">2022 to <\/span><span style=\"font-size:12.0pt\">January <\/span><span style=\"font-size:11.5pt\">01, 2023: Cagayan Valley, Aurora, <\/span>Quezon, <span style=\"font-size:11.5pt\">and Bicol <\/span><span style=\"font-size:12.0pt\">Region <\/span><span style=\"font-size:12.0pt\">will <\/span><span style=\"font-size:11.5pt\">have <\/span><span style=\"font-size:12.0pt\">cloudy <\/span><span style=\"font-size:12.0pt\">skies with <\/span><span style=\"font-size:11.5pt\">light rains. Metro Manila and the rest of Luzon will be <\/span><span style=\"font-size:12.0pt\">partly <\/span><span style=\"font-size:11.5pt\">cloudy to cloudy <\/span><span style=\"font-size:12.0pt\">with light <\/span><span style=\"font-size:11.5pt\">rains while the rest <\/span>of <span style=\"font-size:11.5pt\">the country <\/span>will <span style=\"font-size:11.5pt\">experience <\/span><span style=\"font-size:11.5pt\">partly cloudy to cloudy skies with isolated rainshowers or thunderstorms.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\">Sea travelers <span style=\"font-size:11.5pt\">are advised to <\/span>exercise <span style=\"font-size:11.5pt\">extra caution due <\/span>to <span style=\"font-size:11.5pt\">expected big waves, <\/span><\/span><\/span><span style=\"font-size:11.5pt\"><span style=\"font-family:Arial,sans-serif\">particularly over the seaboards <span style=\"font-size:11.0pt\">of <\/span>Luzon and Visayas.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\">PAGASA <span style=\"font-size:11.5pt\">will <\/span>continue to monitor <span style=\"font-size:11.5pt\">and <\/span>inform <span style=\"font-size:11.5pt\">the <\/span><span style=\"font-size:12.0pt\">public <\/span><span style=\"font-size:11.5pt\">of any <\/span><span style=\"font-size:12.0pt\">significant weather <\/span><\/span><\/span><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.5pt\">changes<\/span> <span style=\"font-size:12.0pt\">occur.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\">For <span style=\"font-size:11.5pt\">more <\/span>information, please contact the forecaster <span style=\"font-size:12.0pt\">on <\/span><span style=\"font-size:11.5pt\">duty <\/span>of the <span style=\"font-size:11.5pt\">Weather <\/span>Division <span style=\"font-size:11.5pt\">at <\/span><\/span><\/span><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">telephone <\/span><\/span><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">numbers (02) 927-2031 log on to <\/span><\/span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"http:\/\/www.paqasa.dost.qov.ph\/\"><span style=\"font-size:10.5pt\"><span style=\"color:#1a5287\">www.paqasa.dost.qov.ph.<\/span><\/span><\/a><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\nSGD.<br \/>\r\n<strong>JUANITO S. GALANG<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2022-12-22",
                    "created_at": "2022-12-22 14:49:19",
                    "updated_at": "2022-12-22 14:49:19",
                    "deleted_at": null
                }, {
                    "id": 125,
                    "tags": "28 October - 02 November 2022",
                    "title": "SPECIAL WEATHER OUTLOOK FOR UNDAS 2022",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">TC \u201c<\/span><\/span><\/strong><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PAENG\u201d<\/span><\/span><\/strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"> and the <strong>Northeast Monsoon<\/strong> will be the dominant weather systems to affect the entire archipelago during the \u201c<strong>Undas\u201d <\/strong>event. <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Cloudy skies with occasional to frequent rains over the eastern section of Luzon, Visayas and Mindanao as <strong>\u201cPAENG\u201d<\/strong> moves closer to landmass of Eastern Visayas \u2013 Bicol region today <strong>(October 28)<\/strong> becoming stormy weather tomorrow and Sunday <strong>(October 29-30)<\/strong> as it traverses the Central and Southern Luzon including Metro Manila. <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">On Monday next week <strong>(October 31),<\/strong> Luzon will still have occasional to frequent rains becoming stormy over Northern Luzon as \u201c<strong>PAENG\u201d<\/strong> continuous to move northward towards Taiwan area. Gradual improvement of weather on Tuesday <strong>(November 01)<\/strong> as \u201c<strong>PAENG\u201d<\/strong> move farther away from the landmass of Luzon. <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Floods and landslides are expected in low lying and in mountainous areas respectively.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Sea travel is risky over Southern Luzon-Visayas area particularly before and during the passage of \u201cPAENG\u201d starting today and over the seaboards of Northern and Central Luzon beginning Sunday (October 30 until November 02).<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">This weather outlook will be updated if significant changes in weather occurs. For more information, please contact the Weather Division at telephone number (02) 8926-4258 or log on to <\/span><\/span><a href=\"www.bagong.pagasa.gov.ph\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">bagong.pagasa.gov.ph<\/span><\/span><\/a><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\nSGD.<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">JUANITO S. GALANG<\/span><\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Chief, Weather Division<\/span><\/span><\/span><\/span><\/span><br \/>",
                    "type": "0",
                    "published_at": "2022-10-28",
                    "created_at": "2022-10-28 13:50:00",
                    "updated_at": "2022-10-28 13:50:00",
                    "deleted_at": null
                }, {
                    "id": 112,
                    "tags": "2022 National Elections",
                    "title": "SPECIAL WEATHER OUTLOOK  2022 NATIONAL ELECTION",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">The dominant weather system to affect the country during the conduct of National Election will be the Intertropical Convergence Zone (ITCZ).<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">Eastern Visayas and Mindanao will be generally cloudy skies with rainshowers and thunderstorms caused by the oscillation of the ITCZ. The rest of the country will have warm and humid weather conditions apart from isolated afternoon or evening rainshowers and thunderstorms.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">Light to Moderate winds coming from the east and southeast will prevail over Luzon becoming light easterly to variable over Visayas and Mindanao. The coastal waters will be slight to moderate. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">This weather outlook will be updated if significant changes in weather occurs. For more information please contact the Weather Division at telephone number (02) 8926-4258 or log on to www.bagong.pagasa.gov.ph<\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">Sgd.<\/span><\/span><br \/>\r\n<strong><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\"><span style=\"color:#22313f\">JUANITO S. GALANG<\/span><\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\"><span style=\"background-color:#f8f8f8\">OIC, Weather Division<\/span><\/span><\/span>",
                    "type": "0",
                    "published_at": "2022-05-06",
                    "created_at": "2022-05-06 09:09:07",
                    "updated_at": "2022-05-06 10:04:24",
                    "deleted_at": null
                }, {
                    "id": 111,
                    "tags": "Labor Day Special Weather Outlook",
                    "title": "LABOR DAY SPECIAL WEATHER OUTLOOK",
                    "image_path": "",
                    "description": "<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">The development of low pressure system embedded along of the Intertropical Convergence Zone (ITCZ) will be the dominant weather system to affect the southern part of the country on Labor Day.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">Mindanao will be mostly cloudy skies with scattered rainshowers and thunderstorms while Metro Manila and the rest of the country will have warm and humid weather condition apart from afternoon or evening rainshowers and thunderstorms.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">This weather outlook will be updated if significant changes in weather occurs. For more information please contact the Weather Division at telephone number (02) 8926-4258 or log on to <\/span><\/span><a href=\"https:\/\/bagong.pagasa.dost.gov.ph\"><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">www.bagong.pagasa.gov.ph<\/span><\/span><\/a><\/span><\/span><\/p>\r\n\r\n<p><br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#f8f8f8; color:#22313f; font-size:14px\">Sgd.<\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">JUANITO S. GALANG<\/span><\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"background-color:#f8f8f8\">OIC, Weather Division<\/span><\/span><\/span><\/p>",
                    "type": "0",
                    "published_at": "2022-05-01",
                    "created_at": "2022-04-29 14:04:48",
                    "updated_at": "2022-04-29 14:06:54",
                    "deleted_at": null
                }, {
                    "id": 81,
                    "tags": "IMPLEMENTING RULES AND REGULATIONS OF REPUBLIC ACT NO. 10692, OTHERWISE KNOWN AS THE PAGASA MODERNIZATION ACT 2015",
                    "title": "IMPLEMENTING RULES AND REGULATIONS OF REPUBLIC ACT NO. 10692, OTHERWIS",
                    "image_path": "",
                    "description": "Persuant to Section 14 of Republic Act No. 10692, An Act Providing for the Modernization of the Philippines Atmospheric, Geophysical and Astronomical Services Administration (PAGASA), Providing Funds Therefore and for Other Purposes, the Department of Science and Technology, the Philippines Atmospheric, Geophysical and Astronomical Services Administration (PAGASA) and the Department of Budget and Management (DBM), hereby jointly issue the following rules and regulations to implement the provisions of the aforesaid law. <a href=\"https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/IRR_RA_10692_PAGASA_Modernization_Act_of_2015_signed.pdf\">Continue Reading.<\/a>",
                    "type": "0",
                    "published_at": "2021-02-11",
                    "created_at": "2021-02-11 11:33:22",
                    "updated_at": "2021-02-11 11:33:22",
                    "deleted_at": null
                }, {
                    "id": 80,
                    "tags": "FEAST OF BLACK NAZARENE",
                    "title": "SPECIAL WEATHER OUTLOOK DURING THE FEAST OF BLACK NAZARENE 2021",
                    "image_path": "",
                    "description": "The weather systems that will affect most parts of the country during the feast of Black Nazarene are the Northeast monsoon and the southward migration of the tail-end of cold front.<br \/>\r\n<br \/>\r\nDuring the outlook period, the eastern section of Luzon, Visayas and Mindanao will be generally cloudy skies with rainshowers becoming frequent over Bicol region and Eastern Visayas by Saturday and Sunday (Jan 9 & 10). Flash floods and landslides are expected.<br \/>\r\n<br \/>\r\nMetro Manila will be mostly cloudy with passing light rains. Forecast range of temperature between 22 to 31 degrees Celsius with moderate winds coming from the northeast and Manila Bay will be moderate.<br \/>\r\n<br \/>\r\nThe rest of Luzon will have partly cloudy skies apart from isolated passing light rains.<br \/>\r\n<br \/>\r\nNo tropical cyclone formation is expected within the Philippine Area of Responsibility during the outlook period<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes occur.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8926-4258 log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\nSgd.<br \/>\r\nSAMANTHA CHRISTINE V. MONFERO<br \/>\r\nOfficer-In-Charge, Weather Division",
                    "type": "0",
                    "published_at": "2021-01-07",
                    "created_at": "2021-01-07 10:35:25",
                    "updated_at": "2021-01-15 09:16:33",
                    "deleted_at": null
                }, {
                    "id": 68,
                    "tags": "SPECIAL WEATHER OUTLOOK DURING THE OBSERVANCE OF SEMANA SANTA",
                    "title": "Special Weather Outlook During the Observance of Semana Santa",
                    "image_path": "",
                    "description": "8 April 2020<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>SPECIAL WEATHER OUTLOOK DURING THE OBSERVANCE OF SEMANA SANTA <\/strong>(April 8 - 11, 2020)<br \/>\r\n<br \/>\r\n<br \/>\r\nBatanes and Cagayan will experience partly cloudy to cloudy skies with isolated light rains from April 8 to 10 due to the northeasterly surface wind flow. On April 11 as the northeasterly surface windflow weakens, the aforementioned provinces will have generally fair weather conditions apart from some isolated rainshowers associated with localized thunderstorms.<br \/>\r\n<br \/>\r\nThe rest of the country will continue to experience warm and humid weather throughout the outlook period, with chances of isolated rainshowers due to localized thunderstorms mostly over the provinces on the eastern section.<br \/>\r\n<br \/>\r\nModerate to occasionally strong winds coming from the northeast will prevail over Extreme Northern Luzon and the coastal waters along this area will be moderate to occasionally rough. Elsewhere, winds will be light to moderate from the east to northeast with slight to moderate sea.<br \/>\r\n<br \/>\r\nNo tropical cyclone is expected during the outlook period. This weather outlook will be updated if significant changes in weather occurs. For more information please contact the Weather Division at telephone number (02) 8926-4258 or log on to www.bagong.pagasa.gov.ph<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>VICENTE P. PALCON JR.<\/strong><br \/>\r\nOIC, Weather Division",
                    "type": "0",
                    "published_at": "2020-04-08",
                    "created_at": "2020-04-08 17:07:31",
                    "updated_at": "2020-04-08 17:07:31",
                    "deleted_at": null
                }, {
                    "id": 64,
                    "tags": "Feast of Black Nazarene",
                    "title": "Special Weather Outlook for the Feast of Black Nazarene",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">8 January 2020<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">SPECIAL WEATHER OUTLOOK FOR <\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">THE FEAST OF THE BLACK NAZARENE<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">(8 - 10 January 2020)<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Today until Friday, Metro Manila will have partly cloudy to cloudy skies with chances of passing light rains. Throughout the outlook period, winds will be light to moderate coming from the northeast to east and forecast temperatures will range from 23 to 31\u00b0C.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">PAGASA will continue to monitor and inform the public of any significant changes in the weather.  <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">For more information, please contact the forecaster on duty of the Weather Division at telephone number (02) 8927-2031 or log on to <\/span><\/span><a href=\"http:\/\/www.pagasa.dost.gov.ph\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:blue\">bagong.pagasa.dost.gov.ph<\/span><\/span><\/span><\/a><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">ESPERANZA O. CAYANAN, Ph.D.<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Chief, Weather Division<\/span><\/span>",
                    "type": "0",
                    "published_at": "2020-01-08",
                    "created_at": "2020-01-08 09:43:59",
                    "updated_at": "2020-01-08 09:43:59",
                    "deleted_at": null
                }, {
                    "id": 59,
                    "tags": "Adoption of the PAGASA ENSO ALERT AND WARNING SYSTEM",
                    "title": "Adoption of the PAGASA ENSO ALERT AND WARNING SYSTEM",
                    "image_path": "",
                    "description": "The ENSO Alert and Warning System aims to increase understanding among concerned national and local government agencies, the private sector, academia, research and general public; and to heighten awareness in the user community when El Ni\u00f1o\/La Ni\u00f1a event exists or might develop so preparedness measures should be initiated.<br \/>\r\n<br \/>\r\nThis serves as guidance in the formulation and implementation of National El Ni\u00f1o\/La Ni\u00f1a Contingency Plan.<br \/>\r\n<br \/>\r\nEffective Date: October 24, 2019<br \/>\r\n<br \/>\r\n<a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/PAGASA_MEMO_-_Adoption_of_the_PAGASA_ENSO_ALERT_AND_WARNING_SYSTEM.pdf\">See Original<\/a>",
                    "type": "0",
                    "published_at": "2019-10-21",
                    "created_at": "2019-11-05 11:46:06",
                    "updated_at": "2019-11-05 12:07:22",
                    "deleted_at": null
                }, {
                    "id": 58,
                    "tags": "\"UNDAS 2019\" SPECIAL WEATHER OUTLOOK",
                    "title": "\"UNDAS 2019\" SPECIAL WEATHER OUTLOOK",
                    "image_path": "",
                    "description": "31 Oct - 03 Nov<br \/>\r\n<br \/>\r\n<br \/>\r\nThe dominant weather systems that will affect the celebration of All Saint's Day \"Undas\" are the Northeast Monsoon and the Low Pressure Area (LPA) east of Mindanao embedded along the Intertropical Convergence Zone (ITCZ), Cagayan Valley and Aurora Province will have occasional light rains, while the rest of Northern and Central Luzon including Metro Manila will experience partly cloudy to cloudy skies with isolated light rains from Friday until Sunday (01-03 Nov) due to the southward migration of Northeast Monsoon. Meanwhile, Southern Luzon, Visayas and Mindanao will be cloudy with scattered to widespread rainshowers and thunderstorms during the forecast period due to the expected approach of the LPA over southern Philippines.<br \/>\r\n<br \/>\r\nModerate to strong winds coming from the northeast is expected to prevail over northern and central Luzon with moderate to rough coastal waters. Elsewhere, winds will be light to moderate coming from the east to northeast with slight to moderate seas.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecasters on duty of the Weather Division at telephone numbers (02) 8926-4258 or (02) 8927-1335 or log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nsigned<br \/>\r\n<strong>ESPERANZA O. CAYANAN, Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2019-10-30",
                    "created_at": "2019-10-30 13:21:16",
                    "updated_at": "2019-10-30 13:21:16",
                    "deleted_at": null
                }, {
                    "id": 49,
                    "tags": "Special Weather Outlook on Independence Day Celebration",
                    "title": "SPECIAL WEATHER OUTLOOK ON INDEPENDENCE DAY CELEBRATION",
                    "image_path": "",
                    "description": "11-12 June 2019<br \/>\r\n<br \/>\r\n<br \/>\r\nOn June 11 and 12, a gradual shift of the prevailing wind from southeasterly to southwesterly is expected to bring early morning or afternoon rainshowers and thunderstorms over the western section of Luzon including the National Capital Region (NCR). The rest of the country will have partly cloudy to cloudy skies aside from afternoon rainshowers or thunderstorms. Winds will be moderate to occasionally waters along these areas will be moderate to occasionally rough. Elsewhere, winds will be light to moderate from the south to southwest with slight to moderate seas.<br \/>\r\n<br \/>\r\nNo tropical cyclone is expected to affect the country during the period. However, this outlook will be as soon as significant changes in the weather pattern occur. For more information, you may contact the Weather Division at telephone numbers 929-4570 and 927-1335 or log on to <a href=\"http:\/\/bagong.pagasa.dost.gov.ph\">bagong.pagasa.dost.gov.ph<\/a>.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nsigned<br \/>\r\n<strong>ESPERANZA O. CAYANAN Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2019-06-06",
                    "created_at": "2019-06-06 11:43:58",
                    "updated_at": "2019-06-06 16:31:45",
                    "deleted_at": null
                }, {
                    "id": 48,
                    "tags": "SPECIAL WEATHER OUTLOOK ON OPENING OF SCHOOL CLASSES",
                    "title": "SPECIAL WEATHER OUTLOOK ON OPENING OF SCHOOL CLASSES",
                    "image_path": "",
                    "description": "03 June 2019<br \/>\r\n<br \/>\r\n<br \/>\r\nThe oscillation of the Intertropical Convergence Zone (ITCZ) is expected to affect Mindanao in the next 5 days.<br \/>\r\n<br \/>\r\nOn the opening of classes, Monday, 03 June 2019, mostly cloudy skies with scattered rainshowers and thunderstorms will be experienced over Mindanao. The rest of the country including Metro Manila will have partly cloudy to cloudy skies with afternoon or evening rainshowers and thunderstorms.<br \/>\r\n<br \/>\r\n<br \/>\r\nLight easterly and southeasterly winds will prevail throughout the archipelago and the coastal waters will be slight except during thunderstorms.<br \/>\r\nNo tropical cyclone is expected to affect the country in the next 5 days.<br \/>\r\n<br \/>\r\n<br \/>\r\nThis weather outlook will be updated as soon as significant changes in the weather pattern occur.<br \/>\r\n<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to www.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nsigned<br \/>\r\n<strong>ESPERANZA O. CAYANAN<\/strong><br \/>\r\n<strong>Chief, Weather Division<\/strong><br \/>\r\n<br \/>\r\n<br \/>\r\n<a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/tamss\/weather\/classesoutlook.pdf\"><strong>ARTICLE IN PDF<\/strong><\/a>",
                    "type": "0",
                    "published_at": "2019-05-31",
                    "created_at": "2019-05-31 18:48:29",
                    "updated_at": "2019-05-31 18:48:29",
                    "deleted_at": null
                }, {
                    "id": 46,
                    "tags": "SPECIAL WEATHER OUTLOOK FOR ELECTION DAY",
                    "title": "SPECIAL WEATHER OUTLOOK FOR ELECTION DAY (May 13, 2019)",
                    "image_path": "",
                    "description": "10 May 2019<br \/>\r\n<br \/>\r\nThe weather system that will affect the Philippine archipelago towards the Election Day is the approaching Low Pressure Area (LPA) over Visayas and Mindanao embedded in the Intertropical Convergence Zone (ITCZ).<br \/>\r\n<br \/>\r\nToday until Saturday (May 10-11), the whole country will have partly cloudy to cloudy skies with rainshowers and thunderstorms, mostly in the afternoon or evening, especially over the Cordillera Administrative Region (CAR), which may cause flash floods and\/or landslides in high risk areas.<br \/>\r\n<br \/>\r\nOn Sunday (May 12) and Monday (May 13, election day), Visayas and Mindanao will be affected by ITCZ, which will bring cloudy skies with scattered rainshowers and thunderstorms. Meanwhile, Luzon will have partly cloudy to cloudy skies with afternoon rainshowers or thunderstorms especially over the CAR.<br \/>\r\n<br \/>\r\nLight southwesterly to westerly winds will prevail over Palawan, Visayas and Mindanao while light winds blowing from the southwest and southeast is expected over the rest of Luzon. The coastal waters will be slight except during thunderstorms.<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>ESPERANZA O. CAYANAN<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2019-05-10",
                    "created_at": "2019-05-10 10:36:24",
                    "updated_at": "2019-05-10 10:36:24",
                    "deleted_at": null
                }, {
                    "id": 45,
                    "tags": "Participants  in the Meteorological Technicians Training Course (MTTC)",
                    "title": "Participants  in the Meteorological Technicians Training Course (MTTC)",
                    "image_path": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/5ccba9ede0a43_5ccba9ede0ae9.PNG",
                    "description": "<strong>29 April 2019<\/strong><br \/>\r\n<br \/>\r\nSUBJECT: <strong>Participants in the Meteorological Technicians Training Course (MTTC)<\/strong><br \/>\r\n<br \/>\r\nThe following have been accepted to undergo the Meteorological Technicians Training Course (MTTC), scheduled on 06 May \u2013 14 October 2019:<br \/>\r\n<br \/>\r\n<strong>PAGASA Employees<\/strong><br \/>\r\n1. Famitangco, Dojie M.<br \/>\r\n<br \/>\r\n<strong>Non PAGASA<\/strong><br \/>\r\n1. Acidre, Paul John<br \/>\r\n2. Albay, Jayson<br \/>\r\n3. Alsonado Angelo<br \/>\r\n4. Almario, Agnes<br \/>\r\n5. Bautista, Jonalyn<br \/>\r\n6. Bicolura, Cleo<br \/>\r\n7. Bucsit, Peter Paul<br \/>\r\n8. Burce, Hansel<br \/>\r\n9. Cabasag, Jhonny<br \/>\r\n10. Carbonel, Micha Ela<br \/>\r\n11. Collano, Teodorico Jr.<br \/>\r\n12. Cultura, Romer James<br \/>\r\n13. Diongon, Jan Michael<br \/>\r\n14. Dumanig, Dhina<br \/>\r\n15. Farro, Shaun Rodney<br \/>\r\n16. Gabaldon, Christian Mikko<br \/>\r\n17. Garamay, Melissa Claire<br \/>\r\n18. Garcia, Miguel Adrian<br \/>\r\n19. Judaya Charfel<br \/>\r\n20. Lopez, Joseph Marvin<br \/>\r\n21. Marcelino, Leandro<br \/>\r\n22. Nonato, Riva Marie<br \/>\r\n23. Panolino, Eduard<br \/>\r\n24. Quiba, Donking Mcloud<br \/>\r\n25. Reyes, Joe Mari<br \/>\r\n26. Sales, John Clarence Nino<br \/>\r\n27. Tabarra, Ledrick<br \/>\r\n28. Tabios, Evan<br \/>\r\n29. Tambong, Reynaldo<br \/>\r\n30. Tierra, Maria Czarina<br \/>\r\n31. Valencia, Alvin<br \/>\r\n32. Vega, Donald<br \/>\r\n33. Vergara, Dhann Collin Davies<br \/>\r\n34. Villagonzalo, John Jerome<br \/>\r\n35. Villalon, Christian<br \/>\r\n36. Villamor, Sheena Marie<br \/>\r\n37. Villanueva, Joshua<br \/>\r\n<br \/>\r\n<strong>Philippine Navy<\/strong><br \/>\r\n1. ENS Orven Dare Montenegro<br \/>\r\n2. S2BM Mary Ann Avinante<br \/>\r\n<br \/>\r\nIn view of this order, that PAGASA personnel listed above are hereby relieved of their duties in their respective offices and temporarily re-assigned at the Training and Public Information Section(TPIS) from 8:00 AM-5:00 PM for the duration of the training course. Concerned Division Chiefs\/OICs at the Central Office and Heads of Field Stations are directed to institute necessary steps to prevent disruption of the essential services due to the attendance of some of their personnel to the aforementioned training.<br \/>\r\n<br \/>\r\nAll participants are directed to report for the start of the training on 06 May 2019, 8:00 AM at the WMO\/PAGASA Regional Training Centre, 2nd-floor PAGASA Central Office, Science Garden Complex, Agham Rd., Diliman, Quezon City. Compulsory and punctual attendance is enjoined.<br \/>\r\n<br \/>\r\n<br \/>\r\n<em>(Original Signed)<\/em><br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator<br \/>\r\n<br \/>\r\n<br \/>\r\n<a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/tamss\/weather\/mttcpasser.pdf\" target=\"_blank\">Article in PDF<\/a>",
                    "type": "0",
                    "published_at": "2019-04-29",
                    "created_at": "2019-05-03 10:35:43",
                    "updated_at": "2019-05-06 08:11:47",
                    "deleted_at": null
                }, {
                    "id": 44,
                    "tags": "WEATHER OUTLOOK FOR \"SEMANA SANTA\"",
                    "title": "WEATHER OUTLOOK FOR \"SEMANA SANTA\"",
                    "image_path": "",
                    "description": "(April 15-21, 2019)<br \/>\r\n<br \/>\r\n<br \/>\r\nThe easterlies will be the dominating weather system to affect the entire archipelago during the celebration of <strong>SEMANA SANTA.<\/strong><br \/>\r\n<br \/>\r\nToday until Wednesday ( April 15- 17), the whole country will have warm and humid weather condition apart from scattered rainshowers and thunderstorms in the afternoon particularly over Northern and Central Luzon.<br \/>\r\n<br \/>\r\nOn Maundy Thursday until Easter Sunday (April 18-21), mostly cloudy skies with scattered rainshowers and thunderstorms will prevail over Visayas and Mindanao due to Easterlies. The rest of the country will have warm and humid weather condition apart from passing isolated rainshowers and thunderstorms in the afternoon.<br \/>\r\n<br \/>\r\nLight to moderate winds will be coming from the east and southeast with slight to moderate coastal waters.<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>RENITO B. PACIENTE<\/strong><br \/>\r\nOfficer-In-Charge, Weather Division<br \/>",
                    "type": "0",
                    "published_at": "2019-04-15",
                    "created_at": "2019-04-15 14:06:09",
                    "updated_at": "2019-04-15 14:06:09",
                    "deleted_at": null
                }, {
                    "id": 38,
                    "tags": "15 January 2019",
                    "title": "OFFICIAL STATEMENT OF DOST-PAGASA ON THE HEAVY RAINFALL EVENT ASSOCIAT",
                    "image_path": "",
                    "description": "This is to clarify claims of \u201cwrong forecasts and late warnings\u201d on the heavy rainfall event associated with Tropical Depression (TD) Usman as alleged by the following:<br \/>\r\n<br \/>\r\n<br \/>\r\n1. Dr. Mahar Lagmay on his Facebook account dated 04 January 2019 entitled, \u201c<em>Simpleng analysis kung bakit maraming namatay sa Bicol dahilsa #UsmanPH\u201d<\/em>, further quoted by different media sources, as follows:\r\n<div style=\"margin-left:40px; margin-top:20px\"><em>\"Ang forecast noong December 28-29, 2018 ay moderate (light blue) to heavy (dark blue) rainfall sa Bicol (<a href=\"https:\/\/www.rappler.com\/nation\/special-coverage\/weather-alert\/219857-tropical-depression-usman-pagasa-forecast-december-28-2018-11pm\">Rappler 2018<\/a>). Ang totoong nangyari ay intense (yellow) to torrential (red) ang pinakamalalakas na ulan. Malaki ang diperensiya nito, lalung-lalo na dahilang sukat ng moderate (2.5-7.5 mm\/hr), heavy (7.5-15 mm\/hour), intense (15-30 mm\/hour) at torrential (>30 mm\/hour) ay kada oras. Tumagal ng ilang mga oras ang intense at torrential rainfall sa Bicol.\u201d<\/em><\/div>\r\n<br \/>\r\nIn response, although his above-stated definition is correct in terms of PAGASA\u2019s hourly rainfall intensity classification as per PAGASA Memorandum dated 20 June 2012, PAGASA defines moderate and heavy rainfall in its Severe Weather Bulletins (SWBs) <strong>as 24-hour (daily) accumulated rainfall of 60 to 180 mm and more than 180 mm, respectively. <\/strong>The forecasts for 28 \u2013 29 December 2018 indicated the \u201cforecast 24-hour accumulated rainfall\u201d of moderate to heavy, which would trigger flooding, and landslides. Verification of the observed 24-hour accumulated rainfall values for Bicol area showed that the amount falls within the moderate to heavy categories, as forecasted.<br \/>\r\n<br \/>\r\n2. For the segment <em>\u201cWeather Forecast\u201d<\/em> of the TV show \u201cFailon Ngayon\u201d aired on 12 January 2019, as follows:\r\n\r\n<div style=\"margin-left:40px; margin-top:20px\"><em>\u201cNang aming balikan ang mga forecast ng PAGASA, tanging Quezon at Visayas lamang ang binigyan ng Heavy Rainfall Warning nung gabi bago tumama ang bagyong Usman at Southern Quezon lamang ang may Yellow Heavy Rainfall Warning kinabukasan. Ang tanging Heavy Rainfall Warning at General Flood Advisory naapektado ang Bicol Area ay inilabas alas sais na ng gabi.\u201d \u2013 Ted Failon<\/em><\/div>\r\n<br \/>\r\nIn response, supplemental to the issuance of SWBs, the Southern Luzon PAGASA Regional Services Division (SLPRSD) at Legazpi City, Albay also issued separate color-coded Heavy Rainfall Warnings (HRWs) that covered hourly and 3-hourly rainfall forecast over Bicol Area. The first Heavy Rainfall Warning issued for TD Usman by SLPRSD was a Yellow Warning for Sorsogon at 2PM on 28 December 2018. Albay, where disastrous landslides occurred, was placed under Yellow Warning at 7PM on 28 December 2018. This was further elevated into an Orange Warning at 8PM and later a Red Warning at 11PM of the same day. These warnings, especially those of higher levels, are indicative of the need for <em>\u201cemergency\u201d<\/em> actions.\r\n\r\n<div style=\"margin-left:40px; margin-top:20px\"><em>\"Yun ang problema eh, from Number 1 downgrade naman sila to Tropical Depression and Low Pressure\u2026 Yun ang nakalito sa mga tao. [sic]\u201d \u2013 Mariano San Felipe Jr., Municipal Administrator, Sag\u0148ay, Camarines Sur<\/em><\/div>\r\n<br \/>\r\nBased on available meteorological data at that time, TD Usman has weakened into a Low Pressure Area at landfall, which led to the lifting of Tropical Cyclone Warning Signal #1. However, this does not imply that weather will rapidly improve and the threat of flooding and landslides are immediately reduced. In the Final SWB issued at 8AM on 29 December 2018, PAGASA stated that moderate to heavy rains will continue over Bicol Region in the next 24 hours. This was reiterated in the Weather Advisory for LPA and Tail-end of Cold Front issued at 11AM of the same day.<br \/>\r\n<br \/>\r\nTropical Cyclone Warning Signal System, which has been in effect since 1930s, is based <strong>solely on expected winds and its impacts over a locality<\/strong>, and <strong>has no relation with the accompanying rainfall<\/strong> of such tropical cyclone (TC). However, PAGASA has always emphasized the threat of heavy rains and other hydrometeorological hazards and its impacts associated with each TC in it's HRWs and SWB.<br \/>\r\n<br \/>\r\n<em>PAGASA had ensured that warnings and pertinent information were disseminated to disaster managers at the national and local levels.<\/em><br \/>\r\n<br \/>\r\nIn addition to the regular issuances of SWBs and HRWs, among other warnings and information, during the Pre-Disaster Risk Assessment (PDRA) at the national and local level, PAGASA warned the DRRMOs\/NDRRMC of prolonged heavy rainfall over areas to be affected by TD Usman, which could trigger flooding and landslides. It was also emphasized that rainfall over the past week made the soil very saturated, and even light to moderate rains could still trigger landslides in mountainous areas. Mines and Geoscience Bureau (MGB)had provided a list of areas with very high-high risk of floods and landslides during the PDRA.<br \/>\r\n<br \/>\r\nThe hardworking men and women of PAGASA remains committed to their mission of delivering reliable and relevant weather-related information, products and services to develop communities resilient to, among others, hydro-meteorological hazards during extreme weather events.<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator",
                    "type": "0",
                    "published_at": "2019-01-16",
                    "created_at": "2019-01-16 17:54:27",
                    "updated_at": "2019-01-17 08:54:52",
                    "deleted_at": null
                }, {
                    "id": 36,
                    "tags": "(December 31, 2018 \u2013 January 1, 2019)",
                    "title": "WEATHER OUTLOOK FOR NEW YEAR 2019",
                    "image_path": "",
                    "description": "On December 31, Tropical Depression \u201cUSMAN\u201d will be outside the Philippine Area of Responsibility (PAR). However, its trough will bring cloudy skies with scattered rainshowers and thunderstorms over Palawan. The TD will also enhance the Northeast Monsoon over Luzon, bringing cloudy skies with light rains over Cagayan Valley, Cordillera Administrative Region, and the provinces of Aurora and Quezon. The rest of Luzon including Metro Manila will have an improved weather apart from isolated light rains while Visayas and Mindanao will experience partly cloudy to cloudy skies with localized thunderstorms.<br \/>\r\n<br \/>\r\nOn New Year\u2019s Day, January 1, Cagayan Valley and Cordillera will remain cloudy with light rains due to the Northeast Monsoon. The rest of the country will have fair weather conditions except for some isolated rainshowers.<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to bagong.pagasa.dost.gov.ph.",
                    "type": "0",
                    "published_at": "2018-12-30",
                    "created_at": "2019-01-07 08:53:59",
                    "updated_at": "2019-01-07 08:53:59",
                    "deleted_at": null
                }, {
                    "id": 35,
                    "tags": "CHRISTMAS 2018",
                    "title": "WEATHER OUTLOOK FOR CHRISTMAS 2018",
                    "image_path": "",
                    "description": "(December 24-25, 2018)<br \/>\r\n<br \/>\r\n<br \/>\r\nOn December 24, the Low Pressure Area (LPA) which originated east of Mindanao is expected to move westward towards the West Philippine Sea. Its interaction with the tail-end of a cold front will bring moderate to occasionally heavy rains over Cagayan Valley and the provinces of Aurora and Quezon. The rest of Luzon including Metro Manila will have mostly cloudy skies with light rains while Visayas and Mindanao will be partly cloudy to cloudy apart from localized thunderstorms.<br \/>\r\n<br \/>\r\nOn Christmas Day, December 25, the trough of LPA over the West Philippine Sea will bring cloudy skies scattered rainshowers over Mindoro provinces and Palawan. The Northeast Monsoon will also affect extreme Northern Luzon, bringing cloudy skies with light rains. Metro Manila and the rest of Luzon will have fair weather conditions apart from isolated light rains while the rest of the country will experience partly cloudy to cloudy skies with isolated rainshowers and thunderstorms.<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>ESPERANZA O. CAYANAN, Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2018-12-21",
                    "created_at": "2018-12-21 16:20:18",
                    "updated_at": "2018-12-21 16:26:42",
                    "deleted_at": null
                }, {
                    "id": 34,
                    "tags": "ISO",
                    "title": "Weather Division is now  ISO 9001:2015 Certified",
                    "image_path": "",
                    "description": "Proof has been furnished by means of an audit that the requirements of ISO 9001:2015 are met.",
                    "type": "0",
                    "published_at": "2018-11-19",
                    "created_at": "2018-12-03 11:28:42",
                    "updated_at": "2018-12-03 11:28:42",
                    "deleted_at": null
                }, {
                    "id": 33,
                    "tags": "UNDAS 2018",
                    "title": "WEATHER OUTLOOK FOR \"UNDAS\"",
                    "image_path": "",
                    "description": "(October 31 - November 4, 2018)<br \/>\r\n<br \/>\r\n<br \/>\r\nThe northern Luzon will have occasional light to moderate rains today and tomorrow (Oct. 31-Nov. 01) caused by the rear cloud band of Severe Tropical Storm ROSITA and tail-end of cold front. Likewise, Southern Luzon, Visayas and Mindanao will have light to occasionally moderate rains associated with the southward migration of the tail-end of cold front (shear line) on (Nov 2-4). The rest of the country will have good weather condition apart from isolated passing light rains.<br \/>\r\n<br \/>\r\nSea travel along the seaboards of Northern Luzon is risky due to big waves associated with Severe Tropical Storm <strong>ROSITA<\/strong> while the rest of the country will have slight to moderate coastal waters.<br \/>\r\n<br \/>\r\nFor more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>ESPERANZA O. CAYANAN, Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "0",
                    "published_at": "2018-10-31",
                    "created_at": "2018-10-31 11:17:25",
                    "updated_at": "2019-01-16 12:04:32",
                    "deleted_at": null
                }],
                "PressRelease": [{
                    "id": 134,
                    "tags": "In its continuing effort to mitigate flood disasters in the country, DOST-PAGASA launches an addition to its current \u201cfleet\u201d of Flood Early Warning Systems (FEWS).",
                    "title": "\u200b\u200b\u200b\u200b\u200b\u200b\u200bPAGASA LAUNCHES SECOND PHASE OF FLOOD EARLY WARNING SYSTEMS IN",
                    "image_path": "",
                    "description": "<strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">DOST-PAGASA S&T Media Release<\/span><\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Cebu City<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">In its continuing effort to mitigate flood disasters in the country, DOST-PAGASA launches an addition to its current \u201cfleet\u201d of Flood Early Warning Systems (FEWS). The FEWS is under the project officially entitled <strong>\u201cStrengthening the Capability of the Republic of the Philippines on Disaster Risk Reduction\u201d<\/strong>, a grant from the National Disaster Management and Research Institute (NDMI) of the government of South Korea.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Following the successful implementation in Toledo City and Dumanjug in 2022, the second phase will be in Danao and Argao, also in the province of Cebu as the target areas.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Before the actual implementation of the said phase, a formal signing of the Memorandum of Agreement (MOA) between the DOST-PAGASA and the NDMI will be held at the PAGASA Head Office in Quezon City today 25 April 2023.<br \/>\r\n<br \/>\r\nNDMI is the same Korean agency that supported a similar FEWS project in Cagayan de Oro after the flood disaster in 2011 due to Typhoon Sendong, where about a thousand people perished.<br \/>\r\n<br \/>\r\nAfter the MOA signing, the PAGASA and Korean Experts will conduct joint field works in the identified project areas. This activity will comprise site surveys for the proposed automatic gauging and warning stations and baseline data gathering for preliminary hydrological assessments.<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Other activities in the six-month implementation period include hydrological surveys employing the latest technologies; installation of state-of-the-art equipment; commissioning and testing; information and education campaigns, flood drills, and mini-trainings, which will complete the package for the said project.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">For more information, you may contact or call <strong>Engr. Roy A. Badilla<\/strong>, Chief Hydrometeorology Division at the telephone number (02) 8284-0800 local 4826.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><br \/>\r\n<span style=\"font-size:12.0pt\">Administrator<\/span>",
                    "type": "2",
                    "published_at": "2023-04-25",
                    "created_at": "2023-04-25 15:05:07",
                    "updated_at": "2023-04-25 15:25:01",
                    "deleted_at": null
                }, {
                    "id": 133,
                    "tags": "Partial Solar Eclipse",
                    "title": "Hybrid Solar Eclipse-Visible as Partial Solar Eclipse in Philippines",
                    "image_path": "",
                    "description": "<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">On April 20, 2023, the Moon will pass in front of the Sun, resulting in a HYBRID SOLAR ECLIPSE that can be seen in Western Australia, East Timor, and Eastern Indonesia (West Papua). A Hybrid Solar Eclipse combines an Annular and a Total Solar Eclipse. For observers in various locations along the eclipse's path, it can produce a variety of events. In the beginning, people in the path of the eclipse may see a partial solar eclipse, an annular solar eclipse, or a brief \"ring of fire\". Then, during the Hybrid Solar Eclipse\u2019s middle phase, they may see a total solar eclipse, after which it will change back to an annular solar eclipse, then to a partial solar eclipse, before the eclipse ends.<br \/>\r\n<br \/>\r\n<strong>The Totality of Hybrid Solar <\/strong>Eclipse cannot <span style=\"color:#0a0a0a\">be <\/span>observed from Manila. However, it can be seen <strong>as a PARTIAL SOLAR ECLIPSE, with maximum eclipse obscuration at 23.7\u00b0<\/strong>. The partial solar eclipse begins at 11:44 AM, with the maximum eclipse occurring at 12:55 PM and comes to an end at 2:04 PM. Elsewhere in the Philippines, the Partial Solar Eclipse can be observed with a minimum obscuration of 12% to the north (Basco, Batanes) and a maximum obscuration of 58% to the south (Balut Island-Municipality of Sarangani).<br \/>\r\n<br \/>\r\nThe entire Philippines will be able to see the Partial Solar Eclipse, as well as Southeast Asia, the East Indies, Australia, Solomon Islands, Vanuatu, Papua New Guinea, and New Zealand.<br \/>\r\n<br \/>\r\nAlong with details of the eclipse\u2019s circumstances, the Partial Solar Eclipse can be seen in these chosen areas:<\/span><\/span><\/p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:solid #282328 1.0pt; margin-left:11.1pt\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Location<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Partial Eclipse Begins<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Maximum Eclipse<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Partial Eclipse Ends<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">%<br \/>\r\n\t\t\tObscuration<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:57.05pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><br \/>\r\n\t\t\t<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Duration of Partiality<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Basco Batanes<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:09:00.4 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1:05:42.3 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:00:49.1 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12.0<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.15pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1h 51m 48.7s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Laoag City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:59:10.9 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:59:56.7 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1:59:17.8 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">14.6<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.9pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 00m 6.90s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Tuguegarao<br \/>\r\n\t\t\tCity<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:56:50.9 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1:01:16.4 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:03:55.7 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">17.8<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:24.65pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 07m 4.80s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Baguio City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:51:35.9 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:57:16.1 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:01:26.7 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">18.7<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 09m 50.8s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Dagupan City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:50:16.0 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:56.1?\u2019.1 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:00:52.5 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">19.0<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:17.95pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 10m 36.5s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Manila<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:44:23.8 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:54:56.2 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:03:51.9 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">23.7<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.6pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 19m28.1s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Palawan<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:25:27.7 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:41:54.9 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1:57:48.8 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">31.0<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.65pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 32m 20.7s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:89.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Legaspi City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:84.25pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:40:27.2 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:57:36.2 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:75.35pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:12:13.1 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">32.7<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:82.8pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 31m 45.8s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Tacloban City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:34:57.8 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:56:46.4 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:15:34.6 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">40.6<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:19.85pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 40m 36.8s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Cebu City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:31:00.0 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:53:09.4 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:12:46.2 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">41.0<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.2pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 41m 46.2s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Surigao Del<br \/>\r\n\t\t\tNorte<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:30:44.7 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:55:07.9 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:16:22.2 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">45.7<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.6pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 45m 37.4s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Molugan, El Salvador City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:25:48.6 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:51:01.9 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:13:35.9 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">47.8<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:25.15pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 47m 47.3s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Davao City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:22:44.7 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:50:36.5 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:15:27.2 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">53.8<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:18.45pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 52m 42.6s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">General Santos City<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:18:52.6 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:47:27.4 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:13:24.1 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">55.6<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:26.1pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 54m 31.5s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:89.3pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Balut Island, Sarangani<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:84pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">11:17:23.9 AM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:82.55pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">12:46:52.6 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:75.6pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2:13:39.0 PM<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:68.15pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">58.2<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t\t<td style=\"height:31.6pt; text-align:center; vertical-align:top; width:83.05pt\">\r\n\t\t\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2h 56m 15.1s<\/span><\/span><\/p>\r\n\t\t\t<\/td>\r\n\t\t<\/tr>\r\n\t<\/tbody>\r\n<\/table>\r\n\r\n<p><br \/>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">The most recent partial solar eclipse to pass through the Philippines was on June 21, 2020. If our countrymen miss the chance to watch the April 20, 2023, Partial Solar Eclipse, it would be more than five (5) years before the Philippines sees another one; the next partial solar eclipse will take place on July 22, 2028.<br \/>\r\n<br \/>\r\nPAGASA strongly advised the general public to always use safe solar viewing equipment, such as a safe handheld solar viewer, when observing a partial solar eclipse directly with their eyes. Be aware that eclipse glasses are NOT conventional sunglasses; regular sunglasses, regardless of how dark they are, should not be used to observe the Sun. The general public is urged to use eclipse safety instruments like pinhole cameras or telescope projections as a precaution. These are the safest ways to see the eclipse.<br \/>\r\n<br \/>\r\nThe following are some of the pointers in observing a Partial Solar Eclipse:<\/span><\/span><\/p>\r\n\r\n<ul>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">AVOID staring directly at the Sun with bare eyes.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">RESIST the urge to use a standard telescope or binoculars without a solar filter to observe the Sun.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">AVOID using smoked glass or sunglasses when facing the Sun.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">AVOID using camera film or negatives.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Attempting to see the Sun through foil or translucent candy wrappers is not advised.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li>\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">DON'T TRY TO VIEW THE ECLIPSE BY REFLECTING THE SUN OFF A MIRROR, A CD, OR ANY BODY OF WATER, EVEN IN A PALE OF WATER.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Using binoculars or a telescope wn ie wearing specialized solar glasses will cause the glasses to melt due to the heat from the concentrated sunlight.<\/span><\/span><\/li>\r\n\t<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">AVOID using the solar filters that come with your telescope since the concentrated light may cause the eyepiece to break, allowing dangerous amounts of sunlight to enter and blind your eyes.<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\">\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">A broken, scratched, or hole-filled Mylar film should not be used, nor should specialized eclipse glasses.<\/span><\/span><\/p>\r\n\t<\/li>\r\n\t<li style=\"text-align:justify\">\r\n\t<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">If you\u2019re using your telescope to project an image of the eclipse, DON\u2019T leave the finder-scope of the telescope unattended since young children might accidentally look through it.<\/span><\/span><\/p>\r\n\t<\/li>\r\n<\/ul>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">For more information, kindly contact Engr. Ma. Rosario C. Ramos, Chief of Space Science and Astronomy Section (SSAS) at the telephone number (02) 8284-0800 loc 3016 or send an email at <a href=\"mailto:astronomy@pagasa.dost.gov.ph\">astronomy@pagasa.dost.gov.ph<\/a><br \/>\r\n<br \/>\r\nSGD.<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator<\/span><\/span><\/p>",
                    "type": "2",
                    "published_at": "2023-04-20",
                    "created_at": "2023-04-20 14:46:59",
                    "updated_at": "2023-04-20 15:15:45",
                    "deleted_at": null
                }, {
                    "id": 132,
                    "tags": "Laoang, Northern Samar , radar, press release",
                    "title": "INAUGURATION OF THE PAGASA DOPPLER RADAR IN LAOANG NORTHERN SAMAR",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">PRESS RELEASE<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">Laoang, Northern Samar <\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">19 April 2023<\/span><\/strong><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">The Philippine Atmospheric, Geophysical and Astronomical Services Administration (PAGASA) under the Department of Science and Technology (DOST) inaugurates another state-of-the-art radar facility this Wednesday, April 19, 2023, in Brgy. Binaticlan of this municipality. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">The Laoang Radar is the 19<sup>th<\/sup> Doppler Radar currently operated by PAGASA. It is a C-Band Dual Polarization Solid State Weather Radar with a 480-km radial range, similar to the one installed in Cataingan, Masbate, which was inaugurated and operationalized in August 2022. The Laoang project has a total budget of about P150 million, with the bulk of the funds used to purchase and install the radar equipment, while the remaining was for the construction of the radar building, provision of access road and other civil works. The establishment of this facility is part of its growing network of operational weather observation facilities for DOST-PAGASA to strengthen the agency\u2019s capacities in enhancing the accuracy of its forecasts and warnings for extreme weather events. It is expected to greatly improve PAGASA's capability to monitor the development and tracking of heavy rain-causing weather systems such as thunderstorms, tropical cyclones and other extreme events. This will ultimately save lives, livelihood and properties for maximum economic and social benefits for the people. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">The radar station in Laoang is a significant addition to the country's networks of weather observation facilities, as it can help enhance the coverage, monitoring, and tracking of any weather systems that may affect the country. Additional radars are crucial for it provides increased accuracy and redundancy in detecting and tracking severe weather systems.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">For any queries or clarification, please contact Ms. Nancy Lance SLPRSD Chief at mobile numbers 0917-5064154, 0998-5859327 or through email address <\/span><a href=\"mailto:nmtlnace@gmail.com\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\">nmtlnace@gmail.com<\/span><\/a><span style=\"font-size:12.0pt\"> or through Mr. Alreb Ubaldo, the Chief Met Officer of PAGASA Laoang Radar at 0966-3529490 or via email address <\/span><a href=\"mailto:alreb1913@gmail.com\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\">alreb1913@gmail.com<\/span><\/a> <\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2023-04-19",
                    "created_at": "2023-04-19 21:41:27",
                    "updated_at": "2023-04-19 21:55:33",
                    "deleted_at": null
                }, {
                    "id": 130,
                    "tags": "SatREx: A Tool for Monitoring Extreme Rainfall",
                    "title": "SatREx: A Tool for Monitoring Extreme Rainfall",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PRESS RELEASE<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">DOST-PAGASA S&T Media Service<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Quezon City, 23 March 2023<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Extreme rainfall-related disasters can be mitigated if there is a way to identify the event at any given time. Timely to the country\u2019s celebration of National Meteorological Day, the DOST-PAGASA launches <em>SatREx<\/em> or <em>Satellite Rainfall Extremes Monitor, <\/em>the innovation is a web-based platform containing near-real-time information on extreme rainfall events. Determining whether extreme rainfall is occurring at any given time and location is of utmost importance for mitigating disasters in highly vulnerable countries like the Philippines. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">SatREx provides satellite rainfall estimates, which were derived from the Global Satellite Mapping of Precipitation (GSMaP) provided by the Japan Aerospace Exploration Agency (JAXA), observed in the past few hours and days at a particular location anywhere in the country. Multiple interactive maps allow users to determine how much rainfall is received over an area, with color-coded shadings indicating potential flood occurrence. Researchers, disaster risk reduction managers and decision-makers, stakeholders, and the general public can now access the platform through the DOST-PAGASA\u2019s official website.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">For more information, you may contact <strong>Dr. Marcelino Q. Villafuerte II<\/strong>, Chief of Impact Assessment and Applications Section of the Climatology and Agrometeorology Division at (02) 8284-0800 local 4910 or through email<em> iaascad17@gmail.com<\/em>.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Administrator<\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2023-03-24",
                    "created_at": "2023-03-24 13:55:46",
                    "updated_at": "2023-03-24 13:55:46",
                    "deleted_at": null
                }, {
                    "id": 129,
                    "tags": "EL NI\u0147O WATCH",
                    "title": "EL NI\u0147O WATCH",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PRESS STATEMENT<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#222222\">DOST-PAGASA S & T Media Service<\/span><\/span><\/span><br \/>\r\n<span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#222222\"><span style=\"background-color:white\">Quezon City, 23 March 2023<\/span><\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PAGASA has been continuously monitoring the El Ni\u00f1o Southern Oscillation (ENSO) conditions in the tropical Pacific. The final La Ni\u00f1a advisory was issued last March 10, 2023 with ENSO<span style=\"background-color:white\"> - neutral conditions now present. However,<\/span> <span style=\"background-color:white\">based on recent conditions and model forecasts, <\/span>El Ni\u00f1o<span style=\"background-color:white\"> will likely develop in Jul-Aug-Sept (JAS) 2023 season and may persist until 2024. <\/span> With this development, the PAGASA ENSO Alert and Warning System is now raised to <strong>El Ni\u00f1o Watch<\/strong>. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">El Ni\u00f1o (warm phase of ENSO) is characterized by <span style=\"background-color:white\">unusually warmer than average sea surface temperatures (SSTs) in the central and eastern equatorial Pacific (CEEP).   When conditions are favorable for the development of El Ni\u00f1o within the next six months and the probability is 55% or more, an <strong>El Ni\u00f1o Watch<\/strong> is issued.  <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">El Ni\u00f1o increases the likelihood of below-normal rainfall conditions, which could bring negative impacts (such as dry spells and droughts) in some areas of the country. However, over the western part of the country, above-normal rainfall conditions during the Southwest monsoon season (Habagat) may also be expected.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PAGASA will continue to closely monitor the development of this ENSO phenomenon. All concerned government agencies and the general public are encouraged to keep on monitoring and take precautionary measures against the impending impacts of El Ni\u00f1o.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">For more information, please call the Climate Monitoring and Prediction Section (CLIMPS), Climatology and Agrometeorology Division (CAD) at telephone number (02) 8284-0800 local 4920 or through email: pagasa.climps@gmail.com.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Original Signed:<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Administrator<\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2023-03-24",
                    "created_at": "2023-03-24 13:48:05",
                    "updated_at": "2023-03-24 13:48:05",
                    "deleted_at": null
                }, {
                    "id": 128,
                    "tags": "Preparation for Warm and Dry Season",
                    "title": "Preparation for Warm and Dry Season",
                    "image_path": "",
                    "description": "<strong><span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">Press Statement<\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">DOST-PAGASA <\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">S&T Media Service <\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">23 March 2023, Quezon City<\/span><br \/>\r\n<br \/>\r\nAfter the termination of the Northeast Monsoon and the start of the dry season, recent observations from several DOST-PAGASA stations showed a gradual increase in daily temperature over many parts of the country and the strengthening of the North Pacific High. Furthermore, the number of dry and warm days across the country will continue to increase, though isolated thunderstorms are also likely to occur, especially in the afternoon or evening hours.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">The public and all concerned government agencies are advised to take precautionary measures to minimize heat stress, optimize the daily use of water for personal and domestic consumption, and prevent any accompanying health risks associated with this climate condition.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">PAGASA will continue to monitor the weather and climate situation of the country. For more information, you may reach us by phone at (02) 8284-0800 local 4801(Weather Forecasting Section) and 4920 (Climate Monitoring and Prediction Section) or through email at information@pagasa.dost.gov.ph; pagasa.climps@gmail.com.<\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12.0pt\">Original Signed:<\/span><\/strong><br \/>\r\n<br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><br \/>\r\n<span style=\"font-size:12.0pt\">Administrator<\/span>",
                    "type": "2",
                    "published_at": "2023-03-24",
                    "created_at": "2023-03-24 13:44:54",
                    "updated_at": "2023-03-24 13:58:36",
                    "deleted_at": null
                }, {
                    "id": 127,
                    "tags": "Recent analyses indicate a retreat of the High-Pressure Area over Siberia, which resulted in the weakening of northeasterly winds and an increase",
                    "title": "TERMINATION OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\"><strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA S&T Media Service<br \/>\r\nQuezon City<br \/>\r\n<br \/>\r\nRecent analyses indicate a retreat of the High-Pressure Area over Siberia, which resulted in the weakening of northeasterly winds and an increase in the air temperature over most parts of the country. Furthermore, the strengthening of the North Pacific High has led to a gradual shift in the wind pattern from northeasterly to easterly. These signify the end of the Northeast Monsoon (Amihan) and the beginning of the warm and dry season, which is expected to last until May.<\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">In the coming months, warmer temperatures are expected, and rainfall across the country will be influenced mostly by easterlies and localized thunderstorms. The public is advised to take precautionary measures to minimize heat stress and optimize the daily use of water for personal and domestic consumption.<\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">PAGASA will continue to monitor the weather and climate situation of the country. For more information, you may reach us by phone at (02) 8284-0800 local 4801(Weather Forecasting Section) and 4920 (Climate Monitoring and Prediction Section) or through email at information@pagasa.dost.gov.ph; pagasa.climps@gmail.com.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Original Signed:<\/span><\/span><br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">VICENTE B. MALANO, Ph.D.<\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2023-03-21",
                    "created_at": "2023-03-21 13:39:29",
                    "updated_at": "2023-03-21 14:47:55",
                    "deleted_at": null
                }, {
                    "id": 124,
                    "tags": "For the past several days, strong to gale-force northeasterly winds have prevailed over Northern Luzon due to the strengthening of the high pressure system over Siberia. ....",
                    "title": "ONSET OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><strong>PRESS STATEMENT<\/strong><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"color:#222222\">DOST-PAGASA S & T Media Service<\/span><\/span><br \/>\r\n<span style=\"color:#222222\"><span style=\"background-color:white\">Quezon City <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"color:black\">For the past several days, strong to gale-force northeasterly winds have prevailed over Northern Luzon due to the strengthening of the high pressure system over Siberia. Moreover, gradual cooling of the surface air temperature over the northeastern part of Luzon has been observed. These meteorological conditions indicate the onset of <strong>Northeast Monsoon<\/strong> (<em>Amihan<\/em>) season in the country.<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">With these developments, the northeast wind flow is expected to gradually become more dominant over Northern Luzon, bringing cold and dry air. Surges of cold temperatures may also be expected in the coming months.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Meanwhile, with the on-going La Nina, <em>Amihan<\/em> may be enhanced and trigger floods, flash floods, and rain-induced landslides over susceptible areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal Signed:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">VICENTE B. MALANO, Ph.D. <\/span><\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">Administrator <\/span><\/span><\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-10-20",
                    "created_at": "2022-10-20 18:21:41",
                    "updated_at": "2022-10-20 18:32:49",
                    "deleted_at": null
                }, {
                    "id": 123,
                    "tags": "Recent analyses showed that a significant weakening of the Southwest Monsoon has been observed over the last few days. Moreover the strengthening of the .....",
                    "title": "TERMINATION OF SOUTHWEST MONSOON",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><strong>PRESS STATEMENT<\/strong><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"color:#222222\">DOST-PAGASA S&T Media Service<\/span><\/span><br \/>\r\n<span style=\"color:#222222\"><span style=\"background-color:white\">Quezon City<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Recent analyses showed that a significant weakening of the Southwest Monsoon has been observed over the last few days. Moreover, the strengthening of the high-pressure area over the Asian continent has led to the gradual changing of the season. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">With these developments, the Southwest Monsoon season or known locally as \u201cHabagat\u201d is now officially over. The season in the Philippines is in the process of transition and will be expecting the gradual start of the Northeast Monsoon (NE) season in the coming days with a shift in the direction of the winds.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Meanwhile, with the ongoing La Nina, there is an increased likelihood of above-normal rainfall conditions that could trigger floods, flashfloods and rain-induced landslides over vulnerable areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal Signed:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><strong>VICENTE B. MALANO, Ph.D.<\/strong><\/span><br \/>\r\n<span style=\"font-size:12pt\">Administrator<\/span>",
                    "type": "2",
                    "published_at": "2022-10-05",
                    "created_at": "2022-10-05 14:44:52",
                    "updated_at": "2022-10-05 15:04:01",
                    "deleted_at": null
                }, {
                    "id": 122,
                    "tags": "The DOST-PAGASA launches another addition to its existing Flood Early Warning Systems (FEWS) in its continuing effort to mitigate flood disasters in the country....",
                    "title": "PAGASA LAUNCHES FLOOD EARLY WARNING SYSTEMS IN CEBU",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\">PRESS RELEASE<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\">DOST-PAGASA<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\">S&T Media Service<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">13 September 2022<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Cebu City<br \/>\r\n<br \/>\r\nThe DOST-PAGASA launches another addition to its existing Flood Early Warning Systems (FEWS<\/span><span style=\"font-size:13.0pt\">) in <\/span><span style=\"font-size:12.0pt\">its continuing effort to mitigate flood disasters in the country in collaboration with the Government of South Korea. It is funded under its Global Projects on Disaster Risk Reduction (GPDRR) and is being implemented thru the Ministry of Strategy and Finance (MOSF-Korea) and the National Disaster Management Research Institute (NDMI)<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">The FEWS Project <span style=\"color:teal\"><ins>is <\/ins><\/span>entitled <em>\u201cStrengthening the Capability of the Republic of the Philippines on Disaster Risk Reduction\u201d<\/em>, which primary objective is to provide as much advance notice as possible of an impending flood to the authorities and the general public and to strengthen the capability on disaster risk reduction of the recipient. The project, the first of its kind in the Province of Cebu will have two (2) local government units as recipients: Toledo City and the Municipality of Dumanjug<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">The formal signing of the Memorandum of Agreement (MOA) between the DOST-PAGASA Administrator and the Chief Executives of the two recipients' local government units (LGUs) will formalize the partnership between the national and local government in partnership with the private sector through the involvement of the Toledo-based Carmen Copper Corporation (CCC), a mining corporation that offered to host\/co-locate the sites of some gauging stations. These gauging stations are vital in the collection of real-time hydrometeorological data and information that serve as inputs in the formulation of warnings and advisories during actual flood early warning operations that will benefit the local communities and other stakeholders.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">NDMI was also the same Korean agency that supported the same FEWS in Cagayan de Oro City after the flood disaster due to Typhoon \u201cSendong\u201d which caused a great loss of lives and properties in 2011.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\"><span style=\"color:#171717\">For more information, you may call the Project Implementer Engr. Shiela Schnieder of the Hydrometeorology Division at cell phone number +639178534819.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:#171717\">VICENTE B. MALANO, Ph.D.<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\"><span style=\"color:#171717\">Administrator<\/span><\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2022-09-13",
                    "created_at": "2022-09-13 11:21:53",
                    "updated_at": "2022-09-13 11:32:52",
                    "deleted_at": null
                }, {
                    "id": 121,
                    "tags": "press release, radar, masbate",
                    "title": "INAUGURATION OF THE PAGASA DOPPLER RADAR IN CATAINGAN MASBATE",
                    "image_path": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/6303a590c3bcb_6303a590c3c64.PNG",
                    "description": "DOST-PAGASA inaugurates its eighteenth Doppler Radar Facility in the country, situated in Calasangan Hill in the municipality of Cataingan in the province of Masbate. The facility is expected to boost the agency\u2019s monitoring and forecasting capabilities of extreme weather events. Held in the afternoon of 17 August 2022, the inaugural ceremonies were attended by key officials from the Department of Science Technology or DOST, the Philippine Atmospheric Geophysical and Astronomical Services Administration (PAGASA), Local officials in the province as well as representatives from the various stakeholders. Among the notable personalities in the occasion include the Honorable Congressman Wilton T. Kho of the Third District of Masbate, DOST Secretary Renato U. Solidum Jr., DOST-PAGASA Administrator, Dr. Vicente B. Malano, and Deputy Administrator, Dr. Landrico U. Dalida Jr. as well as Masbate Public Info Officer Mr. Nonielon C. Bagalihog Jr., representing the office of Governor Antonio Kho of the province of<br \/>\r\nMasbate. Also gracing the event is DOST Regional Office V Director Rommel R. Serrano, former Provincial Disaster Risk Reduction and Management Officer and the incumbent Mayor Fernando Talisic of the town of Esperanza, Masbate, and Mr. Pedrito Malunhao of Japan Radio Co. Ltd.<br \/>\r\n<br \/>\r\nThe inauguration formally started with the ceremonial singing of the Philippine National Anthem and the agency hymns of DOST and PAGASA. This is followed by the ribbon-cutting ceremonies and the blessing of the radar building and premises which was led by Rev. Fr. Arnel C. Bruza of St. Vincent Ferrer Parish Church of the Diocese of Masbate. After which, the key officials respectively gave their welcoming remarks and key messages during the program\u2019s main event.<br \/>\r\n<br \/>\r\nIn his welcome message, Dr. Landrico Dalida Jr. highlighted the capabilities of the new radar facility, giving emphasis on the state-of-the-art solid-state technology with compact design and high energy efficiency during its operation. The next one giving a message is Hon. Cong. Wilton Kho, Masbate\u2019s 3rd district representative and he congratulated DOST-PAGASA for the success of the project. He also expressed his utmost gratitude and recognized the importance of the role of the agency in keeping his constituents safe especially during the passage of tropical cyclones.After this, Dr. Vicente Malano, PAGASA Administrator also gave a message and he likewise gave gratitude and appreciation to the generosity and commitment of the Honorable Governor Antonio Kho for his support to the agency towards having an ideal spot for the construction of the radar facility. Also giving a message is DOST V Regional Director Rommel Serrano who also extended their warm greetings and congratulation to DOST-PAGASA and the DOST led by the newly-appointed Secretary. Giving the final message is DOST Secretary Dr. Renato Solidum Jr., and he underscored the importance of this new facility. According to him, Doppler radars are typically used in weather observation and nowcasting, but can also be used in other areas of application. In particular, the Masbate radar can be utilized in monitoring geologic hazards such as in volcanic plumes during eruptions of Mt. Mayon and Bulusan volcano in the Bicol region which are also situated in nearby provinces of Albay and Sorsogon respectively. Sec. Solidum adds that areas of agriculture and water management can also benefit from this radar technology, in support of the new administrations goal towards food security and disaster resilience through science, technology and innovation.<br \/>\r\n<br \/>\r\nPublic Information Unit DOST-PAGASA<br \/>\r\n<br \/>\r\n<a href=\"https:\/\/pubfiles.pagasa.dost.gov.ph\/tamss\/weather\/CATAINGAN%20MASBATE%20RADAR.pdf\">Download Press Release<\/a>",
                    "type": "2",
                    "published_at": "2022-08-22",
                    "created_at": "2022-08-22 23:49:37",
                    "updated_at": "2022-08-22 23:58:03",
                    "deleted_at": null
                }, {
                    "id": 120,
                    "tags": "Special Weather Outlook for earthquake-affected areas in Northern Luzon",
                    "title": "SPECIAL WEATHER OUTLOOK FOR NORTHERN LUZON",
                    "image_path": "",
                    "description": "<span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><strong>SPECIAL WEATHER OUTLOOK FOR NORTHERN LUZON<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\">28 - 30 JULY 2022<\/span><\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:13pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Today, Northern Luzon will experience partly cloudy to cloudy skies in the morning becoming cloudy in the afternoon with chances of isolated rainshowers or thunderstorms.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:13pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">For tomorrow until Saturday (July 29-30, 2022), generally fair weather conditions will continue to prevail over the area, with chances of isolated rainshowers or thunderstorms in the afternoon or evening.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:13pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">The public, local government, and Disaster Risk Reduction and Management Offices involved on the on-going rescue, clearing, and relief operations in the earthquake-affected areas are advised to continue to monitor possible thunderstorm and\/or rainfall advisories to be issued by the PAGASA Northern Luzon Regional Services Division.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:13pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">PAGASA will continue to monitor and inform the public of any significant weather changes occur.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:13pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">For more information, please contact the forecaster on duty of the Weather Division at telephone number (02) 8926-4258 or log on to <a href=\"http:\/\/www.bagong.pagasa.dost.gov.ph\/\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#0000ed\">www.bagong.pagasa.dost.gov.ph<\/span><\/a>.<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">JUANITO S. GALANG<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Chief, Weather Division<\/span><\/span><\/strong><\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-07-28",
                    "created_at": "2022-07-28 08:35:09",
                    "updated_at": "2022-07-28 08:35:09",
                    "deleted_at": null
                }, {
                    "id": 119,
                    "tags": "Press Release",
                    "title": "STATE OF THE NATION ADDRESS SPECIAL WEATHER OUTLOOK",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><strong><span style=\"font-size:14.0pt\">STATE OF THE NATION ADDRESS SPECIAL WEATHER OUTLOOK <\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\">July 25, 2022<\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">The dominant weather system that will likely to affect the Philippine archipelago on the State of the Nation\u2019s Address by <strong>President Ferdinand R. Marcos Jr.<\/strong> will be the expected formation of a<strong> Low Pressure Area (LPA) <\/strong>east of the country which may activate the monsoonal trough. <strong> <\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">On <strong>Monday (25 July),<\/strong> most parts of Southern Luzon, Visayas and Mindanao will have cloudy skies with scattered rainshowers and thunderstorms. The <strong>National Capital Region (NCR) <\/strong>and the rest of Luzon will have warm and humid weather condition apart from afternoon rainshowers and thunderstorms. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">Light southeasterly and easterly winds will prevail throughout the whole archipelago and the coastal waters will be slight except during thunderstorms activity. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">For more details, please contact the Weather Division at telephone number (632) 927-2877 or log on to <\/span><a href=\"http:\/\/www.pagasa.dost.gov.ph\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\">www.pagasa.dost.gov.ph<\/span><\/a><span style=\"font-size:12.0pt\">.<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">JUANITO S. GALANG<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">Chief, Weather Division <\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-07-22",
                    "created_at": "2022-07-22 17:28:50",
                    "updated_at": "2022-07-22 17:28:50",
                    "deleted_at": null
                }, {
                    "id": 117,
                    "tags": "The Department of Science and Technology (DOST), in partnership with the Department of Interior and Local Government (DILG), will begin the nationwide learning sessions for Project #MAGHANDA",
                    "title": "DOST's #MAGHANDA sets to rollout nationwide learning sessions this Jul",
                    "image_path": "",
                    "description": "<span style=\"font-size:16px\"><strong>PRESS RELEASE<\/strong><br \/>\r\nDOST-PAGASA<br \/>\r\nS&T Media Service<br \/>\r\n20 June 2022<br \/>\r\n<br \/>\r\n<strong>DOST's #MAGHANDA sets to Rollout nationwide learning sessions this July<\/strong><br \/>\r\n<br \/>\r\nThe Department of Science and Technology (DOST), in partnership with the Department of Interior and Local Government (DILG), will begin the nationwide learning sessions for Project #MAGHANDA on July 7, bringing the total number of participants to 9,000 from 17 regions.<br \/>\r\n<br \/>\r\nThese learning sessions aim to educate participants on the most up-to-date disaster information and early warnings, as well as the corresponding actions to take.<br \/>\r\n<br \/>\r\nThe #MAGHANDA project will conduct a total of 28 learning sessions with both asynchronous and synchronous components. The identified participants include local chief executives, disaster risk reduction and management officers, information officers from local government units, first responders, and media personnel.<br \/>\r\n<br \/>\r\nFor the two-week run of asynchronous sessions, participants from local government units and first responders such as those from the Bureau of Fire Protection and Philippine National Police will be able to access the project's learning management system to study the different modules prepared by the project from Philippine Atmospheric, Geophysical, and Astronomical Services Administration (PAGASA)and Philippine Institute of Volcanology and Seismology (PHIVOLCS).<br \/>\r\n<br \/>\r\nAn open forum and workshops will be conducted in synchronous sessions with the support of the DOST-PAGASA and DOST-PHIVOLCS resource persons and other training staff from the implementing agencies. During the workshop, participants will update their disaster risk reduction and management contingency plan to include hazards, that can affect their area and because of the lessons learned during the COVID-19 PANDEMIC.<br \/>\r\n<br \/>\r\nThe DOST-PAGASA has prepared presentations and workshops for the following hazards: tropical cyclones & gale, thunderstorms & heavy rainfall, storm surge, flood, and El Ni\u00f1o and La Ni\u00f1a. Tools such as the DOST-PAGASA website and the development of the impact-based Forecasting and Warning system will also be featured.<br \/>\r\n<br \/>\r\nFor DOST-PHIVOLCS, topics will include warnings about volcanoes, earthquakes, and tsunamis as well as their tools and services such as the GeoRiskPH platform, Rapid Earthquake Damage<br \/>\r\nassessment System (REDAS), and How Safe is my House.<br \/>\r\n<br \/>\r\n#MAGHANDA will also distribute the 26 updated IEC materials on different meteorological and geological topics to all cities and municipalities nationwide. Public Service Announcements about the hazards and warning systems will also be broadcasted on various platforms.<br \/>\r\n<br \/>\r\n#MAGHANDA is a DOST grant-in-aid project implemented by DOST-PAGASA with the support from DOST-PHIVOLCS and Science and Technology Information Institute, and in partnership with DILG and Local Government Academy.<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\nVICENTE B. MALANO, Ph.D.<br \/>\r\nAdministrator<br \/>\r\n#MAGHANDA Project Leader<\/span><br \/>\r\n<br \/>",
                    "type": "2",
                    "published_at": "2022-06-20",
                    "created_at": "2022-06-22 11:27:27",
                    "updated_at": "2022-06-22 11:31:41",
                    "deleted_at": null
                }, {
                    "id": 116,
                    "tags": "The Philippine Atmospheric Geophysical and Astronomical Services Administration (PAGASA) will be observing the Typhoon and Flood Awareness Week with the intensified public information campaign to focus on this year\u2019s theme \u201cFrom Forecast to Action Towards a Typhoon and Flood Resilient Community.\u201d",
                    "title": "OBSERVANCE OF THE TYPHOON AND FLOOD AWARENESS WEEK",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">PRESS RELEASE<br \/>\r\nDOST-PAGASA<br \/>\r\nS&T Media Service<br \/>\r\n20 June 2022<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">The Philippine Atmospheric Geophysical and Astronomical Services Administration (PAGASA) will be observing the Typhoon and Flood Awareness Week with the intensified public information campaign to focus on this year\u2019s theme \u201cFrom Forecast to Action Towards a Typhoon and Flood Resilient Community.\u201d The Philippine community-based early warning system coupled with the current modification of the Tropical Cyclone Wind Signal (TCWS) system has been an innovative strategy for coping with weather-related disasters which the government and concerned stakeholders jointly seek to reinforce. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">The DOST-PAGASA and its partners in the community-based approach are acknowledged and emulated by the Typhoon Committee member countries for pioneering good practices in public disaster awareness and response. The opportunity is presented to inculcate lessons learned in the mitigation of typhoon and flood disasters as well as to update the public on the ongoing PAGASA modernization about the agency\u2019s improved forecast products and services. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">This year\u2019s observance is timely and significant in preparation for the rainy\/typhoon season. It also commemorates the anniversary of the \u201cGreat Luzon Flood of 1972\u201d exactly 50 years ago. It was this precursory event that launched the National Flood forecasting of the Philippine Weather Bureau which became the PAGASA that same year by senate approval of the \u201cAtmospheric, Geophysical, and Science Act of 1972 followed by Presidential Decree no 78. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Various IEC activities and programs were lined up for this observance. Highlighting the kick-off activities of the TFAW is a press conference back-to-back with the project launch of the #MAGHANDA IEC Campaign scheduled on 20 June 2022, followed by a webinar on \u201cMaagang Aksyon at Akmang Gawin Ayon sa Panahon\u201d (MAAGAP) for science teachers and school disaster risk reduction coordinators in Regions 6,7,8 and NCR scheduled on June 21, 2022. Interested participants may register at https:\/\/bit.ly\/TFAW2022. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">As part of the campaign, and taking into consideration to empower the community against typhoons and flood hazards, an IEC campaign for DRRMOs of the Province of Rizal will be conducted in Antipolo City on 24 June 2022 back-to-back by a Flood Drill in Brgy. Sta. Ana, San Mateo, Rizal on 25 June 2022. Culminating the observance of the TFAW is the Media Seminar-Workshop for NCR & MIMAROPA slated 8-10 July 2022 which coincides with the annual observance of the National Disaster Resilience Month this July.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">The observance of the Typhoon and Flood Awareness Week was declared under the Presidential Proclamation #1535 in 2008 every third week of June and the year thereafter to increase the public and stakeholders' awareness and positive action towards typhoons as well as flooding and its related hazards. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">For more information, please call the Information and Media Affairs Unit of the Climatology & Agrometeorology Research and Development Section (CARDS) at telephone numbers 8925-6943 or 8284-0800 local 818\/907\/908.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Original Signed:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,\"><span style=\"font-size:12.0pt\">Administrator<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-06-20",
                    "created_at": "2022-06-20 14:27:35",
                    "updated_at": "2022-06-20 19:14:21",
                    "deleted_at": null
                }, {
                    "id": 115,
                    "tags": "Press Release",
                    "title": "SPECIAL WEATHER OUTLOOK ON THE CELEBRATION OF INDEPENDENCE DAY",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">10 June 2022<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">SPECIAL WEATHER OUTLOOK ON THE CELEBRATION OF INDEPENDENCE DAY  <\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">                                                       (12 June 2022)                                                               <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">The ridge of high pressure area will be the dominating weather system to affect Northern and Central Luzon area.   <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Bicol region and eastern Visayas <\/span><\/span><\/strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">will experience cloudy skies with scattered rainshowers and thunderstorms while the rest of the country including Metro Manila will have fair weather condition apart from isolated afternoon or evening rainshowers and thunderstorms.  <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Light southeasterly to southerly winds will prevail throughout the whole archipelago and the coastal waters will be slight.   <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">No tropical cyclone formation is expected with the Philippine Area of Responsibility during the outlook period.  <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">PAGASA will continue to monitor and inform the public of any significant weather changes occur.    <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">For more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8926-4258 or log on to <\/span><\/span><a href=\"http:\/\/www.bagong.pagasa.dost.gov.ph\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">www.bagong.pagasa.dost.gov.ph<\/span><\/span><\/a><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">JUANITO S. GALANG<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Weather Division<\/span><\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2022-06-10",
                    "created_at": "2022-06-11 07:51:10",
                    "updated_at": "2022-07-22 17:28:10",
                    "deleted_at": null
                }, {
                    "id": 113,
                    "tags": "ONSET OF THE RAINY SEASON",
                    "title": "ONSET OF THE RAINY SEASON",
                    "image_path": "",
                    "description": "<h1 dir=\"ltr\"><span style=\"font-size:22px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>Press Statement<\/strong><\/span><\/span><\/h1>\r\n\r\n<h1 dir=\"ltr\"><span style=\"font-size:22px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">DOST-PAGASA<br \/>\r\nS&T Media Service<br \/>\r\n18 May 2022, Quezon City<br \/>\r\n<br \/>\r\n<br \/>\r\nThe presence of frontal system and the occurrence of severe thunderstorms have brought widespread rains during the last five days in areas under Type I climate and other parts of the country. Moreover, southwesterly windflow was also observed during the past few days. This satisfies the criteria of the start of the rainy season over the western sections of Luzon and Visayas.<br \/>\r\n<br \/>\r\nIntermittent rains, associated with the Southwest (SW) monsoon will start to affect Metro Manila and the western sections of the country. However, breaks in rainfall events (also known as monsoon breaks), which can last for several days or weeks may still occur.<br \/>\r\n<br \/>\r\nMeanwhile, the ongoing La Ni\u00f1a may still affect some parts of the country, which may increase the likelihood of above normal rainfall conditions in the coming months.<br \/>\r\n<br \/>\r\nDespite the ongoing COVD-19 pandemic DOST-PAGASA will continue to monitor the day-to-day weather and long-term climate situation and provide updates when significant changes occur. For more information, you may reach us through the following telephone numbers: Weather Division, 82840800 loc. 805; CAD-CLIMPS, 82840800 loc. 906 or email through pagasa.climps@gmail.com<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<br \/>\r\nAdministrator<\/strong><\/span><\/span><\/h1>",
                    "type": "2",
                    "published_at": "2022-05-18",
                    "created_at": "2022-05-18 16:28:48",
                    "updated_at": "2022-05-19 18:40:37",
                    "deleted_at": null
                }, {
                    "id": 110,
                    "tags": "The existence of two (2) tropical cyclones, Tropical Depression (TD) Agaton inside the Philippine Area of Responsibility(PAR) and Tropical Storm (TS) Malakas (outside PAR)",
                    "title": "SPECIAL WEATHER OUTLOOK ON THE OBSERVANCE OF SEMANA SANTA",
                    "image_path": "",
                    "description": "DOST-PAGASA<br \/>\r\nS&T Media Service<br \/>\r\n12 April 2022<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">The existence of two (2) tropical cyclones, Tropical Depression (TD) Agaton inside the Philippine Area of Responsibility (PAR) and Tropical Storm (TS) Malakas (outside PAR) will be the dominant weather systems to affect the entire archipelago. Today (April 12), TD \u201cAGATON\u201d will bring cloudy skies with rains over most parts of Southern Luzon including Metro Manila and Mindanao becoming frequent rains over the Visayas. Floods and landslides are expected in the provinces of Leyte and Samar areas. Gradual improvement of weather conditions over Southern Luzon, Visayas, and Mindanao is expected tomorrow and onwards as Tropical Depression Agaton continues to weaken into a Low Pressure Area.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">The remnants of Agaton are expected to merge with TS \u201cMALAKAS\u201d and then will move away from the Philippine Area of Responsibility. On Wednesday (April 13), the Eastern section of Visayas and Northern Mindanao will be mostly cloudy skies with scattered rain showers and thunderstorms, while the rest of the country will have fair weather conditions apart from isolated afternoon rain showers and thunderstorms.<\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">On Maundy Thursday, Good Friday, Black Saturday, and Easter Sunday (April 14 - 17), generally fair weather conditions apart from isolated passing rain showers and thunderstorms in the afternoon or evening. Moderate to occasionally strong winds coming from the northwest to southwest will prevail over Eastern Visayas and Eastern Mindanao today and tomorrow and the coastal waters along this area will be moderate to occasionally rough. Elsewhere, winds will be light to moderate coming from the northeast and north with slight to moderate seas.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">This weather outlook will be updated if significant weather changes occur. For more information please contact the Weather Division at telephone number (02) 8926-4258 or log on to www.bagong.pagasa.gov.ph.<\/span><\/span><br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\"><strong>JUANITO S. GALANG<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Officer-in-Charge<br \/>\r\nWeather Division<\/span><\/span><br \/>\r\n<br \/>",
                    "type": "2",
                    "published_at": "2022-04-12",
                    "created_at": "2022-04-12 15:53:12",
                    "updated_at": "2022-04-12 15:57:16",
                    "deleted_at": null
                }, {
                    "id": 109,
                    "tags": "After the termination of the Northeast Monsoon and the start of the dry season, recent observations from several DOST-PAGASA stations showed a gradual increase in daily temperature over many parts of the country and the strengthening of the North Pacific High. Furthermore, the number of dry and warm days across the country will continue to increase, though isolated thunderstorms are also likely to occur, especially in the afternoon or evening hours.",
                    "title": "PREPARATIONS FOR WARM AND DRY SEASON",
                    "image_path": "",
                    "description": "<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">DOST-PAGASA <\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">S&T Media Service <\/span><\/span><br \/>\r\n<span style=\"font-size:12.0pt\"><span style=\"color:#22313f\">23 March 2022, Quezon City<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">After the termination of the Northeast Monsoon and the start of the dry season, recent observations from several DOST-PAGASA stations showed a gradual increase in daily temperature over many parts of the country and the strengthening of the North Pacific High. Furthermore, the number of dry and warm days across the country will continue to increase, though isolated thunderstorms are also likely to occur, especially in the afternoon or evening hours.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">Meanwhile, the ongoing La Ni\u00f1a may still affect some parts of the country, which may significantly result in above normal rainfall conditions for April.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">The public and all concerned government agencies are advised to take precautionary measures to minimize heat stress, optimize the daily use of water for personal and domestic consumption, and prevent any accompanying health risks associated with this climate condition.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">Despite the ongoing community quarantine due to the COVID-19 pandemic, DOST-PAGASA will continue to monitor the day-to-day weather and long-term climate situation and provide updates when significant changes occur.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12.0pt\">For more information, you may contact the Climatology and Agrometeorology Division (CAD) through the Climate Information & Prediction Section (CLIMPS) at Tel. Nos. (02)8284-0800 loc. 906.<\/span><br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><br \/>\r\n<span style=\"font-size:12.0pt\">Administrator<\/span>",
                    "type": "2",
                    "published_at": "2022-03-23",
                    "created_at": "2022-03-23 17:33:51",
                    "updated_at": "2022-03-23 17:34:45",
                    "deleted_at": null
                }, {
                    "id": 108,
                    "tags": "\u200b\u200b\u200b\u200b\u200b\u200b\u200bFor the past decades, the Philippines has experienced several extremely devastating tropical cyclones, particularly typhoons with more than 220 kilometers per hour (kph) of sustained winds as the country is impacted by an average of 20 typhoons per year.",
                    "title": "DOST-PAGASA MODIFIES TROPICAL CYCLONE WIND SIGNAL (TCWS) SYSTEM",
                    "image_path": "",
                    "description": "<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">PRESS STATEMENT <\/span><\/strong><br \/>\r\n<span style=\"font-size:11.0pt\">DOST-PAGASA S&T Media Service<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">23 March 2022, Quezon City<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">For the past decades, the Philippines has experienced several extremely devastating tropical cyclones, particularly typhoons with more than 220 kilometers per hour (kph) of sustained winds as the country is impacted by an average of 20 typhoons per year.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Following the onslaught of Typhoon Yolanda (Haiyan) in 2013, the DOST-PAGASA revised the then-Modified Public Storm Warning Signal (PSWS), to reflect the demands from the public and disaster managers for an additional level to the then four (4) level PSWS. The said revision was made along with the introduction of the Super Typhoon (STY) category. Under the new Tropical Cyclone Wind Signal (TCWS) System, TCWS No. 5 was introduced to warn the public with strong winds of more than 220 km\/h (i.e., for tropical cyclones classified as STY) roughly 12 hours before the onset of such conditions. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">After almost seven years of implementation, the DOST-PAGASA decided to modify several changes to the TCWS pending the completion of the sunset review of its warning system for Tropical Cyclone (TC) winds. The changes are based on the adoption of best practices from other TC warning centers and regionally-accepted operational standards, developments in objective guidance for TC wind swaths, operational experiences and challenges encountered by typhoon forecasters, and feedback from end-users and stakeholders. The revised version of this warning system, called the Modified Tropical Cyclone Wind Signal (TCWS) System, is as follows:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Table 1. <\/span><\/strong><span style=\"font-size:11.0pt\">Modified TCWS System ( 23 March 2022)<\/span><\/span><\/span>\r\n<table border=\"1\" cellspacing=\"0\" class=\"MsoTableGrid\" style=\"border-collapse:collapse; border:solid windowtext 1.0pt; width:458.75pt\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td style=\"width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Wind signal level<\/span><\/strong><\/span><\/span><\/td>\r\n\t\t\t<td style=\"width:139.5pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Wind threat<\/span><\/strong><\/span><\/span><\/td>\r\n\t\t\t<td style=\"width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Warning lead time*<\/span><\/strong><\/span><\/span><\/td>\r\n\t\t\t<td style=\"width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Issued for what TC categories?<\/span><\/strong><\/span><\/span><\/td>\r\n\t\t\t<td style=\"width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Potential impacts<\/span><\/strong><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:69.7pt; width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">1<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:69.7pt; width:139.5pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><strong><span style=\"font-size:11.0pt\">Strong winds<\/span><\/strong><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Beaufort 6-7<\/span><\/span><\/span><br \/>\r\n\t\t\t<br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">39-61 km\/h<\/span><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">(22-33 kt, 10.8-17.1 m\/s)<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:69.7pt; width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">36 h<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:69.7pt; width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">TD or higher<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:69.7pt; width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Minimal to minor threat to lives and properties<\/span><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:36.85pt; width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">2<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:36.85pt; width:139.5pt\"><span style=\"font-size:12pt\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:black\">Gale-force winds<\/span><\/span><\/strong><\/span><br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">Beaufort 8-9<\/span><\/span><\/span><br \/>\r\n\t\t\t<br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">62-88 km\/h<\/span><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">(34-47 kt, 17.2-24.4 m\/s)<\/span><\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:36.85pt; width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">24 h<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:36.85pt; width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">TS or higher<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:36.85pt; width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Minor to moderate threat to lives and properties<\/span><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:62.5pt; width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">3<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:139.5pt\"><span style=\"font-size:12pt\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:black\">Storm-force winds<\/span><\/span><\/strong><\/span><br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">Beaufort 10-11<\/span><\/span><\/span><br \/>\r\n\t\t\t<br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">89-117 km\/h<\/span><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">(48-63 kt, 24.5-32.6 m\/s)<\/span><\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">18 h<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">STS or higher<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Moderate to significant threat to lives and properties<\/span><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:62.5pt; width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">4<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:139.5pt\"><span style=\"font-size:12pt\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:black\">Typhoon-force winds<\/span><\/span><\/strong><\/span><br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">Beaufort 12<\/span><\/span><\/span><br \/>\r\n\t\t\t<br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">118-184 km\/h<\/span><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">(64-99 kt, 32.7-51.2 m\/s)<\/span><\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">12 h<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">TY or higher<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:62.5pt; width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Significant to severe threat lives and properties<\/span><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t\t<tr>\r\n\t\t\t<td style=\"height:80.5pt; width:58.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">5<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:80.5pt; width:139.5pt\"><span style=\"font-size:12pt\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:black\">Typhoon-force winds<\/span><\/span><\/strong><\/span><br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">Beaufort 12<\/span><\/span><\/span><br \/>\r\n\t\t\t<br \/>\r\n\t\t\t<span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">185 km\/h or higher<\/span><\/span><\/span><br \/>\r\n\t\t\t<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">(100 kt or higher, 51.3 m\/s or higher)<\/span><\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:80.5pt; width:64.25pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">12 h<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:80.5pt; width:80.35pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">STY<\/span><\/span><\/span><\/td>\r\n\t\t\t<td style=\"height:80.5pt; width:116.4pt\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Extreme threat to lives and properties<\/span><\/span><\/span><\/td>\r\n\t\t<\/tr>\r\n\t<\/tbody>\r\n<\/table>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><em><span style=\"font-size:11.0pt\">* Time between hoisting of wind signal and the onset of the wind threat associated with the wind signal.<\/span><\/em><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">These changes will be adopted by the DOST-PAGASA as a solution due to the following major reasons:<\/span><\/span><\/span>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Damage assessment revealed that the resulting impacts on the ground of meteorological conditions commonly associated with the Wind Signal Nos. 4 and 5 of the old TCWS system are indistinguishable from each other.<\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Wind Signal No. 2 in the old TCWS System spans a wide range of wind speeds thus, it means that its coverage will have a wide range of impact severity. This is rather inefficient for warning purposes because in the old system, Wind Signal No.2 will be the highest level of warning that can be issued for both Tropical Storm (TS) and Severe Tropical Storm (STS) categories despite the increased severity of tropical cyclone winds when upgrading from TS to STS.<\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Considering the above reasons, the Modified TCWS System will be implemented effective this 23<sup>rd<\/sup> March 2022, in conjunction with the commemoration of the 157<sup>th<\/sup> National\/72<sup>nd<\/sup> World Meteorological Day.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">For more information, you may reach us through the following telephone numbers: Weather Division: 82840800 loc. 805\/823 or email us at pagasawfs@gmail.com<\/span><\/span><\/span><br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,\"><span style=\"font-size:11.0pt\">Administrator<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-03-23",
                    "created_at": "2022-03-23 17:25:41",
                    "updated_at": "2022-03-23 17:25:41",
                    "deleted_at": null
                }, {
                    "id": 106,
                    "tags": "The DOST- PAGASA celebrates the National Meteorological Service Day in conjunction with the commemoration of the World Meteorological (WM)\u00a0 Day on 23 March\u00a0 2022,\u00a0 under the timely theme \u201cEarly Warning and Early Action, Hydrometeorological and Climate Information for Disaster Risk Reduction.\u201d",
                    "title": "PAGASA CELEBRATES THE 2022 NATIONAL\/WORLD METEOROLOGICAL DAY",
                    "image_path": "",
                    "description": "<strong><span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">DOST-PAGASA S&T Media Service<\/span><\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">23 March 2022, Quezon City<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">The DOST- PAGASA celebrates the National Meteorological Service Day in conjunction with the commemoration of the World Meteorological (WM) Day on 23 March 2022, under the timely theme \u201cEarly Warning and Early Action, Hydrometeorological and Climate Information for Disaster Risk Reduction.\u201d The observance aims to signify the international commitments and response of the World Meteorological Organization (WMO) of the United Nations on weather and climate disasters that also inter-relate to much challenging global environmental and humanitarian crisis.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">The Philippines had been a member of the WMO since 1950 through the National Hydrometeorological Service, the DOST-PAGASA, in partnership with our counterparts in many nations promote open scientific exchange knowing that the atmosphere does not regard geopolitical boundaries. This close cooperation engendered by the principle of scientific internationalism in meteorology and related fields is the main reason that weather forecasting and monitoring of the global climate is even possible today and continues progressing into the future. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">This year\u2019s forthcoming WM Day event is also jointly celebrated in the Philippines as National Meteorological Day, the 157th landmark year since the historic foundation of the Philippine Weather Service in 1865 during the Spanish colonial government. It also marks the milestone golden anniversary year since the former Weather Bureau was abolished which led to the establishment of the PAGASA fifty years (50) ago on 08 December 1972 by Presidential Decree No. 78, under the administration of the late President Ferdinand E. Marcos.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">WMO Secretary-General Prof. Petteri Taalas will launch the WM Day activities worldwide and report on the state of the world weather and climate. The DOST-PAGASA Administrator Dr. Vicente B. Malano as Permanent Representative of the Philippines with the WMO will lead in launching the coinciding activities at the Central Office in Quezon City simultaneous with the regional and field stations nationwide. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">This year\u2019s celebration of the National\/World Met Day 2022 has lined up and highlighted different activities. Pre-event activities include a caricature drawing contest dubbed as \u201ce-Guhit\u201d inviting the participation of Junior and Senior High School students nationwide thereby involving the awareness of the young generations in terms of DRR activities. The deadline for submission of entries is March 20, 2022. The PAGASA will also conduct an awareness and information education seminar for its non-technical and technical employees dubbed as \u201cMaagang Aksyon at Akmang Gawin Ayon sa Panahon\u201d (MAGAAP) though a webinar today, March 21, this will precede as a test bed\/pre-test for the Information Education Campaign (IEC) that will be scheduled mid of this year to the general public. On March 22, the 146th National Climate Forum will be conducted alongside the PAGASA Regional Services Division (PRSD} Virtual Tour showcasing the PRSD profile products and services and the impacts to their different stakeholders.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">On March 23, the main program will commence through a Eucharistic Celebration and followed by the PAGASA Personnel Fun Games to make the celebrations more blissful and festive. It will be simultaneous with the Virtual Scientific Forum highlighting various DRR related topics. To end the morning activities, a press conference was slated for our media partners on the launch of the \u201cModified Tropical Cyclone Warning Signal\u201d back-to-back with the \u201cPreparation for the Warm and Dry Days\u201d. Culminating the days' celebration is the awarding of \u201cPAGASA Gawad Awards\u201d and the \u201cPAGASA Wind Vane Awards\u201d. The former is given to employees who exhibited exemplary accomplishments and dedication in the pursuit of public service and the latter, the \u201cPAGASA Wind Vane Awards\u201d on the other hand, traditionally is a prestigious recognition conferred to several individuals or institutions a year who have exceptionally supported PAGASA\u2019s work by contributing to the improvement of the agency\u2019s mandate on weather disaster warnings and mitigation thereby achieving public trust and recognition. The past recipients are notable personalities in media, the academe, government officials, and public servants but have also included ordinary private citizens and institutions who have performed outstanding volunteerism in disaster warnings or as emergency first responders. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">Despite the imminent issues on the COVID-19 pandemic, the DOST-PAGASA continued to be greatly motivated to celebrate the national\/world meteorological day in our unyielding pursuit in promoting early warning services for the protection of people\u2019s lives and properties.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">For more detailed information, you may contact Ms. Sharon Juliet M. Arruejo, Over-all Coordinator for additional information at telephone numbers 8284-0800 local 907 or Ms. Ma. Cecilia A. Monteverde, Over-All-Chair of the celebration at telephone number 8284-0800 local 108. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,\"><span style=\"font-size:12.0pt\">Administrator<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-03-22",
                    "created_at": "2022-03-22 13:38:55",
                    "updated_at": "2022-03-22 14:20:58",
                    "deleted_at": null
                }, {
                    "id": 105,
                    "tags": "These signify the termination of the Northeast Monsoon (Amihan) and the start of the dry season and warmer condition.",
                    "title": "TERMINATION OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "<strong><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">DOST-PAGASA S&T Media Service<\/span><\/span><\/strong><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Quezon City, 16 March 2022<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\"><strong>TERMINATION OF THE NORTHEAST MONSOON<\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">The recent analyses indicate retreat of the High Pressure Area (HPA) over Siberia, thereby weakening of the associated Northeasterly winds and decreasing sea level pressure in the country. Moreover, the wind pattern has generally shifted from Northeasterlies to Easterlies over most parts of the country as a result of the advancing HPA over the Northwestern Pacific.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">These signify the <strong>termination of the Northeast Monsoon<\/strong> (Amihan) <strong>and the start of the dry season<\/strong> <strong>and warmer conditions<\/strong>. Furthermore, the day-to-day rainfall distribution across the country will be <strong>influenced mostly by easterlies and localized thunderstorms<\/strong>.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">The public is advised to take precautionary measures to minimize heat stress and optimize the daily use of water for personal and domestic consumption.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">PAGASA will continue to monitor the day-to-day weather and climate situation of the country. For more information, you may reach us through the following telephone numbers: Weather Division, 82840800 loc. 805; CAD-CLIMPS 82840800 loc. 906 or through email:pagasa.climps@gmail.com<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Original signed:<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\"><strong>VICENTE B. MALANO, Ph.D.<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-03-16",
                    "created_at": "2022-03-16 11:02:56",
                    "updated_at": "2022-03-16 13:20:36",
                    "deleted_at": null
                }, {
                    "id": 103,
                    "tags": "National Astronomy Week",
                    "title": "Celebration of the 29th National Astronomy Week",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">Celebration of the 29<sup>th<\/sup> National Astronomy Week <\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">20 \u2013 26 February 2022<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">The Philippine Atmospheric, Geophysical, and Astronomical Services Administration (PAGASA) is mandated to spearhead the annual celebration of the <strong>National Astronomy Week (NAW)<\/strong>, observed every 3rd week of February under the <strong>Presidential Proclamation No. 130, s. 1993<\/strong>. This year\u2019s celebration will be from <strong>20-26 February 2022<\/strong>, with the theme \u201c<strong>Ma(g)laya(g) Tayo Sa Mga Tala<\/strong>\u201d. In the ancient Baybayin script, the word for \"freedom (Malaya)\" could also be read as \"to set sail (Maglayag),\" depending on the context in which it is used. Hence, this year's theme evokes the boundless freedom that awaits us all on our journey to the stars. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">For the week-long celebration, PAGASA has prepared the following activities: <\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">1.<\/span><\/strong><span style=\"font-size:10.0pt\"> 1st PAGASA Astro Vlog Contest (Register here: <a href=\"https:\/\/bit.ly\/NAW22_AstroVlogContest\" target=\"_blank\">bit.ly\/NAW22_AstroVlogContest<\/a>)<\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">2.<\/span><\/strong><span style=\"font-size:10.0pt\"> Webinar series entitled \u201cRevisiting Philippine Ethnoastronomy Amidst the Pandemic\u201d on 21 \u2013 22 February 2022 (Register here: <a href=\"https:\/\/bit.ly\/NAW22_AstroVlogContest\" target=\"_blank\">bit.ly\/NAW22_WebinarRegistration<\/a>)<\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">3.<\/span><\/strong><span style=\"font-size:10.0pt\"> Understanding Philippine Ethnoastronomy: A Research Symposium on 24 February 2022<\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">4.<\/span><\/strong><span style=\"font-size:10.0pt\"> Virtual telescope viewing using the 45-cm GOTO telescope of PAGASA Astronomical Observatory on 25 February 2022 (Register here: <a href=\"https:\/\/bit.ly\/NAW22_AstroVlogContest\" target=\"_blank\">bit.ly\/NAW22_WebinarRegistration<\/a>)<\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">5.<\/span><\/strong><span style=\"font-size:10.0pt\"> Virtual Planetarium Show on 26 February 2022<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">The online activities will also be live-streamed at the official Facebook page of PAGASA: facebook.com\/PAGASA.DOST.GOV.PH<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">For more information about the celebration, kindly contact Ms. Ma. Rosario C. Ramos, Chief, Space Science and Astronomy Section (SSAS) at the telephone number (02) 8284-0800 loc 106 or send an email at nawph.pagasa@gmail.com.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#f8f8f8; color:#22313f; font-size:14px\">Original signed:<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><strong><span style=\"font-size:10.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-size:10.0pt\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2022-01-21",
                    "created_at": "2022-01-21 14:46:57",
                    "updated_at": "2022-01-21 17:32:12",
                    "deleted_at": null
                }, {
                    "id": 102,
                    "tags": "Special Weather Outlook During the Christmas Holidays 2021",
                    "title": "SPECIAL WEATHER OUTLOOK DURING THE CHRISTMAS HOLIDAYS",
                    "image_path": "",
                    "description": "<strong>(24 DECEMBER 2021 - 02 JANUARY 2022)<\/strong><br \/>\r\n<br \/>\r\nThe Northeast Monsoon, Tail-end of Cold Front (Shear Line) and the approach of a Low Pressure Area (LPA) will be the dominant weather systems to affect the entire archipelago this coming holiday season.<br \/>\r\n<br \/>\r\nOn Friday, until Saturday (24-25 December): the eastern section of Luzon, Visayas and Mindanao will be mostly cloudy skies with scattered light rains while the rest of Luzon will be partly cloudy with isolated light rains.<br \/>\r\n<br \/>\r\nBy Sunday until Tuesday (26-28 December): occasional rains are expected over the eastern section of Luzon and Mindanao and Eastern Visayas due to the southward migration of the Shear Line. The rest of the country will be cloudy with light rains.<br \/>\r\n<br \/>\r\nBy Wednesday until Friday (29-31 December 2021): frequent rains over southern Luzon, Visayas and Mindanao caused by the approach of Low Pressure Area (LPA). The rest of Luzon will have partly cloudy with isolated light rains particularly the eastern section.<br \/>\r\n<br \/>\r\nOn New Year's Day (Saturday) until Sunday (01-02 January): southern Luzon, Visayas and Mindanao will be cloudy with scattered rainshowers while the rest of Luzon will have fair weather condition apart from isolated passing light rains.<br \/>\r\n<br \/>\r\nFlood and landslides are expected over prone areas of Visayas and Mindanao and the provinces over the eastern section of Luzon.<br \/>\r\n<br \/>\r\nSea travelers over the seaboards of the country specially on the eastern section should exercise extra caution due to strong winds that could generate big waves.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone number (02) 8284-0800 loc. 805 or log on to www.bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\nVICENTE B. MALANO, Ph.D,<br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2021-12-23",
                    "created_at": "2021-12-23 15:22:47",
                    "updated_at": "2021-12-23 15:29:01",
                    "deleted_at": null
                }, {
                    "id": 101,
                    "tags": "Press Statement",
                    "title": "LOW-PRESSURE AREA (LPA) OVER THE PACIFIC",
                    "image_path": "",
                    "description": "<strong>PRESS STATEMENT<\/strong><br \/>\r\n22 December 2021<br \/>\r\n<br \/>\r\nThis is an update on the low-pressure area (LPA) being monitored by PAGASA that is expected to enter the Philippine Area of Responsibility (PAR).<br \/>\r\n<br \/>\r\nBased from all available data today, the low-pressure area (LPA) over the Pacific is expected to enter the PAR on the 26rd or 27th of December. It will be closest to the landmass of Mindanao on the evening of 29th or morning of 30th of December. This LPA has 60-70% chance to develop into a tropical depression. In this regard, the public are advised to continue monitoring for possible changes on the forecast scenario, undertake precautionary measures, and remain vigilant against unofficial information coming from unverified sources.<br \/>\r\n<br \/>\r\nOfficial information is being released by PAGASA through the following official accounts:<br \/>\r\n<br \/>\r\nWebsite: bagong.pagasa.dost.gov.ph<br \/>\r\nFacebook: Dost_pagasa<br \/>\r\nTwitter: @dost_pagasa<br \/>\r\nYouTube: DOST-PAGASA WEATHER REPORT<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, PhD<br \/>\r\nAdministrator, PAGASA<\/strong>",
                    "type": "2",
                    "published_at": "2021-12-22",
                    "created_at": "2021-12-22 13:07:21",
                    "updated_at": "2021-12-22 14:13:40",
                    "deleted_at": null
                }, {
                    "id": 100,
                    "tags": "Press Statement",
                    "title": "PRESS STATEMENT",
                    "image_path": "",
                    "description": "<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">There are posts currently circulating online and being shared in various social networking services stating there is a low-pressure area (LPA) that will enter the Philippine Area of Responsibility (PAR) before Christmas and affect the Mindanao area. To prevent unwanted panic on the part of the public, we would like to make the following clarifications.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Based from all available data today, PAGASA is monitoring a low-pressure area (LPA) over the Pacific that is expected to enter the PAR on the 23<sup>rd<\/sup> or 24<sup>th<\/sup> of December. It will be closest to the landmass of Mindanao on the evening of 25<sup>th<\/sup> or morning of 26<sup>th<\/sup> of December. This LPA has 30-40% chance to develop into a tropical depression. In this regard, <\/span><span style=\"font-size:11.0pt\">the public is advised to undertake precautionary measures, continue monitoring for updates and remain vigilant against unofficial information coming from unverified sources. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Official information is being released by PAGASA through the following official accounts:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Website: <strong>bagong.pagasa.dost.gov.ph<\/strong><\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Facebook: <strong>Dost_pagasa<\/strong><\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Twitter: <strong>@dost_pagasa<\/strong><\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">YouTube: <strong>DOST-PAGASA WEATHER REPORT<\/strong><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span style=\"font-size:11.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"font-size:11.0pt\">Administrator, PAGASA<\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2021-12-20",
                    "created_at": "2021-12-21 17:37:15",
                    "updated_at": "2021-12-21 17:37:15",
                    "deleted_at": null
                }, {
                    "id": 99,
                    "tags": "SPECIAL WEATHER OUTLOOK",
                    "title": "BONIFACIO DAY AND NATIONAL COVID-19 VACCINATION DAYS",
                    "image_path": "",
                    "description": "<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"color:black\">SPECIAL WEATHER OUTLOOK FOR THE BONIFACIO DAY ( NOVEMBER 30) AND NATIONAL COVID-19 VACCINATION DAYS<\/span><\/span><br \/>\r\n<span style=\"font-size:8.5pt\"><span style=\"color:black\">(NOVEMBER 29 - DECEMBER 01)<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:10pt\"><span style=\"color:black\">Tomorrow until Tuesday (29 - 30 <\/span><span style=\"background-color:white\"><span style=\"color:black\"><strong><span style=\"font-size:11.0pt\">November<\/span><\/strong><\/span><\/span><span style=\"color:black\">) as the shearline moves gradually to the north, Batanes and <\/span>Babuyan <span style=\"color:black\">Island will experience cloudy skies with scattered rainshowers and thunderstorms. Metro Manila and the rest of the country will have partly cloudy to cloudy skies apart from some isolated rainshowers due to localized thunderstorms.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"color:black\">By Wednesday (<\/span><span style=\"background-color:white\"><span style=\"color:black\"><strong><span style=\"font-size:11.0pt\">01 December)<\/span><\/strong><\/span><\/span><span style=\"color:black\">, a fresh surge of the \"Amihan\" will bring cloudy ski<\/span>es and light rains over Batanes <span style=\"color:black\">and Cagayan. Metro Manila and the rest fo the country will countinue to experience partly cloudy to cloudy skies apart from some isolated localized thunderstorms mostly in the afternoon or evening.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"color:black\">No tropical cyclone is expected. However, this weather outlook will be updated if significant changes in the weather pattern occur.<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:black\">For more information, please contact the Weather Division <strong>(02) 896-4258 <\/strong>o<\/span>r check the agency\u2019s website at <\/span><span style=\"background-color:white\"><span style=\"color:black\"><strong><span style=\"font-size:11.0pt\"><span style=\"font-family:Arial,Helvetica,sans-serif\">bagong.pagasa.dost.gov.ph<br \/>\r\n<br \/>\r\n<br \/>\r\nVICENTE P. PALCON, JR.<br \/>\r\nOIC, Weather Division<\/span><\/span><\/strong><\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-11-28",
                    "created_at": "2021-11-28 10:46:33",
                    "updated_at": "2021-12-22 14:13:11",
                    "deleted_at": null
                }, {
                    "id": 98,
                    "tags": "UNDAS",
                    "title": "UNDAS 2021 SPECIAL WEATHER OUTLOOK",
                    "image_path": "",
                    "description": "The Northeast Monsoon and Shearline will be the dominant weather systems to affect the entire archipelago this coming Undas.<br \/>\r\n<br \/>\r\nToday until Saturday (29 \u2013 30 October): Southern Luzon and Visayas will have cloudy skies with scattered rainshowers and thunderstorms while Mindanao will have fair weather conditions apart from isolated rainshowers in the afternoon or evening. The rest of Luzon will be partly cloudy with passing light rains.<br \/>\r\n<br \/>\r\nFrom Sunday until All Souls\u2019 Day (31 October \u2013 2 November): Generally cloudy skies with scattered rainshowers and thunderstorms will prevail over Visayas and Mindanao, with Northern Mindanao, especially, having widespread rains on Sunday and Monday. The eastern section of Luzon will likewise be cloudy with rains due to the Northeast Monsoon. The rest of Luzon will have mostly cloudy skies with passing light rains.<br \/>\r\n<br \/>\r\nSea travelers over the seaboards of Luzon and Visayas should exercise extra caution due to strong northeasterly winds that could generate big waves while Mindanao will have light to moderate northeasterly surface winds with slight to moderate seas.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8284-0800 local 805, 8926-4258, and 8928-2031 or log on to www.bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\nVICENTE P. PALCON JR.<br \/>\r\nOIC, Weather Division",
                    "type": "2",
                    "published_at": "2021-10-28",
                    "created_at": "2021-10-28 13:53:40",
                    "updated_at": "2021-10-28 13:53:40",
                    "deleted_at": null
                }, {
                    "id": 97,
                    "tags": "Press Release",
                    "title": "ONSET OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "<span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\n<em>Quezon City<\/em><br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>ONSET OF THE NORTHEAST MONSOON<\/strong><br \/>\r\n<br \/>\r\n<span style=\"background-color:white\"><span style=\"color:black\">For the past several days, strong to gale-force northeasterly winds have prevailed over Northern Luzon due to the strengthening of the high-pressure system over Siberia and enhanced by passing of low- pressure areas (LPAs). Moreover, gradual cooling of the surface air temperature over the northeastern part of Luzon has been observed. These meteorological conditions indicate the onset of <strong>Northeast (NE) Monsoon<\/strong> (<em>Amihan<\/em>) season in the country.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"color:black\">With these developments, the northeast wind flow is expected to gradually become more dominant over Northern Luzon, bringing cold and dry air. Surges of cold temperatures may also be expected in the coming months.<\/span><br \/>\r\n<br \/>\r\nMeanwhile, with the on-going La Nina, NE monsoon rainfall may be enhanced that could trigger floods, flash floods, and rain-induced landslides over susceptible areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong><span style=\"background-color:white\"><span style=\"color:black\">VICENTE B. MALANO, Ph.D. <\/span><\/span><\/strong><br \/>\r\n<span style=\"background-color:white\"><span style=\"color:black\">Administrator <\/span><\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-10-25",
                    "created_at": "2021-10-25 14:14:58",
                    "updated_at": "2021-10-25 16:50:04",
                    "deleted_at": null
                }, {
                    "id": 96,
                    "tags": "Southwest Monsoon",
                    "title": "TERMINATION OF THE SOUTHWEST MONSOON",
                    "image_path": "",
                    "description": "<strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\nQuezon City<br \/>\r\n<br \/>\r\n<strong>TERMINATION OF THE SOUTHWEST MONSOON<\/strong><br \/>\r\n<br \/>\r\nRecent analyses over the past few days show that the Southwest Monsoon (SWM) has significantly weakened. In addition, the strengthening of the high pressure area over mainland Asia and the expected northeasterly surge over Northern Luzon within the next five days confirms the gradual changing of the season.<br \/>\r\n<br \/>\r\nWith these developments, the SWM season, locally known as \"Habagat\", is now officially over. This means that the season in the Philippines is now in the process of transition, which will lead to the gradual onset and progression of the Northeast Monsoon (NEM) in the coming weeks.<br \/>\r\n<br \/>\r\nThe on-going La Nina may enhance the NEM which could trigger flooding and rain-induced landslides over vulnerable areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D<\/strong>.<br \/>\r\nAdministrator<br \/>",
                    "type": "2",
                    "published_at": "2021-10-15",
                    "created_at": "2021-10-15 23:04:12",
                    "updated_at": "2021-10-15 23:04:12",
                    "deleted_at": null
                }, {
                    "id": 95,
                    "tags": "La Ni\u00f1a Advisory",
                    "title": "ONSET OF LA NI\u00d1A",
                    "image_path": "",
                    "description": "<strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\nQuezon City<br \/>\r\n<br \/>\r\n<strong>ONSET OF LA NI\u00d1A 2021\/ LA NI\u00d1A ADVISORY # 1<\/strong><br \/>\r\n<br \/>\r\nRecent oceanic and atmospheric conditions indicate La Ni\u00f1a have developed in the tropical Pacific. Since July 2021, the sea surface temperatures in the central and equatorial Pacific started to cool and further strengthened in September reaching La Ni\u00f1a threshold. Based on the latest forecast, La Nina is likely to persist until the first quarter of 2022.<br \/>\r\n<br \/>\r\nLa Ni\u00f1a is usually associated with above normal rainfall conditions across most areas of the country during the last quarter of the year and early months of the following year.<br \/>\r\n<br \/>\r\nRainfall forecast from October 2021 to March 2022 suggests that most parts of the country will likely receive near to above normal rainfall conditions. In addition, four (4) to six (6) tropical cyclones (TCs), most of which are landfalling TCs, are expected to enter\/develop in the Philippine Area of Responsibility (PAR). These TCs may further enhance the Northeast Monsoon and could trigger floods, flashfloods and rain-induced landslides over susceptible areas, particularly in the eastern sections of the country which normally receive greater amount of rainfall at this time of the year. Adverse impacts are likely over the vulnerable areas and sectors of the country.<br \/>\r\n<br \/>\r\nPAGASA will continue to closely monitor the ongoing La Ni\u00f1a and regular updates\/advisories shall be issued as appropriate. Meanwhile, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of this event.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D<\/strong>.<br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2021-10-15",
                    "created_at": "2021-10-15 23:01:45",
                    "updated_at": "2021-10-22 13:32:49",
                    "deleted_at": null
                }, {
                    "id": 94,
                    "tags": "la nina",
                    "title": "LA NI\u00d1A ALERT",
                    "image_path": "",
                    "description": "<strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA<br \/>\r\nS&T Media Service<br \/>\r\nQuezon City<br \/>\r\n<br \/>\r\nPAGASA's recent climate monitoring and analysis indicate that La Ni\u00f1a may emerge in the coming months. La Ni\u00f1a is characterized by unusually cool ocean surface temperatures in the Central and Eastern Equatorial Pacific (CEEP). Based on the latest forecasts by most climate models and experts judgments, there is a 70-80% chance of La Ni\u00f1a forming in the last quarter of 2021 which may persist until the first quarter of 2022.<br \/>\r\n<br \/>\r\nRainfall forecasts also suggest a higher probability of above-normal rainfall conditions in many areas of the country in the next several months. This can be attributed to the expected stronger easterlies, enhanced Northeast (NE) monsoon and tropical cyclone occurrences. Furthermore, the eastern sections of the country which normally receive more rainfall during the last quarter of the year could further increase the likelihood of more adverse impacts such as floods and landslides over highly vulnerable areas.<br \/>\r\n<br \/>\r\nWith this scenario, all concerned agencies are advised to take precautionary measures to mitigate the potential adverse impacts of this looming La Ni\u00f1a.<br \/>\r\n<br \/>\r\nPAGASA will closely monitor these conditions and regular updates and advisories shall be issued as appropriate. For more information, you may contact the Climate Monitoring and Prediction Section (CLIMPS), Climatology and Agrometeorology Division (CAD) at telephone number 8284-0800 local 906 or through email: pagasa.climps@gmail.com<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D<\/strong>.<br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2021-09-14",
                    "created_at": "2021-09-14 11:44:13",
                    "updated_at": "2021-09-14 11:51:03",
                    "deleted_at": null
                }, {
                    "id": 93,
                    "tags": "News",
                    "title": "Press Statement on STY MARIA",
                    "image_path": "",
                    "description": "<span style=\"font-size:10pt\"><strong><span style=\"font-size:11.0pt\">PRESS STATEMENT<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">25 July 2021<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">There are posts currently circulating online and being shared in various social networking services stating there is a tropical cyclone named \u201cMARIA\u201d will be hitting the country as a \u201cSuper Typhoon\u201d. To prevent unwanted panic on the part of the public, we would like to make the following clarifications.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Based from all available data, apart from Typhoon \u201cIN-FA\u201d and Tropical Storm \u201cNEPARTAK\u201d outside the Philippine Area of Responsibility (PAR) there are no other tropical cyclones that are expected to enter the PAR and affect the Philippine landmass within the next 3-5 days. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Official information is being released by PAGASA through the following official accounts:<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Website: <strong>bagong.pagasa.dost.gov.ph<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Facebook: <strong>Dost_pagasa<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Twitter: <strong>@dost_pagasa<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">YouTube: <strong>DOST-PAGASA WEATHER REPORT<\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">The public is advised to undertake precautionary measures, continue monitoring for updates and remain vigilant against unofficial information coming from unverified sources. <\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:10pt\"><strong><span style=\"font-size:11.0pt\">ROBERTO S. SAWI<\/span><\/strong><\/span><br \/>\r\n<span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\">Chief, Weather Forecasting Section<\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-07-25",
                    "created_at": "2021-07-26 11:45:39",
                    "updated_at": "2022-01-26 11:29:10",
                    "deleted_at": null
                }, {
                    "id": 92,
                    "tags": "Press release",
                    "title": "SPECIAL WEATHER OUTLOOK FOR  THE STATE OF THE NATION ADDRESS (SONA)",
                    "image_path": "",
                    "description": "26 July 2021<br \/>\r\n<br \/>\r\nSPECIAL WEATHER OUTLOOK FOR THE STATE OF THE NATION ADDRESS (SONA)<br \/>\r\n26 July 2021<br \/>\r\n<br \/>\r\nThe \u201cHabagat\u201d (Southwest Monsoon) will continue to be the dominant weather system in the next five days.<br \/>\r\n<br \/>\r\nToday (26 July 2021), the western section of Luzon including Metro Manila will experience cloudy skies with scattered light to moderate with at times heavy rains and isolated thunderstorms. No tropical cyclone is expected.<br \/>\r\n<br \/>\r\nModerate to strong southwesterly winds will prevail and Manila Bay will be moderate to rough.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes that may occur.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at (02) 8926-4258 or log on to www.bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\nVICENTE P. PALCON, JR.<br \/>\r\nOIC, Weather Division",
                    "type": "2",
                    "published_at": "2021-07-26",
                    "created_at": "2021-07-26 11:27:59",
                    "updated_at": "2021-07-26 11:27:59",
                    "deleted_at": null
                }, {
                    "id": 91,
                    "tags": "Pres Release",
                    "title": "SPECIAL WEATHER OUTLOOK FOR  THE STATE OF THE NATION ADDRESS (SONA)",
                    "image_path": "",
                    "description": "25 July 2021<br \/>\r\n<br \/>\r\n<br \/>\r\nSPECIAL WEATHER OUTLOOK FOR THE STATE OF THE NATION ADDRESS (SONA)  <br \/>\r\n26 July 2021    <br \/>\r\n<br \/>\r\nThe \u201cHabagat\u201d (Southwest Monsoon) will continue to be the dominant weather system in the next five days.<br \/>\r\n<br \/>\r\nBy Monday (26 July 2021), the western section of Luzon including Metro Manila will experience cloudy skies with scattered light to moderate with at times heavy rains and isolated thunderstorms. No tropical cyclone is expected.<br \/>\r\n<br \/>\r\nModerate to strong southwesterly winds will prevail and Manila Bay will be moderate to rough.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes that may occur.    <br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at (02) 8926-4258 or log on to www.bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nVICENTE P. PALCON, JR.<br \/>\r\nOIC, Weather Division",
                    "type": "2",
                    "published_at": "2021-07-25",
                    "created_at": "2021-07-25 15:02:47",
                    "updated_at": "2021-07-25 15:02:47",
                    "deleted_at": null
                }, {
                    "id": 90,
                    "tags": "Press Release",
                    "title": "SPECIAL WEATHER OUTLOOK FOR  THE STATE OF THE NATION ADDRESS (SONA)",
                    "image_path": "",
                    "description": "25 July 2021<br \/>\r\n<br \/>\r\n<br \/>\r\nSPECIAL WEATHER OUTLOOK FOR THE STATE OF THE NATION ADDRESS (SONA)<br \/>\r\n26 July 2021<br \/>\r\n<br \/>\r\nThe \u201cHabagat\u201d (Southwest Monsoon) will continue to be the dominant weather system in the next five days.<br \/>\r\n<br \/>\r\nBy Monday (26 July 2021), the western section of Luzon including Metro Manila will experience cloudy skies with scattered light to moderate with at times heavy rains and isolated thunderstorms. No tropical cyclone is expected.<br \/>\r\n<br \/>\r\nModerate to strong southwesterly winds will prevail and Manila Bay will be moderate to rough.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes that may occur.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at (02) 8926-4258 or log on to www.bagong.pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nVICENTE P. PALCON, JR.<br \/>\r\nOIC, Weather Division",
                    "type": "2",
                    "published_at": "2021-07-26",
                    "created_at": "2021-07-25 14:55:45",
                    "updated_at": "2021-07-25 14:55:45",
                    "deleted_at": null
                }, {
                    "id": 89,
                    "tags": "LA NI\u00d1A WATCH",
                    "title": "LA NI\u00d1A WATCH",
                    "image_path": "",
                    "description": "<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>PRESS STATEMENT<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\nQuezon City, 16 July 2021<\/span><\/span><br \/>\r\n<p dir=\"ltr\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">PAGASA has been continuously monitoring the possible re-emergence of La Ni\u0144a since April 2021. La Ni\u00f1a is characterized by unusually cooler than average sea surface temperatures (SSTs) in the central and eastern equatorial Pacific (CEEP). Based on the current conditions and model forecasts, there is more than fifty percent (50%) chance that La Ni\u00f1a will develop in either late October or November 2021, which may last through the first quarter of 2022. Meanwhile, cool El Ni\u00f1o Southern Oscillation (ENSO) - neutral conditions are still present in the tropical Pacific.<\/span><\/span><\/p>\r\n\r\n<div dir=\"ltr\"><br \/>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">With this development, above normal rainfall conditions are expected over some parts of the country in the coming several months. Potential adverse impacts of the developing La Ni\u00f1a include floods and landslide over vulnerable areas, with varying magnitude. <\/span><\/span><\/div>\r\n\r\n<div dir=\"ltr\"><br \/>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">All concerned agencies are advised to take precautionary measures to mitigate the potential adverse impacts of the re-emerging La Ni\u00f1a. PAGASA will closely monitor these conditions and regular updates and advisories shall be issued as appropriate.<\/span><\/span><\/div>\r\n<br \/>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">For more information, please call the Climate Monitoring and Prediction Section (CLIMPS), Climatology and Agrometeorology Division (CAD) at telephone number 8284-0800 local 906 or through email:pagasa.climps@gmail.com.<br \/>\r\n<br \/>\r\n<br \/>\r\nSigned<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-07-16",
                    "created_at": "2021-07-16 15:12:52",
                    "updated_at": "2021-07-16 15:28:58",
                    "deleted_at": null
                }, {
                    "id": 88,
                    "tags": "Independence day 2021",
                    "title": "Special Weather Outlook on the Celebration of Independence Day",
                    "image_path": "",
                    "description": "PRESS STATEMENT<br \/>\r\nDOST-PAGASA<br \/>\r\nS & T Media Service<br \/>\r\n<br \/>\r\n<strong>SPECIAL WEATHER OUTLOOK ON THE CELEBRATION OF INDEPENDENCE DAY<\/strong><br \/>\r\n<strong>(12 June 2021)<\/strong><br \/>\r\n<br \/>\r\nThe temporary dominance of the high-pressure system over the Pacific Ocean weakens the southwesterly flow over the entire archipelago.<br \/>\r\n<br \/>\r\n<strong>Luzon <\/strong>including<strong> Metro Manila<\/strong> will have fair weather condition in the morning becoming cloudy in the afternoon with scattered rainshowers and thunderstorms, while <strong>Visayas and Mindanao<\/strong> will be generally cloudy with rainshowers and thunderstorms.<br \/>\r\n<br \/>\r\nLight to moderate southwesterly surface windflow will prevail over the western section of the country with light to moderate coastal waters.  Elsewhere, winds will be light and variable with slight coastal seas except during thunderstorms.<br \/>\r\n<br \/>\r\nNo tropical cyclone formation is expected with the Philippine area of responsibility during the outlook period.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes occur.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8926-4258 or log on to www.bagong.pagasa.dost.gov.ph<br \/>\r\n<br \/>\r\noriginal signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE P. PALCON, JR.<\/strong><br \/>\r\nOfficer-in-Charge, Weather Division",
                    "type": "2",
                    "published_at": "2021-06-11",
                    "created_at": "2021-06-11 13:41:05",
                    "updated_at": "2021-06-11 13:41:05",
                    "deleted_at": null
                }, {
                    "id": 87,
                    "tags": "ONSET OF THE RAINY SEASON",
                    "title": "ONSET OF THE RAINY SEASON",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong><span style=\"font-size:12.0pt\">Press Statement<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:12.0pt\">DOST-PAGASA<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:12.0pt\">S & T Media Service<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\">The passage of Tropical Storm Dante and the occurrence of widespread rainfall monitored by PAGASA in the last five days for areas under Type I climate confirm the <strong>onset of the rainy season<\/strong>. Intermittent rains, associated with the Southwest (SW) monsoon will continue to affect Metro Manila and the western section of the country.<\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\">The probability of near to above normal rainfall conditions is high in the next two months (June-July). <span style=\"color:#22313f\">However, breaks in rainfall events (also known as monsoon breaks), which can last for several days or weeks, may still occur.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"color:#22313f\">PAGASA will continue to closely monitor the situation and updates\/advisories shall be issued as appropriate. The public and all concerned agencies are advised to take precautionary measures against the impacts of the rainy season.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"color:#22313f\">For more information, you may contact PAGASA at telephone numbers 927-1335 and 8284-0800 local 906.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:16px\"><span style=\"font-family:Tahoma,sans-serif\">Signed<\/span><\/span><br \/>\r\n<span style=\"font-size:16px\"><span style=\"font-family:Tahoma,sans-serif\"><strong>VICENTE B. MALANO, Ph. D.<\/strong><\/span><br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-06-04",
                    "created_at": "2021-06-04 18:33:33",
                    "updated_at": "2021-06-04 19:42:40",
                    "deleted_at": null
                }, {
                    "id": 86,
                    "tags": "special weather outlook, semana santa 2021",
                    "title": "Special Weather Outlook on the Observance of Semana Santa",
                    "image_path": "",
                    "description": "PRESS STATEMENT<br \/>\r\nDOST-PAGASA<br \/>\r\nS & T Media Service<br \/>\r\n<br \/>\r\n<strong>SPECIAL WEATHER OUTLOOK ON THE OBSERVANCE OF SEMANA SANTA<\/strong><br \/>\r\n<strong>(28 March - 03 April 2021)<\/strong><br \/>\r\n<br \/>\r\nThe development and approach of low pressure system and the high pressure area are the dominant weather systems to affect most parts of the country during the observance of Semana Santa (Holy Week).<br \/>\r\n<br \/>\r\n<strong>Metro Manila<\/strong> will be partly cloudy skies with isolated afternoon rainshowers. Forecast range of temperature 24 - 34 degrees Celsius. Light to moderate winds coming from the east and southeast will prevail, Manila Bay will be slight to moderate.<br \/>\r\n<br \/>\r\nMostly cloudy skies with scattered rainshowers and thunderstorms over Mindanao beginning Sunday until Friday (28 Mar - 02 Apr) due to the approach of the low pressure system. This weather system is expected to remain as low until it crosses the island by Thursday or Friday (01-02 Apr).<br \/>\r\n<br \/>\r\nLuzon will be partly cloudy skies with isolated afternoon rainshowers and thunderstorms.<br \/>\r\n<br \/>\r\nWarmer temperature ahead over Luzon and everyone is advised to reduce their outdoor activities or prolonged exposure to sunlight which may cause to extreme danger.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant weather changes occur.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8926-4258 or log on to www.bagong.pagasa.dost.gov.ph<br \/>\r\n<br \/>\r\noriginal signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE P. PALCON, JR.<\/strong><br \/>\r\nOfficer-in-Charge, Weather Division",
                    "type": "2",
                    "published_at": "2021-03-26",
                    "created_at": "2021-03-26 17:16:14",
                    "updated_at": "2021-03-26 17:17:16",
                    "deleted_at": null
                }, {
                    "id": 85,
                    "tags": "TERMINATION OF THE NORTHEAST MONSOON",
                    "title": "TERMINATION OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><strong>Press Statement<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\nQuezon City, 26 March 2021<br \/>\r\n<br \/>\r\n<strong>TERMINATION OF THE NORTHEAST MONSOON<\/strong><\/span><\/span><br \/>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">The gradual shift of wind direction from northeasterly to easterly over most parts of the country due to the formation of the High Pressure Area (HPA) over the Northwestern Pacific Ocean signifies the termination of the Northeast Monsoon and the start of dry season and warmer temperatures. With this development, the day-to-day weather across the country will gradually become warmer, though isolated thunderstorms are also likely to occur.<\/span><\/span><\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">The public is advised to take precautionary measures to minimize heat stress and optimize the daily use of water for personal and domestic consumption.<\/span><\/span><\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">PAGASA, despite the on going community quarantine due to COVID-19, will continue to monitor the day-to-day weather and long-term climate situation.<\/span><\/span><\/p>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">For more information, you may reach us through the following telephone numbers: Weather Division, 89271541; CAD-CLIMPS, 82840800 loc. 906; mobile, 09958854441 or through email: <a href=\"mailto:pagasa.climps@gmail.com\">pagasa.climps@gmail.com<\/a>.<br \/>\r\n<br \/>\r\n<br \/>\r\nSigned<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-03-26",
                    "created_at": "2021-03-26 16:07:47",
                    "updated_at": "2021-03-26 17:07:47",
                    "deleted_at": null
                }, {
                    "id": 84,
                    "tags": "Preparation for Warm and Dry Season",
                    "title": "Preparation for Warm and Dry Season",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong>Press Statement<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">DOST-PAGASA<\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">S&T Media Service<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Recent observations from several PAGASA stations showed a gradual increase in daily temperature over most parts of the country. Wind and pressure analyses also indicate the slowly shifting direction of prevailing winds from northeasterly to easterly, the weakening of the high-pressure area in mainland Asia, and the gradual strengthening of the North Pacific High. Considering that these changes in wind patterns and pressure systems are consistent with the changes in wind patterns and pressure systems are consistent with the changing seasons, the Northeast Monsoon season will likely be over by the end of the week. Furthermore, the prevailing weather condition over the country signifies the eventual coming of warm and dry season.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">In the coming days, the number of dry and warm days across the country will gradually increase, through isolated thunderstorms are also likely to occur, especially in the afternoon or evening hours. The sea condition of the coastal waters will remain mainly light to moderate due to the prevalence of the easterlies.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Meanwhile, the on-going La Ni\u00f1a is weakening but may still affect some parts of the country, which may significantly result in above normal rainfall conditions for the month of March.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Due to the warm and dry weather conditions, the public and all concerned government agencies are advised to take precautionary measures to minimize heat stress, optimize the daily use of water for personal and domestic consumption, and prevent any accompanying health risks associated with this climate condition.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Despite the on-going community quarantine due to the COVID-19 pandemic, DOST-PAGASA will continue to monitor the day-to-day weather and long-term climate situation and provide updates when significant changes occur.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">For more information, you may contact the Climatology and Agrometeorology Division (CAD) through the Climate Information & Prediction Section (CLIMPS) at Tel. Nos. (02)8284-0800 loc. 906.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Original Signed:<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong>VICENTE B. MALANO, Ph.D.<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-03-23",
                    "created_at": "2021-03-23 17:55:10",
                    "updated_at": "2021-03-23 18:04:48",
                    "deleted_at": null
                }, {
                    "id": 83,
                    "tags": "N\/WMDAY 2021",
                    "title": "Observance of the National and World Meteorological Day 2021",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">Press Statement<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">DOST-PAGASA <\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">S&T Media Service<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">Observance of the National and World Meteorological Day 2021<\/span><\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">The Department of Science and Technology \u2013 Philippine Atmospheric, Geophysical, and Astronomical Administration (DOST-PAGASA) celebrates the 156th National Meteorological Service day in conjunction with the 71st World Meteorological Day (NWMDay) on March 23, 2021. This year, the World Meteorological Organization (WMO) adopted the theme, \"The Oceans, our Climate, and Weather,\" focus on connecting these physical domains within the Earth System.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">The theme underscores the role of the ocean as a major driver of the world\u2019s weather and climate. In the Philippines, the vast area of the Pacific acts as a heat basin that is the source of energy for large-scale atmospheric systems that consequently influence local disturbances. With our changing climate contributing to higher sea surface temperatures, it is integral to understand how the ocean-atmosphere interaction impacts our weather.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">For the first time, the DOST-PAGASA will observe a virtual celebration of the NWMDay due to strict restrictions amidst COVID-19 health crisis. As the country\u2019s national hydrometeorological service, DOST-PAGASA has lined-up several activities highlighting the celebration through the conduct of the following online forums and webinars: <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A scientific forum for stakeholders, partners, disaster managers and academe: <em>\"Linking Philippine Climate and Weather with Tropical Oceans\"<\/em> (23 March). Presentations will focus on the oceans' role in shaping our weather and climate system; the latest theories, models, observations, and the challenges of forecasting El Nino Southern Oscillation (ENSO). As the climate continues to change, special emphasis will be given to our storied past and the transformation of DOST-PAGASA\u2019s marine meteorological services. Foreign speakers from the US National Oceanic and Atmospheric Administration and the Woods Hole Oceanographic Institution, will share their expertise on the above-mentioned topics.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Climate Forum for the Media cum Press Conference (23 March) will provide a briefer of the NWDay celebration and Preparations for the coming dry and rainy seasons.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">In addition, the PAGASA will award a mobile photography contest in the afternoon (23 March), in line with this year\u2019s theme. The photos are posted on our official Facebook page. This tradition traces its roots back to the former Philippine Weather Bureau as the first in Asia to contribute photographs of clouds in the tropical maritime climate, in collaboration with the International Meteorological Organization (precursor of the WMO) project on its first color edition of the International Cloud Atlas. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">As a pre-event, the 134<sup>th<\/sup> Climate Forum for Stakeholders takes place (22 March) to give weather and hydrological updates, and a review and outlook of Philippine climate conditions.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">The celebration will conclude with a virtual symposium: <em>\u201cMeteorology for Science Enthusiasts\u201d (24 March) <\/em>featuring innovations from young scientists. The gathering aims to boost our young science students' capabilities in science and technology encouraging brilliant minds to pursue research to aid climate change adaptation efforts and support early warning of high-impact weather events for disaster risk reduction.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">On the auspicious occasion, the WMO commemorates the World Meteorological Organization's establishment in 1950, while in the national setting, the DOST-PAGASA celebrates the National Meteorological Day by virtue of the Proclamation No. 549 signed in 1995 during the time of then Pres. Fidel V. Ramos.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">This year, the WMO celebration has added timely and appropriate global significance with the of the United Nation\u2019s focus on the \u201cDecade of Oceans Science for Sustainable Development\u201d from 2021-2030.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">For more detailed information, you may contact <strong><em>Dr. Nathaniel T. Servando<\/em><\/strong>, Over-all-Chair of the celebration, at the telephone number (02) 34342675 or <strong><em>Ms. Ma. Elena V. Tan<\/em><\/strong>, Over-all-Coordinator at the telephone number (02) 8929-4855.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Original Signed:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, Ph.D.<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Administrator<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-03-23",
                    "created_at": "2021-03-23 16:43:14",
                    "updated_at": "2021-03-23 18:04:33",
                    "deleted_at": null
                }, {
                    "id": 82,
                    "tags": "weather outlook for EDSA people's power celebration",
                    "title": "Special Weather Outlook on EDSA People's Power Revolution Celebration",
                    "image_path": "",
                    "description": "PRESS STATEMENT<br \/>\r\nDOST-PAGASA<br \/>\r\nS & T Media Service<br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong><span style=\"font-size:11.0pt\">SPECIAL WEATHER OUTLOOK ON EDSA PEOPLE'S POWER REVOLUTION CELEBRATION<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong><span style=\"font-size:11.0pt\">(25 February 2021)<\/span><\/strong><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">The easterlies will be the prevailing weather system to affect most parts of the country in the next three (3) days.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\"><strong>Metro Manila<\/strong> will be partly cloudy to at times cloudy skies with passing light rains. The forecast range of temperature 22 to 32 degrees Celsius with light to moderate winds coming from the east and southeast and Manila Bay will be slight to moderate.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">Northern Luzon will be mostly cloudy skies with light rains, while the eastern section of Visayas and Mindanao will have cloudy skies with scattered rain showers. The rest of the country will be partly cloudy skies apart from isolated passing light rains.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">No tropical cyclone formation is expected within the Philippine Area of Responsibility during the outlook period.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">PAGASA will continue to monitor and inform the public of any significant weather changes that occur.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">For more information, please contact the forecaster on-duty from the Weather Division at the telephone number (02) 8926-4258 or visit www.bagong.pagasa.dost.gov.ph<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">original signed:<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong><span style=\"font-size:11.0pt\">SAMANTHA CHRISTINE V. MONFERO<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><span style=\"font-size:11.0pt\">Officer-in-Charge, Weather Division<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2021-02-24",
                    "created_at": "2021-02-24 11:13:32",
                    "updated_at": "2021-02-24 13:34:26",
                    "deleted_at": null
                }, {
                    "id": 79,
                    "tags": "SPECIAL WEATHER FORECAST  FOR THE CHRISTMAS HOLIDAYS 2020",
                    "title": "SPECIAL WEATHER FORECAST  FOR THE CHRISTMAS HOLIDAYS",
                    "image_path": "",
                    "description": "PRESS STATEMENT<br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The weather systems that are likely to affect most parts of the country during the Christmas Holidays are the southward migration of the tail-end of a frontal system, prevailing Northeast Monsoon and the passage of a low pressure system. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">December 21-22: The northern and the eastern sections of Central and Southern Luzon, Eastern Visayas and the eastern section of Mindanao will have mostly cloudy skies with passing light rains becoming intermittent rains over the Cagayan Valley Region. The rest of the country will experience partly cloudy to at times cloudy skies with passing light rains.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">December 23-25: Luzon will have partly cloudy to cloudy skies with isolated passing light rains while Visayas and Mindanao will experience generally fair weather conditions apart from some isolated rainshowers due to localized thunderstorms on Christmas day. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">December 26-31: A low pressure system is expected to approach the eastern section of Mindanao and will make landfall over Eastern Visayas. It will then cross Central and Western Visayas then move towards the Palawan province on the 28<sup>th<\/sup> of December. The weather condition throughout the whole archipelago will be generally cloudy with rainshowers becoming frequent over Eastern Visayas, Bicol Region, the province of Quezon and the eastern section of Northern and Central Luzon. Flash floods and landslides are expected. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">January 01-02, 2021: the tail-end of a frontal system and the southward migration of the Northeast Monsoon will bring frequent rains over the provinces of Cagayan, Isabela and Aurora. Flashfloods and landslides are expected. The rest of the country will experience generally fair weather conditions apart from some isolated rainshowers due to localized thunderstorms<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Sea travelers are advised to exercise extra caution due to expected big waves particularly over the seaboards of Northern Luzon, inland areas of Southern Luzon, Visayas and Mindanao. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PAGASA will continue to monitor and inform the public of any significant weather changes occur. <\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">For more information, please contact the forecaster on duty of the Weather Division at telephone numbers (02) 8927-2031 log on to <a href=\"http:\/\/www.pagasa.dost.gov.ph\"><span style=\"color:blue\">www.pagasa.dost.gov.ph<\/span><\/a>.<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nSigned<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>LANDRICO U. DALIDA Jr., Ph.D.<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">OIC, PAGASA <\/span><\/span>",
                    "type": "2",
                    "published_at": "2020-12-21",
                    "created_at": "2020-12-25 18:16:01",
                    "updated_at": "2020-12-25 18:28:14",
                    "deleted_at": null
                }, {
                    "id": 78,
                    "tags": "ONSET OF THE NORTHEAST MONSOON",
                    "title": "Onset of the Northeast Monsoon",
                    "image_path": "",
                    "description": "<strong>Press Statement<\/strong><br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\n<br \/>\r\nFor the past several days, strong to gale-force northeasterly winds have prevailed over Northern Luzon due to the strengthening of the high pressure system over Siberia and enhanced by passing tropical cyclones. Moreover, gradual cooling of the surface air temperature over the northeastern part of Luzon has been observed. These meteorological conditions indicate the onset of <strong>Northeast Monsoon<\/strong> (<em>Amihan<\/em>) season in the country.<br \/>\r\n<br \/>\r\nWith these developments, the northeast windflow is expected to gradually become more dominant over Northern Luzon, bringing cold and dry air. Surges of cold temperatures may also be expected in the coming months.<br \/>\r\n<br \/>\r\nMeanwhile, with the on-going La Nina, <em>Amihan<\/em> may be enhanced and trigger floods, flash floods, and rain-induced landslides over susceptible areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\n\r\n<p><strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\n<span style=\"display:none\"> <\/span><span style=\"display:none\"> <\/span><span style=\"display:none\"> <\/span>Administrator<\/p>",
                    "type": "2",
                    "published_at": "2020-11-06",
                    "created_at": "2020-11-06 15:53:45",
                    "updated_at": "2020-11-06 15:53:45",
                    "deleted_at": null
                }, {
                    "id": 77,
                    "tags": "TERMINATION OF SOUTHWEST MONSOON",
                    "title": "Termination of Southwest Monsoon",
                    "image_path": "",
                    "description": "PRESS STATEMENT<br \/>\r\nDOST-PAGASA S & T Media Service<br \/>\r\n<br \/>\r\nRecent analyses showed that a significant weakening of the Southwest Monsoon has been observed over the last few days. Moreover, the strengthening of the high-pressure area over the Asian continent has led to the gradual changing of the season.<br \/>\r\n<br \/>\r\nWith these developments, the Southwest Monsoon season or known locally as \"Habagat\" is now officially over. The season in the Philippines is on the process of transition and will be expecting the gradual start of the Northeast Monsoon (NE) season in the coming days with a shift in the direction of the winds.<br \/>\r\n<br \/>\r\nMeanwhile, with the on-going La Ni\u00f1a, the NE monsoon may be enhanced that could trigger floods, flashfloods and rain-induced landslides over susceptible areas. Therefore, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of these events.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nSigned<br \/>\r\nVICENTE B. MALANO, Ph.D<br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2020-10-22",
                    "created_at": "2020-10-23 10:24:23",
                    "updated_at": "2020-10-23 14:08:46",
                    "deleted_at": null
                }, {
                    "id": 76,
                    "tags": "LA NI\u00d1A",
                    "title": "ONSET OF LA NI\u00d1A 2020\u00a0",
                    "image_path": "",
                    "description": "<p dir=\"ltr\"><strong>Recent oceanic and atmospheric indicators signify La Ni\u00f1a is present in the tropical Pacific. Since June 2020, the sea surface temperature in the central and equatorial Pacific started to cool and further strengthened in September 2020 reaching La Ni\u00f1a threshold. Based on the latest forecast, weak to moderate La Ni\u00f1a is likely to persist until the first quarter of 2021. <\/strong><\/p>\r\n\r\n<p dir=\"ltr\"><strong>La Ni\u00f1a is usually associated with above normal rainfall conditions across most areas of the country during the last quarter of the year and early months of the following year. <\/strong><\/p>\r\n\r\n<p dir=\"ltr\"><strong>Rainfall forecast from October 2020 to March 2021 suggests that most parts of the country will likely receive near to above normal rainfall conditions. In addition, five (5) to eight (8) tropical cyclones (TCS), most of which are landfalling TCs, are expected to enter\/develop in the Philippine Area of Responsibility (PAR). These TCs may further enhance the Northeast Monsoon and could trigger floods, flashfloods and rain-induced landslides over susceptible areas, particularly on the eastern sections of the country which normally receive greater amount of rainfall at this time of the year. Adverse impacts are likely over the vulnerable areas and sectors of the country. <\/strong><\/p>\r\n\r\n<p dir=\"ltr\"><strong>PAGASA will continue to closely monitor the ongoing La Ni\u00f1a and regular updates\/advisories shall be issued as appropriate. Meanwhile, all concerned government agencies and the public are advised to take precautionary measures to mitigate the potential impacts of this event. <\/strong><\/p>",
                    "type": "2",
                    "published_at": "2020-10-02",
                    "created_at": "2020-10-02 14:08:02",
                    "updated_at": "2020-10-02 14:08:02",
                    "deleted_at": null
                }, {
                    "id": 75,
                    "tags": "La Ni\u00f1a Alert",
                    "title": "LA NI\u00d1A ALERT",
                    "image_path": "",
                    "description": "Recent PAGASA's climate monitoring and analyses suggest that La Ni\u00f1a may develop in the coming months. La Ni\u00f1a is characterized by unusually cool ocean surface temperatures in the central and eastern equatorial Pacific (CEEP). Since August 2020, further cooling of sea surface temperatures (SSTs) have been observed across the CEEP, while atmospheric indicator is now at La Ni\u00f1a thresholds. Most climate models suggest the chance of La Ni\u00f1a forming in 2020 is >70%. <a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/LA_NINA_ALERT.pdf\">Continue Reading.<\/a>",
                    "type": "2",
                    "published_at": "2020-09-09",
                    "created_at": "2020-09-11 16:00:02",
                    "updated_at": "2020-09-11 16:00:02",
                    "deleted_at": null
                }, {
                    "id": 74,
                    "tags": "National Disaster Resilience Month July 2020",
                    "title": "National Disaster Resilience Month July 2020",
                    "image_path": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/5f1e98438c70f_5f1e98438c77b.JPG",
                    "description": "In celebration of National Disaster Resilience Month 2020, DOST-PAGASA will conduct activities to feature its disaster preparedness innovations and prevention and mitigation initiatives. This includes lectures on tropical cyclone and its hazards. This will be hosted via Zoom and streamed on DOST-PAGASA Facebook page.<br \/>\r\n<br \/>\r\nJuly 28, 2020: Preparing for Tropical Cyclones and its Hazards in time of Pandemic<br \/>\r\nJuly 30, 2020: DOST-PAGASA DRR Priority Projects 2020<br \/>\r\nJuly 31, 2020: Resilient Kids for Safer Communities<br \/>\r\n<br \/>\r\nAdmission is free!<br \/>\r\n<br \/>\r\nStay tuned to DOST-PAGASA Facebook events page for the registration.<br \/>\r\n<br \/>\r\n<a href=\"https:\/\/www.facebook.com\/hashtag\/ndrm2020?__eep__=6&amp;epa=HASHTAG\" target=\"_blank\">#NDRM2020<\/a> <a href=\"https:\/\/www.facebook.com\/hashtag\/dost_pagasa?__eep__=6&amp;epa=HASHTAG\" target=\"_blank\">#Dost_Pagasa<\/a> <a href=\"https:\/\/www.facebook.com\/hashtag\/resilienceph?__eep__=6&amp;epa=HASHTAG\" target=\"_blank\">#ResiliencePH<\/a>",
                    "type": "2",
                    "published_at": "2020-07-27",
                    "created_at": "2020-07-27 17:03:00",
                    "updated_at": "2020-07-27 17:03:00",
                    "deleted_at": null
                }, {
                    "id": 73,
                    "tags": "LA NI\u00d1A WATCH",
                    "title": "LA NI\u00d1A WATCH",
                    "image_path": "",
                    "description": "<p><span style=\"color:#222222\"><span style=\"color:black\">PAGASA has been continuously monitoring the possible development of La Ni\u0144a since March 2020. La Nina is characterized by <\/span>unusually cooler than average sea surface temperatures (SSTs) in the central and eastern equatorial Pacific (CEEP).   Current conditions and model forecasts show that there is more than fifty percent (50%) chance that a weak La Ni\u00f1a will develop in either late October or November 2020, which may last through the first quarter of 2021. However, cool El Nino Southern Oscillation (ENSO) - neutral conditions are still present in the tropical Pacific. <\/span><a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/laninawatch_july16 2020.pdf\" target=\"_blank\">Continue Reading<\/a><\/p>",
                    "type": "2",
                    "published_at": "2020-07-16",
                    "created_at": "2020-07-16 17:36:49",
                    "updated_at": "2020-07-16 17:36:49",
                    "deleted_at": null
                }, {
                    "id": 72,
                    "tags": "TFAW 2020 puts up fight against viruses and pandemic",
                    "title": "TFAW 2020 puts up fight against viruses and pandemic",
                    "image_path": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/5ef19429b8bff_5ef19429b8c79.JPG",
                    "description": "<p dir=\"ltr\"><span style=\"font-size:14px\">The Philippine Atmospheric, Geophysical and Astronomical Services Administration (DOST-PAGASA) puts up fight against viruses and pandemic on this year\u2019s Typhoon and Flood Awareness Week (TFAW) from June 21-27, 2020 with this year\u2019s theme: <em>\u201cHanda sa Tag-ulan, Iwas Sakit at Sakuna\u201d<\/em>.<\/span><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\">The goal of this observance is to highlight how disaster preparedness and scientific knowledge can be effective to ensure the safety, well-being and economic security of people and environment in human-made and natural hazards such as those brought by rainy season especially as the Coronavirus-19 (CoVid-19) threats continues to affect the country.<\/span><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\">In compliance with the guidelines of the Inter-Agency Task Force on Emerging Infectious Diseases (IATF-EID), DOST-PAGASA will maximize online platforms to conduct its information, education, and communication (IEC) campaigns. Webinars, interactive activities and trivia will be posted through the official Facebook event page: Typhoon and Flood Awareness Week (@tfaw.dostpagasa).<\/span><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\">A Climate Outlook Forum will be conducted on 24 June 2020 and will be open for stakeholders and media partners. The state weather bureau will also organize an open-to-public Webinar on DOST-PAGASA 24\/7 Operations on New Normal on 26 June 2020. Both activities will be moderated by DOST-PAGASA specialists.<\/span><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\">TFAW is observed every third week of June by virtue of Proclamation no. 1535 signed in 2008.<\/span><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><em><span style=\"font-size:14px\">For more information, please contact:<\/span><\/em><br \/>\r\n<br \/>\r\n<\/p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:14px\"><strong>VENUS R. VALDEMORO<\/strong><br \/>\r\n<em>Chief, Public Information Unit<br \/>\r\nTPIS-RDTD<br \/>\r\n<br \/>\r\nPhone: (02) 8284-08-00 loc. 102 \/ 103<br \/>\r\nEmail: piias@pagasa.dost.gov.ph<br \/>\r\nvenusvaldemoro.ph@gmail.com<\/em><\/span><\/p>",
                    "type": "2",
                    "published_at": "2020-06-22",
                    "created_at": "2020-06-23 13:27:12",
                    "updated_at": "2020-06-23 13:43:03",
                    "deleted_at": null
                }, {
                    "id": 71,
                    "tags": "Monsoon",
                    "title": "ONSET OF THE RAINY SEASON",
                    "image_path": "",
                    "description": "Press Statement: 12 June 2020<br \/>\r\n<br \/>\r\nThe occurrence of scattered thunderstorms, Tropical Depression \u201cBUTCHOY\u201d and the Southwest Monsoon (Habagat) during the last five days have brought a significant amount of rains over the western sections of Luzon and Visayas. This satisfies the criteria of the start of the rainy season in the areas affected by Habagat which will continue to experience scattered to widespread rains and thunderstorms in the coming days. However, such rain events may be followed by dry periods (monsoon break) that could last for several days to two weeks.<br \/>\r\n<br \/>\r\nPAGASA will continue to closely monitor the situation and updates\/advisories shall be issued as appropriate. The public and all concerned agencies are advised to take precautionary measures against the impacts of the rainy season.<br \/>\r\n<br \/>\r\nFor further information, please contact PAGASA at telephone numbers (02) 8927- 1335 or (02) 8927-2877, mobile numbers: 09159032795, 09958854441 or through email: pagasawfs@gmail.com and pagasa.climps@gmail.com.",
                    "type": "2",
                    "published_at": "2020-06-12",
                    "created_at": "2020-06-12 11:58:13",
                    "updated_at": "2020-07-01 10:26:38",
                    "deleted_at": null
                }, {
                    "id": 70,
                    "tags": "Weather Outlook",
                    "title": "SPECIAL WEATHER FORECAST FOR THE STATE OF THE NATION ADDRESS (SONA)",
                    "image_path": "",
                    "description": "SPECIAL WEATHER FORECAST FOR THE STATE OF THE NATION ADDRESS (SONA)<br \/>\r\n27 July 2020<br \/>\r\n<br \/>\r\nToday (27 July), Metro Manila will have partly cloudy to cloudy skies. Localized thunderstorms are likely to occur during in the afternoon or evening hours. Forecast range of temperature today will be from 25\u00b0C to 32\u00b0C. Winds will be light and variable.<br \/>\r\n<br \/>\r\nThunderstorms are likely to cause light to moderate with at times heavy rain showers and may be accompanied by lightning and occasional gusts. The public is advised to monitor the Thunderstorm Advisories to be issued by the National Capital Region - PAGASA Regional Services Division (NCR-PRSD).<br \/>\r\n<br \/>\r\nThis weather outlook will be updated if significant changes in the weather pattern occur . For more information, you may contact the Weather Division at (02) 8926-4258 or NCR-PRSD at (02) 8922-1992. You may also log on our website at bagong.pagasa.dost.gov.ph<br \/>\r\n<br \/>\r\n<br \/>\r\nROBERTO S. SAWI<br \/>\r\nOfficer-in-Charge<br \/>\r\nWeather Division",
                    "type": "2",
                    "published_at": "2020-07-27",
                    "created_at": "2020-06-11 15:22:46",
                    "updated_at": "2020-07-27 07:32:27",
                    "deleted_at": null
                }, {
                    "id": 69,
                    "tags": "Weather Outlook",
                    "title": "LABOR DAY WEATHER AND WEEKEND SPECIAL WEATHER OUTLOOK",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Tomorrow (May 1),CARAGA and Davao Region will have cloudy skies with rainshowers and thunderstorms due to an approaching Low Pressure Area (LPA) currently over the eastern seaboard of Mindanao. Meanwhile, Metro Manila and the rest of the country will experience generally warm and humid weather conditions apart from some isolated rainshowers or thunderstorms mostly in the afternoon or evening due to the Easterlies. <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">By Saturday and Sunday (May 2 & 3), Mindanao, Eastern and Central Visayas will have cloudy skies with scattered rainshowers and thunderstorms as the aforementioned LPA may cross Mindanao or may dissipate after landfall over Eastern Mindanao. Flash floods and landslides are possible over some low lying areas and near the mountain slopes. Moreover, PAGASA is not ruling out the possibility of the LPA developing into a tropical cyclone during the outlook period. Hence, residents and disaster risk reduction personnel of the aforementioned areas are advised to monitor for the weather updates from PAGASA.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">This weather outlook will be updated if significant changes in the weather pattern occurs. For more information please contact the Weather Division at telephone number (02) 8926-4258 or log on to <\/span><\/span><a href=\"http:\/\/www.bagong.pagasa.dost.gov.ph\" style=\"color:#0563c1; text-decoration:underline\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">www.bagong.pagasa.dost.gov.ph<\/span><\/span><\/a><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">VICENTE P. PALCON JR.<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">OIC, Weather Division <\/span><\/span><\/span><\/span><br \/>\r\n<br \/>",
                    "type": "2",
                    "published_at": "2020-04-30",
                    "created_at": "2020-04-30 19:59:42",
                    "updated_at": "2020-04-30 19:59:42",
                    "deleted_at": null
                }, {
                    "id": 67,
                    "tags": "S&T PRESS RELEASE",
                    "title": "DOST-PAGASA postpones NWMDay 2020 activities due to COVID-19",
                    "image_path": "",
                    "description": "<p dir=\"ltr\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>S&T PRESS RELEASE<\/strong><br \/>\r\n23 March 2020<br \/>\r\nQuezon City<\/span><\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<strong><span style=\"font-size:14px\">DOST-PAGASA continues to serve amidst threats of COVID-19;<br \/>\r\npostpones its N\/WMDay 2020 activities<\/span><\/strong><br \/>\r\n<br \/>\r\n<span style=\"font-size:14px\">While the Coronavirus Disease (COVID-19) continues to be pandemic despite the<br \/>\r\nefforts of government interventions, DOST-PAGASA commits to serve and provide<br \/>\r\n24\/7 weather forecasts to the Filipinos.<\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<span style=\"font-size:14px\">The dedication of round-the-clock weather forecasters and observers will be<br \/>\r\ncommemorated in the upcoming 70th World Meteorological Day with the theme:<br \/>\r\n\u201cClimate and Water\u201d on 23 March 2020. Moreover, DOST-PAGASA will also be<br \/>\r\ncelebrating its 155 years of providing Meteorological Services in the Philippines<br \/>\r\nwith the theme: \u201cA Legacy in Retrospect to the Pillars of Meteorological Service\u201d on the<br \/>\r\nsame day.<\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<span style=\"font-size:14px\">However, in compliance with Proclamation no. 929 of 2020, DOST-PAGASA<br \/>\r\ntemporarily halts the lined-up activities on March 23 but will push through once the<br \/>\r\nhealth crisis is over. Some of these activities include: a historical walkthrough<br \/>\r\nexhibition of the 155 years of DOST-PAGASA, Science Symposium, the PAGASA<br \/>\r\nLoyalty Awards and the Conferment of Wind Vane Awards, the highest award given<br \/>\r\nby the agency to its partners on disaster risk reduction.<\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<span style=\"font-size:14px\">The agency will still join the World Meteorological Organization in recognizing the<br \/>\r\npassion of weather forecasters and observers, as well as highlight how Science and<br \/>\r\nTechnology (S&T) can aid the Filipinos.<\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">For more information, please contact:<\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><strong>MS. VENUS R. VALDEMORO<\/strong><br \/>\r\n(Officer-in-Charge, Public Information Unit)<br \/>\r\nOverall Coordinator for N\/WMDay 2020<br \/>\r\ninformation@dost.gov.ph<br \/>\r\nvenusvaldemoro.ph@gmail.com<br \/>\r\n(+63 2) 8284-0800 (trunkline)<\/span><\/span><\/p>\r\n\r\n<p dir=\"ltr\"><br \/>\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">24\/7 hotlines:<br \/>\r\n(+63 2) 8927-2877 (Weather Forecasting)<br \/>\r\n(+63 2) 8926-4258 (Weather Forecasting)<br \/>\r\n(+63 2) 8926-6970 (Flood Forecasting)<\/span><\/span><\/p>",
                    "type": "2",
                    "published_at": "2020-03-23",
                    "created_at": "2020-03-23 12:23:10",
                    "updated_at": "2020-03-23 18:12:02",
                    "deleted_at": null
                }, {
                    "id": 66,
                    "tags": "Press Statement",
                    "title": "TERMINATION OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "The gradual shift of wind direction from northeasterly to easterly over most parts of the country due to the establishment of the High Pressure Area (HPA) over the Northwestern Pacific Ocean signifies the <strong>termination of the Northeast Monsoon and the start of dry season<\/strong>. With this development, the day-to-day weather across the country will gradually become warmer, though isolated thunderstorms are also likely to occur.<br \/>\r\n<br \/>\r\nThe public is advised to take precautionary measures to minimize heat stress and optimize the daily use of water for personal and domestic consumption.<br \/>\r\n<br \/>\r\nDespite the on-going enhanced community quarantine due to Covid-19, PAGASA will continue to monitor our day-to-day weather and long-term climate situation.<br \/>\r\n<br \/>\r\nFor more information, you may reach us through the following telephone numbers: 8926-4258, 8927-1335; mobile numbers: 09159032795, 09958854441 or through email: <u>pagasawfs@gmail.com<\/u> and <u>pagasa.climps@gmail.com.<\/u><br \/>\r\n<br \/>\r\nOriginally signed:<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D. <\/strong><br \/>\r\nAdministrator<br \/>\r\n<br \/>",
                    "type": "2",
                    "published_at": "2020-03-20",
                    "created_at": "2020-03-20 17:17:54",
                    "updated_at": "2020-03-20 17:17:54",
                    "deleted_at": null
                }, {
                    "id": 63,
                    "tags": "WEATHER OUTLOOK",
                    "title": "SPECIAL WEATHER OUTLOOK FOR NEW YEAR 2020",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><strong>PRESS RELEASE<\/strong><br \/>\r\n27 December 2019<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">SPECIAL WEATHER OUTLOOK <\/span><\/span><\/strong><\/span><\/span><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">FOR NEW YEAR 2020  <\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">(28 December 2019 \u2013 3 January 2020)<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The weather systems that will likely affect the country during the rest of the Holiday Season are the Northeast Monsoon, Tail-End of a Cold Front, and the Easterlies.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">December 28<\/span><\/span><\/strong><\/span><\/span>\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Extreme Northern Luzon will have cloudy skies with isolated light rains due to the Northeast (NE) Monsoon. Ilocos Region, Cordillera Administrative Region, Aurora province, and the rest of Cagayan Valley will experience cloudy skies with scattered light to moderate rains<strong> <\/strong>due to the Tail-end of a Cold Front (TECF). Metro Manila and the rest of the country will have fair and warm weather conditions with isolated thunderstorms, especially in the afternoon or evening.<\/span><\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">December 29 \u2013 30<\/span><\/span><\/strong><\/span><\/span>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Easterlies will prevail across the country, bringing generally fair and warm weather conditions. Occurrence of isolated thunderstorms in the afternoon or evening may be expected.<\/span><\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">December 31 \u2013 January 1<\/span><\/span><\/strong><\/span><\/span>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The surge of the NE Monsoon will bring cloudy skies with light rains over extreme Northern Luzon. The TECF will develop again and bring cloudy skies with scattered light to moderate rains over Cagayan, Isabela, and Aurora. Metro Manila and the rest of Luzon will have fair and cooler weather especially in the morning. The rest of the country will be sunny and warm apart from isolated rainshowers.<\/span><\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">January 2 \u2013 3<\/span><\/span><\/strong><\/span><\/span>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The NE Monsoon will affect the whole of Luzon and continue to bring cool weather conditions. Northern Luzon will have cloudy skies with light rains while Metro Manila and the rest of Luzon will have passing light rains. The rest of the country will have generally fair weather with possible occurrence of isolated thunderstorms.<\/span><\/span><\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">No tropical cyclone<\/span><\/span><\/strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> is expected to affect the country throughout the outlook period. Still, in light of the holiday season, the public is advised to continuously monitor for updates. PAGASA will continue to monitor and inform the public of any significant changes in the weather.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">For more information, please contact the forecaster on duty at the Weather Division with telephone number (02) 8927-2031 or log on to <\/span><\/span><a href=\"http:\/\/www.pagasa.dost.gov.ph\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:blue\">bagong.pagasa.dost.gov.ph<\/span><\/span><\/span><\/a><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.<\/span><\/span><\/span><\/span><br \/>\r\n<br \/>\r\nOriginal signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">ESPERANZA O. CAYANAN, Ph.D.<\/span><\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Chief, Weather Division <\/span><\/span><\/span><\/span><br \/>",
                    "type": "2",
                    "published_at": "2019-12-27",
                    "created_at": "2019-12-27 14:06:18",
                    "updated_at": "2019-12-27 14:06:18",
                    "deleted_at": null
                }, {
                    "id": 62,
                    "tags": "Annular Solar Eclipse with \"Ring of Fire\" effect an be seen in the Philippines - DOST-PAGASA",
                    "title": "Annular Solar Eclipse with \"Ring of Fire\" effect an be seen in the Phi",
                    "image_path": "",
                    "description": "<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><strong>S&T PRESS RELEASE<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">20 December 2019<\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Quezon City<\/span><\/span><br \/>\r\n<br \/>\r\n<strong><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Annular Solar Eclipse with \u201cRing of Fire\u201d effect can be seen in the Philippines \u2013 DOST-PAGASA<\/span><\/span><\/strong><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Quezon City \u2013 A solar eclipse will occur right after Christmas Day, December 26, 2019, creating a \u201cRing of Fire\u201d effect, according to the Philippine Atmospheric, Geophysical and Astronomical Services Administration (DOST-PAGASA).<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">\u201cThe moon will cross sun completely.  However, the moon\u2019s orbit is in a position farthest away from Earth.  This means that the moon\u2019s apparent size in the sky is not large enough to completely cover the sun, as witnessed during total solar eclipses.  This, instead, creates a \u201cRing of Fire\u201d effect,\u201d says Engr. Mario M. Raymundo, Weather Specialist II.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">The eclipse will be visible in Southernmost parts of the Philippines \u2013 particularly in Glan (Batulak), Balut and Sarangani Island, some parts of Saudi Arabia, Qatar, United Arab Emirates, Oman, India, Sri Lanka, Malaysia, Indonesia, Singapore, Northern Maraina Islands and Guam.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">For the Philippines, the partial solar eclipse will occur early afternoon and estimated to end at around 4:00 PM in Balut Island, Saranggani, Davao Occidental.  The eclipse is expected to last for at least three hours, while the duration of annularity is likely to last for more than two minutes.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">The partial solar eclipse can also be seen in these selected areas:<\/span><\/span><br \/>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Manila<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Quezon City<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Aparri<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Laoag<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Legazpi<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Puerto Princesa<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Mactan<\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">The Philippines last witnessed an annular eclipse on July 20, 1944 that traversed from Puerto Princesa City, Palawan to Southern Mindanao.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">It is expected that the next annular solar eclipse visible in the Philippines will take place on February 28, 2063 which can be seen in most parts of Mindanao.  Another annular solar eclipse will occur on July 24, 2074 passing through Southern Luzon.<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">For Future annular solar eclipses:<\/span><\/span><br \/>\r\n\r\n<ul>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Dec. 26, 2019 \u2013 Annual Solar Eclipse visible in the Philippines (Balut Island)<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">June 21, 2020 \u2013 Annular Solar Eclipse visible in the Philippines as Partial Solar Eclipse<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">June 10, 2021 \u2013 Annual Solar Eclipse not visible in the Philippines<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Oct. 14, 2023 \u2013 Annual Solar Eclipse not visible in the Philippines<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Oct. 02, 2024 \u2013 Annual Solar Eclipse not visible in the Philippines<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Feb. 17, 2026 \u2013 Annual Solar Eclipse not visible in the Philippines<\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Feb. 06, 2027 \u2013 Annual Solar Eclipse not visible in the Philippines <\/span><\/span><\/li>\r\n\t<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">Jan. 26, 2028 \u2013 Annular Solar Eclipse not visible in the Philippines<\/span><\/span><\/li>\r\n<\/ul>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\">###<\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>For more information, please contact:<\/em><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Engr. Dario L. Dela Cruz<\/em><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Chief, Space Sciences and Astronomy Section<\/em><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Trunkline no.: (+632)  8284-08-00 lo<\/em><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Ms. Venus R. Valdemoro<\/em><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Officer-in-Charge, Public Information <\/em><\/span><\/span><br \/>\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Tahoma,sans-serif\"><em>Trunkline no.:  (+632) 824-08-<\/em><\/span><\/span><br \/>\r\n<br \/>",
                    "type": "2",
                    "published_at": "2019-12-20",
                    "created_at": "2019-12-23 18:58:48",
                    "updated_at": "2019-12-23 18:58:48",
                    "deleted_at": null
                }, {
                    "id": 61,
                    "tags": "SPECIAL WEATHER OUTLOOK FOR THE CHRISTMAS HOLIDAYS 2019",
                    "title": "SPECIAL WEATHER OUTLOOK FOR THE CHRISTMAS HOLIDAYS 2019",
                    "image_path": "",
                    "description": "The weather systems that will likely affect most parts of the country during the Christmas Holidays are the prevailing Northeast Monsoon, a low pressure area (LPA) and the passage of a tropical cyclone.<br \/>\r\n<br \/>\r\n<strong>December 21 - 23<\/strong>\r\n<ul>\r\n\t<li>Luzon and Visayas will have generally fair weather apart from isolated thunderstorms. Mindanao will experience cloudy skies with scattered rains and thunderstorms due to the LPA south of Mindanao.<\/li>\r\n<\/ul>\r\n<strong>December 24 -26<\/strong>\r\n\r\n<ul>\r\n\t<li>Southern Luzon, Visayas and northeastern Mindanao will be cloudy with moderate to <strong>occasionally heavy rains and gusty winds <\/strong>due to the tropical cyclone that may cross Visayas.<\/li>\r\n\t<li>Sea travelers are advised to exercise <strong>extra caution<\/strong> due to potentially <strong>rough seas <\/strong>over the coastal waters of southern Luzon, Visayas and Mindanao.<\/li>\r\n\t<li>Eastern section of northern Luzon will have light rains due to Northeast Monsoon. Metro Manila and the rest of Luzon will have generally fair weather apart form isolated thunderstorms.<\/li>\r\n<\/ul>\r\n<strong>December 27<\/strong>\r\n\r\n<ul>\r\n\t<li>Improving weather condition will be experienced over southern Luzon, Visayas and northeastern Mindanao. Metro Manila and the rest of the country will continue to have fair weather condition with possible occurence of isolated thunderstorms.<\/li>\r\n<\/ul>\r\n<br \/>\r\nIn light of the holiday season celebration, the public is advised to continuously monitor for updates particularly on the tropical cyclone that may affect the country during the outlook period.<br \/>\r\n<br \/>\r\nPAGASA will continue to monitor and inform the public of any significant changes in the weather.<br \/>\r\n<br \/>\r\nFor more information, please contact the forecaster on duty of the Weather Division at telephone number (02) 8927-2031 or log on to bagong,pagasa.dost.gov.ph.<br \/>\r\n<br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<strong>ESPERANZA O. CAYANAN, Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "2",
                    "published_at": "2019-12-20",
                    "created_at": "2019-12-20 17:37:38",
                    "updated_at": "2019-12-20 17:37:38",
                    "deleted_at": null
                }, {
                    "id": 60,
                    "tags": "Press Statement on Typhoon \"KAMMURI\"",
                    "title": "Press Statement on Typhoon \"KAMMURI\"",
                    "image_path": "",
                    "description": "<br \/>\r\n<span style=\"font-size:14px\"><span style=\"font-family:Tahoma,sans-serif\">There are posts currently circulating online being shared in various social networking services stating the Typhoon \u201cKAMMURI\u201d will be hitting the country as a \u201cSuper Typhoon\u201d. To prevent unwanted panic on the part of the public, we would like to make some clarifications.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">The Joint Typhoon Warning Center (JWTC) OF THE United States uses 1 minute as wind averaging period for the estimation of maximum sustained winds near the center (MSW), while PAGASA and other meteorological centers in the Western North Pacific use the WMO recommended 10-minute averaging period. Shorter wind averaging periods yield higher wind estimates compared to longer averaging period. As such, <strong>MSW from JWTC are generally higher<\/strong> than PAGASA and other meteorological centers.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Meteorological centers use different thresholds for classifying tropical cyclones as Super Typhoon. Since May 2015, PAGASA classifies a tropical cyclone as Super Typhoon when 10-minute MSW exceeds 220 km\/h. Meanwhile, JTWC\u2019s Super Typhoon, when converted from 1 to 10-minute averaging, has MSW exceeding 185 km\/h. This means that on a 10-minute averaging, <strong>JWTC has lover threshold for classifying Super Typhoon than PAGASA<\/strong>.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Based on latest available data, Typhoon \u201cKAMMURI\u201d (local name: Typhoon \u201cTISOY\u201d) is <strong>less likely to reach Super Typhoon category at this time<\/strong>, but this scenario is not yet ruled out as the Typhoon is forecast to steadily intensify before making landfall in Southern Luzon. Official information on this Typhoon is being released by PAGASA through the following official accounts:<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Website: bagong.pagasa.dost.gov.ph<\/span><br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Facebook: Dost_pagasa<\/span><br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Twitter: @dost_pagasa<\/span><br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">YouTube: DOST-PAGASA WEATHER REPORT<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">The public is advised to undertake precautionary measures, continue monitoring for updates and remain vigilant against unofficial information coming from unverified sources.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Original Signed:<\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\"><strong>ESPERANZA O. CAYANAN, Ph.D.<\/strong><\/span><br \/>\r\n<span style=\"font-family:Tahoma,sans-serif\">Chief, Weather Division<\/span><\/span>",
                    "type": "2",
                    "published_at": "2019-11-29",
                    "created_at": "2019-11-29 16:17:58",
                    "updated_at": "2019-12-09 09:30:29",
                    "deleted_at": null
                }, {
                    "id": 57,
                    "tags": "ONSET OF THE NORTHEAST MONSOON",
                    "title": "ONSET OF THE NORTHEAST MONSOON",
                    "image_path": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/5db23d0791152_5db23d07911c6.jpeg",
                    "description": "For the past several days, strong to gale force northeasterly winds has prevailed over the seaboards of Northern Luzon due to the strengthening of the high pressure system over Siberia. Moreover, gradual cooling of the surface air temperature over the Northeastern part of Luzon has been observed. These meteorological conditions indicate the onset of Northeast Monsoon (Amihan) season in the country. <br \/>\r\n<br \/>\r\nWith these developments, the northeast wind flow is expected to become dominant over most parts of the country, bringing cold and dry air. Surges of cold temperatures may also be expected in the coming days to months.<br \/>\r\n<br \/>\r\n<a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/monsoon\/2019_Oct_Onset%20of%20the%20NE%20monsoon.pdf\">See original<\/a>",
                    "type": "2",
                    "published_at": "2019-10-24",
                    "created_at": "2019-10-25 07:55:50",
                    "updated_at": "2019-10-25 08:12:41",
                    "deleted_at": null
                }, {
                    "id": 56,
                    "tags": "Transition To Northeast Monsoon",
                    "title": "Transition To Northeast Monsoon",
                    "image_path": "",
                    "description": "Recent observations and analysis showed that the general wind pattern has shifted from southwesterly to easterly. This signifies that the southwest monsoon season has officially ended. Moreover, the strengthening of the high pressure systems over the Asian continent has led to the gradual changing of the season.<br \/>\r\n<br \/>\r\nWith these developments, the climate of the Philippines is on transition to the northeast monsoon \"Amihan\" season in the coming days.<br \/>\r\n<br \/>\r\n<a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/monsoon\/transition_nemonsoon.pdf\">See original<\/a>",
                    "type": "2",
                    "published_at": "2019-10-07",
                    "created_at": "2019-10-07 17:08:45",
                    "updated_at": "2019-10-08 13:18:24",
                    "deleted_at": null
                }, {
                    "id": 55,
                    "tags": "\u201cHaze Bulletin\u201d",
                    "title": "Statement on alleged \"HAZE BULLETIN\" from a \u201cDost_PAGASA Visayas\u201d FB",
                    "image_path": "",
                    "description": "There are posts related to a <strong>\u201cHaze Bulletin\u201d<\/strong> allegedly issued by PAGASA that are currently<br \/>\r\ncirculating online and being shared in various social networking services. These posts were<br \/>\r\nfound to have originated from a particular <strong>\u201cDost_PAGASA Visayas\u201d<\/strong> Facebook Page.<br \/>\r\nPAGASA would like to inform the public that the aforementioned page is<strong> NOT<\/strong> an official social<br \/>\r\nmedia account of the agency. Furthermore, the agency <strong>has not issued<\/strong> any \u201cHaze Bulletin\u201d.<br \/>\r\n<br \/>\r\nAll PAGASA products from the Central Office and the Regional Services Divisions are posted<br \/>\r\nonline through the following official accounts:<br \/>\r\n<br \/>\r\nWebsite: <strong>bagong.pagasa.dost.gov.ph<\/strong><br \/>\r\nFacebook:<strong> Dost_pagasa<\/strong><br \/>\r\nTwitter: <strong>@dost_pagasa<\/strong><br \/>\r\nYouTube: <strong>DOST-PAGASA WEATHER REPORT<\/strong><br \/>\r\n<br \/>\r\nThe public is advised to remain vigilant against unofficial information coming from unverified sources.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\nsigned<br \/>\r\nROBERTO S. SAWI<br \/>\r\nChief, Weather Forecasting Section<br \/>\r\nWeather Division, PAGASA",
                    "type": "2",
                    "published_at": "2019-09-19",
                    "created_at": "2019-09-19 20:49:35",
                    "updated_at": "2019-09-19 21:02:55",
                    "deleted_at": null
                }, {
                    "id": 54,
                    "tags": "El Ni\u00f1o Advisory No. 7",
                    "title": "El Ni\u00f1o Advisory No. 7 (Final)",
                    "image_path": "",
                    "description": "The weak El Ni\u00f1o which started since the last quarter of 2018 had ended. The warmer than average sea surface temperatures (SSTs) in the tropical Pacific Ocean has weakened and transitioned into neutral levels in July. It is expected that ENSO-neutral conditions will likely persist through the remainder of the year. <a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/ENAdvisory_7.pdf\">Continue Reading<\/a>",
                    "type": "2",
                    "published_at": "2019-08-09",
                    "created_at": "2019-08-14 16:49:43",
                    "updated_at": "2019-08-14 16:49:43",
                    "deleted_at": null
                }, {
                    "id": 53,
                    "tags": "El Ni\u00f1o Advisory No. 6",
                    "title": "El Ni\u00f1o Advisory No. 6",
                    "image_path": "",
                    "description": "Weak El Ni\u00f1o condition which started since the last quarter of 2018 had persisted in the central and eastern equatorial Pacific (CEEP). The warmer than average sea surface temperatures (SSTs) have slightly weakened in June, but still within El Ni\u00f1o threshold. It is expected that this event will likely prevail until July to August 2019; however, the probability for it to continue through the later part of 2019, have decreased by 50-55%. <a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/ENAdvisory_6.pdf\">Continue Reading.<\/a>",
                    "type": "2",
                    "published_at": "2019-07-06",
                    "created_at": "2019-07-11 15:23:12",
                    "updated_at": "2019-07-11 16:15:38",
                    "deleted_at": null
                }, {
                    "id": 52,
                    "tags": "El Ni\u00f1o Advisory No. 5",
                    "title": "El Ni\u00f1o Advisory No. 5",
                    "image_path": "",
                    "description": "El Ni\u00f1o conditions continue in the central and eastern equatorial Pacific (CEEP). Since the last quarter of 2018, warmer than the normal sea surface temperature anomaly (SSTA) of at least 0.5\u00baC was observed. Majority of climate models predict that weak El Ni\u00f1o conditions will likely continue until the June-July-August 2019 season (>60% probability). <a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/EN_Advisory%205_sign_cor.pdf\">Continue Reading<\/a>",
                    "type": "2",
                    "published_at": "2019-06-21",
                    "created_at": "2019-06-21 13:38:04",
                    "updated_at": "2019-07-11 16:15:06",
                    "deleted_at": null
                }, {
                    "id": 50,
                    "tags": "Onset of Rainy Season",
                    "title": "ONSET OF RAINY SEASON",
                    "image_path": "",
                    "description": "Quezon City, 14 June 2019<br \/>\r\n<br \/>\r\nThe occurrence of scattered to at times widespread rainfall associated with the Southwest Monsoon during the past few days as observed by most PAGASA stations in the western section of the country <strong>confirms the onset of the rainy season <\/strong>over the areas under the Type I climate. These rains will continue to affect the country, especially over the western sections of Luzon and Visayas. However, breaks in rainfall events (also known as monsoon break) that can last for several days or weeks may still occur.<br \/>\r\n<br \/>\r\nRainfall conditions for July are expected to be generally near to above normal over most parts of Luzon and the Visayas, while generally below normal in most areas of Mindanao and Southern Visayas.<br \/>\r\n<br \/>\r\nMeanwhile, weak El Ni\u00f1o condition persisted in the tropical Pacific since the last quarter of 2018 and may likely to continue during the June-July-August 2019 season.<br \/>\r\n<br \/>\r\nPAGASA will continue to closely monitor the situation and updates\/advisories shall be issued as appropriate. The public and all concerned agencies are advised to take precautionary measures against the impacts of the rainy season.<br \/>\r\n<br \/>\r\nFor more information, you may contact PAGASA at telephone numbers 927-1335 or 434-0955.<br \/>\r\n<br \/>\r\nsigned<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>VICENTE B. MALANO, Ph.D.<\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Administrator<\/span><\/span>",
                    "type": "2",
                    "published_at": "2019-06-14",
                    "created_at": "2019-06-14 17:46:18",
                    "updated_at": "2019-06-14 18:03:12",
                    "deleted_at": null
                }, {
                    "id": 47,
                    "tags": "El Ni\u00f1o Advisory No. 4",
                    "title": "El Ni\u00f1o Advisory No. 4",
                    "image_path": "",
                    "description": "El Ni\u00f1o conditions still persist in the tropical Pacific Ocean. Warmer than average sea surface temperature anomaly (SSTA) in the central and eastern equatorial Pacific Ocean of at least 0.5\u00b0C was observed, since the last year quarter of 2018. Recent analyses from global models suggest that the on-going El Ni\u00f1o condition will likely continue until that June-July-August 2019 season. <a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/El%20Ni%C3%B1o%20Advisory%20No.4.pdf\"><u>Continue Reading<\/u><\/a>",
                    "type": "2",
                    "published_at": "2019-05-14",
                    "created_at": "2019-05-16 10:35:01",
                    "updated_at": "2019-07-11 16:14:42",
                    "deleted_at": null
                }, {
                    "id": 43,
                    "tags": "El Ni\u00f1o Advisory No. 3",
                    "title": "El Ni\u00f1o Advisory No. 3",
                    "image_path": "",
                    "description": "El Ni\u00f1o conditions which started to develop since the last quarter of 2018 continue to persist in the tropical Pacific. Majority of climate models suggest around 75% probability of El Ni\u00f1o condition to continue to June-July-August (JJA) 2019 season. <u><strong><a href=\"http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/climate\/elninolanina\/El%20Ni%C3%B1o%20Advisory%20No.3.pdf\">Continue Reading<\/a><\/strong><\/u>",
                    "type": "2",
                    "published_at": "2019-04-04",
                    "created_at": "2019-04-11 18:11:14",
                    "updated_at": "2019-07-11 16:14:16",
                    "deleted_at": null
                }, {
                    "id": 42,
                    "tags": "TERMINATION OF THE NORTHEAST MONSOON",
                    "title": "TERMINATION OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "The shift of wind direction from northeasterly to easterly due to the establishment of the High Pressure Area (HPA) over the Northwestern Pacific signifies the termination of the Northeast Monsoon over most parts of the country and the start of the dry season. However, the extreme Northern Luzon may still experience occasional Northeast Monsoon. With this development, the day-to-day weather across the country will gradually become warmer, though isolated thunderstorms are also likely to occur.<br \/>\r\n<br \/>\r\nThe on-going weak El Ni\u00f1o affecting large areas of the country may result in prolonged dry spell and hotter air temperatures in the coming months.<br \/>\r\n<br \/>\r\nThe public is advised to take precautionary measures to minimize heat stress and optimize the daily use of water for personal and domestic consumption.<br \/>\r\n<br \/>\r\nFor more information, you may contact us at telephone numbers 434-0955, 927-1335 and 928-2031.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginally Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2019-03-22",
                    "created_at": "2019-03-22 14:28:27",
                    "updated_at": "2019-04-02 06:05:42",
                    "deleted_at": null
                }, {
                    "id": 41,
                    "tags": "DOST-PAGASA commemorates Meteorological Day 2019",
                    "title": "DOST-PAGASA commemorates Meteorological Day 2019",
                    "image_path": "",
                    "description": "<span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><strong>PRESS RELEASE<\/strong><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\">18 March 2019<\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\">Quezon City<\/span><\/span>\r\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><strong>DOST-PAGASA commemorates Meteorological Day 2019<\/strong><\/span><\/span><\/div>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">The Department of Science and Technology-Philippine Atmospheric, Geophysical and Astronomical Services Administration (DOST-PAGASA) will celebrate the 154th National \/ 69th World Meteorological Day on March 22, 2019 in PAGASA Science Garden, Agham Road, Diliman, Quezon City, with this year\u2019s theme: \u201cThe Sun, the Earth and the Weather.\u201d<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\">The agency will celebrate this momentous event by conducting several activities including: Press Conference on El Ni\u00f1o Update, National Forum on El Ni\u00f1o and PAGASA Loyalty Awards ceremony. Culminating the day\u2019s event is conferment of Wind Vane Awards, the highest award given by the agency to recognize the contribution and support of individuals and\/or organizations to DOST-PAGASA\u2019s efforts in disaster risk reduction and climate change. There will also be Trade Fair open to all participants on the event.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\">In addition, a three-day S&T exhibit highlighting DOST DRR Cluster will be up in PAGASA Main Lobby from March 20-22, 2019 and free Planetarium lectures on March 22, 2019. These activities will be open to public.<\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\">World Meteorological Day annually takes place on March 23rd, commemorating the establishment of World Meteorological Organization in 1950. In the national setting, DOST-PAGASA celebrates National Meteorological Day by virtue of Proclamation no. 594 signed in 1995.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<em>For more information, please contact:<\/em><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><strong><em>Dr. Cynthia P. Celebre<\/em><\/strong><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>(Chief, Research and Development & Training Division)<\/em><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>Overall Chair, NWMDay 2019<\/em><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><strong><em>Venus R. Valdemoro<\/em><\/strong><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>(OIC, Public Information Unit)<\/em><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>Overall Coordinator, NWMDay 2019<\/em><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>Phone: (02) 434-26-98<\/em><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>Telefax: (02) 927-93-08<\/em><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>Email: piias@pagasa.dost.gov.ph <\/em><\/span><br \/>\r\n<span style=\"font-family:Calibri,sans-serif\"><em>venusvaldemoro.ph@gmail.com<\/em><\/span><\/span>",
                    "type": "2",
                    "published_at": "2019-03-18",
                    "created_at": "2019-03-19 09:17:25",
                    "updated_at": "2019-03-19 09:17:25",
                    "deleted_at": null
                }, {
                    "id": 40,
                    "tags": "El Ni\u00f1o Advisory No. 2",
                    "title": "El Ni\u00f1o Advisory No. 2",
                    "image_path": "",
                    "description": "El Ni\u00f1o condition which started to develop during the last quarter of 2018 is still present in the tropical Pacific Ocean. Both oceanic and atmospheric indicators have reached El Ni\u00f1o threshold levels in February. Recent conditions suggest that this phenomenon will likely to continue until the April-May-June 2019 season and that varying impacts are now occurring in most areas of the country. <a href=\"http:\/\/bagong.pagasa.dost.gov.ph\/climate\/el-nino-la-nina\/advisories\"><span style=\"color:#3498db\"><u><strong>Continue Reading<\/strong><\/u><\/span><\/a>",
                    "type": "2",
                    "published_at": "2019-03-12",
                    "created_at": "2019-03-13 11:33:37",
                    "updated_at": "2019-03-13 11:33:37",
                    "deleted_at": null
                }, {
                    "id": 39,
                    "tags": "El Ni\u00f1o Advisory No. 1",
                    "title": "El Ni\u00f1o Advisory No. 1",
                    "image_path": "",
                    "description": "<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Press Statement<\/span><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Quezon City, 20 February 2019<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Recent PAGASA\u2019s climate monitoring and analyses indicate that the unusually warm sea surface temperatures (SSTs) in the central and eastern equatorial Pacific (CEEP) which started since November 2018 is expected to become a full-blown El Ni\u0144o. <\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">During the past three (3) months, rainfall analyses showed that impacts of below normal rainfall conditions in provinces of Western Mindanao and Ilocos Norte were already experienced and are expected to continue.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">The El Ni\u0144o is anticipated to be weak and will likely result to below normal rainfall conditions in different parts of the country in the coming months. Impacts also include slightly warmer surface temperatures in varying degrees from place to place and from time to time.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">With this development, the El Ni\u0144o Watch issued since July 2018 is now upgraded to El Ni\u0144o Advisory. All concerned agencies and the general public are advised to take precautionary measures to mitigate the potential adverse impacts of El Ni\u0144o. PAGASA will closely monitor these conditions and regular updates and advisories shall be issued as appropriate.<\/span><\/span><\/span><br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">VICENTE B. MALANO, PhD<\/span><\/strong><\/span><\/span><br \/>\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Administrator<\/span><\/span><\/span>",
                    "type": "2",
                    "published_at": "2019-02-20",
                    "created_at": "2019-02-20 18:15:17",
                    "updated_at": "2019-03-13 10:54:56",
                    "deleted_at": null
                }, {
                    "id": 37,
                    "tags": "15 January 2019",
                    "title": "PAGASA debunks claim of Dr. Lagmay",
                    "image_path": "",
                    "description": "<p dir=\"ltr\">DOST-PAGASA<br \/>\r\nPress Release<br \/>\r\n15 January 2019<br \/>\r\n<br \/>\r\nThe Philippine Atmospheric, Geophysical and Astronomical Services (PAGASA) has debunked the claim of Dr. Mahar Lagmay, UP NOAH Executive Director, that the agency allegedly issued \"wrong forecasts and late warnings\" during the passage of Tropical Depression Usman.<br \/>\r\n<br \/>\r\nDr. Lagmay alleged in his Facebook Account post the wrong forecasts on TD Usman has caused a number of deaths due to landslides and floods particularly in the Bicol Region. He said that PAGASA issued a moderate to heavy rainfall forecast in Bicol on December 28 and 29 2018 instead of intense and torrential rainfall.<br \/>\r\n<br \/>\r\nOn this, PAGASA Administrator Vicente Malano countered such claim and clarified that the agency defines moderate to heavy rainfall in its Severe Weather Bulletins (SWBs) as 24-hour daily accumulated rainfall of 60 to 180 mm and more than 180, respectively. In this premise, the December 28 to 29 PAGASA forecasters had sufficiently warned that the 24-hour accumulated rainfall of moderate to heavy would trigger massive flooding and landslides.<br \/>\r\n<br \/>\r\nMoreover, Dr. Malano emphasized that PAGASA provides localized rainfall and thunderstorm warning in near-real time through its PAGASA Regional Services Division (PRSD). In the case of TD \"USMAN,\" the Southern Luzon PRSD based in Legazpi City issued a separate color-coded Heavy Rainfall Warnings as supplemental to the HRWs stressed that there was an immediate threat of floods and landslides indicative of emergency actions.<br \/>\r\n<br \/>\r\nHe also explained that although PAGASA downgraded TD Usman into a Low Pressure Area (LPA) upon landfall, PAGASA Central Office and the SLPRSD reiterated their warnings of flooding and landslides as moderate to heavy rainfall would still persist.<br \/>\r\n<br \/>\r\nDr. Malano appealed to some concerned sectors to be more careful in the issuance of sweeping statements that may damage the credibility of PAGASA as a warning agency.<br \/>\r\n<br \/>\r\n\"The men and women of PAGASA remain fully committed to their mission of providing reliable and accurate weather-related information,\" he said.<br \/>\r\n<br \/>\r\nFor more information and clarification, please contact:<br \/>\r\n<br \/>\r\nDr. VICENTE B. MALANO<br \/>\r\nAdministrator<br \/>\r\n(02) 929-4865<br \/>\r\n<br \/>\r\nPublic Information Unit<br \/>\r\n(02) 434-2696, (02) 9279308<\/p>",
                    "type": "2",
                    "published_at": "2019-01-16",
                    "created_at": "2019-01-16 13:49:11",
                    "updated_at": "2019-01-17 08:44:07",
                    "deleted_at": null
                }, {
                    "id": 32,
                    "tags": "",
                    "title": "ONSET OF THE NORTHEAST MONSOON",
                    "image_path": "",
                    "description": "For the past several days, strong to gale force northeasterly winds has prevailed over the seaboards of Northern Luzon. Moreover, gradual cooling of surface air temperature over Northern Luzon has been observed. These meteorological conditions signify that the onset of the <strong>Northeast Monsoon <\/strong>season has started.<br \/>\r\n<br \/>\r\nWith these developments, the northeast wind flow is expected to further intensify and become dominant over most parts of the country, bringing cold and dry air. Surges of cold temperatures may also be expected in the coming days.<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>ESPERANZA O. CAYANAN Ph.D.<\/strong><br \/>\r\nChief, Weather Division",
                    "type": "2",
                    "published_at": "2018-10-26",
                    "created_at": "2018-10-29 12:21:12",
                    "updated_at": "2018-10-29 12:21:12",
                    "deleted_at": null
                }, {
                    "id": 30,
                    "tags": "",
                    "title": "TERMINATION OF THE SOUTHWEST MONSOON",
                    "image_path": "",
                    "description": "Recent analyses showed a significant weakening of the southwest monsoon winds over the last few days. With this development, the southwest monsoon season or known as \"Habagat\" has ended.<br \/>\r\n<br \/>\r\nMoreover, the strengthening of the high pressure systems over the Asian continent suggests the gradual transition of the season. This pattern will lead to the beginning of the northeast monsoon \"Amihan\" season in the coming days.<br \/>\r\n<br \/>\r\n<br \/>\r\nOriginally Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2018-10-04",
                    "created_at": "2018-10-05 12:10:06",
                    "updated_at": "2018-10-05 12:12:18",
                    "deleted_at": null
                }, {
                    "id": 29,
                    "tags": "",
                    "title": "ONSET OF THE RAINY SEASON",
                    "image_path": "",
                    "description": "The occurrence of widespread rainfall recorded in most PAGASA stations during the past few days due to the southwest monsoon (\u201cHabagat\u201d) confirms the onset of the rainy season over the western part of the country. These areas, including Metro Manila, will continue to experience scattered to widespread rains and thunderstorms in the coming days. However, such rain events may be followed by dry periods (also known as a \u201cmonsoon break\u201d) that could last for several days to two weeks. <br \/>\r\n<br \/>\r\nPAGASA will continue to closely monitor the situation, and updates\/advisories shall be issued as appropriate. The public and all concerned agencies are advised to take precautionary measures against the impacts of the rainy season. <br \/>\r\n<br \/>\r\nFor further information, please contact PAGASA at telephone numbers 927-1335 or 434-0955.<br \/>\r\n<br \/>\r\n<strong> <\/strong><br \/>\r\nOriginal Signed:<br \/>\r\n<br \/>\r\n<br \/>\r\n<strong> <\/strong><br \/>\r\n<strong>VICENTE B. MALANO, Ph.D.<\/strong><br \/>\r\nAdministrator",
                    "type": "2",
                    "published_at": "2018-06-08",
                    "created_at": "2018-06-08 18:04:25",
                    "updated_at": "2018-06-08 18:04:25",
                    "deleted_at": null
                }],
                "Youtube": "https:\/\/www.youtube.com\/embed\/W2fda-X31Qs",
                "PhotoGallery": [{
                    "id": 33,
                    "album_name": "158 National and 73rd World Meteorological Day",
                    "album_caption": "DOST-PAGASA Celebrates the 158th National and 73rd World Meteorological Day with the theme \"The future of weather, climate, and water across generations\".",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-64253ea2cd367_64253ea2cd402.png",
                    "created_at": "2023-03-30 15:47:47",
                    "updated_at": "2023-03-30 15:47:47",
                    "deleted_at": null,
                    "images": [{
                        "id": 324,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/329687958-226967629815975-1378750650955792598-njpg_64253eca05be3.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:26",
                        "updated_at": "2023-03-30 15:48:26",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-329687958-226967629815975-1378750650955792598-njpg_64253eca05be3.jpg"
                    }, {
                        "id": 325,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337147844-924305205279907-5143316369761366376-njpg_64253eca9378c.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:26",
                        "updated_at": "2023-03-30 15:48:26",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337147844-924305205279907-5143316369761366376-njpg_64253eca9378c.jpg"
                    }, {
                        "id": 326,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337158918-931026501418233-1667689131555478888-njpg_64253ecad48e7.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:27",
                        "updated_at": "2023-03-30 15:48:27",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337158918-931026501418233-1667689131555478888-njpg_64253ecad48e7.jpg"
                    }, {
                        "id": 327,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337390754-622343489714421-8966985417194658696-njpg_64253ecb23920.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:27",
                        "updated_at": "2023-03-30 15:48:27",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337390754-622343489714421-8966985417194658696-njpg_64253ecb23920.jpg"
                    }, {
                        "id": 328,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337503781-239552918482719-4626972730641326828-njpg_64253ecb60942.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:27",
                        "updated_at": "2023-03-30 15:48:27",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337503781-239552918482719-4626972730641326828-njpg_64253ecb60942.jpg"
                    }, {
                        "id": 329,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337511916-610706620907324-3775882737423429990-njpg_64253ecba1afc.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:27",
                        "updated_at": "2023-03-30 15:48:27",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337511916-610706620907324-3775882737423429990-njpg_64253ecba1afc.jpg"
                    }, {
                        "id": 330,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337521898-776665846926433-4540690248082947257-njpg_64253ecbe4d34.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:28",
                        "updated_at": "2023-03-30 15:48:28",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337521898-776665846926433-4540690248082947257-njpg_64253ecbe4d34.jpg"
                    }, {
                        "id": 331,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337548469-225330013358175-2864048171295555194-njpg_64253ecc2597e.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:28",
                        "updated_at": "2023-03-30 15:48:28",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337548469-225330013358175-2864048171295555194-njpg_64253ecc2597e.jpg"
                    }, {
                        "id": 332,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/337824845-899609691285857-5846318774802537138-njpg_64253ecc66b11.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:28",
                        "updated_at": "2023-03-30 15:48:28",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-337824845-899609691285857-5846318774802537138-njpg_64253ecc66b11.jpg"
                    }, {
                        "id": 333,
                        "albums_id": 33,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/338015498-735295804771753-7314081427390331146-njpg_64253ecca7ce5.jpg",
                        "caption": null,
                        "created_at": "2023-03-30 15:48:28",
                        "updated_at": "2023-03-30 15:48:28",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-338015498-735295804771753-7314081427390331146-njpg_64253ecca7ce5.jpg"
                    }]
                }, {
                    "id": 32,
                    "album_name": "157th National\/72nd World Meteorological Day Celebration",
                    "album_caption": "The Philippine Atmospheric, Geophysical and Astronomical Services Administration (PAGASA) celebrates the 157th National\/72nd World Meteorological Day with the theme: Early Warning and Early Action: Hydrometeorological and Climate Information for Disaster Risk Reduction on the 23rd of March 2022. Part of the said celebration was the conferment of the Wind Vane Awards.<br \/>\r\n<br \/>\r\nWind Vane Awardees<br \/>\r\nCommissioner Rachel Anne S. Herrera (Climate Change Commission)<br \/>\r\nDepartment of Agriculture<br \/>\r\nMakati City Disaster Risk Reduction and Management Office<br \/>\r\nSec. Fortunato T. de la Pena, DOST<br \/>\r\nPeople's Television Network<br \/>\r\nGMA News IMReady<br \/>\r\nDr. Renato U. Solidum, Jr. (DOST Undersecretary for Scientific & Technical Services)<br \/>\r\nDr. Joonseok Lee, Toconet Korea, Co., Ltd.<br \/>\r\nHon. Juan Carlo Singson Medina, Mayor, Vigan City<br \/>\r\nDr. Cedric D. Daep, Albay Public Safety and Emergency Management Office <br \/>\r\nHon. Antonio T. Kho, Governor, Masbate<br \/>\r\nBataan Peninsula State University<br \/>\r\nMolugan Barangay Council, headed by Hon. Arnold Macarandan, Brgy. Molugan, El Salvador, Misamis Oriental",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-623c02842b54c_623c02842b5da.jpg",
                    "created_at": "2022-03-24 13:33:10",
                    "updated_at": "2022-03-24 14:05:40",
                    "deleted_at": null,
                    "images": [{
                        "id": 280,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-06jpg_623c0486c2ba8.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:42:20",
                        "updated_at": "2022-03-24 13:42:20",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-06jpg_623c0486c2ba8.JPG"
                    }, {
                        "id": 281,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-03jpg_623c049056b6e.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:42:24",
                        "updated_at": "2022-03-24 13:42:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-03jpg_623c049056b6e.JPG"
                    }, {
                        "id": 283,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-05jpg_623c049c505ee.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:42:53",
                        "updated_at": "2022-03-24 13:42:53",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-05jpg_623c049c505ee.JPG"
                    }, {
                        "id": 286,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-02jpg_623c04db71421.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:44:05",
                        "updated_at": "2022-03-24 13:44:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-02jpg_623c04db71421.JPG"
                    }, {
                        "id": 290,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-08jpg_623c04fea5327.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:45:12",
                        "updated_at": "2022-03-24 13:45:12",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-08jpg_623c04fea5327.JPG"
                    }, {
                        "id": 294,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-09jpg_623c0568c1856.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:47:05",
                        "updated_at": "2022-03-24 13:47:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-09jpg_623c0568c1856.JPG"
                    }, {
                        "id": 295,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-04jpg_623c05589b1c0.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:47:07",
                        "updated_at": "2022-03-24 13:47:07",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-04jpg_623c05589b1c0.JPG"
                    }, {
                        "id": 296,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-01jpg_623c05ce625df.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:47:38",
                        "updated_at": "2022-03-24 13:47:38",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-01jpg_623c05ce625df.JPG"
                    }, {
                        "id": 304,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-07jpg_623c0651e931b.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:50:42",
                        "updated_at": "2022-03-24 13:50:42",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-07jpg_623c0651e931b.JPG"
                    }, {
                        "id": 316,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-11jpg_623c074d1a437.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:57:17",
                        "updated_at": "2022-03-24 13:57:17",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-11jpg_623c074d1a437.JPG"
                    }, {
                        "id": 319,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-10jpg_623c078bb99d3.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 13:59:56",
                        "updated_at": "2022-03-24 13:59:56",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-10jpg_623c078bb99d3.JPG"
                    }, {
                        "id": 323,
                        "albums_id": 32,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/wmday-2022-11jpg_623c0a0f8398d.JPG",
                        "caption": null,
                        "created_at": "2022-03-24 14:08:29",
                        "updated_at": "2022-03-24 14:08:29",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-wmday-2022-11jpg_623c0a0f8398d.JPG"
                    }]
                }, {
                    "id": 31,
                    "album_name": "COVID-19 Vaccination Program in PAGASA",
                    "album_caption": "With the expansion of the National COVID-19 Deployment and Vaccination Program to priority Group A4 frontline personnel in essential sectors of the National Government Agencies, employees of PAGASA were inoculated today with the first dose of the COVID-19 vaccine. <br \/>\r\n<br \/>\r\nThe Agency expresses its gratitude to the Department of Science and Technology (DOST) through the support and guidance of Undersecretary Renato U. Solidum, Jr., the PAGASA Weathermen Employees Association (PWEA), the Quezon City Local Government Unit (QC-LGU), and the medical frontliners and volunteers for the successful implementation of the vaccination program in the Quezon City cluster.",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-60d56781cc0f5_60d56781cc17a.JPG",
                    "created_at": "2021-06-25 13:20:03",
                    "updated_at": "2021-06-29 08:23:34",
                    "deleted_at": null,
                    "images": [{
                        "id": 251,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0290jpg_60d567ee24f83.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:51",
                        "updated_at": "2021-06-25 13:21:51",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0290jpg_60d567ee24f83.JPG"
                    }, {
                        "id": 252,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0293jpg_60d567efc7158.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:52",
                        "updated_at": "2021-06-25 13:21:52",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0293jpg_60d567efc7158.JPG"
                    }, {
                        "id": 253,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0302jpg_60d567f0e99e5.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:54",
                        "updated_at": "2021-06-25 13:21:54",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0302jpg_60d567f0e99e5.JPG"
                    }, {
                        "id": 254,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0389jpg_60d567f207c94.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:55",
                        "updated_at": "2021-06-25 13:21:55",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0389jpg_60d567f207c94.JPG"
                    }, {
                        "id": 255,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0396jpg_60d567f31e2ac.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:56",
                        "updated_at": "2021-06-25 13:21:56",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0396jpg_60d567f31e2ac.JPG"
                    }, {
                        "id": 256,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0397jpg_60d567f436913.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:57",
                        "updated_at": "2021-06-25 13:21:57",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0397jpg_60d567f436913.JPG"
                    }, {
                        "id": 257,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0415jpg_60d567f5a264a.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:58",
                        "updated_at": "2021-06-25 13:21:58",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0415jpg_60d567f5a264a.JPG"
                    }, {
                        "id": 258,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0420jpg_60d567f6dd613.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:21:59",
                        "updated_at": "2021-06-25 13:21:59",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0420jpg_60d567f6dd613.JPG"
                    }, {
                        "id": 259,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0468jpg_60d567f7b6a50.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:00",
                        "updated_at": "2021-06-25 13:22:00",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0468jpg_60d567f7b6a50.JPG"
                    }, {
                        "id": 260,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0469jpg_60d567f8b69cc.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:01",
                        "updated_at": "2021-06-25 13:22:01",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0469jpg_60d567f8b69cc.JPG"
                    }, {
                        "id": 261,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0476jpg_60d567f9cd049.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:03",
                        "updated_at": "2021-06-25 13:22:03",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0476jpg_60d567f9cd049.JPG"
                    }, {
                        "id": 262,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0481jpg_60d567fb2c3d2.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:03",
                        "updated_at": "2021-06-25 13:22:03",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0481jpg_60d567fb2c3d2.JPG"
                    }, {
                        "id": 263,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0484jpg_60d567fbd7130.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:04",
                        "updated_at": "2021-06-25 13:22:04",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0484jpg_60d567fbd7130.JPG"
                    }, {
                        "id": 264,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0490jpg_60d567fc9803f.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:05",
                        "updated_at": "2021-06-25 13:22:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0490jpg_60d567fc9803f.JPG"
                    }, {
                        "id": 265,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0491jpg_60d567fda6407.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:06",
                        "updated_at": "2021-06-25 13:22:06",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0491jpg_60d567fda6407.JPG"
                    }, {
                        "id": 266,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0492jpg_60d567fe5efec.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:07",
                        "updated_at": "2021-06-25 13:22:07",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0492jpg_60d567fe5efec.JPG"
                    }, {
                        "id": 267,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0498jpg_60d567ff21f21.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:08",
                        "updated_at": "2021-06-25 13:22:08",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0498jpg_60d567ff21f21.JPG"
                    }, {
                        "id": 268,
                        "albums_id": 31,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0501jpg_60d568000f9d4.JPG",
                        "caption": null,
                        "created_at": "2021-06-25 13:22:09",
                        "updated_at": "2021-06-25 13:22:09",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0501jpg_60d568000f9d4.JPG"
                    }]
                }, {
                    "id": 30,
                    "album_name": "DOST Independence Day 2021 Celebration",
                    "album_caption": "In commemoration of the country's 123rd Independence Day, the Department of Science and Technology and its attached agencies held a simultaneous Flag Raising Ceremony that was attended by its key officials and witnessed virtually by its employees.",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-60c41b81781e6_60c41b8178257.png",
                    "created_at": "2021-06-12 10:27:14",
                    "updated_at": "2021-06-12 10:27:14",
                    "deleted_at": null,
                    "images": [{
                        "id": 238,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0208jpg_60c41bdc6f8a2.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:45",
                        "updated_at": "2021-06-12 10:28:45",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0208jpg_60c41bdc6f8a2.JPG"
                    }, {
                        "id": 239,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0223jpg_60c41bddc9a67.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:46",
                        "updated_at": "2021-06-12 10:28:46",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0223jpg_60c41bddc9a67.JPG"
                    }, {
                        "id": 240,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0008jpg_60c41bde9eefd.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:47",
                        "updated_at": "2021-06-12 10:28:47",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0008jpg_60c41bde9eefd.JPG"
                    }, {
                        "id": 241,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0010jpg_60c41bdfe81f8.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:49",
                        "updated_at": "2021-06-12 10:28:49",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0010jpg_60c41bdfe81f8.JPG"
                    }, {
                        "id": 242,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0020jpg_60c41be14559a.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:50",
                        "updated_at": "2021-06-12 10:28:50",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0020jpg_60c41be14559a.JPG"
                    }, {
                        "id": 243,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0021jpg_60c41be29cc6f.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:51",
                        "updated_at": "2021-06-12 10:28:51",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0021jpg_60c41be29cc6f.JPG"
                    }, {
                        "id": 244,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0030jpg_60c41be370037.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:52",
                        "updated_at": "2021-06-12 10:28:52",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0030jpg_60c41be370037.JPG"
                    }, {
                        "id": 245,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0037jpg_60c41be4bd5bd.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:53",
                        "updated_at": "2021-06-12 10:28:53",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0037jpg_60c41be4bd5bd.JPG"
                    }, {
                        "id": 246,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0040jpg_60c41be586646.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:54",
                        "updated_at": "2021-06-12 10:28:54",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0040jpg_60c41be586646.JPG"
                    }, {
                        "id": 247,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0102jpg_60c41be6dbc61.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:56",
                        "updated_at": "2021-06-12 10:28:56",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0102jpg_60c41be6dbc61.JPG"
                    }, {
                        "id": 248,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0103jpg_60c41be84121b.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:57",
                        "updated_at": "2021-06-12 10:28:57",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0103jpg_60c41be84121b.JPG"
                    }, {
                        "id": 249,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0154jpg_60c41be9968a3.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:28:58",
                        "updated_at": "2021-06-12 10:28:58",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0154jpg_60c41be9968a3.JPG"
                    }, {
                        "id": 250,
                        "albums_id": 30,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0155jpg_60c41beaebffd.JPG",
                        "caption": null,
                        "created_at": "2021-06-12 10:29:00",
                        "updated_at": "2021-06-12 10:29:00",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0155jpg_60c41beaebffd.JPG"
                    }]
                }, {
                    "id": 29,
                    "album_name": "National & World Meteorological Day 2021",
                    "album_caption": "#NWMDay2021<br \/><br \/>\r\nThe Department of Science and Technology-Philippine Atmospheric, Geophysical and Astronomical Services Administration (DOST-PAGASA) will celebrate the 156th National \/ 71st World Meteorological Day on March 23, 2021 with this year\u2019s theme: \u201cThe Ocean, Our Climate and Weather.\u201d<br \/><br \/>\r\n<br \/>\r\nThe agency will celebrate this momentous event by conducting several activities including: Press Conference & Climate Forum, Science Forum on Oceanography and PAGASA Loyalty Awards ceremony. Culminating the day\u2019s event is the PAGASA Mobile Phone Photography Contest, in line with the N\/WMDay 2021 theme, which is open to the public with a grand prize of 10,000 pesos.<br \/><br \/>\r\nIn addition, an IEC webinar highlighting the works and wonders of Meteorology through innovations by Senior High School students will be conducted on March 24, 2021. This activity will be open for pre-registration to science enthusiasts and students.<br \/><br \/>\r\n<br \/>\r\nThe World Meteorological Day annually takes place on March 23rd, commemorating the establishment of the World Meteorological Organization in 1950. In the national setting, DOST-PAGASA celebrates National Meteorological Day by virtue of Proclamation no. 594 signed in 1995.<br \/><br \/>\r\n<br \/>\r\nDue to the COVID-19 Pandemic, today\u2019s commemoration of the National and World Meteorological Day will be conducted virtually. The programs, schedules, and registration forms can be accessed here: <a href='https:\/\/sites.google.com\/view\/dost-pagasa-wmday2021\/home'>bit.ly\/NWMDay2021<\/a><br \/><br \/>\r\n#WorldMetDay2021 #oceanscience",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-6051be791ac58_6051be791accc.JPG",
                    "created_at": "2021-03-17 16:31:54",
                    "updated_at": "2021-03-17 17:17:46",
                    "deleted_at": null,
                    "images": [{
                        "id": 237,
                        "albums_id": 29,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/official-nwmday-2021-1920x1080jpg_6051c0d448c54.JPG",
                        "caption": null,
                        "created_at": "2021-03-17 16:41:57",
                        "updated_at": "2021-03-17 16:41:57",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-official-nwmday-2021-1920x1080jpg_6051c0d448c54.JPG"
                    }]
                }, {
                    "id": 28,
                    "album_name": "Oath Taking Ceremony of PAGASA Officials",
                    "album_caption": "Congratulations to the newly-promoted DOST-PAGASA Officials, Dr. Vicente B. Malano (Administrator III) and Dr. Esperanza O. Cayanan (Director III)",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-60335ef3b743e_60335ef3b74bf.jpg",
                    "created_at": "2021-02-22 15:36:20",
                    "updated_at": "2021-02-22 15:36:20",
                    "deleted_at": null,
                    "images": [{
                        "id": 233,
                        "albums_id": 28,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a9411jpg_60335f673536f.JPG",
                        "caption": "Dr. Vicente B. Malano  (right photo) taking his Oath of Office as the PAGASA Administrator III, administered by DOST Secretary Fortunato T. de la Pe\u00f1a (left photo).",
                        "created_at": "2021-02-22 15:38:16",
                        "updated_at": "2021-02-22 15:41:53",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a9411jpg_60335f673536f.JPG"
                    }, {
                        "id": 234,
                        "albums_id": 28,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a9418jpg_60335f69045de.JPG",
                        "caption": null,
                        "created_at": "2021-02-22 15:38:17",
                        "updated_at": "2021-02-22 15:38:17",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a9418jpg_60335f69045de.JPG"
                    }, {
                        "id": 235,
                        "albums_id": 28,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a9441jpg_60335f69b969f.JPG",
                        "caption": "Dr. Esperanza O. Cayanan,  (right photo) taking her Oath of Office as the PAGASA Director III, administered by DOST Secretary Fortunato T. de la Pe\u00f1a (left photo).",
                        "created_at": "2021-02-22 15:38:18",
                        "updated_at": "2021-02-22 15:42:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a9441jpg_60335f69b969f.JPG"
                    }, {
                        "id": 236,
                        "albums_id": 28,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a9449jpg_60335f6ad5dae.JPG",
                        "caption": null,
                        "created_at": "2021-02-22 15:38:20",
                        "updated_at": "2021-02-22 15:38:20",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a9449jpg_60335f6ad5dae.JPG"
                    }]
                }, {
                    "id": 27,
                    "album_name": "National Disaster Resilience Month July 2020",
                    "album_caption": "In celebration of National Disaster Resilience Month 2020, DOST-PAGASA will conduct activities to feature its disaster preparedness innovations and prevention and mitigation initiatives. This includes lectures on tropical cyclone and its hazards. This will be hosted via Zoom and streamed on DOST-PAGASA Facebook page.<br \/>\r\n<br \/>\r\nJuly 28, 2020: Preparing for Tropical Cyclones and its Hazards in time of Pandemic<br \/>\r\nJuly 30, 2020: DOST-PAGASA DRR Priority Projects 2020<br \/>\r\nJuly 31, 2020: Resilient Kids for Safer Communities<br \/>\r\n<br \/>\r\nAdmission is free!<br \/>\r\n<br \/>\r\nStay tuned to DOST-PAGASA Facebook events page for the registration.<br \/>\r\n<br \/>\r\n#NDRM2020 #Dost_Pagasa #ResiliencePH",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5f1ea6cdc186e_5f1ea6cdc18f4.JPG",
                    "created_at": "2020-07-27 18:05:02",
                    "updated_at": "2020-07-27 18:05:02",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 26,
                    "album_name": "ISO Awareness Seminar for PAGASA Technical Personnel \/ Technical Writing Workshop",
                    "album_caption": "The \"ISO Awareness Seminar for PAGASA Technical Personnel\", held from February 3-4, 2020 at the PAGASA Training Room, aims to introduce and reinforce the technical details of the ISO certification process to the different divisions of PAGASA. This is in line with the Philippine government's call for more transparency and expediency in public agencies. <br \/><br \/>\r\n<br \/><br \/>\r\nMeanwhile, the \"Technical Writing Workshop\", held from February 5-7 at the PAGASA Amihan Conference Room, orients the participants with the effective and efficient management of technical documents, as well as to further provide them with the necessary skills in creating various correspondences that are user-specific.",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5e4cc08552c03_5e4cc08552c87.jpg",
                    "created_at": "2020-02-19 11:11:42",
                    "updated_at": "2020-02-19 12:58:47",
                    "deleted_at": null,
                    "images": [{
                        "id": 223,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6292jpg_5e4ca7cf0904d.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 11:13:26",
                        "updated_at": "2020-02-19 11:13:26",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6292jpg_5e4ca7cf0904d.JPG"
                    }, {
                        "id": 224,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6308jpg_5e4ca7d64972d.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 11:13:31",
                        "updated_at": "2020-02-19 11:13:31",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6308jpg_5e4ca7d64972d.JPG"
                    }, {
                        "id": 225,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6322jpg_5e4ca7db98a26.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 11:13:34",
                        "updated_at": "2020-02-19 11:13:34",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6322jpg_5e4ca7db98a26.JPG"
                    }, {
                        "id": 226,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-5974jpg_5e4cb37dca1d9.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:16",
                        "updated_at": "2020-02-19 12:03:16",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-5974jpg_5e4cb37dca1d9.JPG"
                    }, {
                        "id": 227,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-5978jpg_5e4cb38440ca3.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:16",
                        "updated_at": "2020-02-19 12:03:16",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-5978jpg_5e4cb38440ca3.JPG"
                    }, {
                        "id": 228,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-5979jpg_5e4cb384eba6f.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:17",
                        "updated_at": "2020-02-19 12:03:17",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-5979jpg_5e4cb384eba6f.JPG"
                    }, {
                        "id": 229,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6108jpg_5e4cb385a8816.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:18",
                        "updated_at": "2020-02-19 12:03:18",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6108jpg_5e4cb385a8816.JPG"
                    }, {
                        "id": 230,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6112jpg_5e4cb3867bbd7.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:19",
                        "updated_at": "2020-02-19 12:03:19",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6112jpg_5e4cb3867bbd7.JPG"
                    }, {
                        "id": 231,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6114jpg_5e4cb38744d10.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:03:20",
                        "updated_at": "2020-02-19 12:03:20",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6114jpg_5e4cb38744d10.JPG"
                    }, {
                        "id": 232,
                        "albums_id": 26,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-6270jpg_5e4cb47ec0e21.JPG",
                        "caption": null,
                        "created_at": "2020-02-19 12:07:28",
                        "updated_at": "2020-02-19 12:07:28",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-6270jpg_5e4cb47ec0e21.JPG"
                    }]
                }, {
                    "id": 25,
                    "album_name": "2019 National Science and Technology Week",
                    "album_caption": "The NSTW highlights the significant contributions of science and technology to national development and has become a platform for heralding S&T advocacy in the country.<br \/>\r\n<br \/>\r\nWith this year's theme \"Enabling Technologies for Sustainable Development\", the 2019 NSTW will be conducted from July 17 to 21 at the World Trade Center in Pasay City.",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5d2ee75522831_5d2ee755228c7.jpg",
                    "created_at": "2019-07-17 17:16:08",
                    "updated_at": "2019-07-17 17:16:08",
                    "deleted_at": null,
                    "images": [{
                        "id": 187,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3449jpg_5d2eeb3a0da4b.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:32:46",
                        "updated_at": "2019-07-17 17:32:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3449jpg_5d2eeb3a0da4b.JPG"
                    }, {
                        "id": 188,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3455jpg_5d2eeb3ebe31a.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:32:49",
                        "updated_at": "2019-07-17 17:32:49",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3455jpg_5d2eeb3ebe31a.JPG"
                    }, {
                        "id": 189,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3467jpg_5d2eeb419f96c.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:32:53",
                        "updated_at": "2019-07-17 17:32:53",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3467jpg_5d2eeb419f96c.JPG"
                    }, {
                        "id": 191,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3522jpg_5d2eeb48e49d7.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:01",
                        "updated_at": "2019-07-17 17:33:01",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3522jpg_5d2eeb48e49d7.JPG"
                    }, {
                        "id": 192,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3535jpg_5d2eeb4d378a3.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:05",
                        "updated_at": "2019-07-17 17:33:05",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3535jpg_5d2eeb4d378a3.JPG"
                    }, {
                        "id": 193,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3550jpg_5d2eeb51ab7c9.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:08",
                        "updated_at": "2019-07-17 17:33:08",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3550jpg_5d2eeb51ab7c9.JPG"
                    }, {
                        "id": 194,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3564jpg_5d2eeb5468356.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:13",
                        "updated_at": "2019-07-17 17:33:13",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3564jpg_5d2eeb5468356.JPG"
                    }, {
                        "id": 195,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3570jpg_5d2eeb5918c03.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:17",
                        "updated_at": "2019-07-17 17:33:17",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3570jpg_5d2eeb5918c03.JPG"
                    }, {
                        "id": 196,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3576jpg_5d2eeb5da3016.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:20",
                        "updated_at": "2019-07-17 17:33:20",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3576jpg_5d2eeb5da3016.JPG"
                    }, {
                        "id": 197,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3579jpg_5d2eeb60af1b0.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:24",
                        "updated_at": "2019-07-17 17:33:24",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3579jpg_5d2eeb60af1b0.JPG"
                    }, {
                        "id": 198,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3601jpg_5d2eeb647a256.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:29",
                        "updated_at": "2019-07-17 17:33:29",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3601jpg_5d2eeb647a256.JPG"
                    }, {
                        "id": 199,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3612jpg_5d2eeb691e7c3.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:33",
                        "updated_at": "2019-07-17 17:33:33",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3612jpg_5d2eeb691e7c3.JPG"
                    }, {
                        "id": 200,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3644jpg_5d2eeb6d63879.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:38",
                        "updated_at": "2019-07-17 17:33:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3644jpg_5d2eeb6d63879.JPG"
                    }, {
                        "id": 201,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3651jpg_5d2eeb72a489d.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:45",
                        "updated_at": "2019-07-17 17:33:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3651jpg_5d2eeb72a489d.JPG"
                    }, {
                        "id": 202,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3665jpg_5d2eeb7942ae7.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:51",
                        "updated_at": "2019-07-17 17:33:51",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3665jpg_5d2eeb7942ae7.JPG"
                    }, {
                        "id": 205,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3671jpg_5d2eeb7f50cf6.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:33:56",
                        "updated_at": "2019-07-17 17:33:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3671jpg_5d2eeb7f50cf6.JPG"
                    }, {
                        "id": 207,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3679jpg_5d2eeb84b24ec.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:34:00",
                        "updated_at": "2019-07-17 17:34:00",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3679jpg_5d2eeb84b24ec.JPG"
                    }, {
                        "id": 215,
                        "albums_id": 25,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-3579jpg_5d2eeba3708ae.JPG",
                        "caption": null,
                        "created_at": "2019-07-17 17:34:30",
                        "updated_at": "2019-07-17 17:34:30",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-3579jpg_5d2eeba3708ae.JPG"
                    }]
                }, {
                    "id": 24,
                    "album_name": "2019 Typhoon and Flood Awareness Week (TFAW)",
                    "album_caption": "The Typhoon and Flood Awareness Week (TFAW) is a yearly event which is conducted every third week of June by virtue of Presidential Proclamation 1535, Series of 2008. The theme for this year is \"Science and Technology Innovation: A Way to Typhoon and Flood Risk Reduction\".",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5d0affcee4f3b_5d0affcee4fb0.JPG",
                    "created_at": "2019-06-20 11:39:00",
                    "updated_at": "2019-06-20 11:39:00",
                    "deleted_at": null,
                    "images": [{
                        "id": 174,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0382jpg_5d0b001bb72eb.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:15",
                        "updated_at": "2019-06-20 11:40:15",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0382jpg_5d0b001bb72eb.JPG"
                    }, {
                        "id": 175,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0384jpg_5d0b001fa1031.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:18",
                        "updated_at": "2019-06-20 11:40:18",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0384jpg_5d0b001fa1031.JPG"
                    }, {
                        "id": 176,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0385jpg_5d0b00224d7c4.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:22",
                        "updated_at": "2019-06-20 11:40:22",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0385jpg_5d0b00224d7c4.JPG"
                    }, {
                        "id": 177,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0398jpg_5d0b00265db19.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:25",
                        "updated_at": "2019-06-20 11:40:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0398jpg_5d0b00265db19.JPG"
                    }, {
                        "id": 178,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0455jpg_5d0b0029928a3.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:29",
                        "updated_at": "2019-06-20 11:40:29",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0455jpg_5d0b0029928a3.JPG"
                    }, {
                        "id": 179,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0456jpg_5d0b002dc1832.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:34",
                        "updated_at": "2019-06-20 11:40:34",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0456jpg_5d0b002dc1832.JPG"
                    }, {
                        "id": 180,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0462jpg_5d0b00325dbe5.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:37",
                        "updated_at": "2019-06-20 11:40:37",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0462jpg_5d0b00325dbe5.JPG"
                    }, {
                        "id": 181,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0463jpg_5d0b00357a17c.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:41",
                        "updated_at": "2019-06-20 11:40:41",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0463jpg_5d0b00357a17c.JPG"
                    }, {
                        "id": 182,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0505jpg_5d0b0039aee56.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:44",
                        "updated_at": "2019-06-20 11:40:44",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0505jpg_5d0b0039aee56.JPG"
                    }, {
                        "id": 183,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0509jpg_5d0b003c4d308.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:46",
                        "updated_at": "2019-06-20 11:40:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0509jpg_5d0b003c4d308.JPG"
                    }, {
                        "id": 184,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0512jpg_5d0b003ed788a.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:50",
                        "updated_at": "2019-06-20 11:40:50",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0512jpg_5d0b003ed788a.JPG"
                    }, {
                        "id": 185,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0522jpg_5d0b0042182d0.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:52",
                        "updated_at": "2019-06-20 11:40:52",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0522jpg_5d0b0042182d0.JPG"
                    }, {
                        "id": 186,
                        "albums_id": 24,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0524jpg_5d0b0044677bf.JPG",
                        "caption": null,
                        "created_at": "2019-06-20 11:40:56",
                        "updated_at": "2019-06-20 11:40:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0524jpg_5d0b0044677bf.JPG"
                    }]
                }, {
                    "id": 23,
                    "album_name": "154th National\/69th World Meteorological Day",
                    "album_caption": "Held every 23rd of March, the World Meteorological Day commemorates the establishment of World Meteorological Organization in 1950. In the national setting, DOST-PAGASA celebrates National Meteorological Day by virtue of Proclamation No. 594 signed in 1995.<br \/>\r\n<br \/>\r\nThis year's theme is \"The Sun, the Earth, and the Weather\".",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5c998144e339e_5c998144e3421.JPG",
                    "created_at": "2019-03-26 09:32:56",
                    "updated_at": "2019-03-26 09:32:56",
                    "deleted_at": null,
                    "images": [{
                        "id": 154,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a5968jpg_5c99855a67596.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:21",
                        "updated_at": "2019-03-26 09:50:21",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a5968jpg_5c99855a67596.JPG"
                    }, {
                        "id": 155,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a5969jpg_5c99855d52f5a.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:25",
                        "updated_at": "2019-03-26 09:50:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a5969jpg_5c99855d52f5a.JPG"
                    }, {
                        "id": 156,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a5971jpg_5c99856130684.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:27",
                        "updated_at": "2019-03-26 09:50:27",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a5971jpg_5c99856130684.JPG"
                    }, {
                        "id": 157,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a5972jpg_5c99856411beb.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:30",
                        "updated_at": "2019-03-26 09:50:30",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a5972jpg_5c99856411beb.JPG"
                    }, {
                        "id": 159,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6186jpg_5c99856958e61.JPG",
                        "caption": "Dr. Landrico Dalida, Jr., PAGASA Deputy Administrator for Operations and Services, checks the tools and equipment of the Quezon City DRRMO during the Science and Technology Exhibit at the PAGASA Central Office held from March 19-22, 2019.",
                        "created_at": "2019-03-26 09:50:36",
                        "updated_at": "2019-03-26 10:05:23",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6186jpg_5c99856958e61.JPG"
                    }, {
                        "id": 160,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6198jpg_5c99856c8fd70.JPG",
                        "caption": "Mr. Nathaniel \"Mang Tani\" Cruz, GMA Resident Meteorologist, visits the Science and Technology Exhibit. Mr. Cruz is accompanied by PAGASA Administrator Dr. Vicente Malano.",
                        "created_at": "2019-03-26 09:50:38",
                        "updated_at": "2019-03-26 10:08:08",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6198jpg_5c99856c8fd70.JPG"
                    }, {
                        "id": 161,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6229jpg_5c99856e79606.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:40",
                        "updated_at": "2019-03-26 09:50:40",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6229jpg_5c99856e79606.JPG"
                    }, {
                        "id": 162,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6230jpg_5c998570c4989.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:43",
                        "updated_at": "2019-03-26 09:50:43",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6230jpg_5c998570c4989.JPG"
                    }, {
                        "id": 163,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6231jpg_5c9985731baed.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:45",
                        "updated_at": "2019-03-26 09:50:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6231jpg_5c9985731baed.JPG"
                    }, {
                        "id": 164,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6234jpg_5c9985754465c.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:47",
                        "updated_at": "2019-03-26 09:50:47",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6234jpg_5c9985754465c.JPG"
                    }, {
                        "id": 165,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6235jpg_5c998577e0e8b.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:50",
                        "updated_at": "2019-03-26 09:50:50",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6235jpg_5c998577e0e8b.JPG"
                    }, {
                        "id": 166,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6236jpg_5c99857a7d27c.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:53",
                        "updated_at": "2019-03-26 09:50:53",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6236jpg_5c99857a7d27c.JPG"
                    }, {
                        "id": 167,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6503jpg_5c99857d5a980.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:50:57",
                        "updated_at": "2019-03-26 09:50:57",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6503jpg_5c99857d5a980.JPG"
                    }, {
                        "id": 168,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6525jpg_5c9985814e402.JPG",
                        "caption": null,
                        "created_at": "2019-03-26 09:51:00",
                        "updated_at": "2019-03-26 09:51:00",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6525jpg_5c9985814e402.JPG"
                    }, {
                        "id": 169,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/53485383-2407578379267079-769753208544296960-ojpg_5c99858450379.jpg",
                        "caption": "LTC Ulysses Mancao, Group Commander of the 900th Philippine Air Force Weather Group, receives their Wind Vane Award during the commemoration of the 154th National\/69th World Meteorological Day.\r\n\r\nThe Wind Vane Award is given to individuals and institutional partners who have supported and contributed to the realization of PAGASA's mandate, thereby gaining public trust and recognition.",
                        "created_at": "2019-03-26 09:51:01",
                        "updated_at": "2019-03-26 11:23:04",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-53485383-2407578379267079-769753208544296960-ojpg_5c99858450379.jpg"
                    }, {
                        "id": 170,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/54279185-2407576862600564-7420899306401431552-ojpg_5c99858535c45.jpg",
                        "caption": "Governor Yevgeny Vincente B. Emano of Misamis Oriental receives his Wind Vane Award during the commemoration of the 154th National\/69th World Meteorological Day.\r\n\r\nThe Wind Vane Award is given to individuals and institutional partners who have supported and contributed to the realization of PAGASA's mandate, thereby gaining public trust and recognition.",
                        "created_at": "2019-03-26 09:51:01",
                        "updated_at": "2019-03-26 11:25:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-54279185-2407576862600564-7420899306401431552-ojpg_5c99858535c45.jpg"
                    }, {
                        "id": 171,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/54390862-2407578505933733-872534301378347008-ojpg_5c9985858d370.jpg",
                        "caption": "Mr. Nathaniel \"Mang Tani\" Cruz, Resident Meteorologist of GMA-7, receives his Wind Vane Award during the commemoration of the 154th National\/69th World Meteorological Day.\r\n\r\nThe Wind Vane Award is given to individuals and institutional partners who have supported and contributed to the realization of PAGASA's mandate, thereby gaining public trust and recognition.",
                        "created_at": "2019-03-26 09:51:01",
                        "updated_at": "2019-03-26 11:26:06",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-54390862-2407578505933733-872534301378347008-ojpg_5c9985858d370.jpg"
                    }, {
                        "id": 172,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/54520607-2407578345933749-6337703065382027264-ojpg_5c999c070b155.jpg",
                        "caption": "Led by Director Edgar Allan Tabell, the DILG-CODIX group receives their Wind Vane Award during the commemoration of the 154th National\/69th World Meteorological Day.\r\n\r\nThe Wind Vane Award is given to individuals and institutional partners who have supported and contributed to the realization of PAGASA's mandate, thereby gaining public trust and recognition.",
                        "created_at": "2019-03-26 11:27:04",
                        "updated_at": "2019-03-26 11:27:16",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-54520607-2407578345933749-6337703065382027264-ojpg_5c999c070b155.jpg"
                    }, {
                        "id": 173,
                        "albums_id": 23,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/54730817-2407578092600441-6625957519120400384-ojpg_5c999c0859eff.jpg",
                        "caption": "Dr. Ben Jong-Dao Jou of the National Taiwan University, receives his Wind Vane Award during the commemoration of the 154th National\/69th World Meteorological Day.\r\n\r\nThe Wind Vane Award is given to individuals and institutional partners who have supported and contributed to the realization of PAGASA's mandate, thereby gaining public trust and recognition.",
                        "created_at": "2019-03-26 11:27:04",
                        "updated_at": "2019-03-26 11:27:34",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-54730817-2407578092600441-6625957519120400384-ojpg_5c999c0859eff.jpg"
                    }]
                }, {
                    "id": 22,
                    "album_name": "Groundbreaking of PAGASA Planetarium in Mindanao",
                    "album_caption": "Molugan, El Salvador City, Misamis Oriental (15 March 2019)",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5c9982aea6e70_5c9982aea6ee2.jpeg",
                    "created_at": "2019-03-21 11:19:18",
                    "updated_at": "2019-03-26 09:38:55",
                    "deleted_at": null,
                    "images": [{
                        "id": 140,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/6a5dc30b-3c81-4909-9f12-f7d2be230aadjpeg_5c9981be793bd.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:55",
                        "updated_at": "2019-03-26 09:34:55",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-6a5dc30b-3c81-4909-9f12-f7d2be230aadjpeg_5c9981be793bd.jpeg"
                    }, {
                        "id": 141,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/7d3d0b16-4225-4a90-ab8a-e784c32d006djpeg_5c9981bf8fa49.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:55",
                        "updated_at": "2019-03-26 09:34:55",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-7d3d0b16-4225-4a90-ab8a-e784c32d006djpeg_5c9981bf8fa49.jpeg"
                    }, {
                        "id": 142,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/7f1633b5-0a02-4f36-ba97-91e51994337bjpeg_5c9981bfcca86.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:56",
                        "updated_at": "2019-03-26 09:34:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-7f1633b5-0a02-4f36-ba97-91e51994337bjpeg_5c9981bfcca86.jpeg"
                    }, {
                        "id": 143,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/24ea2e10-c040-4e1d-8247-99403534b44cjpeg_5c9981c011793.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:56",
                        "updated_at": "2019-03-26 09:34:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-24ea2e10-c040-4e1d-8247-99403534b44cjpeg_5c9981c011793.jpeg"
                    }, {
                        "id": 144,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/95ac54a2-7a61-487f-be59-d98c664a08b9jpeg_5c9981c0816ce.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:56",
                        "updated_at": "2019-03-26 09:34:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-95ac54a2-7a61-487f-be59-d98c664a08b9jpeg_5c9981c0816ce.jpeg"
                    }, {
                        "id": 145,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/986d8dbc-5047-40f0-aa2e-6f068c7b0e91-1jpeg_5c9981c0bc5c3.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:57",
                        "updated_at": "2019-03-26 09:34:57",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-986d8dbc-5047-40f0-aa2e-6f068c7b0e91-1jpeg_5c9981c0bc5c3.jpeg"
                    }, {
                        "id": 146,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/4364eda9-cb8f-4174-8521-f60d5e670aecjpeg_5c9981c13c2f2.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:57",
                        "updated_at": "2019-03-26 09:34:57",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-4364eda9-cb8f-4174-8521-f60d5e670aecjpeg_5c9981c13c2f2.jpeg"
                    }, {
                        "id": 147,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/4560efad-923b-4721-9b81-0cd68e4700cdjpeg_5c9981c1b4381.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:57",
                        "updated_at": "2019-03-26 09:34:57",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-4560efad-923b-4721-9b81-0cd68e4700cdjpeg_5c9981c1b4381.jpeg"
                    }, {
                        "id": 148,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/a6578360-c0b8-47bf-bc2c-7de6e043677djpeg_5c9981c1e9176.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:58",
                        "updated_at": "2019-03-26 09:34:58",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-a6578360-c0b8-47bf-bc2c-7de6e043677djpeg_5c9981c1e9176.jpeg"
                    }, {
                        "id": 149,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/be15adce-4fb9-49e7-90d5-36f5c532d749jpeg_5c9981c22ff11.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:58",
                        "updated_at": "2019-03-26 09:34:58",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-be15adce-4fb9-49e7-90d5-36f5c532d749jpeg_5c9981c22ff11.jpeg"
                    }, {
                        "id": 150,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/d3dd49a0-e40c-4aa2-8c39-6a4c6d4d98cdjpeg_5c9981c29bc4f.jpeg",
                        "caption": "Dr. Renato Solidum, Jr., DOST Undersecretary for DRR\/CC, delivers his message during the groundbreaking ceremony of the first-ever PAGASA Planetarium in Molugan, El Salvador in Misamis Oriental last March 15, 2019.",
                        "created_at": "2019-03-26 09:34:58",
                        "updated_at": "2019-03-26 09:38:29",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-d3dd49a0-e40c-4aa2-8c39-6a4c6d4d98cdjpeg_5c9981c29bc4f.jpeg"
                    }, {
                        "id": 151,
                        "albums_id": 22,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/fab18e69-9047-44bc-b5ff-53037a05570ejpeg_5c9981c2d0a88.jpeg",
                        "caption": null,
                        "created_at": "2019-03-26 09:34:59",
                        "updated_at": "2019-03-26 09:34:59",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-fab18e69-9047-44bc-b5ff-53037a05570ejpeg_5c9981c2d0a88.jpeg"
                    }]
                }, {
                    "id": 21,
                    "album_name": "Inaugural Ceremony  of the Pasig-Marikina-Tullahan River Flood Forecasting  and Warning Center",
                    "album_caption": "07 December 2018<br \/>\r\nPAGASA Weather and Flood Forecasting Center, Agham Road, Diliman, Quezon City",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5c0db538073bb_5c0db53807441.JPG",
                    "created_at": "2018-12-10 08:37:15",
                    "updated_at": "2018-12-10 08:37:15",
                    "deleted_at": null,
                    "images": [{
                        "id": 130,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1505jpg_5c0db5bb242ca.JPG",
                        "caption": "DOST Secretary Fortunato T. de la Pe\u00f1a and H.E. Dong-Man Han, Ambassador of Korea, pose in front of the newly-inaugurated Pasig-Marikina-Tullahan Flood Forecasting and Warning  Center located in PAGASA, Quezon City.",
                        "created_at": "2018-12-10 08:39:26",
                        "updated_at": "2018-12-10 08:59:10",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1505jpg_5c0db5bb242ca.JPG"
                    }, {
                        "id": 131,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1510jpg_5c0db5be278d9.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:28",
                        "updated_at": "2018-12-10 08:39:28",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1510jpg_5c0db5be278d9.JPG"
                    }, {
                        "id": 132,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1547jpg_5c0db5c0ca455.JPG",
                        "caption": "PAGASA Administrator Dr. Vicente Malano, DOST Secretary Fortunato de la Pe\u00f1a, and H.E. Ambassador Dong-Man Han, reviews the program lined-up for the inauguration.",
                        "created_at": "2018-12-10 08:39:31",
                        "updated_at": "2018-12-11 09:26:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1547jpg_5c0db5c0ca455.JPG"
                    }, {
                        "id": 133,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1589jpg_5c0db5c4132d4.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:35",
                        "updated_at": "2018-12-10 08:39:35",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1589jpg_5c0db5c4132d4.JPG"
                    }, {
                        "id": 134,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1665jpg_5c0db5c75c537.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:38",
                        "updated_at": "2018-12-10 08:39:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1665jpg_5c0db5c75c537.JPG"
                    }, {
                        "id": 135,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1666jpg_5c0db5ca319f6.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:41",
                        "updated_at": "2018-12-10 08:39:41",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1666jpg_5c0db5ca319f6.JPG"
                    }, {
                        "id": 136,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1673jpg_5c0db5cd10e9c.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:45",
                        "updated_at": "2018-12-10 08:39:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1673jpg_5c0db5cd10e9c.JPG"
                    }, {
                        "id": 137,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1692jpg_5c0db5d15806a.JPG",
                        "caption": null,
                        "created_at": "2018-12-10 08:39:48",
                        "updated_at": "2018-12-10 08:39:48",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1692jpg_5c0db5d15806a.JPG"
                    }, {
                        "id": 138,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1729jpg_5c0db5d4a9581.JPG",
                        "caption": "DOST Secretary Fortunato T. de la Pe\u00f1a reads the ceremonial activation of the warning center.",
                        "created_at": "2018-12-10 08:39:54",
                        "updated_at": "2018-12-11 09:29:47",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1729jpg_5c0db5d4a9581.JPG"
                    }, {
                        "id": 139,
                        "albums_id": 21,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/img-1741jpg_5c0db5da0a905.JPG",
                        "caption": "H.E. Dong-Man Han, Ambassador of Korea, reads the ceremonial activation of the warning center.",
                        "created_at": "2018-12-10 08:39:58",
                        "updated_at": "2018-12-11 09:30:39",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-img-1741jpg_5c0db5da0a905.JPG"
                    }]
                }, {
                    "id": 20,
                    "album_name": "PAGASA Visayas CMOs\/OICs Conference",
                    "album_caption": "October 25, 2018, Cebu City.<br \/>\r\n<br \/>\r\nAn annual activity conducted by PAGASA for its Chief Meteorological Officers and Officer-in-Charge in the Visayas region.",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5be2346e1570f_5be2346e1578c.JPG",
                    "created_at": "2018-11-07 08:40:16",
                    "updated_at": "2018-11-07 08:40:16",
                    "deleted_at": null,
                    "images": [{
                        "id": 117,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0425jpg_5be235d8ac26e.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:20",
                        "updated_at": "2018-11-07 08:46:20",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0425jpg_5be235d8ac26e.JPG"
                    }, {
                        "id": 118,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0031jpg_5be235dc084ac.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:22",
                        "updated_at": "2018-11-07 08:46:22",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0031jpg_5be235dc084ac.JPG"
                    }, {
                        "id": 119,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0033jpg_5be235de98ad2.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:25",
                        "updated_at": "2018-11-07 08:46:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0033jpg_5be235de98ad2.JPG"
                    }, {
                        "id": 120,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0035jpg_5be235e15fadf.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:28",
                        "updated_at": "2018-11-07 08:46:28",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0035jpg_5be235e15fadf.JPG"
                    }, {
                        "id": 121,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0046jpg_5be235e44117f.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:30",
                        "updated_at": "2018-11-07 08:46:30",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0046jpg_5be235e44117f.JPG"
                    }, {
                        "id": 122,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0088jpg_5be235e6c3373.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:33",
                        "updated_at": "2018-11-07 08:46:33",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0088jpg_5be235e6c3373.JPG"
                    }, {
                        "id": 123,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0103jpg_5be235e924741.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:35",
                        "updated_at": "2018-11-07 08:46:35",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0103jpg_5be235e924741.JPG"
                    }, {
                        "id": 124,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0121jpg_5be235ebc92d5.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:37",
                        "updated_at": "2018-11-07 08:46:37",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0121jpg_5be235ebc92d5.JPG"
                    }, {
                        "id": 125,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0147jpg_5be235eddb71a.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:40",
                        "updated_at": "2018-11-07 08:46:40",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0147jpg_5be235eddb71a.JPG"
                    }, {
                        "id": 126,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0216jpg_5be235f012136.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:41",
                        "updated_at": "2018-11-07 08:46:41",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0216jpg_5be235f012136.JPG"
                    }, {
                        "id": 127,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0257jpg_5be235f1922c8.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:43",
                        "updated_at": "2018-11-07 08:46:43",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0257jpg_5be235f1922c8.JPG"
                    }, {
                        "id": 128,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0325jpg_5be235f3bce24.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:46:46",
                        "updated_at": "2018-11-07 08:46:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0325jpg_5be235f3bce24.JPG"
                    }, {
                        "id": 129,
                        "albums_id": 20,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a0328jpg_5be2374b1a74f.JPG",
                        "caption": null,
                        "created_at": "2018-11-07 08:52:29",
                        "updated_at": "2018-11-07 08:52:29",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a0328jpg_5be2374b1a74f.JPG"
                    }]
                }, {
                    "id": 19,
                    "album_name": "Meteorologists Training Course 2018",
                    "album_caption": "MTC is an intensive training that covers atmosphere science compulsory topics including climatology, physical, dynamic and synoptic meteorology. MTC also covers most elective fields of specialization like aeronautical and agricultural meteorology, as well as weather forecasting",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5bbfd5951cf55_5bbfd5951cfbf.jpg",
                    "created_at": "2018-10-12 06:58:30",
                    "updated_at": "2018-10-12 06:58:30",
                    "deleted_at": null,
                    "images": [{
                        "id": 113,
                        "albums_id": 19,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/43878219-2166781976680055-1327501681692246016-ojpg_5bbfd5aec7d74.jpg",
                        "caption": null,
                        "created_at": "2018-10-12 06:58:55",
                        "updated_at": "2018-10-12 06:58:55",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-43878219-2166781976680055-1327501681692246016-ojpg_5bbfd5aec7d74.jpg"
                    }, {
                        "id": 114,
                        "albums_id": 19,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/43788121-2166782023346717-5617696723565543424-ojpg_5bbfd5afb2c12.jpg",
                        "caption": null,
                        "created_at": "2018-10-12 06:58:56",
                        "updated_at": "2018-10-12 06:58:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-43788121-2166782023346717-5617696723565543424-ojpg_5bbfd5afb2c12.jpg"
                    }, {
                        "id": 115,
                        "albums_id": 19,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/43624240-2166788456679407-2926899570887622656-ojpg_5bbfd5b01625f.jpg",
                        "caption": null,
                        "created_at": "2018-10-12 06:58:56",
                        "updated_at": "2018-10-12 06:58:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-43624240-2166788456679407-2926899570887622656-ojpg_5bbfd5b01625f.jpg"
                    }, {
                        "id": 116,
                        "albums_id": 19,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/43688353-2166788600012726-7150812860677881856-ojpg_5bbfd5b0657b0.jpg",
                        "caption": null,
                        "created_at": "2018-10-12 06:58:56",
                        "updated_at": "2018-10-12 06:58:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-43688353-2166788600012726-7150812860677881856-ojpg_5bbfd5b0657b0.jpg"
                    }]
                }, {
                    "id": 18,
                    "album_name": "QCDRRMO Seminar-Workshop on Hydrometeorological Hazards",
                    "album_caption": "Held last August 17, 2018 at PAGASA Amihan Conference Room",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5b9b21edbb9b8_5b9b21edbba1e.JPG",
                    "created_at": "2018-09-14 10:50:26",
                    "updated_at": "2018-09-14 10:50:26",
                    "deleted_at": null,
                    "images": [{
                        "id": 97,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6790jpg_5b9b22d906346.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:21",
                        "updated_at": "2018-09-14 10:54:21",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6790jpg_5b9b22d906346.JPG"
                    }, {
                        "id": 98,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6793jpg_5b9b22dde340b.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:34",
                        "updated_at": "2018-09-14 10:54:34",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6793jpg_5b9b22dde340b.JPG"
                    }, {
                        "id": 99,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6794jpg_5b9b22ea62cdf.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:37",
                        "updated_at": "2018-09-14 10:54:37",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6794jpg_5b9b22ea62cdf.JPG"
                    }, {
                        "id": 100,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6798jpg_5b9b22ed2dcba.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:39",
                        "updated_at": "2018-09-14 10:54:39",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6798jpg_5b9b22ed2dcba.JPG"
                    }, {
                        "id": 102,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6671jpg_5b9b22f223857.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:45",
                        "updated_at": "2018-09-14 10:54:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6671jpg_5b9b22f223857.JPG"
                    }, {
                        "id": 103,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6742jpg_5b9b22f583144.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:49",
                        "updated_at": "2018-09-14 10:54:49",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6742jpg_5b9b22f583144.JPG"
                    }, {
                        "id": 104,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6748jpg_5b9b22f96270b.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:54:52",
                        "updated_at": "2018-09-14 10:54:52",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6748jpg_5b9b22f96270b.JPG"
                    }, {
                        "id": 105,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6790jpg_5b9b23026cd0a.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:55:08",
                        "updated_at": "2018-09-14 10:55:08",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6790jpg_5b9b23026cd0a.JPG"
                    }, {
                        "id": 109,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6638jpg_5b9b231580615.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:55:20",
                        "updated_at": "2018-09-14 10:55:20",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6638jpg_5b9b231580615.JPG"
                    }, {
                        "id": 110,
                        "albums_id": 18,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6671jpg_5b9b23183f270.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:55:23",
                        "updated_at": "2018-09-14 10:55:23",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6671jpg_5b9b23183f270.JPG"
                    }]
                }, {
                    "id": 17,
                    "album_name": "Southeastern Asia-Oceania Flash Flood Guidance System (SAOFFGS) In-Region Operations Training Worksh",
                    "album_caption": "PAGASA Amihan Conference Room<br \/><br \/>\r\n12-14 September 2018",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-5b9b1fc70beca_5b9b1fc70bf30.JPG",
                    "created_at": "2018-09-14 10:32:03",
                    "updated_at": "2018-09-14 10:41:14",
                    "deleted_at": null,
                    "images": [{
                        "id": 90,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7422jpg_5b9b1e8cee0cb.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:36:02",
                        "updated_at": "2018-09-14 10:36:02",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7422jpg_5b9b1e8cee0cb.JPG"
                    }, {
                        "id": 91,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7532jpg_5b9b1e921d853.JPG",
                        "caption": "Participants of the SAOFFGS Training Workshop together with the officials of PAGASA.",
                        "created_at": "2018-09-14 10:36:05",
                        "updated_at": "2018-09-14 10:40:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7532jpg_5b9b1e921d853.JPG"
                    }, {
                        "id": 92,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7668jpg_5b9b1e957b02d.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:36:08",
                        "updated_at": "2018-09-14 10:36:08",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7668jpg_5b9b1e957b02d.JPG"
                    }, {
                        "id": 93,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7723jpg_5b9b1e9825984.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:36:11",
                        "updated_at": "2018-09-14 10:36:11",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7723jpg_5b9b1e9825984.JPG"
                    }, {
                        "id": 94,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7748jpg_5b9b1e9badcc4.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:36:15",
                        "updated_at": "2018-09-14 10:36:15",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7748jpg_5b9b1e9badcc4.JPG"
                    }, {
                        "id": 96,
                        "albums_id": 17,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7787jpg_5b9b1f48af69c.JPG",
                        "caption": null,
                        "created_at": "2018-09-14 10:39:07",
                        "updated_at": "2018-09-14 10:39:07",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7787jpg_5b9b1f48af69c.JPG"
                    }]
                }, {
                    "id": 16,
                    "album_name": "2018 National Science and Technology Week (NSTW)",
                    "album_caption": "Held every third week of July, the NSTW highlights the significant contributions of science and technology to national development and has become a platform for heralding S&T advocacy in the country.\r\n\r\nThe NSTW was held last July 17-21, 2018 at the World Trade Center. The theme for this year is \"Innovation for Collective Prosperity\".",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37664888-2053315024693418-2385601346469363712-ojpg_5b5fd6b0a54db.jpg",
                    "created_at": "2018-07-31 11:25:05",
                    "updated_at": "2018-07-31 11:28:36",
                    "deleted_at": null,
                    "images": [{
                        "id": 57,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37664888-2053315024693418-2385601346469363712-ojpg_5b5fd6b0a54db.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:38",
                        "updated_at": "2018-07-31 11:25:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37664888-2053315024693418-2385601346469363712-ojpg_5b5fd6b0a54db.jpg"
                    }, {
                        "id": 58,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37667206-2053325261359061-4802419326994874368-ojpg_5b5fd6b279a4e.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:39",
                        "updated_at": "2018-07-31 11:25:39",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37667206-2053325261359061-4802419326994874368-ojpg_5b5fd6b279a4e.jpg"
                    }, {
                        "id": 59,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37669677-2053313418026912-7357034448379969536-ojpg_5b5fd6b373831.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:40",
                        "updated_at": "2018-07-31 11:25:40",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37669677-2053313418026912-7357034448379969536-ojpg_5b5fd6b373831.jpg"
                    }, {
                        "id": 60,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37669720-2053326068025647-8956078561119174656-ojpg_5b5fd6b469502.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:41",
                        "updated_at": "2018-07-31 11:25:41",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37669720-2053326068025647-8956078561119174656-ojpg_5b5fd6b469502.jpg"
                    }, {
                        "id": 61,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37673651-2053313218026932-1698968579875012608-ojpg_5b5fd6b55d13e.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:42",
                        "updated_at": "2018-07-31 11:25:42",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37673651-2053313218026932-1698968579875012608-ojpg_5b5fd6b55d13e.jpg"
                    }, {
                        "id": 62,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37677748-2053326448025609-7911774790858309632-ojpg_5b5fd6b66d606.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:43",
                        "updated_at": "2018-07-31 11:25:43",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37677748-2053326448025609-7911774790858309632-ojpg_5b5fd6b66d606.jpg"
                    }, {
                        "id": 63,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37698905-2053314438026810-960079843838394368-ojpg_5b5fd6b79a10d.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:45",
                        "updated_at": "2018-07-31 11:25:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37698905-2053314438026810-960079843838394368-ojpg_5b5fd6b79a10d.jpg"
                    }, {
                        "id": 64,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37700160-2053333468024907-2093710318151663616-ojpg_5b5fd6b90fa89.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:46",
                        "updated_at": "2018-07-31 11:25:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37700160-2053333468024907-2093710318151663616-ojpg_5b5fd6b90fa89.jpg"
                    }, {
                        "id": 65,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37700885-2053324451359142-2261092520890990592-ojpg_5b5fd6ba46980.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:47",
                        "updated_at": "2018-07-31 11:25:47",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37700885-2053324451359142-2261092520890990592-ojpg_5b5fd6ba46980.jpg"
                    }, {
                        "id": 66,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37717630-2053333951358192-1984606977623326720-ojpg_5b5fd6bb2c2ef.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:49",
                        "updated_at": "2018-07-31 11:25:49",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37717630-2053333951358192-1984606977623326720-ojpg_5b5fd6bb2c2ef.jpg"
                    }, {
                        "id": 67,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37749377-2053326384692282-6837993032252391424-ojpg_5b5fd6bd447d7.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:51",
                        "updated_at": "2018-07-31 11:25:51",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37749377-2053326384692282-6837993032252391424-ojpg_5b5fd6bd447d7.jpg"
                    }, {
                        "id": 68,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37787420-2053333761358211-5911048307051855872-ojpg_5b5fd6bf467a1.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:52",
                        "updated_at": "2018-07-31 11:25:52",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37787420-2053333761358211-5911048307051855872-ojpg_5b5fd6bf467a1.jpg"
                    }, {
                        "id": 69,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37795216-2053316148026639-14941920639844352-ojpg_5b5fd6c0b244e.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:54",
                        "updated_at": "2018-07-31 11:25:54",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37795216-2053316148026639-14941920639844352-ojpg_5b5fd6c0b244e.jpg"
                    }, {
                        "id": 70,
                        "albums_id": 16,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/37821897-2053313871360200-4621128684416270336-ojpg_5b5fd6c27d526.jpg",
                        "caption": null,
                        "created_at": "2018-07-31 11:25:55",
                        "updated_at": "2018-07-31 11:25:55",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-37821897-2053313871360200-4621128684416270336-ojpg_5b5fd6c27d526.jpg"
                    }]
                }, {
                    "id": 15,
                    "album_name": "2018 Typhoon and Flood Awareness Week",
                    "album_caption": "The Typhoon and Flood Awareness Week (TFAW) is a yearly event which is conducted every third week of June by virtue of Presidential Proclamation 1535, Series of 2008.\r\n\r\nThe theme for this year is \"Science and Technology Innovation: A Way to Typhoon and Flood Risk Reduction\".",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3903jpg_5b5fc4bedf068.JPG",
                    "created_at": "2018-07-31 10:00:37",
                    "updated_at": "2018-07-31 11:30:06",
                    "deleted_at": null,
                    "images": [{
                        "id": 23,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3943jpg_5b5fc44c856a2.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:07:17",
                        "updated_at": "2018-07-31 10:07:17",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3943jpg_5b5fc44c856a2.JPG"
                    }, {
                        "id": 24,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3955jpg_5b5fc455b097b.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:07:26",
                        "updated_at": "2018-07-31 10:07:26",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3955jpg_5b5fc455b097b.JPG"
                    }, {
                        "id": 25,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3812jpg_5b5fc45e1ffae.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:07:37",
                        "updated_at": "2018-07-31 10:07:37",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3812jpg_5b5fc45e1ffae.JPG"
                    }, {
                        "id": 26,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3818jpg_5b5fc46991c17.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:07:48",
                        "updated_at": "2018-07-31 10:07:48",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3818jpg_5b5fc46991c17.JPG"
                    }, {
                        "id": 27,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3820jpg_5b5fc47413586.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:07:56",
                        "updated_at": "2018-07-31 10:07:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3820jpg_5b5fc47413586.JPG"
                    }, {
                        "id": 28,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3827jpg_5b5fc47cb5e84.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:07",
                        "updated_at": "2018-07-31 10:08:07",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3827jpg_5b5fc47cb5e84.JPG"
                    }, {
                        "id": 29,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3836jpg_5b5fc487727fd.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:20",
                        "updated_at": "2018-07-31 10:08:20",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3836jpg_5b5fc487727fd.JPG"
                    }, {
                        "id": 30,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3851jpg_5b5fc49435389.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:28",
                        "updated_at": "2018-07-31 10:08:28",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3851jpg_5b5fc49435389.JPG"
                    }, {
                        "id": 31,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3854jpg_5b5fc49c908d4.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:38",
                        "updated_at": "2018-07-31 10:08:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3854jpg_5b5fc49c908d4.JPG"
                    }, {
                        "id": 32,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3857jpg_5b5fc4a6267e0.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:46",
                        "updated_at": "2018-07-31 10:08:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3857jpg_5b5fc4a6267e0.JPG"
                    }, {
                        "id": 33,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3858jpg_5b5fc4aeb2b49.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:08:56",
                        "updated_at": "2018-07-31 10:08:56",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3858jpg_5b5fc4aeb2b49.JPG"
                    }, {
                        "id": 34,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3860jpg_5b5fc4b87b768.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:09:02",
                        "updated_at": "2018-07-31 10:09:02",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3860jpg_5b5fc4b87b768.JPG"
                    }, {
                        "id": 35,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3903jpg_5b5fc4bedf068.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:09:15",
                        "updated_at": "2018-07-31 10:09:15",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3903jpg_5b5fc4bedf068.JPG"
                    }, {
                        "id": 36,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3906jpg_5b5fc4cc02ee4.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:09:26",
                        "updated_at": "2018-07-31 10:09:26",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3906jpg_5b5fc4cc02ee4.JPG"
                    }, {
                        "id": 37,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3915jpg_5b5fc4d654374.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:09:35",
                        "updated_at": "2018-07-31 10:09:35",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3915jpg_5b5fc4d654374.JPG"
                    }, {
                        "id": 38,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3930jpg_5b5fc4df1d441.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:09:45",
                        "updated_at": "2018-07-31 10:09:45",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3930jpg_5b5fc4df1d441.JPG"
                    }, {
                        "id": 39,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3931jpg_5b5fc4e994fc5.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:10:00",
                        "updated_at": "2018-07-31 10:10:00",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3931jpg_5b5fc4e994fc5.JPG"
                    }, {
                        "id": 40,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3943jpg_5b5fc580e46df.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:12:24",
                        "updated_at": "2018-07-31 10:12:24",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3943jpg_5b5fc580e46df.JPG"
                    }, {
                        "id": 41,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3955jpg_5b5fc58835af4.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:12:31",
                        "updated_at": "2018-07-31 10:12:31",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3955jpg_5b5fc58835af4.JPG"
                    }, {
                        "id": 42,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3812jpg_5b5fc58f3777f.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:12:46",
                        "updated_at": "2018-07-31 10:12:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3812jpg_5b5fc58f3777f.JPG"
                    }, {
                        "id": 43,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3818jpg_5b5fc59f005e4.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:12:57",
                        "updated_at": "2018-07-31 10:12:57",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3818jpg_5b5fc59f005e4.JPG"
                    }, {
                        "id": 44,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3820jpg_5b5fc5a9cd98d.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:13:07",
                        "updated_at": "2018-07-31 10:13:07",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3820jpg_5b5fc5a9cd98d.JPG"
                    }, {
                        "id": 45,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3827jpg_5b5fc5b3cf596.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:13:24",
                        "updated_at": "2018-07-31 10:13:24",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3827jpg_5b5fc5b3cf596.JPG"
                    }, {
                        "id": 46,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3836jpg_5b5fc5c40997a.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:13:38",
                        "updated_at": "2018-07-31 10:13:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3836jpg_5b5fc5c40997a.JPG"
                    }, {
                        "id": 47,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3851jpg_5b5fc5d23e0c3.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:13:46",
                        "updated_at": "2018-07-31 10:13:46",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3851jpg_5b5fc5d23e0c3.JPG"
                    }, {
                        "id": 48,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3854jpg_5b5fc5da78d05.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:14:05",
                        "updated_at": "2018-07-31 10:14:05",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3854jpg_5b5fc5da78d05.JPG"
                    }, {
                        "id": 49,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3857jpg_5b5fc5ed4382c.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:14:13",
                        "updated_at": "2018-07-31 10:14:13",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3857jpg_5b5fc5ed4382c.JPG"
                    }, {
                        "id": 50,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3858jpg_5b5fc5f590934.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:14:30",
                        "updated_at": "2018-07-31 10:14:30",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3858jpg_5b5fc5f590934.JPG"
                    }, {
                        "id": 51,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3860jpg_5b5fc6061a1b5.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:14:38",
                        "updated_at": "2018-07-31 10:14:38",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3860jpg_5b5fc6061a1b5.JPG"
                    }, {
                        "id": 52,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3903jpg_5b5fc60e2617f.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:14:48",
                        "updated_at": "2018-07-31 10:14:48",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3903jpg_5b5fc60e2617f.JPG"
                    }, {
                        "id": 53,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3906jpg_5b5fc6187b45e.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:15:00",
                        "updated_at": "2018-07-31 10:15:00",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3906jpg_5b5fc6187b45e.JPG"
                    }, {
                        "id": 54,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3915jpg_5b5fc624e8bd3.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:15:10",
                        "updated_at": "2018-07-31 10:15:10",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3915jpg_5b5fc624e8bd3.JPG"
                    }, {
                        "id": 55,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3930jpg_5b5fc62e6a7ba.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:15:25",
                        "updated_at": "2018-07-31 10:15:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3930jpg_5b5fc62e6a7ba.JPG"
                    }, {
                        "id": 56,
                        "albums_id": 15,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a3931jpg_5b5fc63d61fac.JPG",
                        "caption": null,
                        "created_at": "2018-07-31 10:15:33",
                        "updated_at": "2018-07-31 10:15:33",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a3931jpg_5b5fc63d61fac.JPG"
                    }]
                }, {
                    "id": 14,
                    "album_name": "2018 CMO NATIONAL CONFERENCE",
                    "album_caption": "The CMO National Conference is a yearly activity of PAGASA for the Chief Meteorological Officers coming from the different field stations of the Agency.",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a1659jpg_5b0ba2c39da49.JPG",
                    "created_at": "2018-05-28 14:28:24",
                    "updated_at": "2018-08-01 10:02:51",
                    "deleted_at": null,
                    "images": [{
                        "id": 22,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a1659jpg_5b0ba2c39da49.JPG",
                        "caption": null,
                        "created_at": "2018-05-28 14:33:42",
                        "updated_at": "2018-05-28 14:33:42",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a1659jpg_5b0ba2c39da49.JPG"
                    }, {
                        "id": 71,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a1525jpg_5b611556ce4b7.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:05:27",
                        "updated_at": "2018-08-01 10:05:27",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a1525jpg_5b611556ce4b7.JPG"
                    }, {
                        "id": 72,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a1660jpg_5b61156708307.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:05:30",
                        "updated_at": "2018-08-01 10:05:30",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a1660jpg_5b61156708307.JPG"
                    }, {
                        "id": 73,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2048jpg_5b61156a69bf7.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:05:48",
                        "updated_at": "2018-08-01 10:05:48",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2048jpg_5b61156a69bf7.JPG"
                    }, {
                        "id": 74,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2072jpg_5b61157d05a73.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:01",
                        "updated_at": "2018-08-01 10:06:01",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2072jpg_5b61157d05a73.JPG"
                    }, {
                        "id": 75,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2081jpg_5b61158958c0b.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:14",
                        "updated_at": "2018-08-01 10:06:14",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2081jpg_5b61158958c0b.JPG"
                    }, {
                        "id": 76,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2089jpg_5b6115966cb54.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:26",
                        "updated_at": "2018-08-01 10:06:26",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2089jpg_5b6115966cb54.JPG"
                    }, {
                        "id": 77,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2090jpg_5b6115a2b5c40.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:34",
                        "updated_at": "2018-08-01 10:06:34",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2090jpg_5b6115a2b5c40.JPG"
                    }, {
                        "id": 78,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2100jpg_5b6115aaaba8b.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:43",
                        "updated_at": "2018-08-01 10:06:43",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2100jpg_5b6115aaaba8b.JPG"
                    }, {
                        "id": 79,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2263jpg_5b6115b345aa9.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:06:53",
                        "updated_at": "2018-08-01 10:06:53",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2263jpg_5b6115b345aa9.JPG"
                    }, {
                        "id": 80,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2268jpg_5b6115bdcbaba.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:07:04",
                        "updated_at": "2018-08-01 10:07:04",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2268jpg_5b6115bdcbaba.JPG"
                    }, {
                        "id": 81,
                        "albums_id": 14,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a2270jpg_5b6115c8248eb.JPG",
                        "caption": null,
                        "created_at": "2018-08-01 10:07:17",
                        "updated_at": "2018-08-01 10:07:17",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a2270jpg_5b6115c8248eb.JPG"
                    }]
                }, {
                    "id": 11,
                    "album_name": "New PAGASA Website Soft Launch - http:\/\/bagong.pagasa.dost.gov.ph\/",
                    "album_caption": "New PAGASA Website Soft Launch\r\nHeld at Cocoon Hotel, Quezon City last January 10, 2018",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6725jpg_5b8f447672e38.JPG",
                    "created_at": "2018-01-26 13:57:05",
                    "updated_at": "2018-09-05 10:47:02",
                    "deleted_at": null,
                    "images": [{
                        "id": 21,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/dsc-0110jpg_5ab35740c4535.JPG",
                        "caption": null,
                        "created_at": "2018-03-22 15:12:03",
                        "updated_at": "2018-03-22 15:12:03",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-dsc-0110jpg_5ab35740c4535.JPG"
                    }, {
                        "id": 82,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6725jpg_5b8f447672e38.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:50:50",
                        "updated_at": "2018-09-05 10:50:50",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6725jpg_5b8f447672e38.JPG"
                    }, {
                        "id": 83,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a6992jpg_5b8f448ae35fd.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:51:04",
                        "updated_at": "2018-09-05 10:51:04",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a6992jpg_5b8f448ae35fd.JPG"
                    }, {
                        "id": 84,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7019jpg_5b8f4498b477b.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:51:21",
                        "updated_at": "2018-09-05 10:51:21",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7019jpg_5b8f4498b477b.JPG"
                    }, {
                        "id": 85,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7045jpg_5b8f44a99381e.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:51:41",
                        "updated_at": "2018-09-05 10:51:41",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7045jpg_5b8f44a99381e.JPG"
                    }, {
                        "id": 86,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7135jpg_5b8f44bd891d9.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:51:53",
                        "updated_at": "2018-09-05 10:51:53",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7135jpg_5b8f44bd891d9.JPG"
                    }, {
                        "id": 87,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7253jpg_5b8f44c970747.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:52:08",
                        "updated_at": "2018-09-05 10:52:08",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7253jpg_5b8f44c970747.JPG"
                    }, {
                        "id": 88,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7288jpg_5b8f44d8126d3.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:52:25",
                        "updated_at": "2018-09-05 10:52:25",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7288jpg_5b8f44d8126d3.JPG"
                    }, {
                        "id": 89,
                        "albums_id": 11,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/8u9a7435jpg_5b8f44ea03ad6.JPG",
                        "caption": null,
                        "created_at": "2018-09-05 10:52:40",
                        "updated_at": "2018-09-05 10:52:40",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-8u9a7435jpg_5b8f44ea03ad6.JPG"
                    }]
                }, {
                    "id": 10,
                    "album_name": "TRAINING ON THE USE OF CLIMATE INFORMATION  Dec. 19-21, 2016",
                    "album_caption": "TRAINING ON THE USE OF CLIMATE INFORMATION  Dec. 19-21, 2016",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-group-pixjpg_5ab3053971bd1.JPG",
                    "created_at": "2017-11-23 16:12:18",
                    "updated_at": "2017-11-23 16:12:18",
                    "deleted_at": null,
                    "images": [{
                        "id": 12,
                        "albums_id": 10,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/group-pixjpg_5ab3053971bd1.JPG",
                        "caption": null,
                        "created_at": "2018-03-22 09:22:02",
                        "updated_at": "2018-03-22 09:22:02",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-group-pixjpg_5ab3053971bd1.JPG"
                    }]
                }, {
                    "id": 9,
                    "album_name": "ADAPTSURVIVENOW PhilCCAP Culminating Activity Nov. 29, 2016",
                    "album_caption": "ADAPTSURVIVENOW PhilCCAP Culminating Activity Nov. 29, 2016",
                    "cover": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-rak-052jpg-5ab302cb2f1bcjpg_5ab3053053934.JPG",
                    "created_at": "2017-11-23 16:10:04",
                    "updated_at": "2017-11-23 16:10:04",
                    "deleted_at": null,
                    "images": [{
                        "id": 11,
                        "albums_id": 9,
                        "image_name": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-rak-052jpg-5ab302cb2f1bcjpg_5ab3053053934.JPG",
                        "caption": null,
                        "created_at": "2018-03-22 09:21:53",
                        "updated_at": "2018-03-22 09:21:53",
                        "deleted_at": null,
                        "thumbnail": "http:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/piias\/gallery\/thumbnail-thumbnail-rak-052jpg-5ab302cb2f1bcjpg_5ab3053053934.JPG"
                    }]
                }, {
                    "id": 8,
                    "album_name": "7th Session of the ASEAN CLIMATE OUTLOOK FORUM  Nov. 14-18, 2016",
                    "album_caption": "7th Session of the ASEAN CLIMATE OUTLOOK FORUM  Nov. 14-18, 2016",
                    "cover": null,
                    "created_at": "2017-11-23 16:08:31",
                    "updated_at": "2017-11-23 16:08:31",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 7,
                    "album_name": "ORIENTATION SEMINAR & Values Orientation Workshop Nov 2016",
                    "album_caption": "ORIENTATION SEMINAR & Values Orientation Workshop Nov 2016",
                    "cover": null,
                    "created_at": "2017-11-23 16:07:23",
                    "updated_at": "2017-11-23 16:07:23",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 6,
                    "album_name": "VOWS Oct 2016",
                    "album_caption": "VOWS Oct 2016",
                    "cover": null,
                    "created_at": "2017-11-23 16:06:42",
                    "updated_at": "2017-11-23 16:06:42",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 5,
                    "album_name": "JPOW Oct 2016",
                    "album_caption": "JPOW Oct 2016",
                    "cover": null,
                    "created_at": "2017-11-23 16:05:35",
                    "updated_at": "2017-11-23 16:05:35",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 3,
                    "album_name": "IEC CBFEWS Operations & Warning Protocol Training & Flood Drill Nov. 23-24, 2016",
                    "album_caption": "IEC CBFEWS Operations & Warning Protocol Training & Flood Drill Nov. 23-24, 2016",
                    "cover": null,
                    "created_at": "2017-11-23 09:00:59",
                    "updated_at": "2017-11-23 09:00:59",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 2,
                    "album_name": "GAD Oct 2016",
                    "album_caption": "GAD October 2016",
                    "cover": null,
                    "created_at": "2017-11-23 09:00:31",
                    "updated_at": "2017-11-23 09:00:31",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 1,
                    "album_name": "ESCAP \/ WMO Typhoon Committee Oct 2016",
                    "album_caption": "ESCAP \/ WMO Typhoon Committee Oct 2016",
                    "cover": null,
                    "created_at": "2017-11-23 08:57:24",
                    "updated_at": "2017-11-23 09:04:21",
                    "deleted_at": null,
                    "images": []
                }],
                "GadPhotoGallery": [{
                    "id": 13,
                    "album_name": "2023 National Women's Month Celebration",
                    "album_caption": "The 2023 National Women\u2019s Month Celebration marks a juncture in the advancement of women\u2019s rights as it launches a new recurring theme from this year to 2028: WE for gender equality and inclusive society. It sparks a renewed commitment to advocacy and banks on the gains achieved during the 2016-2022 theme, WE Make CHANGE Work for Women, which emphasized the need for compassionate and harmonized networks towards gender equality and women\u2019s empowerment (GEWE).<br \/><br \/>\r\n<br \/><br \/>\r\nThe recurring theme also aligns with the Philippine Development Plan 2023-2028, which aims for \u201cdeep economic and social transformation to reinvigorate job creation and accelerate poverty reduction by steering the economy back on a high-growth path.\u201d The plan also highlights that growth must be inclusive, building an environment that provides equal opportunities to all Filipinos and equipping them with skills to participate fully in an innovative and globally competitive economy.<br \/><br \/>\r\n<br \/><br \/>\r\nWe begin this new era of the National Women\u2019s Month Celebration with the hope and ambition that WE are all for Gender Equality, WE are all for an inclusive society.<br \/><br \/>\r\n<br \/><br \/>\r\nSource: http:\/\/www.pcw.gov.ph\/",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-642a41229159f_642a412291624.jpg",
                    "created_at": "2023-03-01 10:55:54",
                    "updated_at": "2023-04-03 10:59:48",
                    "deleted_at": null,
                    "images": [{
                        "id": 54,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/ms-julie-ann-delda-march-27-2023-1png_642a412195238.png",
                        "caption": "",
                        "created_at": "2023-04-03 10:59:46",
                        "updated_at": "2023-04-03 10:59:46",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-ms-julie-ann-delda-march-27-2023-1png_642a412195238.png"
                    }, {
                        "id": 55,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/ms-thelma-cinco-march-20-2023-3png_642a4122ca39b.png",
                        "caption": "",
                        "created_at": "2023-04-03 10:59:47",
                        "updated_at": "2023-04-03 10:59:47",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-ms-thelma-cinco-march-20-2023-3png_642a4122ca39b.png"
                    }, {
                        "id": 57,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-08-14-21-41-914jpg_642a4143e6d15.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:20",
                        "updated_at": "2023-04-03 11:00:20",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-08-14-21-41-914jpg_642a4143e6d15.jpg"
                    }, {
                        "id": 58,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-08-14-25-54-359jpg_642a4144174a0.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:20",
                        "updated_at": "2023-04-03 11:00:20",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-08-14-25-54-359jpg_642a4144174a0.jpg"
                    }, {
                        "id": 59,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-08c5d1ae522a7798ae91674b975077017f733b4ca697a67a6932c6b65fea7222-4a24dc370d48ab1jpg_642a415c5673b.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:44",
                        "updated_at": "2023-04-03 11:00:44",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-08c5d1ae522a7798ae91674b975077017f733b4ca697a67a6932c6b65fea7222-4a24dc370d48ab1jpg_642a415c5673b.jpg"
                    }, {
                        "id": 60,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-624e48929a472f0f5f3f160af4ebf0409e9226ecc3eb68d3b8c53b55d6705b41-c82cf62c7b5007cdjpg_642a415cd05aa.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:44",
                        "updated_at": "2023-04-03 11:00:44",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-624e48929a472f0f5f3f160af4ebf0409e9226ecc3eb68d3b8c53b55d6705b41-c82cf62c7b5007cdjpg_642a415cd05aa.jpg"
                    }, {
                        "id": 61,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-301090f4de84ef831b28ee678d963cad1440f290b898ef006f1b90965f806a8a-a72dfd49b43ded4djpg_642a415d06f15.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:45",
                        "updated_at": "2023-04-03 11:00:45",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-301090f4de84ef831b28ee678d963cad1440f290b898ef006f1b90965f806a8a-a72dfd49b43ded4djpg_642a415d06f15.jpg"
                    }, {
                        "id": 62,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-a66d2bcf768b95cb26e145c90f1c52b96af3a424743a6a35915adbb39200186c-bb131b91731ef06ajpg_642a415d298dc.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:45",
                        "updated_at": "2023-04-03 11:00:45",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-a66d2bcf768b95cb26e145c90f1c52b96af3a424743a6a35915adbb39200186c-bb131b91731ef06ajpg_642a415d298dc.jpg"
                    }, {
                        "id": 63,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-ed1c14c02e3142291e66825342ee8343ef41aa255de69252562cb68a2ea5f248-e7d43724a0a807fejpg_642a415d4a0ed.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:45",
                        "updated_at": "2023-04-03 11:00:45",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-ed1c14c02e3142291e66825342ee8343ef41aa255de69252562cb68a2ea5f248-e7d43724a0a807fejpg_642a415d4a0ed.jpg"
                    }, {
                        "id": 64,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/333154586-203392512309099-7982475708736748972-njpg_642a415d68926.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:00:45",
                        "updated_at": "2023-04-03 11:00:45",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-333154586-203392512309099-7982475708736748972-njpg_642a415d68926.jpg"
                    }, {
                        "id": 65,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/336307260-2423511441150298-1264960976483381719-njpg_642a4183c5a67.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:24",
                        "updated_at": "2023-04-03 11:01:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-336307260-2423511441150298-1264960976483381719-njpg_642a4183c5a67.jpg"
                    }, {
                        "id": 66,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-10-59-57-756jpg_642a41845175e.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:24",
                        "updated_at": "2023-04-03 11:01:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-10-59-57-756jpg_642a41845175e.jpg"
                    }, {
                        "id": 67,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-11-00-05-558jpg_642a418474039.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:24",
                        "updated_at": "2023-04-03 11:01:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-11-00-05-558jpg_642a418474039.jpg"
                    }, {
                        "id": 68,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-11-20-40-564jpg_642a41849283f.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:24",
                        "updated_at": "2023-04-03 11:01:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-11-20-40-564jpg_642a41849283f.jpg"
                    }, {
                        "id": 69,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-11-20-40-940jpg_642a4184b72ab.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:24",
                        "updated_at": "2023-04-03 11:01:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-11-20-40-940jpg_642a4184b72ab.jpg"
                    }, {
                        "id": 70,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-13-23-15-335jpg_642a4184d9bfa.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:25",
                        "updated_at": "2023-04-03 11:01:25",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-13-23-15-335jpg_642a4184d9bfa.jpg"
                    }, {
                        "id": 71,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-13-37-35-341jpg_642a41851051f.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:25",
                        "updated_at": "2023-04-03 11:01:25",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-13-37-35-341jpg_642a41851051f.jpg"
                    }, {
                        "id": 72,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-22-14-11-50-568jpg_642a418530dd0.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:01:25",
                        "updated_at": "2023-04-03 11:01:25",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-22-14-11-50-568jpg_642a418530dd0.jpg"
                    }, {
                        "id": 74,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-0eb4860ac263090f0ee7bf7f73664388164064030dd512ff0aeb3e656c472c71-1557eb0f06a4541ajpg_642a41b224d00.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:10",
                        "updated_at": "2023-04-03 11:02:10",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-0eb4860ac263090f0ee7bf7f73664388164064030dd512ff0aeb3e656c472c71-1557eb0f06a4541ajpg_642a41b224d00.jpg"
                    }, {
                        "id": 75,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-1aa86e824233e1168cbf0c15b0f8b040c0347b91f25b562efe4f1f1c21a3dd28-5db31cf0a971d272jpg_642a41b29fbd9.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:10",
                        "updated_at": "2023-04-03 11:02:10",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-1aa86e824233e1168cbf0c15b0f8b040c0347b91f25b562efe4f1f1c21a3dd28-5db31cf0a971d272jpg_642a41b29fbd9.jpg"
                    }, {
                        "id": 76,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-5e720088c456215853ae11bce8317aee98547a1f1a682a9a18f401bc0679d5f4-e097a478dd183365jpg_642a41b2c0411.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:10",
                        "updated_at": "2023-04-03 11:02:10",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-5e720088c456215853ae11bce8317aee98547a1f1a682a9a18f401bc0679d5f4-e097a478dd183365jpg_642a41b2c0411.jpg"
                    }, {
                        "id": 77,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-32a04937b760010026fd492370d171536fa8502fcc489daec6f177b03303cc36-70b5fb9082498185jpg_642a41b2f1167.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:11",
                        "updated_at": "2023-04-03 11:02:11",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-32a04937b760010026fd492370d171536fa8502fcc489daec6f177b03303cc36-70b5fb9082498185jpg_642a41b2f1167.jpg"
                    }, {
                        "id": 78,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-360edb8b2ed8d06ea780d5f16222314d5f49af7f7028739855e36aaceabeafa6-3288b964b75b9a3ejpg_642a41b32bc56.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:11",
                        "updated_at": "2023-04-03 11:02:11",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-360edb8b2ed8d06ea780d5f16222314d5f49af7f7028739855e36aaceabeafa6-3288b964b75b9a3ejpg_642a41b32bc56.jpg"
                    }, {
                        "id": 79,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/unnamedjpg_642a41b34c4a7.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:02:12",
                        "updated_at": "2023-04-03 11:02:12",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-unnamedjpg_642a41b34c4a7.jpg"
                    }, {
                        "id": 80,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2023-03-29-09-16-06-972jpg_642a42f77918a.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:07:36",
                        "updated_at": "2023-04-03 11:07:36",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2023-03-29-09-16-06-972jpg_642a42f77918a.jpg"
                    }, {
                        "id": 81,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-928446866e3f3a75f1c98f1f9e1bcf558dde64d4301a08278c7c5924a239127a-abc8652bc6ea9507jpg_642a431848ad9.jpg",
                        "caption": "",
                        "created_at": "2023-04-03 11:08:08",
                        "updated_at": "2023-04-03 11:08:08",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-928446866e3f3a75f1c98f1f9e1bcf558dde64d4301a08278c7c5924a239127a-abc8652bc6ea9507jpg_642a431848ad9.jpg"
                    }, {
                        "id": 82,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/8u9a9918jpg_642a434123fe8.JPG",
                        "caption": "",
                        "created_at": "2023-04-03 11:08:51",
                        "updated_at": "2023-04-03 11:08:51",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-8u9a9918jpg_642a434123fe8.JPG"
                    }, {
                        "id": 83,
                        "albums_id": 13,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/8u9a9894jpg_642a4343570cd.JPG",
                        "caption": "",
                        "created_at": "2023-04-03 11:08:53",
                        "updated_at": "2023-04-03 11:08:53",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-8u9a9894jpg_642a4343570cd.JPG"
                    }]
                }, {
                    "id": 12,
                    "album_name": "GAD Monthly Calendar 2023",
                    "album_caption": "GAD Awareness calendar",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-63d9d2fc8ae26_63d9d2fc8aea3.png",
                    "created_at": "2023-01-06 11:02:27",
                    "updated_at": "2023-02-01 10:48:28",
                    "deleted_at": null,
                    "images": [{
                        "id": 52,
                        "albums_id": 12,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/feb-2023jpg_63d9c705620b9.jpg",
                        "caption": "",
                        "created_at": "2023-02-01 09:57:25",
                        "updated_at": "2023-02-01 09:57:25",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-feb-2023jpg_63d9c705620b9.jpg"
                    }, {
                        "id": 53,
                        "albums_id": 12,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/calendar-2022jpg_63febac743421.jpg",
                        "caption": "",
                        "created_at": "2023-03-01 10:39:03",
                        "updated_at": "2023-03-01 10:39:03",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-calendar-2022jpg_63febac743421.jpg"
                    }]
                }, {
                    "id": 11,
                    "album_name": "2022 18-day Campaign to End Violence Against Women",
                    "album_caption": "PAGASA supports the Philippine Commission on Women's (PCW) 18-day Campaign to End Violence Against Women from 25 November - 12 December 2022<br \/><br \/><br \/><br \/><br \/>\r\n<br \/><br \/><br \/><br \/><br \/>\r\nPAGASA ACTIVITIES:<br \/><br \/><br \/><br \/><br \/>\r\n1. Flag retreat and Flag ceremony announcement <br \/><br \/><br \/><br \/><br \/>\r\n(as seen in the photos Ms. Arceli S. Arroyo, Chief of the Administrative Division and member of the PAGASA GAD Focal Point System, and Dr. Nathaniel T. Servando, Deputy Administrator for Administrative and Engineering Services) <br \/><br \/><br \/><br \/><br \/>\r\n2. Film Showing \"Otso\" <br \/><br \/><br \/><br \/><br \/>\r\nonline screening of the indie-film Otso by Elwood Perez, distributed by the EdukSine will be conducted from 25 November to 1st of December 2022 <br \/><br \/><br \/><br \/><br \/>\r\n3. Posting of IECs (GAD corners: Bulletin boards, PAGASA website, GAD Facebook account) <br \/><br \/><br \/><br \/><br \/>\r\n<br \/><br \/><br \/><br \/><br \/>\r\n#vawfreephilippines<br \/><br \/><br \/><br \/><br \/>\r\n#VAWfreePH",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-638427f1b6b65_638427f1b6bd8.jpg",
                    "created_at": "2022-11-28 10:21:28",
                    "updated_at": "2022-11-28 11:16:07",
                    "deleted_at": null,
                    "images": [{
                        "id": 46,
                        "albums_id": 11,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/film-showing-poster-2png_63841d2143a38.png",
                        "caption": "",
                        "created_at": "2022-11-28 10:29:54",
                        "updated_at": "2022-11-28 10:29:54",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-film-showing-poster-2png_63841d2143a38.png"
                    }, {
                        "id": 47,
                        "albums_id": 11,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2022-18-day-campaign-photo-booth-backdrop-designpng_63841d2b21ccf.png",
                        "caption": "",
                        "created_at": "2022-11-28 10:30:10",
                        "updated_at": "2022-11-28 10:30:10",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2022-18-day-campaign-photo-booth-backdrop-designpng_63841d2b21ccf.png"
                    }, {
                        "id": 49,
                        "albums_id": 11,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-880aa88bf030cd56a76403d2734b6a882ab3811b84902321b6a4f55c7a160b88-a4252f74091029fbjpg_63841d528ecda.jpg",
                        "caption": "",
                        "created_at": "2022-11-28 10:30:43",
                        "updated_at": "2022-11-28 10:30:43",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-880aa88bf030cd56a76403d2734b6a882ab3811b84902321b6a4f55c7a160b88-a4252f74091029fbjpg_63841d528ecda.jpg"
                    }, {
                        "id": 50,
                        "albums_id": 11,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/0-02-06-1fb7755d8524def51d728a9deac3fc6b41b91e5a24a33e5ea8d4ed8831c9e8f9-69644b76a46790fajpg_6384269788f46.jpg",
                        "caption": "",
                        "created_at": "2022-11-28 11:10:16",
                        "updated_at": "2022-11-28 11:10:16",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-0-02-06-1fb7755d8524def51d728a9deac3fc6b41b91e5a24a33e5ea8d4ed8831c9e8f9-69644b76a46790fajpg_6384269788f46.jpg"
                    }]
                }, {
                    "id": 9,
                    "album_name": "2022 National Women's Month Celebration",
                    "album_caption": "The 2022 National Women\u2019s Month Celebration (NWMC) endeavors to highlight the gains achieved for women and girls, assess actions towards gender equality and look forward to steps that must be taken to ensure progress in empowering women. With the country still reeling from the COVID-19 pandemic, studies and data show that the health crisis stalled movements towards gender equality, worsening inequalities, further exposing gender gaps, and exacerbating vulnerabilities in social and political, and economic aspects.<br \/>\r\n<br \/>\r\n2017-2022 NWMC Theme: WE Make CHANGE Work for Women<br \/>\r\n<br \/>\r\nCulminating the 6-year theme \u201cWE Make CHANGE Work for Women\u201d this year poses a statement and a question: Did WE Make CHANGE Work for Women? How and to what extent? With this theme, stakeholders can gauge the changes implemented towards GEWE, pursuant to laws on women, particularly the Magna Carta of Women.",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-62256a8eb93ae_62256a8eb942f.jpg",
                    "created_at": "2022-03-07 10:14:41",
                    "updated_at": "2022-03-07 10:14:41",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 8,
                    "album_name": "2022 GAD Monthly Calendar",
                    "album_caption": "2022 GAD Monthly Calendar",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-620325eb9d729_620325eb9d79b.png",
                    "created_at": "2022-02-09 10:24:51",
                    "updated_at": "2022-02-09 10:24:51",
                    "deleted_at": null,
                    "images": [{
                        "id": 34,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/calendarpng_620327f6253ea.png",
                        "caption": "",
                        "created_at": "2022-02-09 10:33:33",
                        "updated_at": "2022-02-09 10:33:33",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-calendarpng_620327f6253ea.png"
                    }, {
                        "id": 35,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/feb-awareness-calendarpng_620327fbeea4d.png",
                        "caption": "",
                        "created_at": "2022-02-09 10:33:39",
                        "updated_at": "2022-02-09 10:33:39",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-feb-awareness-calendarpng_620327fbeea4d.png"
                    }, {
                        "id": 36,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/march-2022png_622568b5276ab.png",
                        "caption": "",
                        "created_at": "2022-03-07 10:06:52",
                        "updated_at": "2022-03-07 10:06:52",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-march-2022png_622568b5276ab.png"
                    }, {
                        "id": 37,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/april-calendarpng_624bbd4f08088.png",
                        "caption": "",
                        "created_at": "2022-04-05 11:53:56",
                        "updated_at": "2022-04-05 11:53:56",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-april-calendarpng_624bbd4f08088.png"
                    }, {
                        "id": 38,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/may-2022-calendarpng_6295bbd40ffbc.png",
                        "caption": "",
                        "created_at": "2022-05-31 14:55:16",
                        "updated_at": "2022-05-31 14:55:16",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-may-2022-calendarpng_6295bbd40ffbc.png"
                    }, {
                        "id": 39,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/june-2022png_6295c20f89691.png",
                        "caption": "",
                        "created_at": "2022-05-31 15:21:52",
                        "updated_at": "2022-05-31 15:21:52",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-june-2022png_6295c20f89691.png"
                    }, {
                        "id": 40,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/july-calendar-2022png_62ba91f2b1f81.png",
                        "caption": "",
                        "created_at": "2022-06-28 13:30:29",
                        "updated_at": "2022-06-28 13:30:29",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-july-calendar-2022png_62ba91f2b1f81.png"
                    }, {
                        "id": 41,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/august-2022-calendarpng_62e882afb000d.png",
                        "caption": "",
                        "created_at": "2022-08-02 09:49:36",
                        "updated_at": "2022-08-02 09:49:36",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-august-2022-calendarpng_62e882afb000d.png"
                    }, {
                        "id": 42,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/septemberjpg_6311702b016bc.jpg",
                        "caption": "",
                        "created_at": "2022-09-02 10:53:31",
                        "updated_at": "2022-09-02 10:53:31",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-septemberjpg_6311702b016bc.jpg"
                    }, {
                        "id": 43,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/october-calendarpng_633a4d67287d5.png",
                        "caption": "",
                        "created_at": "2022-10-03 10:48:07",
                        "updated_at": "2022-10-03 10:48:07",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-october-calendarpng_633a4d67287d5.png"
                    }, {
                        "id": 44,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/calendar-2022-2png_6368657b4a0c1.png",
                        "caption": "",
                        "created_at": "2022-11-07 09:55:08",
                        "updated_at": "2022-11-07 09:55:08",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-calendar-2022-2png_6368657b4a0c1.png"
                    }, {
                        "id": 51,
                        "albums_id": 8,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2022-12-01-08-56-17-905jpg_638812e6db4d0.jpg",
                        "caption": "",
                        "created_at": "2022-12-01 10:35:19",
                        "updated_at": "2022-12-01 10:35:19",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2022-12-01-08-56-17-905jpg_638812e6db4d0.jpg"
                    }]
                }, {
                    "id": 6,
                    "album_name": "2021 18-Day Campaign to End Violence Against Women and their Children",
                    "album_caption": "The Philippine Atmospheric, Geophysical and Astronomical Services Administration (PAGASA) joins the observance of the 18-Day Campaign to ENd Violence Against Women (VAW), November 25 - December 12, 2021.<br \/>\r\n<br \/>\r\nIn 2016, the Inter-Agency Council on Violence Against Women (IACVAWC) adopted the theme \u201cVAW-free community starts with Me\u201d for the 18-Day Campaign to End VAW. The Council also agreed that the said theme shall be used every year from 2016 to 2021. The theme elevates the campaign to positive advocacy as it enjoins everyone to pursue the common vision of a community free from violence against women and girls, and highlights what can be done to achieve such. <br \/>\r\n<br \/>\r\nViolence against women (VAW) is a grave violation of women\u2019s rights and fundamental freedoms. It manifests deep-seated discrimination and gender inequality and continues to be one of the country\u2019s perennial social problems. The National Demographic Health Survey 2017, released by the Philippine Statistics Authority, showed that 1 in 4 Filipino women, aged 15-49, has experienced physical, emotional, or sexual violence from their husband or partner.   While the global estimates by the World Health Organization indicate that about 1 in 3 women (35%) worldwide have experienced either physical and\/or sexual violence from intimate partner or non-partner in their lifetime.<br \/>\r\n<br \/>\r\nThe 18-Day Campaign to End VAW supports the Philippine government\u2019s goal of protecting the human rights of women and girls by upholding its commitment to address all forms of gender-based violence as enshrined in the 1987 Constitution. By virtue of Republic Act 10398 or the Act declaring November 25 of every year as the National Consciousness Day for the Elimination of VAWC, government agencies are mandated to raise awareness on the problem of violence and the elimination of all forms of violence against women and girls.<br \/>\r\n<br \/>\r\nFor more details about the campaign:<br \/>\r\nhttps:\/\/pcw.gov.ph\/2021-18-day-campaign-to-end-violence-against-women\/",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-619dcf2d7de9f_619dcf2d7df2a.jpg",
                    "created_at": "2021-11-24 13:35:42",
                    "updated_at": "2021-11-24 13:35:42",
                    "deleted_at": null,
                    "images": []
                }, {
                    "id": 5,
                    "album_name": "2021 National Women's Month Celebration \"Women in Science\"",
                    "album_caption": "To celebrate the 2021 National Women's Month, PAGASA-GAD's online advocacy features Women in Science to showcase different women's roles that continue to help the nation amidst the pandemic. <br \/><br \/>\r\n<br \/><br \/>\r\nWe asked the women of PAGASA: <br \/><br \/>\r\n\"How can a woman in the field of Science hurdle the challenges of the pandemic and empower others to remain hopeful?\" <br \/><br \/>\r\n<br \/><br \/>\r\n#WomenMakeChange<br \/><br \/>\r\n#WomenInScience<br \/><br \/>\r\n#JuanaLabansaPandemyaKaya!<br \/><br \/>\r\n#JuanaSays<br \/><br \/>\r\n#NationalWomensMonth",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-603dac27e2e18_603dac27e2e91.jpg",
                    "created_at": "2021-03-02 11:07:49",
                    "updated_at": "2021-03-02 11:08:24",
                    "deleted_at": null,
                    "images": [{
                        "id": 20,
                        "albums_id": 5,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2021-02-26-11-44-17png_603dac2017b65.png",
                        "caption": "",
                        "created_at": "2021-03-02 11:08:16",
                        "updated_at": "2021-03-02 11:08:16",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2021-02-26-11-44-17png_603dac2017b65.png"
                    }, {
                        "id": 21,
                        "albums_id": 5,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/theme-to-be-uploadedpng_60407b69eaf0c.png",
                        "caption": "",
                        "created_at": "2021-03-04 14:17:14",
                        "updated_at": "2021-03-04 14:17:14",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-theme-to-be-uploadedpng_60407b69eaf0c.png"
                    }, {
                        "id": 22,
                        "albums_id": 5,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/slide1jpg_604716691161c.JPG",
                        "caption": "",
                        "created_at": "2021-03-09 14:32:09",
                        "updated_at": "2021-03-09 14:32:09",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-slide1jpg_604716691161c.JPG"
                    }, {
                        "id": 23,
                        "albums_id": 5,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/slide2jpg_60471669b192f.JPG",
                        "caption": "",
                        "created_at": "2021-03-09 14:32:09",
                        "updated_at": "2021-03-09 14:32:09",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-slide2jpg_60471669b192f.JPG"
                    }, {
                        "id": 24,
                        "albums_id": 5,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/viber-image-2021-02-26-11-44-12png_6051740fbabc9.png",
                        "caption": "",
                        "created_at": "2021-03-17 11:14:24",
                        "updated_at": "2021-03-17 11:14:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-viber-image-2021-02-26-11-44-12png_6051740fbabc9.png"
                    }]
                }, {
                    "id": 4,
                    "album_name": "GAD Monthly Calendar",
                    "album_caption": "March 2021 - National Women's Month",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-615e699f75dd9_615e699f75e5a.png",
                    "created_at": "2021-02-23 13:31:56",
                    "updated_at": "2021-10-07 11:29:39",
                    "deleted_at": null,
                    "images": [{
                        "id": 15,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/photo-2021-01-05-17-30-30jpg_6034996e2f011.jpg",
                        "caption": "",
                        "created_at": "2021-02-23 13:58:06",
                        "updated_at": "2021-02-23 13:58:06",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-photo-2021-01-05-17-30-30jpg_6034996e2f011.jpg"
                    }, {
                        "id": 18,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/gad-feb-calendar-01png_603499ba7d024.png",
                        "caption": "",
                        "created_at": "2021-02-23 13:59:24",
                        "updated_at": "2021-02-23 13:59:24",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-gad-feb-calendar-01png_603499ba7d024.png"
                    }, {
                        "id": 19,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/marchpng_603499ca75743.png",
                        "caption": "",
                        "created_at": "2021-02-23 13:59:39",
                        "updated_at": "2021-02-23 13:59:39",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-marchpng_603499ca75743.png"
                    }, {
                        "id": 25,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/april-calendarpng_60768d1dba319.png",
                        "caption": "",
                        "created_at": "2021-04-14 14:35:11",
                        "updated_at": "2021-04-14 14:35:11",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-april-calendarpng_60768d1dba319.png"
                    }, {
                        "id": 27,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/maypng_60daa2b7d6426.png",
                        "caption": "",
                        "created_at": "2021-06-29 12:34:00",
                        "updated_at": "2021-06-29 12:34:00",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-maypng_60daa2b7d6426.png"
                    }, {
                        "id": 28,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/junejpg_60daa2c8f0091.jpg",
                        "caption": "",
                        "created_at": "2021-06-29 12:34:17",
                        "updated_at": "2021-06-29 12:34:17",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-junejpg_60daa2c8f0091.jpg"
                    }, {
                        "id": 29,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/julypng_60dab31e4d345.png",
                        "caption": "",
                        "created_at": "2021-06-29 13:43:59",
                        "updated_at": "2021-06-29 13:43:59",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-julypng_60dab31e4d345.png"
                    }, {
                        "id": 30,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/august-2021jpg_612dc638df7f1.jpg",
                        "caption": "",
                        "created_at": "2021-08-31 14:03:37",
                        "updated_at": "2021-08-31 14:03:37",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-august-2021jpg_612dc638df7f1.jpg"
                    }, {
                        "id": 31,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/sept-calendarpng_612dc643bbc61.png",
                        "caption": "",
                        "created_at": "2021-08-31 14:03:48",
                        "updated_at": "2021-08-31 14:03:48",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-sept-calendarpng_612dc643bbc61.png"
                    }, {
                        "id": 32,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/october-calendarpng_616e5fc40ad43.png",
                        "caption": "",
                        "created_at": "2021-10-19 14:03:59",
                        "updated_at": "2021-10-19 14:03:59",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-october-calendarpng_616e5fc40ad43.png"
                    }, {
                        "id": 33,
                        "albums_id": 4,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/novemberpng_6180a339e5a7b.png",
                        "caption": "",
                        "created_at": "2021-11-02 10:32:26",
                        "updated_at": "2021-11-02 10:32:26",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-novemberpng_6180a339e5a7b.png"
                    }]
                }, {
                    "id": 3,
                    "album_name": "2020 DOST GAD Mainstreaming Award",
                    "album_caption": "2020 DOST GAD Mainstreaming Award",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-601d00384fc5a_601d00384fcce.png",
                    "created_at": "2021-02-05 16:22:16",
                    "updated_at": "2021-02-05 16:22:16",
                    "deleted_at": null,
                    "images": [{
                        "id": 11,
                        "albums_id": 3,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2020-dost-gad-mainstreamig-awardpng_601d007604056.png",
                        "caption": "",
                        "created_at": "2021-02-05 16:23:18",
                        "updated_at": "2021-02-05 16:23:18",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2020-dost-gad-mainstreamig-awardpng_601d007604056.png"
                    }]
                }, {
                    "id": 2,
                    "album_name": "2019 National Women's Month",
                    "album_caption": "2019 National Women's Month",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-601d0017a57e8_601d0017a588a.jpg",
                    "created_at": "2021-02-05 16:21:44",
                    "updated_at": "2021-02-05 16:21:44",
                    "deleted_at": null,
                    "images": [{
                        "id": 7,
                        "albums_id": 2,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2019-national-womens-month-1jpg_601d0068f031d.jpg",
                        "caption": "",
                        "created_at": "2021-02-05 16:23:05",
                        "updated_at": "2021-02-05 16:23:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2019-national-womens-month-1jpg_601d0068f031d.jpg"
                    }, {
                        "id": 8,
                        "albums_id": 2,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2019-national-womens-month-2jpg_601d0069996ae.jpg",
                        "caption": "",
                        "created_at": "2021-02-05 16:23:05",
                        "updated_at": "2021-02-05 16:23:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2019-national-womens-month-2jpg_601d0069996ae.jpg"
                    }, {
                        "id": 9,
                        "albums_id": 2,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2019-national-womens-month-3jpg_601d0069c416a.jpg",
                        "caption": "",
                        "created_at": "2021-02-05 16:23:05",
                        "updated_at": "2021-02-05 16:23:05",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2019-national-womens-month-3jpg_601d0069c416a.jpg"
                    }, {
                        "id": 10,
                        "albums_id": 2,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/2019-national-womens-month-4jpg_601d0069ecd09.jpg",
                        "caption": "",
                        "created_at": "2021-02-05 16:23:06",
                        "updated_at": "2021-02-05 16:23:06",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-2019-national-womens-month-4jpg_601d0069ecd09.jpg"
                    }]
                }, {
                    "id": 1,
                    "album_name": "2019 Gender Sensitivity Training",
                    "album_caption": "2019 Gender Sensitivity Training",
                    "cover": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-602232da8a3a0_602232da8a41d.JPG",
                    "created_at": "2021-02-05 16:21:00",
                    "updated_at": "2021-02-09 14:59:40",
                    "deleted_at": null,
                    "images": [{
                        "id": 1,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0575jpg_601d004e7fb5f.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:41",
                        "updated_at": "2021-02-05 16:22:41",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0575jpg_601d004e7fb5f.JPG"
                    }, {
                        "id": 2,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0595jpg_601d00516b13f.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:42",
                        "updated_at": "2021-02-05 16:22:42",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0595jpg_601d00516b13f.JPG"
                    }, {
                        "id": 3,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0710jpg_601d005275357.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:43",
                        "updated_at": "2021-02-05 16:22:43",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0710jpg_601d005275357.JPG"
                    }, {
                        "id": 4,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0727jpg_601d0053c69b8.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:44",
                        "updated_at": "2021-02-05 16:22:44",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0727jpg_601d0053c69b8.JPG"
                    }, {
                        "id": 5,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0799jpg_601d0054ceb6d.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:46",
                        "updated_at": "2021-02-05 16:22:46",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0799jpg_601d0054ceb6d.JPG"
                    }, {
                        "id": 6,
                        "albums_id": 1,
                        "image_name": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/dsc-0840jpg_601d005623c08.JPG",
                        "caption": "",
                        "created_at": "2021-02-05 16:22:47",
                        "updated_at": "2021-02-05 16:22:47",
                        "deleted_at": null,
                        "thumbnail": "https:\/\/pubfiles.pagasa.dost.gov.ph\/pagasaweb\/files\/gad\/gallery\/thumbnail-dsc-0840jpg_601d005623c08.JPG"
                    }]
                }]
            }
        }
        var env = "production"
        </script>
        <!-- SEA GAMES VARIABLES -->
        <!-- SEA GAMES VARIABLES -->
        <style type="text/css">
        .image-modal-container .image-container>img {
            /* width: auto; */
            position: absolute;
            top: -9999px;
            bottom: -9999px;
            left: -9999px;
            right: -9999px;
            max-height: 100%;
            max-width: 100%;
            margin: auto;
            height: auto;
            width: auto;
        }

        .image-modal-container .image-container {
            overflow: hidden;
            /* height: 250px; */
            position: relative;
            height: 94%;
            width: 94%;
            margin: 3vh 3vw;
        }

        .image-modal-container .image-close {
            position: absolute;
            top: 0px;
            right: 5px;
            font-size: 34px;
        }

        .image-modal-container .image-preview {
            cursor: pointer;
        }

        .close {
            margin-top: 20px;
            opacity: 1;
            text-shadow: none;
        }

        .fa-close {
            background: #ffffff;
            border-radius: 7px;
        }

        .fa-close:hover {
            background: #ffffff;
            border-radius: 7px;
        }
        </style>
        <div class="modal fade image-modal-container" id="image-modal" tabindex="-1" role="dialog"
            aria-labelledby="image-modal-label">
            <div class="image-container" data-dismiss="modal">
                <button type="button" class="close p-image-close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i class="fa-close fa fa-times fa-2x" aria-hidden="true"></i></span></button>
                <img src="" class="image-container" alt="">
            </div>
        </div> 
    <!-- ???? -->
    <script type="text/javascript">
    var id_ = "home",
        env_ = "production",
        muniV = 'v1',
        homeV = 'v1',
        houseV = 'v1',
        municipalityKey = 'municipality-' + muniV,
        homeSearchKey = 'homeSearch-' + homeV,
        housePopulation = 'housePopulation-' + houseV;
    var map_var = false;
    var auto_skip = false;
    var synop_id = 425;
    </script>
    <script>
    var server_timestamp = 1682419643;
    </script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <script src="https://unpkg.com/ol-popup@4.0.0/dist/ol-popup.js"></script>
    <script type="text/javascript"
        src="https://openlayersbook.github.io/openlayers_book_samples/assets/proj4js/proj4.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/index.php/combine/50b4de534cb31925dc0cdeb26ad71b1d-1679622788.js">
    </script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/bootstrap-select.min.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/highcharts.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/exporting.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/windbarb.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/meteogram.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/plugin/gmaps.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/gpc.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/cone.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/utils.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/app/home/weather.js"></script>
    <script src="https://bagong.pagasa.dost.gov.ph/themes/hiraia/assets/js/app/home/map-ol.js?t=1080311521"></script>
    <!-- Mobile Version Scripts -->
    <script type="text/javascript">
    var initialX = null;
    var initialY = null;
    var contents = ['current-weather', 'weather-outlook', 'weather-map', 'news-media', 'contact-us']
    var slide_no = 0;
    var tracker = $(".mobile-circle");
    tracker.click(function() {
        $('.mobile-circle.active').removeClass('active');
        $(this).addClass('active');
        slide_no = $(this).data()['slideNo'];
        $('a[href="#' + contents[slide_no] + '"]').tab('show')
        if ($(this).data('slideNo') == 2) {
            setTimeout(function() {
                map.updateSize();
            }, 200)
        }
    });
    $(".mobile-touch-event").on('touchstart', startTouch);
    $(".mobile-touch-event").on('touchmove', moveTouch);
    // Swipe Up / Down / Left / Right
    function startTouch(e) {
        initialX = e.touches[0].clientX;
        initialY = e.touches[0].clientY;
    };

    function moveTouch(e) {
        if (initialX === null) {
            return;
        }
        if (initialY === null) {
            return;
        }
        var currentX = e.touches[0].clientX;
        var currentY = e.touches[0].clientY;
        var diffX = initialX - currentX;
        var diffY = initialY - currentY;
        if (Math.abs(diffX) > Math.abs(diffY)) {
            console.log(slide_no);
            $(tracker[slide_no]).removeClass('active');
            if (diffX > 0) {
                slide_no++;
                if (slide_no > 4) slide_no = 4;
                $('a[href="#' + contents[slide_no] + '"]').tab('show')
            } else {
                slide_no--;
                if (slide_no < 0) slide_no = 0;
                $('a[href="#' + contents[slide_no] + '"]').tab('show')
            }
            $(tracker[slide_no]).addClass('active');
        }
        initialX = null;
        initialY = null;
    };
    </script>
    <script type="text/javascript">
    window.onresize = function() {
        var screen_width = $(window).width();
        if (typeof(map) != 'undefined') {
            if (screen_width < 764) {
                map.setTarget('map-canvas-mobile');
            } else {
                map.setTarget('map-canvas');
            }
        }
    };
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110677925-1"></script>
    <script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-110677925-1');
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153677671-1"></script>
    <script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-153677671-1');
    </script>
</body>

</html>
