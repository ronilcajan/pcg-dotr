<div class="container-fluid">
    <div class="text-right m-b-10">
        <a href="<?= site_url('marep/edit_marep/').$marsar->id ?>" class="btn btn-info btn-outline" type="button">
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
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2"><?= $marsar->maritime_incident_type ?></th>
                    </tr>
                    <tr>
                        <th colspan="2">CAUSE OF INCIDENT</th>
                    </tr>
                    <tr>
                        <?php $cause = explode(",",$marsar->incident_cause); $i=0;  ?>
                        <td colspan="2">
                            <?php foreach($incident_cause as $row): ?>
                            <?php if(isset($cause[$i]) && $row->id == $cause[$i]): ?>
                            <?= $row->incident_cause ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="border-top-0">
                            DATE TIME GROUP
                        </th>
                    </tr>
                    <tr>
                        <th>DATE</th>
                        <th>TIME</th>
                    </tr>
                    <tr>
                        <td><?= date('F d, Y', strtotime($marsar->date_created)) ?> </td>
                        <td><?= date('h:i A', strtotime($marsar->date_created)) ?> </td>
                    </tr>

                    <tr>
                        <th colspan="2">LOCATION OF INCIDENT</th>
                    </tr>
                    <tr>
                        <th colspan="2">Details on the location of incident. (latitude, longitude, distance from point
                            of reference,
                            compass bearing on the point of reference) </th>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $marsar->location_incident_location ?> </td>
                    </tr>
                    <tr>
                        <th colspan="2">Google Map Locator </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php if($marsar->google_map_location): ?>
                            <img class="img-fluid m-b-10 m-t-10 m-l-20"
                                src="<?= site_url('assets/uploads/').$marsar->google_map_location ?>" width="100"
                                alt="">
                            <?php endif ?>
                        </td>
                    </tr>
                </table>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="3">CASUALTY REPORT</th>
                    </tr>
                    <tr>
                        <th>NUMBER OF SURVIVORS </th>
                        <th>NUMBER OF CASUALTIES </th>
                        <th>NUMBER OF MISSING
                        </th>
                    </tr>
                    <tr>
                        <td><?= $marsar->survivor_number ?></td>
                        <td><?= $marsar->casualty_number ?></td>
                        <td><?= $marsar->missing_number ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">MATERIAL REPORT</th>
                    </tr>
                    <tr>
                        <?php $report = explode(",",$marsar->material_report); $i=0;  ?>
                        <td colspan="3">
                            <?php foreach($material_report as $row): ?>
                            <?php if(isset($report[$i]) && $row->id == $report[$i]): ?>
                            <?= $row->material_report ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">Extent of Damage of Vessel</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $marsar->description_extend_vessel_damage ?></td>
                    </tr>
                </table>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th>Provide Brief Description on the extent of damage of Vessel.</th>
                    </tr>

                    <tr>
                        <th>ACTION TAKEN</th>
                    </tr>
                    <tr>
                        <th>ASSET DEPLOYMENT</th>
                    </tr>
                    <tr>
                        <?php $depl = explode(",",$marsar->asset_deployment); $i=0;  ?>
                        <td colspan="3">
                            <?php foreach($asset_deployment as $row): ?>
                            <?php if(isset($depl[$i]) && $row->id == $depl[$i]): ?>
                            <?= $row->asset_deployment ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th>HOW WAS THE INCIDENT REPORTED</th>
                    </tr>
                    <tr>
                        <th>INFORMATION ACQUIRED THRU</th>
                    </tr>
                    <tr>
                        <?php $info = explode(",",$marsar->information_acquired_thru); $i=0;  ?>
                        <td colspan="3">
                            <?php foreach($information_acquired_thru as $row): ?>
                            <?php if(isset($info[$i]) && $row->id == $info[$i]): ?>
                            <?= $row->information_acquired_thru ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th>RESPONSE TIME</th>
                    </tr>
                    <tr>
                        <th>TIME OF DEPLOYMENT OF ASSET</th>
                    </tr>
                    <tr>
                        <?php $time = explode(",",$marsar->time_assets_deployment); $i=0;  ?>
                        <td colspan="3">
                            <?php foreach($time_assets_deployment as $row): ?>
                            <?php if(isset($time[$i]) && $row->id == $time[$i]): ?>
                            <?= $row->time_assets_deployment ?><br>
                            <?php $i++; endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <th>FORMAL PCG REPORT</th>
                    </tr>
                </table>
                <table class="table table-borderless table-border-bottom">
                    <tr>
                        <th colspan="2">FORMAL PCG REPORT</th>
                    </tr>
                    <tr>
                        <th>RADIO MESSAGE SPOT REPORT</th>
                    </tr>
                    <tr>
                        <td>
                            <?php if($marsar->radio_message_spot_report): ?>
                            <a target="_blank" href="
                                        <?= site_url('assets/uploads/').$marsar->radio_message_spot_report ?>">
                                <?= site_url('assets/uploads/').$marsar->radio_message_spot_report ?>
                            </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <th>PHOTOGRAPHS</th>
                    </tr>
                    <tr>
                        <td>
                            <?php if($marsar->photograph): ?>
                            <img class="img-fluid m-b-10" src="<?= site_url('assets/uploads/').$marsar->photograph ?>"
                                width="100" alt="">
                            <?php endif ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>