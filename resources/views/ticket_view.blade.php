<!DOCTYPE html>

<html>
    <head>
    <script defer src="{{ url('/js/dreams.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/dreams.css') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    @if ((App\Http\Controllers\DbController::logged() == 1)  )
    <body>
        <div id="container" class="container" style="background-image: url('{{ asset('image/bg.png')}}');">
            <div class="upBox">
                <span id="logo" class="logo">
                    DREAMS
                    <button onclick="location.href='/home';" id="logo-button" type="button" class="logo-button">
                        <span class="material-icons">grass</span>
                    </button>
                    <button onclick="location.href='/ticket';" id="back-button" class="back-button">
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
                    
                    <span id="list-title" class="listbox-label" >
                        {{$ticket->title}}
                    </span>
                    <br>
                    <ul id="ticket-list" class="ticket-list" role="listbox" aria-labelledby="list-title">
                    @if (isset($ticket->message[0]) )
                        <li  id="ticket1" class="ticket" role="listitem" aria-selected="true">{{$ticket->message[0]}}
                            <p class='sender'>Farmer</p>
                        </li>
                    @endif
                    
                    @if (isset($ticket->message[1]) )
                        <li  id="ticket1" class="ticket" role="listitem" aria-selected="true">{{$ticket->message[1]}}
                            <p class='sender'>Policy</p>
                        </li>
                    @else 
                    <br>
                    <form method="POST" action="{{url('ansTicket')}}">
                    @csrf
                    <textarea placeholder='Policy Maker answer' name='mex' rows="2" cols="50"></textarea> 
                    <input type='hidden' name='id' value='{{ $ticket->id }}'>
                    <input type="submit" value="Answer" class="password">
                    </form>
                    @endif
                    <br>
                    
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