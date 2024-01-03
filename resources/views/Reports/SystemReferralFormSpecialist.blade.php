<html>
<body>
<h5 style="text-align: center">Inbound Health Assessment Centre, Colombo</h5>

<table width="100%">
    <tr>
        <td width="50%">[Date] : {{date("Y-m-d")}}</td>
        <td width="50%"></td>
    </tr>
    <tr style="visibility: hidden">
        <td width="50%">gsdgdgsdgg</td>
        <td width="50%" style="text-align: right;"></td>
    </tr>
    <tr>
        <td width="50%">..................................</td>
        <td width="50%" style="text-align: right;"></td>
    </tr>
    <tr>
        <td width="50%">Dear Sir / Madam,</td>
        <td width="50%" style="text-align: right;"></td>
    </tr>
    <tr style="visibility: hidden">
        <td width="50%">gsdgdgsdgg</td>
        <td width="50%" style="text-align: right;"></td>
    </tr>
    <tr>
        <td width="50%"><strong>Referral of a Patient </strong></td>
        <td width="50%" style="text-align: right;"></td>
    </tr>
</table>

<table border="1" width="100%" style="margin-top: 10px;">
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Patient Name</th>
        <td colspan="2">{{$memberDetails[0]->FirstName}} {{$memberDetails[0]->LastName}}</td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Date of Birth</th>
        <td colspan="2">{{$memberDetails[0]->DateOfBirth}}</td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Age</th>
        <td colspan="2">{{(date('Y') - date('Y',strtotime($memberDetails[0]->DateOfBirth)))}}</td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Sex</th>
        <td colspan="2">{{$memberDetails[0]->Gender}}</td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Passport No</th>
        <td colspan="2">{{$memberDetails[0]->PassportNumber}}</td>
    </tr>
</table>

<table border="1" width="100%" style="margin-top: 20px;">
    <tr>
        <th width="60%" style="vertical-align: middle; height: 2%;">Reason for referral :</th>
    </tr>
    <tr>
        <td width="60%" style="vertical-align: middle; height: 6%;"></td>
    </tr>
</table>

<table border="1" width="100%" style="margin-top: 20px;">
    <tr>
        <th width="60%" style="vertical-align: middle; height: 2%;">Radiology report :</th>
    </tr>
    <tr>
        <td width="60%" style="vertical-align: top; height: 6%;">{{$radiologistReporting[0]}}</td>
    </tr>
</table>

<table border="1" width="100%" style="margin-top: 20px;">
    <tr>
        <th style="height: 2%;" colspan="2">Other Investigations performed :</th>
    </tr>
    <tr>
        <th>Investigation</th>
        <th>Result</th>
    </tr>
    <tr>
        <td style="height: 6%;"></td>
        <td style="height: 6%;"></td>
    </tr>
</table>

<table border="0" width="100%" style="margin-top: 20px;">
    <tr>
        <td>Kindly referring for your consultation and needful.</td>
    </tr>
    <tr style="visibility: hidden;">
        <td>Kindly referring for your consultation and needful.</td>
    </tr>
    <tr>
        <td>Thank You.</td>
    </tr>
    <tr style="visibility: hidden;">
        <td>Kindly referring for your consultation and needful.</td>
    </tr>
    <tr>
        <td>.........................................</td>
    </tr>
    <tr>
        <td>Referring Panel Physician</td>
    </tr>
</table>

</body>
</html>


