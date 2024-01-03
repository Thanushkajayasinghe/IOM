<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
            padding: 10px;
            background-color: white !important;
        }

        tr td {
            padding: 3px 5px 3px !important;
        }
    </style>
</head>

<body>


<div class="row form-group">
    <div class="col-12">
        <h1 class="text-center">Welcome to ItSolutionStuff.com - {{ $title }}</h1>
    </div>
</div>


<div class="row form-group">
    <div class="col-10 offset-1">

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>


<div class="row form-group">
    <div class="col-12">
        <table class="table table-bordered table-condensed table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Nationality</th>
                <th>Gender</th>
                <th>Passport Number</th>
                <th>Date Of Birth</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $we)
                <tr>
                    <td style="text-align: center;">{{ $we->id }}</td>
                    <td>{{ $we->NameInFull }}</td>
                    <td>{{ $we->Nationality }}</td>
                    <td>{{ $we->Gender }}</td>
                    <td>{{ $we->PassportNumber }}</td>
                    <td>{{ $we->DateOfBirth }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>

</html>
