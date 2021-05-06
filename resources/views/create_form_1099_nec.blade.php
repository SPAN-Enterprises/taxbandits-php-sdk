@extends('layouts.base')
@section('content')
<div class="container">

    <h2><u>Create a New Form 1099-NEC</u></h2>

    <h3>Form1099NEC/Create</h3>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form action="/save_form_1099_nec" method="post" id="createForm1099NEC">
    @csrf
        <div class="horizontalContainer">
            <label for="business_list">Businesses:</label>
            <select id="business_list" name="business_list">
            @foreach ($businesses as $business)
                <option value={{ $business['BusinessId'] }}>{{ $business['BusinessNm'] }} - {{ $business['EINorSSN'] }}</option>
            @endforeach
            </select>
            <button type="button" id="loadRecipientsBtn" onclick="loadRecipientsList()">Recipient List</button>
        </div>

        <div class="form-control">
            <label for="recipientsDropDown">Recipients:</label>
            <select class="form-control" id="recipientsDropDown" name="recipientsDropDown"
                    onchange="onRecipientClicked()">
                <option value="-1">Select Recipient</option>
            </select>
        </div>

        <div class="form-control">
            <label for="rName">Recipient Name:</label>
            <input type="text" name="rName" id="rName" placeholder="Recipient Name" maxlength="35"/>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="rTIN">Recipient TIN:</label>
            <input type="text" name="rTIN" id="rTIN" placeholder="Recipient TIN" maxlength="9" value=""/>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="amount">Nonemployee compensation:</label>
            <input type="number" name="amount" id="amount" value="167.25"/>
            <small>Error message</small>
        </div>

        <div class="form-control">Few fields are auto-populated with default values in this page</div>

        <input type="submit" value="Submit">
    </form>
    <br>
</div>

<script type=text/javascript>

    var recipientList = []

    function loadRecipientsList()
    {
        $.ajax({
			url: '/get_recipient_by_business_id',
			data: {BusinessId: $('#business_list').val()},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type: 'POST',
			success: function(data){

                var s = '<option value="-1">Select Recipient</option>';
			    if(data!=null)
				{
                    var json = JSON.parse(data);
                    var jsonData=json['Form1099Records'];

                    if(jsonData!=null && jsonData.length>0)
                    {
                        for (var i = 0; i < jsonData.length; i++) {

                            var recipientName;
                            
                            if(jsonData[i]['Recipient']!=null && jsonData[i]['Recipient']['RecipientNm']!=null)
                            {
                                 recipientName=jsonData[i]['Recipient']['RecipientNm'];
                            }
                            else if(jsonData[i]['Recipient']!=null && jsonData[i]['Recipient']['RecipientName']!=null)
                            {
                                recipientName=jsonData[i]['Recipient']['RecipientName'];
                            }

                            s += '<option value="' + jsonData[i]['Recipient']['RecipientId'] + '" name="' + jsonData[i]['Recipient']['TIN'] + '">'  +recipientName +' - ' +jsonData[i]['Recipient']['TIN'] + '</option>';
                        }
                    }
               }
               $("#recipientsDropDown").html(s);
			},
			error: function(error){
				console.log(error);
			}
		});
    }

    function onRecipientClicked()
    {
        var e = document.getElementById("recipientsDropDown");
        var strAtt = e.options[e.selectedIndex].getAttribute('name'); // will return the value
        var recipientName = e.options[e.selectedIndex].text; // will return the inner html text

        if(strAtt!=null)
        {
            strAtt = strAtt.replace("-","");
            document.getElementById("rTIN").innerHTML = strAtt;
            document.getElementById("rTIN").value = strAtt;
            document.getElementById("rName").innerHTML = recipientName;
            document.getElementById("rName").value = recipientName;
        }
    }
</script>
@endsection