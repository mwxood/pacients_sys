<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></title>
    <base href="/" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <link rel="stylesheet" href="assets/css/frontend.bundle.css">
</head>
<body>


<main>
        <div class="content-holder">
        <nav class="nav-holder">
                <div class="logo-holder">
                    <span class="logo-text">PSP.RAREDIS.ORG</span>
                </div>

                <ul class="nav">
                    <li><a href="<?= route_to('dashboard.home'); ?>"><span class="material-icons">home</span>Начало</a></li>
                    <li><a href="<?= route_to('dashboard.pacients'); ?>"><span class="material-icons">healing</span>Пациенти</a></li>
                    <li><a href="<?= route_to('dashboard.create_pacient'); ?>"><span class="material-icons">local_hospital</span>Регистриране на нов пациент</a></li>
                   <?php if(session()->get('userRole') == 'administrator'): ?>
                    <li><a href="<?= route_to('dashboard.users'); ?>"><span class="material-icons"><?= count($users) > 1 ? 'people' : 'person' ?></span>Потребители</a></li>
                    <?php endif ?>
                </ul>

            <footer class="footer-content">
                <p>&copy; <?= date('Y') ?> PSP.RAREDIS.ORG Всички права запазени.</p>
                <p>Страницата се зареди  за {elapsed_time} секунди</p>
            </footer>
                
            </nav>
            <div class="content">
  
            <header class="header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                 <div class=""></div>
                                 <div class="user-info d-flex align-items-center">
                                    <span class="user">
                                        <span class="material-icons">person</span>
                                    </span>
                                    <span class="user-name">
                                        <?= ucfirst($userInfo['name']); ?>
                                    </span>
          
                                    <span class="material-icons more-icon">expand_more</span>
                                    <div class="user-menu">
                                        <a href="<?= base_url('auth/logout'); ?>">
                                        <span class="material-icons">logout</span>    
                                         Logout</a>
                                    </div><!--edn user-menu-->
                                </div>
                            </div><!--end d-flex-->
                        </div><!--end col-md-12-->
                    </div><!--end row-->
                </header><!--end header-->

                <div class="main-content">

                <?= $this->renderSection('content'); ?>

                </div><!--end main-content-->
            
            </div><!--end content-->
        </div>
    </main>



<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
<script src="assets/js/frontend.bundle.js"></script>
</body>
</html>



