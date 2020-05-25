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
            <form method="POST" action="/buses">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="company">
                                Company
                            </label>
                            <input type="text" name="company" class="form-control" placeholder="Bus Tanzania" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="start_location">
                                From
                            </label>
                            <input type="text" name="start_location" class="form-control" placeholder="Dar es Salaam" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="end_location">
                                To
                            </label>
                            <input type="text" name="end_location" class="form-control" placeholder="Arusha" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="start_time">
                                Depart
                            </label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="end_time">
                                Arrive
                            </label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="stops">
                                Number of stops
                            </label>
                            <input type="number" name="stops" class="form-control" min="0" max="3" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="price">
                                Price
                            </label>
                            TZS<input type="number" name="price" class="form-control" placeholder="2000">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="/bus" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
