document.getElementById('menuInicio').addEventListener('click', function() {
    window.location.href = '../welcome.html';
});

document.getElementById('menuBusqueda').addEventListener('click', function() {
    document.getElementById('searchPanel').style.display = 'flex';
});

document.getElementById('closeSearchPanel').addEventListener('click', function() {
    document.getElementById('searchPanel').style.display = 'none';
});

function verProducto(productoId) {
    alert('Información del ' + productoId);
    // Aquí puedes redirigir a una página de detalles del producto o mostrar un modal con más información
}