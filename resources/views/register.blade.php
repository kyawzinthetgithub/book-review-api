<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book-Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');

        body {
            background: #fff;
            font-family: 'PT Sans', sans-serif;
        }

        h2 {
            padding-top: 1.5rem;
        }

        a {
            color: #333;
        }

        a:hover {
            color: #da5767;
            text-decoration: none;
        }

        .card {
            border: 0.40rem solid #f8f9fa;
            top: 10%;
        }

        .form-control {
            background-color: #f8f9fa;
            padding: 20px;
            padding: 25px 15px;
            margin-bottom: 1.3rem;
        }

        .form-control:focus {

            color: #000000;
            background-color: #ffffff;
            border: 3px solid #da5767;
            outline: 0;
            box-shadow: none;

        }

        .btn {
            padding: 0.6rem 1.2rem;
            background: #da5767;
            border: 2px solid #da5767;
        }

        .btn-primary:hover {


            background-color: #df8c96;
            border-color: #df8c96;
            transition: .3s;

        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h2 class="card-title text-center">Book Review</h2>
                    <div class="card-body py-md-4">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">

                            </div>
                            <div class="form-group">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>


                            <div class="form-group">
                                @error('password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a href="{{route('user#login')}}">Login</a>
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
