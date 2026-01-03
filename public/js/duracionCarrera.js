const carreras = window.carrerasData || [];

    document.getElementById('idCarrera').addEventListener('change', function () {
        const selectedId = this.value;
        const carrera = carreras.find(c => c.idCarrera == selectedId);

        const inputDuracion = document.getElementById('duracionCarrera');
        const cuatrimestreSelect = document.getElementById('cuatrimestre');
        const cuatrimestreContainer = document.getElementById('cuatrimestreContainer');

        // Limpiar opciones actuales
        cuatrimestreSelect.innerHTML = '<option value="">--Seleccione cuatrimestre--</option>';

        if (carrera) {
            if (carrera.tipoCarrera === 'Curso') {
                const semanas = Math.round((carrera.duracion_meses || 0) * 4.33);
                inputDuracion.value = `${semanas} semanas`;

                // Ocultar selección de cuatrimestre
                cuatrimestreContainer.style.display = 'none';

            } else if (['Grado', 'Posgrado'].includes(carrera.tipoCarrera)) {
                const cuatrimestres = (carrera.duracion_anios || 0) * 2;
                inputDuracion.value = `${cuatrimestres} cuatrimestres`;

                // Mostrar y cargar opciones de cuatrimestre
                for (let i = 1; i <= cuatrimestres; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = `${i}º Cuatrimestre`;
                    cuatrimestreSelect.appendChild(option);
                }

                cuatrimestreContainer.style.display = 'block';
            }
        } else {
            inputDuracion.value = '';
            cuatrimestreContainer.style.display = 'none';
        }
    });

    // Ocultar cuatrimestre por defecto al cargar

    document.addEventListener('DOMContentLoaded', () => {
    console.log(carreras);
    const cuatrimestreContainer = document.getElementById('cuatrimestreContainer');
    cuatrimestreContainer.style.display = 'none';

    // Forzar ejecución del cambio si ya hay una carrera seleccionada (edición)
    const carreraSelect = document.getElementById('idCarrera');
    if (carreraSelect.value) {
        carreraSelect.dispatchEvent(new Event('change'));
    }
});