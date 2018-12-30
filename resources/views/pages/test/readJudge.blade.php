@extends('pages.test._layout')

@section('head')
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
            <v-flex xs1 text-xs-left>
                <v-tooltip top>
                    <v-btn onclick="salah()" slot="activator" color="indigo" dark flat icon>
                        {{-- <v-icon large>arrow_back</v-icon> --}}
                        <v-icon large>cancel</v-icon>
                    </v-btn>
                    <span>Pernyataan salah</span>
                </v-tooltip>
                <div class="headline font-weight-thin">
                    Salah
                </div>
            </v-flex>
            <v-flex text-xs-center>
                <div class="display-1 font-weight-medium text-xs-center">
                    {{$sentence}}
                </div><br>
            </v-flex>
            <v-flex xs1 text-xs-right>
                <v-tooltip top>
                    <v-btn onclick="benar()" slot="activator" color="indigo" dark flat icon>
                        {{-- <v-icon large>arrow_forward</v-icon> --}}
                        <v-icon large>check</v-icon>
                    </v-btn>
                    <span>Pernyataan benar</span>
                </v-tooltip>
                <div class="headline font-weight-thin">
                    Benar
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
                    window.location.replace(
                        @json(
                            route($nextRoute, [
                                'ans' => 'unkown', 
                                'taskId' => $taskId]
                            )
                        )
                    )
                }
            },
            1000
        );
    </script>
    <script>
    function salah(){
        window.location.replace(
            @json(
                route($nextRoute, [
                    'ans' => 'F', 
                    'taskId' => $taskId]
                )
            )
        )
    }
    function benar(){
        window.location.replace(
            @json(
                route($nextRoute, [
                    'ans' => 'T', 
                    'taskId' => $taskId
                ])
            )
        )
    }
    </script>
@endsection