$(document).ready(function () {
    $(".countdown-one__list").countdown({
        date: "November 1, 2024 00:00:00", // Fecha de cuenta regresiva
        refresh: 1000, // Actualiza cada segundo
        onEnd: function () {
            alert("¡La cuenta regresiva ha terminado!");
        },
        render: function (date) {
            this.el.innerHTML =
                "<li> <span class='days'> <i>" +
                date.days +
                "</i> Días </span> </li>" +
                "<li> <span class='hours'> <i>" +
                date.hours +
                "</i> Horas </span> </li>" +
                "<li> <span class='minutes'> <i>" +
                date.min +
                "</i> Minutos </span> </li>" +
                "<li> <span class='seconds'> <i>" +
                date.sec +
                "</i> Segundos </span> </li>";
        },
    });
});
