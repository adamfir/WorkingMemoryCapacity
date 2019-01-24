<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{{ csrf_token() }}}"/>
    <title>Reading Span Sentences</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ArraySpanTaskRead.css')}}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
        var i = 0;
        var Pict = [];
        var hasil1;
    function startTimer(duration, display) {
    var modal = document.getElementById('myModal');
    var start = Date.now(),
            diff,
            minutes,
            seconds;
     var array = <?php echo json_encode($data,  JSON_PRETTY_PRINT) ?>;
     var hasil = JSON.stringify(array);
     hasil1 = JSON.parse(hasil);
     console.log(hasil1.array);


    function timer() {

            diff = duration - (((Date.now() - start) / 1000) | 0);
            minutes = (diff / 60) | 0;
            seconds = (diff % 60) | 0;

            if(seconds == 0){
                window.location.replace(@json(route($nextRoute, $nextRouteParam)))

            }

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds; 

            if (diff <= 0) {

                start = Date.now() + 1000;
            }
    };
    timer();
    setInterval(timer, 1000);
    }

    window.onload = function () {
        var seri = "{{$seri}}"
        var times = '10';
        var fiveMinutes = times,
                display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
        
        for(var i = 0 ; i<4; i++){
                var x = document.getElementById(i);
                console.log(msn);
                if(seri == 1){
                        var uri = "http://localhost:8000/psikologi_shapes/easy/seri1/";
                var ext = ".png";
                var msn = uri.concat(hasil1.array[i], ext);
                        x.src = msn;
                }
        }
    };

    </script>
  </head>


<body style ="background-color: #d2d6de" > 
        <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="time" style="color: red">0.00</span></b></h1><br>
        </div>
        <div class="container">
            <div class="row">
                    <div class="col">
                        <div class="centered">1</div>
                        <img id ="0" src="{{asset('svg/square.png')}}" class="image"/>
                    </div>
                    <div class="col">
                        <div class="centered">2</div>
                        <img id="1" src="{{asset('svg/circle.png')}}" class="image"/>
                            </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="centered">3</div>
                        <img id="2" src="{{asset('svg/Triangle.png')}}" class="image"/>
                    </div>
                    <div class="col">
                        <div class="centered">4</div>
                        <img id="3" src="{{asset('svg/square.png')}}" class="image"/>
                    </div>
            </div>


</body>
