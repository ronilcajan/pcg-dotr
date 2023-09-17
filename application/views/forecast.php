<?php
$sql = $this->db->query("SELECT * FROM `district` WHERE id=1");
$district = $sql->row();
?>
<div class="container-fluid m-b-40">
    <div class="row">
        <div class="col-md-12">
            <a class="weatherwidget-io" href="https://forecast7.com/en/8d02124d69/northern-mindanao/"
                data-label_1="<?= $district->district_name ?>" data-label_2="WEATHER" data-theme="orange">NORTHERN
                MINDANAO
                WEATHER</a>
            <script>
            ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://weatherwidget.io/js/widget.min.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'weatherwidget-io-js');
            </script>
            <img class="img-responsive m-t-10" src="<?= base_url(); ?>assets/img/eTanaw-1.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Ship Finder</h3>
            <script type="text/javascript">
            width = '100%'; // the width of the embedded map in pixels or percentage
            height = '600'; // the height of the embedded map in pixels or percentage
            border = '1'; // the width of the border around the map (zero means no border)
            shownames = 'false'; // to display ship names on the map (true or false)
            latitude = '12.5474'; // the latitude of the center of the map, in decimal degrees
            longitude = '122.7741'; // the longitude of the center of the map, in decimal degrees
            zoom = '5'; // the zoom level of the map (values between 2 and 17)
            maptype = '1'; // use 0 for Normal Map, 1 for Satellite
            trackvessel =
                '0'; // MMSI of a vessel (note: vessel will be displayed only if within range of the system) - overrides "zoom" option
            fleet =
                ''; // the registered email address of a user-defined fleet (user's default fleet is used) - overrides "zoom" option
            </script>
            <script type="text/javascript" src="//www.marinetraffic.com/js/embed.js"></script>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Wind Forecast</h3>
            <iframe width="100%" height="380"
                src="https://embed.windy.com/embed2.html?lat=11.415&lon=122.036&detailLat=8.042&detailLon=123.486&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1"
                frameborder="0"></iframe>
        </div>
        <div class="col-md-6">
            <h3>Weather Forecast</h3>
            <div id="weatherapi-weather-widget-3"></div>
            <script type='text/javascript'
                src='https://www.weatherapi.com/weather/widget.ashx?loc=1856592&wid=5&tu=2&div=weatherapi-weather-widget-3'
                async></script><noscript><a href="https://www.weatherapi.com/weather/q/pag-asa-1856592"
                    alt="Hour by hour Pag-Asa weather">10 day hour by hour Pag-Asa weather</a></noscript>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">PAG-ASA Forecast</h3>
                <iframe name="" onload="iFrameHeight()" src="<?= site_url('forecast/weather') ?>" width="100%"
                    height="700" scrolling="yes" frameborder="0" class="wrapper">
                    No iframes
                </iframe>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Earthquake Information</h3>
                <iframe onload="iFrameHeight()" id="blockrandom" name="" src="https://earthquake.phivolcs.dost.gov.ph/"
                    width="100%" height="700" scrolling="yes" frameborder="0" class="wrapper">
                    No iframes
                </iframe>
            </div>

        </div>
    </div>


</div>