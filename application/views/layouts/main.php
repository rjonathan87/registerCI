<?php
if ($this->session->userdata('login')) {
    ?>

<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/head.php');?>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">


            <?php $this->load->view('layouts/leftnav.php');?>


            <?php $this->load->view('layouts/topnav.php');?>


            <div class="right_col" role="main">
                <div class="">
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Main content -->
                        <section class="content">
                            <?php if (isset($_view) && $_view) {
        $this->load->view($_view);
    }

    if (isset($_frms)) {
        $this->load->view($_frms);
    }?>
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>


            <footer>
                <div class="pull-right">

                </div>
                <div class="clearfix"></div>
            </footer>

        </div>
    </div>
    <input type="hidden" id="base_url" value="<?php echo base_url('/index.php/'); ?>" />
    <input type="hidden" id="site_url" value="<?php echo base_url(); ?>" />

    <?php $this->load->view("layouts/scripts.php");?>

</body>

</html>


<?php
} else {
    redirect(site_url("login/login"));
}
?>