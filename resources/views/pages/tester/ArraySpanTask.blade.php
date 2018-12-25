<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="{{asset('css/ArraySpanTask.css')}}">

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
    function startTimer(duration, display) {
    var modal = document.getElementById('myModal');
    var start = Date.now(),
            diff,
            minutes,
            seconds;
    function timer() {
            // get the number of seconds that have elapsed since 
            // startTimer() was called
            diff = duration - (((Date.now() - start) / 1000) | 0);

            // does the same job as parseInt truncates the float
            minutes = (diff / 60) | 0;
            seconds = (diff % 60) | 0;
        //     console.log(seconds);

            if(seconds == 0){
            //window.location = "/ReadingSpanSentence";
            //modal.style.display = "block";

            //setTimeout(function(){ window.location = "/ChoosePractice";}, 10000);

            }

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds; 

            if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            start = Date.now() + 1000;
            }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
    }

    window.onload = function () {
    var times = '10';
    var fiveMinutes = times,
            display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
    };

        function myFunction(id) {
        i++;
        var x = document.getElementById(i);
        if (x.style.display === "none") {
                // x.style.display = "block";
                x.src = "{{asset('svg/square.png')}}";
        }
        else{
                if(id === 1){
                        x.src = "{{asset('svg/square.png')}}";
                }
                else if(id === 2){
                        x.src="{{asset('svg/circle.png')}}";
                }
                else if(id === 3){
                        x.src="{{asset('svg/Triangle.png')}}";
                }
                else{
                        x.src="{{asset('svg/square.png')}}";
                }
                
        }
        
        console.log(x.src);
        }

    </script>
  </head>


<!------ Include the above in your HEAD tag ---------->
<body style ="background-color: #d2d6de" > 
        <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="time" style="color: red">0.00</span></b></h1><br>
        </div>
        <div class="container">
                <div class="split left" >
                        <div class="row">
                                <div class="col">
                                        <img id="1" class="image"/>
                                </div>
                                <div class="col" onClick ="myFunction()">
                                        <img  id="2" class="image"/>
                                        </div>
                                <div class="w-100"></div>
                                <div class="col">
                                        <img id= "3" class="image"/>
                                </div>
                                <div class="col">
                                        <img id="4" class="image"/>
                                </div>
                        </div>
                </div>
                <div class="split right" >
                                <div class="row">
                                        <div class="col" onClick="myFunction(1)">
                                                <img src="{{asset('svg/square.png')}}" class="image"/>
                                        </div>
                                        <div class="col" onClick ="myFunction(2)">
                                                <img src="{{asset('svg/circle.png')}}" class="image"/>
                                                </div>
                                        {{-- <div class="w-100"></div> --}}
                                        <div class="col" onClick="myFunction(3)">
                                                <img src="{{asset('svg/Triangle.png')}}" class="image"/>
                                        </div>
                                        <div class="col" onClick="myFunction(4)">
                                                <img src="{{asset('svg/square.png')}}" class="image"/>
                                        </div>
                                </div>
                        </div>
        </div>


</body>
