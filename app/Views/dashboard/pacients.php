<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
    <form id="search-form" class="" action="<?= base_url('PacientController/pacients'); ?>" method="get">
        <?= csrf_field(); ?>
        <div class="form-group search-holder align-items-center">
            <div class="d-flex">
            <input id="title" type="search" class="form-control bg-light border-0 small search shadow"  placeholder="Търсене" name="search"  >

            <button type="submit" class="search-btn btn btn-primary">
                <i class="fas fa-search fa-sm"></i>
            </button>
            </div>
        </div>
    </form>
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

<?php if (!empty($pacients) && is_array($pacients)): ?>

    <div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered dataTable table-hover table-striped mb-5">

        <thead>
            <tr>
                <td>Заглавие</td>
                <td>Текст</td>
                <td>ЕГН</td>
                <td>Дата на раждане</td>
                <td>Действия</td>
            </tr>
        </thead>

            <tbody>
                <?php foreach($pacients as $pacient): ?>
                    <tr>
                        <td>
                            <?= esc($pacient['pacient_id']) ?>
                        </td>

                        <td>
                            <?= esc($pacient['pacient_name']) ?>
                        </td>

                        <td>
                            <?= esc($pacient['egn']) ?>
                        </td>

                        <td>
                            <?= esc($pacient['pacient_birthday']) ?>
                        </td>

                    

                        <td class="action-td button-td">
                            <span class="action-holder d-flex align-items-center justify-content-center">
                                <a href="<?= site_url('dashboard/edit_pacient/'.$pacient['id']); ?>" class="btn btn-center btn-success mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                                <?php if($userInfo['role'] == 'administrator'): ?>
                                <a  href="<?= site_url('dashboard/delete/'.$pacient['id']); ?>" class="btn btn-center delete_btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php endif ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach ?>
                
                </tbody>
                </table>
</div>
    <?php if ($pager) :?>
    <div class="d-flex justify-content-end">
        <div class="dataTables_paginate paging_simple_numbers">
            <?= $pager->links('group1'); ?>
        </div>
    </div>
    <?php endif ?>

</div>
    </div>


        
    



<?php else: ?>

<h3>Няма намерени резултати</h3>


<?php endif ?>
<?= $this->endSection(); ?>