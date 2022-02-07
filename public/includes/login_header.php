<?php
$users = User::find_all();
foreach ($users as $user) {
    $name = $user->username;
}
?>
<header class="header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                 <div class=""></div>
                                 <div class="user-info d-flex align-items-center">
                                    <span class="user">
                                        <span class="material-icons">person</span>
                                    </span>
                                    <span class="user-name"><?php echo $name; ?></span>
          
                                    <span class="material-icons more-icon">expand_more</span>
                                    <div class="user-menu">
                                        <a href="logout.php">
                                        <span class="material-icons">logout</span>    
                                         Logout</a>
                                    </div><!--edn user-menu-->
                                </div>
                            </div><!--end d-flex-->
                        </div><!--end col-md-12-->
                    </div><!--end row-->
                </header><!--end header-->