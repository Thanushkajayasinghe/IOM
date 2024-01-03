<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #2e2e2e;
        text-align: center;
        padding: 2px;
    }
</style>
<br>
Main Applicant passport no : <b style="color: #ff0a14;">{{ $MainpassportNumber }}</b> , <br><br>

Applicant Date : <b style="color: #1b4b72;">{{ $date }}</b> , <br><br>

Applicant Time : <b style="color: #1b4b72;">{{ $time }}</b> . <br><br><br>

<table width="100%">
    <thead style="background-color: darkslategray;color: wheat;">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Passport No</th>
        <th>Appointment No</th>
        <th>Barcode</th>
    </tr>
    </thead>
    <tbody>

    @foreach($result2 as $data)
        <tr>
            <td> {{ $data->FirstName }} </td>
            <td> {{ $data->LastName }} </td>
            <td> {{ $data->PassportNumber}}</td>
            <td> {{ $data->AppointmentNumber }}</td>
            <td style="text-align: center"><img src="data:image/png;base64,{{ $data->barcode }}"
                                                style="text-align: center; height: 35px; width:130px;"
                                                alt="Barcode - Not working with Gmail."/></td>
        </tr>
    @endforeach

    </tbody>
</table>
<p style="color: red;">* This appointment not send to IHU. You can edit this appointment using "Retrieve application to edit" button. You have to select new appointment date & time when retrieving appointment.</p>


<br>
<span style="font-size: 13px;">This is an automatically generated email – please do not reply to it. If you have any queries regarding your appointment please email ihacsl@iom.int</span>
<br> <br> <br>
<br>


