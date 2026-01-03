
    document.addEventListener('DOMContentLoaded', function () {
      const myCarouselElement = document.querySelector('#carouselUTN');
      if (myCarouselElement) {
        new bootstrap.Carousel(myCarouselElement, {
          interval: 2000,
          ride: 'carousel',
          pause: false, // por si pasa el mouse encima
          wrap: true
        });
      }
    });
  
  
