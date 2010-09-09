///*
// * To change this template, choose Tools | Templates
// * and open the template in the editor.
// */
//$(document).ready(iniciar);
//
//
//function iniciar(){
//
//$('#remito_guardar').click(validar);
//
//}
//
//
//function validar(){
//
//    if(validarHora()){
//        if(validarKm()){
//            $('#remitoform').submit()
//        }else{
//            alert("Kilometro final menor a inicial")
//        }
//    }else{
//        alert("Kilometros Final menor a inicial")
//    }
//
//
//}
//function validarHora(){
//    var diaini=$("#remito_horaIni_year").val() +
//        $("#remito_horaIni_month").val() +
//        $("#remito_horaIni_day").val() +
//        $("#remito_horaIni_hour").val() +
//        $("#remito_horaIni_minute").val();
//    var diafin=
//        $("#remito_horaFin_year").val() +
//        $("#remito_horaFin_month").val() +
//        $("#remito_horaFin_day").val() +
//        $("#remito_horaFin_hour").val() +
//        $("#remito_horaFin_minute").val();
//    if(diafin<diaini){
//        alert("La fecha inicial es mayor a la final")
//        return false;
//    }else{
//        return true;
//    }
//
//}
//
//function validarKm(){
//
//    var kmini=$("#remito_km_ini").val();
//    var kmfin=$("#remito_km_fin").val();
//    if(kmfin<kmini){
//        return false;
//    }else{
//        return true;
//    }
//
//
//}