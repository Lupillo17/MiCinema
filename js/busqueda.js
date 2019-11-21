$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: "http://localhost/MiCinema/paginacion2.php",
        type:"POST",
        dataType:"html",
        data:{ sql: consulta},
    })
    .done(function(respuesta){
        $(".datos").html(respuesta);
        console.log(respuesta);
    })
    .fail(function(res){
        console.log("error");
    })
}

$(document).on('keyup','#txt_buscar',function(){
    var valor = $(this).val();
    if(valor!=""){
        buscar_datos(valor);
        console.log(valor);
    }else{
        buscar_datos();
    }
})