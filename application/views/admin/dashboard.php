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
            <img class="img-responsive m-t-10 m-b-20" src="<?= base_url(); ?>assets/img/eTanaw-1.png">
        </div>
    </div>
    <div class="row colorbox-group-widget">
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count"><?= $user_no  ?> <span class="pull-right"><i
                                    class="icon-user"></i></span>
                        </h3>
                        <p class="info-text font-12">USER</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count"><?= count($station) ?> <span class="pull-right"><i
                                    class="fa fa-building-o"></i></span></h3>
                        <p class="info-text font-12">STATION</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count"><?= count($sub_station) ?> <span class="pull-right"><i
                                    class="fa fa-building-o"></i></span></h3>
                        <p class="info-text font-12">SUB-STATION</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count"><?= $marep_tot_entry  ?> <span class="pull-right"><i
                                    class="icon-anchor"></i></span></h3>
                        <p class="info-text font-12">MAREP</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-danger">
                    <div class="media-body">
                        <h3 class="info-count"><?= $marsaf_tot_entry; ?> <span class="pull-right"><i
                                    class="icon-anchor"></i></span></h3>
                        <p class="info-text font-12">MARSAF</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count"><?= $marsar_tot_entry ?> <span class="pull-right"><i
                                    class="icon-anchor"></i></span></h3>
                        <p class="info-text font-12">MARSAR</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count"><?= $marslec_tot_entry ?> <span class="pull-right"><i
                                    class="icon-anchor"></i></span></h3>
                        <p class="info-text font-12">MARSLEN</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count"><?= $urban_marsar_tot_entry ?> <span class="pull-right"><i
                                    class="icon-anchor"></i></span></h3>
                        <p class="info-text font-12">URBAN MARSAR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="white-box stat-widget">
                <div class="row m-b-20">
                    <div class="col-md-3 col-sm-3">
                        <h4 class="box-title">Statistics</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i> Select
                                Chart</span>
                            <select class="form-control" id="select-chart">ss
                                <option selected value="0">MAREP</option>
                                <option value="1">MARSAF</option>
                                <option value="2">MARSAR</option>
                                <option value="3">MARSLEN</option>
                                <option value="4">URBAN MARSAR</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-wrapper p-b-10 collapse in " id="chart-container">
                        <div class="item" data-chart="0">
                            <div class="text-center">
                                <h3>MAREP CHART</h3>
                            </div>
                            <div id="marep-chart"></div>
                        </div>
                        <div class="item hidden" data-chart="1">
                            <div class="text-center">
                                <h3>MARSAF CHART</h3>
                            </div>
                            <div id="marsaf-chart"></div>
                        </div>
                        <div class="item hidden" data-chart="2">
                            <div class="text-center">
                                <h3>MARSAR CHART</h3>
                            </div>
                            <div id="marsar-chart"></div>
                        </div>
                        <div class="item hidden" data-chart="3">
                            <div class="text-center">
                                <h3>MARSLEN CHART</h3>
                            </div>
                            <div id="marslec-chart"></div>
                        </div>
                        <div class="item hidden" data-chart="4">
                            <div class="text-center">
                                <h3>URBAN MARSAR CHART</h3>
                            </div>
                            <div id="urban_marsar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="white-box">
                <h4 class="box-title">Report Status</h4>
                <div id="order-status-chart" style="height: 350px;"></div>
                <ul class="list-inline m-b-0 m-t-20 t-a-c">
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>MAREP</h6>
                    </li>
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-danger"></i>MARSAF</h6>
                    </li>
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>MARSAR</h6>
                    </li>
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-warning"></i>MARSLEN</h6>
                    </li>
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-info"></i>URBAN MARSAR</h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>