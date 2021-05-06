@extends('layouts.base')
@section('content')
<div class="container">

    <h2><u>Create a New Form 1099-MISC</u></h2>

    <h3>Form1099MISC/Create</h3>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form action="/save_form_1099_misc" method="post" id="createForm1099MISC">
    @csrf
        <div class="horizontalContainer">
            <label for="MISCForms_Business_BusinessId">Businesses:</label>
            <select id="MISCForms_Business_BusinessId" name="MISCForms_Business_BusinessId">
            @foreach ($businesses as $business)
                <option value={{ $business['BusinessId'] }}> {{ $business['BusinessNm'] }} - {{ $business['EINorSSN'] }}</option>
            @endforeach
            </select>
            <button type="button" id="loadRecipientsBtn" onclick="recipientsList()">Recipient List</button>
        </div>

        <div class="form-control">
            <label for="MISCForms_Recipient_RecipientId">Recipients:</label>
            <select class="form-control" id="MISCForms_Recipient_RecipientId" name="MISCForms_Recipient_RecipientId"
                    onchange="onRecipientClicked()">
                <option value="-1">Select Recipient</option>
            </select>
        </div>

        <div class="form-control">
            <label for="MISCForms_Recipient_RecipientNm">Recipient Name:</label>
            <input type="text" name="MISCForms_Recipient_RecipientNm" id="MISCForms_Recipient_RecipientNm"
                   placeholder="Recipient Name" maxlength="35"/>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="MISCForms_Recipient_TIN">Recipient TIN:</label>
            <input type="text" name="MISCForms_Recipient_TIN" id="MISCForms_Recipient_TIN" placeholder="Recipient TIN"
                   maxlength="9" value=""/>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="MISCForms_MISCFormDetails_Box1">Rents Amount:</label>
            <input type="text" name="MISCForms_MISCFormDetails_Box1" id="MISCForms_MISCFormDetails_Box1" maxlength="12"
                   value="167.25"/>
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="MISCForms_MISCFormDetails_Box2">Royalties Amount:</label>
            <input type="text" name="MISCForms_MISCFormDetails_Box2" id="MISCForms_MISCFormDetails_Box2" maxlength="12"/>
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="MISCForms_MISCFormDetails_Box3">Other Income Amount:</label>
            <input type="text" name="MISCForms_MISCFormDetails_Box3" id="MISCForms_MISCFormDetails_Box3" maxlength="12"/>
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="MISCForms_MISCFormDetails_Box4">Federal income tax withheld Amount:</label>
            <input type="text" name="MISCForms_MISCFormDetails_Box4" id="MISCForms_MISCFormDetails_Box4" maxlength="12"/>
            <small>Error message</small>
        </div>

        <div class="form-control">Few fields are auto-populated with default values in this page</div>

        <input type="submit" value="Submit">
    </form>
    <br>
</div>

<script type=text/javascript>

    var recipientList = []

    function recipientsList()
    {
        $.ajax({
			url: '/get_recipient_by_business_id_misc',
			data: {BusinessId: $('#MISCForms_Business_BusinessId').val()},
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
               $("#MISCForms_Recipient_RecipientId").html(s);
			},
			error: function(error){
				console.log(error);
			}
		});
    }

    function onRecipientClicked()
    {
        var e = document.getElementById("MISCForms_Recipient_RecipientId");
        var strAtt = e.options[e.selectedIndex].getAttribute('name'); // will return the value
        var recipientName = e.options[e.selectedIndex].text; // will return the inner html text
        if(strAtt!=null)
        {
            strAtt = strAtt.replace("-","");
            document.getElementById("MISCForms_Recipient_TIN").innerHTML = strAtt;
            document.getElementById("MISCForms_Recipient_TIN").value = strAtt;
            document.getElementById("MISCForms_Recipient_RecipientNm").innerHTML = recipientName;
            document.getElementById("MISCForms_Recipient_RecipientNm").value = recipientName;
        }
    }

</script>
@endsection