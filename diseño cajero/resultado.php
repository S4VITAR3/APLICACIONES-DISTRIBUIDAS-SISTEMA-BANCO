<?php header('Access-Control-Allow-Origin: *'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
    </script>

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://kit.fontawesome.com/980a12c0b1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body class="bg-info">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="d-flex justify-content-center align-items-center">
                <div class="rounded bg-light" style="width: 700px; height: 500px; margin-top: 50px;">

                    <div class="text-center rounded-top" style="background-color:#29C789">
                        <p class="text-center fw-bold mx-3 mb-10 h3 text-white"
                            style="padding-top:10px; padding-bottom:10px;">Resultados</p>
                    </div>

                    <form>
                        <div class="text-center text-lg-start mt-4 pt-2 aling">

                            <center>
                                <div id="imprimir" class="imprimir">
                                    <label id="idFecha" class="labFecha"></label><br><br>
                                </div>

                                <label for=""></label>
                                <br>
                            </center>
                            <center>
                                <button type="button" class="btn btn-primary btn-lg"
                                    onclick='convertPDF()'>IMPRIMIR</button>
                            </center> <br>
                            <center>
                            <a href="index.php">                       
                                <button type="button" class="btn btn-danger btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem; width: 200px;">
                                    Salir
                                </button>
                            </a>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
</body>




<script type="text/javascript">
    var d = new Date();
    var nameMonth;


    if (d.getMonth() == 0) {
        nameMonth = "Enero";
    } else if (d.getMonth() == 1) {
        nameMonth = "Febrero";
    } else if (d.getMonth() == 2) {
        nameMonth = "Marzo";
    } else if (d.getMonth() == 3) {
        nameMonth = "Abril";
    } else if (d.getMonth() == 4) {
        nameMonth = "Mayo";
    } else if (d.getMonth() == 5) {
        nameMonth = "Junio";
    } else if (d.getMonth() == 6) {
        nameMonth = "Julio";
    } else if (d.getMonth() == 7) {
        nameMonth = "Agosto";
    } else if (d.getMonth() == 8) {
        nameMonth = "Septiembre";
    } else if (d.getMonth() == 9) {
        nameMonth = "Octubre";
    } else if (d.getMonth() == 10) {
        nameMonth = "Noviembre";
    } else if (d.getMonth() == 11) {
        nameMonth = "Diciembre";
    }

    document.getElementById('idFecha').innerHTML += 'Fecha: ' + d.getDate() + ' /  ' + nameMonth + '  / ' + d.getFullYear() + ': Hora:' + d.getHours() + ': ' + d.getMinutes() + ' : ' + d.getSeconds();

</script>






<script>
    function convertPDF() {
        html2canvas(document.querySelector("#imprimir"), {
            allowTaint: true,
            useCORS: true,
            scale: 2,
            quality: 5
        }).then(canvas => {
            var img = canvas.toDataURL("image/PNG");
            var doc = new jsPDF();
            doc.text(70, 15, "Resultado")
            doc.text(10, 25, "Reporte de accion")
            doc.addImage(img, 'PNG', 10, 30, 300, 16);
            doc.save("ticket.pdf");
        });
    }

</script>