@extends('layouts.base')
@section('content')

<h1>Form W9</h1>

<iframe
  src={{ $FormW9['W9Url'] }}
  style="
    
    bottom: 0px;
    right: 0px;
    width: 100%;
    border: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    z-index: 999999;
    height: 500px;
    border:2px solid #ccc;
  ">
  </iframe>
  





@endsection