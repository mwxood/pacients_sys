<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-5"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
        <a class="btn btn-primary user-register d-flex align-items-center" href="<?= site_url('/auth/register'); ?>">
            <span class="material-icons">
                add
            </span>
            Регистрация на потребител
        </a>
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

<table class="table mb-5">
    <?php if (! empty($userInfo) && is_array($userInfo)): ?>
    <thead>
        <tr>
            <td>Потребителско име</td>
            <td>Имейл</td>
            <td>роля</td>
            <td>Действия</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td>
                    <?= esc($user['name']) ?>
                </td>

                <td>
                    <?= esc($user['email']) ?>
                </td>

                <td>
                    <?= esc($user['role']) ?>
                </td>


                <td>
                    <span class="d-flex align-items-center justify-content-center">
                        <a href="<?= site_url('auth/edit_user/'.$user['id']); ?>" class="btn btn-center btn-success"><span class="material-icons">check_circle</span>Промени</a>
                        <a  href="<?= site_url('auth/delete_user/'.$user['id']); ?>" class="btn btn-center delete_btn btn-danger"><span class="material-icons">delete</span>Изтрий</a>
                    </span>
                </td>
            </tr>
        <?php endforeach ?>
        
    </tbody>
</table>
<?= $pager->links('group1') ?>
<?php else: ?>

    <h3>Няма регистрирани потребители</h3>

<?php endif ?>

<?= $this->endSection(); ?>