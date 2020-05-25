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

        <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Bus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this bus?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <form method="POST" action="/buses/{{ $bus->id }}">
                            @csrf
                            @method('DELETE')
                            
                            <input type="submit" class="btn btn-danger" value="Delete">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="book">Make A Booking</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/bus">Bus Management <span class="sr-only">(current)</span></a>
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

            <div class="row">
                <div class="col-6">
                    <h5>Bus Details</h5>
                    <p>Number: {{ $bus->id }}</p>
                    <p>Company: {{ $bus->company }}</p>
                    <p>From: {{ $bus->start_location }}</p>
                    <p>To: {{ $bus->end_location }}</p>
                    <p>Depart: {{ date_format(new DateTime($bus->start_time), 'H:i') }}</p>
                    <p>Arrive: {{ date_format(new DateTime($bus->end_time), 'H:i') }}</p>
                    <p>Stops: {{ $bus->stops }}</p>
                    <p>Price: {{ $bus->price }} TZS</p>
                </div>
            </div>

            <a href="/buses/{{ $bus->id }}/edit" class="btn btn-primary">Edit</a>
            <a href="/bus" class="btn btn-secondary">Back</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">
              Delete
            </button>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
