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
                                <?= strtoupper(str_replace($wordsToRemove, '',$marep->station)) ?></strong><br>
                            <?= $marep->station_address ?><br>
                            <strong>
                                <?= strtoupper($marep->sub_station) ?></strong><br>
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
                    <table class="table table-borderless table-border-bottom">
                        <tr>
                            <th colspan="2">
                                <h3><strong><?php echo $marep->report_selection; ?></strong></h3>
                            </th>
                        </tr>
                        <tr>
                            <th>DTG</th>
                            <th>TIME</th>
                        </tr>
                        <tr>
                            <td><?php echo date('F d, Y', strtotime($marep->date_created)) ?></td>
                            <td><?php echo date('H:i', strtotime($marep->date_created)) ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Location</th>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $marep->location; ?></td>
                        </tr>
                        <tr>
                            <th>CONDUCT OF ACTIVITY</th>
                            <th>PARTICIPATING AGENCIES</th>
                        </tr>


                        <tr>

                            <td>
                                <?php if($marep->activity_conduct): ?>
                                <?php echo $this->activity_conduct_model->get($marep->activity_conduct)->activity_conduct; ?>
                                <?php endif ?>
                            </td>

                            <td>
                                <?php if($marep->participating_agency): ?>
                                <?php 
                                $agency = explode(",",$marep->participating_agency);  
                                foreach($agency as $id){
                                    $participating_agency[] =  $this->participating_agency_model->get($id)->participating_agency; 
                                } 
                                echo implode(', ', $participating_agency);
                            ?>
                                <?php endif ?>
                            </td>
                        </tr>

                        <tr>
                            <th>NUMBER OF PARTICIPANTS</th>
                            <th>AREA COVERAGE</th>
                        </tr>
                        <tr>
                            <td><?php echo $marep->participant_number; ?></td>
                            <td><?php echo $marep->area_coverage; ?></td>
                        </tr>
                        <tr>
                            <th>TYPES OF GARBAGE COLLECTED</th>
                            <th>VOLUME OF GARBAGE COLLECTED</th>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                            if($marep->garbage_type_collected){
                                $volume = explode(",",$marep->garbage_type_collected);  
                                foreach($volume as $id){
                                    $garbage_type_collected[] =  $this->garbage_type_collected_model->get($id)->garbage_type_collected; 
                                } 
                                echo implode(', ', $garbage_type_collected);
                            }
                            ?>
                            </td>
                            <td><?php echo $marep->garbage_collected_volume; ?> sacks</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>