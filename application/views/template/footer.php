<?php
$sql = $this->db->query("SELECT * FROM `system` WHERE id=1");
$ss = $sql->row();
?>
<footer class="footer t-a-c">
    Copyright © <?php echo date('Y'); ?> <?= $ss->system_name ? $ss->system_name : 'PCG-DOTR' ?> | Built with <span
        class="fa fa-heart text-danger"></span> by <a href="https:/ronilcajan.com" target="_blank">Ron</a>
    and <a href="https://www.facebook.com/profile.php?id=100006745398153" target="_blank">Cris</a>. All rights
    reserved.
</footer>