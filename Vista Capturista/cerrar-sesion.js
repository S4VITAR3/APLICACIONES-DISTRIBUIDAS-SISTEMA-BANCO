


function cerrar(){
    // sessionStorage.removeItem('sessionStorage.getItem("rolUsuario")');
    sessionStorage.clear();
    console.log(sessionStorage.getItem("rolUsuario"));
    window.location.href = 'index.html';
}
