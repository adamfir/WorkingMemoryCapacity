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
            <v-toolbar-title>Sisa waktu : <span id=time>10:00</span></v-toolbar-title>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
            <v-layout
                justify-center
                align-center
            >
                <v-flex text-xs-center>
                <form method="post" action="{{route('tester.emotional-quest-answer')}}">
                    <div class="">
                        <table>
                            <tr>
                                <th>Pertanyaan</th>
                                <th id="center">Sangat Sedikit</th>
                                <th id="center">Sedikit</th>
                                <th id="center">Sedang</th>
                                <th id="center">Banyak</th>
                                <th id="center">Sangat Banyak</th>
                            </tr>
                            @csrf
                            @foreach ($quests as $quest)
                            <tr>
                                <td>{{$quest->question}}</td>
                                <td id="center"><input type="radio" name="quests[{{$quest->id}}]" value="1"></td>
                                <td id="center"><input type="radio" name="quests[{{$quest->id}}]" value="2"></td>
                                <td id="center"><input type="radio" name="quests[{{$quest->id}}]" value="3"></td>
                                <td id="center"><input type="radio" name="quests[{{$quest->id}}]" value="4"></td>
                                <td id="center"><input type="radio" name="quests[{{$quest->id}}]" value="5"></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
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
        countDownDate.setMinutes(countDownDate.getMinutes() + @json($time))
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
@endsection