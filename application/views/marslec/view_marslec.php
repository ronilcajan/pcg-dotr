<div class="container-fluid">
    <div class="text-right m-b-10">
        <a href="<?= site_url('marep/edit_marep/').$marslec->id ?>" class="btn btn-info btn-outline" type="button">
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
                        <th>CGDNM STATIONS</th>
                        <th> CAMIGUIN SUB-STATIONS</th>
                    </tr>
                    <tr>
                        <td><?= $marslec->station ?></td>
                        <td><?= $marslec->sub_station ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">TYPES OF MARITIME VIOLATIONS</th>
                    </tr>

                    <tr>
                        <th colspan="2">RA 10654 (FISHERY CODE OF THE PHILIPPINES)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra1 = explode(",",$marslec->ra_10654); $i=0;  ?>
                            <?php foreach($ra_10654 as $row): ?>
                            <?php if(isset($ra1[$i]) && $row->id == $ra1[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 9165 (COMPREHENSIVE DANGEROUS DRUGS ACT OF 2022)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra2 = explode(",",$marslec->ra_9165); $i=0;  ?>
                            <?php foreach($ra_9165 as $row): ?>
                            <?php if(isset($ra2[$i]) && $row->id == $ra2[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 10591 (COMPREHENSIVE LAW ON FIREARMS AND AMMUNITION REGULATION ACT</th>
                    </tr>
                    <tr>
                        <td colspan="2">

                            <?php $ra3 = explode(",",$marslec->ra_10591); $i=0; ?>
                            <?php foreach($ra_10591 as $row): ?>
                            <?php if(isset($ra3[$i]) && $row->id == $ra3[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 9208 (ANTI TRAFFICKING IN PERSON ACT OF 2003)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra4 = explode(",",$marslec->ra_9208); $i=0;  ?>
                            <?php foreach($ra_9208 as $row): ?>
                            <?php if(isset($ra4[$i]) && $row->id == $ra4[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 9147 (WILDLIFE RESOURCES CONSERVATION AND PROTECTION ACT)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra5 = explode(",",$marslec->ra_9147); $i=0;  ?>
                            <?php foreach($ra_9147 as $row): ?>
                            <?php if(isset($ra5[$i]) && $row->id == $ra5[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">PD NO. 705 (REVISED FORESTRY CODE OF THE PHILIPPINES)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $pd1 = explode(",",$marslec->pd_no_705); $i=0;  ?>
                            <?php foreach($pd_no_705 as $row): ?>
                            <?php if(isset($pd1[$i]) && $row->id == $pd1[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 1937 (TARIFF AND CUSTOMS CODE ON ILLEGAL ACTS)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra6 = explode(",",$marslec->ra_1937); $i=0;  ?>
                            <?php foreach($ra_1937 as $row): ?>
                            <?php if(isset($ra6[$i]) && $row->id == $ra6[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">PD No. 532 (ANTI-PIRACY AND ANTI-HIGHWAY ROBBERY LAW OF 1974) </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $pd2 = explode(",",$marslec->pd_no_532); $i=0;  ?>
                            <?php foreach($pd_no_532 as $row): ?>
                            <?php if(isset($pd2[$i]) && $row->id == $pd2[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 10066 (NATIONAL HERITAGE AT OF 2009)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra7 = explode(",",$marslec->ra_10066); $i=0;  ?>
                            <?php foreach($ra_10066 as $row): ?>
                            <?php if(isset($ra7[$i]) && $row->id == $ra7[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 6539 (ANTI CARNAPPING ACT 1972)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra8 = explode(",",$marslec->ra_6539); $i=0;  ?>
                            <?php foreach($ra_6539 as $row): ?>
                            <?php if(isset($ra8[$i]) && $row->id == $ra8[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">RA 10845 (ANTI AGRICULTURAL SMUGGLING ACT OF 2016)</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $ra9 = explode(",",$marslec->ra_10845); $i=0;  ?>
                            <?php foreach($ra_10845 as $row): ?>
                            <?php if(isset($ra9[$i]) && $row->id == $ra9[$i]): ?>
                            <?= $row->section ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">MARPOL VIOLATIONS</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $marpol = explode(",",$marslec->marpol_violation ?? 0); $i=0;  ?>
                            <?php foreach($marpol_violation as $row): ?>
                            <?php if(isset($marpol[$i]) && $row->id == $marpol[$i]): ?>
                            <?= $row->marpol_violation ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">MARITIME SECURITY OPERATIONS – SEABORNE PATROL</th>
                    </tr>
                    <tr>
                        <th>DTG</th>
                        <th>TIME</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y', strtotime($marslec->seaborne_patrol_date)) ?></td>
                        <td><?= date('h:i A', strtotime($marslec->seaborne_patrol_date)) ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">LOCATION</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $marslec->seaborne_patrol_location ?></td>
                    </tr>
                    <tr>
                        <th>CONDUCT OF ACTIVITY</th>
                        <th>NUMBER OF SEABORN PATROL CONDUCTED</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $seaborne = explode(",",$marslec->seaborne_patrol_activity_conduct ?? 0); $i=0;  ?>
                            <?php foreach($seaborne_patrol_activity_conduct as $row): ?>
                            <?php if(isset($seaborne[$i]) && $row->id == $seaborne[$i]): ?>
                            <?= $row->seaborne_patrol_activity_conduct ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                        <td><?= $marslec->seaborne_patrol_number_conduncted ?></td>
                    </tr>
                    <tr>
                        <th>MARITIME AREA COVERED (NAUTICAL MILE/s)</th>
                        <th>NUMBER OF HOURS CONDUCTED</th>
                    </tr>
                    <tr>
                        <td><?= $marslec->seaborne_patrol_area_covered ?></td>
                        <td><?= $marslec->seaborne_patrol_number_hour_conducted ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">MARITIME SECURITY OPERATIONS – SHORE PATROL</th>
                    </tr>
                    <tr>
                        <th colspan="2">DTG</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= date('F d, Y', strtotime($marslec->shore_patrol_date_started)) ?></td>
                    </tr>
                    <tr>
                        <th>TIME STARTED</th>
                        <th>TIME ENDED</th>
                    </tr>
                    <tr>
                        <td><?= date('h:i A', strtotime($marslec->shore_patrol_date_started)) ?></td>
                        <td><?= date('h:i A', strtotime($marslec->shore_patrol_date_ended)) ?></td>
                    </tr>
                    <tr>
                        <th>NUMBER OF SHORE PATROLS CONDUCTED </th>
                        <th>LENGTH OF COASTLINE COVERED (KMS)</th>
                    </tr>
                    <tr>
                        <td><?= $marslec->shore_patrol_number_conducted ?></td>
                        <td><?= $marslec->shore_patrol_coastline_covered_length ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">SEA MARSHALL</th>
                    </tr>
                    <tr>
                        <th colspan="2">DTG</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= date('F d, Y', strtotime($marslec->sea_marshall_date_started)) ?></td>
                    </tr>
                    <tr>
                        <th>TIME STARTED</th>
                        <th>TIME ENDED</th>
                    </tr>
                    <tr>
                        <td><?= date('h:i A', strtotime($marslec->sea_marshall_date_started)) ?></td>
                        <td><?= date('h:i A', strtotime($marslec->sea_marshall_date_ended)) ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">NUMBER OF K9 PANELLING CONDUCTED</th>
                    </tr>
                    <tr>
                        <th>DTG</th>
                        <th>TIME</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y', strtotime($marslec->panelling_conducted_date)) ?></td>
                        <td><?= date('h:i A', strtotime($marslec->panelling_conducted_date)) ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">FACILITIES</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $panel = explode(",",$marslec->panelling_conducted_facilities ?? 0); $i=0;  ?>
                            <?php foreach($panelling_conducted_facilities as $row): ?>
                            <?php if(isset($panel[$i]) && $row->id == $panel[$i]): ?>
                            <?= $row->panelling_conducted_facilities ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">TYPES OF K9 DEPLOYED</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $k9 = explode(",",$marslec->k9_deployed_type ?? 0); $i=0;  ?>
                            <?php foreach($k9_deployed_type as $row): ?>
                            <?php if(isset($k9[$i]) && $row->id == $k9[$i]): ?>
                            <?= $row->k9_deployed_type ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">DEPLOYMENT OF EOD</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $eod = explode(",",$marslec->eod_deployment ?? 0); $i=0;  ?>
                            <?php foreach($eod_deployment as $row): ?>
                            <?php if(isset($eod[$i]) && $row->id == $eod[$i]): ?>
                            <?= $row->eod_deployment ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>