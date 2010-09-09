/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(iniciar);


function iniciar(){
$('#facturar').click(control);

 obtenerURLParam();
}

function control(){
    //Si algun checkbox es true dejo facturar.
    var checkbox = $('.checkbox');
      var flag=false
    for (i=0;i<checkbox.length; i++){
       if (checkbox[i].checked==true){
            flag=true
         }
     }

 if (flag==false){
     alert("Debe seleccionar una orden para facturar")
 }else{
     $('#formfacturar').submit();
 }
}



// Si en la url viene msj=1 selecciono ordenes de distinto cliente.
function obtenerURLParam(){
    var msj_param = gup( 'msj' );
    if (msj_param!=""){
        alert("Debe seleccionar ordenes del mismo cliente")
    }
    

}

function gup(name){
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp (regexS);
	var tmpURL = window.location.href;
	var results = regex.exec(tmpURL);
	if( results == null )
		return"";
	else
		return results[1];
}
