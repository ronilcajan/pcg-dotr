<div class="container-fluid">
    <div class="white-box">
        <h3 class="box-title">MARITIME SEARCH AND RESCUE REPORT LISTS</h3>
    </div>
    <div class="white-box">
        <div class="row">
            <div class="col-md-12">
                <form id="marsar-filter-form">
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
                                <button id="filter-marsar-chart-btn" class="btn btn-primary"> <i
                                        class="icon-magnifier"></i> Search</button>
                            </span>
                        </div>
                    </div>
                </form>
                <div id="marsar-chart"></div>
            </div>
        </div>
    </div>
    <div class="white-box">
        <table class="table  table-responsive table-bordered" id="marsarTable">
            <thead class="thead-inverse">
                <tr>
                    <th>CGDNM SELECTIONS</th>
                    <th>SUB-STATIONS</th>
                    <th>TYPES OF MARITIME INCIDENT</th>
                    <th>ACTIVITY DATE</th>
                    <th>VIEW</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($marsar_list as $row): ?>
                <tr>
                    <td><?= $row->station ?></td>
                    <td><?= $row->sub_station ?></td>
                    <td><?= $row->maritime_incident_type ?></td>
                    <td><?= date('F d, Y - h:i a',strtotime($row->date_created)) ?></td>
                    <td>
                        <a title="View" class="text-info" href="<?= site_url('marsar/view_marsar/').$row->id ?>"><i
                                class="fa fa-eye"></i></a>
                        <a title="Edit" class="text-success" href="<?= site_url('marsar/edit_marsar/').$row->id ?>"><i
                                class="fa fa-pencil"></i></a>

                        <a title="Delete" class="text-danger"
                            onclick="return confirm('Are you sure you want to delete this data?');"
                            href="<?= site_url('marsar/delete/').$row->id ?>"><i class="fa fa-trash"></i>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>