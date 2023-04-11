<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SMK Negeri 1 Singkep</title>

    <style type="text/css">
        .huruf {
            font-family: cursive;
        }

        .kuning {
            background-color: rgb(255, 205, 40);
            color: rgb(255, 255, 255)
        }

        .merah {
            background-color: rgb(245, 0, 94);
            color: rgb(255, 255, 255)
        }

        .muda {
            background-color: rgb(134, 225, 255);
            color: rgb(255, 255, 255)
        }
        .hijau {
            background-color: rgb(10, 255, 22);
            color: rgb(255, 255, 255)
        }
    </style>
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
</head>

<body style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,128,237,1) 0%, rgba(84,197,233,1) 100%);">
    <div class="container" style="margin-top: 3%">
        <h2 class="text-center mb-4 huruf" style="color: rgb(255, 255, 255); ">SMK Negeri 1 Singkep</h2>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>
