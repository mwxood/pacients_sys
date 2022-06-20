<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Регистрация в системата</title>

    <!-- Custom fonts for this template-->
    <link href="<?= site_url('/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= site_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">PSP.RAREDIS.ORG</h1>
                                </div>
                                <form id="login-id" class="user" action="<?= base_url('auth/save'); ?>" method="post">
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
                                    <span class="text-danger d-block mb-3"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                                    <input type="text" class="form-control form-control-user" placeholder="Потребителско име" name="name" value="<?= set_value('name'); ?>" >

                                    <span class="text-danger d-block mb-3 mt-3"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                                    <input type="email" class="form-control form-control-user" placeholder="Имейл" name="email" value="<?= set_value('email'); ?>" >
                                </div>

                                <div class="form-group">
                                    <span class="text-danger d-block mb-3"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                                    <input type="password" class="form-control form-control-user" placeholder="Парола" name="password" value="<?= set_value('password'); ?>">

                                    <span class="text-danger d-block mt-3 mb-3"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>    
                                    <input type="password" class="form-control form-control-user" placeholder="Повторете Парола" name="cpassword" value="<?= set_value('cpassword'); ?>">
                                </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Регистрирай" class="btn btn-primary btn-user btn-block">
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="footer-content">

</footer>
<script src="https://cdn.tiny.cloud/1/8uy47kr3d55g5wnfv7405k4r1sbj8113t4lndywafdw5yuw9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
<script src="assets/js/frontend.bundle.js"></script>
</body>
</html>