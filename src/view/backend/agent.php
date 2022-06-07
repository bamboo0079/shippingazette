<?php

require dirname(dirname(dirname(__FILE__)))."/helper/helper.php";
require dirname(dirname(dirname(__FILE__)))."/model/agent.php";

$agent = new Agent($pdo);
$data_agent = $agent->getAgent();

if(isset($_POST['agent_id']) && $_POST['agent_id'] != "") {
    $result = $agent->deleteAgent($_POST['agent_id']);
    if($result == true) {
        $data_agent = $agent->getAgent();
        $success_msg = "Tàu đã được xóa.";
    } else {
        $error_msg = "Xóa tàu không công. Vui lòng kiểm tra.";
    }
}

?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh Sách Hãng Tàu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh Sách Hãng Tàu</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Các Hãng Tàu</h6>
                </div>
                <?php if(isset($error_msg) && $error_msg != "") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Lỗi!</strong> <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <?php if(isset($success_msg) && $success_msg != "") { ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $success_msg; ?>
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Tên Hãng Tàu(Vn)</th>
                            <th>Tên Hãng Tàu(En)</th>
                            <th>Đang Hoạt Động</th>
                            <th>Thao Tác <a href="/addmin/dashboard?page=add-agent" class="btn btn-sm btn-primary">Thêm Tàu</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($data_agent)) {
                            foreach ($data_agent[0] as $key => $_agent) {  ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $_agent['agent_nm_vn'];?></td>
                                    <td><?php echo $_agent['agent_nm_en'];?></td>
                                    <?php
                                    if($_agent['status'] == 0) { ?>
                                        <td><span class="badge badge-success">Yes</span></td>
                                    <?php    } else { ?>
                                        <td><span class="badge badge-danger">No</span></td>
                                    <?php    }  ?>

                                    <td>
                                        <form method="post" action="/addmin/dashboard?page=edit-agent" style="width: 100px; float: left">
                                            <input type="hidden" name="agent_id" value="<?php echo $_agent['id'];?>">
                                            <button class="btn btn-sm btn-primary">
                                                <span>Chỉnh Sửa</span>
                                            </button>
                                        </form>
                                        <?php
                                        if($_agent['status'] == 0) {
                                            ?>
                                            <form method="post" style="width: 80px; float: left">
                                                <input type="hidden" name="agent_id" value="<?php echo $_agent['id'];?>">
                                                <button class="btn btn-sm btn-danger">
                                                    <span>Xóa Tàu</span>
                                                </button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5" style="text-align: center"> <?php  echo "Chưa có dữ liệu."; ?></td>
                            </tr>

                        <?php } ?>
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