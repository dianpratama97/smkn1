<!DOCTYPE html>
<html>

<head>
    <title>SMKN 1 SINGKEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: #025f8a;
    }

    .box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 400px;
        background-image: radial-gradient(circle at 46.54% 89.52%, #a5e8ff 0, #89dbff 25%, #6acdff 50%, #44bffa 75%, #00b1f6 100%);
        box-sizing: border-box;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
        border: 2px solid rgba(0, 0, 0, .5);
    }

    .box .about {
        position: absolute;
        top: 200px;
        left: 15px;
        right: 15px;
        bottom: -170px;
        border: 2px solid #fff;
        padding-top: 100px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .5);
    }

    .box svg,
    .box svg rect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        fill: transparent;
    }

    .box svg rect {
        stroke: #fff;
        stroke-width: 4;
        stroke-dasharray: 400;
        animation: animate 3s linear infinite;
    }

    @keyframes animate {
        0% {
            stroke-dashoffset: 800;
        }

        100% {
            stroke-dashoffset: 0;
        }
    }

    .about {
        padding: 20px;
        color: #fff;
        text-align: center;
        position: absolute;
        top: 30%;
        transform: translateY(-50%);
    }

    .about h2 {
        margin-top: -70px;
        padding: 0;
        font-size: 30px;
        text-transform: uppercase;
    }

    .figure {
        width: 100%;
        height: 100%;
    }

    .figure:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background: url(image/dery.jpg);
        transform-origin: bottom;
        transition: .5s;
    }

    .box:hover .figure:before {
        transform: rotateX(90deg) translateY(50%);
    }

    .figure:after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url(image/dery.jpg);
        transform-origin: top;
        transition: .5s;
        background-position: 300px;
    }

    .box:hover .figure:after {
        transform: rotateX(90deg) translateY(-50%);
    }
</style>

<body>
    <div class="box">
        <svg>
            <rect></rect>
        </svg>
        <div class="about">
            <b>
                <h2>SMKN 1 SINGKEP</h2>
                <p>Hasil Kelulusan Kelas 12 TP. 2022/2023</p>
            </b>
            <hr>
            <p>{{ auth()->user()->name }}</p>
            <p>
                @if ($data == null)
                    "Oops.."
                @else
                    @if ($data->status == 1)
                        <div
                            style="background-color: rgb(36, 3, 128); border-radius: 10px; padding: 10px; box-shadow: 5px 5px 18px rgb(0, 0, 0);">
                            SELAMAT KAMU LULUS
                        </div>
                        <a href="{{ asset('storage/file-skl/' . auth()->user()->username) }}.pdf"
                            class="btn btn-primary mt-4">UNDUH SURAT KETERANGAN LULUS</a>
                    @elseif($data->status == 0)
                        <div style="background-color: rgb(189, 243, 11); border-radius: 10px; padding: 10px">
                            <h4>DATA KAMU BELUM DIMASUKAN</h4>
                        </div>
                    @else
                        <div style="background-color: rgb(231, 14, 14); border-radius: 10px; padding: 10px">
                            KAMU TIDAK LULUS</div>
                    @endif
                @endif
            </p>
            <br>
            <b><p class="mt-3 text-dark">#Created By. Dian Pratama, S.Pd</p></b>
        </div>
        <div class="figure"></div>
    </div>
</body>

</html>
