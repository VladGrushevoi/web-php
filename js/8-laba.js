$(document).ready(function(){
    $.get("8-laba-result-xml.php", function(data, status){
        $("#result-xml").text(data + " " + status);
    })
    $( "#form" ).submit(function( event ) {
        event.preventDefault();
    
        const ip = $("#ip").val();
    
        $.post("8-laba-result-json.php",{
            ip: ip,
        },
        function(data,status){
            console.log(data);
            $("#result-json").text(data + " " + status);
        });
      });
})
