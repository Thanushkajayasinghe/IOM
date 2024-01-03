<style type="text/css">
    img {
        padding-left: 20px;
    }
</style>

<h3 style="text-align: center;">Inbound Health Assessment Center</h3>
<h3 style="text-align: center;">80A, {{ Session::get('Floor') }}<sup>th</sup> Floor, IBSL Building, Elvitigala Mawatha,
    Colombo 08, Sri Lanka.
</h3>
<h2 style="text-align: center;">Payment Receipt</h2>
<br>
<div class="col-md-12 form-group">
    <div class="col-md-12">
        <span>
            Date : {{ $date }}
        </span>
        <br>
        <span>
            Time : {{ $time }}
        </span>
        <br>
        <span>
            User : {{ Session::get('title') }} {{Session::get('firstName')}} {{Session::get('lastName')}}
        </span>
        <br>
    </div>
    <br>
    <br>

    <div class="col-md-12">
        <table class="table table-hover table-striped nowrap text-center" width="100%">
            <thead style="border: 1px solid black;">
                <tr style="border: 1px solid black;">
                    <th width="25%">Appointment No</th>
                    <th width="25%">Passport</th>
                    <th width="25%">Name</th>
                    <th width="20%" style="text-align: right;">Amount (Rs.)</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid black;">
                @foreach($arr as $data)
                <tr style="border: 1px solid black;">
                    <td>{{ $data['appointment_no'] }}</td>
                    <td>{{ $data['passport_no'] }}</td>
                    <td>{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
                    <td style="text-align: right;">{{ number_format($data['payment'], 2, '.', ',') }}</td>
                </tr>
                @endforeach

                <tr style="font-weight:900;">
                    <td style="border-top:1px solid black;"></td>
                    <td style="border-top:1px solid black;"></td>
                    <td style="border-top:1px solid black;">Total</td>
                    <td style="text-align: right;border-top:1px solid black;">{{ number_format($total, 2, '.', ',') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>