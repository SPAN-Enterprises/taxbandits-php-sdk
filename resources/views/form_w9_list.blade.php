@extends('layouts.base')
@section('content')
<form id="myForm">

    <h2><u>Payees</u></h2>

    <ul>
        <!-- Iterate over object_list -->

        @foreach ($Payees as $payee)

        <div class="form-list">
            <li onclick="getdata('{{ $payee['uid']}}');">
                <div>{{ $payee['PayeeName']}}</div>
                <div>{{ $payee['Email'] }}</div>
            </li>
        </div>

        @endforeach
    </ul>
</form>

<script>

    function getdata(uid) {
        window.location = '/form_w9_view?uid=' + uid;
    }


</script>
@endsection