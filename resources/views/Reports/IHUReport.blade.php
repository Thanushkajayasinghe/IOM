<html>
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

        body{
            font-size: 10px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">IHU Report</h1>
<table>
    <tr>
        <th></th>
		<th style="text-align: center;">Date</th>
        <th style="text-align: center;">Passport No</th>
		<th style="text-align: center;">First Name</th>
        <th style="text-align: center;">Last Name</th>
        <th style="text-align: center;">Country</th>
		<th style="text-align: center;">Sponsor Name</th>  
        <th style="text-align: center;">Photo</th>              
    </tr>
    {{$no = 0}}
    @foreach($res as $data)
        {{$no++}};
        <tr>
            <td style="text-align: center;">{{$no}}</td>				
			<td>{{$date = (new DateTime($data->createddate))->format('Y/m/d')}}</td>
            <td>{{$data->PassportNumber}}</td>            
            <td>{{$data->FirstName}}</td>
            <td>{{$data->LastName}}</td>
			<td>{{$data->Nationality}}</td>
			<td>{{$data->SponsorName}}</td>
            <td style="text-align: center;"><img src="{{asset('tempFileUpload/photoBoothFiles/')}}/{{$data->reg_photo_booth}}" width="70"/></td>                        
        </tr>
    @endforeach
</table>

</body>
</html>


