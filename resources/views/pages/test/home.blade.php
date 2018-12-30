@extends('pages.test._layout')

@section('content')
    <v-app>
        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-title>Home</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-form action="{{ route('logout') }}" method="POST">
            @csrf
            <v-toolbar-items>
                <v-btn type="submit" flat>Log out</v-btn>
            </v-toolbar-items>
            </v-form>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-space-around column fill-height> 
                    <v-flex text-xs-center>
                        @if ($message = Session::get('success'))
                        <v-alert value="true" dismissible type="success">
                            {{$message}}
                        </v-alert>
                        @endif
                        @if ($message = Session::get('error'))
                        <v-alert value="true" dismissible type="error">
                            {{$message}}
                        </v-alert>
                        @endif
                    </v-flex>
                    @if (App\EmotionalQuestionAnswer::where('user_id', '=', Auth::user()->id)->first())
                    <v-flex text-xs-center>
                        <div class="display-1 font-weight-medium">
                            Silahkan pilih tes yang akan dikerjakan selanjutnya
                        </div><br>
                        @if (count(App\ReadingSpanTask::where('user_id','=',Auth::user()->id)->get()) < 15)
                        <a href="{{route('tester.focus', [
                            'task'=>'reading', 'seri'=>Auth::user()->serial, 'iterasi'=>Auth::user()->iteration,
                            'fokusKe'=>1
                        ])}}"><v-btn color="indigo" dark large>Reading Span Task</v-btn></a>
                        @endif
                        <a href="#"><v-btn color="indigo" dark large disable>Array Span Task</v-btn></a>
                    </v-flex>
                    @else
                    <v-flex text-xs-center>
                        <div class="display-3 font-weight-medium">
                            Hallo, selamat datang {{Auth::user()->name}}.
                        </div><br>
                        <div class="display-1 font-weight-thin">
                            Terima kasih anda telah berpartisipasi dalam penelitian mengenai kapasitas working memory. 
                        </div><br>
                        <div class="display-1 font-weight-thin">
                            Silahkan klik tombol lanjutkan di bawah untuk memulai tes dengan mengisi beberapa kuesioner.
                        </div><br>
                        <a href="{{route('tester.emotional-quest')}}"><v-btn color="indigo" dark large>Lanjutkan</v-btn></a>
                    </v-flex>
                    @endif
                </v-layout>
            </v-container>
        </v-content>
        <v-footer color="indigo" app>
            <v-spacer></v-spacer>
            <span class="white--text">&copy; 2019 </span>
        </v-footer>
    </v-app>
@endsection