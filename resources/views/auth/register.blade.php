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
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Tes Kapasitas Working Memory</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Daftar anggota baru</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Full name " name="name">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Tempat Tanggal Lahir " name="ttl">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Jenis Kelamin " name="gender">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="email " class="form-control " placeholder="Email " name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="password " class="form-control " placeholder="Password " name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="password " class="form-control " placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Universitas " name="universitas">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Jurusan " name="jurusan">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Fakultas " name="fakultas">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Semester " name="semester">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Skor Kecerdasan " name="skor_kecerdasan">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Skor EC " name="skor_ec">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Jumlah Hafalan " name="jumlah_hafalan">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Lama Menghafal " name="lama_menghafal">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback ">
                    <input type="text " class="form-control " placeholder="Role " name="role">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
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