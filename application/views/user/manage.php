<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title"><?php echo $page_title; ?></h3>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-inline pull-right">
                            <li>
                                <?php if($this->session->userdata('role') != 'staff'): ?>
                                <div class="card-tools">
                                    <a href="#adduser" data-toggle="modal"
                                        class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                                        <i class="fa fa-plus"></i>
                                        User
                                    </a>
                                </div>
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Station</th>
                                <th>Substation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($user as $row): ?>
                            <?php 
                                $name = $row->first_name . " " . $row->last_name; 
                                $role = $this->user_role_model->get_user_role($row->role);  
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><img class="img-circle m-r-10"
                                        src="<?= !empty($row->profile_picture) ? site_url('assets/uploads/avatar/').$row->profile_picture : site_url('assets/img/cgdnm-logo.png') ?>"
                                        alt="profile" width="30"><?= ucwords($name) ?></td>
                                <td><?= $row->username ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $role["text"] ?></td>
                                <td><?= $row->station ?></td>
                                <td><?= $row->sub_station ?></td>
                                <td class=" text-nowrap">
                                    <a type="button" href="#edituser" data-toggle="modal" onclick="editUser(this)"
                                        title="Edit User" data-id="<?= $row->user_id ?>"
                                        data-username="<?= $row->username ?>" data-firstname="<?= $row->first_name ?>"
                                        data-lastname="<?= $row->last_name ?>" data-email="<?= $row->email ?>"
                                        data-user-role="<?= $role["user_role_id"] ?>"
                                        data-station="<?= $row->station_id ?>"
                                        data-substation="<?= $row->sub_station_id ?>" class="m-r-10">
                                        <i class="fa fa-pencil text-inverse"></i></a>
                                    <a type="button" href="#changePassword" data-toggle="modal"
                                        onclick="changePassword(this)" data-id="<?= $row->user_id ?>"
                                        data-toggle="tooltip" data-original-title="Change Password" class="m-r-10">
                                        <i class="fa fa-user-secret text-info"></i> </a>
                                    <?php if($this->session->userdata('role') != 'staff' && $this->session->userdata('user_id') != $row->id): ?>
                                    <a href="<?= site_url('user/delete/').$row->user_id ?>"
                                        onclick="return confirm('Are you sure you want to delete this user?');"
                                        data-toggle="tooltip" data-original-title="Remove"> <i
                                            class="fa fa-trash text-danger"></i>
                                    </a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $no++; endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
            </div>
            <form method="post" action="<?= site_url('user/save') ?>" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" required=""
                                    placeholder="Enter Firstname">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname" required=""
                                    placeholder="Enter Lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                                    placeholder="Enter Username">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="exampleInputPassword1" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" required="" name="user_role_id" id="user-role">
                                    <option disabled="" selected="">Select</option>
                                    <?php foreach($user_role as $row): ?>
                                    <option value="<?= $row->user_role_id ?>"><?= $row->text ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Station</label>
                                        <select class="form-control" name="station" id="user_station">
                                            <option disabled="" selected="">Select</option>
                                            <?php foreach($station as $row): ?>
                                            <option value="<?= $row->station_id ?>"><?= $row->station ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Sub-station</label>
                                        <select class="form-control" name="substation" id="user_substation">
                                            <option disabled="" selected="">Select</option>
                                            <?php foreach($sub_station as $row): ?>
                                            <option value="<?= $row->sub_station_id ?>"><?= $row->sub_station ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Profile Picture</label>
                        <input type="file" class="form-control" accept="image/*" name="profilepic"
                            id="exampleInputEmail1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            </div>
            <form method="post" action="<?= site_url('user/update') ?>" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter Username" readonly>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" id="fname" required=""
                            placeholder="Enter Firstname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lname" required=""
                            placeholder="Enter Lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" required="" name="user_role_id" id="user-role1">
                            <option disabled="" selected="">Select</option>
                            <?php foreach($user_role as $row): ?>
                            <option value="<?= $row->user_role_id ?>"><?= $row->text ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Station</label>
                        <select class="form-control" name="station" id="user_station1">
                            <option disabled="" selected="">Select</option>
                            <?php foreach($station as $row): ?>
                            <option value="<?= $row->station_id ?>"><?= $row->station ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub-station</label>
                        <select class="form-control" name="substation" id="user_substation1">
                            <option disabled="" selected="">Select</option>
                            <?php foreach($sub_station as $row): ?>
                            <option value="<?= $row->sub_station_id ?>"><?= $row->sub_station ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="user_id" id="user_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <form method="POST" action="<?= site_url() ?>change_password">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>