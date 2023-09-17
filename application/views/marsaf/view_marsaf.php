<div class="container-fluid">
    <div class="text-right m-b-10">
        <a href="<?= site_url('marsaf/edit_marsaf/').$marsaf->id ?>" class="btn btn-info btn-outline" type="button">
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
                        <th>DTG</th>
                        <th>TIME</th>
                    </tr>
                    <tr>
                        <td><?php echo date('F d, Y', strtotime($marsaf->date_created)) ?></td>
                        <td><?php echo date('H:i', strtotime($marsaf->date_created)) ?></td>
                    </tr>
                    <tr>
                        <th>CGDNM STATIONS </th>
                        <th>SUB-STATIONS</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf->station ?></td>
                        <td><?= $marsaf->sub_station ?></td>
                    </tr>
                    <tr>
                        <th>PSC CENTER</th>
                        <th>REPORT TYPE</th>
                    </tr>
                    <tr>
                        <?php foreach($psc_center as $row): ?>
                        <?php if($row->id == $marsaf->psc_center): ?>
                        <td><?= $row->psc_center; ?></td>
                        <?php endif ?>
                        <?php endforeach ?>
                        <td><?= $marsaf->report_type; ?></td>
                    </tr>

                    <?php if($marsaf->report_type_id==1):?>

                    <?php if(!empty($marsaf_pdi_data)): ?>
                    <?php foreach($marsaf_pdi_data as $pdi): ?>

                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>
                    <tr>
                        <th>NAME OF VESSEL</th>
                        <th>PLACE OF PORT</th>
                    </tr>
                    <tr>
                        <td><?= $pdi->vessel_name ?></td>
                        <td><?= $pdi->port_place ?></td>
                    </tr>
                    <tr>
                        <th th colspan="2">TYPE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ves_type = explode(",",$pdi->vessel_type); $j=0;   ?>
                            <?php for($i=0; $i <count($vessel_type); $i++): ?>
                            <?php if(isset($ves_type[$j]) && $ves_type[$j] == $vessel_type[$i]->id):?>
                            <?= $vessel_type[$i]->vessel_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>OWNER/COMPANY</th>
                        <th>CAPTAINS NAME</th>
                    </tr>
                    <tr>
                        <td><?= $pdi->company ?></td>
                        <td><?= $pdi->captain_name ?></td>
                    </tr>
                    <tr>
                        <th>GROSS TONNAGE (GT)</th>
                        <th>KILOWATS (KW)</th>
                    </tr>
                    <tr>
                        <td><?= $pdi->gross_tonnage ?></td>
                        <td><?= $pdi->kilowat ?></td>
                    </tr>
                    <tr>
                        <th>RESULT OF PDI </th>
                        <th>ACTION CODES (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $pdi_res = explode(",",$pdi->pdi_result); $j=0;   ?>
                            <?php for($i=0; $i <count($pdi_result); $i++): ?>
                            <?php if(isset($pdi_res[$j]) && $pdi_res[$j] == $pdi_result[$i]->id):?>
                            <?= $pdi_result[$i]->pdi_result; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $act_code = explode(",",$pdi->action_code); $j=0;   ?>
                            <?php for($i=0; $i <count($action_code); $i++): ?>
                            <?php if(isset($act_code[$j]) && $act_code[$j] == $action_code[$i]->id):?>
                            <?= $action_code[$i]->action_code; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>NOTED DEFICIENCY/IES (IF ANY)</th>
                        <th>SPECIFY NOTED DEFICIENCY/IES (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $no_defi = explode(",",$pdi->noted_deficiency); $j=0;   ?>
                            <?php for($i=0; $i <count($noted_deficiency); $i++): ?>
                            <?php if(isset($no_defi[$j]) && $no_defi[$j] == $noted_deficiency[$i]->id):?>
                            <?= $noted_deficiency[$i]->noted_deficiency; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?= $pdi->specify_noted_deficiency ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">TOTAL NR OF PDI CONDUCTED PER TYPE OF VESSEL</th>
                    </tr>
                    <?php endforeach ?>
                    <?php 
                    $vessel = array(
                        $marsaf_pdi->bulk_carrier_2 ?? 0,
                        $marsaf_pdi->cargo ?? 0,
                        $marsaf_pdi->chemical_tanker ?? 0,
                        $marsaf_pdi->container ?? 0,
                        $marsaf_pdi->fishing_vessel ?? 0,
                        $marsaf_pdi->passenger ?? 0,
                        $marsaf_pdi->roll_on_roll_off ?? 0,
                        $marsaf_pdi->tanker ?? 0,
                        $marsaf_pdi->tugboat ?? 0,
                    );

                    $count = 0;
                    
                    foreach($vessel_type as $row): ?>

                    <tr>
                        <td><?= $row->vessel_type ?></td>
                        <td>
                            <?= $vessel[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <tr>
                        <th colspan="2">CHECK BOXES OF ALL NOTED DEFICIENCY/IES (IF ANY) </th>
                    </tr>
                    <tr>
                        <td>
                            <?php $noted_def = explode(",",$marsaf_pdi->noted_deficiency); $j=0;   ?>
                            <?php for($i=0; $i <count($noted_deficiency); $i++): ?>
                            <?php if(isset($noted_def[$j]) && $noted_def[$j] == $noted_deficiency[$i]->id):?>
                            <?= $noted_deficiency[$i]->noted_deficiency; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">TOTAL NUMBER OF VESSEL THAT HAVE BEEN CLEARED TO DEPART AND NOT CLEARED TO
                            DEPART</th>
                    </tr>
                    <?php 
                     $cleared = array(
                        $marsaf_pdi->cleared_to_depart ?? 0,
                        $marsaf_pdi->not_cleared_to_depart ?? 0
                    ); 

                    $count = 0;
                    
                    foreach($pdi_result as $row): ?>

                    <tr>
                        <td><?= $row->pdi_result ?></td>
                        <td>
                            <?= $cleared[$count] ?>
                        </td>
                    </tr>

                    <?php endforeach ?>



                    <?php endif ?>

                    <?php elseif($marsaf->report_type_id==2):?>

                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <?php if(!empty($marsaf_vsei_data)): ?>
                    <?php foreach($marsaf_vsei_data as $vsei): ?>

                    <tr>
                        <th>NAME OF VESSEL</th>
                        <th>PLACE OF PORT</th>
                    </tr>
                    <tr>
                        <td><?= $vsei->vessel_name ?></td>
                        <td><?= $vsei->port_place ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">TYPE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ves_type = explode(",",$vsei->vessel_type); $j=0;   ?>
                            <?php for($i=0; $i <count($vessel_type); $i++): ?>
                            <?php if(isset($ves_type[$j]) && $ves_type[$j] == $vessel_type[$i]->id):?>
                            <?= $vessel_type[$i]->vessel_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>OWNER/COMPANY</th>
                        <th>CAPTAINS NAME</th>
                    </tr>
                    <tr>
                        <td><?= $vsei->company ?></td>
                        <td><?= $vsei->captain_name ?></td>
                    </tr>
                    <tr>
                        <th>AGE OF VESSEL</th>
                        <th>GROSS TONNAGE (GT)</th>
                    </tr>
                    <tr>
                        <td><?= $vsei->vessel_age ?></td>
                        <td><?= $vsei->gross_tonnage ?></td>
                    </tr>
                    <tr>
                        <th>KILOWATS (KW)</th>
                        <th>TYPE OF INSPECTION</th>
                    </tr>
                    <tr>
                        <td><?= $vsei->kilowat ?></td>
                        <td>
                            <?php $insp = explode(",",$vsei->inspection_type); $j=0;   ?>
                            <?php for($i=0; $i <count($inspection_type); $i++): ?>
                            <?php if(isset($insp[$j]) && $insp[$j] == $inspection_type[$i]->id):?>
                            <?= $inspection_type[$i]->inspection_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>RESULT OF VSEI</th>
                        <th>ACTION CODE (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $vsei_t = explode(",",$vsei->vsei_result); $j=0;   ?>
                            <?php for($i=0; $i <count($vsei_result); $i++): ?>
                            <?php if(isset($vsei_t[$j]) && $vsei_t[$j] == $vsei_result[$i]->id):?>
                            <?= $vsei_result[$i]->vsei_result; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $acti = explode(",",$vsei->action_code); $j=0;   ?>
                            <?php for($i=0; $i <count($action_code); $i++): ?>
                            <?php if(isset($acti[$j]) && $acti[$j] == $action_code[$i]->id):?>
                            <?= $action_code[$i]->action_code; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>VSEI DEFICIENCY CODE (IF ANY)</th>
                        <th>SPECIFY NOTED DEFICIENCY/IES (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $deficien = explode(",",$vsei->deficiency_code); $j=0;   ?>
                            <?php for($i=0; $i <count($vsei_deficiency_code); $i++): ?>
                            <?php if(isset($deficien[$j]) && $deficien[$j] == $vsei_deficiency_code[$i]->id):?>
                            <?= $vsei_deficiency_code[$i]->vsei_deficiency_code; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?= $vsei->specify_noted_deficiency ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">NEXT SCHEDULE OF VSEI</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo date('F d, Y', strtotime($vsei->next_schedule)) ?></td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>
                    <?php 
                        $vessel = array(
                            $marsaf_vsei->bulk_carrier ?? 0,
                            $marsaf_vsei->cargo ?? 0,
                            $marsaf_vsei->chemical_tanker ?? 0,
                            $marsaf_vsei->container ?? 0,
                            $marsaf_vsei->fishing_vessel ?? 0,
                            $marsaf_vsei->passenger ?? 0,
                            $marsaf_vsei->roll_on_roll_off ?? 0,
                            $marsaf_vsei->tanker ?? 0,
                            $marsaf_vsei->tugboat ?? 0,
                        );

                        $count = 0;

                        foreach($vessel_type as $row): ?>

                    <tr>
                        <td><?= $row->vessel_type ?></td>
                        <td>
                            <?= $vessel[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>
                    <tr>
                        <th colspan="2">VSEI DEFICIENCY CODE (IF ANY) </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $vsei_defi = explode(",",$marsaf_vsei->vsei_deficiency_code); $j=0;   ?>
                            <?php for($i=0; $i <count($vsei_deficiency_code); $i++): ?>
                            <?php if(isset($vsei_defi[$j]) && $vsei_defi[$j] == $vsei_deficiency_code[$i]->id):?>
                            <?= $vsei_deficiency_code[$i]->vsei_deficiency_code; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">TOTAL NUMBER OF VESSEL DETAINED AND DETAINED</th>
                    </tr>
                    <?php 
                     $detain = array(
                        $marsaf_vsei->detained ?? 0,
                        $marsaf_vsei->not_detained ?? 0,
                    ); 

                    $count = 0;
                    $status = ['DETAINED', 'NOT DETAINEDs']; 

                    foreach($status as $row): ?>

                    <tr>
                        <td><?= $row ?></td>
                        <td>
                            <?= $detain[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <?php elseif($marsaf->report_type_id==3):?>

                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <?php if(!empty($marsaf_ere_data)): ?>
                    <?php foreach($marsaf_ere_data as $ere): ?>

                    <tr>
                        <th>NAME OF VESSEL</th>
                        <th>PLACE OF PORT</th>
                    </tr>
                    <tr>
                        <td><?= $ere->vessel_name ?></td>
                        <td><?= $ere->port_place ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">TYPE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ves_type = explode(",",$ere->vessel_type); $j=0;   ?>
                            <?php for($i=0; $i <count($vessel_type); $i++): ?>
                            <?php if(isset($ves_type[$j]) && $ves_type[$j] == $vessel_type[$i]->id):?>
                            <?= $vessel_type[$i]->vessel_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>OWNER/COMPANY</th>
                        <th>CAPTAINS NAME</th>
                    </tr>
                    <tr>
                        <td><?= $ere->company ?></td>
                        <td><?= $ere->captain_name ?></td>
                    </tr>
                    <tr>
                        <th>AGE OF VESSEL</th>
                        <th>GROSS TONNAGE (GT)</th>
                    </tr>
                    <tr>
                        <td><?= $ere->vessel_age ?></td>
                        <td><?= $ere->gross_tonnage ?></td>
                    </tr>
                    <tr>
                        <th>KILOWATS (KW)</th>
                        <th>DATE OF PREVIOUS ERE</th>
                    </tr>
                    <tr>
                        <td><?= $ere->kilowat ?></td>
                        <td><?php echo date('F d, Y', strtotime($ere->previous_date)) ?></td>
                    </tr>

                    <tr>
                        <th>TYPE OF INSPECTION</th>
                        <th>DRILLS CONDUCTED</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $inspec = explode(",",$ere->inspection_type); $j=0;   ?>
                            <?php for($i=0; $i <count($inspection_type); $i++): ?>
                            <?php if(isset($inspec[$j]) && $inspec[$j] == $inspection_type[$i]->id):?>
                            <?= $inspection_type[$i]->inspection_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $drill = explode(",",$ere->drill_conducted); $j=0;   ?>
                            <?php for($i=0; $i <count($drill_conducted); $i++): ?>
                            <?php if(isset($drill[$j]) && $drill[$j] == $drill_conducted[$i]->id):?>
                            <?= $drill_conducted[$i]->drill_conducted; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <tr>
                        <th>RESULT OF VSEI</th>
                        <th>NEXT SCHEDULE OF ERE</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $ere_re = explode(",",$ere->ere_result); $j=0;   ?>
                            <?php for($i=0; $i <count($vsei_result); $i++): ?>
                            <?php if(isset($ere_re[$j]) && $ere_re[$j] == $vsei_result[$i]->id):?>
                            <?= $vsei_result[$i]->vsei_result; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?php echo date('F d, Y', strtotime($ere->next_schedule)) ?></td>
                    </tr>

                    <tr>
                        <th colspan="2">COMMENTS AND RECOMMENDATIONS</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $ere->comment ?></td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>
                    <tr>
                        <th colspan="2">TOTAL NR OF PDI CONDUCTED PER TYPE OF VESSEL
                        </th>
                    </tr>
                    <?php 
                        $vessel = array(
                            $marsaf_ere->bulk_carrier ?? 0,
                            $marsaf_ere->cargo ?? 0,
                            $marsaf_ere->chemical_tanker ?? 0,
                            $marsaf_ere->container ?? 0,
                            $marsaf_ere->fishing_vessel ?? 0,
                            $marsaf_ere->passenger ?? 0,
                            $marsaf_ere->roll_on_roll_off ?? 0,
                            $marsaf_ere->tanker ?? 0,
                            $marsaf_ere->tugboat ?? 0,
                        );

                        $count = 0;

                        foreach($vessel_type as $row): ?>

                    <tr>
                        <td><?= $row->vessel_type ?></td>
                        <td>
                            <?= $vessel[$count] ?>
                        </td>
                    </tr>
                    <?php $count++; endforeach ?>
                    <tr>
                        <th colspan="2">TOTAL NUMBER OF VESSEL THAT HAVE PASSED AND FAILED
                        </th>
                    </tr>

                    <?php 
                     $detain = array(
                        $marsaf_ere->passed ?? 0,
                        $marsaf_ere->failed ?? 0,
                    ); 

                    $count = 0;
                    $status = ['PASSED', 'FAILED']; 

                    foreach($status as $row): ?>

                    <tr>
                        <td><?= $row ?></td>
                        <td>
                            <?= $detain[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <?php elseif($marsaf->report_type_id==4):?>

                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <?php if(!empty($marsaf_psc_data)): ?>
                    <?php foreach($marsaf_psc_data as $psc): ?>

                    <tr>
                        <th>NAME OF VESSEL</th>
                        <th>PLACE OF PORT</th>
                    </tr>
                    <tr>
                        <td><?= $psc->vessel_name ?></td>
                        <td><?= $psc->port_place ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">TYPE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ves_type = explode(",",$psc->vessel_type); $j=0;   ?>
                            <?php for($i=0; $i <count($vessel_type); $i++): ?>
                            <?php if(isset($ves_type[$j]) && $ves_type[$j] == $vessel_type[$i]->id):?>
                            <?= $vessel_type[$i]->vessel_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>FLAG OF REGISTRY</th>
                        <th>IMO NR</th>
                    </tr>
                    <tr>
                        <td><?= $psc->registry_flag ?></td>
                        <td><?= $psc->imo_nr ?></td>
                    </tr>
                    <tr>
                        <th>GT/NT</th>
                        <th>AGE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td><?= $psc->gt_nt ?></td>
                        <td><?= $psc->vessel_age ?></td>
                    </tr>
                    <tr>
                        <th>NAME OF OWNER/COMPANY</th>
                        <th>CAPTAINS NAME</th>
                    </tr>
                    <tr>
                        <td><?= $psc->company ?></td>
                        <td><?= $psc->captain_name ?></td>
                    </tr>

                    <tr>
                        <th>TYPE OF INSPECTION</th>
                        <th>ACTION CODES(IF VESSEL HAS NOTED DEIFICIENCY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $inspec = explode(",",$psc->inspection_type); $j=0;   ?>
                            <?php for($i=0; $i <count($inspection_type); $i++): ?>
                            <?php if(isset($inspec[$j]) && $inspec[$j] == $inspection_type[$i]->id):?>
                            <?= $inspection_type[$i]->inspection_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $action = explode(",",$psc->action_code); $j=0;   ?>
                            <?php for($i=0; $i <count($psc_action_code); $i++): ?>
                            <?php if(isset($action[$j]) && $action[$j] == $psc_action_code[$i]->id):?>
                            <?= $psc_action_code[$i]->psc_action_code; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>RELATED INTERNATIONAL CONVENTIONS NOTED DEFICIENCY/IES</th>
                        <th>SPECIFY NOTED DEFICIENCY/IES (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $related_in = explode(",",$psc->related_international_conventions_noted_deficiency); $j=0;   ?>
                            <?php for($i=0; $i <count($related_international_conventions_noted_deficiency); $i++): ?>
                            <?php if(isset($related_in[$j]) && $related_in[$j] == $related_international_conventions_noted_deficiency[$i]->id):?>
                            <?= $related_international_conventions_noted_deficiency[$i]->related_international_conventions_noted_deficiency; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?= $psc->noted_deficiency ?></td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>

                    <tr>
                        <th colspan="2">TOTAL NR OF PSC CONDUCTED PER TYPE OF VESSEL</th>
                    </tr>
                    <?php 
                        $vessel = array(
                            $marsaf_psc->bulk_carrier ?? 0,
                            $marsaf_psc->cargo ?? 0,
                            $marsaf_psc->chemical_tanker ?? 0,
                            $marsaf_psc->container ?? 0,
                            $marsaf_psc->fishing_vessel ?? 0,
                            $marsaf_psc->passenger ?? 0,
                            $marsaf_psc->roll_on_roll_off ?? 0,
                            $marsaf_psc->tanker ?? 0,
                            $marsaf_psc->tugboat ?? 0,
                        );

                        $count = 0;

                        foreach($vessel_type as $row): ?>

                    <tr>
                        <td><?= $row->vessel_type ?></td>
                        <td>
                            <?= $vessel[$count] ?>
                        </td>
                    </tr>
                    <?php $count++; endforeach ?>

                    <tr>
                        <th colspan="2">TOTAL NUMBER OF VESSEL NOT-DETAINED AND DETAINED</th>
                    </tr>
                    <?php 
                     $detain = array(
                        $marsaf_psc->detained ?? 0,
                        $marsaf_psc->not_detained ?? 0,
                    ); 

                    $count = 0;
                    $status = ['DETAINED', 'NOT DETAINED']; 

                    foreach($status as $row): ?>

                    <tr>
                        <td><?= $row ?></td>
                        <td>
                            <?= $detain[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <?php elseif($marsaf->report_type_id==5):?>
                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <?php if(!empty($marsaf_cabrsasi_data)): ?>
                    <?php foreach($marsaf_cabrsasi_data as $cabrsasi): ?>
                    <tr>
                        <th>NAME OF COASTAL/RESORT</th>
                        <th>PLACE OF COASTAL/BEACH RESORT</th>
                    </tr>
                    <tr>
                        <td><?= $cabrsasi->coastal_name ?></td>
                        <td><?= $cabrsasi->coastal_place ?></td>
                    </tr>
                    <tr>
                        <th>NAME OF OWNER</th>
                        <th>LENGTH OF BEACH COAST LINE</th>
                    </tr>
                    <tr>
                        <td><?= $cabrsasi->owner_name ?></td>
                        <td>
                            <?php $beach_c = explode(",",$cabrsasi->beach_coast_line_length); $j=0;   ?>
                            <?php for($i=0; $i <count($beach_coast_line_length); $i++): ?>
                            <?php if(isset($beach_c[$j]) && $beach_c[$j] == $beach_coast_line_length[$i]->id):?>
                            <?= $beach_coast_line_length[$i]->beach_coast_line_length; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">VIOLATIONS (IF ANY)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $vio = explode(",",$cabrsasi->violation); $j=0;   ?>
                            <?php for($i=0; $i <count($coastal_and_beach_violation); $i++): ?>
                            <?php if(isset($vio[$j]) && $vio[$j] == $coastal_and_beach_violation[$i]->id):?>
                            <?= $coastal_and_beach_violation[$i]->coastal_and_beach_violation; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>

                    <?php elseif($marsaf->report_type_id==6):?>
                    <th colspan=" 2"><?= $marsaf->report_type; ?> DATA</th>

                    <?php if(!empty($marsaf_rsei_data)): ?>
                    <?php foreach($marsaf_rsei_data as $rsei): ?>
                    <tr>
                        <th>NAME OF RESORT</th>
                        <th>PLACE OF INSPECTION</th>
                    </tr>
                    <tr>
                        <td><?= $rsei->resort_name ?></td>
                        <td><?= $rsei->inspection_place ?></td>
                    </tr>
                    <tr>
                        <th>NAME OF OWNER</th>
                        <th>RECRATION WATERCRAFTS</th>
                    </tr>
                    <tr>
                        <td><?= $rsei->owner_name ?></td>
                        <td>
                            <?php $recr = explode(",",$rsei->recration_watercraft); $j=0;   ?>
                            <?php for($i=0; $i <count($recration_watercraft); $i++): ?>
                            <?php if(isset($recr[$j]) && $recr[$j] == $recration_watercraft[$i]->id):?>
                            <?= $recration_watercraft[$i]->recration_watercraft; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">VIOLATIONS (IF ANY)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $recreati = explode(",",$rsei->recreational_violation); $j=0;   ?>
                            <?php for($i=0; $i <count($recreational_violation); $i++): ?>
                            <?php if(isset($recreati[$j]) && $recreati[$j] == $recreational_violation[$i]->id):?>
                            <?= $recreational_violation[$i]->recreational_violation; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>

                    <?php elseif($marsaf->report_type_id==7):?>
                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <tr>
                        <th colspan="2">Part 1. LIGHTHOUSE (LH)</th>
                    </tr>
                    <tr>
                        <th>NAME OF LH</th>
                        <th>TYPE OF LH</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_aton->lh_name ?></td>
                        <td>
                            <?php $lh_ty = explode(",",$marsaf_aton->lh_type); $j=0;   ?>
                            <?php for($i=0; $i <count($lighthouse_type); $i++): ?>
                            <?php if(isset($lh_ty[$j]) && $lh_ty[$j] == $lighthouse_type[$i]->id):?>
                            <?= $lighthouse_type[$i]->lighthouse_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>PURPOSE OF INSPECTION</th>
                        <th>NAME OF VESSEL</th>
                    </tr>
                    <tr>

                        <td>
                            <?php $lh_i = explode(",",$marsaf_aton->lh_inspection_purpose); $j=0;   ?>
                            <?php for($i=0; $i <count($lighthouse_inspection_purpose); $i++): ?>
                            <?php if(isset($lh_i[$j]) && $lh_i[$j] == $lighthouse_inspection_purpose[$i]->id):?>
                            <?= $lighthouse_inspection_purpose[$i]->lighthouse_inspection_purpose; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?= $marsaf_aton->lh_vessel_name ?></td>
                    </tr>
                    <tr>
                        <th>DATE OF LAST OPERATION</th>
                        <th>STATUS</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y', strtotime($marsaf_aton->lh_last_operation)) ?></td>
                        <td>
                            <?php $status = explode(",",$marsaf_aton->lh_status); $j=0;   ?>
                            <?php for($i=0; $i <count($lighthouse_status); $i++): ?>
                            <?php if(isset($status[$j]) && $status[$j] == $lighthouse_status[$i]->id):?>
                            <?= $lighthouse_status[$i]->lighthouse_status; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">IF NOT OPERATING, WHAT IS THE CAUSED?</th>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <?php $lh_cause_= explode(",",$marsaf_aton->lh_cause_if_not_operating); $j=0;   ?>
                            <?php for($i=0; $i <count($lighthouse_cause_if_not_operating); $i++): ?>
                            <?php if(isset($lh_cause_[$j]) && $lh_cause_[$j] == $lighthouse_cause_if_not_operating[$i]->id):?>
                            <?= $lighthouse_cause_if_not_operating[$i]->lighthouse_cause_if_not_operating; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="2">TOTAL NUMBER OF LH NOT OPERATING AND OPERATING</th>
                    </tr>

                    <?php 
                     $operat = array(
                        $marsaf_aton->lh_operating ?? 0,
                        $marsaf_aton->lh_not_operating ?? 0,
                    ); 

                    $count = 0;

                    foreach($lighthouse_status as $row): ?>

                    <tr>
                        <td><?= $row->lighthouse_status ?></td>
                        <td>
                            <?= $operat[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <tr>
                        <th colspan="2">Part 2. LIGHTED BUOYS</th>
                    </tr>
                    <tr>
                        <th>NAME OF BOUY</th>
                        <th>TYPE OF BOUY</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_aton->lb_name ?></td>
                        <td>
                            <?php $lb_type = explode(",",$marsaf_aton->lb_type); $j=0;   ?>
                            <?php for($i=0; $i <count($bouy_type); $i++): ?>
                            <?php if(isset($lb_type[$j]) && $lb_type[$j] == $bouy_type[$i]->id):?>
                            <?= $bouy_type[$i]->bouy_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>EXACT LOCATION (COORDINATES)</th>
                        <th>PURPOSE OF INSPECTION</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_aton->lb_location ?></td>
                        <td>
                            <?php $lb_inspection_purpose = explode(",",$marsaf_aton->lb_inspection_purpose); $j=0;   ?>
                            <?php for($i=0; $i <count($light_bouy_inspection_purpose); $i++): ?>
                            <?php if(isset($lb_inspection_purpose[$j]) && $lb_inspection_purpose[$j] == $light_bouy_inspection_purpose[$i]->id):?>
                            <?= $light_bouy_inspection_purpose[$i]->light_bouy_inspection_purpose; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>IF REPAIR, WHAT REPAIR WAS DONE?</th>
                        <th>DATE OF LAST OPERATION</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_aton->lb_repair ?></td>
                        <td><?= date('F d, Y', strtotime($marsaf_aton->lb_last_operating)) ?></td>
                    </tr>
                    <tr>
                        <th>STATUS</th>
                        <th>IF NOT OPERATING, WHAT IS THE CAUSED?</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $lb_status = explode(",",$marsaf_aton->lb_status); $j=0;   ?>
                            <?php for($i=0; $i <count($light_buoy_status); $i++): ?>
                            <?php if(isset($lb_status[$j]) && $lb_status[$j] == $light_buoy_status[$i]->id):?>
                            <?= $light_buoy_status[$i]->light_buoy_status; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $lb_cause_if_not_operating = explode(",",$marsaf_aton->lb_cause_if_not_operating); $j=0;   ?>
                            <?php for($i=0; $i <count($light_buoy__cause_if_not_operating); $i++): ?>
                            <?php if(isset($lb_cause_if_not_operating[$j]) && $lb_cause_if_not_operating[$j] == $light_buoy__cause_if_not_operating[$i]->id):?>
                            <?= $light_buoy__cause_if_not_operating[$i]->light_buoy__cause_if_not_operating; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">TOTAL NUMBER OF BOUY NOT-OPERATING AND OPERATING</th>
                    </tr>
                    <?php 
                     $lh_stats = array(
                        $marsaf_aton->lb_operating ?? 0,
                        $marsaf_aton->lb_not_operating ?? 0,
                    ); 

                    $count = 0;

                    foreach($light_buoy_status as $row): ?>

                    <tr>
                        <td><?= $row->light_buoy_status ?></td>
                        <td>
                            <?= $lh_stats[$count] ?>
                        </td>
                    </tr>

                    <?php $count++; endforeach ?>

                    <?php elseif($marsaf->report_type_id==8):?>
                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <tr>
                        <th>EXACT LOCATION (COORDINATES)</th>
                        <th>NAME OF VESSEL</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->exact_location ?></td>
                        <td><?= $marsaf_mci->vessel_name ?></td>
                    </tr>
                    <tr>
                        <th>FLAG OF REGISTRY</th>
                        <th>IMO NUMBER (FOREIGN)</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->registry_flag ?></td>
                        <td><?= $marsaf_mci->foreign_imo_number ?></td>
                    </tr>
                    <tr>
                        <th>OFFICIAL NUMBER (DOMESTIC)</th>
                        <th>GT/NT</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->domestic_official_number ?></td>
                        <td><?= $marsaf_mci->gt_nt ?></td>
                    </tr>
                    <tr>
                        <th>NAME OF OWNER/COMPANY</th>
                        <th>OWNER/COMPANY ADDRESS</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->company_name ?></td>
                        <td><?= $marsaf_mci->company_address ?></td>
                    </tr>
                    <tr>
                        <th>CAPTAINS NAME</th>
                        <th>NUMBER OF CREW AND ITS NATIONALITY</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->captain_name ?></td>
                        <td><?= $marsaf_mci->crew_nationality_number ?></td>
                    </tr>
                    <tr>
                        <th>NUMBER OF PASSENGER (IF ANY)</th>
                        <th>CARGOES ONBOARD (IF ANY)</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->passenger_number ?></td>
                        <td><?= $marsaf_mci->cargoe_onboard ?></td>
                    </tr>
                    <tr>
                        <th>PORT OF ORIGIN</th>
                        <th>DATE OF DEPARTURE FROM PORT OF ORIGIN</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->port_origin ?></td>
                        <td><?= date('F d, Y', strtotime($marsaf_mci->departure_date_from_port_origin)) ?></td>
                    </tr>
                    <tr>
                        <th>TIME OF DEPARTURED FROM PORT OF ORIGIN</th>
                        <th>DATE AND TIME OF INCIDENT</th>
                    </tr>
                    <tr>
                        <td><?= date("H:i",strtotime($marsaf_mci->departure_time_from_port_origin ?? 0)) ?></td>
                        <td><?= date('F d, Y', strtotime($marsaf_mci->incident_time)) ?></td>
                    </tr>
                    <tr>
                        <th>NATURE OF MARITIME CASUALTY </th>
                        <th>CAUSE OF INCIDENT</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $maritime_cas = explode(",",$marsaf_mci->maritime_casualty_nature); $j=0;   ?>
                            <?php for($i=0; $i <count($maritime_casualty_nature); $i++): ?>
                            <?php if(isset($maritime_cas[$j]) && $maritime_cas[$j] == $maritime_casualty_nature[$i]->id):?>
                            <?= $maritime_casualty_nature[$i]->maritime_casualty_nature; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $incident_ = explode(",",$marsaf_mci->incident_cause); $j=0;   ?>
                            <?php for($i=0; $i <count($incident_cause); $i++): ?>
                            <?php if(isset($incident_[$j]) && $incident_[$j] == $incident_cause[$i]->id):?>
                            <?= $incident_cause[$i]->incident_cause; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>CONSEQUENCES OF INCIDENT</th>
                        <th>SEVERITY OF MARITIME CASUALTY/INCIDENT</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $incident_ = explode(",",$marsaf_mci->incident_consequences); $j=0;   ?>
                            <?php for($i=0; $i <count($incident_consequences); $i++): ?>
                            <?php if(isset($incident_[$j]) && $incident_[$j] == $incident_consequences[$i]->id):?>
                            <?= $incident_consequences[$i]->incident_consequences; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td>
                            <?php $maritime_i = explode(",",$marsaf_mci->maritime_incident_severity); $j=0;   ?>
                            <?php for($i=0; $i <count($maritime_incident_severity); $i++): ?>
                            <?php if(isset($maritime_i[$j]) && $maritime_i[$j] == $maritime_incident_severity[$i]->id):?>
                            <?= $maritime_incident_severity[$i]->maritime_incident_severity; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <tr>
                        <th>IF VERY SERIOUS MC, WHAT IS THE CATEGORY?</th>
                        <th>NAME OF SHIPS INVOLVED (IF ANY)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $very_seri = explode(",",$marsaf_mci->very_serious_mc_category); $j=0;   ?>
                            <?php for($i=0; $i <count($very_serious_mc_category); $i++): ?>
                            <?php if(isset($very_seri[$j]) && $very_seri[$j] == $very_serious_mc_category[$i]->id):?>
                            <?= $very_serious_mc_category[$i]->very_serious_mc_category; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                        <td><?= $marsaf_mci->ship_name_involved ?></td>
                    </tr>
                    <tr>
                        <th>FLAG OF REGISTRY</th>
                        <th>IMO NUMBER (FOREIGN)</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->registry_flag_2 ?></td>
                        <td><?= $marsaf_mci->foreign_imo_number_2 ?></td>
                    </tr>
                    <tr>
                        <th>OFFICIAL NUMBER (DOMESTIC)</th>
                        <th>TYPE OF VESSEL</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->domestic_official_number_2 ?></td>
                        <td><?= $marsaf_mci->vessel_type ?></td>
                    </tr>
                    <tr>
                        <th>GT/NT</th>
                        <th>NAME OF OWNER/COMPANY</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->gt_nt_2 ?></td>
                        <td><?= $marsaf_mci->company_name_2 ?></td>
                    </tr>
                    <tr>
                        <th>OWNER/COMPANY ADDRESS</th>
                        <th>CAPTAINS NAME</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->company_address_2 ?></td>
                        <td><?= $marsaf_mci->captain_name_2 ?></td>
                    </tr>
                    <tr>
                        <th>NUMBER OF CREW AND ITS NATIONALITY</th>
                        <th>NUMBER OF PASSENGER (IF ANY)</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->crew_nationality_number_2 ?></td>
                        <td><?= $marsaf_mci->passenger_number_2 ?></td>
                    </tr>
                    <tr>
                        <th>CARGOES ONBOARD (IF ANY)</th>
                        <th>PORT OF ORIGIN</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->cargoe_onboard_2 ?></td>
                        <td><?= $marsaf_mci->port_origin_2 ?></td>
                    </tr>
                    <tr>
                        <th>DATE OF DEPARTURE FROM PORT OF ORIGIN</th>
                        <th>TIME OF DEPARTURE FROM PORT OF ORIGIN</th>
                    </tr>
                    <tr>
                        <td><?=date('F d, Y', strtotime($marsaf_mci->departure_date_from_port_origin_2)) ?></td>
                        <td><?= $marsaf_mci->departure_hour_from_port_origin_2.':'.$marsaf_mci->departure_minute_from_port_origin_2 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>TOTAL NUMBER OF INJURED PERSON/S</th>
                        <th>TOTAL NUMBER OF DEATH/S</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->total_injured_person ?></td>
                        <td><?= $marsaf_mci->total_death ?>
                        </td>
                    </tr>
                    <tr>
                        <th>TOTAL NUMBER OF MISSING PERSON/S</th>
                        <th>TOTAL NUMBER OF SURVIVOR/S</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mci->total_missing_person ?></td>
                        <td><?= $marsaf_mci->total_survivor ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">SAFETY RECOMMENDATIONS</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $marsaf_mci->safety_recommendation ?></td>
                        </td>
                    </tr>


                    <?php elseif($marsaf->report_type_id==9):?>
                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <tr>
                        <th>NAME OF SALVOR</th>
                        <th>TYPE OF APPLICATION</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_so->salvor_name ?></td>
                        <td>
                            <?php $app = explode(",",$marsaf_so->application_type); $j=0;   ?>
                            <?php for($i=0; $i <count($application_type); $i++): ?>
                            <?php if(isset($app[$j]) && $app[$j] == $application_type[$i]->id):?>
                            <?= $application_type[$i]->application_type; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>
                    <tr>
                        <th>EXACT LOCATION (COORDINATES)</th>
                        <th>PURPOSE OF SALVAGE OPERATION</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_so->exact_location ?></td>
                        <td>
                            <?php $purpose = explode(",",$marsaf_so->purpose); $j=0;   ?>
                            <?php for($i=0; $i <count($salvage_operation_purpose); $i++): ?>
                            <?php if(isset($purpose[$j]) && $purpose[$j] == $salvage_operation_purpose[$i]->id):?>
                            <?= $salvage_operation_purpose[$i]->salvage_operation_purpose; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <?php elseif($marsaf->report_type_id==10):?>
                    <th colspan="2"><?= $marsaf->report_type; ?> DATA</th>

                    <tr>
                        <th>LOCATION</th>
                        <th>DATE OF APPLICATION</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mpramra->location ?></td>
                        <td><?= date('F d, Y', strtotime($marsaf_mpramra->application_date)) ?></td>
                    </tr>

                    <tr>
                        <th>EVENT ORGANIZER</th>
                        <th>MARITIME ACITIVITY/ IES </th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mpramra->event_organizer ?></td>
                        <td>
                            <?php $mariti = explode(",",$marsaf_mpramra->maritime_acitivity); $j=0;   ?>
                            <?php for($i=0; $i <count($maritime_acitivity); $i++): ?>
                            <?php if(isset($mariti[$j]) && $mariti[$j] == $maritime_acitivity[$i]->id):?>
                            <?= $maritime_acitivity[$i]->maritime_acitivity; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <tr>
                        <th>DATE OF DEPARTURE FROM PORT OF ORIGIN</th>
                        <th>TIME OF DEPARTURE FROM PORT OF ORIGIN</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y', strtotime($marsaf_mpramra->departure_date_from_origin_port ?? 0))  ?>
                        </td>
                        <td><?= $marsaf_mpramra->departure_hour_from_origin_port.':'.$marsaf_mpramra->departure_minutefrom_origin_port ?>
                        </td>
                    </tr>

                    <tr>
                        <th>POINT OF ORIGIN (COORDINATES)</th>
                        <th>POINT OF DESTINATION (COORDINATES)</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mpramra->origin_point ?></td>
                        <td><?= $marsaf_mpramra->destination_point ?? null ?></td>
                    </tr>
                    <tr>
                        <th>IS THERE ANY VESSEL INVOLVED?</th>
                        <th>HOW MANY VESSEL INVOLVED?</th>
                    </tr>
                    <tr>
                        <td><?= $marsaf_mpramra->involved_vessel ?? null ?></td>
                        <td><?= $marsaf_mpramra->mpramra_involved_vessel_total ?? null ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">VIOLATIONS (IF ANY)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $mpramra_m = explode(",",$marsaf_mpramra->mpramra_maritime_related_violation); $j=0;   ?>
                            <?php for($i=0; $i <count($maritime_related_violation); $i++): ?>
                            <?php if(isset($mpramra_m[$j]) && $mpramra_m[$j] == $maritime_related_violation[$i]->id):?>
                            <?= $maritime_related_violation[$i]->maritime_related_violation; ?></br>
                            <?php $j++; endif ?>
                            <?php endfor ?>
                        </td>
                    </tr>

                    <?php endif ?>

                </table>
            </div>
        </div>

    </div>
</div>