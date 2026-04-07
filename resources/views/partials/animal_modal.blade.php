<!-- partials/animal_modal.blade.php -->
    <link rel="stylesheet" href="{{ asset('css/shared/pages.css') }}">

<!-- MODAL -->
<div id="animalModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>

        <img id="modalImg" src="" alt="">

        <h2 id="modalNombre"></h2>
        <p><strong>Edad:</strong> <span id="modalEdad"></span></p>
        <p><strong>Raza:</strong> <span id="modalRaza"></span></p>
        <p id="modalHistoria"></p>
    </div>
</div>

<script>
    function abrirModal(nombre, edad, raza, historia, foto) {
        document.getElementById('modalNombre').innerText = nombre;
        document.getElementById('modalEdad').innerText = edad;
        document.getElementById('modalRaza').innerText = raza;
        document.getElementById('modalHistoria').innerText = historia;
        document.getElementById('modalImg').src = foto;

        document.getElementById('animalModal').style.display = 'block';
    }

    function cerrarModal() {
        document.getElementById('animalModal').style.display = 'none';
    }

    /* cerrar al hacer click afuera */
    window.onclick = function(e) {
        const modal = document.getElementById('animalModal');
        if (e.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
