<!DOCTYPE html>

<html>
    <head>
        <script defer src="{{ url('/js/dreams.js') }}" ></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/dreams.css') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
        <div id="container" class="container"  style="background-image: url('{{ asset('image/bg.png')}}');" >
            <div class="upBox">
                <span id="logo" onclick="location.href='home';" class="logo">
                    DREAMS
                    <button id="logo-button" type="button" class="logo-button">
                        <span class="material-icons">grass</span>
                    </button>
                </span>
                
            </div>
            <div class="upBox">
                
                <button id="account" type="button" class="account-button">
                    <span class="material-icons">account_circle</span>
                </button>

            </div>
            <div id="box3" class="hidden">
                    <br>Ciao {{ \App\Models\Mongo::where('_id', '=', session('id'))->first()->nome }}<br><a href="{{ url('logout');}}" style="text-decoration: none; color: black;">Log-out</a>
                </div>
            <div class="miniContainerPos">
                <div style="font-weight: bold;" id="AnalyticsBlock" class="analyticsContainer" onclick="location.href='analytics';">
                    Analytics
                </div>
                <div style="font-weight: bold;" id="DirectBlock" class="sections" onclick="location.href='direct';">
                     Direct Connection
                </div>
                <div style="font-weight: bold;" id="HelpBlock" class="sections" onclick="location.href='ticket';">
                     Help Tickets
                </div>
            </div>
        </div>
    </body>
</html>