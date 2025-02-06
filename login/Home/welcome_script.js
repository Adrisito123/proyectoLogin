document.getElementById('cerrarSesionBtn').addEventListener('click', function() {
    window.location.href = '/inicioSesion/index.html';
});

document.getElementById('menuInicio').addEventListener('click', function() {
    window.location.href = '/Home/welcome.html';
});

document.getElementById('menuTienda').addEventListener('click', function() {
    window.location.href = '/Home/tienda/tienda.html';
});

document.getElementById('menuContacto').addEventListener('click', function() {
    document.querySelector('.cabeceraFinal').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('menuBusqueda').addEventListener('click', function() {
    document.getElementById('searchPanel').style.display = 'flex';
});

document.getElementById('closeSearchPanel').addEventListener('click', function() {
    document.getElementById('searchPanel').style.display = 'none';
});

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('mensages/contact_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('confirmationMessage').style.display = 'block';
            
            setTimeout(function() {
                document.getElementById('confirmationMessage').style.display = 'none';
            }, 3000); // Ocultar el mensaje después de 3 segundos
        }
    })
    .catch(error => console.error('Error:', error));
});