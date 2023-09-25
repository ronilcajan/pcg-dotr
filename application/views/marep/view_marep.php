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
                    <?php if($marep->report_type == 1): ?>

                    <?php elseif($marep->report_type == 2): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>CONDUCT OF ACTIVITY</th>
                            </tr>
                            <tr>
                                <td>
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
                                <td>
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

                    <?php elseif($marep->report_type == 5): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                                <th>TYPE OF FACILITY</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                                <td>
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

                    <?php elseif($marep->report_type == 6): ?>
                    <table class="m-t-20" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>LOCATION</th>
                                <th>TYPE OF TRAINING</th>
                            </tr>
                            <tr>
                                <td><?= $marep->location ?></td>
                                <td>
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
                    <?php endif ?>
                </div>
            </div>

        </div>

    </div>
</div>