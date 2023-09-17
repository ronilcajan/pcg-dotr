<div class="container-fluid">
    <!-- .row -->
    <div class="row">
        <?php if($this->session->userdata('role') == 'super-admin'): ?>
        <div class="col-md-6 col-sm-12 col-sx-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Coast Guard District</h3>
                <p class="text-muted m-b-30 font-13">
                </p>
                <form class="form-horizontal" method="post" action="<?= site_url('settings/updateDistrict') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <?php if($district->district_logo): ?>
                        <img class="img-fluid m-b-10" src="<?= site_url('assets/uploads/').$district->district_logo ?>"
                            width="100" alt="">
                        <?php endif ?>
                        <label class="col-md-12">District Logo</label>
                        <div class="col-md-12">
                            <input type="file" name="district_logo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">District Name</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="district_name"
                                value="<?= $district->district_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-number">District Contact Number <span class="help"> e.g.
                                "09123456789"</span></label>
                        <div class="col-md-12">
                            <input type="text" id="example-number" name="district_contact" class="form-control"
                                placeholder="Contact number" value="<?= $district->district_contact ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-email">District Email <span class="help"> e.g.
                                "example@gmail.com"</span></label>
                        <div class="col-md-12">
                            <input type="email" id="example-email" name="district_email" class="form-control"
                                placeholder="Email" value="<?= $district->district_email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Address</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="district_address"
                                rows="5"><?= $district->district_address ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-sx-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">System Information</h3>
                <p class="text-muted m-b-30 font-13">
                </p>
                <form class="form-horizontal" method="post" action="<?= site_url('settings/updateSystem') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <?php if($system->system_logo): ?>
                        <img class="img-fluid m-b-10" src="<?= site_url('assets/uploads/').$system->system_logo ?>"
                            width="100" alt="">
                        <?php endif ?>
                        <label class="col-md-12">System Logo</label>
                        <div class="col-md-12">
                            <input type="file" name="system_logo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">System Name</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="system_name"
                                value="<?= $system->system_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">System Name 2</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="system_name2"
                                value="<?= $system->system_name2 ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <?php endif ?>
        <?php if($this->session->userdata('role') == 'admin'): ?>
        <div class="col-md-8 col-sm-12 col-sx-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Station</h3>
                <p class="text-muted m-b-30 font-13">
                </p>
                <form class="form-horizontal" method="post" action="<?= site_url('settings/updateStation') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <?php if($station->station_logo): ?>
                        <img class="img-fluid m-b-10"
                            src="<?= site_url('assets/uploads/station/').$station->station_logo ?>" width="100" alt="">
                        <?php endif ?>
                        <label class="col-md-12">Station Logo</label>
                        <div class="col-md-12">
                            <input type="file" name="station_logo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Station Name</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="station_name"
                                value="<?=  $station->station ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-number">Station Contact Number <span class="help"> e.g.
                                "09123456789"</span></label>
                        <div class="col-md-12">
                            <input type="text" id="example-number" name="station_contact" class="form-control"
                                placeholder="Contact number" value="<?= $station->station_contact ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-email">Email <span class="help"> e.g.
                                "example@gmail.com"</span></label>
                        <div class="col-md-12">
                            <input type="email" id="example-email" name="station_email" class="form-control"
                                placeholder="Email" value="<?= $station->station_email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Address</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="station_address"
                                rows="5"><?= $station->station_address ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="white-box">
                <div class="text-center">
                    <h3 class="box-title m-b-0">DISTRICT </h3>
                </div>
                <div class="profile-widget">
                    <div class="profile-img">
                        <img src="<?= $district->district_logo ? site_url('assets/uploads/').$district->district_logo : base_url('assets/img/logo.png') ?>"
                            alt="user-img" class="img-circle" width="200">
                        <p class="m-t-10 m-b-5"><a href="javascript:void(0);"
                                class="profile-text font-22 font-semibold"><?= $district->district_name ?></a></p>
                        <span class="font-16">Contact Number: <a href="tel:<?= $district->district_contact ?>">
                                <?= $district->district_contact ?></a></span><br>
                        <span class="font-16">Email Address:
                            <a href="mailto:<?= $district->district_email ?>">
                                <?= $district->district_email ?></a></span>
                    </div>
                    <div class=" profile-info">
                        <div class="col-xs-12 col-md-12 b-r">
                            <h1 class="text-primary"><?= count($total_station) ?> </h1>
                            <span class="font-16">Station</span>
                        </div>
                    </div>
                    <div class="profile-detail font-15">
                        <p><?= $district->district_address ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if($this->session->userdata('role') == 'manager' || $this->session->userdata('role') == 'staff'): ?>
        <div class="col-md-8 col-sm-12 col-sx-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">SUB-STATION</h3>
                <p class="text-muted m-b-30 font-13">
                </p>
                <form class="form-horizontal" method="post" action="<?= site_url('settings/updateSubstation') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <?php if($sub_station->substation_logo): ?>
                        <img class="img-fluid m-b-10"
                            src="<?= site_url('assets/uploads/substation/').$sub_station->substation_logo ?>"
                            width="100" alt="">
                        <?php endif ?>
                        <label class="col-md-12">Sub-station Logo</label>
                        <div class="col-md-12">
                            <input type="file" name="substation_logo" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Sub-station Name</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="substation_name"
                                value="<?= $sub_station->sub_station ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-number">Sub-station Contact Number <span class="help">
                                e.g.
                                "09123456789"</span></label>
                        <div class="col-md-12">
                            <input type="text" id="example-number" name="substation_contact" class="form-control"
                                placeholder="Contact number" value="<?= $sub_station->substation_contact ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-email">Sub-station Email <span class="help"> e.g.
                                "example@gmail.com"</span></label>
                        <div class="col-md-12">
                            <input type="email" id="example-email" name="substation_email" class="form-control"
                                placeholder="Email" value="<?= $sub_station->substation_email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Sub-station Address</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="5"
                                name="substation_address"><?= $sub_station->substation_address ?></textarea>
                        </div>
                    </div>
                    <?php if($this->session->userdata('role') == 'manager'): ?>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                        </div>
                    </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="white-box">
                <div class="text-center">
                    <h3 class="box-title m-b-0">STATION </h3>
                </div>
                <div class="profile-widget">
                    <div class="profile-img">
                        <img src="<?= $station->station_logo ? site_url('assets/uploads/station').$sub_station->station_logo : base_url('assets/img/cgdnm-logo.png') ?>"
                            alt="user-img" class="img-circle" width="200">
                        <p class="m-t-10 m-b-5"><a href="javascript:void(0);"
                                class="profile-text font-22 font-semibold"><?= $sub_station->station ?></a></p>
                        <span class="font-16">Contact Number:
                            <?= $sub_station->station_contact ? '<a href="tel:"'. $sub_station->station_contact.'>'. $sub_station->station_contact.'</a>' : null ?></span><br>
                        <span class="font-16">Email Address:
                            <?= $sub_station->station_email ? '<a href="mailto:"'. $sub_station->station_email.'>'. $sub_station->station_email.'</a>' : null ?></span>
                    </div>
                    <div class="profile-info">
                        <div class="col-xs-12 col-md-12 b-r">
                            <h1 class="text-primary"><?= count($total_sub_station) ?> </h1>
                            <span class="font-16">Sub-Station</span>
                        </div>
                    </div>
                    <div class="profile-detail font-15">
                        <p><?= $sub_station->station_address ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>