document.addEventListener('DOMContentLoaded', function() {
    loadUsers();

    function loadUsers() {
        fetch('/editarUsers/view_users.php')
            .then(response => response.json())
            .then(data => {
                const usersTable = document.querySelector('#usersTable tbody');
                usersTable.innerHTML = '';
                data.forEach(user => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${user.id}</td>
                        <td>${user.user}</td>
                        <td>
                            <button class="edit" onclick="editUser(${user.id})">Editar</button>
                            <button class="delete" onclick="deleteUser(${user.id})">Eliminar</button>
                        </td>
                    `;
                    usersTable.appendChild(row);
                });
            });
    }

    window.editUser = function(id) {
        const newUsername = prompt('Ingrese el nuevo nombre de usuario:');
        if (newUsername) {
            fetch(`/editarUsers/edit_user.php?id=${id}&user=${newUsername}`)
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    loadUsers();
                });
        }
    };

    window.deleteUser = function(id) {
        if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
            fetch(`/editarUsers/delete_user.php?id=${id}`)
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    loadUsers();
                });
        }
    };

    window.searchUser = function() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#usersTable tbody tr');
        rows.forEach(row => {
            const username = row.cells[1].textContent.toLowerCase();
            if (username.includes(searchInput)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    };
});