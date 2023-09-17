<!-- ==============================
        Required JS Files
    =============================== -->
<script>
var BASE_URL = "<?php echo base_url() ?>";
</script>
<?php $current_page = $this->uri->segment(1); ?>
<!-- ===== jQuery ===== -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
<!-- ===== Custom JavaScript ===== -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<!-- ===== Plugin JS ===== -->
<!-- start - This is for export functionality only -->
<script src="<?= site_url() ?>assets/plugins/components/datatables/jquery.dataTables.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/moment/min/moment.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/dataTables.dateTime.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/components/datatables/Buttons-1.6.1/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<!-- ===== Style Switcher JS ===== -->
<script src="<?php echo base_url(); ?>assets/plugins/components/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/components/chartist-js/dist/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/components/morrisjs/morris.js"></script>
<script src='<?php echo base_url(); ?>assets/plugins/components/moment/moment.js'></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?php echo base_url(); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/owl.carousel/owl.custom.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

<?php if($current_page == 'dashboard' || $current_page == 'marep' || $current_page == 'marsaf' || $current_page == 'marsar' || $current_page == 'marslec' || $current_page == 'urban_marsar'): ?>
<script src="<?php echo base_url(); ?>assets/js/chart.js"></script>
<?php endif ?>


<script>
$('a.closed').on('click', function() {
    $('div.myadmin-alert').hide()
})
</script>