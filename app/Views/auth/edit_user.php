<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <base href="/" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <link rel="stylesheet" href="assets/css/frontend.bundle.css">
</head>
<body>

<div class="login-bg">

    <div class="login-content">

            <div class="logo-holder">
    
        <span class="logo-text">PSP.RAREDIS.ORG</span>
    </div>



                <form id="login-id" action="<?= base_url('auth/update_user/'.$user['id']); ?>" method="post">
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
                        <label for="username">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                            <input type="text" class="input-bg" placeholder="Потребителско име" name="name" value="<?= esc($user['name']) ?>" >
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="username">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                            <input type="email" class="input-bg" placeholder="Имейл" name="email" value="<?= esc($user['email']); ?>" >
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                            <input type="password" class="input-bg" placeholder="Парола" name="password" value="">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>    
                            <input type="password" class="input-bg" placeholder="Повторете Парола" name="cpassword" value="">
                        </label>
                    </div>


                    <div class="form-group">
                        <select class="input-bg mb-5" name="role" id="">
                            <option value="moderator">Модератор</option>
                            <option value="administrator">Администратор</option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" name="submit" value="Вход" class="btn btn-primary">
                    </div>
                </form>

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