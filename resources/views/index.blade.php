@extends('layouts.base')
@section('content')
<h3>Business</h3>

<form action="/create_business" method="get">
    <input type="submit" value="Create Business"/>
</form>

<p></p>
<p></p>

<form action="/business_list" method="get">
    <input type="submit" value="Get Business List"/>
</form>

<h3>Form 1099-NEC</h3>

<form action="/render_template_create_form_1099_nec" method="get">
    <input type="submit" value="Create Form 1099-NEC"/>
</form>

<p></p>
<p></p>

<form action="/render_template_nec_list" method="get">
    <input type="submit" value="Form 1099-NEC List"/>
</form>

<h3>Form W2</h3>

<form action="/render_template_create_form_w2" method="get">
    <input type="submit" value="Create Form W2" />
</form>

<p></p>
<p></p>

<form action="/render_template_w2_list" method="get">
    <input type="submit" value="Form W2 List" />
</form>
<h3>Form 1099-MISC</h3>

<form action="/render_template_create_form_1099_misc" method="get">
    <input type="submit" value="Create Form 1099-MISC"/>
</form>

<p></p>
<p></p>

<form action="/render_template_1099_misc_list" method="get">
    <input type="submit" value="Form 1099-MISC List"/>
</form>

<p></p>
<p></p>

<h3>Form W9</h3>


<form action="/render_template_w9" method="get">
    <input type="submit" value="Form W9"/>
</form>




@endsection