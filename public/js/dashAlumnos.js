// Código para el gráfico (Chart.js)
const ctx = document.getElementById('rendimientoChart').getContext('2d');
const rendimientoChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Prog. 3', 'Sist. Operativos', 'Inglés', 'Estadística'],
        datasets: [{
            label: 'Nota final',
            data: [8, 6, 9, 7],
            backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 10 }
        }
    }
});
const baseUrl = "<?php echo RUTA_URL; ?>";

document.addEventListener('DOMContentLoaded', function () {
    const cacheMaterias = {};
    const botones = document.querySelectorAll('.ver-materias-btn');

    botones.forEach(btn => {
        btn.addEventListener('click', function () {
            const idCarrera = this.getAttribute('data-id');
            const contenedor = document.getElementById('materias-' + idCarrera);

            if (contenedor.style.display === 'none' || contenedor.style.display === '') {
                if (cacheMaterias[idCarrera]) {
                    contenedor.innerHTML = cacheMaterias[idCarrera];
                    contenedor.style.display = 'block';
                    this.textContent = 'Ocultar Materias';
                    return;
                }

                contenedor.innerHTML = '<div>Cargando materias...</div>';
                contenedor.style.display = 'block';

                fetch(`${baseUrl}/AlumnoController/getMaterias/${idCarrera}`)
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        if (data.error) {
                            html = '<div class="text-danger">Error al cargar materias.</div>';
                        } else if (data.length === 0) {
                            html = '<div>No hay materias para esta carrera.</div>';
                        } else {
                            html = '<ul class="list-group">';
                            data.forEach(materia => {
                                html += `<li class="list-group-item">
                                    <strong>${materia.nombreMateria}</strong><br>
                                    Cuatrimestre: ${materia.cuatrimestre} | Turno: ${materia.turno} | Día: ${materia.DiaCursada} <br>
                                    Hora: ${materia.horaInicio} - ${materia.horaFin} <br>
                                    Profesor: ${materia.nombreProfesor} ${materia.apellidoProfesor}
                                </li>`;
                            });
                            html += '</ul>';
                        }

                        cacheMaterias[idCarrera] = html;
                        contenedor.innerHTML = html;
                        btn.textContent = 'Ocultar Materias';
                    })
                    .catch(() => {
                        contenedor.innerHTML = '<div class="text-danger">Error de conexión.</div>';
                    });
            } else {
                contenedor.style.display = 'none';
                this.textContent = 'Ver Materias';
            }
        });
    });
});
