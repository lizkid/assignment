<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        .input-container
        {
            margin-bottom: 10px;
        }
    </style>

</head>

<body style="background: #365a94; color: white;">

<div style="margin-top: 50px; ">

    <h4 style="text-transform: capitalize; text-align: center; padding: 5px">
        Welcome to cargo upload system
    </h4>

    <div style="left: 50%; top: 50%; transform: translate(-50%, -50%); position: absolute;">

        <div>
            @include('partial.flash')
        </div>

        <div>
            <h5 class="text-center" >Login </h5>
            <h5 class="text-center">(<span style="font-size: 14px; color: white;">default username: admin, default password:admin</span>)</h5>
        </div>

        <div style="margin: auto; display: block; width: 100%">
            <form action="{{url('/login')}}" method="post" >
                @csrf

                <div class="input-container">
                    <label>Username</label>
                    <input required type="text" name="username" class="form-control" id="inputGroupFile02">
                </div>

                <div class="input-container">
                    <label>Password</label>
                    <input required type="password" name="password" class="form-control" id="inputGroupFile02">
                </div>


                <div>
                    <button class="btn btn-info" type="submit">Login</button>
                </div>


            </form>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</body>


</html>


