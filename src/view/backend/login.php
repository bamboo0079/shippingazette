<?php session_start();?>
<html>
    <link href="/src/asset/css/backend/bootstrap.min.css" rel="stylesheet">
    <link href="/src/asset/css/backend/font-awesome.min.css" rel="stylesheet">
    <link href="/src/asset/css/backend/login.css" rel="stylesheet">
    <body>
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="/src/controller/backend/login.php" method="post">
                        <div class="card2 card border-0 px-4 py-5">
                            <?php
                                if(isset($_SESSION['error_msg']) && $_SESSION['error_msg'] != "") { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Lỗi đăng nhập!</strong> <?php echo $_SESSION['error_msg']; ?>
                                    </div>
                                <?php unset($_SESSION['error_msg']); } ?>
                                    <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">User Đăng Nhập</h6>
                                </label> <input class="mb-4" type="text" name="user" placeholder="Enter a valid email address"> </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Mật Khẩu</h6>
                                </label> <input type="password" name="password" placeholder="Enter password"> </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Nhớ mật khẩu</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Bạn quên mật khẩu? vui lòng liên hệ nhà quản trị</a>
                            </div>
                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                    <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
                </div>
            </div>
        </div>
    </div>
    </body>
<script src="/src/asset/js/backend/bootstrap.bundle.min.js"></script>
<script src="/src/asset/js/backend/jquery.min.js"></script>
</html>