@extends('layouts.base')
@section('content')

<div class="form-control">
    <h2>Errors</h2>
    <h3>{$status}}</h3>
    <br>
    <table id="errors">
        <tr>
            <th>Error Name</th>
            <th>Message</th>
        </tr>
        @foreach ($errorList as $error)
        <tr>
            <td> {{ $error['Name']}}</td>
            <td> {{ $error['Message']}}</td>
        </tr>

        @endforeach
    </table>

</div>

@endsection