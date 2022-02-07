<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<h1><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>

<form id="post-id" action="<?= base_url('PacientController/update/'.$post['id']); ?>" method="post">
    <?= csrf_field(); ?>

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

    <div class="form-group">
        <label for="title">
             <span class="text-danger"><?= isset($validation) ? display_error($validation, 'title') : '' ?></span>
            <input id="title" type="text" class="input-bg" placeholder="Име на пост" name="title" value="<?= esc($post['title']); ?>" >
        </label>

        <label for="content">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></span>
            <textarea name="content" class="input-bg" id="content" cols="30" rows="10"><?= esc($post['content']); ?></textarea>
        </label>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Публикувай" class="btn btn-primary">
    </div>
</form>
<?= $this->endSection(); ?>