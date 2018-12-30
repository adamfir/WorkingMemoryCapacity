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
                <v-layout justify-center align-center>
                    <v-flex xs12 sm6 md3 text-xs-center>
                        <form method="POST" action="{{route('tester.reading-span-recallAns', ['taskId' => $taskId])}}">
                            @csrf
                            @foreach ($words as $key => $word)
                            <v-text-field onkeydown="return alphaOnly(event);" name="words[{{$key}}]" label="Kata {{$key+1}}" solo></v-text-field>
                            @endforeach
                            <v-btn color="indigo" type="submit" dark id="submit">Submit</v-btn>
                        </form>
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
                    document.getElementById("submit").click();
                    // window.location.replace(@json(route('tester.home')))
                }
            },
            1000
        );
    </script>
    <script>
    function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8);
    };
    </script>
@endsection