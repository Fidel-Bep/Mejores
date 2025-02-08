window.addEventListener('load', function () {
    console.log("cargado")
    document.getElementById('cambiar_datos').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
            .catch(error => console.error("Error al cargar la información:", error));


    })
    
    cargarInformacion("a_registro", "body_login");
    cargarInformacion("cambiar_datos", "principal");
    cargarInformacion("ver_amigos","principal")
 

    

})



/*
document.addEventListener('DOMContentLoaded', function() {
    function cargarInformacion(idevent, idinner) {
        document.addEventListener('click', function(event) {
            if (event.target && event.target.id === idevent) {
                event.preventDefault();

                let url = event.target.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById(idinner).innerHTML = data;
                        // Re-ejecutar cualquier script necesario después de cargar el contenido
                        ejecutarScripts();
                    })
                    .catch(error => console.error("Error al cargar la información:", error));
            }
        });
    }

    function ejecutarScripts() {
        // Aquí puedes agregar cualquier script que necesite ejecutarse después de cargar el contenido dinámicamente
        console.log("Scripts ejecutados después de cargar el contenido dinámicamente");
    }

    
});*/