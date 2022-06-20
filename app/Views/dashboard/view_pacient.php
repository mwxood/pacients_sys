<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
    </div>



<?php if(!empty(session()->getFlashdata('fail'))): ?>

    <div class="alert alert-danger">
        <?= session()->getFlashdata('fail'); ?>
    </div>

<?php endif ?>

<?php if(!empty(session()->getFlashdata('success'))): ?>

    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif ?>


    <div class="card shadow mb-4">
        <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo $pacient['pacient_id'] ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $pacient['pacient_name'] ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $pacient['egn'] ?>
                    </div>
                </div>
            <hr class="mb-3">

            <div class="row mb-3">
                <div class="col-md-4">
                    <?php echo $pacient['age'] ?>
                </div>
                <div class="col-md-4">
                    <?php echo $pacient['pacient_sex'] ?>
                </div>
                <div class="col-md-4">
                    <?php echo $pacient['pacient_post_add'] ?>
                </div>
            </div>
            <hr class="mb-3">

            <div class="row mb-3">
                <div class="col-md-4">
                    <?php echo $pacient['pacient_phone'] ?>
                </div>
                <div class="col-md-4">
                    <?php echo $pacient['pacient_email'] ?>
                </div>
                <div class="col-md-4">
                    <?php echo $pacient['pacient_pridrujitel'] ?>
                </div>

            </div>
            <hr class="mb-3">
            <div class="row mb-3">
                <div class="col-md-4">
                    <?php echo $pacient['pridrujitel_status'] ?>
                </div>
            </div>
        </div>

    </div>


<?= $this->endSection(); ?>