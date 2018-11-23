<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Laravel branch222</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
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
                height: 100vh;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Sample
                </div>

                <div class="links">
                @if ($errors->any())
                <div class="alert alert-danger" style="color:red; font-weight:bold">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    @php $arrCats = ['leopard' => 'Leoparde', 'b'=>'asa']; @endphp
                   {{ Form::open(array('url' => '/employees', 'method'=>'post')) }}

                   {{ Form::text('name') }}
                   {{ Form::password('address') }}
                   {{ Form::date('joining_date', \Carbon\Carbon::now()) }}
                   {{ Form::select('size', ['L' => 'Large', 'M' => 'Medium', 'S' => 'Small'], 'S') }}
                   
                   {{   Form::select('animal', [
                        'Cats' => $arrCats,
                        'Dogs' => ['spaniel' => 'Spaniel'],
                        ], 'spaniel') 
                    }}
                   {{ Form::submit('Send') }}

                   <select>
                       <optgroup label="G1">
                           <option>a</option>
                           <option>b</option>
                       </optgroup>
                       <optgroup label="G2">
                           <option>x</option>
                       </optgroup>
                       <option>1</option>
                       <option>2</option>
                   </select>
    
{{ Form::close() }}
                </div>
            </div>
        </div>
    </body>
</html>
