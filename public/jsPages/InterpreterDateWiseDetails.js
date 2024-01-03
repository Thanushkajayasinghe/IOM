$(document).ready(function () {

    var MainPassport = "";

    SetDateTime();
    function SetDateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var day = now.getDate();

        if (month.toString().length == 1) {
            month = '0' + month;
        }
        if (day.toString().length == 1) {
            day = '0' + day;
        }

        var date = year + '-' + month + '-' + day;

        $('#AppointmentDate').val(date).change();
        search();
    }

    $('#AppointmentDate').on('change', function () {
        search();
    });

    $('#btnSearch2').on('click', function () {
        search();
    });

    function search() {
        var table = $('#descript2').DataTable();
        table.destroy();

        var AppointmentDate = $('#AppointmentDate').val();

        $.ajax({
            url: 'DateWiseDetailsAll',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'ViewDetails',
                date: AppointmentDate
            },
            success: function (data) {

                var htmls3 = "";
                $(data.result).each(function (key, val) {


                    var Address = val.CdAddress;
                    if (Address == null) {
                        Address = "";
                    }
                    var Street = val.CdStree;
                    if (Street == null) {
                        Street = "";
                    }
                    var City = val.CdCity;
                    if (City == null) {
                        City = "";
                    }
                    var PostalCode = val.CdPostalCode;
                    if (PostalCode == null) {
                        PostalCode = "";
                    }
                    var SponsorName = val.SponsorName;
                    if (SponsorName == null) {
                        SponsorName = "";
                    }
                    var SponsorMobile = val.SponsorMobile;
                    if (SponsorMobile == null) {
                        SponsorMobile = "";
                    }

                    if (val.MemberStatus == "MainMember") {
                        MainPassport = val.PassportNumber;
                        htmls3 += "<tr style='background-color:#b9abbf'>";
                    } else {
                        htmls3 += "<tr style='background-color:#b3dff1'>";
                    }

                    var cosn = 0;
                    var specialneeds = "";
                    if (val.wheelChairAccess == "true") {
                        cosn++;
                        specialneeds += "Wheel Chair Access, ";
                    }
                    if (val.motherWithChildrenLess5 == "true") {
                        cosn++;
                        specialneeds += "Mother with children less than 5 years of age, ";
                    }
                    if (val.feedingRoom == "true") {
                        cosn++;
                        specialneeds += "Feeding Room, ";
                    }
                    if (val.otherNeeds != null) {
                        cosn++;
                        specialneeds += val.otherNeeds;
                    }

                    if (cosn > 0) {
                        htmls3 += "<td style=\"background: red; color: white;\">" + (key + 1) + "</td>";
                    } else {
                        htmls3 += "<td>" + (key + 1) + "</td>";
                    }
                    htmls3 += "<td>" + val.FirstName + "</td>" +
                        "<td>" + val.LastName + "</td>" +
                        "<td>" + val.PassportNumber + "</td>" +
                        "<td>" + val.CountryOfOrigin + "</td>" +
                        "<td>" + val.AppointmentNumber + "</td>" +
                        "<td>" + val.DateOfBirth + "</td>" +
                        "<td>" + getAge(val.DateOfBirth) + "</td>" +
                        "<td>" + Address + "</td>" +
                        "<td>" + Street + "</td>" +
                        "<td>" + City + "</td>" +
                        "<td>" + PostalCode + "</td>" +
                        "<td>" + SponsorName + "</td>" +
                        "<td>" + SponsorMobile + "</td>" +
                        "<td>" + val.MemberStatus + "</td>";

                    if (val.date == null) {
                        htmls3 += "<td></td>";
                    } else {
                        htmls3 += "<td>" + val.date + "</td>";
                    }
                    if (val.time == null) {
                        htmls3 += "<td></td>";
                    } else {
                        htmls3 += "<td>" + val.time + "</td>";
                    }

                    if (val.visaRenewalOrNot == null) {
                        htmls3 += "<td>Renewal</td>";
                    } else {
                        htmls3 += "<td>" + val.visaRenewalOrNot + "</td>";
                    }



                    htmls3 += "<td>" + specialneeds + "</td>";
                    htmls3 += "</tr>";
                });
                $('#tbody').html(htmls3);
            },
            complete: function () {
                loadDataTable();
            }
        });
    }

    function getAge(birthDateString) {
        var today = new Date();
        var birthDate = new Date(birthDateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function loadDataTable() {

        var table1 = $('#descript2').DataTable({
            "pageLength": 25,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            dom: 'Blfrtip',
            buttons: [
                'csv', 'excel'
            ],
            "aaSorting": []
        });

    }

});