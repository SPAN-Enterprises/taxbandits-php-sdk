@extends('layouts.base')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<form action="/form_w2_success" method="post" name="create">
@csrf
<div class="container">

    <h2>Create a New Form W2</h2>

    <h3><u>FormW2/Create</u></h3>

    <h4><font  color="blue">Business Information</font></h4>

    <table>
        <tbody>

        <tr>
            <td class="labelName">
                Employer Name:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_Business_BusinessNm" maxlength="150" name="W2Forms_Business_BusinessNm" type="text">
            </td>

            <td class="labelName">
                EIN:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_0__Business_EINorSSN" maxlength="9" name="W2Forms_Business_EINorSSN" type="text">
            </td>
        </tr>



        <tr>
            <td class="labelName">
                Contact Name:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_0__Business_ContactNm" maxlength="27" name="W2Forms_Business_ContactNm" type="text">
            </td>

            <td class="labelName">
                Phone Number:
            </td>
            <td class="apifieldname vaT" colspan="1">
                <input id="W2Forms_0__Business_Phone" maxlength="10" name="W2Forms_Business_Phone" placeholder="Phone Number" type="text">
            </td>
        </tr>



        <tr>
            <td class="labelName">
                Email Address:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_0__Business_Email" maxlength="50" name="W2Forms_Business_Email" type="text">
            </td>

        </tr>


        <tr>
            <td class="labelName">
                Kind of Payer:
            </td>
            <td class="apifieldname vaT">

                <select id="W2Forms_0__Business_KindOfPayer" name="W2Forms_Business_KindOfPayer">
                    <option value="">--Please Select--</option>
                    <option value="REGULAR941">REGULAR941</option>
                    <option value="REGULAR944">REGULAR944</option>
                    <option value="AGRICULTURAL943">AGRICULTURAL943</option>
                    <option value="HOUSEHOLD">HOUSEHOLD</option>
                    <option value="MILITARY">MILITARY</option>
                    <option value="MEDICAREQUALGOVEM">MEDICAREQUALGOVEM</option>
                    <option value="RAILROADFORMCT1">RAILROADFORMCT1</option>
                </select>
            </td>

            <td class="labelName">
                Kind of Employer:
            </td>
            <td class="apifieldname vaT">

                <select id="W2Forms_0__Business_KindOfEmployer" name="W2Forms_Business_KindOfEmployer">
                    <option value="">--Please Select--</option>
                    <option value="NONEAPPLY">NONEAPPLY</option>
                    <option value="NONGOVT501C">NONGOVT501C</option>
                    <option value="STATEORLOCALNON501C">STATEORLOCALNON501C</option>
                    <option value="STATEORLOCAL501C">STATEORLOCAL501C</option>
                    <option value="FEDERALGOVT">FEDERALGOVT</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>

        <h4><font  color="blue">Employee Information</font></h4>
    <table>
<tbody>
        <tr>
            <td class="labelName">
                Name (W-2):
            </td>
            <td class="apifieldname username vaT" colspan="3">
                <input id="W2Forms_0__Employee_FirstNm" maxlength="15" name="W2Forms_Employee_FirstNm" placeholder="First Name" type="text">
                <input id="W2Forms_0__Employee_MiddleNm" maxlength="15" name="W2Forms_Employee_MiddleNm" placeholder="Middle Name" type="text">
                <input id="W2Forms_0__Employee_LastNm" maxlength="20" name="W2Forms_Employee_LastNm" placeholder="Last Name" type="text">
                <select id="W2Forms_0__Employee_Suffix" name="W2Forms_Employee_Suffix" style="width:100px !important;">
                    <option value="">Suffix</option>
                    <option value="Jr">Jr</option>
                    <option value="Sr">Sr</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                </select>
            </td>
        <tr>

        <tr>
            <td class="labelName">
                Employee's SSN:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_Employee_SSN" maxlength="9" name="W2Forms_Employee_SSN" type="text">
            </td>

            <td class="labelName">
                Phone Number:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_0_Employee_Phone" maxlength="10" name="W2Forms_Employee_Phone" type="text">
            </td>
        </tr>

        <tr>
            <td class="labelName">
                Email Address:
            </td>
            <td class="apifieldname vaT">
                <input id="W2Forms_0_Employee_Email" maxlength="50" name="W2Forms_Employee_Email" type="text">
            </td>

        </tr>

        </tbody>
    </table>



    <h4><font  color="blue">Form W2</font></h4>

    <table>
        <tr>
            <td class="labelName">
                The TaxYear:
            </td>
            <td class="apifieldname vaT">

                <select data-val="true" data-val-number="The field TaxYear must be a number." data-val-required="The TaxYear field is required." id="W2Forms_0_TaxYear" name="W2Forms_TaxYear">
                    <option value="">--Select--</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="labelName">1. Wages, tips, other compensation:</td>
            <td><input class="DollarSmall" data-val="true" data-val-number="The field Box1 must be a number." data-val-required="The Box1 field is required." id="W2Forms_0__FormDetails_Box1" maxlength="12" name="W2Forms_FormDetails_Box1" type="number" value="0"></td>
            <td class="labelName">2. Federal income tax withheld:</td>
            <td><input class="DollarSmall" data-val="true" data-val-number="The field Box2 must be a number." data-val-required="The Box2 field is required." id="W2Forms_0__FormDetails_Box2" maxlength="12" name="W2Forms_FormDetails_Box2" type="number" value="0"></td>
        </tr>

        <tr>
            <td class="labelName">3. Social security wages:</td>
            <td><input class="DollarSmall" data-val="true" data-val-number="The field Box3 must be a number." data-val-required="The Box3 field is required." id="W2Forms_0__FormDetails_Box3" maxlength="12" name="W2Forms_FormDetails_Box3" type="number" value="0"></td>
            <td class="labelName">4. Social security tax withheld:</td>
            <td><input class="DollarSmall" data-val="true" data-val-number="The field Box4 must be a number." data-val-required="The Box4 field is required." id="W2Forms_0__FormDetails_Box4" maxlength="12" name="W2Forms_FormDetails_Box4" type="number" value="0"></td>
        </tr>
    </table>


</div>

<input type="submit" value="Save Form W2" />
</form>

@endsection