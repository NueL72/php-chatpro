<?php
include_once 'driver.php';
session_start();
if (!empty($_POST['pokea'])) {
    $pokeaName = $_POST['mail'];
    $pokeaPass = $_POST['code'];

    $sql = "SELECT * FROM users WHERE `name` = '" . $pokeaName . "' AND password = '" . $pokeaPass . "'";
    $query = mysqli_query($conn, $sql);
    //echo $sql;
    $emma = mysqli_fetch_array($query);
    if ($emma['role'] == 0) {
        $emma['name'] == $pokeaName;

        header('Location:user.php');
    } else if($emma['role'] == 1) {
        $_SESSION['username'] = $emma['name'];
        header('Location:dash.php');
    }
    else{
        header('location:reg.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Chatbot</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="content align-self-md-center" style="padding-top: 100px;">
        <div class="row p-xl-5" style="margin-left: 420px;">
            <div class="col-md-6">

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Login Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">

                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>name:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="mail" class="form-control"
                                        data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="full name.."
                                        required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->

                            <!-- IP mask -->
                            <div class="form-group">
                                <label>password:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="code" class="form-control"
                                        data-inputmask="'alias': 'ip'" data-mask placeholder="your password.." required>
                                </div>
                                <!-- /.input group -->
                                <div class="input-group float-left" style="padding-top: 10px;">
                                    <input type="submit" name="pokea" class="btn btn-outline-success" value="LOGIN">
                                    <div style="padding-left: 200px;">
                                        <a href="reg.php" class="btn btn-outline-primary">REGISTER</a>
                                    </div>


                                </div>
                                <!-- /.form group -->

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </div>

        </div>

    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>