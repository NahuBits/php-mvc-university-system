const btnScrollTop = document.getElementById("btnVolverArriba");

    // Mostrar/Ocultar botón en función del scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            btnScrollTop.style.display = "block";
        } else {
            btnScrollTop.style.display = "none";
        }
    });

    // Al hacer clic, volver arriba suavemente
    btnScrollTop.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
