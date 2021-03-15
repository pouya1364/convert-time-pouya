$( document ).ready(function () {
    // set date 
    var date =  $('#form_marsDate');
    date.datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
        
    });
    // set today date
    date.datepicker('setDate', 'today');

    // set time
    $('#form_marsTime').timepicker({
        format: 'hh-mm-ss',
        showMeridian: false,
        showSeconds: true,
    });
    
    // on submit send date and time to api/convert
    $("#form_convert_mars_date").submit(function(event){
        event.preventDefault();
      
        var date = $("#form_marsDate").val();
        var time = $("#form_marsTime").val();
        var datetime = date+' '+time;
        var alertBox = $("#alert-box"); 
        $.ajax({
            url : 'api/convert',
            data: {datetime: datetime},
            type : "post",
            dataType: "json",
            success : function(response){
                if (response.status ==200)
                {
                    alertBox.hide();
                    // show mars and martian time
                    $("#mars_date").html(response.data.mars_sol_date);
                    $("#martin_date").html(response.data.martian_coordinated_time);
                   
                } else {
                    // show alert in case of bad response
                    alertBox.show();
                    $("#alert-box").html(response.message);
                }
            }
        });
    });
});