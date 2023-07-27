<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h5 mb-4 font-weight-bold" style="color: #298505;"><?= $title; ?></h1>
    <?php
    if ($content) {
        $this->load->view($content);
    }
    ?>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->