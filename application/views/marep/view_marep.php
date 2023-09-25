<div class="container-fluid">
    <div class="text-right m-b-10">
        <a href="<?= site_url('marep/edit_marep/').$marep->id ?>" class="btn btn-info btn-outline" type="button">
            <span><i class="fa fa-pencil"></i>
                Edit</span> </a>
        <button id="print" class="btn btn-danger btn-outline" type="button"> <span><i class="fa fa-print"></i>
                Print</span> </button>
    </div>
    <div class="white-box ">
        <div class="printableArea">
            <!-- /#header -->
            <div class="row m-b-30">
                <div class="col-md-2 col-xs-2">
                    <img src="<?= $marep->station_logo ? base_url('assets/uploads/'.$marep->station_logo) : base_url('assets/img/cgdnm-logo.png') ?>"
                        width="150" class="img-responsive pull-right">
                </div>
                <div class="col-md-8 col-xs-8">
                    <div class="text-center">
                        <p>
                            Department of Transportation<br>
                            Philippine Coast Guard<br>
                            Headquarters Coast Guard District Northern Mindanao<br>
                            <?php $wordsToRemove = array("CGS", "CGSS"); ?>
                            <strong>COAST GUARD STATION
                                <?= strtoupper(str_replace($wordsToRemove, '',$marep->s_station)) ?></strong><br>
                            <?= $marep->station_address ?><br>
                            <strong>
                                <?= strtoupper($marep->ss_station) ?></strong><br>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-xs-2">
                    <img src="<?= $marep->substation_logo ? base_url('assets/uploads/'.$marep->substation_logo) : base_url('assets/img/cgdnm-logo.png') ?>"
                        width="150" class="img-responsive pull-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table style="width: 100%;">
                        <tr>
                            <th colspan="2" class="text-center">
                                <h3><strong><?= $marep->report_selection; ?></strong></h3>
                            </th>
                        </tr>
                        <tr>
                            <th>DTG</th>
                            <th>TIME</th>
                        </tr>
                        <tr>
                            <td><?= date('F d, Y', strtotime($marep->date_created)) ?></td>
                            <td><?= date('h:i A', strtotime($marep->date_created)) ?></td>
                        </tr>
                    </table>
                    <!-- COASTAL CLEAN-UP -->
                    <?php if($marep->report_type == 1): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                                <th>CONDUCT OF ACTIVITY</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                                <td style="vertical-align: top;">
                                    <?php foreach($activity_conduct as $row): ?>
                                    <?php if($marep->activity_conduct == $row->id): ?>
                                    <?= $row->activity_conduct ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>PARTICIPATING AGENCIES</th>
                                <th>NUMBER OF PARTICIPANTS</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php $agency = explode(",",$marep->participating_agency); ?>
                                    <?php foreach($participating_agency as $row): ?>
                                    <?php if(in_array($row->id, $agency)): ?>
                                    <?= $row->participating_agency ?> <br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="vertical-align: top;"><?= $marep->participant_number ?></td>
                            </tr>
                            <tr>
                                <th>AREA COVERAGE</th>
                                <th>TYPES OF GARBAGE COLLECTED</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;"><?= $marep->area_coverage ?></td>
                                <td style="vertical-align: top;">
                                    <?php $garbage = explode(",",$marep->garbage_type_collected);?>
                                    <?php foreach($garbage_type_collected as $row): ?>
                                    <?php if(in_array($row->id, $garbage)): ?>
                                    <?= $row->garbage_type_collected ?> <br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>

                            </tr>
                            <tr>
                                <th>VOLUME OF GARBAGE COLLECTED</th>
                            </tr>
                            <tr>
                                <td><?= $marep->garbage_collected_volume ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- MANGROVE PLANTING -->
                    <?php elseif($marep->report_type == 2): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>CONDUCT OF ACTIVITY</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php foreach($activity_conduct as $row): ?>
                                    <?php if($marep->activity_conduct === $row->id): ?>
                                    <?= $row->activity_conduct ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>PARTICIPATING AGENCIES</th>
                                <th>NUMBER OF PARTICIPANTS</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php $agency = explode(',',$marep->participating_agency); ?>

                                    <?php foreach($participating_agency as $row): ?>
                                    <?php if(in_array($row->id, $agency)): ?>
                                    <?= $row->participating_agency ?> <br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->participant_number ?></td>
                            </tr>
                            <tr>
                                <th>AREA COVERAGE</th>
                                <th>NUMBER OF PROPAGULES/SEEDLINGS PLANTED</th>
                            </tr>
                            <tr>
                                <td><?= $marep->area_coverage ?></td>
                                <td><?= $marep->seedlings_planted_number ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- TREE PLANTING -->
                    <?php elseif($marep->report_type == 3): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>CONDUCT OF ACTIVITY</th>
                                <th>PARTICIPATING AGENCIES</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php foreach($activity_conduct as $row): ?>
                                    <?php if($marep->activity_conduct === $row->id): ?>
                                    <?= $row->activity_conduct ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="vertical-align: top;">
                                    <?php $agency = explode(",",$marep->participating_agency); ?>
                                    <?php foreach($participating_agency as $row): ?>
                                    <?php if(in_array($row->id, $agency)): ?>
                                    <?= $row->participating_agency ?> <br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NUMBER OF PARTICIPANTS</th>
                                <th>NUMBER OF SEEDLINGS PLANTED</th>
                            </tr>
                            <tr>
                                <td><?= $marep->participant_number ?></td>
                                <td><?= $marep->seedlings_planted_number ?></td>
                            </tr>
                            <tr>
                                <th>AREA COVERAGE</th>
                                <th>KIND OF TREES PLANTED</th>
                            </tr>
                            <tr>
                                <td><?= $marep->area_coverage ?></td>
                                <td><?= $marep->planted_trees_kind ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- VESSEL INSPECTION -->
                    <?php elseif($marep->report_type == 4): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                            </tr>
                            <tr>
                                <th>TYPE OF VESSEL</th>
                                <th>NAME OF VESSEL</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php foreach($vessel_type as $row): ?>
                                    <?php if($marep->vessel_type == $row->id): ?>
                                    <?= $row->vessel_type ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->vessel_name ?></td>
                            </tr>
                            <tr>
                                <th>TYPE OF INSPECTION</th>
                                <th>MARPOL VIOLATION</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php foreach($inspection_type as $row): ?>
                                    <?php if($marep->inspection_type == $row->id): ?>
                                    <?= $row->inspection_type ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->marpol_violation ?></td>
                            </tr>
                            <tr>
                                <th>MEP VIOLATION (ACCREDITATION OF CERTIFICATE)</th>
                                <th>MEP VIOLATION (MARPOL EQUIPMENT)</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php $mep_vio = explode(",",$marep->mep_violation); ?>
                                    <?php foreach($mep_violation as $row): ?>
                                    <?php if(in_array($row->id,$mep_vio)): ?>
                                    <?= $row->mep_violation ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="vertical-align: top;">
                                    <?php $mep_violation_marpol_equi = explode(",",$marep->mep_violation_marpol_equipment); ?>
                                    <?php foreach($mep_violation_marpol_equipment as $row): ?>
                                    <?php if(in_array($row->id, $mep_violation_marpol_equi)): ?>
                                    <?= $row->mep_violation_marpol_equipment ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- LAND BASE INSPECTION -->
                    <?php elseif($marep->report_type == 5): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                                <th>TYPE OF FACILITY</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                                <td style="vertical-align: top;">
                                    <?php foreach($facility_type as $row): ?>
                                    <?php if($marep->facility_type === $row->id): ?>
                                    <?= $row->facility_type ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NAME OF FACILITY</th>
                                <th>FINDINGS/COMMENT</th>
                            </tr>
                            <tr>
                                <td><?= $marep->facility_name ?></td>
                                <td><?= $marep->land_base_comments ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- TRAININGS CONDUCTED -->
                    <?php elseif($marep->report_type == 6): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                                <th>TYPE OF TRAINING</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                                <td style="vertical-align: top;">
                                    <?php $type = explode(',',$marep->training_type); ?>
                                    <?php foreach($training_type as $row): ?>
                                    <?php if(in_array($row->id, $type)): ?>
                                    <?= $row->training_type ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                    <?= $marep->training_type_others ?><br>
                                </td>
                            </tr>
                            <tr>
                                <th>NAME OF FACILITY/TRAINING CENTER</th>
                                <th>NR OF PARTICIPANTS/STUDENTS</th>
                            </tr>
                            <tr>
                                <td><?= $marep->training_center_name ?></td>
                                <td><?= $marep->participant_number ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- MARITIME INCIDENT -->
                    <?php elseif($marep->report_type == 7): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>CAUSE OF INCIDENT</th>
                                <th>LOCATION</th>
                            </tr>
                            <tr>

                                <td style="vertical-align: top;">
                                    <?php foreach($incident_cause as $row): ?>
                                    <?php if($marep->incident_cause == $row->id): ?>
                                    <?= $row->incident_cause ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->location ?></td>
                            </tr>
                            <tr>
                                <th>TYPE OF VESSEL</th>
                                <th>NAME OF VESSEL</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php foreach($vessel_type as $row): ?>
                                    <?php if($marep->vessel_type == $row->id): ?>
                                    <?= $row->vessel_type ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->vessel_name ?></td>
                            </tr>
                            <tr>
                                <th>OIL SPILL</th>
                            </tr>
                            <tr>
                                <th>DATE OF INCIDENT</th>
                                <th>Time</th>
                            </tr>
                            <tr>
                                <td><?= date('F d, Y', strtotime($marep->oil_spill_date_incident)) ?></td>
                                <td><?= date('h:i A', strtotime($marep->oil_spill_date_incident)) ?></td>
                            </tr>
                            <tr>
                                <th>LOCATION</th>
                                <th>LOCATION MAP</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;"><?= $marep->oil_spill_location ?></td>
                                <td>
                                    <?php if($marep->oil_spill_map_location): ?>
                                    <img class="img-fluid"
                                        src="<?= base_url('assets/uploads/'. $marep->oil_spill_map_location) ?>"
                                        width="100" />
                                    <?php endif ?>
                                </td>

                            </tr>
                            <tr>
                                <th>SPILLER</th>
                                <th>NAME OF VESSEL/FACILITY</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php foreach($spiller as $row): ?>
                                    <?php if($marep->spiller == $row->id): ?>
                                    <?= $row->spiller ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $marep->oil_spill_vessel_name ?></td>
                            </tr>
                            <tr>
                                <th>NAME OF COMPANY</th>
                                <th>TIER LEVEL</th>
                            </tr>
                            <tr>
                                <td><?= $marep->oil_spill_companyl_name ?></td>
                                <td style="vertical-align: top;">
                                    <?php foreach($tier_level as $row): ?>
                                    <?php if($marep->tier_level == $row->id): ?>
                                    <?= $row->tier_level ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>

                            </tr>
                            <tr>
                                <th>TYPES OF OIL</th>
                                <th>RESPONDING UNITS</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php $oil = explode(",",$marep->oil_type); ?>
                                    <?php foreach($oil_type as $row): ?>
                                    <?php if(in_array($row->id, $oil)): ?>
                                    <?= $row->oil_type ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="vertical-align: top;">
                                    <?php $res_unit = explode(",",$marep->responding_unit); ?>
                                    <?php foreach($responding_unit as $row): ?>
                                    <?php if(in_array($row->id, $res_unit)): ?>
                                    <?= $row->responding_unit ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>VOLUME OF OIL RETRIEVED</th>
                                <th>AFFECTED AREAS</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?= $marep->oil_retrieved_volume ?>
                                </td>
                                <td style="vertical-align: top;">
                                    <?php $affected = explode(",",$marep->affected_area);?>
                                    <?php foreach($affected_area as $row): ?>
                                    <?php if(in_array($row->id, $affected)): ?>
                                    <?= $row->affected_area ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>AFFECTED BIODIVERSITY</th>
                                <th>SPOT REPORT</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <?php $biodiversity = explode(",",$marep->affected_biodiversity); ?>
                                    <?php foreach($affected_biodiversity as $row): ?>
                                    <?php if(in_array($row->id, $biodiversity)): ?>
                                    <?= $row->affected_biodiversity ?><br>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="vertical-align: top;">
                                    <?php if($marep->spot_report): ?>
                                    <?= base_url('assets/uploads/'. $marep->spot_report) ?>
                                    <?php endif ?>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
            </div>

        </div>

    </div>
</div>