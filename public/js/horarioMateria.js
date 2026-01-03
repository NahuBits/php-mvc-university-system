const rangos = {
    'Mañana': ['08:00', '12:00'],
    'Tarde': ['13:00', '17:00'],
    'Noche': ['18:00', '22:00']
};

function generarOpcionesHorario(inicio, fin, pasoMinutos = 30) {
    const opciones = [];
    let [h, m] = inicio.split(':').map(Number);
    const [hFin, mFin] = fin.split(':').map(Number);

    while (h < hFin || (h === hFin && m <= mFin)) {
        const hora = `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
        opciones.push(hora);

        m += pasoMinutos;
        if (m >= 60) {
            m = 0;
            h += 1;
        }
    }

    return opciones;
}

function actualizarHoraInicio(turnoSeleccionado) {
    const horaInicio = document.getElementById('horaInicio');
    const [inicio, fin] = rangos[turnoSeleccionado];
    const opciones = generarOpcionesHorario(inicio, restarMinutos(fin, 30)); // Hasta 30 mins antes del fin

    horaInicio.innerHTML = '';
    opciones.forEach(hora => {
        const option = document.createElement('option');
        option.value = hora;
        option.textContent = hora;
        horaInicio.appendChild(option);
    });

    actualizarHoraFin(); // cargar opciones iniciales de fin
}

function actualizarHoraFin() {
    const turno = document.getElementById('turno').value;
    const horaInicio = document.getElementById('horaInicio').value;
    const horaFin = document.getElementById('horaFin');
    const finTurno = rangos[turno][1];

    if (!horaInicio) return;

    const opcionesFin = generarOpcionesHorario(sumarMinutos(horaInicio, 30), finTurno);

    horaFin.innerHTML = '';
    opcionesFin.forEach(hora => {
        const option = document.createElement('option');
        option.value = hora;
        option.textContent = hora;
        horaFin.appendChild(option);
    });
}

function sumarMinutos(hora, minutos) {
    let [h, m] = hora.split(':').map(Number);
    m += minutos;
    while (m >= 60) {
        m -= 60;
        h += 1;
    }
    return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
}

function restarMinutos(hora, minutos) {
    let [h, m] = hora.split(':').map(Number);
    m -= minutos;
    while (m < 0) {
        m += 60;
        h -= 1;
    }
    return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
}

// EVENTOS

document.getElementById('turno').addEventListener('change', function () {
    actualizarHoraInicio(this.value);
});

document.getElementById('horaInicio').addEventListener('change', function () {
    actualizarHoraFin();
});