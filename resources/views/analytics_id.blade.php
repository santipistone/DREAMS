<!DOCTYPE html>

<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="{{ url('/js/dreams.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/dreams.css') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
    <div id="container" class="container"  style="background-image: url('{{ asset('image/bg.png')}}');" >
            <div class="upBox">
                <span id="logo" class="logo" >
                    DREAMS
                    <button onclick="location.href='/home';" id="logo-button" type="button" class="logo-button">
                        <span class="material-icons">grass</span>
                    </button>
                    <button onclick="location.href='/analytics';" id="back-button" class="back-button">
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
           <div class="miniContainerPos2">
                <canvas id="myChart" class="myChart"></canvas>
            </div>
        </div>
    </body>
    <script>
        const labels = [
            'Winter',
            'Spring',
            'Summer',
            'Fall'
        ];

        const data = {
            labels: labels,
            datasets: [{
            label: 'Point',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [{{ $data[1] ?? 0 }}, {{ $data[2] ?? 0 }}, {{ $data[3] ?? 0}}, {{ $data[4] ?? 0}}],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
        </script>
</html>