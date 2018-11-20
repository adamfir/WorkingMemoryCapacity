<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tes Kapasitas Working Memory | Registrasi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    @if ($message = Session::get('success'))
        <div class="callout callout-success">
            <h4>Sukses membuat user!</h4>
            <p>{{$message}}</p>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="callout callout-danger">
            <h4>Gagal membuat user!</h4>
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Tes Kapasitas Working Memory</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Daftar anggota baru</p>

            <form action="{{ route('import_user') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Data</label>
                    <input name="excel_data" type="file" id="exampleInputFile" required>
                    <p class="help-block">Masukan file excel berisi daftar user</p>
                </div>
                <div class="row ">
                    <div class="col-xs-8 "></div>
                    <div class="col-xs-4 ">
                        <button type="submit " class="btn btn-primary btn-block btn-flat ">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <script src="bower_components/jquery/dist/jquery.min.js "></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="plugins/iCheck/icheck.min.js "></script>
    <script>
        $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

    </script>
</body>

</html>