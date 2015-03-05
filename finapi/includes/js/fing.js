// JavaScript Document

//Valida los datos del campo iteraciones
function validarNro(e) {
var key;
if(window.event) {// IE
	key = e.keyCode; }
else if(e.which) {// Netscape/Firefox/Opera
	key = e.which; }
if (key < 48 || key > 57) {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else { return false; }}
return true;
}


// Marcar todos los checkbox del formulario
function marcar(source) {
	checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
	for(i=0;i<checkboxes.length;i++) {//recoremos todos los controles
		if(checkboxes[i].type == "checkbox") {//solo si es un checkbox entramos
			checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
}}}

//Valida que se ha elegido un metodo de salida
function validarMetodo(met)  {
if (met.value != "") {
		return true; }
	else {
		document.getElementById("errormetodo").style.display= "inline";
		return false; 
}}	

//Valida que se introducido un valor en iteraciones
function validarIteraciones(iter) {
	if (!/^([0-9])*$/.test(iter.value))	{
		document.getElementById("errorletra").style.display= "inline";
		return false; }
	else {
		if ((iter.value >=1) && (iter.value <= 99))
			return true;
		else 
		{
			document.getElementById("erroriteraciones").style.display= "inline";
			return false;
}}}
	
//Valida el formulario de rastreo.php
function validarFormRastreo(f) {
var metodo;
var iteraciones;
document.getElementById("errormetodo").style.display= "none";
document.getElementById("erroriteraciones").style.display= "none";

metodo = validarMetodo(f.elements[0]);
if (!metodo) {
	document.getElementById("metodo").focus();
	return false; }
	
iteraciones = validarIteraciones(f.elements[1]);
if (!iteraciones) {
		document.getElementById("iteraciones").focus();
		document.getElementById("iteraciones").select();
		return false; }
else {
	return true;
}}

//Valida el formulario de resultados.php
function validarFormResultados(f){
var contador = 0;
document.getElementById("noselec").style.display= "none";

for (i=0; ele=f.elements[i];i++)
	if(ele.type=="checkbox")
		if(ele.checked)
			contador++;
    if(contador==0)
        {
		document.getElementById("noselec").style.display= "inline";
		return false; 
		}
	else
		return true;

return confirm("¿Desea exportar los host seleccionados a NConf?")	
}