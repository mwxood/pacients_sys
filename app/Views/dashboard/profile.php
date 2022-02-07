<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
<?= $this->endSection(); ?>