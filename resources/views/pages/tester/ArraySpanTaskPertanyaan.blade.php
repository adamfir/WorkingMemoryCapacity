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
    <link rel="stylesheet" href="{{asset('css/ArraySpanTaskPertanyaan.css')}}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  

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
    var pertanyaan;

    function timer() {
            // get the number of seconds that have elapsed since 
            // startTimer() was called
            diff = duration - (((Date.now() - start) / 1000) | 0);

            // does the same job as parseInt truncates the float
            minutes = (diff / 60) | 0;
            seconds = (diff % 60) | 0;
        //     console.log(seconds);

            if(seconds == 0){
                updateDB(pertanyaan);
                window.location.replace(@json(route($nextRoute, $nextRouteParam)))
            }

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds; 

            if (diff <= 0) {
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
        }


    </script>
  </head>


<!------ Include the above in your HEAD tag ---------->
<body style ="background-color: #d2d6de" > 
        <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="time" style="color: red">0.00</span></b></h1><br>
        </div>
        <div class="container">
                
        <button id="myBtn">Open Modal</button>

        <div class="centered">
                <p style="font-size:43px; color:black"> Apakah Ada Perubahan Gambar Nomor {{$cekRandom+1}}</p>
                <div style="display: block;">
                        <button style="display:inline-block; width:200px; height:50px; border-radius:5%; background:#1cd887; color:white;font-size:30px"  onClick="checkRandom(1)">Ya </button>
                        <button  style="display:inline-block; width:200px; height:50px; border-radius:5%; background:#1cd887; color:white;font-size:30px"  onClick="checkRandom(0)" >Tidak </button>
                </tr>
        </div>
        </div>

<!-- The Modal -->
        <div id="true" class="modal">

                <div class="modal-content">
                        <div class="modal-header">
                                <span class="close">&times;</span>
                                </div>
                                <div class="modal-body">
                                <h1> Selamat Jawaban Anda Benar </h1>

                                </div>
                                <div class="modal-footer">
                        </div>
                </div>

        </div>

        <div id="false" class="modal">
                <div class="modal-contents">
                        <div class="modal-header1">
                                <span class="close">&times;</span>
                                </div>
                                <div class="modal-body">
                                <h1> Maaf Jawaban Anda Salah </h1>
                                </div>
                                <div class="modal-footer1">
                        </div>
                </div> 

        </div>

<script>
function checkRandom(id){
        var posisiRandom = <?= $posisiRandom ?>;
        var cekRandom = <?= $cekRandom ?>;


        if(posisiRandom === checkRandom){
                if(id  == 1){
                        // Get the modal
                        var modal = document.getElementById('true');

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");
                        console.log(btn);

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks the button, open the modal 
                        modal.style.display = "block";

                        btn.onclick = function() {
                        modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                                if (event.target == modal) {
                                modal.style.display = "none";
                                }
                        }
                        pertanyaan = 1;
                }

                else{
                        // Get the modal
                        var modal = document.getElementById('false');

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        modal.style.display = "block";

                        // When the user clicks the button, open the modal 
                        btn.onclick = function() {
                        modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                                if (event.target == modal) {
                                modal.style.display = "none";
                                }
                        }
                        pertanyaan = 0;
                }
        }

        else{
                if(id  == 1){
                        // Get the modal
                        var modal = document.getElementById('false');

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");
                        console.log(btn);

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks the button, open the modal 
                        modal.style.display = "block";

                        btn.onclick = function() {
                        modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                                if (event.target == modal) {
                                modal.style.display = "none";
                                }
                        }
                        pertanyaan = 0;
                }

                else{
                        // Get the modal
                        var modal = document.getElementById('true');

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");
                        console.log(btn);

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks the button, open the modal 
                        modal.style.display = "block";

                        btn.onclick = function() {
                        modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                                if (event.target == modal) {
                                modal.style.display = "none";
                                }
                        }
                        pertanyaan = 1;
                }
 
        }

        updateDB(pertanyaan);
}

function updateDB(pertanyaans){
        var user = <?= $user ?>;
        var iterasi = <?= $iterasi ?>;
        var seri = <?= $seri ?>;
        console.log(user);
        $.ajax({
                        url: '/tester/ArraySpanTask/PertanyaanPost',
                        type: "post",
                        data: {'pertanyaan':pertanyaans, 'user':user, 'iterasi': iterasi, 'seri':seri},
                        dataType: 'JSON',
                        beforeSend: function (request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function (data) {
                                
                        }
                });
}
</script>

</body>
