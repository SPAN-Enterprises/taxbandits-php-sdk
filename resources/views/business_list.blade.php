@extends('layouts.base')
@section('content')
<form id="myForm">

    <h2><u>Business List</u></h2>

    <h3>Business/List</h3>

    <ul>
        <!-- Iterate over object_list -->

        @foreach ($businesses as $business)

        <div class="form-list">
            <li onclick="getdata('{{ $business['BusinessId']}}','{{ $business['EINorSSN']}}');">

                <div>
                    Business Id: {{ $business['BusinessId'] }}
                </div>
                <div>Business Name: {{ $business['BusinessNm']}}</div>
                <div>Email: {{ $business['Email'] }}</div>
                <div>EIN or SSN: {{ $business['EINorSSN'] }}
                </div>

            </li>
        </div>

        @endforeach
    </ul>
</form>

<script>

    function getdata(business_id, ein) {
        window.location = '/business_detail?business_id=' + business_id + '&ein=' + ein;
    }


</script>
@endsection