<?php $current_page = $this->uri->segment(2); ?>
<!-- ===== Left-Sidebar ===== -->
<aside class="sidebar" role="navigation">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="<?= $_SESSION['profile_picture'] ? site_url('assets/uploads/avatar/').$_SESSION['profile_picture'] : base_url('assets/img/cgdnm-logo.png') ?>"
                        alt="user-img" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown"
                        role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-success">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?= site_url('signout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 m-b-0 font-16"><a href="javascript:void(0);">
                        <?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?></a></p>
                <p class="profile-text m-b-0 font-14"><a href="javascript:void(0);">
                        <?= $_SESSION['station'] ? $_SESSION['station'] : null ?>
                        <?= $_SESSION['sub_station'] ? '- '.$_SESSION['sub_station'] : null ?></a>
                </p>
                <p class="profile-text font-12"><a href="javascript:void(0);">
                        <?= $_SESSION['role'] ?></a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li>
                    <a href="<?= site_url('dashboard') ?>" aria-expanded="false"><i
                            class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> DASHBOARD</span></a>
                </li>
                <li>
                    <a href="<?= site_url('forecast') ?>" aria-expanded="false"><i
                            class="icon-social-soundcloud fa-fw"></i> <span class="hide-menu"> FORECAST</span></a>
                </li>
                <li class="<?= $current_page == 'edit_marep' || $current_page == 'view_marep' ? 'active' : null ?>">
                    <a class="waves-effect" aria-expanded="false"><i class="icon-anchor fa-fw"></i>
                        <span class="hide-menu"> MAREP</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li><a href="<?= site_url('marep') ?>">MAREP CHART</a></li> -->
                        <li><a href="<?= site_url('marep/marep_list') ?>"
                                class="<?= $current_page == 'edit_marep' || $current_page == 'view_marep' ? 'active' : null ?>">MAREP
                                LIST</a></li>
                        <li><a href="<?= site_url('add_marep') ?>">ADD MAREP</a></li>
                    </ul>
                </li>
                <li class="<?= $current_page == 'edit_marsaf' || $current_page == 'view_marsaf' ? 'active' : null ?>">
                    <a class="waves-effect" aria-expanded="false"><i class="icon-anchor fa-fw"></i> <span
                            class="hide-menu"> MARSAF</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= site_url('marsaf/marsaf_list') ?>"
                                class="<?= $current_page == 'edit_marsaf' || $current_page == 'view_marsaf' ? 'active' : null ?>">MARSAF
                                LIST</a></li>
                        <li><a href="<?= site_url('add_marsaf') ?>">ADD MARSAF</a></li>
                    </ul>
                </li>
                <li class="<?= $current_page == 'edit_marsar' || $current_page == 'view_marsar' ? 'active' : null ?>">
                    <a class="waves-effect" aria-expanded="false"><i class="icon-anchor fa-fw"></i> <span
                            class="hide-menu"> MARSAR</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= site_url('marsar') ?>"
                                class="<?= $current_page == 'edit_marsar' || $current_page == 'view_marsar' ? 'active' : null ?>">MARSAR
                                LIST</a></li>
                        <li><a href="<?= site_url('add_marsar') ?>">ADD MARSAR</a></li>
                    </ul>
                </li>
                <li class="<?= $current_page == 'edit_marslec' || $current_page == 'view_marslec' ? 'active' : null ?>">
                    <a class="waves-effect" aria-expanded="false"><i class="icon-anchor fa-fw"></i> <span
                            class="hide-menu"> MARSLEN</span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="<?= site_url('marslec') ?>"
                                class="<?= $current_page == 'edit_marslec' || $current_page == 'view_marslec' ? 'active' : null ?>">MARSLEN
                                LIST</a></li>
                        <li><a href="<?= site_url('add_marslec') ?>">ADD MARSLEN</a></li>
                    </ul>
                </li>
                <li
                    class="<?= $current_page == 'edit_urban_marsar' || $current_page == 'view_urban_marsar' ? 'active' : null ?>">
                    <a class="waves-effect" aria-expanded="false"><i class="icon-anchor fa-fw"></i> <span
                            class="hide-menu">URBAN MARSAR</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= site_url('urban_marsar') ?>"
                                class="<?= $current_page == 'edit_urban_marsar' || $current_page == 'view_urban_marsar' ? 'active' : null ?>">URBAN
                                MARSAR LIST</a></li>
                        <li><a href="<?= site_url('add_urban_marsar') ?>">ADD URBAN MARSAR</a></li>
                    </ul>
                </li>
                <?php if($this->session->userdata('role') == 'admin'): ?>
                <li>
                    <a href="<?= site_url('substation') ?>" aria-expanded="false"><i class="fa fa-building-o fa-fw"></i>
                        <span class="hide-menu">SUBSTATION</span></a>
                </li>
                <?php endif ?>
                <?php if($this->session->userdata('role') == 'super-admin'): ?>
                <li>
                    <a class="waves-effect" aria-expanded="false"><i class="fa fa-building-o fa-fw"></i> <span
                            class="hide-menu">STATION</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= site_url('station') ?>">STATION</a></li>
                        <li><a href="<?= site_url('substation') ?>">SUBSTATION</a></li>
                    </ul>
                </li>
                <?php endif ?>
                <!-- <li>
                    <a href="user" aria-expanded="false"><i class="icon-user fa-fw"></i> <span class="hide-menu">
                            User</span></a>
                </li> -->
                <li>
                    <a class="waves-effect" aria-expanded="false"><i class="icon-user fa-fw"></i> <span
                            class="hide-menu">USER</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= site_url('user') ?>">USERS</a></li>
                        <?php if($this->session->userdata('role') == 'super-admin'): ?>
                        <li><a href="<?= site_url('user_role') ?>">ROLES</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('settings') ?>" aria-expanded="false"><i class="fa fa-gear fa-fw"></i>
                        <span class="hide-menu">SETTINGS</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->