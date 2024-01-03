<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<div class="page">
    <table width="100%" border="1">
        <thead>
        <tr>
            <th>Passport No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Photo ID</th>
            <th>Sponsor Name</th>
            <th>Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($res as $data)
            <tr>
                <td>{{$data->CurrentPassportNumber}}</td>
                <td>{{$data->FirstName}}</td>
                <td>{{$data->LastName}}</td>
                <td style="text-align: center;"><img src="{{asset('tempFileUpload/photoBoothFiles/')}}/{{$data->reg_photo_booth}}" width="100"></td>
                <td>{{$data->SponsorName}}</td>
                <td>{{$data->FinalReview}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>
</body>
</html>

