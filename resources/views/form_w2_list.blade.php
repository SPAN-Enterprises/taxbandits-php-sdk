@extends('layouts.base')
@section('content')
<div class="container">

    <h2><u>Form W2 LIST</u></h2>

    <h3>FormW2/List</h3>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="horizontalContainer">
        <label for="MISCForms_Business_BusinessNm">Businesses:</label>
        <select id="MISCForms_Business_BusinessNm" name="MISCForms_Business_BusinessNm">
            @foreach ($businesses as $business)
            <option value={{ $business['BusinessId'] }}>{{ $business['BusinessNm'] }} - {{ $business['EINorSSN'] }}</option>
            @endforeach
        </select>
        <button type="button" onclick="loadw2List()">Get W2 List</button>
    </div>

    <div>
        <h2>List:</h2><br>
        <div id="listDiv" class="card">

        </div>
    </div>

    <div class="card" id="noDataDiv">

        <div class="container1">
            <h3>No data found</h3>
        </div>
    </div>

</div>

<script type=text/javascript>

    function removeAllChildNodes(parent) {
        while (parent.firstChild) {
            parent.removeChild(parent.firstChild);
        }
    }

    function transmitClicked(submissionId)
    {
        console.log(submissionId);
        window.location = '/transmit_form1099_misc?submissionId=' + submissionId;
    }

    function getPdfClicked(submissionId)
    {
        console.log(submissionId);
        window.location = '/form_1099_misc/get_pdf?submissionId=' + submissionId;
    }

    function loadw2List()
    {
        $.ajax({
			url: '/form_w2_list',
			data: {BusinessId: $('#MISCForms_Business_BusinessNm').val()},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type: 'POST',
			success: function(data){
                

                var json = JSON.parse(data);
                var jsonData=json['FormW2Records'];

                // Make a container element for the list
                listContainer = document.getElementById("listDiv");
                // Make the list
                listElement = document.createElement('div');
                listElement.className = "container2";
                removeAllChildNodes(listContainer);
                // Set up a loop that goes through the items in listItems one at a time
                var numberOfListItems = jsonData.length;
                var listItem;
                var i;
                // Add it to the page

                if(numberOfListItems>0)
                {
                   
                    listContainer.appendChild(listElement);
                    document.getElementById("noDataDiv").style.display = "none";
                    for (i = 0; i < numberOfListItems; ++i) 
                    {
                        // create an item for each one
                        rName = document.createElement('h3');
                        businessName = document.createElement('p');
                        listItem = document.createElement('p');
                        listItem1 = document.createElement('p');

                       
                        var recipientName;
                        if(jsonData[i]['Employee']!=null && jsonData[i]['Employee']['EmployeeName']!=null)
                        {
                            recipientName=jsonData[i]['Employee']['EmployeeName'];
                            
                        }
                        
                        
                        rName.innerHTML = recipientName +' - '+jsonData[i]['Employee']['SSN'];
                        listItem1.innerHTML = 'RecordId: '+ jsonData[i]['Employee']['EmployeeId'];
                        listItem.innerHTML = 'SubmissionId: '+ jsonData[i]['SubmissionId'];
                        listItem.value = jsonData[i]['SubmissionId'];
                        businessName.innerHTML = jsonData[i]['BusinessNm'];

                        // Add listItem to the listElement
                        listElement.appendChild(rName);
                        listElement.appendChild(listItem);
                        listElement.appendChild(listItem1);
                        listElement.appendChild(businessName);

                        if(jsonData[i]['Employee']['Status'] == "CREATED")
                        {
                            transmitBtn = document.createElement('button');
                            transmitBtn.innerHTML = "Transmit";
                            transmitBtn.value = jsonData[i]['SubmissionId'];
                            transmitBtn.className = "btn";
                            idVal = jsonData[i]['SubmissionId'];
                            transmitBtn.setAttribute("id", idVal);
                            listElement.appendChild(transmitBtn);

                            document.getElementById(idVal).addEventListener("click", function(e){
                                transmitClicked(e.target.id);
                            });
                        }else if(jsonData[i]['Employee']['Status'] == "TRANSMITTED")
                        {

                        getPDF = document.createElement('button');
                        getPDF.innerHTML = "Get PDF";
                        getPDF.value = jsonData[i]['SubmissionId'];
                        getPDF.className = "btn";
                        idVal = jsonData[i]['SubmissionId'];
                        getPDF.setAttribute("id", idVal);
                        listElement.appendChild(getPDF);
                        document.getElementById(idVal).addEventListener("click", function(e){
                                getPdfClicked(e.target.id);
                            });
                        }

                        listElement.appendChild(document.createElement('br'));

                        if((i+1)!=numberOfListItems)
                            listElement.appendChild(document.createElement('hr'));
                        
                   }
               }
               else
               {
                    document.getElementById("noDataDiv").style.display = "block";
               }
            },
			error: function(error){
				console.log(error);
			}
		});
    }

</script>
@endsection