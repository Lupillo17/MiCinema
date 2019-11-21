$(function(){
    var paginacion = $('.pagination');
    //ocultar la paginacion
    //paginacion.hide();
    //agregar link de mostrar mas
    //paginacion.after("<div class='mostrar-mas'><a href='#'>Mostrar mas</a></div>");
    

    /*paginacion tipo FACEBOOK
    //buscar nuevos resultados con ajax en pagina siguiente
    $('.mostrar-mas').on('click',function(e){
        e.preventDefault();
        $.ajax({
            type:'GET',
            //busca el atributo href de las etiquetas a con rel=next
            url: $(".pagination li a[rel$='next']").attr('href'),
            success: function(html){
                var nuevasPeliculas=$(html).find('table tbody'),
                    nuevaPaginacion=$(html).find('.pagination'),
                    tabla          =$('table');
                tabla.find('tbody').append(nuevasPeliculas.html());
                tabla.after(nuevaPaginacion.hide());
            }
        });
    });*/
})