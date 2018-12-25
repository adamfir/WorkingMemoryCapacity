<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="{{asset('css/EmotionalCSS.css')}}">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
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
        console.log(seconds);

         if(seconds == 55){
          //  window.location = "http://codepanda.id";
          modal.style.display = "block";

          setTimeout(function(){ window.location = "/tester/choose-task";}, 10000);

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
    var times = '<?php echo $time; ?>';
    var fiveMinutes = 60 * times,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>


<!------ Include the above in your HEAD tag ---------->
<body style ="background-color: #d2d6de" > 
  <nav class="col-lg-1 pull-right">
    <div class="sidebar-nav-fixed affix">
      <h1><b>Time <span id="time" style="color: red">0.00</span></b></h1><br>
    </div>
  </nav>
  <div class = "m-5" >
    <center><h1 class="col-lg-offset-4" style="color: black;"><b>  Emotional Question  </b></h1></center>
      <table class="table table-header-rotated">
        <thead>
          <tr>
            <!-- First column header is not rotated -->
            <th><b>Pertayaan</b></th>
            <!-- Following headers are rotated -->
              <th class="headerOfTable"><div><span>Sangat Rendah</span></div></th>
              <th class="headerOfTable"><div><span>Rendah</span></div></th>
              <th class="headerOfTable"><div><span>Sedang</span></div></th>
              <th class="headerOfTable"><div><span>Besar</span></div></th>
              <th class="headerOfTable"><div><span>Sangat</span></div></th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <th>Row header 1</th>
              <td align="center"><input type="radio" name="gender" value="male"></td>
              <td align="center"><input type="radio" name="gender" value="male"></td>
              <td align="center"><input type="radio" name="gender" value="male"></td>
              <td align="center"><input type="radio" name="gender" value="male"></td>
              <td align="center"><input type="radio" name="gender" value="male"></td>
          </tr>
        </tbody>
      </table>
  </div>
  <!-- The Modal -->
  <div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Waktu Sudah Habis</h2>
    </div>
    <div class="modal-body">
      <p>Waktu Anda Sudah Habis</p>
      <p>Seseaat lagi anda akan diarahkan ke halaman ....</p>
    </div>
  </div>
</div>

</body>
