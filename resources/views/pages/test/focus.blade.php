@extends('pages.test._layout')

@section('head')
@endsection

@section('content')
    <v-app>
        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-title>Sisa waktu : <span id=time>00:{{$waktu}}</span></v-toolbar-title>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
            <v-layout
                justify-center
                align-center
            >
                <v-flex text-xs-center>
                    <div class="display-4 font-weight-thin">
                        +
                    </div>
                </v-flex>
            </v-layout>
            </v-container>
        </v-content>
        <v-footer color="indigo" app>
            <v-spacer></v-spacer>
            <span class="white--text">&copy; 2019 </span>
        </v-footer>
    </v-app>
@endsection

@section('script')
    <script>
        var countDownDate = new Date();
        countDownDate.setSeconds(countDownDate.getSeconds() + parseInt(@json($waktu)))
        countDownDate = countDownDate.getTime()
        var x = setInterval(
            function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if (minutes < 10)
                    minutes = "0" + minutes
                if (seconds < 10)
                    seconds = "0" + seconds
                document.getElementById("time").innerHTML = minutes + ":" + seconds;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("time").innerHTML = "Waktu Habis";
                    // document.getElementById("submit").click();
                    window.location.replace(@json(route($nextRoute,$nextRouteParam)))
                }
            },
            1000
        );
    </script>
@endsection