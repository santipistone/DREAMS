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
                <button onclick="location.href='/home';" id="back-button" class="back-button">
                    <span class="material-icons">undo</span>
                </button>
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
                    <span id="list-title" class="listbox-label">Farmers</span>
                    <br>
                    <ul id="ticket-list" class="ticket-list" role="listbox" aria-labelledby="list-title">
 
                        @foreach ($farmers as $farmer)
                            <a style="text-decoration: none; color: black;" href="/analytics/{{$farmer['id']}}" ><li  id="ticket1" class="ticket" role="listitem" aria-selected="true">{{ $farmer['name'] }}<p class="sender">{{$farmer['point'] }}</p></li></a>
                            
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>