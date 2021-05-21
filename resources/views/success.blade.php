@extends('layouts.base')
@section('content')
<div>

    @if ($ErrorMessage !=null)
    <h3>{{$ErrorMessage}}</h3>
    @endif

    <form action="/redirect_form_list" method="get">
        @if ($response !=null)
        <p>{{$response}}</p>
        @endif

        
        <input id="formtype" name="formtype" style="display:none;" value=$formtype>
        
        <button type="submit">List</button>
       
    </form>

</div>
@endsection