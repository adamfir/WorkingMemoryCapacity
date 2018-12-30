<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
        <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
</head>
    <body>
        <div id="app">
            {{-- <home></home> --}}
            <v-app id="inspire">
                <v-toolbar color="indigo" dark fixed app>
                    <v-toolbar-title>Home</v-toolbar-title>
                </v-toolbar>
                <v-content>
                    <v-container fluid fill-height>
                    <v-layout
                        justify-center
                        align-center
                    >
                        <v-flex text-xs-center>
                        <div class="display-1 font-weight-thin">Hallo selamat datang.</div>
                        </v-flex>
                    </v-layout>
                    </v-container>
                </v-content>
                <v-footer color="indigo" app>
                    <v-spacer></v-spacer>
                    <span class="white--text">&copy; 2019 </span>
                </v-footer>
            </v-app>
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
