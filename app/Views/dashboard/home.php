<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<h1 class="mb-4"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>


<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="<?= site_url('dashboard/pacients_menu/'); ?>">
                                 Болест на Паркинсон
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

    <?php if(session()->get('userRole') == 'administrator'): ?>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="<?= site_url('dashboard/settings/'); ?>">
                            Настройки
                            </a>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endif ?>
</div>

<?= $this->endSection(); ?>