<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="book">Make A Booking <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/bus">Bus Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/seat">Seat Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user">User Management</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            
            <form method="POST" action="make_booking">
                @csrf
                <h5>
                    Step 1: Select User
                </h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach(App\User::all() as $user)
                            <tr>
                                <th scope="row"> <input type="radio" name="user_radio" value="{{ $user->id }}"> </th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5>
                    Step 2: Select Seat
                </h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Seat Number</th>
                            <th scope="col">Window Seat</th>
                            <th scope="col">Bus Number</th>
                            <th scope="col">Company</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Arrive</th>
                            <th scope="col">Stops</th>
                            <th scope="col">Price TZS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Seat::where('user_id', null)->get() as $seat)
                            <tr>
                                <th scope="row"> <input type="radio" name="seat_radio" value="{{ $seat->id }}"> </th>
                                <td>{{ $seat->id }}</td>
                                <td> @if($seat->isWindowSeat) {{ "Yes" }} @else {{ "No" }} @endif</td>
                                <td>{{ $seat->bus->id }}</td>
                                <td>{{ $seat->bus->company }}</td>
                                <td>{{ $seat->bus->start_location }}</td>
                                <td>{{ $seat->bus->end_location }}</td>
                                <td>{{ date_format(new DateTime($seat->bus->start_time), 'H:i') }}</td>
                                <td>{{ date_format(new DateTime($seat->bus->end_time), 'H:i') }}</td>
                                <td>{{ $seat->bus->stops }}</td>
                                <td>{{ $seat->bus->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5>
                    Step 3: Submit
                </h5>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
