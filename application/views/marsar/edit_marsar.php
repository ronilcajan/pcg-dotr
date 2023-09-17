<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">EDIT DATA FOR MARITIME SAFETY REPORT</h3>
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Step 1</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p><small>Step 2</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p><small>Step 3</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p><small>Step 4</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                            <p><small>Step 5</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                            <p><small>Step 6</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                            <p><small>Step 7</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
                            <p><small>Step 8</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">9</a>
                            <p><small>Step 9</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-10" type="button" class="btn btn-default btn-circle"
                                disabled="disabled">10</a>
                            <p><small>Step 10</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-1">
                            <a href="#step-11" type="button" class="btn btn-default btn-circle"
                                disabled="disabled">11</a>
                            <p><small>Step 11</small></p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="<?= site_url('marsar/update/').$marsar->id ?>" role="form"
                    enctype="multipart/form-data">
                    <div class="panel panel-primary setup-content" id="step-1">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <p><strong style="font-size: 1.3em;color: #000;">EDIT DATA FOR MARITIME SEARCH AND
                                        RESCUE REPORT</strong></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CG STATION REPORTING UNIT <strong class="text-danger">*</strong> </label>
                                        <select id="station" name="station" class="form-control">
                                            <?php foreach($station as $row): ?>
                                            <option value="<?= $row->station_id ?>"
                                                <?= $marsar->station_id==$row->station_id ? 'selected' : null ?>>
                                                <?= $row->station ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="toggle-hidden" class="col-md-6 hidden">
                                    <div class="form-group">
                                        <input type="hidden" id="or_substation" value="<?= $marsar->sub_station_id ?>">
                                        <label> <span id="station-text"></span> SUB-STATIONS</label>
                                        <select id="sub-station" name="sub_station" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="hidden" id="or_maritime_incident_type"
                                            value="<?= $marsar->maritime_incident_type_id ?>">
                                        <label>TYPES OF MARITIME INCIDENT <strong class="text-danger">*</strong>
                                        </label>
                                        <select id="maritime-incident" name="maritime_incident_type"
                                            class="form-control" required>
                                            <option value="">Select</option>
                                            <?php foreach($maritime_incident_type as $row): ?>
                                            <option value="<?= $row->id; ?>"
                                                <?= $marsar->maritime_incident_type_id==$row->id ? 'selected' : null ?>>
                                                <?= $row->maritime_incident_type ?></option>
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
                            <?php foreach($maritime_incident_type as $row): 
                                $maritime_incident_type_id = $row->id ;
                            ?>

                            <div class="toggle-show" data-id="<?= $maritime_incident_type_id; ?>" style="display:none">
                                <?php if($maritime_incident_type_id == 1): ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $incident = explode(",",$marsar->incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incident[$j]) && $incident[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" checked name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    elseif($maritime_incident_type_id == 2): // ALLISION
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $incident = explode(",",$marsar->incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incident[$j]) && $incident[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" checked name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    elseif($maritime_incident_type_id == 3):// CAPSIZING
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $incident = explode(",",$marsar->incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incident[$j]) && $incident[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" checked name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    elseif($maritime_incident_type_id == 4): // COLLISION
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $incident = explode(",",$marsar->incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incident[$j]) && $incident[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" checked name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    elseif($maritime_incident_type_id == 5): // ENGINE TROUBLE
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $incident = explode(",",$marsar->incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incident[$j]) && $incident[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" checked name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="incident_cause[]"
                                                    id="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?= $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?= $maritime_incident_type_id . "_" . $incident_cause[$i]->id  ?>"><?= $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    elseif($maritime_incident_type_id == 6): // FIRE
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSES OF FIRE</label>
                                        <div class="col-sm-12">
                                            <?php $fire = explode(",",$marsar->fire_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($fire_cause); $i++): ?>
                                            <?php if(isset($fire[$j]) && $fire[$j] == $fire_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="fire_cause[]"
                                                    id="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"
                                                    value="<?= $fire_cause[$i]->id  ?>" checked>
                                                <label
                                                    for="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"><?= $fire_cause[$i]->fire_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="fire_cause[]"
                                                    id="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"
                                                    value="<?= $fire_cause[$i]->id  ?>">
                                                <label
                                                    for="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"><?= $fire_cause[$i]->fire_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    elseif($maritime_incident_type_id == 7): // MAN OVERBOARD
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $cause = explode(",",$marsar->man_overboard_incident_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($man_overboard_incident_cause); $i++): ?>
                                            <?php if(isset($cause[$j]) && $cause[$j] == $man_overboard_incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="man_overboard_incident_cause[]"
                                                    id="man_overboard_incident_cause_<?= $maritime_incident_type_id . "_" . $man_overboard_incident_cause[$i]->id  ?>"
                                                    value="<?= $man_overboard_incident_cause[$i]->id  ?>" checked>
                                                <label
                                                    for="man_overboard_incident_cause_<?= $maritime_incident_type_id . "_" . $man_overboard_incident_cause[$i]->id  ?>"><?= $man_overboard_incident_cause[$i]->man_overboard_incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="man_overboard_incident_cause[]"
                                                    id="man_overboard_incident_cause_<?= $maritime_incident_type_id . "_" . $man_overboard_incident_cause[$i]->id  ?>"
                                                    value="<?= $man_overboard_incident_cause[$i]->id  ?>">
                                                <label
                                                    for="man_overboard_incident_cause_<?= $maritime_incident_type_id . "_" . $man_overboard_incident_cause[$i]->id  ?>"><?= $man_overboard_incident_cause[$i]->man_overboard_incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    elseif($maritime_incident_type_id == 8): // STEERING CASUALTY
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong
                                                style="font-size: 1.3em;color: #000;"><?= $row->maritime_incident_type; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">CAUSE OF INCIDENT</label>
                                        <div class="col-sm-12">
                                            <?php $fire = explode(",",$marsar->fire_cause); $j=0; ?>
                                            <?php for($i=0; $i <count($fire_cause); $i++): ?>
                                            <?php if(isset($fire[$j]) && $fire[$j] == $fire_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="fire_cause[]"
                                                    id="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"
                                                    value="<?= $fire_cause[$i]->id  ?>" checked>
                                                <label
                                                    for="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"><?= $fire_cause[$i]->fire_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="fire_cause[]"
                                                    id="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"
                                                    value="<?= $fire_cause[$i]->id  ?>">
                                                <label
                                                    for="fire_cause_<?= $maritime_incident_type_id . "_" . $fire_cause[$i]->id  ?>"><?= $fire_cause[$i]->fire_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPES OF VESSEL INVOLVED </label>
                                        <div class="col-sm-12">
                                            <?php $vessel = explode(",",$marsar->vessel_type_involved); $j=0; ?>
                                            <?php for($i=0; $i <count($fire_cause); $i++): ?>
                                            <?php if(isset($vessel[$j]) && $vessel[$j] == $vessel_type_involved[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="vessel_type_involved[]"
                                                    id="vessel_type_involved_<?= $maritime_incident_type_id . "_" . $vessel_type_involved[$i]->id  ?>"
                                                    value="<?= $vessel_type_involved[$i]->id  ?>" checked>
                                                <label
                                                    for="vessel_type_involved_<?= $maritime_incident_type_id . "_" . $vessel_type_involved[$i]->id  ?>"><?= $vessel_type_involved[$i]->vessel_type_involved ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="vessel_type_involved[]"
                                                    id="vessel_type_involved_<?= $maritime_incident_type_id . "_" . $vessel_type_involved[$i]->id  ?>"
                                                    value="<?= $vessel_type_involved[$i]->id  ?>">
                                                <label
                                                    for="vessel_type_involved_<?= $maritime_incident_type_id . "_" . $vessel_type_involved[$i]->id  ?>"><?= $vessel_type_involved[$i]->vessel_type_involved ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>AGE OF VESSEL (1) </label>
                                            <select name="vessel_age_1" class="form-control step-2">
                                                <option value="">Select</option>
                                                <?php foreach($vessel_age as $row): ?>
                                                <option value="<?= $row->id; ?>"
                                                    <?= $marsar->vessel_age_1 == $row->id ? 'selected' : null ?>>
                                                    <?= $row->vessel_age ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>SIZE OF VESSEL (1)</label>
                                            <select name="vessel_size_1" class="form-control step-2">
                                                <option value="">Select</option>
                                                <?php foreach($vessel_size as $row): ?>
                                                <option value="<?= $row->id; ?>"
                                                    <?= $marsar->vessel_size_1 == $row->id ? 'selected' : null ?>>
                                                    <?= $row->vessel_size ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">PORT OF REGISTRY (VESSEL 1)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="registry_port_1"
                                                value="<?= $marsar->registry_port_1 ?>" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">PORT OF DEPARTURE </label>
                                        <div class="col-sm-12">
                                            <input type="text" name="departure_port_1"
                                                value="<?= $marsar->departure_port_1 ?>" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">NEXT PORT OF CALL</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="call_next_port_1"
                                                value="<?= $marsar->call_next_port_1 ?>" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">AGE OF VESSEL (2)</label>
                                        <div class="col-sm-12">
                                            <select name="vessel_age_2" class="form-control  step-2">
                                                <option value="">Select</option>
                                                <?php  foreach($vessel_age as $row): ?>
                                                <option value="<?= $row->id; ?>"
                                                    <?= $marsar->vessel_age_2 == $row->id ? 'selected' : null ?>>
                                                    <?= $row->vessel_age ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                            <span class="help-block"><small>Maritime Incidents involving two vessels
                                                    fill out two information of vessels. </small></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">SIZE OF VESSEL (2)</label>
                                        <div class="col-sm-12">
                                            <?php $vessel_2 = explode(",",$marsar->vessel_size_2); $j=0;   ?>
                                            <?php for($i=0; $i <count($vessel_size); $i++): ?>
                                            <?php if(isset($vessel_2[$j]) && $vessel_2[$j] == $vessel_size[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="vessel_size_2[]"
                                                    id="vessel_size_<?= $maritime_incident_type_id . "_" . $vessel_size[$i]->id  ?>"
                                                    value="<?= $vessel_size[$i]->id  ?>" checked>
                                                <label
                                                    for="vessel_size_<?= $maritime_incident_type_id . "_" . $vessel_size[$i]->id  ?>"><?= $vessel_size[$i]->vessel_size ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">PORT OF REGISTRY (2)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="registry_port_2"
                                                value="<?= $marsar->registry_port_2 ?>" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">PORT OF DEPARTURE ( VESSEL 2)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="departure_port_2"
                                                value="<?= $marsar->departure_port_2 ?>" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">NEXT PORT OF CALL ( VESSEL 2)</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="<?= $marsar->call_next_port_2 ?>"
                                                name="call_next_port_2" class="form-control step-2">
                                        </div>
                                    </div>
                                </div>
                                <?php else:  ?>
                                <?php endif  ?>
                            </div>

                            <?php endforeach ?>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>

                    </div>



                    <!-- sTEP 3 -->
                    <div class="panel panel-primary setup-content" id="step-3">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 3</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">DATE TIME GROUP</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">DATE OF DEPARTURE FROM PORT OF ORIGIN</label>
                                        <input type="date" name="date"
                                            value="<?= date('Y-m-d', strtotime($marsar->date_created)) ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">TIME OF DEPARTURE FROM PORT OF ORIGIN</label>
                                        <div class="input-group ">
                                            <span class="input-group-btn">
                                                <select name="hour" class="form-control">
                                                    <option value=""> </option>
                                                    <?php foreach(range(1,11) as $time): ?>
                                                    <option value="<?= date("H", mktime($time)) ?>"
                                                        <?= date("H", mktime($time)) == date('H',strtotime($marsar->date_created)) ? 'selected' : null ?>>
                                                        <?= date("H", mktime($time)) ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </span>
                                            <span class="input-group-btn">
                                                <select name="minute" class="form-control ">
                                                    <option value=""> </option>
                                                    <option value="00"
                                                        <?= date("i", strtotime($marsar->date_created)) == '00' ? 'selected' : null ?>>
                                                        00</option>
                                                    <option value="30"
                                                        <?= date("i", strtotime($marsar->date_created)) == '30' ? 'selected' : null ?>>
                                                        30</option>
                                                </select>
                                            </span>
                                            <span class="input-group-btn">
                                                <select name="meridiem" class="form-control "
                                                    style="float:left !important">
                                                    <option value="AM"
                                                        <?= date("A", strtotime($marsar->date_created)) == 'AM' ? 'selected' : null ?>>
                                                        AM</option>
                                                    <option value="PM"
                                                        <?= date("A", strtotime($marsar->date_created)) == 'PM' ? 'selected' : null ?>>
                                                        PM</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-4">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 4</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">LOCATION OF INCIDENT</strong></p>
                                    <p>When indicating the location always indicate the grid coordinates of the incident
                                        area, point of reference base on its True Bearing and distance from the point of
                                        reference.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">Details on the location of incident. (latitude, longitude,
                                        distance from point of reference, compass bearing on the point of
                                        reference)</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?= $marsar->location_incident_location ?>"
                                            name="location_incident_location" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <?php if($marsar->google_map_location): ?>
                                    <img class="img-fluid m-r-10"
                                        src="<?= site_url('assets/uploads/').$marsar->google_map_location ?>"
                                        width="100" alt="">
                                    <?php endif ?>
                                    <label class="col-sm-12">Google Map Locator</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="google_map_location" accept="image/*"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-5">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 5</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">CASUALTY REPORT</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">NUMBER OF SURVIVORS</label>
                                    <div class="col-sm-12">
                                        <input type="number" value="<?= $marsar->survivor_number ?>"
                                            name="survivor_number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">NUMBER OF CASUALTIES </label>
                                    <div class="col-sm-12">
                                        <input type="number" value="<?= $marsar->casualty_number ?>"
                                            name="casualty_number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">NUMBER OF MISSING</label>
                                    <div class="col-sm-12">
                                        <input type="number" value="<?= $marsar->missing_number ?>"
                                            name="missing_number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-6">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 6</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">MATERIAL REPORT</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">MATERIAL REPORT</label>
                                    <div class="col-sm-12">
                                        <?php $report = explode(",",$marsar->material_report); $j=0;   ?>
                                        <?php for($i=0; $i <count($material_report); $i++): ?>
                                        <?php if(isset($report[$j]) && $report[$j] == $material_report[$i]->id):?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="material_report[]"
                                                id="material_report_<?= $material_report[$i]->id  ?>"
                                                value="<?= $material_report[$i]->id  ?>" checked>
                                            <label
                                                for="material_report_<?= $material_report[$i]->id  ?>"><?= $material_report[$i]->material_report ?></label>
                                        </div>
                                        <?php $j++; else: ?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="material_report[]"
                                                id="material_report_<?= $material_report[$i]->id  ?>"
                                                value="<?= $material_report[$i]->id  ?>">
                                            <label
                                                for="material_report_<?= $material_report[$i]->id  ?>"><?= $material_report[$i]->material_report ?></label>
                                        </div>
                                        <?php endif ?>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-7">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 7</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">Extent of Damage of Vessel</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class=" ">Provide Brief Description on the extent of damage of
                                            Vessel.</label>
                                        <textarea name="description_extend_vessel_damage" class="form-control" id=""
                                            cols="30"
                                            rows="10"><?= $marsar->description_extend_vessel_damage  ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-8">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 8</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">ACTION TAKEN</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">ASSET DEPLOYMENT </label>
                                    <div class="col-sm-12">
                                        <?php $asset = explode(",",$marsar->asset_deployment); $j=0;   ?>
                                        <?php for($i=0; $i <count($asset_deployment); $i++): ?>
                                        <?php if(isset($asset[$j]) && $asset[$j] == $asset_deployment[$i]->id):?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="asset_deployment[]"
                                                id="asset_deployment_<?= $asset_deployment[$i]->id  ?>"
                                                value="<?= $asset_deployment[$i]->id  ?>" checked>
                                            <label
                                                for="asset_deployment_<?= $asset_deployment[$i]->id  ?>"><?= $asset_deployment[$i]->asset_deployment ?></label>
                                        </div>
                                        <?php $j++; else: ?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="asset_deployment[]"
                                                id="asset_deployment_<?= $asset_deployment[$i]->id  ?>"
                                                value="<?= $asset_deployment[$i]->id  ?>">
                                            <label
                                                for="asset_deployment_<?= $asset_deployment[$i]->id  ?>"><?= $asset_deployment[$i]->asset_deployment ?></label>
                                        </div>
                                        <?php endif ?>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-9">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 9</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">HOW WAS THE INCIDENT
                                            REPORTED</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-12">INFORMATION ACQUIRED THRU</label>
                                    <div class="col-sm-12">
                                        <?php $acquired = explode(",",$marsar->information_acquired_thru); $j=0;   ?>
                                        <?php for($i=0; $i <count($information_acquired_thru); $i++): ?>
                                        <?php if(isset($acquired[$j]) && $acquired[$j] == $information_acquired_thru[$i]->id):?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="information_acquired_thru[]"
                                                id="information_acquired_thru_<?= $information_acquired_thru[$i]->id  ?>"
                                                value="<?= $information_acquired_thru[$i]->id  ?>" checked>
                                            <label
                                                for="information_acquired_thru_<?= $information_acquired_thru[$i]->id  ?>"><?= $information_acquired_thru[$i]->information_acquired_thru ?></label>
                                        </div>
                                        <?php $j++; else: ?>
                                        <div class="checkbox checkbox-custom">
                                            <input type="checkbox" name="information_acquired_thru[]"
                                                id="information_acquired_thru_<?= $information_acquired_thru[$i]->id  ?>"
                                                value="<?= $information_acquired_thru[$i]->id  ?>">
                                            <label
                                                for="information_acquired_thru_<?= $information_acquired_thru[$i]->id  ?>"><?= $information_acquired_thru[$i]->information_acquired_thru ?></label>
                                        </div>
                                        <?php endif ?>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-10">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 10</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">RESPONSE TIME</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>TIME OF DEPLOYMENT OF ASSET</label>
                                        <select name="time_assets_deployment" class="form-control">
                                            <?php foreach($time_assets_deployment as $row): ?>
                                            <option value="<?= $row->id ?>"
                                                <?= $marsar->time_assets_deployment == $row->id ? 'seleced' : null ?>>
                                                <?= $row->time_assets_deployment ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-11">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 11</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong style="font-size: 1.3em;color: #000;">FORMAL PCG REPORT</strong></p>
                                    <p>Attached PCG Spot Report in this Section</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">

                                    <label class="col-sm-12">RADIO MESSAGE SPOT REPORT</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="radio_message_spot_report"
                                            accept="application/msword, text/plain, application/pdf"
                                            class="form-control">
                                        <?php if($marsar->radio_message_spot_report): ?>
                                        <a href="<?= site_url('assets/uploads/').$marsar->radio_message_spot_report ?>"
                                            target="_blank"><?= site_url('assets/uploads/').$marsar->radio_message_spot_report ?></a>
                                        <?php endif ?>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <?php if($marsar->photograph): ?>
                                    <img class="img-fluid m-r-10"
                                        src="<?= site_url('assets/uploads/').$marsar->photograph ?>" width="100" alt="">
                                    <?php endif ?>
                                    <label class="col-sm-12">PHOTOGRAPHS</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="photograph" accept="images/*" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-right m-t-20"
                                type="button">Update!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="white-box">
                <h3 class="box-title m-b-0">LIST OF DATA ENTERED</h3>
                <table class="table  table-responsive table-bordered" id="marsar-table2">
                    <thead class="thead-inverse">
                        <tr>
                            <th>TYPES OF MARITIME INCIDENT</th>
                            <th>CREATED DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($marsar_list as $row): ?>
                        <tr>
                            <td><?= $row->maritime_incident_type ?></td>
                            <td><?= date('F d, Y at h:i a',strtotime($row->date_created)) ?></td>
                            <td> <a title="View" class="text-info"
                                    href="<?= site_url('marsar/view_marsar/').$row->id ?>"><i class="fa fa-eye"></i></a>
                                <a title="Edit" class="text-success"
                                    href="<?= site_url('marsar/edit_marsar/').$row->id ?>"><i
                                        class="fa fa-pencil"></i></a>
                                <?php if($marsar->id != $row->id) : ?>
                                <a title="Delete" class="text-danger"
                                    onclick="return confirm('Are you sure you want to delete this data?');"
                                    href="<?= site_url('marsar/delete/').$row->id ?>"><i class="fa fa-trash"></i></a>
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