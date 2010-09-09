/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(iniciar);


function iniciar(){
$('#liquidar').click(controlLiq);

}


function controlLiq(){
    //Si algun checkbox es true dejo facturar.
    var checkbox = $('.checkbox');
      var flag=false
    for (i=0;i<checkbox.length; i++){
       if (checkbox[i].checked==true){
            flag=true
         }
     }

 if (flag==false){
     alert("Debe seleccionar una orden para liquidar")
 }else{
     if (confirm("Desea liquidar los remitos seleccionados?")){
     $('#formliquidacion').submit();
     }
 }
}