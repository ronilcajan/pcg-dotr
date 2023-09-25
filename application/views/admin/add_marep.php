<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-10">ENTER DATA FOR MARINE ENVIRONMENTAL PROTECTION REPORT</h3>
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Step 1</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p><small>Step 2</small></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-heading">
                        <h3 class="panel-title text-white">Step 1</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CGDNM STATIONS <strong class="text-danger">*</strong> </label>
                                    <select id="station" class="form-control" required="">
                                        <option value="">Select</option>
                                        <?php foreach($station as $row): ?>
                                        <option value="<?php echo $row->station_id ?>"><?php echo $row->station ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div id="toggle-hidden" class="col-md-6 hidden">
                                <div class="form-group">
                                    <label> <span id="station-text"></span> SUB-STATIONS</label>
                                    <select id="sub-station" class="form-control" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>REPORT SELECTION <strong class="text-danger">*</strong> </label>
                                    <select id="report-selection" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php foreach($report as $row): ?>
                                        <option value="<?php echo $row['report_selection_id']; ?>">
                                            <?php echo $row['report_selection']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-heading">
                        <h3 class="panel-title text-white">Step 2</h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach($report as $row):
								$report_selection_id = $row['report_selection_id'] ;
						?>
                        <div data-id="<?php echo $row['report_selection_id']; ?>" class="toggle-show"
                            style="display: none">
                            <h2><?php echo $row['report_selection']; ?></h2>
                            <form method="post" action="<?= site_url() ?>insert_marep" role="form"
                                enctype="multipart/form-data">

                                <!-- hidden -->
                                <input type="hidden" title="Station" name="station">
                                <input type="hidden" title="Sub Station" name="sub_station">
                                <input type="hidden" title="Report Selection" name="report_selection">

                                <?php if( $report_selection_id   == 1): // Coastal Clean Up ?>

                                <div class="row  m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time" required
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" class="form-control">
                                            <span class="help-block"><small>(Note: Please specify the exact location of
                                                    the activity, i.e, Name of Purok, Barangay,
                                                    Municipality)</small></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">CONDUCT OF ACTIVITY</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($activity_conduct as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="activity_conduct"
                                                        id="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->activity_conduct ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">PARTICIPATING AGENCIES</label>
                                        <div class="col-sm-12">
                                            <?php foreach($participating_agency as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->participating_agency ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number" class="form-control">
                                            <span class="help-block"><small>(Please provide exact number of
                                                    participants)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage" class="form-control">
                                            <span class="help-block"><small>(Please provide estimated area of coverage
                                                    i.e, 1 SQM, 5 SQM, 10 SQM)</small></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPES OF GARBAGE COLLECTED</label>
                                        <div class="col-sm-12">
                                            <?php foreach($garbage_type_collected as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="garbage_type_collected[]"
                                                    id="garbage_type_collected_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="garbage_type_collected_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->garbage_type_collected ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">VOLUME OF GARBAGE COLLECTED</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="garbage_collected_volume" class="form-control">
                                            <span class="help-block"><small>(NUMBER OF SACK/s)</small></span>
                                        </div>
                                    </div>
                                </div>



                                <?php elseif($row['report_selection_id'] == 2): //Mangrove Plating ?>
                                <p>Mangroves provide a range ecosystem services. Planting mangroves helps in
                                    regulating
                                    erosion, floods and salt water intrusion. Likewise, it protect coastal
                                    communities
                                    against coastal flooding, high winds and waves, and tsunamis.</p>
                                <!-- hidden -->

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">CONDUCT OF ACTIVITY</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($activity_conduct as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="activity_conduct"
                                                        id="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->activity_conduct ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">PARTICIPATING AGENCIES</label>
                                        <div class="col-sm-12">
                                            <?php foreach($participating_agency as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->participating_agency ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number" class="form-control">
                                            <span class="help-block"><small>(Please provide exact number of
                                                    participants)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage" class="form-control">
                                            <span class="help-block"><small>(Please provide estimated area of
                                                    coverage)</small></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NUMBER OF PROPAGULES/SEEDLINGS PLANTED</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="seedlings_planted_number" class="form-control">
                                            <span class="help-block"><small>(Please
                                                    specify the exact number, i.e, 1, 5, 15, 20)</small></span>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif(  $row['report_selection_id'] == 3): //Tree Planting ?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">CONDUCT OF ACTIVITY</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($activity_conduct as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="activity_conduct"
                                                        id="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="activity_conduct_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->activity_conduct ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">PARTICIPATING AGENCIES</label>
                                        <div class="col-sm-12">
                                            <?php foreach($participating_agency as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="participating_agency_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->participating_agency ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number" class="form-control">
                                            <span class="help-block"><small>(Please provide exact number of
                                                    participants)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF SEEDLINGS PLANTED</label>
                                            <input type="number" name="seedlings_planted_number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage" class="form-control">
                                            <span class="help-block"><small>(Please provide estimated area of
                                                    coverage)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">KIND OF TREES PLANTED</label>
                                            <input type="text" name="planted_trees_kind" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <?php elseif(  $row['report_selection_id'] == 4): //VESSEL INSPECTION?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF VESSEL</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($vessel_type as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="vessel_type"
                                                        id="vessel_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="vessel_type_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF VESSEL</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="vessel_name" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF INSPECTION</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($inspection_type as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="inspection_type"
                                                        id="inspection_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="inspection_type_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->inspection_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">MARPOL VIOLATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="marpol_violation" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">MEP VIOLATION (ACCREDITATION OF CERTIFICATE)</label>
                                        <div class="col-sm-12">
                                            <?php foreach($mep_violation as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mep_violation[]"
                                                    id="mep_violation_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="mep_violation_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->mep_violation ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">MEP VIOLATION (MARPOL EQUIPMENT)</label>
                                        <div class="col-sm-12">
                                            <?php foreach($mep_violation_marpol_equipment as $row): ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mep_violation_marpol_equipment[]"
                                                    id="mep_violation_marpol_equipment_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="mep_violation_marpol_equipment_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->mep_violation_marpol_equipment ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>


                                <?php elseif(  $row['report_selection_id'] == 5): // LAND BASE INSPECTION ?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF FACILITY</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($facility_type as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="facility_type"
                                                        id="facility_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="facility_type_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->facility_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF FACILITY</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="facility_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">Findings/Comment </label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="land_base_comments"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <?php elseif(  $row['report_selection_id'] == 6): // TRAININGS CONDUCTED ?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF TRAINING</label>
                                        <div class="col-sm-12">
                                            <?php foreach($training_type as $row): ?>
                                            <?php
                                                $inputId = "training_type_{$report_selection_id}_{$row->id}";
                                                $class = $row->training_type == 'OTHERS' ? 'show-input-checkbox' : '';
                                            ?>

                                            <div class="checkbox checkbox-custom">
                                                <input class="<?= $class ?>" type="checkbox" name="training_type[]"
                                                    id="<?= $inputId ?>" value="<?= $row->id ?>">
                                                <label for="<?= $inputId ?>"><?= $row->training_type ?></label>
                                            </div>

                                            <?php if($row->training_type == 'OTHERS'): ?>
                                            <div class="input-container" style="display: none;">
                                                <input type="text" name="training_type_others"
                                                    placeholder="Enter others training type" id="others_input"
                                                    class="form-control">
                                            </div>
                                            <?php endif ?>

                                            <?php endforeach ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NAME OF FACILITY/TRAINING CENTER</label>
                                            <input type="text" name="training_center_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NR OF PARTICIPANTS/STUDENTS</label>
                                            <input type="number" name="participant_number" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <?php elseif(  $row['report_selection_id'] == 7): // MARITIME INCIDENT?>
                                <h4>AGROUNDING</h4>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DATE OF INCIDENT</label>
                                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i') ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($incident_cause as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="incident_cause"
                                                        id="incident_cause_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="incident_cause_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->incident_cause ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF VESSEL</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($vessel_type as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="vessel_type"
                                                        id="vessel_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="vessel_type_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF VESSEL</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="vessel_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <h4>OIL SPILL</h4>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DATE OF INCIDENT</label>
                                            <input type="date" name="oil_spill_date_incident"
                                                value="<?= date('Y-m-d') ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" name="oil_spill_time_incident" value="<?= date('H:i') ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_spill_location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION MAP</label>
                                        <div class="col-sm-12">
                                            <input type="file" accept="image/*,pdf" name="oil_spill_map_location"
                                                class="form-control">
                                            <span class="help-block"><small>(Please provide picture file not exceeding
                                                    100MB)</small></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">SPILLER</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($spiller as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="spiller"
                                                        id="spiller_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="spiller_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->spiller ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF VESSEL/FACILITY</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_spill_vessel_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF COMPANY</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_spill_companyl_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>TIER LEVEL</label>
                                            <div class="col-sm-12">
                                                <div class="radio-list">
                                                    <?php foreach($tier_level as $row): ?>
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="tier_level"
                                                            id="tier_level_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                            value="<?php echo $row->id  ?>">
                                                        <label
                                                            for="tier_level_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->tier_level ?></label>
                                                    </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>TYPES OF OIL</label>
                                            <div class="col-sm-12">
                                                <?php foreach($oil_type as $row): ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="oil_type[]"
                                                        id="oil_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="oil_type_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->oil_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">RESPONDING UNITS</label>
                                            <div class="col-sm-12">

                                                <?php foreach($responding_unit as $row): ?>
                                                <?php
                                                    $inputId = "responding_unit_{$report_selection_id}_{$row->id}";
                                                    $class = $row->responding_unit == 'OTHERS' ? 'show-input-checkbox' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="responding_unit[]" id="<?= $inputId ?>"
                                                        class="<?= $class ?>" value="<?= $row->id ?>">
                                                    <label for="<?= $inputId ?>"><?= $row->responding_unit ?></label>
                                                </div>

                                                <?php if($row->responding_unit == 'OTHERS'): ?>
                                                <div class="input-container" style="display: none;">
                                                    <input type="text" name="responding_unit_other"
                                                        placeholder="Enter other responding unit type" id="others_input"
                                                        class="form-control">
                                                </div>
                                                <?php endif ?>


                                                <?php endforeach ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">VOLUME OF OIL RETRIEVED</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_retrieved_volume" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" ">AFFECTED AREAS </label>
                                            <div class="col-sm-12">
                                                <?php foreach($affected_area as $row): ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="affected_area[]"
                                                        id="affected_area_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="affected_area_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->affected_area ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" ">AFFECTED BIODIVERSITY</label>
                                            <div class="col-sm-12">
                                                <?php foreach($affected_biodiversity as $row): ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="affected_biodiversity[]"
                                                        id="affected_biodiversity_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="affected_biodiversity_<?php echo $report_selection_id . "_" . $row->id  ?>"><?php echo $row->affected_biodiversity ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">SPOT REPORT</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="spot_report" class="form-control">
                                            <span class="help-block"><small>(Please upload file with maximum size of
                                                    500kb)</small></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                <button type="submit" class="btn btn-danger pull-right m-t-15"
                                    type="button">Finish!</button>
                            </form>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="white-box">
                <h3 class="box-title m-b-0">LIST OF DATA ENTERED</h3>
                <table class="table  table-responsive table-bordered" id="maref-table2">
                    <thead class="thead-inverse">
                        <tr>
                            <th>REPORT SELECTION</th>
                            <th>CREATED DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($marep as $row):?>
                        <tr>
                            <td scope="row"><?php echo $row->report_selection ?></td>
                            <td><?php echo date('F d, Y \a\t\ h:i A', strtotime($row->date_created)) ?></td>
                            <td> <a title="View" class="text-info"
                                    href="<?= site_url('marep/view_marep/').$row->id ?>"><i class="fa fa-eye"></i></a>
                                <a title="Edit" class="text-success"
                                    href="<?= site_url('marep/edit_marep/').$row->id ?>"><i
                                        class="fa fa-pencil"></i></a>
                                <a title="Delete" class="text-danger"
                                    onclick="return confirm('Are you sure you want to delete this data?');"
                                    href="<?= site_url('marep/delete/').$row->id ?>"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>