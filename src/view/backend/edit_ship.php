<?php
$msg = "";
if(isset($_POST['ship_id']) && $_POST['ship_id'] != "" && !isset($_POST['save_edit'])) {
    require dirname(dirname(dirname(__FILE__)))."/helper/helper.php";
    require dirname(dirname(dirname(__FILE__)))."/model/ship.php";

    $ship_id = $_POST['ship_id'];
    $ship = new Ship($pdo);
    $ship_detail = $ship->getShipDetail($ship_id);
    if(empty($ship_detail)) {
        header('Location: /addmin/dashboard?page=ship');
    }
} elseif(isset($_POST['ship_id']) && $_POST['ship_id'] != "" && isset($_POST['save_edit']) && $_POST['save_edit'] == 1) {
    require dirname(dirname(dirname(__FILE__)))."/helper/helper.php";
    require dirname(dirname(dirname(__FILE__)))."/model/ship.php";

    $ship_id = $_POST['ship_id'];
    $ship = new Ship($pdo);
    $ship_nm_vn = $_POST['ship_nm_vn'];
    $ship_nm_en = $_POST['ship_nm_en'];
    $status = $_POST['status'];

    if($ship_nm_vn == "" || $ship_nm_en == "" || $status == "") {
        $msg = "Vui lòng nhập đầy đủ thông tin.";
    } else {
        $result = $ship->updateShip($ship_id, $ship_nm_vn, $ship_nm_en, $status);
        if($result == false) {
            $msg = "Lỗi cập nhật tàu. Vui lòng kiểm tra.";
        } else {
            $success = "Cập nhật tàu thành công.";
        }
    }
    $ship_detail = $ship->getShipDetail($ship_id);
} else {
    header('Location: /addmin/dashboard?page=ship');
}
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh Sửa Hãng Tàu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh Sửa</li>
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
                        <input type="hidden" name="save_edit" value="1">
                        <input type="hidden" name="ship_id" value="<?php echo $ship_id;?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Hãng Tàu (Tiếng Việt) *</label>
                            <input type="text" name="ship_nm_vn" class="form-control" value="<?php echo $ship_detail[0]['ship_nm_vn'];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Hãng Tàu (Tiếng Anh) *</label>
                            <input type="text" name="ship_nm_en" value="<?php echo $ship_detail[0]['ship_nm_en'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 15px"><input type="radio" name="status" value="0" <?php echo $ship_detail[0]['status']== 0 ? "checked='checked'" : '';?>> Đang Hoạt Động   </label>
                            <label><input type="radio" name="status" value="1" <?php echo $ship_detail[0]['status']== 1 ? "checked='checked'" : '';?>> Không Hoạt Động</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_ship" value="1">Submit</button>
                    </form>
                </div>
            </div>
        </div
    </div>
    <!--Row-->

</div>