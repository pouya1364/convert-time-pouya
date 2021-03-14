$(document).ready(function () {
                
    $("#form_convert").submit(function(event){
        event.preventDefault();
      
        var datetime = $("#form_marsDateTime").val();

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
                    $("#alert").html('<div>lass="d-flex align-items-center justify-content-center alert alert-danger " 
                                        role="alert" style="height: 50px;"> <div><h3>This is an Alert</h3>
                                        ');
                }
            }
        });
    });
});