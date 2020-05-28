/*!
  * Bootstrap v4.4.1 (https://getbootstrap.com/)
  * Copyright 2011-2019 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */

 function ReloadPage() {
    location.reload();
    return false;
}

function Salir(){
  window.location.href = "logout.php";

}

function carga() {
  document.getElementById('PreLoaderCont').className = 'hide';
  document.getElementById('Contenido').className = 'center animated pulse ';
}

