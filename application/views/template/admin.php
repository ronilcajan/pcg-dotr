<!DOCTYPE html>
<html lang="en">

<head>
    <?php  
		$this->view('template/meta');;
		$this->view('template/css');  
	?>
</head>

<body class="mini-sidebar fix-sidebar fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <?php  
			$this->view('template/navbar');;
			$this->view('template/sidebar');  
		?>

        <!-- Page Content -->
        <div class="page-wrapper">
            <?php if($this->session->flashdata('errors') !== null): ?>
            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alertSuccess"
                style="display:block">
                <i class="icon-check"></i> <?= $this->session->flashdata('errors'); ?> <a href="#" class="closed">×</a>
            </div>
            <?php endif ?>

            <?php if($this->session->flashdata('message') !== null): ?>
            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alertSuccess"
                style="display:block">
                <i class="icon-check"></i> <?= $this->session->flashdata('message'); ?> <a href="#" class="closed">×</a>
            </div>
            <?php endif ?>

            <?= $content ?>


            <?php  $this->view('template/footer')  ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php  $this->view('template/js')  ?>
    <script>
    const showInputCheckboxes = document.querySelectorAll('.show-input-checkbox');
    const inputContainers = document.querySelectorAll('.input-container');

    showInputCheckboxes.forEach((checkbox, index) => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                inputContainers[index].style.display = 'block';
            } else {
                inputContainers[index].style.display = 'none';
            }
        });
    });
    </script>
</body>

</html>