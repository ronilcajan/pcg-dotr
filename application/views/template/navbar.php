<?php
$sql = $this->db->query("SELECT * FROM `system` WHERE id=1");
$ss = $sql->row();
?>
<!-- ===== Top-Navigation ===== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
            data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="<?= base_url()?> ">
                <b>
                    <img width="40"
                        src="<?= $ss->system_logo ? site_url('assets/uploads/').$ss->system_logo : base_url('assets/img/logo.png') ?>"
                        alt="home" />
                </b>
                <span>
                    <?= $ss->system_name2 ? $ss->system_name2 : 'PCG-DOTR' ?>
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i
                        class="icon-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>
</nav>
<!-- ===== Top-Navigation-End ===== -->