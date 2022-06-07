<?php
$msg = "";
if(isset($_POST['add_port']) && $_POST['add_port'] == 1) {
    if(strlen($_POST['port_nm_vn']) == 0 || strlen($_POST['port_nm_en']) == 0) {
        $msg = "Vui lòng nhậu tên hãng tàu tiếng Việt và tiếng Anh.";
    } else {

        require dirname(dirname(dirname(__FILE__)))."/helper/helper.php";
        require dirname(dirname(dirname(__FILE__)))."/model/port.php";

        $port = new Port($pdo);
        $port_nm_vn = $_POST['port_nm_vn'];
        $port_nm_en = $_POST['port_nm_en'];

        // Check hãng tàu
        $port_check = $port->checkPort($port_nm_vn, $port_nm_en);
        if($port_check == true) {
            $data_port = $port->insertPort($port_nm_vn, $port_nm_en);
            if($data_port == false) {
                $msg = "Lỗi thêm mới, vui lòng kiểm tra.";
            } else{
                $success = "Thêm mới cảng tàu thành công.";
            }
        } else {
            $msg = "Hãng tàu .".$port_nm_vn." / ".$port_nm_en." đã tồn tại";
        }
    }
}
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm Mới Cảng Tàu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm Cảng Tàu</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Cảng Tàu</h6>
                </div>
                <div class="card-body">

                    <?php if(isset($msg) && $msg != "") { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Lỗi!</strong> <?php echo $msg; ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($success) && $success != "") { ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo $success; ?>
                        </div>
                    <?php } ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Cảng Tàu (Tiếng Việt) *</label>
                            <input type="text" name="port_nm_vn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Cảng Tàu (Tiếng Anh) *</label>
                            <input type="text" name="port_nm_en" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_port" value="1">Submit</button>
                    </form>
                </div>
            </div>
        </div
    </div>
    <!--Row-->

</div>