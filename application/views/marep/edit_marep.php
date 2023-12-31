<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-10">EDIT DATA FOR MARINE ENVIRONMENTAL PROTECTION REPORT</h3>
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
                                        <option value="<?= $row->station_id ?>"
                                            <?= $marep->station == $row->station_id ? 'selected' : null ?>>
                                            <?= $row->station ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="or_substation" value="<?= $marep->sub_station ?>">
                                    <label> <span id="station-text"></span> SUB-STATIONS</label>
                                    <select id="sub-station" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <input type="hidden" id="or_report_type" value="<?= $marep->report_type ?>">
                                    <label>REPORT SELECTION <strong class="text-danger">*</strong> </label>
                                    <select id="report-selection" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php foreach($report as $row): ?>
                                        <option value="<?= $row['report_selection_id']; ?>"
                                            <?= $marep->report_type==$row['report_selection_id'] ? 'selected' : null ?>>
                                            <?= $row['report_selection']; ?></option>
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
                        <div data-id="<?= $row['report_selection_id']; ?>" class="toggle-show" style="display: none">
                            <h2><?= $row['report_selection']; ?></h2>

                            <form method="post" action="<?= site_url('marep/update') ?>" role="form"
                                enctype="multipart/form-data">
                                <!-- hidden -->
                                <input type="hidden" name="station" value="<?= $marep->station ?>">
                                <input type="hidden" name="sub_station" value="<?= $marep->sub_station ?>">
                                <input type="hidden" name="report_selection" value="<?= $marep->report_type ?>">

                                <?php if($report_selection_id == 1): // Coastal Clean Up ?>


                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" value="<?= $marep->location ?>"
                                                class="form-control">
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
                                                        id="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id  ?>"
                                                        <?= $marep->activity_conduct == $row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->activity_conduct ?></label>
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
                                            <?php $agency = explode(",",$marep->participating_agency); ?>

                                            <?php foreach($participating_agency as $row): ?>
                                            <?php
                                                $inputID = "participating_agency_{$report_selection_id}_{$row->id}";
                                                $checked = in_array($row->id, $agency) ? 'checked' : '';
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                <label for="<?= $inputID ?>"><?= $row->participating_agency ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number"
                                                value="<?= $marep->participant_number ?>" class="form-control">
                                            <span class="help-block"><small>(Please provide exact number of
                                                    participants)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage" value="<?= $marep->area_coverage ?>"
                                                class="form-control">
                                            <span class="help-block"><small>(Please provide estimated area of coverage
                                                    i.e, 1 SQM, 5 SQM, 10 SQM)</small></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPES OF GARBAGE COLLECTED</label>
                                        <div class="col-sm-12">
                                            <?php $garbage = explode(",",$marep->garbage_type_collected);?>

                                            <?php foreach($garbage_type_collected as $row): ?>
                                            <?php
                                            $inputID = "garbage_type_collected_{$report_selection_id}_{$row->id}";
                                            $checked = in_array($row->id, $garbage) ? 'checked' : '';
                                            ?>
                                            <div class=" checkbox checkbox-custom">
                                                <input type="checkbox" name="garbage_type_collected[]"
                                                    id="<?= $inputID ?>" value="<?= $row->id ?>" <?= $checked ?>>
                                                <label for="<?= $inputID ?>"><?= $row->garbage_type_collected ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">VOLUME OF GARBAGE COLLECTED</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="garbage_collected_volume"
                                                value="<?= $marep->garbage_collected_volume ?>" class="form-control">
                                            <span class="help-block"><small>(NUMBER OF SACK/s)</small></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $marep->id ?>" name="marep_id" />

                                <?php elseif($report_selection_id == 2): //Mangroup Plating ?>

                                <p>Mangroves provide a range ecosystem services. Planting mangroves helps in regulating
                                    erosion, floods and salt water intrusion. Likewise, it protect coastal communities
                                    against coastal flooding, high winds and waves, and tsunamis.</p>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
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
                                                        id="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id  ?>"
                                                        <?= $marep->activity_conduct == $row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->activity_conduct ?></label>
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
                                            <?php $agency = explode(",",$marep->participating_agency); ?>

                                            <?php foreach($participating_agency as $row): ?>
                                            <?php
                                                $inputID = "participating_agency_{$report_selection_id}_{$row->id}";
                                                $checked = in_array($row->id, $agency) ? 'checked' : '';
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                <label for="<?= $inputID ?>"><?= $row->participating_agency ?></label>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number"
                                                value="<?= $marep->participant_number ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage" value="<?= $marep->area_coverage ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NUMBER OF PROPAGULES/SEEDLINGS PLANTED</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="seedlings_planted_number"
                                                value="<?= $marep->seedlings_planted_number ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $marep->id ?>" name="marep_id" />
                                <?php elseif($row['report_selection_id'] == 3): //Tree Planting ?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
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
                                                        id="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id  ?>"
                                                        <?= $marep->activity_conduct == $row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="activity_conduct_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->activity_conduct ?></label>
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
                                            <?php $agency = explode(",",$marep->participating_agency); $j=0;   ?>
                                            <?php for($i=0; $i <count($participating_agency); $i++): ?>
                                            <?php if(isset($agency[$j]) && $agency[$j] == $participating_agency[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="participating_agency_<?= $report_selection_id . "_" . $participating_agency[$i]->id  ?>"
                                                    value="<?= $participating_agency[$i]->id  ?>" checked>
                                                <label
                                                    for="participating_agency_<?= $report_selection_id . "_" . $row->id  ?>"><?= $participating_agency[$i]->participating_agency ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="participating_agency[]"
                                                    id="participating_agency_<?= $report_selection_id . "_" . $participating_agency[$i]->id  ?>"
                                                    value="<?= $participating_agency[$i]->id  ?>">
                                                <label
                                                    for="participating_agency_<?= $report_selection_id . "_" . $row->id  ?>"><?= $participating_agency[$i]->participating_agency ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF PARTICIPANTS</label>
                                            <input type="number" name="participant_number"
                                                value="<?= $marep->participant_number ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NUMBER OF SEEDLINGS PLANTED</label>
                                            <input type="number" name="seedlings_planted_number"
                                                value="<?= $marep->seedlings_planted_number ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">AREA COVERAGE</label>
                                            <input type="text" name="area_coverage"
                                                value="<?= $marep->area_coverage ?> " class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">KIND OF TREES PLANTED</label>
                                            <input type="text" name="planted_trees_kind"
                                                value="<?= $marep->planted_trees_kind ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <?php elseif(  $row['report_selection_id'] == 4): //VESSEL INSPECTION?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" value="<?= $marep->location ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12 m-t-10">TYPE OF VESSEL</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php foreach($vessel_type as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="vessel_type"
                                                        id="vessel_type_<?php echo $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id ?>"
                                                        <?= $marep->vessel_type==$row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="vessel_type_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->vessel_type ?></label>
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
                                            <input type="text" name="vessel_name" value="<?= $marep->vessel_name ?>"
                                                class="form-control">
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
                                                        id="inspection_type_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id ?>"
                                                        <?= $marep->inspection_type==$row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="inspection_type_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->inspection_type ?></label>
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
                                            <input type="text" name="marpol_violation"
                                                value="<?= $marep->marpol_violation ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">MEP VIOLATION (ACCREDITATION OF CERTIFICATE)</label>
                                        <div class="col-sm-12">
                                            <?php $mep_vio = explode(",",$marep->mep_violation); ?>

                                            <?php foreach($mep_violation as $row): ?>
                                            <?php
                                                    $inputID = "mep_violation_{$report_selection_id}_{$row->id}"; 
                                                    $checked = in_array($row->id,$mep_vio);   
                                                ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mep_violation[]" id="<?= $inputID  ?>"
                                                    value="<?= $row->id  ?>" <?= $checked ? 'checked' : '' ?>>
                                                <label for="<?= $inputID  ?>"><?= $row->mep_violation ?></label>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">MEP VIOLATION (MARPOL EQUIPMENT)</label>
                                        <div class="col-sm-12">
                                            <?php $mep_violation_marpol_equi = explode(",",$marep->mep_violation_marpol_equipment); ?>

                                            <?php foreach($mep_violation_marpol_equipment as $row): ?>
                                            <?php
                                                    $inputID = "mep_violation_marpol_equipment_{$report_selection_id}_{$row->id}"; 
                                                    $checked = in_array($row->id, $mep_violation_marpol_equi);   
                                                ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mep_violation_marpol_equipment[]"
                                                    id="<?= $inputID  ?>" value="<?= $row->id  ?>"
                                                    <?= $checked ? 'checked' : '' ?>>
                                                <label
                                                    for="<?= $inputID  ?>"><?= $row->mep_violation_marpol_equipment ?></label>
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
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" value="<?= $marep->location ?>"
                                                class="form-control">
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
                                                        id="facility_type_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id ?>"
                                                        <?= $marep->facility_type==$row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="facility_type_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->facility_type ?></label>
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
                                            <input type="text" name="facility_name" value="<?= $marep->facility_name ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">Findings/Comment </label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control"
                                                name="land_base_comments"><?= $marep->land_base_comments ?></textarea>
                                        </div>
                                    </div>
                                </div>


                                <?php elseif(  $row['report_selection_id'] == 6): // TRAININGS CONDUCTED ?>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" value="<?= $marep->location ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF TRAINING</label>
                                        <div class="col-sm-12">
                                            <?php 
                                                $training = explode(",", $marep->training_type);
                                            ?>
                                            <?php foreach ($training_type as $keys => $type): ?>
                                            <?php 
                                                $inputId = "training_type_{$report_selection_id}_{$type->id}";
                                                $checked =  in_array($type->id, $training);
                                                $class =  $type->training_type == 'OTHERS' ? 'show-input-checkbox' : '';
                                            ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="training_type[]" id="<?= $inputId ?>"
                                                    class="<?= $class ?>" value="<?= $type->id ?>"
                                                    <?= $checked ? 'checked' : '' ?>>
                                                <label for="<?= $inputId ?>"><?= $type->training_type ?></label>
                                            </div>

                                            <?php if($type->training_type == 'OTHERS'): ?>
                                            <div class="input-container"
                                                style="display: <?= $checked ? 'block' : 'none' ?>;">
                                                <input type="text" name="training_type_others"
                                                    placeholder="Enter others training type"
                                                    value="<?= $marep->training_type_others ?>"
                                                    class="form-control others_input">
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
                                            <input type="text" value="<?= $marep->training_center_name ?>"
                                                name="training_center_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">NR OF PARTICIPANTS/STUDENTS</label>
                                            <input type="number" value="<?= $marep->participant_number ?>"
                                                name="participant_number" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <?php elseif(  $row['report_selection_id'] == 7): // MARITIME INCIDENT?>
                                <h4>AGROUNDING</h4>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <div class="radio-list">
                                                <?php $cause = explode(",",$marep->incident_cause ?? 0 ); ?>
                                                <?php foreach($incident_cause as $incident): ?>

                                                <?php
                                                       $inputId = "incident_cause_{$report_selection_id}_{$incident->id}";
                                                       $checked =  in_array($incident->id, $cause);      
                                                ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="incident_cause" id="<?= $inputId  ?>"
                                                        value="<?= $incident->id  ?>" <?= $checked ? 'checked' : '' ?>>
                                                    <label
                                                        for="<?= $inputId ?>"><?= $incident->incident_cause ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DTG</label>
                                            <input type="date" name="date"
                                                value="<?= date('Y-m-d' , strtotime($marep->date_created)) ?>" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" class="form-control" name="time"
                                                value="<?= date('H:i' , strtotime($marep->date_created)) ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="location" value="<?= $marep->location ?>"
                                                class="form-control">
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
                                                        id="vessel_type_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id  ?>"
                                                        <?= $marep->vessel_type == $row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="vessel_type_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->vessel_type ?></label>
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
                                            <input type="text" name="vessel_name" value="<?= $marep->vessel_name ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <h4>OIL SPILL</h4>

                                <div class="row m-t-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DATE OF INCIDENT</label>
                                            <input type="date" name="oil_spill_date_incident"
                                                value="<?= date('Y-m-d', strtotime($marep->oil_spill_date_incident ?? 0)) ?>"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="time" name="oil_spill_time_incident"
                                                value="<?= date('H:i', strtotime($marep->oil_spill_date_incident ?? 0)) ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_spill_location"
                                                value="<?= $marep->oil_spill_location ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">LOCATION MAP</label>
                                        <div class="col-sm-12">
                                            <?php if(!empty($marep->oil_spill_map_location)): ?>
                                            <a href="<?= site_url('assets/uploads/').$marep->oil_spill_map_location ?>"
                                                target="_blank">View
                                                Map</a>
                                            <?php endif ?>
                                            <input type="file" name="oil_spill_map_location" class="form-control">
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
                                                        id="spiller_<?= $report_selection_id . "_" . $row->id  ?>"
                                                        value="<?= $row->id  ?>"
                                                        <?= $marep->spiller == $row->id ? 'checked' : null ?>>
                                                    <label
                                                        for="spiller_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->spiller ?></label>
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
                                            <input type="text" name="oil_spill_vessel_name"
                                                value="<?= $marep->oil_spill_vessel_name ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-15">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF COMPANY</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="oil_spill_companyl_name"
                                                value="<?= $marep->oil_spill_companyl_name ?>" class="form-control">
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
                                                            id="tier_level_<?= $report_selection_id . "_" . $row->id  ?>"
                                                            value="<?= $row->id  ?>"
                                                            <?= $marep->tier_level == $row->id ? 'checked' : null ?>>
                                                        <label
                                                            for="tier_level_<?= $report_selection_id . "_" . $row->id  ?>"><?= $row->tier_level ?></label>
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
                                                <div class="radio-list">
                                                    <?php $oil = explode(",",$marep->oil_type); ?>

                                                    <?php foreach($oil_type as $oil_t): ?>

                                                    <?php 
                                                        $inputID = "oil_type_{$report_selection_id}_{$oil_t->id}"; 
                                                        $checked = in_array($oil_t->id, $oil);
                                                    ?>

                                                    <div class="checkbox checkbox-custom">
                                                        <input type="checkbox" name="oil_type[]" id="<?= $inputID  ?>"
                                                            value="<?= $oil_t->id ?>" <?= $checked ? 'checked' : '' ?>>
                                                        <label for="<?= $inputID ?>"><?= $oil_t->oil_type ?></label>
                                                    </div>

                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">RESPONDING UNITS</label>
                                            <div class="col-sm-12">

                                                <?php 
                                                    $res_unit = explode(",", $marep->responding_unit);
                                                ?>
                                                <?php foreach ($responding_unit as $unit): ?>
                                                <?php 
                                                    $inputId = "responding_unit_{$report_selection_id}_{$unit->id}";
                                                    $checked = in_array($unit->id, $res_unit);
                                                    $class = $unit->responding_unit == 'OTHERS' ? 'show-input-checkbox' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="responding_unit[]" id="<?= $inputId ?>"
                                                        class="<?= $class ?>" value="<?= $unit->id ?>"
                                                        <?= $checked ? 'checked' : '' ?>>
                                                    <label for="<?= $inputId ?>"><?= $unit->responding_unit ?></label>
                                                </div>

                                                <?php if($unit->responding_unit == 'OTHERS'): ?>
                                                <div class="input-container"
                                                    style="display: <?= $checked ? 'block' : 'none' ?>;">
                                                    <input type="text" name="responding_unit_other"
                                                        placeholder="Enter other responding unit"
                                                        value="<?= $marep->responding_unit_other ?>" id="others_input"
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
                                            <input type="text" name="oil_retrieved_volume"
                                                value="<?= $marep->oil_retrieved_volume ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-15">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" ">AFFECTED AREAS </label>
                                            <div class="col-sm-12">
                                                <?php $affected = explode(",",$marep->affected_area);?>

                                                <?php foreach($affected_area as $row): ?>
                                                <?php 
                                                    $inputID = "affected_area_{$report_selection_id}_{$row->id}";
                                                    $checked = in_array($row->id, $affected) ? 'checked' : '';
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="affected_area[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->affected_area ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" ">AFFECTED BIODIVERSITY</label>
                                            <div class="col-sm-12">
                                                <?php $biodiversity = explode(",",$marep->affected_biodiversity); ?>

                                                <?php foreach($affected_biodiversity as $row): ?>
                                                <?php 
                                                    $inputID = "affected_biodiversity_{$report_selection_id}_{$row->id}";
                                                    $checked = in_array($row->id, $biodiversity) ? 'checked' : '';
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="affected_biodiversity[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label
                                                        for="<?= $inputID ?>"><?= $row->affected_biodiversity ?></label>
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
                                            <?php if(!empty($marep->spot_report)): ?>
                                            <a href="<?= site_url('assets/uploads/').$marep->spot_report ?>"
                                                target="_blank">View Spot Report</a>
                                            <?php endif ?>
                                            <input type="file" name="spot_report" class="form-control">
                                            <span class="help-block"><small>(Please upload file with maximum size of
                                                    500kb)</small></span>
                                        </div>
                                    </div>
                                </div>

                                <?php endif ?>
                                <input type="hidden" value="<?= $marep->id ?>" name="marep_id" />
                                <button type="submit" class="btn btn-success pull-right  m-t-15"
                                    type="button">Update</button>
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
                        <?php foreach($marep_list as $row):?>
                        <tr>
                            <td scope="row"><?php echo $row->report_selection ?></td>
                            <td><?php echo date('F d, Y \a\t\ h:i A', strtotime($row->date_created )) ?></td>
                            <td> <a title="View" class="text-info" href="<?= site_url('marep/view/').$row->id ?>"><i
                                        class="fa fa-eye"></i></a>
                                <a title="Edit" class="text-success"
                                    href="<?= site_url('marep/edit_marep/').$row->id ?>"><i
                                        class="fa fa-pencil"></i></a>
                                <?php if($marep->id != $row->id) : ?>
                                <a title="Delete" class="text-danger"
                                    onclick="return confirm('Are you sure you want to delete this data?');"
                                    href="<?= site_url('marep/delete/').$row->id ?>"><i class="fa fa-trash"></i></a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>