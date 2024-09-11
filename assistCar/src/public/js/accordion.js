document.addEventListener("DOMContentLoaded", function () {
    var acc = document.querySelectorAll(".btnBeneficiario, .btnCarro");

    acc.forEach(button => {
        console.log("botao clicado")
        button.addEventListener("click", function () {
            this.classList.toggle("active");

            var panel = this.nextElementSibling;
            if (panel.classList.contains("show")) {
                panel.classList.remove("show");
            } else {
                panel.classList.add("show");
            }
        });
    });
});



