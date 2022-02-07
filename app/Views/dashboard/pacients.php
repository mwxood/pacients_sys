<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
    <form id="search-form" action="<?= base_url('DashboardController/pacients'); ?>" method="get">
        <?= csrf_field(); ?>
        <div class="form-group search-holder align-items-center">
            <input id="title" type="search" class="input-bg search-input form-control-lg"  placeholder="Търсене" name="search"  >

            <button type="submit" class="search-btn btn btn-primary">
                <span class="material-icons">
                    search
                </span>
            </button>
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

<?php if (!empty($posts) && is_array($posts)): ?>

<table class="table mb-5">

    <thead>
        <tr>
            <td>Заглавие</td>
            <td>Текст</td>
            <td>дата</td>
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

                <td class="action-td">
                    <span class="action-holder d-flex align-items-center justify-content-center">
                        <a href="<?= site_url('dashboard/edit_post/'.$pacient['id']); ?>" class="btn btn-center btn-success"><span class="material-icons">check_circle</span>Промени</a>
                        <?php if($userInfo['role'] == 'administrator'): ?>
                        <a  href="<?= site_url('dashboard/delete/'.$pacient['id']); ?>" class="btn btn-center delete_btn btn-danger"><span class="material-icons">delete</span>Изтрий</a>
                        <?php endif ?>
                    </span>
                </td>
            </tr>
        <?php endforeach ?>
        
    </tbody>
</table>
<?= $pager->links('group1'); ?>
<?php else: ?>

<h3>Няма намерени резултати</h3>


<?php endif ?>
<?= $this->endSection(); ?>