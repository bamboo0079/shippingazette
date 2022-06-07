<?php
    $msg = "";
    if(isset($_POST['add_ship']) && $_POST['add_ship'] == 1) {
        if(strlen($_POST['ship_nm_vn']) == 0 || strlen($_POST['ship_nm_en']) == 0) {
            $msg = "Vui lòng nhậu tên hãng tàu tiếng Việt và tiếng Anh.";
        } else {

            require dirname(dirname(dirname(__FILE__)))."/helper/helper.php";
            require dirname(dirname(dirname(__FILE__)))."/model/ship.php";

            $ship = new Ship($pdo);
            $ship_nm_vn = $_POST['ship_nm_vn'];
            $ship_nm_en = $_POST['ship_nm_en'];

            // Check hãng tàu
            $ship_check = $ship->checkShip($ship_nm_vn, $ship_nm_en);
            if($ship_check == true) {
                $data_ship = $ship->insertShip($ship_nm_vn, $ship_nm_en);
                if($data_ship == false) {
                    $msg = "Lỗi thêm mới, vui lòng kiểm tra.";
                } else{
                    $success = "Thêm mới hãng tàu thành công.";
                }
            } else {
                $msg = "Hãng tàu .".$ship_nm_vn." / ".$ship_nm_en." đã tồn tại";
            }
        }
    }
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm Mới Hãng Tàu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm Tàu</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Hãng Tàu</h6>
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
                            <label for="exampleInputEmail1">Tên Hãng Tàu (Tiếng Việt) *</label>
                            <input type="text" name="ship_nm_vn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Hãng Tàu (Tiếng Anh) *</label>
                            <input type="text" name="ship_nm_en" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_ship" value="1">Submit</button>
                    </form>
                </div>
            </div>
        </div
    </div>
    <!--Row-->

</div>