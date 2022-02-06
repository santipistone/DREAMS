<!DOCTYPE html>

<html>
    <head>
    <script defer src="{{ url('/js/dreams.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/dreams.css') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    @if (App\Http\Controllers\DbController::logged() == 1)  
    <body>
        <div id="container" class="container" style="background-image: url('{{ asset('image/bg.png')}}');">
            <div class="upBox">
                <span id="logo" class="logo">
                    DREAMS
                    <button onclick="location.href='/home';" id="logo-button" type="button" class="logo-button">
                        <span class="material-icons">grass</span>
                    </button>
                    <button onclick="location.href='/home';" id="back-button" class="back-button">
                        <span class="material-icons">undo</span>
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
                <div id="list-box" class="list-box">
                    <span id="list-title" class="listbox-label" style="margin-left: 195px;">
                        Direct Connection
                    </span>
                    <br>
                    <ul id="ticket-list" class="ticket-list" role="listbox" aria-labelledby="list-title">
                        @foreach ($dm as $mex)
                        <a style="text-decoration: none; color: black;" href="/direct/{{(string)$mex['id']}}" ><li  id="ticket1" class="ticket" role="listitem" aria-selected="true">{{\App\Http\Controllers\DbController::getNameByID($mex['1'])}}<p class="sender">{{\App\Http\Controllers\DbController::getNameByID($mex['2'])}}</p></li></a>
                           
                        @endforeach
                        <a href="/direct/new"><img style="width: 45px;margin-left: 180px;margin-top: 10px;"src="{{ asset('image/plus.png')}}" ></img></a>
                    </ul>

                </div>
            </div>
        </div>
    </body>
</html>

@else 

<div>
<meta http-equiv="refresh" content="0; URL='/login'" />
</body>
</html>
@endif