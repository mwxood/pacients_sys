<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<h1 class="mb-3"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>


<div class="row">
<?php if(session()->get('userRole') == 'administrator'): ?>
    <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= site_url('dashboard/pacients_menu/'); ?>">
                                <?= count($users) > 1 ? count($users) . ' Регистрирани потребители' : count($users) . ' Регистриран потребители' ?>
                                </a>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa <?= count($users) > 1 ? 'fa-users' : 'fa-user' ?>  fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             <a href="<?= site_url('/auth/register'); ?>">
                                     Регистрация на потребител
                                </a>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa <?= count($users) > 1 ? 'fa-users' : 'fa-user' ?>  fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <h3 class="mb-3 text-center"> QR за вход в системата</h3>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <img src="<?= $code ?>" alt="">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
</div>


<?= $this->endSection(); ?>