<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>

<ul class="category-group">
<?php if(session()->get('userRole') == 'administrator'): ?>
    <li>
        <a href="<?= site_url('dashboard/users/'); ?>">
            <span class="material-icons"><?= count($users) > 1 ? 'people' : 'person' ?></span>
            <span class="category-title"><?= count($users) > 1 ? count($users) . ' Регистрирани потребители' : count($users) . ' Регистриран потребители' ?></span>
        </a>
    </li>

    <li>
        <a href="<?= site_url('auth/register/'); ?>">
            <span class="material-icons">person</span>
            <span class="category-title">Регистрирай потребител</span>
        </a>
    </li>
<?php endif ?>
    <li>
        <a href="<?= site_url('dashboard/users/'); ?>">
            <span class="material-icons">healing</span>
            <span class="category-title"><?= count($users) > 1 ? count($users) . ' Регистрирани пациенти' : count($users) . ' Регистриран пациент' ?></span>
        </a>
    </li>

    <li>
        <a href="<?= site_url('dashboard/create_pacient/'); ?>">
            <span class="material-icons">local_hospital</span>
            <span class="category-title">Регистрирай пациент</span>
        </a>
    </li>

   
</ul>
<?= $this->endSection(); ?>