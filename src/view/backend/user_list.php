<!-- TopBar -->
<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3" style="color: white">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow"></li>
        <li class="nav-item dropdown no-arrow mx-1"> </li>
        <li class="nav-item dropdown no-arrow mx-1"></li>
        <li class="nav-item dropdown no-arrow mx-1"></li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="/src/asset/img/system/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">minhnhut0079</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/resources/views/backends/dashboard.php?page=user_edit&id=2">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Thông Tin Cá Nhân
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/resources/controllers/login.php?action=logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng Xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- Topbar -->

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh Sách Người Quản Trị</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">User list</li>
        </ol>
    </div>


    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Người Quản Trị</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Tên Đăng Nhập</th>
                            <th><a href="/resources/views/backends/dashboard.php?page=add_user" class="btn btn-sm btn-info">Thêm Mới</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>NGUYEN MINH NHUT</td>
                            <td>abc@gmail.com</td>
                            <td>0969411898</td>
                            <td>minhnhut0079</td>

                            <td>
                                <a href="/resources/views/backends/dashboard.php?page=user_edit&id=2" class="btn btn-sm btn-primary">Chỉnh Sửa</a>
                                <a onclick="return confirm('Bạn muốn xóa sản phẩm này?')" href="/resources/controllers/userController.php?action=user_delete&id=2" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>