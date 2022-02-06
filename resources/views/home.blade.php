<!DOCTYPE html>

<html>
    <head>
        <script src="dreams.js"></script>
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
                
                <button id="open_log" type="button" class="account-button">
                    <span class="material-icons">account_circle</span>
                </button>
                <div id="box3" class="hidden">
                    <p>aaa</p>
                </div>
            </div>
            <div class="miniContainerPos">
                <div id="AnalyticsBlock" class="analyticsContainer">
                    Analytics
                </div>
                <div id="DirectBlock" class="sections">
                     Direct Connection
                </div>
                <div id="HelpBlock" class="sections">
                     Help Tickets
                </div>
            </div>
        </div>
    </body>
</html>