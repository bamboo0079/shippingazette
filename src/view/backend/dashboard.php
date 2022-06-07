<?php
session_start();
    if(!isset($_SESSION['use_data'])) {
        header('Location: /auth/login');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/src/asset/img/system/logo.png" rel="icon">
    <title>Quản Trị Công Ty</title>
    <link href="/src/asset/css/backend/all.min.css" rel="stylesheet" type="text/css">
    <link href="/src/asset/css/backend/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/src/asset/css/backend/ruang-admin.min.css" rel="stylesheet">
    <link href="/src/asset/css/backend/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/src/asset/css/backend/bootstrap-datepicker.standalone.css" rel="stylesheet">
    <link href="/src/asset/css/backend/choices.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php
    $pages = "";
    if(isset($_GET['page'])) {
        $pages = $_GET['page'];
    }
?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php require "menu_left.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php
                switch ($pages) {
                    case "/":
                        require "index.php";
                        break;
                    case "ship":
                        require "ship.php";
                        break;
                    case "add-ship":
                        require "add_ship.php";
                        break;
                    case "edit-ship":
                        require "edit_ship.php";
                        break;
                    case "port":
                        require "port.php";
                        break;
                    case "add-port":
                        require "add_port.php";
                        break;
                    case "edit-port":
                        require "edit_port.php";
                        break;
                    case "agent":
                        require "port.php";
                        break;
                    case "add-agent":
                        require "add_agent.php";
                        break;
                    case "edit-agent":
                        require "edit_agent.php";
                        break;
                    case "user-list":
                        require "user_list.php";
                        break;
                    default:
                        require "index.php";
                        break;
                }
            ?>

        </div>
        <!-- Footer -->
        <?php require "footer.php";?>
        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="/src/asset/js/frontend/jquery-3.6.0.min.js"></script>
<script src="/src/asset/js/backend/bootstrap.bundle.min.js"></script>
<script src="/src/asset/js/backend/jquery.easing.min.js"></script>
<script src="/src/asset/js/backend/ruang-admin.min.js"></script>
<script src="/src/asset/js/backend/bootstrap-datepicker.min.js"></script>

<link href="/src/asset/css/frontend/bootstrap-chosen.css" rel="stylesheet">
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>

<script src="/src/asset/js/backend/jquery.maskedinput.js"></script>

</body>
<script type="text/javascript">
    $(document).ready(function() {

        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });

        $('.chosen-select1').chosen();
        $('.chosen-select-deselect1').chosen({ allow_single_deselect: true });

        $('.chosen-select2').chosen();
        $('.chosen-select-deselect2').chosen({ allow_single_deselect: true });

        $('.chosen-select3').chosen();
        $('.chosen-select-deselect3').chosen({ allow_single_deselect: true });

        $('.chosen-select4').chosen();
        $('.chosen-select-deselect4').chosen({ allow_single_deselect: true });

        $('body').delegate('.custom-file-input', 'change', function() {
            var filename = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').text(filename);
        });
        $('#sandbox-container .input-daterange').datepicker({
        });

        $("#start_date").mask("99/99/9999");
        $("#end_date").mask("99/99/9999");


    });

</script>
</html>

