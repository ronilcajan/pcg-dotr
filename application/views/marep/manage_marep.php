<div class="container-fluid">
    <div class="white-box">
        <h3 class="box-title">MARINE ENVIRONMENTAL PROTECTION REPORT CHART</h3>
    </div>
    <div class="white-box">
        <div class="row">
            <div class="col-md-12">
                <form id="marep-filter-form">
                    <div class="form-group">
                        <div class="input-group ">
                            <span class="input-group-btn">
                                <select name="station" id="station" class="form-control">
                                    <option value="">CGDNM STATIONS</option>
                                    <?php 
                                        foreach($station as $row){ 
                                    ?>
                                    <option value="<?php echo $row->station_id ?>"><?php echo $row->station ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <select name="sub_station" id="sub-station" class="form-control">
                                    <option value="">Sub Station</option>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <select name="year" class="form-control">
                                    <option value="">Year</option>
                                    <?php 
                                        $firstYear = (int)2018; 
                                        for($i=date('Y');$i>=$firstYear;$i--)
                                        {
                                            echo '
                                                <option value='.$i.'>'.$i.'</option>
                                            ';
                                        } 
                                    ?>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <select name="month" class="form-control">
                                    <option value="">Month</option>
                                    <?php 
                                        for($m=1; $m<=12; ++$m){ 
                                            echo '
                                                <option value="'.$m.'">'.date('F', mktime(0, 0, 0, $m, 1)).'</option> 
                                            ';
                                        }
                                    ?>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <button id="filter-marep-chart-btn" class="btn btn-primary"> <i
                                        class="icon-magnifier"></i> Search</button>
                            </span>
                        </div>
                    </div>
                </form>
                <div id="marep-chart"></div>
            </div>
        </div>
    </div>
</div>