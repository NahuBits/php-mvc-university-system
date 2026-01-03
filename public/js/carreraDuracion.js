document.addEventListener('DOMContentLoaded', function () {
    const tipoCarrera = document.getElementById('tipoCarrera');
    const campoAnios = document.getElementById('campoDuracionAnios');
    const campoMeses = document.getElementById('campoDuracionMeses');

    function mostrarCampoDuracion() {
        const tipo = tipoCarrera.value;
        if (tipo === 'Curso') {
            campoAnios.style.display = 'none';
            campoMeses.style.display = 'block';
        } else if (tipo === 'Grado' || tipo === 'PosGrado') {
            campoAnios.style.display = 'block';
            campoMeses.style.display = 'none';
        } else {
            campoAnios.style.display = 'none';
            campoMeses.style.display = 'none';
        }
    }

    tipoCarrera.addEventListener('change', mostrarCampoDuracion);
    mostrarCampoDuracion(); // Llamar al cargar para preselección
});
