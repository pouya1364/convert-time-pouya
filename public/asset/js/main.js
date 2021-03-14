
$(document).ready(function () {
    var date =  $('#form_marsDate');
    date.datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
        
    });
    date.datepicker('setDate', 'today');

    $('#form_marsTime').timepicker({
        format: 'hh-mm-ss',
        showMeridian: false,
        showSeconds: true,
    });
    
    $("#form_convert").submit(function(event){
        event.preventDefault();
      
        var date = $("#form_marsDate").val();
        var time = $("#form_marsTime").val();
        var datetime = date+' '+time;

        $.ajax({
            url : 'api/convert',
            data: {datetime: datetime},
            type : "post",
            dataType: "json",
            success : function(response){
                if (response.status ==200)
                {
                    $("#mars_date").html(response.data.mars_sol_date);
                    $("#martin_date").html(response.data.martian_coordinated_time);
                   
                } else {
                    $("#alert").toggle();
                    $("#alert").html(response.message);

                }
            }
        });
    });
});