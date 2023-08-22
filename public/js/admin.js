(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach((e) => e.addEventListener(type, listener));
        } else {
            select(el, all).addEventListener(type, listener);
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select("#navbar .scrollto", true);
    const navbarlinksActive = () => {
        let position = window.scrollY + 200;
        navbarlinks.forEach((navbarlink) => {
            if (!navbarlink.hash) return;
            let section = select(navbarlink.hash);
            if (!section) return;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                navbarlink.classList.add("active");
            } else {
                navbarlink.classList.remove("active");
            }
        });
    };
    window.addEventListener("load", navbarlinksActive);
    onscroll(document, navbarlinksActive);

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select("#header");
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add("header-scrolled");
            } else {
                selectHeader.classList.remove("header-scrolled");
            }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
    }

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Initiate tooltips
     */
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    /**
     * Initiate Bootstrap validation check
     */
    var needsValidation = document.querySelectorAll(".needs-validation");

    Array.prototype.slice.call(needsValidation).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });

    /**
     * Saludo dashboard
     */

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? "pm" : "am";
        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        var strTime = hours + ":" + minutes + " " + ampm;
        return strTime;
    }

    var date = new Date();
    var year = date.getFullYear();
    document.getElementById(
        "copyright"
    ).innerHTML = `&copy; ${year} <strong><span>Up Trading Experts</span></strong>.`;

    function hourLive() {
        var date = new Date();
        var hrs = date.getHours();
        var min = date.getMinutes();
        var diaActual = date.getDay();
        var actualMonth = date.getMonth();
        var actualYear = date.getFullYear();

        var dias = [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado",
        ];
        var months = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];

        var month = months[actualMonth];
        var day = dias[diaActual];

        if (min < 10) {
            min = `0${date.getMinutes()}`;
        }

        var dayMonthYear = `${date.getDate()} de ${month} de ${actualYear}`;

        var greeting = "";

        if (hrs >= 20) greeting = "¡Buenas noches!";
        else if (hrs >= 0 && hrs <= 5) greeting = "¡Buenas noches!";
        else if (hrs >= 6 && hrs <= 12) greeting = "¡Buenos días!";
        else if (hrs >= 12 && hrs <= 19) greeting = "¡Buenas tardes!";

        $("#day").html(`${day} `);
        $("#day").append("<span id='greeting'></span>");
        $("#greeting").html(`| ${greeting}`);
        $("#hour").html(formatAMPM(date));
        $("#date").html(dayMonthYear);
    }

    setInterval(hourLive, 1000);

    var myOffcanvas = document.getElementById("sidebar");
    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

    $("#btntog").on("click", function () {
        $("#sidebar").toggleClass("activee");
        $("#main").toggleClass("activee2");
    });
    if (screen.width <= 991) {
        $("#sidebar").removeClass("activee");
        $("#main").removeClass("activee2");
    }
})();

function verPass() {
    var input = document.getElementById("password");
    var input2 = document.getElementById("password2");
    var txt = document.getElementById("textomostrar");

    if (input.type === "password") {
        input.type = "text";
        input2.type = "text";
        txt.textContent = "Ocultar contraseñas";
    } else {
        input.type = "password";
        input2.type = "password";
        txt.textContent = "Mostrar contraseñas";
    }
}
