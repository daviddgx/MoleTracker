function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la funci�n lo que predetermina que div estar� oculto hasta llamar a la funci�n nuevamente*/
muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}