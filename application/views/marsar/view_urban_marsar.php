<div class="container-fluid">
    <div class="text-right m-b-10">
        <a href="<?= site_url('marep/edit_marep/').$urban_marsar->id ?>" class="btn btn-info btn-outline" type="button">
            <span><i class="fa fa-pencil"></i>
                Edit</span> </a>
        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i>
                Print</span> </button>
    </div>
    <div class="white-box printableArea">
        <!-- /#header -->
        <?php $this->view('template/header')  ?>
        <div class="row">
            <div class="col-md-12">
                <?php // print_r($marep); ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2" class="border-top-0">
                            DATE TIME GROUP
                        </th>
                    </tr>
                    <tr>
                        <th>DATE & TIME</th>
                        <th>TYPE OF URBAN RESCUE</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y h:i A', strtotime($urban_marsar->date_created)) ?> </td>
                        <?php $urban_rescue = explode(",",$urban_marsar->urban_rescue_type); $i=0;  ?>
                        <td>
                            <?php foreach($urban_rescue_type as $row): ?>
                            <?php if(isset($urban_rescue[$i]) && $row->id == $urban_rescue[$i]): ?>
                            <?= $row->urban_rescue_type ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">LOCATION OF INCIDENT</th>
                    </tr>
                    <tr>
                        <th>Details on the location of incident. (latitude, longitude, distance from point of reference,
                            compass bearing on the point of reference) </th>
                        <th>NAME OF BARANGAY</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->incident_details ?> </td>
                        <td><?= $urban_marsar->incident_barangay_name ?> </td>
                    </tr>
                    <tr>
                        <th colspan="2">Google Map Locator </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php if($urban_marsar->incident_map_location): ?>
                            <img class="img-fluid m-b-10 m-t-10 m-l-20"
                                src="<?= site_url('assets/uploads/').$urban_marsar->incident_map_location ?>"
                                width="100" alt="">
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">HOW WAS THE INCIDENT REPORTED</th>
                    </tr>
                    <tr>
                        <th colspan="2">INFORMATION ACQUIRED THRU</th>
                    </tr>
                    <tr>
                        <?php $info_acquired = explode(",",$urban_marsar->information_acquired_thru); $i=0;  ?>
                        <td colspan="2">
                            <?php foreach($information_acquired_thru as $row): ?>
                            <?php if(isset($info_acquired[$i]) && $row->id == $info_acquired[$i]): ?>
                            <?= $row->information_acquired_thru ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">HOW WAS THE INCIDENT REPORTED</th>
                    </tr>
                    <tr>
                        <th>TIME OF DEPLOYMENT OF ASSET</th>
                        <th>TYPE OF ASSET/MOBILITY DEPLOYED</th>
                    </tr>
                    <tr>
                        <?php $time_assets = explode(",",$urban_marsar->time_assets_deployment); $i=0;  ?>
                        <td>
                            <?php foreach($time_assets_deployment as $row): ?>
                            <?php if(isset($time_assets[$i]) && $row->id == $time_assets[$i]): ?>
                            <?= $row->time_assets_deployment ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                        <?php $asset_type = explode(",",$urban_marsar->asset_mobility_deployed_type); $i=0;  ?>
                        <td>
                            <?php foreach($asset_mobility_deployed_type as $row): ?>
                            <?php if(isset($asset_type[$i]) && $row->id == $asset_type[$i]): ?>
                            <?= $row->asset_mobility_deployed_type ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                </table>
                <?php $urban_rescue = explode(",",$urban_marsar->urban_rescue_type);  ?>
                <?php foreach($urban_rescue as $rescue_type): ?>
                <?php if($rescue_type == 1): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="3">FLASHFLOODS</th>
                    </tr>
                    <tr>
                        <th>NAME OF BARANGAY</th>
                        <th>NUMBER OF PERSONS RESCUED</th>
                        <th>NUMBER OF INJURED PERSONS</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->response_barangay_name ?></td>
                        <td><?= $urban_marsar->number_rescued_person ?></td>
                        <td><?= $urban_marsar->number_injured_person ?></td>
                    </tr>
                    <tr>
                        <th>NAME OF BARANGAY</th>
                        <th>NUMBER OF PERSONS RESCUED</th>
                        <th>NUMBER OF INJURED PERSONS</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->number_casualties ?></td>
                        <td><?= $urban_marsar->number_missing_person ?></td>
                        <td><?= $urban_marsar->number_rescuers_deployed ?></td>
                    </tr>
                </table>
                <?php endif ?>

                <?php if($rescue_type === 2): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">DROWNING</th>
                    </tr>
                    <tr>
                        <th colspan="2">NAME OF VICTIM/s</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->drowning_victim_name ?></td>
                    </tr>
                    <tr>
                        <th>GENDER</th>
                        <th>FIRST RESPONDER</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->drowning_victim_gender ?></td>
                        <td><?= $urban_marsar->first_responder ?></td>
                    </tr>
                    <tr>
                        <th>AGE OF VICTIM</th>
                        <th>NUMBER OF VICTIM/s</th>
                    </tr>
                    <tr>
                        <?php $age = explode(",",$urban_marsar->drowning_victim_age); $i=0;  ?>
                        <td>
                            <?php foreach($victim_age as $row): ?>
                            <?php if(isset($age[$i]) && $row->id == $age[$i]): ?>
                            <?= $row->victim_age ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                        <td><?= $urban_marsar->drowning_victim_number ?></td>
                    </tr>
                    <tr>
                        <th>CAUSES OF DROWNING </th>
                        <th>LOCATION OF DROWNING INCIDENT</th>
                    </tr>
                    <tr>
                        <?php $cause = explode(",",$urban_marsar->drowning_cause); $i=0;  ?>
                        <td>
                            <?php foreach($drowning_cause as $row): ?>
                            <?php if(isset($cause[$i]) && $row->id == $cause[$i]): ?>
                            <?= $row->drowning_cause ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                        <?php $drowning_loc = explode(",",$urban_marsar->drowning_incident_location); $i=0;  ?>
                        <td>
                            <?php foreach($drowning_incident_location as $row): ?>
                            <?php if(isset($drowning_loc[$i]) && $row->id == $drowning_loc[$i]): ?>
                            <?= $row->drowning_incident_location ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $urban_marsar->drowning_action_taken ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 3): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="3">RETRIEVAL OF MISSING PERSON/S</th>
                    </tr>
                    <tr>
                        <th colspan="3">NAME OF VICTIM/s</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $urban_marsar->retrieval_victim_name ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">GENDER</th>
                        <th colspan="2">BODY BUILT</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $urban_marsar->drowning_victim_gender ?></td>
                        <td colspan="2"><?= $urban_marsar->body_built ?></td>
                    </tr>
                    <tr>
                        <th>ADISTINCT FEATURE</th>
                        <th>LOCATION OF CADAVER</th>
                        <th>APPROXIMATE AGE OF CADAVER</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->adistinct_feature ?></td>
                        <td><?= $urban_marsar->cadaver_location ?></td>
                        <?php $cadaver = explode(",",$urban_marsar->cadaver_approximate_age); $i=0;  ?>
                        <td>
                            <?php foreach($cadaver_approximate_age as $row): ?>
                            <?php if(isset($cadaver[$i]) && $row->id == $cadaver[$i]): ?>
                            <?= $row->cadaver_approximate_age ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th>IF LAND, EXACT LOCATION WHERE THE CADAVER WAS DISCOVERED</th>
                        <th>NAME OF BARANGAY</th>
                        <th>NUMBER OF CADAVER/S DISCOVERED</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->exact_cadaver_location ?></td>
                        <td><?= $urban_marsar->retrieval_barangay_name ?></td>
                        <td><?= $urban_marsar->cadaver_discovered_number ?></td>
                    </tr>
                    <tr>
                        <th>LENGTH OF RETRIEVAL OPERATIONS</th>
                        <th>LENGTH OF TIME THE PERSON WAS REPORTED MISSING</th>
                        <th>LAST KNOWN LOCATION</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->retrieval_operation_length ?></td>
                        <td><?= $urban_marsar->time_person_reported_missing ?></td>
                        <td><?= $urban_marsar->retrieval_last_location ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $urban_marsar->retrieval_action_taken ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 4): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">STORM SURGE</th>
                    </tr>
                    <tr>
                        <th colspan="2">NAME OF VICTIM/s</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $urban_marsar->storm_surge_victim_name ?></td>
                    </tr>
                    <tr>
                        <th>WEATHER FORECAST</th>
                        <th>NUMBER OF INJURED PERSONS</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->weather_forecast ?></td>
                        <td><?= $urban_marsar->storm_surge_injured_person_number ?></td>
                    </tr>
                    <tr>
                        <th>NUMBER OF CASUALTIES</th>
                        <th>NUMBER OF RESCUED</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->storm_surge_casualty_number ?></td>
                        <td><?= $urban_marsar->storm_surge_rescue_number ?></td>
                    </tr>
                    <tr>
                        <th>ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->storm_surge_action_taken ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 4): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">EARTHQUAKE</th>
                    </tr>
                    <tr>
                        <th>NAME OF BARANGAY</th>
                        <th>LOCATION</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->earthquake_barangay_name ?></td>
                        <td><?= $urban_marsar->earthquake_location ?></td>
                    </tr>
                    <tr>
                        <th>CAUSE OF EARTHQUAKES</th>
                        <th>EARTHQUAKE MAGNITUDE LEVEL</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->earthquake_cause ?></td>
                        <?php $earthq = explode(",",$urban_marsar->earthquake_magnitude_level); $i=0;  ?>
                        <td>
                            <?php foreach($earthquake_magnitude_level as $row): ?>
                            <?php if(isset($earthq[$i]) && $row->id == $earthq[$i]): ?>
                            <?= $row->earthquake_magnitude_level ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $urban_marsar->earthquake_action_taken ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 5): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="3">LANDSLIDE</th>
                    </tr>
                    <tr>
                        <th>NUMBER OF CASUALTIES</th>
                        <th>AFFECTED AREAS</th>
                        <th>NUMBER OF RESCUED ADULT MALES</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->lanslide_casualty_number ?></td>
                        <td><?= $urban_marsar->lanslide_affected_area ?></td>
                        <td><?= $urban_marsar->landslide_rescued_adult_male_number ?></td>
                    </tr>
                    <tr>
                        <th>NUMBER OF RESCUED CHILDREN</th>
                        <th>NUMBER OF RESCUED FEMALE (ADULT)</th>
                        <th>NUMBER OF RESCUED FEMALES (CHILDREN 0 - 18 YO)</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->landslide_rescued_children_number ?></td>
                        <td><?= $urban_marsar->landslide_rescued_adult_female_number ?></td>
                        <td><?= $urban_marsar->landslide_rescued_18y_below_female_number ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">LOCATION</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $urban_marsar->lanslide_location ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 6): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">FIRE INCIDENT</th>
                    </tr>
                    <tr>
                        <th>LOCATION OF INCIDENT (BARANGAY)</th>
                        <th>LOCATION OF BARANGAY</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->fire_incident_barangay_name ?></td>
                        <td>
                            <?php $fire_loc = explode(",",$urban_marsar->fire_incident_location); $i=0;  ?>
                            <?php foreach($fire_incident_location as $row): ?>
                            <?php if(isset($fire_loc[$i]) && $row->id == $fire_loc[$i]): ?>
                            <?= $row->fire_incident_location ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th>POSSIBLE CAUSE</th>
                        <th>ESTIMATED COST OF DAMAGE</th>
                    </tr>
                    <tr>
                        <td><?= $urban_marsar->fire_incident_cause ?></td>
                        <td><?= $urban_marsar->fire_incident_cost ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $urban_marsar->fire_incident_acton_taken ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if($rescue_type == 6): ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">PRE-EMPTIVE EVACUATION</th>
                    </tr>
                    <tr>
                        <th>PRE-EMPTIVE EVACUATION ACTIVITY</th>
                        <th>DATE OF PRE-EMPTIVE EVACUATION</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $pre_emptive = explode(",",$urban_marsar->pre_emptive_evacuation_activity); $i=0;  ?>
                            <?php foreach($pre_emptive_evacuation_activity as $row): ?>
                            <?php if(isset($pre_emptive[$i]) && $row->id == $pre_emptive[$i]): ?>
                            <?= $row->pre_emptive_evacuation_activity ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                        <td><?= date('F d, Y', strtotime($urban_marsar->pre_emptive_evacuation_date)) ?></td>
                    </tr>
                    <tr>
                        <th>TIME OF PRE-EMPTIVE EVACUATION</th>
                        <th>LOCATION OF EVACUATION CENTER</th>
                    </tr>
                    <tr>
                        <td><?= date('h:i A', strtotime($urban_marsar->pre_emptive_evacuation_date)) ?></td>
                        <td><?= $urban_marsar->evacuation_center_location ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">COORDINATION WITH</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $coor = explode(",",$urban_marsar->pre_emptive_evacuation_coordination_with); $i=0;  ?>
                            <?php foreach($pre_emptive_evacuation_coordination_with as $row): ?>
                            <?php if(isset($coor[$i]) && $row->id == $coor[$i]): ?>
                            <?= $row->pre_emptive_evacuation_coordination_with ?>,
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                </table>
                <?php endif ?>
                <?php endforeach ?>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">FORMAL PCG REPORT</th>
                    </tr>
                    <tr>
                        <th>RADIO MESSAGE SPOT REPORT</th>
                    </tr>
                    <tr>
                        <td>
                            <?php if($urban_marsar->spot_report): ?>
                            <a target="_blank" href="
                                        <?= site_url('assets/uploads/').$urban_marsar->spot_report ?>">
                                <?= site_url('assets/uploads/').$urban_marsar->spot_report ?>
                            </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <th>PHOTOGRAPHS</th>
                    </tr>
                    <tr>
                        <td>
                            <?php if($urban_marsar->photographs): ?>
                            <img class="img-fluid m-b-10"
                                src="<?= site_url('assets/uploads/').$urban_marsar->photographs ?>" width="100" alt="">
                            <?php endif ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>