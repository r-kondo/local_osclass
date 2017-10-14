<script>
    $(document).ready(function(){
        $("#s_phone_mobile").rules("add", {required: true, messages: { required: "Mobile phone is required" }});
        /*$("#s_phone_land").rules("add", {required: true, messages: { required: "Land phone is required" }});*/
        /*$("#countryId").rules("add", {required: true, messages: { required: "Country is required" }});*/
        /*$("#region").rules("add", {required: true, messages: { required: "Region is required" }});*/
        /*$("#city").rules("add", {required: true, messages: { required: "City is required" }});*/
        /*$("#cityArea").rules("add", {required: true, messages: { required: "City area is required" }});*/
        $("#s_website").rules("add", {required: true, messages: { required: "Website is required" }});
    }); 
</Script>