@extends('pages.test._layout')

@section('head')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        #center {
            text-align: center
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endsection

@section('content')
    <v-app>
        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-title>Sisa waktu : <span id=time>00:00</span></v-toolbar-title>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
            <v-layout
                justify-center
                align-center
            >
                <v-flex text-xs-center>
                    <v-carousel hide-delimiters hide-controls interval=8000>
                        @foreach ($sentences as $key => $sentence)
                        <v-carousel-item
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTyDIbjGNtX_siKFWjMbgj9oYyrXWGFZhv30NMfIg5jRufACwU6A"
                        >
                            <v-container fluid fill-height>
                                <v-layout justify-center align-center>
                                    <v-flex text-xs-center>
                                        <div class="display-1 font-weight-medium text-xs-center">
                                            {{$sentence}}
                                        </div><br>
                                        <div class="display-1 font-weight-medium text-xs-center">
                                            {{$words[$key]}}
                                        </div>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                    </v-carousel-item>
                        @endforeach
                    </v-carousel>
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
        countDownDate.setSeconds(countDownDate.getSeconds() + @json($waktu))
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
                    window.location.replace(@json(route($nextRoute, $nextRouteParam)))
                }
            },
            1000
        );
    </script>
@endsection