<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404 - Feiwin</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            background-color: #512da8;
            color: #fff;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 460px;
            width: 100%;
            text-align: center;
            line-height: 1.4;
        }

        .notfound .notfound-404 {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0px auto 50px;
        }

        .notfound .notfound-404>div:first-child {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            border: 5px dashed #ffffff;
            border-radius: 5px;

            background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, #f03);
            background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-animation: bg-spin 3s linear infinite;
            animation: bg-spin 3s linear infinite;
            --border-size: 3px;
            --border-angle: 0turn;

        }

        .notfound .notfound-404>div:first-child:before {
            content: '';
            position: absolute;
            left: -5px;
            right: -5px;
            bottom: -5px;
            top: -5px;
            -webkit-box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.1) inset;
            box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.1) inset;
            border-radius: 5px;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Raleway', sans-serif;
            color: #ffffff;
            font-weight: 700;
            margin: 0;
            font-size: 70px;
            position: absolute;
            top: 42%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            left: 50%;
            text-align: center;
            height: 40px;
            line-height: 40px;
            text-shadow: 3px 3px 2px #000000;
        }

        .notfound h2 {
            font-family: 'Raleway', sans-serif;
            font-size: 33px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 7px;
            text-shadow: 3px 3px 2px #000000;
        }

        .notfound p {
            font-family: 'Raleway', sans-serif;
            font-size: 16px;
            color: #fff;
            font-weight: 400;
            text-shadow: 3px 3px 2px #000000;
        }

        .notfound a {
            font-family: 'Raleway', sans-serif;
            display: inline-block;
            padding: 10px 25px;
            background-color: #ffffff;
            border: none;
            border-radius: 40px;
            color: #191919;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .notfound a:hover {
            background-color: #029132;
            color: #eeeeee;
        }

        @-webkit-keyframes bg-spin {
            to {
                --border-angle: 1turn;
            }
        }

        @keyframes bg-spin {
            to {
                --border-angle: 1turn;
            }
        }

        @property --border-angle {
            syntax: "<angle>";
            inherits: true;
            initial-value: 0turn;
        }
    </style>

</head>

<body class="error-body">

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <div></div>
                <h1>429</h1>
            </div>
            <h2>内部服务器错误</h2>
            <p>服务器遇到内部错误或配置错误，无法完成您的请求。
            </p>
            <a href="{{ url('/') }}">主页</a>
        </div>
    </div>

</body>

</html>
