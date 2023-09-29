<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">ENTER DATA FOR MARITIME SAFETY REPORT</h3>
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

                <form method="POST" action="<?= site_url('update_marsaf/').$marsaf_id ?>" role="form"
                    enctype="multipart/form-data">
                    <div class="panel panel-primary setup-content" id="step-1">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <p><strong style="font-size: 1.3em;color: #000;">PROJECT 1 : MARSAF CGDNM</strong></p>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">DTG</label>
                                        <input type="date" name="date_created"
                                            value="<?= date('Y-m-d', strtotime($marsaf->date_created)) ?>" required
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Time</label>
                                        <input type="time" class="form-control" name="time"
                                            value="<?= date('H:i' , strtotime($marsaf->date_created)) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CGDNM STATIONS <strong class="text-danger">*</strong> </label>
                                        <select id="station" name="station" class="form-control">
                                            <option value="">Select</option>
                                            <?php foreach($station as $row): ?>
                                            <option value="<?= $row->station_id ?>"
                                                <?= $marsaf->station_id==$row->station_id ? 'selected' : '' ?>>
                                                <?= $row->station ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="toggle-hidden" class="col-md-6 hidden">
                                    <div class="form-group">
                                        <input type="hidden" id="or_substation" value="<?= $marsaf->sub_station_id ?>">
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
                                        <input type="hidden" id="or_report_type" value="<?= $marsaf->report_type_id ?>">
                                        <label>REPORT TYPE<strong class="text-danger">*</strong> </label>
                                        <select id="report-type" name="report_type" class="form-control" required>
                                            <option value="">Select</option>
                                            <?php  foreach($report_type as $row):  ?>
                                            <option value="<?= $row['id']; ?>"
                                                <?= $marsaf->report_type_id == $row['id'] ? 'selected' : null ?>>
                                                <?= $row['report_type']; ?>
                                            </option>
                                            <?php endforeach  ?>
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
                            <?php 
                                foreach($report_type as $row){
                                    $report_type_id = $row['id'] ;
                            ?>

                            <div class="toggle-show" data-id="<?= $report_type_id; ?>" style="display:none">

                                <?php if($report_type_id == 1):  ?>
                                <!-- PRE-DEPARTURE INSPECTION (PDI)  -->
                                <fieldset id="pdi_fieldset" class="pdi_fieldset">
                                    <legend class="scheduler-border">PRE-DEPARTURE INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="pdi_vessel_name"
                                                    value="<?= $marsaf_pdi_data->vessel_name ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="pdi_port_place"
                                                    value="<?= $marsaf_pdi_data->port_place ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php $ves_type = explode(",",$marsaf_pdi_data->vessel_type ?? ''); ?>
                                                <?php foreach($vessel_type as $row): ?>

                                                <?php
                                                        $inputID = "pdi_vessel_type_{$row->id}";
                                                        $checked = in_array($row->id, $ves_type) ? 'checked' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="pdi_vessel_type[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vessel_type ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="company"
                                                    value="<?= $marsaf_pdi_data->company ?? '' ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="captain_name"
                                                    value="<?= $marsaf_pdi_data->captain_name ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01"
                                                    value="<?= $marsaf_pdi_data->gross_tonnage ?? '' ?>"
                                                    name="gross_tonnage" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01" name="kilowats"
                                                    value="<?= $marsaf_pdi_data->kilowat ?? '' ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">RESULT OF PDI</label>
                                            <div class="col-sm-12">
                                                <?php $pdi_res = explode(",",$marsaf_pdi_data->pdi_result ?? ''); ?>

                                                <?php foreach($pdi_result as $row): ?>
                                                <?php
                                                    $inputID = "pdi_result_{$row->id}";
                                                    $checked = in_array($row->id, $pdi_res) ? 'checked' : '';
                                                    ?>

                                                <div class="radio radio-info">
                                                    <input type="radio" name="pdi_result" <?= $checked ?>
                                                        id="pdi_result_<?= $row->id  ?>" value="<?= $row->id  ?>">
                                                    <label
                                                        for="pdi_result_<?= $row->id  ?>"><?= $row->pdi_result ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">ACTION CODES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $act_code = explode(",",$marsaf_pdi_data->action_code ?? ''); ?>

                                                <?php foreach($action_code as $row): ?>
                                                <?php 
                                                     $inputID = "pdi_action_code{$row->id}";
                                                     $checked = in_array($row->id, $act_code) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="pdi_action_code[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID  ?>"><?= $row->action_code ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NOTED DEFICIENCY/IES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $no_defi = explode(",",$marsaf_pdi_data->noted_deficiency ?? ''); ?>

                                                <?php foreach($noted_deficiency as $row): ?>
                                                <?php 
                                                     $inputID = "pdi_noted_deficiency{$row->id}";
                                                     $checked = in_array($row->id, $no_defi) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="pdi_noted_deficiency[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID  ?>"><?= $row->noted_deficiency ?></label>
                                                </div>
                                                <?php endforeach ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                                <textarea name="pdi_specify_noted_deficiency" class="form-control"
                                                    cols="30"
                                                    rows="10"><?= $marsaf_pdi_data->specify_noted_deficiency ?? '' ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>


                                <?php if($report_type_id == 2): ?>
                                <!-- VESSEL SAFETY ENFORCEMENT INSPECTION (VSEI) -->

                                <fieldset class="vsei_fieldset">
                                    <legend class="scheduler-border">VESSEL SAFETY ENFORCEMENT INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="vsei_vessel_name"
                                                    value="<?= $marsaf_vsei_data->vessel_name ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="vsei_port_place"
                                                    value="<?= $marsaf_vsei_data->port_place ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php $ves_type = explode(",",$marsaf_vsei_data->vessel_type ?? ''); ?>
                                                <?php foreach($vessel_type as $row): ?>
                                                <?php 
                                                        $inputID = "vsei_vessel_type_{$row->id}";
                                                        $checked = in_array($row->id,$ves_type)  ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="vsei_vessel_type[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vessel_type ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="vsei_company"
                                                    value="<?= $marsaf_vsei_data->company ?? ''?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="vsei_captain_name"
                                                    value="<?= $marsaf_vsei_data->captain_name ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="number" step="0.01"
                                                    value="<?= $marsaf_vsei_data->vessel_age ?? ''?>"
                                                    name="vsei_vessel_age" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01"
                                                    value="<?= $marsaf_vsei_data->gross_tonnage ?? ''?>"
                                                    name="vsei_gross_tonnage" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01"
                                                    value="<?= $marsaf_vsei_data->kilowat ?? ''?>" name="vsei_kilowats"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF INSPECTION</label>
                                                <?php $ins_type = explode(",",$marsaf_vsei_data->inspection_type ?? '');  ?>

                                                <?php foreach($inspection_type as $row): ?>
                                                <?php  
                                                        $inputID = "vsei_inspection_type_{$row->id}";
                                                        $checked = in_array($row->id, $ins_type) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="vsei_inspection_type[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->inspection_type ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">RESULT OF VSEI</label>
                                                <?php $vsei_res = explode(",",$marsaf_vsei_data->vsei_result ?? '');  ?>

                                                <?php foreach($vsei_result as $row): ?>
                                                <?php  
                                                        $inputID = "vsei_result_{$row->id}";
                                                        $checked = in_array($row->id, $vsei_res) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="vsei_result[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vsei_result ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">ACTION CODES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $act_code = explode(",",$marsaf_vsei_data->action_code ?? ''); ?>

                                                <?php foreach($action_code as $row): ?>
                                                <?php  
                                                        $inputID = "vsei_action_code_{$row->id}";
                                                        $checked = in_array($row->id, $act_code) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="vsei_action_code[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->action_code ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VSEI DEFICIENCY CODE (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $def_code = explode(",",$marsaf_vsei_data->deficiency_code ?? ''); ?>
                                                <?php foreach($vsei_deficiency_code as $row): ?>
                                                <?php  
                                                        $inputID = "vsei_deficiency_code_2_{$row->id}";
                                                        $checked = in_array($row->id, $def_code) ? 'checked' : '';
                                                        ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="vsei_deficiency_code_2[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label
                                                        for="<?= $inputID ?>"><?= $row->vsei_deficiency_code ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                                <textarea name="vsei_specify_noted_deficiency" class="form-control"
                                                    id="" cols="30"
                                                    rows="10"><?= $marsaf_vsei_data->specify_noted_deficiency ?? ''?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NEXT SCHEDULE OF VSEI</label>
                                                <input type="date" name="vsei_next_schedule"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_vsei_data->next_schedule ?? '')) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>


                                <?php if($report_type_id == 3): ?>
                                <!-- EMERGENCY READINESS EVALUATION (ERE)  -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">EMERGENCY READINESS EVALUATION
                                                (ERE)</strong></p>
                                        <p>Fill this section if you are conducting ERE</p>
                                    </div>
                                </div>

                                <fieldset class="ere_fieldset">
                                    <legend class="scheduler-border">EMERGENCY READINESS EVALUATION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="ere_vessel_name"
                                                    value="<?= $marsaf_ere_data->vessel_name ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="ere_port_place"
                                                    value="<?= $marsaf_ere_data->port_place ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php $ves_type = explode(",",$marsaf_ere_data->vessel_type ?? '');  ?>

                                                <?php foreach($vessel_type as $row): ?>

                                                <?php
                                                        $inputID = "ere_vessel_type_{$row->id}";
                                                        $checked = in_array($row->id, $ves_type) ? 'checked' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="ere_vessel_type[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vessel_type ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="ere_company"
                                                    value="<?= $marsaf_ere_data->company ?? '' ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="ere_captain_name"
                                                    value="<?= $marsaf_ere_data->captain_name ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="number" step="0.01" name="ere_vessel_age"
                                                    value="<?= $marsaf_ere_data->vessel_age ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01" name="ere_gross_tonnage"
                                                    value="<?= $marsaf_ere_data->gross_tonnage ?? '' ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01" name="ere_kilowats"
                                                    value="<?= $marsaf_ere_data->kilowat ?? '' ?>" name="ere_kilowats"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">DATE OF PREVIOUS ERE</label>
                                                <input type="date" name="ere_previous_date"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_ere_data->previous_date ?? '')) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF INSPECTION</label>
                                                <?php $ere_insp = explode(",",$marsaf_ere_data->inspection_type ?? ''); ?>

                                                <?php foreach($inspection_type as $row): ?>

                                                <?php
                                                        $inputID = "ere_inspection_type_{$row->id}";
                                                        $checked = in_array($row->id, $ere_insp) ? 'checked' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="ere_inspection_type[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->inspection_type ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">DRILLS CONDUCTED</label>
                                                <?php $drill_con = explode(",",$marsaf_ere_data->drill_conducted ?? ''); ?>
                                                <?php foreach($drill_conducted as $row): ?>

                                                <?php
                                                        $inputID = "ere_drill_conducted_{$row->id}";
                                                        $checked = in_array($row->id, $drill_con) ? 'checked' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="ere_drill_conducted[]"
                                                        id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->drill_conducted ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">RESULT OF VSEI</label>
                                                <?php $ere_res = explode(",",$marsaf_ere_data->ere_result ?? ''); ?>
                                                <?php foreach($vsei_result as $row): ?>

                                                <?php
                                                            $inputID = "ere_vsei_result_{$row->id}";
                                                            $checked = in_array($row->id, $ere_res) ? 'checked' : '';
                                                    ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="ere_vsei_result[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vsei_result ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NEXT SCHEDULE OF ERE</label>
                                                <input type="date" class="form-control"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_ere_data->next_schedule ?? '')) ?>"
                                                    name="ere_next_schedule">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">COMMENTS AND RECOMMENDATIONS</label>
                                                <textarea name="ere_comment" class="form-control" cols="30"
                                                    rows="10"><?= $marsaf_ere_data->comment ?? '' ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>


                                <?php if($report_type_id == 4): ?>
                                <!-- PORT STATE CONTROL (PSC)  -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">PORT STATE CONTROL
                                                (PSC)</strong></p>
                                        <p>This section is for Port State Control Officers performing PSC function.</p>
                                    </div>
                                </div>
                                <fieldset class="psc_fieldset">
                                    <legend class="scheduler-border">PORT STATE CONTROL (PSC) DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="psc_vessel_name"
                                                    value="<?= $marsaf_psc_data->vessel_name ?? ''?>"
                                                    class=" form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="psc_port_place"
                                                    value="<?= $marsaf_psc_data->port_place ?? ''?>"
                                                    class=" form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php $ves_type = explode(",",$marsaf_psc_data->vessel_type ?? ''); ?>
                                                <?php foreach($vessel_type as $row): ?>

                                                <?php
                                                        $inputID = "ere_vessel_type_{$row->id}";
                                                        $checked = in_array($row->id, $ves_type) ? 'checked' : '';
                                                ?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="ere_vessel_type[]" id="<?= $inputID ?>"
                                                        value="<?= $row->id  ?>" <?= $checked ?>>
                                                    <label for="<?= $inputID ?>"><?= $row->vessel_type ?></label>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">FLAG OF REGISTRY</label>
                                                <input type="text" value="<?= $marsaf_psc_data->registry_flag ?? ''?>"
                                                    name="psc_registry_flag" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">IMO NR</label>
                                                <input type="text" name="psc_imo_nr"
                                                    value="<?= $marsaf_psc_data->imo_nr ?? ''?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">GT/NT</label>
                                                <input type="text" value="<?= $marsaf_psc_data->gt_nt ?? ''?>"
                                                    name="psc_gt_nt" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="text" name="psc_vessel_age"
                                                    value="<?= $marsaf_psc_data->vessel_age ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="psc_company"
                                                    value="<?= $marsaf_psc_data->company ?? ''?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="psc_captain_name"
                                                    value="<?= $marsaf_psc_data->captain_name ?? ''?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF INSPECTION</label>
                                            <?php $ins_type = explode(",",$marsaf_psc_data->inspection_type ?? '');   ?>
                                            <?php foreach($inspection_type as $row): ?>

                                            <?php
                                                    $inputID = "psc_inspection_type_{$row->id}";
                                                    $checked = in_array($row->id, $ins_type) ? 'checked' : '';
                                            ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="psc_inspection_type[]" id="<?= $inputID ?>"
                                                    value="<?= $row->id  ?>" <?= $checked ?>>
                                                <label for="<?= $inputID ?>"><?= $row->inspection_type ?></label>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>ACTION CODES (IF VESSEL HAS NOTED DEFICIENCY)</label>
                                            <?php $act_code = explode(",",$marsaf_psc_data->action_code ?? '');   ?>
                                            <?php foreach($psc_action_code as $row): ?>

                                            <?php
                                                    $inputID = "psc_action_code_{$row->id}";
                                                    $checked = in_array($row->id, $act_code) ? 'checked' : '';
                                            ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="psc_action_code[]" id="<?= $inputID ?>"
                                                    value="<?= $row->id  ?>" <?= $checked ?>>
                                                <label for="<?= $inputID ?>"><?= $row->psc_action_code ?></label>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>RELATED INTERNATIONAL CONVENTIONS NOTED DEFICIENCY/IES</label>

                                            <?php $related = explode(",",$marsaf_psc_data->related_international_conventions_noted_deficiency ?? '');?>
                                            <?php foreach($related_international_conventions_noted_deficiency as $row): ?>

                                            <?php
                                                    $inputID = "psc_related_international_conventions_noted_deficiency_{$row->id}";
                                                    $checked = in_array($row->id, $related) ? 'checked' : '';
                                            ?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox"
                                                    name="psc_related_international_conventions_noted_deficiency[]"
                                                    id="<?= $inputID ?>" value="<?= $row->id  ?>" <?= $checked ?>>
                                                <label
                                                    for="<?= $inputID ?>"><?= $row->related_international_conventions_noted_deficiency ?></label>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                            <textarea name="psc_noted_deficiency" class="form-control" id="" cols="30"
                                                rows="10"><?= $marsaf_psc_data->noted_deficiency ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>
                                <?php
                                if($report_type_id == 5){ // COASTAL AND BEACH RESORT SAFETY AND SECURITY INSPECTION
                                            
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">COASTAL AND BEACH RESORT SAFETY
                                                AND SECURITY INSPECTION</strong></p>
                                    </div>
                                </div>
                                <?php if(!empty($marsaf_cabrsasi_data)): ?>
                                <?php foreach($marsaf_cabrsasi_data as $cabrsasi): ?>
                                <fieldset class="cabrsasi_fieldset">
                                    <legend class="scheduler-border">COASTAL AND BEACH RESORT SAFETY AND SECURITY
                                        INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF COASTAL/RESORT</label>
                                                <input type="text" name="cabrsasi_coastal_name[]"
                                                    value="<?= $cabrsasi->coastal_name ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF COASTAL/BEACH RESORT</label>
                                                <input type="text" value="<?= $cabrsasi->coastal_place ?>"
                                                    name="cabrsasi_coastal_place[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER</label>
                                                <input type="text" name="cabrsasi_owner_name[]"
                                                    value="<?= $cabrsasi->owner_name ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">LENGTH OF BEACH COAST LINE</label>
                                            <div class="col-sm-12">
                                                <?php $beach = explode(",",$cabrsasi->beach_coast_line_length); $j=0; ?>
                                                <?php for($i=0; $i < count($beach_coast_line_length); $i++): ?>
                                                <?php if(isset($beach[$j]) && $beach[$j] == $beach_coast_line_length[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_beach_coast_line_length[0][<?php echo $i+1; $i; ?>]"
                                                        value="<?php echo $beach_coast_line_length[$i]->id  ?>" checked>
                                                    <label><?php echo $beach_coast_line_length[$i]->beach_coast_line_length ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_beach_coast_line_length[0][<?php echo $i+1; $i; ?>]"
                                                        value="<?php echo $beach_coast_line_length[$i]->id  ?>">
                                                    <label><?php echo $beach_coast_line_length[$i]->beach_coast_line_length ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VIOLATIONS (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $beach_vio = explode(",",$cabrsasi->violation); $j=0; ?>
                                                <?php for($i=0; $i < count($coastal_and_beach_violation); $i++): ?>
                                                <?php if(isset($beach_vio[$j]) && $beach_vio[$j] == $coastal_and_beach_violation[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_coastal_and_beach_violation[0][<?php echo $i+1; $i; ?>]"
                                                        value="<?php echo $coastal_and_beach_violation[$i]->id  ?>"
                                                        checked>
                                                    <label><?php echo $coastal_and_beach_violation[$i]->coastal_and_beach_violation ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_coastal_and_beach_violation[0][<?php echo $i+1; $i; ?>]"
                                                        value="<?php echo $coastal_and_beach_violation[$i]->id  ?>">
                                                    <label><?php echo $coastal_and_beach_violation[$i]->coastal_and_beach_violation ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endforeach ?>
                                <?php else: ?>
                                <fieldset class="cabrsasi_fieldset">
                                    <legend class="scheduler-border">COASTAL AND BEACH RESORT SAFETY AND SECURITY
                                        INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF COASTAL/RESORT</label>
                                                <input type="text" name="cabrsasi_coastal_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF COASTAL/BEACH RESORT</label>
                                                <input type="text" name="cabrsasi_coastal_place[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER</label>
                                                <input type="text" name="cabrsasi_owner_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">LENGTH OF BEACH COAST LINE</label>
                                            <div class="col-sm-12">
                                                <?php
                                                    $i = 1;
                                                    foreach($beach_coast_line_length as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_beach_coast_line_length[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->beach_coast_line_length ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VIOLATIONS (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1;
                                                    foreach($coastal_and_beach_violation as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="cabrsasi_coastal_and_beach_violation[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->coastal_and_beach_violation ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="cabrsasi-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="cabrsasi-remove-clone-btn" class="btn btn-danger btn-sm"
                                            type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>
                                <?php
                                    }else if($report_type_id == 6){ //   RECREATIONAL SAFETY ENFORCEMENT INSPECTION (RSEI)
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">RECREATIONAL SAFETY ENFORCEMENT
                                                INSPECTION (RSEI)</strong></p>
                                    </div>
                                </div>
                                <?php if(!empty($marsaf_rsei_data)): ?>
                                <?php foreach($marsaf_rsei_data as $rsei): ?>
                                <fieldset class="rsei_fieldset">
                                    <legend class="scheduler-border">RECREATIONAL SAFETY ENFORCEMENT INSPECTION DATA
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF RESORT</label>
                                                <input type="text" name="rsei_resort_name[]"
                                                    value="<?= $rsei->resort_name ?>" class=" form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF INSPECTION</label>
                                                <input type="text" name="rsei_inspection_place[]"
                                                    value="<?= $rsei->inspection_place ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER</label>
                                                <input type="text" name="rsei_owner_name[]"
                                                    value="<?= $rsei->owner_name ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">RECRATION WATERCRAFTS</label>
                                            <div class="col-sm-12">
                                                <?php $rec = explode(",",$rsei->recration_watercraft); $j=0; ?>
                                                <?php for($i=0; $i < count($recration_watercraft); $i++): ?>
                                                <?php if(isset($rec[$j]) && $rec[$j] == $recration_watercraft[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recration_watercraft[0][<?php echo $i+1; $i ?>]"
                                                        value="<?php echo $recration_watercraft[$i]->id  ?>" checked>
                                                    <label><?php echo $recration_watercraft[$i]->recration_watercraft ?></label>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recration_watercraft[0][<?php echo $i+1; $i ?>]"
                                                        value="<?php echo $recration_watercraft[$i]->id  ?>">
                                                    <label><?php echo $recration_watercraft[$i]->recration_watercraft ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VIOLATIONS (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php $recreational_vio = explode(",",$rsei->recreational_violation); $j=0; ?>
                                                <?php for($i=0; $i < count($recreational_violation); $i++): ?>
                                                <?php if(isset($recreational_vio[$j]) && $recreational_vio[$j] == $recreational_violation[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recreational_violation[0][<?php echo $i+1; $i ?>]"
                                                        value="<?php echo $recreational_violation[$i]->id  ?>" checked>
                                                    <label><?php echo $recreational_violation[$i]->recreational_violation ?></label>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recreational_violation[0][<?php echo $i+1; $i ?>]"
                                                        value="<?php echo $recreational_violation[$i]->id  ?>">
                                                    <label><?php echo $recreational_violation[$i]->recreational_violation ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endforeach ?>
                                <?php else: ?>
                                <fieldset class="rsei_fieldset">
                                    <legend class="scheduler-border">RECREATIONAL SAFETY ENFORCEMENT INSPECTION DATA
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF RESORT</label>
                                                <input type="text" name="rsei_resort_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF INSPECTION</label>
                                                <input type="text" name="rsei_inspection_place[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER</label>
                                                <input type="text" name="rsei_owner_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">RECRATION WATERCRAFTS</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1;
                                                    foreach($recration_watercraft as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recration_watercraft[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->recration_watercraft ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VIOLATIONS (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1;
                                                    foreach($recreational_violation as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="rsei_recreational_violation[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->recreational_violation ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="rsei-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="rsei-remove-clone-btn" class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>

                                <?php
                                    }else if($report_type_id == 7){ //   AIDS TO NAVIGATION (ATON) INSPECTION 
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">AIDS TO NAVIGATION (ATON)
                                                INSPECTION</strong></p>
                                    </div>
                                </div>
                                <?php if(!empty($marsaf_aton)): ?>
                                <fieldset>
                                    <legend class="scheduler-border">Part 1. LIGHTHOUSE (LH)</legend>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NAME OF LH</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lh_name" value="<?= $marsaf_aton->lh_name ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF LH</label>
                                                <?php $lh_type = explode(",",$marsaf_aton->lh_type ?? 0); $j=0; ?>
                                                <?php for($i=0; $i < count($lighthouse_type); $i++): ?>
                                                <?php if(isset($lh_type[$j]) && $lh_type[$j] == $lighthouse_type[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_type[]"
                                                        id="lh_type_<?php echo $report_type_id . "_" .  $lighthouse_type[$i]->id  ?>"
                                                        value="<?php echo  $lighthouse_type[$i]->id  ?>" checked>
                                                    <label
                                                        for="lh_type_<?php echo $report_type_id . "_" .  $lighthouse_type[$i]->id  ?>"><?php echo  $lighthouse_type[$i]->lighthouse_type ?></label>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_type[]"
                                                        id="lh_type_<?php echo $report_type_id . "_" .  $lighthouse_type[$i]->id  ?>"
                                                        value="<?php echo  $lighthouse_type[$i]->id  ?>">
                                                    <label
                                                        for="lh_type_<?php echo $report_type_id . "_" .  $lighthouse_type[$i]->id  ?>"><?php echo  $lighthouse_type[$i]->lighthouse_type ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PURPOSE OF INSPECTION</label>
                                                <?php $lh_inspection_purpose = explode(",",$marsaf_aton->lh_inspection_purpose ?? 0); $j=0; ?>
                                                <?php for($i=0; $i < count($lighthouse_inspection_purpose); $i++): ?>
                                                <?php if(isset($lh_inspection_purpose[$j]) && $lh_inspection_purpose[$j] == $lighthouse_inspection_purpose[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_inspection_purpose[]"
                                                        id="lh_inspection_purpose_<?php echo $report_type_id . "_" . $lighthouse_inspection_purpose[$i]->id  ?>"
                                                        value="<?php echo $lighthouse_inspection_purpose[$i]->id  ?>"
                                                        checked>
                                                    <label
                                                        for="lh_inspection_purpose_<?php echo $report_type_id . "_" . $lighthouse_inspection_purpose[$i]->id  ?>"><?php echo $lighthouse_inspection_purpose[$i]->lighthouse_inspection_purpose ?></label>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_inspection_purpose[]"
                                                        id="lh_inspection_purpose_<?php echo $report_type_id . "_" . $lighthouse_inspection_purpose[$i]->id  ?>"
                                                        value="<?php echo $lighthouse_inspection_purpose[$i]->id  ?>">
                                                    <label
                                                        for="lh_inspection_purpose_<?php echo $report_type_id . "_" . $lighthouse_inspection_purpose[$i]->id  ?>"><?php echo $lighthouse_inspection_purpose[$i]->lighthouse_inspection_purpose ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <textarea name="lh_vessel_name" class="form-control" id="" cols="30"
                                                    rows="10"><?= $marsaf_aton->lh_vessel_name ?? null ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF LAST OPERATION</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="lh_last_operation"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_aton->lh_last_operation)) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">STATUS</label>
                                            <div class="col-sm-12">
                                                <?php $lh_status = explode(",",$marsaf_aton->lh_status ?? 0); $j=0; ?>
                                                <?php for($i=0; $i < count($lighthouse_status); $i++): ?>
                                                <?php if(isset($lh_status[$j]) && $lh_status[$j] == $lighthouse_status[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_status[]"
                                                        id="lh_status_<?php echo $report_type_id . "_" . $lighthouse_status[$i]->id  ?>"
                                                        value="<?php echo $lighthouse_status[$i]->id  ?>" checked>
                                                    <label
                                                        for="lh_status_<?php echo $report_type_id . "_" . $lighthouse_status[$i]->id  ?>"><?php echo $lighthouse_status[$i]->lighthouse_status ?></label>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_status[]"
                                                        id="lh_status_<?php echo $report_type_id . "_" . $lighthouse_status[$i]->id  ?>"
                                                        value="<?php echo $lighthouse_status[$i]->id  ?>">
                                                    <label
                                                        for="lh_status_<?php echo $report_type_id . "_" . $lighthouse_status[$i]->id  ?>"><?php echo $lighthouse_status[$i]->lighthouse_status ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">IF NOT OPERATING, WHAT IS THE CAUSED?</label>
                                            <div class="col-sm-12">
                                                <?php $lh_cause_if_not_operating = explode(",",$marsaf_aton->lh_cause_if_not_operating ?? 0); $j=0; ?>
                                                <?php for($i=0; $i < count($lighthouse_cause_if_not_operating); $i++): ?>
                                                <?php if(isset($lh_cause_if_not_operating[$j]) && $lh_cause_if_not_operating[$j] == $lighthouse_cause_if_not_operating[$i]->id):?>
                                                <div class="checkbox checkbox-custom">
                                                    <div class="checkbox checkbox-custom">
                                                        <input type="checkbox" name="lh_cause_if_not_operating[]"
                                                            id="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $lighthouse_cause_if_not_operating[$i]->id  ?>"
                                                            value="<?php echo $lighthouse_cause_if_not_operating[$i]->id  ?>"
                                                            checked>
                                                        <label
                                                            for="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $lighthouse_cause_if_not_operating[$i]->id  ?>"><?php echo $lighthouse_cause_if_not_operating[$i]->lighthouse_cause_if_not_operating ?></label>
                                                    </div>
                                                </div>
                                                <?php $j++; else:?>
                                                <div class="checkbox checkbox-custom">
                                                    <div class="checkbox checkbox-custom">
                                                        <input type="checkbox" name="lh_cause_if_not_operating[]"
                                                            id="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $lighthouse_cause_if_not_operating[$i]->id  ?>"
                                                            value="<?php echo $lighthouse_cause_if_not_operating[$i]->id  ?>">
                                                        <label
                                                            for="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $lighthouse_cause_if_not_operating[$i]->id  ?>"><?php echo $lighthouse_cause_if_not_operating[$i]->lighthouse_cause_if_not_operating ?></label>
                                                    </div>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                </fieldset>
                                <?php endif ?>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF LH NOT OPERATING AND OPERATING
                                    </legend>
                                    <?php 
                                        $operat = array(
                                            $marsaf_aton->lh_operating ?? 0,
                                            $marsaf_aton->lh_not_operating ?? 0,
                                        );

                                        $count = 0;
                                    
                                        foreach($lighthouse_status as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><?php echo $row->lighthouse_status; ?></label>
                                                <div class="radio-list">
                                                    <?php

                                                        foreach(range(1,5) as $i){
                                                    ?>
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio"
                                                                name="lh_<?php echo $row->lighthouse_status; ?>"
                                                                id="<?php echo $row->lighthouse_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>"
                                                                <?= $operat[$count] == $i ? 'checked' : null ?>>
                                                            <label
                                                                for="<?php echo $row->lighthouse_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php }	?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++;  }  ?>
                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">Part 2. LIGHTED BUOYS</legend>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NAME OF BOUY</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lb_name"
                                                    value="<?= $marsaf_aton->lb_name ?? null ?>" class=" form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF BOUY</label>
                                            <div class="col-sm-12">
                                                <?php $lb_type = explode(",",$marsaf_aton->lb_type ?? 0); $j=0;   ?>
                                                <?php for($i=0; $i < count($bouy_type); $i++): ?>
                                                <?php if(isset($lb_type[$j]) && $lb_type[$j] == $bouy_type[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_type[]"
                                                        id="lb_type_<?php echo $report_type_id . "_" . $bouy_type[$i]->id  ?>"
                                                        value="<?php echo $bouy_type[$i]->id  ?>" checked>
                                                    <label
                                                        for="lb_type_<?php echo $report_type_id . "_" . $bouy_type[$i]->id  ?>"><?php echo $bouy_type[$i]->bouy_type ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_type[]"
                                                        id="lb_type_<?php echo $report_type_id . "_" . $bouy_type[$i]->id  ?>"
                                                        value="<?php echo $bouy_type[$i]->id  ?>">
                                                    <label
                                                        for="lb_type_<?php echo $report_type_id . "_" . $bouy_type[$i]->id  ?>"><?php echo $bouy_type[$i]->bouy_type ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">EXACT LOCATION (COORDINATES)</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lb_location"
                                                    value="<?= $marsaf_aton->lb_location ?? null?>"
                                                    class=" form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">PURPOSE OF INSPECTION</label>
                                            <div class="col-sm-12">
                                                <?php $lb_inspection_purpose = explode(",",$marsaf_aton->lb_inspection_purpose ?? 0); $j=0;   ?>
                                                <?php for($i=0; $i < count($light_bouy_inspection_purpose); $i++): ?>
                                                <?php if(isset($lb_inspection_purpose[$j]) && $lb_inspection_purpose[$j] == $light_bouy_inspection_purpose[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_inspection_purpose[]"
                                                        id="lb_inspection_purpose_<?php echo $report_type_id . "_" . $light_bouy_inspection_purpose[$i]->id  ?>"
                                                        value="<?php echo $light_bouy_inspection_purpose[$i]->id  ?>"
                                                        checked>
                                                    <label
                                                        for="lb_inspection_purpose_<?php echo $report_type_id . "_" . $light_bouy_inspection_purpose[$i]->id  ?>"><?php echo $light_bouy_inspection_purpose[$i]->light_bouy_inspection_purpose ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_inspection_purpose[]"
                                                        id="lb_inspection_purpose_<?php echo $report_type_id . "_" . $light_bouy_inspection_purpose[$i]->id  ?>"
                                                        value="<?php echo $light_bouy_inspection_purpose[$i]->id  ?>">
                                                    <label
                                                        for="lb_inspection_purpose_<?php echo $report_type_id . "_" . $light_bouy_inspection_purpose[$i]->id  ?>"><?php echo $light_bouy_inspection_purpose[$i]->light_bouy_inspection_purpose ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">IF REPAIR, WHAT REPAIR WAS DONE?</label>
                                                <textarea name="lb_repair" class="form-control" id="" cols="30"
                                                    rows="10"><?= $marsaf_aton->lb_repair ?? null ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF LAST OPERATION</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="lb_last_operating"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_aton->lb_last_operating ?? 0)) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">STATUS</label>
                                            <div class="col-sm-12">
                                                <?php $lb_status = explode(",",$marsaf_aton->lb_status ?? 0); $j=0;   ?>
                                                <?php for($i=0; $i < count($light_buoy_status); $i++): ?>
                                                <?php if(isset($lb_status[$j]) && $lb_status[$j] == $light_buoy_status[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_status[]"
                                                        id="lb_status_<?php echo $report_type_id . "_" . $light_buoy_status[$i]->id  ?>"
                                                        value="<?php echo $light_buoy_status[$i]->id  ?>" checked>
                                                    <label
                                                        for="lb_status_<?php echo $report_type_id . "_" . $light_buoy_status[$i]->id  ?>"><?php echo $light_buoy_status[$i]->light_buoy_status ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_status[]"
                                                        id="lb_status_<?php echo $report_type_id . "_" . $light_buoy_status[$i]->id  ?>"
                                                        value="<?php echo $light_buoy_status[$i]->id  ?>">
                                                    <label
                                                        for="lb_status_<?php echo $report_type_id . "_" . $light_buoy_status[$i]->id  ?>"><?php echo $light_buoy_status[$i]->light_buoy_status ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">IF NOT OPERATING, WHAT IS THE CAUSED?</label>
                                            <div class="col-sm-12">
                                                <?php $lb_cause_if = explode(",",$marsaf_aton->lb_cause_if_not_operating ?? 0); $j=0;   ?>
                                                <?php for($i=0; $i < count($light_buoy__cause_if_not_operating); $i++): ?>
                                                <?php if(isset($lb_cause_if[$j]) && $lb_cause_if[$j] == $light_buoy__cause_if_not_operating[$i]->id):?>

                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_cause_if_not_operating[]"
                                                        id="lb_cause_if_not_operating_<?php echo $report_type_id . "_" .$light_buoy__cause_if_not_operating[$i]->id  ?>"
                                                        value="<?php echo$light_buoy__cause_if_not_operating[$i]->id  ?>"
                                                        checked>
                                                    <label
                                                        for="lb_cause_if_not_operating_<?php echo $report_type_id . "_" .$light_buoy__cause_if_not_operating[$i]->id  ?>"><?php echo$light_buoy__cause_if_not_operating[$i]->light_buoy__cause_if_not_operating ?></label>
                                                </div>
                                                <?php $j++; else: ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_cause_if_not_operating[]"
                                                        id="lb_cause_if_not_operating_<?php echo $report_type_id . "_" .$light_buoy__cause_if_not_operating[$i]->id  ?>"
                                                        value="<?php echo$light_buoy__cause_if_not_operating[$i]->id  ?>">
                                                    <label
                                                        for="lb_cause_if_not_operating_<?php echo $report_type_id . "_" .$light_buoy__cause_if_not_operating[$i]->id  ?>"><?php echo$light_buoy__cause_if_not_operating[$i]->light_buoy__cause_if_not_operating ?></label>
                                                </div>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF BOUY NOT-OPERATING AND OPERATING
                                    </legend>

                                    <?php 
                                    $lh_stats = array(
                                        $marsaf_aton->lb_operating ?? 0,
                                        $marsaf_aton->lb_not_operating ?? 0,
                                    );

                                    $count = 0;

                                        foreach($light_buoy_status as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><?php echo $row->light_buoy_status; ?></label>
                                                <div class="radio-list">
                                                    <?php foreach(range(1,5) as $i){ ?>
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio"
                                                                name="lb_<?php echo $row->light_buoy_status; ?>"
                                                                id="<?php echo $row->light_buoy_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>"
                                                                <?= $lh_stats[$count] == $i ? 'checked' : null ?>>
                                                            <label
                                                                for="<?php echo $row->light_buoy_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php	} ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; } ?>
                                </fieldset>

                                <?php
                                    }else if($report_type_id == 8){ // MARITIME CASUALTY INVESTIGATION (MCI) 
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">MARITIME CASUALTY INVESTIGATION
                                                (MCI)</strong></p>
                                        <p>Fill this section if you are conducting MCI</p>
                                    </div>
                                </div>
                                <?php if(!empty($marsaf_mci)): ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>EXACT LOCATION (COORDINATES)</label>
                                                <input type="text" name="mci_exact_location"
                                                    value="<?= $marsaf_mci->exact_location ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF VESSEL</label>
                                                <input type="text" name="mci_vessel_name"
                                                    value="<?= $marsaf_mci->vessel_name ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>FLAG OF REGISTRY</label>
                                                <input type="text" name="mci_registry_flag"
                                                    value="<?= $marsaf_mci->registry_flag ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>IMO NUMBER (FOREIGN)</label>
                                                <input type="text" name="mci_foreign_imo_number"
                                                    value="<?= $marsaf_mci->foreign_imo_number ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>OFFICIAL NUMBER (DOMESTIC)</label>
                                                <input type="text" name="mci_domestic_official_number"
                                                    value="<?= $marsaf_mci->domestic_official_number ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>GT/NT</label>
                                                <input type="text" name="mci_gt_nt" class="form-control"
                                                    value="<?= $marsaf_mci->gt_nt ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="mci_company_name"
                                                    value="<?= $marsaf_mci->company_name ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>OWNER/COMPANY ADDRESS</label>
                                                <input type="text" name="mci_company_address"
                                                    value="<?= $marsaf_mci->company_address ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CAPTAINS NAME</label>
                                                <input type="text" name="mci_captain_name"
                                                    value="<?= $marsaf_mci->captain_name ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NUMBER OF CREW AND ITS NATIONALITY</label>
                                                <input type="text" value="<?= $marsaf_mci->crew_nationality_number ?>"
                                                    name="mci_crew_nationality_number" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NUMBER OF PASSENGER (IF ANY)</label>
                                                <input type="text" name="mci_passenger_number"
                                                    value="<?= $marsaf_mci->passenger_number ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="text" name="mci_cargoe_onboard"
                                                    value="<?= $marsaf_mci->cargoe_onboard ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PORT OF ORIGIN</label>
                                                <input type="text" name="mci_port_origin"
                                                    value="<?= $marsaf_mci->port_origin ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DATE OF DEPARTURE FROM PORT OF ORIGIN</label>
                                                <input type="date" name="mci_departure_date_from_port_origin"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_mci->departure_date_from_port_origin)) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">TIME OF DEPARTURED FROM PORT OF
                                                    ORIGIN</label>
                                                <div class="input-group ">
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_time_from_port_origin"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00:00:00'),intval('23:00:00')) as $time) {
                                                            ?>
                                                            <option value="<?php echo date("H", mktime($time)) ?>"
                                                                <?= date("H",strtotime($marsaf_mci->departure_time_from_port_origin ?? 0)) ==  date("H", mktime($time)) ? 'selected' : null ?>>
                                                                <?php echo date("H", mktime($time)) ?></option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_time_from_port_origin_2"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00'),intval('59')) as $minute) { 
                                                                    $minute = ($minute < 10)?  "0" .$minute :  $minute  ; 
                                                            ?>
                                                            <option value="<?php echo $minute ?>"
                                                                <?= date("i",strtotime($marsaf_mci->departure_time_from_port_origin ?? 0))  ==  $minute ? 'selected' : null ?>>
                                                                <?php echo $minute ?>
                                                            </option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>TIME OF DEPARTURED FROM PORT OF ORIGIN</label>
                                                <input type="text" name="departure_time_from_port_origin"
                                                    value="<?= $marsaf_mci->port_origin ?>" class="form-control">
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>DATE AND TIME OF INCIDENT</label>
                                            <input type="text" name="mci_incident_time"
                                                value="<?= $marsaf_mci->incident_time ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>NATURE OF MARITIME CASUALTY</label>
                                            <?php $maritime_c = explode(",",$marsaf_mci->maritime_casualty_nature); $j=0;   ?>
                                            <?php for($i=0; $i <count($maritime_casualty_nature); $i++): ?>
                                            <?php if(isset($maritime_c[$j]) && $maritime_c[$j] == $maritime_casualty_nature[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_casualty_nature[]"
                                                    id="maritime_casualty_nature_<?php echo $report_type_id . "_" . $maritime_casualty_nature[$i]->id  ?>"
                                                    value="<?php echo $maritime_casualty_nature[$i]->id  ?>" checked>
                                                <label
                                                    for="maritime_casualty_nature_<?php echo $report_type_id . "_" . $maritime_casualty_nature[$i]->id  ?>"><?php echo $maritime_casualty_nature[$i]->maritime_casualty_nature ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_casualty_nature[]"
                                                    id="maritime_casualty_nature_<?php echo $report_type_id . "_" . $maritime_casualty_nature[$i]->id  ?>"
                                                    value="<?php echo $maritime_casualty_nature[$i]->id  ?>">
                                                <label
                                                    for="maritime_casualty_nature_<?php echo $report_type_id . "_" . $maritime_casualty_nature[$i]->id  ?>"><?php echo $maritime_casualty_nature[$i]->maritime_casualty_nature ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>CAUSE OF INCIDENT</label>
                                            <?php $incide = explode(",",$marsaf_mci->incident_cause); $j=0;   ?>
                                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                                            <?php if(isset($incide[$j]) && $incide[$j] == $incident_cause[$i]->id):?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_cause[]"
                                                    id="incident_cause_<?php echo $report_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?php echo $incident_cause[$i]->id  ?>" checked>
                                                <label
                                                    for="incident_cause_<?php echo $report_type_id . "_" . $incident_cause[$i]->id  ?>"><?php echo $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_cause[]"
                                                    id="incident_cause_<?php echo $report_type_id . "_" . $incident_cause[$i]->id  ?>"
                                                    value="<?php echo $incident_cause[$i]->id  ?>">
                                                <label
                                                    for="incident_cause_<?php echo $report_type_id . "_" . $incident_cause[$i]->id  ?>"><?php echo $incident_cause[$i]->incident_cause ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>CONSEQUENCES OF INCIDENT</label>
                                            <?php $incident_con = explode(",",$marsaf_mci->incident_consequences); $j=0;   ?>
                                            <?php for($i=0; $i <count($incident_consequences); $i++): ?>
                                            <?php if(isset($incident_con[$j]) && $incident_con[$j] == $incident_consequences[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_consequences[]"
                                                    id="incident_consequences_<?php echo $report_type_id . "_" . $incident_consequences[$i]->id  ?>"
                                                    value="<?php echo $incident_consequences[$i]->id  ?>" checked>
                                                <label
                                                    for="incident_consequences_<?php echo $report_type_id . "_" . $incident_consequences[$i]->id  ?>"><?php echo $incident_consequences[$i]->incident_consequences ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_consequences[]"
                                                    id="incident_consequences_<?php echo $report_type_id . "_" . $incident_consequences[$i]->id  ?>"
                                                    value="<?php echo $incident_consequences[$i]->id  ?>">
                                                <label
                                                    for="incident_consequences_<?php echo $report_type_id . "_" . $incident_consequences[$i]->id  ?>"><?php echo $incident_consequences[$i]->incident_consequences ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>SEVERITY OF MARITIME CASUALTY/INCIDENT</label>
                                            <?php $maritime_inci= explode(",",$marsaf_mci->maritime_incident_severity); $j=0;   ?>
                                            <?php for($i=0; $i <count($maritime_incident_severity); $i++): ?>
                                            <?php if(isset($maritime_inci[$j]) && $maritime_inci[$j] == $maritime_incident_severity[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_incident_severity[]"
                                                    id="maritime_incident_severity_<?php echo $report_type_id . "_" . $maritime_incident_severity[$i]->id  ?>"
                                                    value="<?php echo $maritime_incident_severity[$i]->id  ?>" checked>
                                                <label
                                                    for="maritime_incident_severity_<?php echo $report_type_id . "_" . $maritime_incident_severity[$i]->id  ?>"><?php echo $maritime_incident_severity[$i]->maritime_incident_severity ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_incident_severity[]"
                                                    id="maritime_incident_severity_<?php echo $report_type_id . "_" . $maritime_incident_severity[$i]->id  ?>"
                                                    value="<?php echo $maritime_incident_severity[$i]->id  ?>">
                                                <label
                                                    for="maritime_incident_severity_<?php echo $report_type_id . "_" . $maritime_incident_severity[$i]->id  ?>"><?php echo $maritime_incident_severity[$i]->maritime_incident_severity ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>IF VERY SERIOUS MC, WHAT IS THE CATEGORY?</label>
                                            <?php $very_serio = explode(",",$marsaf_mci->very_serious_mc_category); $j=0;   ?>
                                            <?php for($i=0; $i <count($very_serious_mc_category); $i++): ?>
                                            <?php if(isset($very_serio[$j]) && $very_serio[$j] == $very_serious_mc_category[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_very_serious_mc_category[]"
                                                    id="very_serious_mc_category_<?php echo $report_type_id . "_" .$very_serious_mc_category[$i]->id  ?>"
                                                    value="<?php echo$very_serious_mc_category[$i]->id  ?>" checked>
                                                <label
                                                    for="very_serious_mc_category_<?php echo $report_type_id . "_" .$very_serious_mc_category[$i]->id  ?>"><?php echo$very_serious_mc_category[$i]->very_serious_mc_category ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_very_serious_mc_category[]"
                                                    id="very_serious_mc_category_<?php echo $report_type_id . "_" .$very_serious_mc_category[$i]->id  ?>"
                                                    value="<?php echo$very_serious_mc_category[$i]->id  ?>">
                                                <label
                                                    for="very_serious_mc_category_<?php echo $report_type_id . "_" .$very_serious_mc_category[$i]->id  ?>"><?php echo$very_serious_mc_category[$i]->very_serious_mc_category ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF SHIPS INVOLVED (IF ANY)</label>
                                                <input type="text" name="mci_ship_name_involved"
                                                    value="<?= $marsaf_mci->ship_name_involved ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FLAG OF REGISTRY</label>
                                                <input type="text" name="mci_registry_flag_2"
                                                    value="<?= $marsaf_mci->registry_flag_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>IMO NUMBER (FOREIGN)</label>
                                                <input type="text" name="mci_foreign_imo_number_2"
                                                    value="<?= $marsaf_mci->foreign_imo_number_2 ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>OFFICIAL NUMBER (DOMESTIC)</label>
                                                <input type="text" name="mci_domestic_official_number_2"
                                                    value="<?= $marsaf_mci->domestic_official_number_2 ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>TYPE OF VESSEL</label>
                                                <input type="text" name="mci_vessel_type" class="form-control"
                                                    value="<?= $marsaf_mci->vessel_type ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>GT/NT</label>
                                            <input type="text" name="mci_gt_nt_2" value="<?= $marsaf_mci->gt_nt_2 ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="mci_company_name_2"
                                                    value="<?= $marsaf_mci->company_name_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>OWNER/COMPANY ADDRESS</label>
                                                <input type="text" name="mci_company_address_2"
                                                    value="<?= $marsaf_mci->company_address_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>CAPTAINS NAME</label>
                                            <input type="text" name="mci_captain_name_2"
                                                value="<?= $marsaf_mci->captain_name_2 ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>NUMBER OF CREW AND ITS NATIONALITY</label>
                                            <input type="text" name="mci_crew_nationality_number_2"
                                                value="<?= $marsaf_mci->crew_nationality_number_2 ?>"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NUMBER OF PASSENGER (IF ANY)</label>
                                                <input type="text" name="mci_passenger_number_2"
                                                    value="<?= $marsaf_mci->passenger_number_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="text" name="mci_cargoe_onboard_2"
                                                    value="<?= $marsaf_mci->cargoe_onboard_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PORT OF ORIGIN</label>
                                                <input type="text" name="mci_port_origin_2"
                                                    value="<?= $marsaf_mci->port_origin_2 ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">DATE OF DEPARTURE FROM PORT OF
                                                    ORIGIN</label>
                                                <input type="date" name="mci_departure_date_from_port_origin_2"
                                                    value="<?= date('Y-m-d', strtotime($marsaf_mci->departure_date_from_port_origin_2)) ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">TIME OF DEPARTURE FROM PORT OF
                                                    ORIGIN</label>
                                                <div class="input-group ">
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_hour_from_port_origin_2"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00:00:00'),intval('23:00:00')) as $time) {
                                                            ?>
                                                            <option value="<?php echo date("H", mktime($time)) ?>"
                                                                <?= $marsaf_mci->departure_hour_from_port_origin_2 ==  date("H", mktime($time)) ? 'selected' : null ?>>
                                                                <?php echo date("H", mktime($time)) ?></option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_minute_from_port_origin_2"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00'),intval('59')) as $minute) { 
                                                                    $minute = ($minute < 10)?  "0" .$minute :  $minute  ; 
                                                            ?>
                                                            <option value="<?php echo $minute ?>"
                                                                <?= $marsaf_mci->departure_minute_from_port_origin_2 ==  $minute ? 'selected' : null ?>>
                                                                <?php echo $minute ?>
                                                            </option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF INJURED PERSON/S</label>
                                                <input type="text" name="mci_total_injured_person"
                                                    value="<?= $marsaf_mci->total_injured_person ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF DEATH/S</label>
                                                <input type="text" name="mci_total_death"
                                                    value="<?= $marsaf_mci->total_death ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF MISSING PERSON/S</label>
                                                <input type="text" name="mci_total_missing_person"
                                                    value="<?= $marsaf_mci->total_missing_person ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF SURVIVOR/S</label>
                                                <input type="text" name="mci_total_survivor"
                                                    value="<?= $marsaf_mci->total_survivor ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>SAFETY RECOMMENDATIONS</label>
                                                <textarea name="mci_safety_recommendation" class="form-control" id=""
                                                    cols="30"
                                                    rows="10"><?= $marsaf_mci->safety_recommendation ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php else: ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>EXACT LOCATION (COORDINATES)</label>
                                                <input type="text" name="mci_exact_location" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF VESSEL</label>
                                                <input type="text" name="mci_vessel_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>FLAG OF REGISTRY</label>
                                                <input type="text" name="mci_registry_flag" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>IMO NUMBER (FOREIGN)</label>
                                                <input type="text" name="mci_foreign_imo_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>OFFICIAL NUMBER (DOMESTIC)</label>
                                                <input type="text" name="mci_domestic_official_number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>GT/NT</label>
                                                <input type="text" name="mci_gt_nt" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="mci_company_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>OWNER/COMPANY ADDRESS</label>
                                                <input type="text" name="mci_company_address" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CAPTAINS NAME</label>
                                                <input type="text" name="mci_captain_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NUMBER OF CREW AND ITS NATIONALITY</label>
                                                <input type="text" name="mci_crew_nationality_number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NUMBER OF PASSENGER (IF ANY)</label>
                                                <input type="text" name="mci_passenger_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="text" name="mci_cargoe_onboard" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PORT OF ORIGIN</label>
                                                <input type="text" name="mci_port_origin" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DATE OF DEPARTURE FROM PORT OF ORIGIN</label>
                                                <input type="date" name="mci_departure_date_from_port_origin"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TIME OF DEPARTURED FROM PORT OF ORIGIN</label>
                                                <input type="text" name="mci_departure_time_from_port_origin"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>DATE AND TIME OF INCIDENT</label>
                                            <input type="text" name="mci_incident_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>NATURE OF MARITIME CASUALTY</label>
                                            <?php 
                                                foreach($maritime_casualty_nature as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_casualty_nature[]"
                                                    id="maritime_casualty_nature_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="maritime_casualty_nature_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->maritime_casualty_nature ?></label>
                                            </div>
                                            <?php
                                                                        }
                                                                    ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>CAUSE OF INCIDENT</label>
                                            <?php 
                                                                        foreach($incident_cause as $row){ 
                                                                    ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_cause[]"
                                                    id="incident_cause_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="incident_cause_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->incident_cause ?></label>
                                            </div>
                                            <?php
                                                                        }
                                                                    ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>CONSEQUENCES OF INCIDENT</label>
                                            <?php 
                                                                        foreach($incident_consequences as $row){
                                                                    ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_incident_consequences[]"
                                                    id="incident_consequences_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="incident_consequences_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->incident_consequences ?></label>
                                            </div>
                                            <?php
                                                                        }
                                                                    ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>SEVERITY OF MARITIME CASUALTY/INCIDENT</label>
                                            <?php 
                                                                        foreach($maritime_incident_severity as $row){
                                                                    ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_maritime_incident_severity[]"
                                                    id="maritime_incident_severity_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="maritime_incident_severity_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->maritime_incident_severity ?></label>
                                            </div>
                                            <?php
                                                                        }
                                                                    ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>IF VERY SERIOUS MC, WHAT IS THE CATEGORY?</label>
                                            <?php 
                                                                        foreach($very_serious_mc_category as $row){
                                                                    ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mci_very_serious_mc_category[]"
                                                    id="very_serious_mc_category_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="very_serious_mc_category_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->very_serious_mc_category ?></label>
                                            </div>
                                            <?php
                                                                        }
                                                                    ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF SHIPS INVOLVED (IF ANY)</label>
                                                <input type="text" name="mci_ship_name_involved" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FLAG OF REGISTRY</label>
                                                <input type="text" name="mci_registry_flag_2" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>IMO NUMBER (FOREIGN)</label>
                                                <input type="text" name="mci_foreign_imo_number_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>OFFICIAL NUMBER (DOMESTIC)</label>
                                                <input type="text" name="mci_domestic_official_number_2"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>TYPE OF VESSEL</label>
                                                <input type="text" name="mci_vessel_type" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>GT/NT</label>
                                            <input type="text" name="mci_gt_nt_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="mci_company_name_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>OWNER/COMPANY ADDRESS</label>
                                                <input type="text" name="mci_company_address_2" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>CAPTAINS NAME</label>
                                            <input type="text" name="mci_captain_name_2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>NUMBER OF CREW AND ITS NATIONALITY</label>
                                            <input type="text" name="mci_crew_nationality_number_2"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NUMBER OF PASSENGER (IF ANY)</label>
                                                <input type="text" name="mci_passenger_number_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="text" name="mci_cargoe_onboard_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PORT OF ORIGIN</label>
                                                <input type="text" name="mci_port_origin_2" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">DATE OF DEPARTURE FROM PORT OF
                                                    ORIGIN</label>
                                                <input type="date" name="mci_departure_date_from_port_origin_2"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">TIME OF DEPARTURE FROM PORT OF
                                                    ORIGIN</label>
                                                <div class="input-group ">
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_hour_from_port_origin_2"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00:00:00'),intval('23:00:00')) as $time) {
                                                            ?>
                                                            <option value="<?php echo date("H", mktime($time)) ?>">
                                                                <?php echo date("H", mktime($time)) ?></option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <select name="mci_departure_minute_from_port_origin_2"
                                                            class="form-control">
                                                            <option value=""> </option>
                                                            <?php 
                                                                foreach(range(intval('00'),intval('59')) as $minute) { 
                                                                    $minute = ($minute < 10)?  "0" .$minute :  $minute  ; 
                                                            ?>
                                                            <option value="<?php echo $minute ?>"><?php echo $minute ?>
                                                            </option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF INJURED PERSON/S</label>
                                                <input type="text" name="mci_total_injured_person" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF DEATH/S</label>
                                                <input type="text" name="mci_total_death" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF MISSING PERSON/S</label>
                                                <input type="text" name="mci_total_missing_person" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF SURVIVOR/S</label>
                                                <input type="text" name="mci_total_survivor" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>SAFETY RECOMMENDATIONS</label>
                                                <textarea name="mci_safety_recommendation" class="form-control" id=""
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php endif ?>

                                <?php
                                    }else if($report_type_id == 9){ // SALVAGE OPERATION 
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">SALVAGE OPERATION </strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">NAME OF SALVOR</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="so_salvor_name"
                                                value="<?= $marsaf_so->salvor_name ?? null ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF APPLICATION</label>
                                        <div class="col-sm-12">
                                            <?php $applicat = explode(",",$marsaf_so->application_type ?? 0); $j=0;   ?>
                                            <?php for($i=0; $i <count($application_type); $i++): ?>
                                            <?php if(isset($applicat[$j]) && $applicat[$j] == $application_type[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_application_type[]"
                                                    id="application_type_<?php echo $report_type_id . "_" . $application_type[$i]->id  ?>"
                                                    value="<?php echo $application_type[$i]->id  ?>" checked>
                                                <label
                                                    for="application_type_<?php echo $report_type_id . "_" . $application_type[$i]->id  ?>"><?php echo $application_type[$i]->application_type ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_application_type[]"
                                                    id="application_type_<?php echo $report_type_id . "_" . $application_type[$i]->id  ?>"
                                                    value="<?php echo $application_type[$i]->id  ?>">
                                                <label
                                                    for="application_type_<?php echo $report_type_id . "_" . $application_type[$i]->id  ?>"><?php echo $application_type[$i]->application_type ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">EXACT LOCATION (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="so_exact_location"
                                                value="<?= $marsaf_so->exact_location ?? null ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">PURPOSE OF SALVAGE OPERATION</label>
                                        <div class="col-sm-12">
                                            <?php $purpose = explode(",",$marsaf_so->purpose ?? 0); $j=0;   ?>
                                            <?php for($i=0; $i <count($salvage_operation_purpose); $i++): ?>
                                            <?php if(isset($purpose[$j]) && $purpose[$j] == $salvage_operation_purpose[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_purpose[]"
                                                    id="salvage_operation_purpose_<?php echo $report_type_id . "_" . $salvage_operation_purpose[$i]->id  ?>"
                                                    value="<?php echo $salvage_operation_purpose[$i]->id  ?>" checked>
                                                <label
                                                    for="salvage_operation_purpose_<?php echo $report_type_id . "_" . $salvage_operation_purpose[$i]->id  ?>"><?php echo $salvage_operation_purpose[$i]->salvage_operation_purpose ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_purpose[]"
                                                    id="salvage_operation_purpose_<?php echo $report_type_id . "_" . $salvage_operation_purpose[$i]->id  ?>"
                                                    value="<?php echo $salvage_operation_purpose[$i]->id  ?>">
                                                <label
                                                    for="salvage_operation_purpose_<?php echo $report_type_id . "_" . $salvage_operation_purpose[$i]->id  ?>"><?php echo $salvage_operation_purpose[$i]->salvage_operation_purpose ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">VIOLATION (IF ANY)</label>
                                        <div class="col-sm-12">
                                            <div class="checkbox checkbox-custom">
                                                <input id="garbagetype1" name="so_violation" value="1"
                                                    <?= $marsaf_so->violation ?? 0 == 1 ? 'checked' : null ?>
                                                    type="checkbox">
                                                <label for="garbagetype1">OPERATING WITHOUT SECURING SALVAGE
                                                    PERMIT</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }else if($report_type_id == 10){ // MARINE PARADES, REGATTAS AND MARITIME RELATED ACTIVITY
                                ?> <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">MARINE PARADES,
                                                REGATTAS AND
                                                MARITIME RELATED ACTIVITY</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">LOCATION</label>
                                            <input type="text" name="mpramra_location"
                                                value="<?= $marsaf_mpramra->location ?? null ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF APPLICATION</label>
                                            <input type="date"
                                                value="<?= date('Y-m-d', strtotime($marsaf_mpramra->application_date ?? 0)) ?>"
                                                name="mpramra_application_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">EVENT ORGANIZER</label>
                                            <input type="text" name="mpramra_event_organizer"
                                                value="<?= $marsaf_mpramra->event_organizer ?? null ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">MARITIME ACTIVITY / IES</label>
                                        <div class="col-sm-12">
                                            <?php $maritime_a = explode(",",$marsaf_mpramra->maritime_acitivity); $j=0;   ?>
                                            <?php for($i=0; $i <count($maritime_acitivity); $i++): ?>
                                            <?php if(isset($maritime_a[$j]) && $maritime_a[$j] == $maritime_acitivity[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_acitivity[]"
                                                    id="maritime_acitivity_<?php echo $report_type_id . "_" . $maritime_acitivity[$i]->id  ?>"
                                                    value="<?php echo $maritime_acitivity[$i]->id  ?>" checked>
                                                <label
                                                    for="maritime_acitivity_<?php echo $report_type_id . "_" . $maritime_acitivity[$i]->id  ?>"><?php echo $maritime_acitivity[$i]->maritime_acitivity ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_acitivity[]"
                                                    id="maritime_acitivity_<?php echo $report_type_id . "_" . $maritime_acitivity[$i]->id  ?>"
                                                    value="<?php echo $maritime_acitivity[$i]->id  ?>">
                                                <label
                                                    for="maritime_acitivity_<?php echo $report_type_id . "_" . $maritime_acitivity[$i]->id  ?>"><?php echo $maritime_acitivity[$i]->maritime_acitivity ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DATE OF DEPARTURE FROM PORT OF
                                                ORIGIN</label>
                                            <input type="date"
                                                value="<?= date('Y-m-d', strtotime($marsaf_mpramra->departure_date_from_origin_port ?? 0)) ?>"
                                                name="mpramra_departure_date_from_origin_port" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">TIME OF DEPARTURE
                                                FROM PORT OF
                                                ORIGIN</label>

                                            <div class="input-group ">
                                                <span class="input-group-btn">
                                                    <select name="mpramra_departure_hour_from_origin_port"
                                                        class="form-control">
                                                        <option value=""> </option>

                                                        <?php 
                                                            foreach(range(intval('00:00:00'),intval('23:00:00')) as $time) {
                                                        ?>
                                                        <option value="<?php echo date("H", mktime($time)) ?>"
                                                            <?= $marsaf_mpramra->departure_hour_from_origin_port == date("H", mktime($time)) ? 'selected' : null ?>>
                                                            <?php echo date("H", mktime($time)) ?></option>
                                                        <?php  
                                                            }
                                                        ?>
                                                    </select>
                                                </span>
                                                <span class="input-group-btn">
                                                    <select name="mpramra_departure_minutefrom_origin_port"
                                                        class="form-control">
                                                        <option value=""> </option>
                                                        <?php 
                                                            foreach(range(intval('00'),intval('59')) as $minute) { 
                                                                $minute = ($minute < 10)?  "0" .$minute :  $minute  ; 
                                                        ?>
                                                        <option value="<?php echo $minute ?>"
                                                            <?= $marsaf_mpramra->departure_minutefrom_origin_port == $minute ? 'selected' : null ?>>
                                                            <?php echo $minute ?>
                                                        </option>
                                                        <?php  
                                                            }
                                                        ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">POINT OF ORIGIN (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="<?= $marsaf_mpramra->origin_point ?? null ?>"
                                                name="mpramra_origin_point" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">POINT OF DESTINATION (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="<?= $marsaf_mpramra->destination_point ?? null ?>"
                                                name="mpramra_destination_point" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">IS THERE ANY VESSEL INVOLVED?</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="<?= $marsaf_mpramra->involved_vessel ?? null ?>"
                                                name="mpramra_involved_vessel" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">HOW MANY VESSEL INVOLVED?</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mpramra_involved_vessel_total"
                                                value="<?= $marsaf_mpramra->mpramra_involved_vessel_total ?? null ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">VIOLATIONS (IF ANY)</label>
                                        <div class="col-sm-12">
                                            <?php $mpramra_mari = explode(",",$marsaf_mpramra->mpramra_maritime_related_violation ?? 0 ); $j=0;   ?>
                                            <?php for($i=0; $i < count($maritime_related_violation); $i++): ?>
                                            <?php if(isset($mpramra_mari[$j]) && $mpramra_mari[$j] == $maritime_related_violation[$i]->id):?>

                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_related_violation[]"
                                                    id="maritime_related_violation_<?php echo $report_type_id . "_" . $maritime_related_violation[$i]->id  ?>"
                                                    value="<?php echo $maritime_related_violation[$i]->id  ?>" checked>
                                                <label
                                                    for="maritime_related_violation_<?php echo $report_type_id . "_" . $maritime_related_violation[$i]->id  ?>"><?php echo $maritime_related_violation[$i]->maritime_related_violation ?></label>
                                            </div>
                                            <?php $j++; else: ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_related_violation[]"
                                                    id="maritime_related_violation_<?php echo $report_type_id . "_" . $maritime_related_violation[$i]->id  ?>"
                                                    value="<?php echo $maritime_related_violation[$i]->id  ?>">
                                                <label
                                                    for="maritime_related_violation_<?php echo $report_type_id . "_" . $maritime_related_violation[$i]->id  ?>"><?php echo $maritime_related_violation[$i]->maritime_related_violation ?></label>
                                            </div>
                                            <?php endif ?>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <?php	} ?>
                            <button type="submit" class="btn btn-danger pull-right m-t-15"
                                type="button">Finish!</button>
                        </div>
                    </div>
                </form>
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
                        <?php foreach($marsaf_list as $row):?>
                        <tr>
                            <td scope="row"><?php echo $row->report_type ?></td>
                            <td><?php echo date('F d, Y \a\t\ H:i', strtotime($row->date_created )) ?></td>
                            <td> <a title="View" class="text-info"
                                    href="<?= site_url('marsaf/view_marsaf/').$row->id ?>"><i class="fa fa-eye"></i></a>
                                <a title="Edit" class="text-success"
                                    href="<?= site_url('marsaf/edit_marsaf/').$row->id ?>"><i
                                        class="fa fa-pencil"></i></a>
                                <?php if($marsaf->id != $row->id) : ?>
                                <a title="Delete" class="text-danger"
                                    onclick="return confirm('Are you sure you want to delete this data?');"
                                    href="<?= site_url('marsaf/delete/').$row->id ?>"><i class="fa fa-trash"></i></a>
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