var username = document.querySelector('.user').value;
var password = document.querySelector('.contra').value;
            
function login(){if (username === 'admin' && password === 'admin') {
                alert('Bienvenido');
                return true;
            } else {
                alert('Usuario o contraseña incorrectos');
                return false;
            }
        }
