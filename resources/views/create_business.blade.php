@extends('layouts.base')
@section('content')
<div class="container">
    <form action="/success" method="post" name="create">
    @csrf
        <!--Create business Endpoint-->
        <h2><u>Create Business</u></h2>

        <h3>Business/Create</h3>

        <div class="form-control">
            <label for="business_name">Business Name:</label>
            <input id="txtBusinessName" type="text" name="business_name" placeholder="Business Name" maxlength="75" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="trade_nm">Trade Name:</label>
            <input type="text" name="trade_nm" placeholder="Trade Name" maxlength="75" /><br>
            <small>Error message</small>

        </div>

        <div class="form-control">

            <input type="checkbox" name="is_ein" placeholder="Is EIN" />
            <label for="is_ein">Is EIN?</label>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="ein_or_ssn">EIN or SSN:</label>
            <input id="txtEinOrSsn" type="tel" maxlength="9" name="ein_or_ssn" placeholder="EIN or SSN" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" maxlength="40" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="contact_nm">Contact Name:</label>
            <input type="text" id="contact_nm" name="contact_nm" placeholder="Contact Name" maxlength="27" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone" maxlength="10" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="phone_extn">Phone Extn:</label>
            <input type="tel" maxlength="5" id="phone_extn" name="phone_extn" placeholder="Phone Extn" value="12345" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="fax">Fax:</label>
            <input type="text" name="fax" id="fax" placeholder="Fax" maxlength="10" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="business_Type">Business Type:</label>
            <!--            <input type="text" name="business_Type" id="business_Type" placeholder="BusinessType" maxlength="75"/>-->
            <select id="business_Type"></select>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="sa_name">Signing Authority Name:</label>
            <input type="text" name="sa_name" id="sa_name" placeholder="Signing Authority Name" value="Jacob" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="sa_phone">Signing Authority Phone:</label>
            <input type="tel" name="sa_phone" id="sa_phone" placeholder="Signing Authority Phone" maxlength="10" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="business_member_type">Business Member Type:</label>
            <select id="business_member_type"></select>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="kind_of_employer">Kind Of Employer:</label>
            <!--            <input type="text" name="kind_of_employer" id="kind_of_employer" placeholder="KindOfEmployer"/>-->
            <select id="kind_of_employer" name="kind_of_employer"></select>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="kind_of_payer">Kind Of Payer:</label>
            <!--            <input type="text" name="kind_of_payer" id="kind_of_payer" placeholder="KindOfPayer"/>-->
            <select id="kind_of_payer" name="kind_of_payer"></select>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <input type="checkbox" name="is_business_terminated" id="is_business_terminated"
                placeholder="Is Business Terminated?" />
            <label for="is_business_terminated">Is Business Terminated?</label>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <input type="checkbox" name="is_foreign" id="is_foreign" placeholder="Is Foreign?"
                onclick="enableOrDisableFields()" />
            <label for="is_foreign">Is Foreign?</label>
        </div>

        <div class="form-control">
            <label for="address1">Address 1:</label>
            <input type="text" name="address1" id="address1" placeholder="Address1" maxlength="35" value="22 St" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label for="address2">Address 2:</label>
            <input type="text" name="address2" id="address2" placeholder="Address2" maxlength="35"
                value="Clair Ave E" />
        </div>

        <div class="form-control">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" placeholder="City" maxlength="27" value="Pine Hill" />
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label id="state_lbl" for="state">State:</label>
            <input type="text" name="state" id="state" placeholder="State" maxlength="30" style="display:none"
                value="Ontario" />
            <select id="state_drop_down" name="state_drop_down"></select>
            <small>Error message</small>
        </div>

        <div class="form-control">
            <label id="zip_code_lbl" for="zip_cd">ZipCd:</label>
            <input type="text" name="zip_cd" id="zip_cd" placeholder="ZipCd" value="36769" />
            <small>Error message</small>
        </div>

        <div class="form-control" id="country_div" style="display:none">
            <label for="country">Country:</label>
            <!--            <input type="text" name="country" id="country" placeholder="Country" maxlength="2"/><br>-->
            <select id="country" name="country"></select>
            <small>Error message</small>
        </div>
        <br>
        <div class="form-control">Few fields are auto-populated with default values in this page</div>
        <br>
        <input type="submit" value="Create Business" />

    </form>

</div>

<script>

    (function () {
        // your page initialization code here
        loadElements();
        // the DOM will be available here
    })();


    function enableOrDisableFields() {

        var country = document.getElementById("country");

        country.disabled = document.getElementById("is_foreign").checked ? false : true;

        changeFieldName();
    }

    function changeFieldName() {
        var zipCodeLbl = document.getElementById("zip_code_lbl");
        var stateLbl = document.getElementById("state_lbl");
        var fieldVal = document.getElementById("zip_cd");
        var stateFieldVal = document.getElementById("state");

        if (document.getElementById("is_foreign").checked == true) {
            zipCodeLbl.innerHTML = "PostalCd";
            fieldVal.placeholder = "PostalCd";
            stateLbl.innerHTML = "ProvinceOrStateNm";
            stateFieldVal.placeholder = "ProvinceOrStateNm";
            stateFieldVal.maxLength = 30;
            var x = document.getElementById("country_div");

            x.style.display = "block";

            document.getElementById("state").style.display = "block";
            document.getElementById("state_drop_down").style.display = "none";

        }
        else {
            zipCodeLbl.innerHTML = "ZipCd";
            fieldVal.placeholder = "ZipCd";
            stateLbl.innerHTML = "State";
            stateFieldVal.placeholder = "State";
            stateFieldVal.maxLength = 2;

            var x = document.getElementById("country_div");

            x.style.display = "none";

            document.getElementById("state").style.display = "none";
            document.getElementById("state_drop_down").style.display = "block";
        }
    }


    function loadElements() {
        var list = ["CA", "MX", "AF", "AX", "XI", "AL", "AG", "AQ", "AN", "AO", "AV", "AY", "AC",
            "AR", "AM", "AA", "XA", "AT", "AS", "AU", "AJ", "XZ", "BF", "BA", "FQ", "BG", "BB", "BS", "BO",
            "BE", "BH", "BN", "BD", "BT", "BL", "BK", "BC", "BV", "BR", "IO", "VI", "BX", "BU", "UV", "BM",
            "BY", "CB", "CM", "XY", "CV", "CJ", "CT", "CD", "XC", "CI", "CH", "KT", "IP", "CK", "CO", "CN",
            "CF", "CG", "CW", "CR", "VP", "CS", "IV", "HR", "CU", "CY", "EZ", "DA", "DX", "DJ", "DO", "DR",
            "TT", "EC", "EG", "ES", "UK", "EK", "ER", "EN", "ET", "EU", "FK", "FO", "FM", "FJ", "FI", "FR",
            "FG", "FP", "FS", "GB", "GA", "GZ", "GG", "GM", "GH", "GI", "GO", "GR", "GL", "GJ", "GP", "GQ",
            "GT", "GK", "GV", "PU", "GY", "HA", "HM", "HO", "HK", "HQ", "HU", "IC", "IN", "ID", "IR", "IZ",
            "EI", "IS", "IT", "JM", "JN", "JA", "DQ", "JE", "JQ", "JO", "JU", "KZ", "KE", "KQ", "KR", "KN",
            "KS", "KU", "KG", "LA", "LG", "LE", "LT", "LI", "LY", "LS", "LH", "LU", "MC", "MK", "MA", "MI",
            "MY", "MV", "ML", "MT", "IM", "RM", "MB", "MR", "MP", "MF", "MQ", "MD", "MN", "MG", "MJ", "MH",
            "MO", "MZ", "XM", "WA", "NR", "BQ", "NP", "NL", "NT", "NC", "NZ", "NU", "NG", "NI", "NE", "NF",
            "XN", "CQ", "NO", "MU", "OC", "PK", "LQ", "PS", "PM", "PP", "PF", "PA", "PE", "RP", "PC", "PL",
            "PO", "RQ", "QA", "RE", "RO", "RS", "RW", "WS", "SM", "TP", "SA", "XS", "SG", "RI", "SE", "SL",
            "SN", "XR", "LO", "SI", "BP", "SO", "SF", "SX", "SP", "PG", "CE", "SH", "SC", "ST", "SB", "VC",
            "SU", "NS", "SV", "WZ", "SW", "SZ", "SY", "TW", "TI", "TZ", "TH", "TO", "TL", "TN", "TD", "XT",
            "TE", "TS", "TU", "TX", "TK", "TV", "UG", "UP", "AE", "UY", "UZ", "NH", "VT", "VE", "VM", "VQ",
            "WQ", "XW", "WF", "WE", "WI", "YM", "YI", "ZA", "ZI"];

        var select = document.getElementById("country");

        for (var i = 0; i < list.length; i++) {
            var optn = list[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }

        loadBusinessTypeList();


        loadKindOfEmployer();

        loadKindOfPayer();

        loadStateList();

        loadBusinessMemberType();
    }

    function loadBusinessTypeList() {
        var bList = ["ESTE", "PART", "CORP", "EORG", "SPRO"];
        var select = document.getElementById("business_Type");

        for (var i = 0; i < bList.length; i++) {
            var optn = bList[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }
    }

    function loadKindOfEmployer() {
        var eList = ["FEDERALGOVT", "STATEORLOCAL501C", "NONGOVT501C", "STATEORLOCALNON501C", "NONEAPPLY"];
        var select = document.getElementById("kind_of_employer");

        for (var i = 0; i < eList.length; i++) {
            var optn = eList[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }
    }

    function loadKindOfPayer() {
        var eList = ["REGULAR941", "REGULAR944", "AGRICULTURAL943", "HOUSEHOLD", "MILITARY", "MEDICAREQUALGOVEM", "RAILROADFORMCT1"];
        var select = document.getElementById("kind_of_payer");

        for (var i = 0; i < eList.length; i++) {
            var optn = eList[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }
    }

    function loadStateList() {
        var sList = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY", "AS", "FM", "GU", "MH", "MP", "PW", "PR", "VI", "AA", "AE", "AP"];
        var select = document.getElementById("state_drop_down");

        for (var i = 0; i < sList.length; i++) {
            var optn = sList[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }
    }
    function loadBusinessMemberType() {
        var typeList = ["CORPORATESECRETARY", "SECRETARYTREASURER", "PARTNER", "GENERALPARTNER", "LIMITEDPARTNER", "LLCMEMBER", "MANAGINGMEMBER", "MANAGER", "TAXMATTERPARTNER", "PRESIDENT", "VICEPRESIDENT", "CORPORATETREASURER", "TREASURER", "ASSISTANTTREASURER", "CHIEFACCOUNTINGOFFICER", "CHIEFEXECUTIVEOFFICER", "CHIEFFINANCIALOFFICER", "TAXOFFICER", "CHIEFOPERATINGOFFICER", "CORPORATEOFFICER", "EXECUTIVEDIRECTOR", "DIRECTOR", "CHAIRMAN", "EXECUTIVEADMINISTRATOR", "RECEIVER", "PASTOR", "ASSISTANTTORELIGIOUSLEADER", "REVEREND", "PRIEST", "MINISTER", "RABBI", "LEADEROFRELIGIOUSORGANIZATION", "SECRETARY", "DIRECTOROFTAXATION", "DIRECTOROFPERSONNEL", "ADMINISTRATOR", "EXECUTOR", "TRUSTEE", "FIDUCIARY", "OWNER", "SOLEPROPRIETOR", "MEMBER", "SOLEMEMBER"];
        var select = document.getElementById("business_member_type");

        for (var i = 0; i < typeList.length; i++) {
            var optn = typeList[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            el.name = optn;
            el.id = optn;
            el.form = select.form;
            select.appendChild(el);
        }
    }

</script>
@endsection