<div class="container-fluid">
    <div class="white-box">
        <h3 class="box-title">MARINE ENVIRONMENTAL PROTECTION REPORT LISTS</h3>
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
                                    <?php foreach($station as $row){?>
                                    <option value="<?php echo $row->station_id ?>"><?php echo $row->station ?></option>
                                    <?php } ?>
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
    <div class="white-box">
        <table class="table  table-responsive table-bordered" id="marefTable">
            <thead class="thead-inverse">
                <tr>
                    <th>CGDNM SELECTIONS</th>
                    <th>SUB-STATIONS</th>
                    <th>REPORT TYPE</th>
                    <th>ACTIVITY DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($marep_list as $row): ?>
                <tr>
                    <td><?= $row->station ?></td>
                    <td><?= $row->sub_station ?></td>
                    <td><?= $row->report_selection ?></td>
                    <td><?= date('F d, Y - h:i a',strtotime($row->date_created)) ?></td>
                    <td> <a title="View" class="text-info" href="<?= site_url('marep/view_marep/').$row->id ?>"><i
                                class="fa fa-eye"></i></a>
                        <a title="Edit" class="text-success" href="<?= site_url('marep/edit_marep/').$row->id ?>"><i
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