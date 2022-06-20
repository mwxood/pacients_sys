<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-3"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>
       
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

            <div class="card  h-100 py-2 mb-5">
                <div class="card-body">
                <table class="table table-bordered dataTable mb-5 table-striped table-hover">
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


                                <td class="action-td button-td">
                                    <span class="action-holder d-flex align-items-center justify-content-center">
                                        <a href="<?= site_url('auth/edit_user/'.$user['id']); ?>" class="btn btn-center btn-success mr-3"><i class="fas fa-edit"></i></a></a>
                                        <a  href="<?= site_url('auth/delete_user/'.$user['id']); ?>" class="btn btn-center delete_btn btn-danger"> <i class="fas fa-trash"></i></a>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        
                    </tbody>
                </table>

                <?php if ($pager) :?>
                    <div class="d-flex justify-content-end">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <?= $pager->links('group1'); ?>
                        </div>
                    </div>
                <?php endif ?>
        <?php else: ?>

            <h3>Няма регистрирани потребители</h3>

            <?php endif ?>
                </div>
            </div>




<?= $this->endSection(); ?>