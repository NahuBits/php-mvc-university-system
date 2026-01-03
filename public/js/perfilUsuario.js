 const btnEditar = document.getElementById('btnEditar');
  const btnModificar = document.getElementById('btnModificar');
  const form = document.getElementById('perfilForm');

  btnEditar.addEventListener('click', () => {
    // Habilitar todos los inputs dentro del form
    form.querySelectorAll('input').forEach(input => input.disabled = false);
    btnModificar.disabled = false; // habilita botón modificar
    btnEditar.disabled = true; // deshabilita botón editar para evitar doble click
  });