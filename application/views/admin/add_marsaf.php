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

                <form method="POST" action="<?= site_url() ?>insert_marsaf" role="form" enctype="multipart/form-data">
                    <div class="panel panel-primary setup-content" id="step-1">
                        <div class="panel-heading">
                            <h3 class="panel-title text-white">Step 1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">DTG</label>
                                        <input type="date" name="date_created" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Time</label>
                                        <div class="input-group ">
                                            <span class="input-group-btn">
                                                <select name="hour_created" class="form-control" required>
                                                    <option value=""> </option>
                                                    <?php foreach(range(intval('00:00:00'),intval('23:00:00')) as $time): ?>
                                                    <option value="<?php echo date("H", mktime($time)) ?>">
                                                        <?php echo date("H", mktime($time)) ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </span>
                                            <span class="input-group-btn">
                                                <select name="minute_created" class="form-control" required>
                                                    <option value=""> </option>
                                                    <?php foreach(range(intval('00'),intval('59')) as $minute) :
                                                            $minute = ($minute < 10)?  "0" .$minute :  $minute  ; 
                                                    ?>
                                                    <option value="<?php echo $minute ?>"><?php echo $minute ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CGDNM STATIONS <strong class="text-danger">*</strong> </label>
                                        <select id="station" name="station" class="form-control">
                                            <option value="">Select</option>
                                            <?php 
                                                foreach($station as $row){
                                            ?>
                                            <option value="<?php echo $row->station_id ?>"><?php echo $row->station ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="toggle-hidden" class="col-md-6 hidden">
                                    <div class="form-group">
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
                                        <label>REPORT TYPE<strong class="text-danger">*</strong> </label>
                                        <select id="report-type" name="report_type" class="form-control" required>
                                            <option value="">Select</option>
                                            <?php 
                                                foreach($report_type as $row){
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['report_type']; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
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

                            <div class="toggle-show" data-id="<?php echo $report_type_id; ?>" style="display:none">
                                <?php 
                                    if($report_type_id == 1){ // PRE-DEPARTURE INSPECTION (PDI) 
                                ?>
                                <fieldset id="pdi_fieldset" class="pdi_fieldset">
                                    <legend class="scheduler-border">PRE-DEPARTURE INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="pdi_vessel_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="pdi_port_place[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php
                                                $i = 1; 
                                                foreach($vessel_type as $row){ ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="pdi_vessel_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="company[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="captain_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01" name="gross_tonnage[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01" name="kilowats[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">RESULT OF PDI</label>
                                            <div class="col-sm-12">
                                                <?php  $i = 1;  foreach($pdi_result as $row): ?>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="pdi_result" checked
                                                        id="pdi_result<?= $row->id  ?>" value="<?= $row->id  ?>">
                                                    <label
                                                        for="pdi_result<?= $row->id  ?>"><?= $row->pdi_result ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">ACTION CODES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1; 
                                                    foreach($action_code as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="pdi_action_code[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->action_code ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NOTED DEFICIENCY/IES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1; 
                                                    foreach($noted_deficiency as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="pdi_noted_deficiency[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->noted_deficiency ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                                <textarea name="pdi_specify_noted_deficiency[]" class="form-control"
                                                    id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="pdi-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="pdi-remove-clone-btn" class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">BULK CARRIER</label>
                                            <div class="radio-list">
                                                <?php 
                                                    foreach(range(1,5) as $i){
                                                ?>
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="bulk_carrier"
                                                            id="bulk_carrier_<?php echo $i; ?>"
                                                            value="<?php echo $i; ?>">
                                                        <label
                                                            for="bulk_carrier_<?php echo $i; ?>"><?php echo $i; ?></label>
                                                    </div>
                                                </label>
                                                <?php
                                                    }
                                                ?>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="bulk_carrier" id="bulk_carrier_6_10"
                                                            value="6-10">
                                                        <label for="bulk_carrier_6_10">6-10</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NR OF PDI CONDUCTED PER TYPE OF VESSEL
                                    </legend>
                                    <?php 
                                        foreach($vessel_type as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $row->vessel_type ?></label>
                                                <div class="radio-list">
                                                    <?php 
                                                        foreach(range(1,5) as $i){
                                                    ?>
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="<?php echo $row->vessel_type ?>"
                                                                id="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="<?php echo $row->vessel_type ?>"
                                                                id="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_6-10"   ?>"
                                                                value="6">
                                                            <label for="radio2">6-10</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">CHECK BOXES OF ALL NOTED DEFICIENCY/IES (IF
                                                ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
																			foreach($noted_deficiency as $row){
																		?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="noted_deficiency[]"
                                                        id="noted_deficiency_<?php echo $report_type_id . "_" . $row->id  ?>_2"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="noted_deficiency_<?php echo $report_type_id . "_" . $row->id  ?>_2"><?php echo $row->noted_deficiency ?></label>
                                                </div>
                                                <?php
																			}
																		?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF VESSEL THAT HAVE BEEN CLEARED TO
                                        DEPART AND NOT CLEARED TO DEPART</legend>
                                    <?php  
                                        foreach($pdi_result as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $row->pdi_result; ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,6) as $i){
                                                            if($i < 6){
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                name="<?php echo $row->pdi_result; ?>[]"
                                                                id="<?php echo $row->pdi_result . "_" .  $report_type_id . "_" . $row->id . "_" . $i   ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->pdi_result . "_" .  $report_type_id . "_" . $row->id . "_" . $i   ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php

                                                            }else{
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                name="<?php echo $row->pdi_result; ?>[]"
                                                                id="<?php echo $row->pdi_result . "_" .  $report_type_id . "_6-10"    ?>"
                                                                value="6-10">
                                                            <label
                                                                for="<?php echo $row->pdi_result . "_" .  $report_type_id . "_6-10"    ?>">6-10</label>
                                                        </div>
                                                    </label>
                                                    <?php
                                                            }
                                                    ?>
                                                    <?php 
                                                        }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>
                                <?php
                                    }else if($report_type_id == 2){ // VESSEL SAFETY ENFORCEMENT INSPECTION (VSEI)
                                ?>
                                <fieldset class="vsei_fieldset">
                                    <legend class="scheduler-border">VESSEL SAFETY ENFORCEMENT INSPECTION DATA</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <input type="text" name="vsei_vessel_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="vsei_port_place[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php
                                                $i = 1; 
                                                foreach($vessel_type as $row){ ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="vsei_vessel_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="vsei_company[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="vsei_captain_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="number" step="0.01" name="vsei_vessel_age[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01" name="vsei_gross_tonnage[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01" name="vsei_kilowats[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF INSPECTION</label>

                                                <?php 
                                                    $i = 1;
                                                    foreach($inspection_type as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="vsei_inspection_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->inspection_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">RESULT OF VSEI</label>
                                                <?php 
                                                    $i = 1;
                                                    foreach($vsei_result as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="vsei_result[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vsei_result ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">ACTION CODES (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1;
                                                    foreach($action_code as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="vsei_action_code[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->action_code ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                                <!-- <div class="checkbox checkbox-custom">
                                                    <input id="garbagetype5" type="checkbox">
                                                    <label for="garbagetype5">Other</label>
                                                    <input type="text">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">VSEI DEFICIENCY CODE (IF ANY)</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    $i = 1;
                                                    foreach($vsei_deficiency_code as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="vsei_deficiency_code_2[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vsei_deficiency_code ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                                <textarea name="vsei_specify_noted_deficiency[]" class="form-control"
                                                    id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NEXT SCHEDULE OF VSEI</label>
                                                <input type="date" name="vsei_next_schedule[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="vsei-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="vsei-remove-clone-btn" class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NR OF PDI CONDUCTED PER TYPE OF VESSEL
                                    </legend>
                                    <?php 
                                        foreach($vessel_type as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $row->vessel_type ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                name="vsei <?php echo $row->vessel_type ?>[]"
                                                                id="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">VSEI DEFICIENCY CODE (IF ANY)</label>
                                        <div class="col-sm-12">
                                            <?php 
																		foreach($vsei_deficiency_code as $row){
																	?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="vsei_deficiency_code[]"
                                                    id="vsei_deficiency_code_<?php echo $report_type_id . "_" . $row->id  ?>_2"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="vsei_deficiency_code_<?php echo $report_type_id . "_" . $row->id  ?>_2"><?php echo $row->vsei_deficiency_code ?></label>
                                            </div>
                                            <?php
																		}
																	?>
                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF VESSEL DETAINED AND DETAINED
                                    </legend>
                                    <?php 
                                        $status = ['DETAINED', 'NOT DETAINEDs']; 
                                        foreach($status as $stat){
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $stat; ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>

                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox" name="vsei <?php echo $stat; ?>[]"
                                                                id="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>

                                <?php
                                    }else if($report_type_id == 3){ // EMERGENCY READINESS EVALUATION (ERE) 
                                ?>
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
                                                <input type="text" name="ere_vessel_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="ere_port_place[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php
                                                $i = 1; 
                                                foreach($vessel_type as $row){ ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="ere_vessel_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">OWNER/COMPANY</label>
                                                <input type="text" name="ere_company[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="ere_captain_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="number" step="0.01" name="ere_vessel_age[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">GROSS TONNAGE (GT)</label>
                                                <input type="number" step="0.01" name="ere_gross_tonnage[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">KILOWATS (KW)</label>
                                                <input type="number" step="0.01" name="ere_kilowats[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">DATE OF PREVIOUS ERE</label>
                                                <input type="date" name="ere_previous_date[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF INSPECTION</label>
                                                <?php 
                                                    $i = 1;
                                                    foreach($inspection_type as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="inspection_type"
                                                        name="ere_inspection_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->inspection_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">DRILLS CONDUCTED</label>
                                                <?php 
                                                    $i = 1;
                                                    foreach($drill_conducted as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="ere_drill_conducted[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->drill_conducted ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">RESULT OF VSEI</label>
                                                <?php 
                                                    $i = 1;
                                                    foreach($vsei_result as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="ere_vsei_result[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vsei_result ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NEXT SCHEDULE OF ERE</label>
                                                <input type="date" class="form-control" name="ere_next_schedule[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">COMMENTS AND RECOMMENDATIONS</label>
                                                <textarea name="ere_comment[]" class="form-control" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                >hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="ere-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="ere-remove-clone-btn" class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>

                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NR OF PDI CONDUCTED PER TYPE OF VESSEL
                                    </legend>
                                    <?php 
                                        foreach($vessel_type as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $row->vessel_type ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                name="ere <?php echo $row->vessel_type ?>[]"
                                                                id="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF VESSEL THAT HAVE PASSED AND FAILED
                                    </legend>
                                    <?php 
                                        $status = ['PASSED', 'FAILED']; 
                                        foreach($status as $stat){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $stat; ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>

                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox" name="ere <?php echo $stat; ?>"
                                                                id="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                            }
                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        ?>
                                </fieldset>

                                <?php
                                    }else if($report_type_id == 4){ // PORT STATE CONTROL (PSC) 
                                ?>

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
                                                <input type="text" name="psc_vessel_name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PLACE OF PORT</label>
                                                <input type="text" name="psc_port_place[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF VESSEL</label>
                                            <div class="col-sm-12">
                                                <?php
                                                $i = 1; 
                                                foreach($vessel_type as $row){ ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox"
                                                        name="psc_vessel_type[0][<?php echo $i; $i++; ?>]"
                                                        value="<?php echo $row->id  ?>">
                                                    <label><?php echo $row->vessel_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">FLAG OF REGISTRY</label>
                                                <input type="text" name="psc_registry_flag[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">IMO NR</label>
                                                <input type="text" name="psc_imo_nr[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">GT/NT</label>
                                                <input type="text" name="psc_gt_nt[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">AGE OF VESSEL</label>
                                                <input type="text" name="psc_vessel_age[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF OWNER/COMPANY</label>
                                                <input type="text" name="psc_company[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-12">CAPTAINS NAME</label>
                                                <input type="text" name="psc_captain_name[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF INSPECTION</label>
                                            <?php 
                                                $i = 1;
                                                foreach($inspection_type as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox"
                                                    name="psc_inspection_type[0][<?php echo $i; $i++; ?>]"
                                                    value="<?php echo $row->id  ?>">
                                                <label><?php echo $row->inspection_type ?></label>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>ACTION CODES (IF VESSEL HAS NOTED DEFICIENCY)</label>
                                            <?php 
                                                $i = 1;
                                                foreach($psc_action_code as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox"
                                                    name="psc_action_code[0][<?php echo $i; $i++; ?>]"
                                                    value="<?php echo $row->id  ?>">
                                                <label><?php echo $row->psc_action_code ?></label>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>RELATED INTERNATIONAL CONVENTIONS NOTED DEFICIENCY/IES</label>
                                            <?php 
                                                $i = 1;
                                                foreach($related_international_conventions_noted_deficiency as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox"
                                                    name="psc_related_international_conventions_noted_deficiency[0][<?php echo $i; $i++; ?>]"
                                                    value="<?php echo $row->id  ?>">
                                                <label><?php echo $row->related_international_conventions_noted_deficiency ?></label>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>SPECIFY NOTED DEFICIENCY/IES (IF ANY)</label>
                                            <textarea name="psc_noted_deficiency[]" class="form-control" id="" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="psc-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="psc-remove-clone-btn" class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NR OF PSC CONDUCTED PER TYPE OF VESSEL
                                    </legend>
                                    <?php 
                                        foreach($vessel_type as $row){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $row->vessel_type ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                name="psc <?php echo $row->vessel_type ?>[]"
                                                                id="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->vessel_type . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF VESSEL NOT-DETAINED AND DETAINED
                                    </legend>
                                    <?php 
                                        $status = ['DETAINED', 'NOT DETAINED']; 
                                        foreach($status as $stat){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $stat; ?></label>
                                                <div class="checkbox-list">
                                                    <?php 
                                                        foreach(range(1,3) as $i){
                                                    ?>
                                                    <label class="checkbox-inline p-0">
                                                        <div class="checkbox checkbox-info">
                                                            <input type="checkbox" name="psc <?php echo $stat; ?>"
                                                                id="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $stat . "_" . $report_type_id . "_" . $i ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </fieldset>

                                <?php
                                    }else if($report_type_id == 5){ // COASTAL AND BEACH RESORT SAFETY AND SECURITY INSPECTION
                                            
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">COASTAL AND BEACH RESORT SAFETY
                                                AND SECURITY INSPECTION</strong></p>
                                    </div>
                                </div>

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
                                            <label class="col-sm-12 font-weight-bold m-t-20">LENGTH OF BEACH COAST
                                                LINE</label>
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
                                            <label class="col-sm-12 font-weight-bold m-t-20">VIOLATIONS (IF ANY)</label>
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="cabrsasi-clone-btn" class="btn btn-primary btn-sm" type="button"> <i
                                                class="fa fa-plus"></i> Add</button>
                                        <button id="cabrsasi-remove-clone-btn" class="btn btn-danger btn-sm"
                                            type="button"> <i class="fa fa-times"></i> Remove</button>
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
                                            <label class="col-sm-12 font-weight-bold m-t-20">RECRATION
                                                WATERCRAFTS</label>
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
                                            <label class="col-sm-12 font-weight-bold m-t-20">VIOLATIONS (IF ANY)</label>
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
                                <fieldset>
                                    <legend class="scheduler-border">Part 1. LIGHTHOUSE (LH)</legend>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NAME OF LH</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lh_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">TYPE OF LH</label>
                                                <?php 
                                                    foreach($lighthouse_type as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_type[]"
                                                        id="lh_type_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lh_type_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->lighthouse_type ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">PURPOSE OF INSPECTION</label>
                                                <?php 
                                                    foreach($lighthouse_inspection_purpose as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_inspection_purpose[]"
                                                        id="lh_inspection_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lh_inspection_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->lighthouse_inspection_purpose ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">NAME OF VESSEL</label>
                                                <textarea name="lh_vessel_name" class="form-control" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF LAST OPERATION</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="lh_last_operation" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">STATUS</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    foreach($lighthouse_status as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_status[]"
                                                        id="lh_status_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lh_status_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->lighthouse_status ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">IF NOT OPERATING, WHAT IS THE CAUSED?</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    foreach($lighthouse_cause_if_not_operating as $row){
                                                ?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lh_cause_if_not_operating[]"
                                                        id="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lh_cause_if_not_operating_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->lighthouse_cause_if_not_operating ?></label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF LH NOT OPERATING AND OPERATING
                                    </legend>
                                    <?php 
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
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->lighthouse_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php

																					}
																				?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
																}
															?>
                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">Part 2. LIGHTED BUOYS</legend>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">NAME OF BOUY</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lb_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">TYPE OF BOUY</label>
                                            <div class="col-sm-12">
                                                <?php 
																			foreach($bouy_type as $row){
																		?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_type[]"
                                                        id="lb_type_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lb_type_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->bouy_type ?></label>
                                                </div>
                                                <?php
																			}
																		?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">EXACT LOCATION (COORDINATES)</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="lb_location" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">PURPOSE OF INSPECTION</label>
                                            <div class="col-sm-12">
                                                <?php 
																			foreach($light_bouy_inspection_purpose as $row){
																		?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_inspection_purpose[]"
                                                        id="lb_inspection_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lb_inspection_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->light_bouy_inspection_purpose ?></label>
                                                </div>
                                                <?php
																			}
																		?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12">IF REPAIR, WHAT REPAIR WAS DONE?</label>
                                                <textarea name="lb_repair" class="form-control" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF LAST OPERATION</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="lb_last_operating" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">STATUS</label>
                                            <div class="col-sm-12">
                                                <?php 
																			foreach($light_buoy_status as $row){
																		?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_status[]"
                                                        id="lb_status_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lb_status_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->light_buoy_status ?></label>
                                                </div>
                                                <?php
																			}
																		?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-12">IF NOT OPERATING, WHAT IS THE CAUSED?</label>
                                            <div class="col-sm-12">
                                                <?php 
																			foreach($light_buoy__cause_if_not_operating as $row){
																		?>
                                                <div class="checkbox checkbox-custom">
                                                    <input type="checkbox" name="lb_cause_if_not_operating[]"
                                                        id="lb_cause_if_not_operating_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                        value="<?php echo $row->id  ?>">
                                                    <label
                                                        for="lb_cause_if_not_operating_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->light_buoy__cause_if_not_operating ?></label>
                                                </div>
                                                <?php
																			}
																		?>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <legend class="scheduler-border">TOTAL NUMBER OF BOUY NOT-OPERATING AND OPERATING
                                    </legend>

                                    <?php 
                                        foreach($light_buoy_status as $row){
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><?php echo $row->light_buoy_status; ?></label>
                                                <div class="radio-list">
                                                    <?php
																					foreach(range(1,5) as $i){
																				?>
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio"
                                                                name="lb_<?php echo $row->light_buoy_status; ?>"
                                                                id="<?php echo $row->light_buoy_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"
                                                                value="<?php echo $i; ?>">
                                                            <label
                                                                for="<?php echo $row->light_buoy_status . "_" .  $report_type_id . "_" . $row->id . "_" . $i  ?>"><?php echo $i; ?></label>
                                                        </div>
                                                    </label>
                                                    <?php

																					}
																				?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
																}
															?>
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
                                                <input type="number" name="mci_foreign_imo_number" class="form-control">
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
                                                <input type="number" name="mci_gt_nt" class="form-control">
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
                                                <input type="number" name="mci_passenger_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="number" name="mci_cargoe_onboard" class="form-control">
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
                                                <input type="number" name="mci_foreign_imo_number_2"
                                                    class="form-control">
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
                                            <input type="number" name="mci_gt_nt_2" class="form-control">
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
                                                <input type="number" name="mci_passenger_number_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CARGOES ONBOARD (IF ANY)</label>
                                                <input type="number" name="mci_cargoe_onboard_2" class="form-control">
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
                                                <input type="number" name="mci_total_injured_person"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF DEATH/S</label>
                                                <input type="number" name="mci_total_death" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF MISSING PERSON/S</label>
                                                <input type="number" name="mci_total_missing_person"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TOTAL NUMBER OF SURVIVOR/S</label>
                                                <input type="number" name="mci_total_survivor" class="form-control">
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
                                            <input type="text" name="so_salvor_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">TYPE OF APPLICATION</label>
                                        <div class="col-sm-12">
                                            <?php 
																		foreach($application_type as $row){
																	?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_application_type[]"
                                                    id="application_type_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="application_type_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->application_type ?></label>
                                            </div>
                                            <?php
																		}
																	?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">EXACT LOCATION (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="so_exact_location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">PURPOSE OF SALVAGE
                                            OPERATION</label>
                                        <div class="col-sm-12">
                                            <?php 
																		foreach($salvage_operation_purpose as $row){
																	?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="so_purpose[]"
                                                    id="salvage_operation_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="salvage_operation_purpose_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->salvage_operation_purpose ?></label>
                                            </div>
                                            <?php
																		}
																	?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">VIOLATION (IF ANY)</label>
                                        <div class="col-sm-12">
                                            <div class="checkbox checkbox-custom">
                                                <input id="garbagetype1" name="so_violation[]" value="1"
                                                    type="checkbox">
                                                <label for="garbagetype1">OPERATING WITHOUT SECURING SALVAGE
                                                    PERMIT</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }else if($report_type_id == 10){ // MARINE PARADES, REGATTAS AND MARITIME RELATED ACTIVITY
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong style="font-size: 1.3em;color: #000;">MARINE PARADES, REGATTAS AND
                                                MARITIME RELATED ACTIVITY</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">LOCATION</label>
                                            <input type="text" name="mpramra_location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">DATE OF APPLICATION</label>
                                            <input type="date" name="mpramra_application_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12">EVENT ORGANIZER</label>
                                            <input type="text" name="mpramra_event_organizer" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12">MARITIME ACTIVITY / IES</label>
                                        <div class="col-sm-12">
                                            <?php 
                                                foreach($maritime_acitivity as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_acitivity[]"
                                                    id="maritime_acitivity_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="maritime_acitivity_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->maritime_acitivity ?></label>
                                            </div>
                                            <?php
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DATE OF DEPARTURE FROM PORT OF ORIGIN</label>
                                            <input type="date" name="mpramra_departure_date_from_origin_port"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">TIME OF DEPARTURE FROM PORT OF ORIGIN</label>
                                            <div class="input-group ">
                                                <span class="input-group-btn">
                                                    <select name="mpramra_departure_hour_from_origin_port"
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
                                                    <select name="mpramra_departure_minutefrom_origin_port"
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
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">POINT OF ORIGIN
                                            (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mpramra_origin_point" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">POINT OF DESTINATION
                                            (COORDINATES)</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mpramra_destination_point" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">IS THERE ANY VESSEL
                                            INVOLVED?</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mpramra_involved_vessel" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">HOW MANY VESSEL
                                            INVOLVED?</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mpramra_involved_vessel_total"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-12 font-weight-bold m-t-20">VIOLATIONS (IF ANY)</label>
                                        <div class="col-sm-12">
                                            <?php 
                                                foreach($maritime_related_violation as $row){
                                            ?>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" name="mpramra_maritime_related_violation[]"
                                                    id="maritime_related_violation_<?php echo $report_type_id . "_" . $row->id  ?>"
                                                    value="<?php echo $row->id  ?>">
                                                <label
                                                    for="maritime_related_violation_<?php echo $report_type_id . "_" . $row->id  ?>"><?php echo $row->maritime_related_violation ?></label>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
													}
												?>

                            </div>
                            <?php
											}
										?>

                        </div>
                        <!-- <button class="btn btn-danger pull-right" type="button">Finish!</button> -->

                        <button type="submit" class="btn btn-danger pull-right" type="button">Finish!</button>
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
                        <?php foreach($marsaf as $row):?>
                        <tr>
                            <td scope="row"><?php echo $row->report_type ?></td>
                            <td><?php echo date('F d, Y \a\t\ H:i', strtotime($row->date_created )) ?></td>
                            <td> <a title="View" class="text-info" href="<?= site_url('marsaf/view/').$row->id ?>"><i
                                        class="fa fa-eye"></i></a>
                                <a title="Edit" class="text-success"
                                    href="<?= site_url('marsaf/edit_marsaf/').$row->id ?>"><i
                                        class="fa fa-pencil"></i></a>
                                <a title="Delete" class="text-danger"
                                    onclick="return confirm('Are you sure you want to delete this data?');"
                                    href="<?= site_url('marsaf/delete/').$row->id ?>"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>