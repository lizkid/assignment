<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>creating cargo</title>

    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/style.css')}}">

    <style>
        .spinner-border

        {
            display: none;
        }

        .main-wrapper{
            margin: 20px;
        }

        .header
        {
            text-align: center; margin: 20px;
            text-transform: capitalize;
        }

        .submit_btn_container{
            margin-left: 50px;
        }

        .view_btn_container
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }

        .submit_btn_container > button, .view_btn_container > button{
            background: green;
            color: white;
            width: 100px;
            border-color: green;
            outline: green;
            padding: 5px;
            transition: 0.3s ease-in-out;
        }

        .submit_btn_container > button:hover, .view_btn_container > button:hover{
            background: #3a983a;
            border-color: #3a983a;
            outline: #3a983a;
        }
    </style>

</head>

<body>

<div class="main-wrapper">


    <div >

        <div>
            @include('partial.flash')
        </div>

        <div>
            <h5 class="header" >cargo saving</h5>
        </div>

        <div style="margin: auto; display: block; width: 100%">
            <form action="{{url('/cargo/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($errors->has('file'))
                    <span style="color: red; font-size: 14px;">{{$errors->first('file')}}</span>
                @endif
                <div style="display: flex; flex-direction: row; justify-content: start">
                    <div class="input-group mb-3">
                        <input required type="file" name="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>

                    <div class="submit_btn_container">
                        <button type="submit">Upload</button>
                    </div>
                </div>

                <div class="view_btn_container">
                    <button type="button" id="view_btn">View Data</button>
                </div>

                <div style="top: 50%; left: 50%; position: absolute" class="col-md-12">
                    <div style="display: none;"   class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </form>

            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>

            <div class=" d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table customize-table mb-0 v-middle border">
                                <thead class="table-light">
                                <tr>
                                    <th class="border-bottom border-top">No:</th>
                                    <th class="border-bottom border-top">Cargo No</th>
                                    <th class="border-bottom border-top">Cargo type</th>
                                    <th class="border-bottom border-top">Cargo size</th>
                                    <th class="border-bottom border-top">Weight (Kg)</th>
                                    <th class="border-bottom border-top">Remarks:</th>
                                    <th class="border-bottom border-top">Wharfage (USD)</th>
                                    <th class="border-bottom border-top">Penalty (Days)</th>
                                    <th class="border-bottom border-top">Storage (USD)</th>
                                    <th class="border-bottom border-top">Electricity (USD)</th>
                                    <th class="border-bottom border-top">Distuffing (USD)</th>
                                    <th class="border-bottom border-top">Lifting (USD)</th>

                                </tr>
                                </thead>
                                <tbody class="latest-trans">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {

        $('#view_btn').click(function () {

            setTimeout(function () {

                $('.spinner-border').show();

                $.ajax({

                    url: "{{url('/cargo/get-all-cargos')}}",  //url for the backend php
                    method: "GET",   //method used

                    success:function (res){

                        console.log(res.data)

                        if (res.data.length == 0)
                        {
                            $('.table-responsive').text('No records found')
                        }

                        else
                        {
                            $.each(res.data , function(index, item) {

                                let x = +index + +1;
                                $('.latest-trans').append("<tr>\
                                       \<td>"+x+"</td>\
										<td>"+item.cargo_no+"</td>\
										<td>"+item.cargo_size+"</td>\
										<td>"+item.cargo_type+"</td>\
										\<td>"+item.weight+"</td>\
										<td>"+item.remarks+"</td>\
										\<td>"+item.wharfage+"</td>\
										\<td>"+item.penalty+"</td>\
										<td>"+item.storage+"</td>\
										\<td>"+item.electricity+"</td>\
										\<td>"+item.destuffing+"</td>\
										<td>"+item.lifting+"</td>\
										</tr>");
                            });
                        }

                    }

                });

                $('.spinner-border').hide();
            }, 3000)

        })
    })
</script>
</body>


</html>


