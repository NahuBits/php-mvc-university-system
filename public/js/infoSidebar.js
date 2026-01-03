function openCourse(card) {
    const title = card.dataset.title;
    const image = card.dataset.image;
    const description = card.dataset.fullDescription;
  
    document.getElementById('courseTitle').innerText = title;
    document.getElementById('courseImage').src = image;
    document.getElementById('courseDescription').innerText = description;
  
    const sidebar = document.getElementById('mySidebar');
    sidebar.style.display = 'block';
    setTimeout(() => sidebar.classList.add('show'), 10);
    sidebar.setAttribute('aria-hidden', 'false');
  }
  
  function closeCourse() {
    const sidebar = document.getElementById('mySidebar');
    sidebar.classList.remove('show');
    sidebar.setAttribute('aria-hidden', 'true');
    setTimeout(() => sidebar.style.display = 'none', 500);
  }

  // Cerrar al presionar Escape
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    closeCourse();
  }
});

// Cerrar al hacer clic fuera del sidebar
document.addEventListener('click', function(event) {
  const sidebar = document.getElementById('mySidebar');
  const isClickInside = sidebar.contains(event.target) || event.target.closest('.course-card');

  if (!isClickInside && sidebar.classList.contains('show')) {
    closeCourse();
  }
});