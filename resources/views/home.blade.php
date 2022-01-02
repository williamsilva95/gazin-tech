@section('title','Gazin Tech')
@extends('main')

@section('content')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                GAZIN TECH
            </div>

            <div class="links">
                <a href="https://www.linkedin.com/in/williammsilva/" target="_blank">LinkedIn</a>
                <a href="https://github.com/williamsilva95" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
@endsection


