<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Local Update Project</title>


    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <div class="container">
        <div class="flash-message">
            @foreach (['danger', 'success'] as $msg)
                @if (Session::has($msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
        <hr>
        <form action="{{ route('store.product') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="fname">Product Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Product Name">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="price" name="price" placeholder="Price">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Description</label>
                </div>
                <div class="col-75">
                    <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Add">
            </div>
        </form>
        <hr>
        <table border="1" style="width:100%">
            <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Country</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td align="center">{{ $product->name }}</td>
                    <td align="center">{{ $product->price }}</td>
                    <td align="center">{!! $product->description !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
