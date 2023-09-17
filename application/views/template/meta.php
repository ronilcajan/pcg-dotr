<?php
$sql = $this->db->query("SELECT * FROM `system` WHERE id=1");
$ss = $sql->row();
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />
<title><?php echo $page_title; ?> | <?= $ss->system_name ?></title>