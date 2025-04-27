function verPerfil(id) {
    const perfilDialog = document.getElementById("perfilDialog");

    fetch(`get_perfil.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar el perfil');
            }
            return response.json();
        })
        .then(perfil => {
            if (perfil) {
                // Asignar los valores de perfil a los campos correspondientes
                document.getElementById("foto").src = perfil.Foto;
                document.getElementById("nombre").textContent = perfil.Nombre1;
                document.getElementById("nombre2").textContent = perfil.Nombre2;
                document.getElementById("apellido1").textContent = perfil.Apellido1;
                document.getElementById("apellido2").textContent = perfil.Apellido2;
                document.getElementById("telefono").textContent = perfil.Telefono;
                document.getElementById("fechaNac").textContent = perfil.Fecha_Nac;
                document.getElementById("dui").textContent = perfil.Dui;
                document.getElementById("direccion").textContent = perfil.Direccion;
                document.getElementById("correo").textContent = perfil.Correo;
                document.getElementById("descripcion").textContent = perfil.Descripcion;
                document.getElementById("cuenta").textContent = perfil.Cuenta;

                perfilDialog.style.display = "block";
            } else {
                alert("Perfil no encontrado");
            }
        })
        .catch(error => {
            alert(error.message);
        });
}

function aceptarPerfil(perfilId) {
    // Realiza una solicitud AJAX para cambiar el estado del perfil
    fetch(`transferir_perfil.php?id=${perfilId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cambiar el estado del perfil');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Redirige a aceptados.php después de la actualización exitosa
                window.location.href = 'aceptados.php';
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            alert(error.message);
        });
}
function denegarPerfil(perfilId) {
    // Realiza una solicitud AJAX para cambiar el estado del perfil
    fetch(`transferirperfilB.php?id=${perfilId}&estado=Bloqueada`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cambiar el estado del perfil');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Redirige a bloqueados.php después de la actualización exitosa
                window.location.href = 'bloqueados.php';
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            alert(error.message);
        });
}
function cerrarDialog() {
    // Cierra la ventana flotante
    document.getElementById("perfilDialog").style.display = "none";
}

