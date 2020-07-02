<?php
if (isset($_POST["enviar_consulta"])){


    $NACIMIENTO=$_POST["NACIMIENTO"];
    $SEXO=$_POST["SEXO"];
    $INICIO_SUBITO=$_POST["INICIO_SUBITO"];
    $CEFALEA=$_POST["CEFALEA"];
    $CEFALEA=$_POST["CEFALEA"];
    $MIALGIAS=$_POST["MIALGIAS"];
    $ARTRALGIAS=$_POST["ARTRALGIAS"];
    $RINORREA=$_POST["RINORREA"];
    $DISNEA=$_POST["DISNEA"];
    $CIANOSIS=$_POST["CIANOSIS"];
    $POLIPNEA=$_POST["POLIPNEA"];
    $ENFERMEDAD_CRONICA=$_POST["ENFERMEDAD_CRONICA"];
    $ANTECED_EPOC=$_POST["ANTECED_EPOC"];
    $ANTECED_DIABETES=$_POST["ANTECED_DIABETES"];
    $ANTECED_ASMA=$_POST["ANTECED_ASMA"];
    $EMBARAZO=$_POST["EMBARAZO"];
    $TIENE_INTUBACION_ENDOTRAQUEAL=$_POST["TIENE_INTUBACION_ENDOTRAQUEAL"];
    $ANTECED_HIPERTENSION=$_POST["ANTECED_HIPERTENSION"];
    $ANTECED_CARDIOVASCULAR=$_POST["ANTECED_CARDIOVASCULAR"];
    $ANTECED_RENAL=$_POST["ANTECED_RENAL"];
    $ANT_ENF_HEPATICA_CRONICA=$_POST["ANT_ENF_HEPATICA_CRONICA"];
    $ANTECED_CANCER=$_POST["ANTECED_CANCER"];

    $today = date("y-m-d");
    $diff = date_diff(date_create($NACIMIENTO), date_create($today));
    $edad=$diff->format('%y');
    #$results = shell_exec("r InferirSVM.R $edad $SEXO $INICIO_SUBITO $CEFALEA $MIALGIAS $ARTRALGIAS $RINORREA $DISNEA $CIANOSIS $POLIPNEA $ENFERMEDAD_CRONICA $ANTECED_EPOC $ANTECED_DIABETES $ANTECED_ASMA $EMBARAZO $TIENE_INT$ ");


    #$results = shell_exec("r InferirBoost_EX.R $edad $SEXO $INICIO_SUBITO $CEFALEA $MIALGIAS $ARTRALGIAS $RINORREA $DISNEA $CIANOSIS $POLIPNEA $ENFERMEDAD_CRONICA $ANTECED_EPOC $ANTECED_DIABETES $ANTECED_ASMA $EMBARAZO $TIENE_INTUBACION_ENDOTRAQUEAL $ANTECED_HIPERTENSION $ANTECED_CARDIOVASCULAR $ANTECED_RENAL $ANT_ENF_HEPATICA_CRONICA $ANTECED_CANCER ");
    $results = shell_exec("r InferirBoost_EX.R 69 1 0 1 0 0 0 1 0 0 1 1 0 0 0 0 0 0 0 0 0");

    print("Resultado: " . $results);

    $probabilidad = 0.95;

    #r InferirSVM.R 69 1 0 1 0 0 0 1 0 0 1 1 0 0 0 0 0 0 0 0 0
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <title>Predictor COVID</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 200px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            .sc-gauge  { width:200px; height:200px; margin:10px auto; }
            .sc-background { position:relative; height:100px; margin-bottom:10px; background-color: #d0d0d0; border-radius:150px 150px 0 0; overflow:hidden; text-align:center; }
            .sc-mask { position:absolute; top:20px; right:20px; left:20px; height:80px; background-color: #f6f7f8; border-radius:150px 150px 0 0 }
            .sc-percentage { position:absolute; top:100px; left:-200%; width:400%; height:400%; margin-left:100px; background-color: rgb(<?php echo (round($probabilidad * 255))?>, <?php echo (255-round($probabilidad * 255))?>, 0); }
            .sc-percentage { transform:rotate(<?php echo (round($probabilidad * 180))?>deg); transform-origin:top center; }
            .sc-min { float:left; }
            .sc-max { float:right; }
            .sc-value { position:absolute; top:50%; left:0; width:100%;  font-size:36px; font-weight:100 }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="covid/form-validation.css" rel="stylesheet">
</head>


<body class="bg-light">

<div class="container">

    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="http://imagenes.cicataqro.ipn.mx/bootstrap/assets/brand/logo_ipn.svg" alt="Instituto Politécnico Nacional" height="100">
        <h2 style="color:#6C1D45;" >Inferencia basada en datos del resultado clínico de COVID-19</h2>
        <h3  class="mb-3">Por favor proporcione la siguiente información sobre la condición del paciente</h3>
    </div>





        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Resultados</h3>
        <hr class="mt-2 mb-3"/>


        <div class="row  text-center">
            <div class="col-md-12 mb-3">
                <h4 class="mb-3">Probabilidad de Desceso del Paciente(valor de demostracion)</h4>

                <div class="sc-gauge">
                    <div class="sc-background">
                        <div class="sc-percentage"></div>
                        <div class="sc-mask"></div>
                        <span class="sc-value"><?php echo (round($probabilidad * 100))?>%</span>
                    </div>
                    <span class="sc-min">0</span>
                    <span class="sc-max">100</span>
                </div>


            </div>
        </div>
        <hr class="mt-2 mb-3"/>

    <br>
    <br>
    <br>
        <h5  style="color:#00264d;" class="mb-3 text-center">Datos generales</h5>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Fecha de Nacimiento:    <?php echo  $NACIMIENTO; ?>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Sexo:   <?php if(isset($_POST["SEXO"]) && $_POST["SEXO"] =="1" ){echo "Hombre";}else if(isset($_POST["SEXO"])&& $_POST["SEXO"] =="0"){echo "Mujer";}?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Inicio Súbito:  <?php if(isset($_POST["INICIO_SUBITO"]) && $_POST["INICIO_SUBITO"] =="1" ){echo "Si";}else if(isset($_POST["INICIO_SUBITO"])&& $_POST["INICIO_SUBITO"] =="0"){echo "No";}else if(isset($_POST["INICIO_SUBITO"])&& $_POST["INICIO_SUBITO"] =="2"){echo "Sin Especificar";}?>

            </div>
            
        </div>

        <hr class="mt-2 mb-3"/>
        <h5  style="color:#00264d;" class="mb-3 text-center">Sistema muscular y articulaciones</h5>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Cefalea:    <?php if(isset($_POST["CEFALEA"]) && $_POST["CEFALEA"] =="1" ){echo "Si";}else if(isset($_POST["CEFALEA"])&& $_POST["CEFALEA"] =="0"){echo "No";}else if(isset($_POST["CEFALEA"])&& $_POST["CEFALEA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Mialgias:   <?php if(isset($_POST["MIALGIAS"]) && $_POST["MIALGIAS"] =="1" ){echo "Si";}else if(isset($_POST["MIALGIAS"])&& $_POST["MIALGIAS"] =="0"){echo "No";}else if(isset($_POST["MIALGIAS"])&& $_POST["MIALGIAS"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Artralgias: <?php if(isset($_POST["ARTRALGIAS"]) && $_POST["ARTRALGIAS"] =="1" ){echo "Si";}else if(isset($_POST["ARTRALGIAS"])&& $_POST["ARTRALGIAS"] =="0"){echo "No";}else if(isset($_POST["ARTRALGIAS"])&& $_POST["ARTRALGIAS"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h5  style="color:#00264d;" class="mb-3 text-center">Sistema Respiratorio</h5>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Rinorrea:   <?php if(isset($_POST["RINORREA"]) && $_POST["RINORREA"] =="1" ){echo "Si";}else if(isset($_POST["RINORREA"])&& $_POST["RINORREA"] =="0"){echo "No";}else if(isset($_POST["RINORREA"])&& $_POST["RINORREA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Disnea: <?php if(isset($_POST["DISNEA"]) && $_POST["DISNEA"] =="1" ){echo "Si";}else if(isset($_POST["DISNEA"])&& $_POST["DISNEA"] =="0"){echo "No";}else if(isset($_POST["DISNEA"])&& $_POST["DISNEA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Cianosis:   <?php if(isset($_POST["CIANOSIS"]) && $_POST["CIANOSIS"] =="1" ){echo "Si";}else if(isset($_POST["CIANOSIS"])&& $_POST["CIANOSIS"] =="0"){echo "No";}else if(isset($_POST["CIANOSIS"])&& $_POST["CIANOSIS"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Polipnea:<?php if(isset($_POST["POLIPNEA"]) && $_POST["POLIPNEA"] =="1" ){echo "Si";}else if(isset($_POST["POLIPNEA"])&& $_POST["POLIPNEA"] =="0"){echo "No";}else if(isset($_POST["POLIPNEA"])&& $_POST["POLIPNEA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h5  style="color:#00264d;" class="mb-3 text-center">Otras condiciones</h5>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Enfermedad Crónica: <?php if(isset($_POST["ENFERMEDAD_CRONICA"]) && $_POST["ENFERMEDAD_CRONICA"] =="1" ){echo "Si";}else if(isset($_POST["ENFERMEDAD_CRONICA"])&& $_POST["ENFERMEDAD_CRONICA"] =="0"){echo "No";}else if(isset($_POST["ENFERMEDAD_CRONICA"])&& $_POST["ENFERMEDAD_CRONICA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Embarazo:   <?php if(isset($_POST["EMBARAZO"]) && $_POST["EMBARAZO"] =="1" ){echo "Si";}else if(isset($_POST["EMBARAZO"])&& $_POST["EMBARAZO"] =="0"){echo "No";}else if(isset($_POST["EMBARAZO"])&& $_POST["EMBARAZO"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                Tiene Intubación Endotraqueal:  <?php if(isset($_POST["TIENE_INTUBACION_ENDOTRAQUEAL"]) && $_POST["TIENE_INTUBACION_ENDOTRAQUEAL"] =="1" ){echo "Si";}else if(isset($_POST["TIENE_INTUBACION_ENDOTRAQUEAL"])&& $_POST["TIENE_INTUBACION_ENDOTRAQUEAL"] =="0"){echo "No";}else if(isset($_POST["TIENE_INTUBACION_ENDOTRAQUEAL"])&& $_POST["TIENE_INTUBACION_ENDOTRAQUEAL"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h5  style="color:#00264d;" class="mb-3 text-center">Historial Médico (Antecedentes)</h5>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                EPOC:<?php if(isset($_POST["ANTECED_EPOC"]) && $_POST["ANTECED_EPOC"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_EPOC"])&& $_POST["ANTECED_EPOC"] =="0"){echo "No";}else if(isset($_POST["ANTECED_EPOC"])&& $_POST["ANTECED_EPOC"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Diabetes:   <?php if(isset($_POST["ANTECED_DIABETES"]) && $_POST["ANTECED_DIABETES"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_DIABETES"])&& $_POST["ANTECED_DIABETES"] =="0"){echo "No";}else if(isset($_POST["ANTECED_DIABETES"])&& $_POST["ANTECED_DIABETES"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Asma:   <?php if(isset($_POST["ANTECED_ASMA"]) && $_POST["ANTECED_ASMA"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_ASMA"])&& $_POST["ANTECED_ASMA"] =="0"){echo "No";}else if(isset($_POST["ANTECED_ASMA"])&& $_POST["ANTECED_ASMA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Hipertensión:   <?php if(isset($_POST["ANTECED_HIPERTENSION"]) && $_POST["ANTECED_HIPERTENSION"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_HIPERTENSION"])&& $_POST["ANTECED_HIPERTENSION"] =="0"){echo "No";}else if(isset($_POST["ANTECED_HIPERTENSION"])&& $_POST["ANTECED_HIPERTENSION"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Enfermedad Cardiovascular:  <?php if(isset($_POST["ANTECED_CARDIOVASCULAR"]) && $_POST["ANTECED_CARDIOVASCULAR"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_CARDIOVASCULAR"])&& $_POST["ANTECED_CARDIOVASCULAR"] =="0"){echo "No";}else if(isset($_POST["ANTECED_CARDIOVASCULAR"])&& $_POST["ANTECED_CARDIOVASCULAR"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Enfermedad Renal:   <?php if(isset($_POST["ANTECED_RENAL"]) && $_POST["ANTECED_RENAL"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_RENAL"])&& $_POST["ANTECED_RENAL"] =="0"){echo "No";}else if(isset($_POST["ANTECED_RENAL"])&& $_POST["ANTECED_RENAL"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Enfermedad Epática Crónica: <?php if(isset($_POST["ANT_ENF_HEPATICA_CRONICA"]) && $_POST["ANT_ENF_HEPATICA_CRONICA"] =="1" ){echo "Si";}else if(isset($_POST["ANT_ENF_HEPATICA_CRONICA"])&& $_POST["ANT_ENF_HEPATICA_CRONICA"] =="0"){echo "No";}else if(isset($_POST["ANT_ENF_HEPATICA_CRONICA"])&& $_POST["ANT_ENF_HEPATICA_CRONICA"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3  text-center">

                Cáncer: <?php if(isset($_POST["ANTECED_CANCER"]) && $_POST["ANTECED_CANCER"] =="1" ){echo "Si";}else if(isset($_POST["ANTECED_CANCER"])&& $_POST["ANTECED_CANCER"] =="0"){echo "No";}else if(isset($_POST["ANTECED_CANCER"])&& $_POST["ANTECED_CANCER"] =="2"){echo "Sin Especificar";}?>
            </div>
        </div>


        <hr class="mt-2 mb-3"/>


        <div class="row">
            <div class="col-md-12 mb-3  text-center">
                <a href="http://imagenes.cicataqro.ipn.mx/bootstrap/" class="btn btn-primary stretched-link">Nueva Consulta</a>
            </div>
        </div>









    <footer class="my-5 pt-5 text-muted text-center text-small">

        Blog de información: <a href="https://github.com/joaquinsalas/COVID19-DataDriven-Classifier">https://github.com/joaquinsalas/COVID19-DataDriven-Classifier</a><br><br>

        Términos y condiciones de uso del sitio web: este sitio web, la interface y el análisis ("sitio web") han sido
        elaborados por el Instituto Politécnico Nacional y se proporcionan al público estrictamente para la salud
        pública, la educación, y la investigación académica. El sitio web se basa en datos hechos públicos por la
        Secretaría de Salud. El Instituto Politécnico Nacional declara que no ofrece garantías con respecto al sitio
        web, incluida la precisión, la idoneidad para el uso, y la fiabilidad. Se prohíbe estrictamente confiar en el
        sitio web para obtener orientación médica o usar el sitio web para fines comerciales. También se prohíbe
        estrictamente el uso del nombre y logotipo del Instituto Politécnico Nacional con fines promocionales o
        comerciales.
        <br>
        Consulte la información oficial de la Secretaría de Salud en donde expertos ayudan a mejorar la comprensión del
        virus SARS-CoV-2, informar al público, formular políticas para guiar una respuesta, mejorar la atención y salvar
        vidas.
        <br><br>

        Participantes:<br>
        Omar Montoya<br>
        Dagoberto Pulido<br>
        Alejandro Gómez<br>
        Joaquín Salas<br>
        Isaac Ruiz<br>
        <br><br>

        Mayor información:

        Instituto Politécnico Nacional
        Cerro Blanco 141, Colinas del Cimatario
        Querétaro, 76090, México
        <a href="mailto:jsalasr@ipn.mx">jsalasr@ipn.mx</a>
        ó
        <a href="mailto:salas@ieee.org">jsalas@ieee.org</a>

    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="/assets/dist/js/bootstrap.bundle.js"></script>
<script src="covid/form-validation.js"></script>
</body>
</html>
