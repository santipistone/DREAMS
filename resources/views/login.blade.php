<!DOCTYPE html>

<html>
    <head>
        <script src="{{ url('/js/dreams.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/dreams.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <meta name="viewport" content="width=device-width">
        <style>
            img {
                max-width: 100%;
            }
            </style>
    </head>
    <body>
        <div id="container" class="container" style="background-image: url('{{ asset('image/bg.png')}}');">
        <span id="logo" class="logo-login">
                DREAMS
                <button id="logo-button" type="button" class="logo-button-login">
                    <span class="material-icons">grass</span>
                </button>
            </span>
            <div class="login-box">
                <form class="form-box" action="{{url('login')}}" method="POST">
                    @csrf
                    <label for="usrname">Username:</label>
                    <input required="" type="text" name="email" class="password" required>
                    <label for="psw">Password:</label>
                    <input id="psw" type="password" name="passw" class="password" required>

                    <input type="submit" value="Submit" class="password">
                </form>
                <button id="eye-button" class="password-eye">
                        <i class="far fa-eye" id="togglePassword";"></i>
                    </button>
              </div>

        </div>
    </body>
</html>