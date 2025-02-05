document.querySelector('.login').addEventListener('click', function() {
    var username = document.querySelector('.user').value;
    var password = document.querySelector('.contra').value;
    
    if (username === 'admin' && password === 'admin') {
        alert('Bienvenido');
    } else {
        // alert('Usuario o contraseña incorrectos'); // Eliminar esta línea
    }
});