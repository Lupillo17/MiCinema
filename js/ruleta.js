var arregloColores=[];
/*agregar elemento
    arregloColores.push('algo');
eliminar elemento
    arregloColores.pop();*/

var ruleta = new Winwheel({
    'canvasId': 'canvas',
    'numSegments': 4,
    'segments':[
        {'textFontFamily':'Georgia', 'fillStyle': generarColor(), 'text': 'Pelicula 1'},
        {'textFontFamily':'Georgia', 'fillStyle': generarColor(), 'text': 'Pelicula 2'},
        {'textFontFamily':'Georgia', 'fillStyle': generarColor(), 'text': 'Pelicula 3'},
        {'textFontFamily':'Georgia', 'fillStyle': generarColor(), 'text': 'Pelicula 4'},
    ],
    'textDirection': 'reversed',
    'lineWidth': 2,
    'animation':
    {
        'type': 'spinToStop',
        'duration': 5,
        'callbackFinished': Mensaje(),
        'callbackAfter': dibujarIndicador()
    }
});
function Mensaje() {
    var SegmentoSeleccionado = ruleta.getIndicatedSegment();
    alert("Elemento seleccionado:" + SegmentoSeleccionado.text + "!");
    ruleta.stopAnimation(false);
    ruleta.rotationAngle = 0;
    ruleta.draw();
    dibujarIndicador();
}
function dibujarIndicador() {
    var ctx = ruleta.ctx;
    ctx.strokeStyle = 'navy';
    ctx.fillStyle = 'black';
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(170, 0);
    ctx.lineTo(230, 0);
    ctx.lineTo(200, 40);
    ctx.lineTo(171, 0);
    ctx.stroke();
    ctx.fill();
}
function generarColor(){
    var letters = '0123456789ABCDEF';
    var color = '#';
    while (true) {
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        if(arregloColores.includes(color)){
            color='#';
        }else{
            arregloColores.push(color);
            return color;
        }
    } 
}
ruleta.segments[1].textFillStyle = '#FFFFFF';
ruleta.segments[2].textFillStyle = '#FFFFFF';
ruleta.segments[3].textFillStyle = '#FFFFFF';
ruleta.segments[4].textFillStyle = '#FFFFFF';

/*var centroImage = new Image();
centroImage.src="img/ImagenCentroRuleta.png";

centroImage.onload = function(){
    ruleta.wheelImage = centroImage;
    ruleta.draw();
}
*/
ruleta.draw();