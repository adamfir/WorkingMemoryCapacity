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
//     console.log(array[0])
     console.log(hasil1.array)
    function timer() {
            // get the number of seconds that have elapsed since 
            // startTimer() was called
            diff = duration - (((Date.now() - start) / 1000) | 0);

            // does the same job as parseInt truncates the float
            minutes = (diff / 60) | 0;
            seconds = (diff % 60) | 0;
        //     console.log(seconds);

            if(seconds == 0){
        //     window.location = "/tester/ArraySpanTask/Test?params0="+Pict[0]+"&params1="+Pict[1]+"&params2="+Pict[2]+"&params3="+Pict[3];
        //     //window.location = "/tester/ArraySpanTask/Test";
        //     //modal.style.display = "block";
        //     //setTimeout(function(){ window.location = "/ChoosePractice";}, 10000);
        window.location.replace(@json(route($nextRoute, $nextRouteParam)))

        //     $.ajax({
        //                 url: '/tester/ArraySpanTask/Test',
        //                 type: "get",
        //                 data: {'Array0': Pict[0], 'Array1': Pict[1], "Array2": Pict[2], "Array3": Pict[3]},
        //                 dataType: 'JSON',
        //                 beforeSend: function (request) {
        //                         return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        //                 },
        //                 success: function (data) {
        //                 console.log(data); // this is good
        //                 }
        //     });
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
    random();
    
    for(var i = 0 ; i<4; i++){
        var x = document.getElementById(i);
        if(hasil1.array[i] === 0){
                x.src = "{{asset('svg/square.png')}}";
        }
        else if(hasil1.array[i] === 1){
                x.src="{{asset('svg/circle.png')}}";
        }
        else if(hasil1.array[i] === 2){
                x.src="{{asset('svg/Triangle.png')}}";
        }
        else{
                x.src="{{asset('svg/square.png')}}";
        }
        
        }
    };

    //random


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
                        pict.push(1);
                }
                else if(id === 2){
                        x.src="{{asset('svg/circle.png')}}";
                        pict.push(2);
                }
                else if(id === 3){
                        x.src="{{asset('svg/Triangle.png')}}";
                        pict.push(3);
                }
                else{
                        x.src="{{asset('svg/square.png')}}";
                        pict.push(4);
                }
                
        }
        if(i === 4){
                //post('/tester/ArrayPost', {Pict1:'1', Pict2:'2', Pict3:'3', Pict4:'4'});

                // $.ajax({
                //         url: '/tester/ArrayPost',
                //         type: "post",
                //         data: {'Pict1':'1', 'Pict2': '2', 'Pict3' : '3', 'Pict4': '4'},
                //         dataType: 'JSON',
                //         beforeSend: function (request) {
                //                 return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                //         },
                //         success: function (data) {
                //         console.log(data); // this is good
                //         }
                // });
        }

        console.log(pict);
        
        console.log(x.src);
        }

        function random(){
            for (var i=0; i<4; i++){
                var min=0; 
                var max=4;  
                var random =Math.floor(Math.random() * (+max - +min)) + +min; 
                Pict.push(random);
            }
            console.log(Pict);
        }

    </script>
  </head>


<!------ Include the above in your HEAD tag ---------->
<body style ="background-color: #d2d6de" > 
        <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="time" style="color: red">0.00</span></b></h1><br>
        </div>
        <div class="container">
        <?php echo "<script>document.write(hasil)</script>" ?>
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
