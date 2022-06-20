<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
    <h1 class="mb-3"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>



    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= site_url('dashboard/pacients/'); ?>">
                                    Регистрирани пациенти
                                </a>

                            </div>


                        </div>

                        <div class="col-auto">
                            <i class="fa fa-hospital fa-2x text-gray-300"></i>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= site_url('dashboard/create_pacient/'); ?>">
                                    Нов пациент
                                </a>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(session()->get('userRole') == 'administrator'): ?>

        <?php foreach($pacients as $pacient): ?> <?php endforeach; ?>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="<?= site_url('dashboard/view_all_pacients/'); ?>">
                                        Отчети
                                    </a>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>
    </div>

<?= $this->endSection(); ?>