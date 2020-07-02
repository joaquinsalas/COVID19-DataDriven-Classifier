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

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
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



    <form  method ="post" action= "result.php">

        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Datos generales</h3>
        <hr class="mt-2 mb-3"/>


        <div class="row  text-center">
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Fecha de Nacimiento</h4>
                <input type="date" id="nacimiento" name="NACIMIENTO" value="2000-01-01">
            </div>

            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Sexo</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="hombre" name="SEXO" value="1">
                        <label class="custom-control-label" for="hombre">Hombre</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="mujer" name="SEXO" value="0" >
                        <label class="custom-control-label" for="mujer">MUJER</label>
                    </div>

                </div>
            </div>

            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Inicio Súbito</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si1" name="INICIO_SUBITO" value="1">
                        <label class="custom-control-label" for="si1">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no1" name="INICIO_SUBITO" value="0" >
                        <label class="custom-control-label" for="no1">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar1" name="INICIO_SUBITO" value="2" >
                        <label class="custom-control-label" for="sin_especificar1">Sin especificar</label>
                    </div>

                </div>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Sistema muscular y articulaciones</h3>
        <hr class="mt-2 mb-3"/>

        <div class="row  text-center">
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Cefalea</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si2" name="CEFALEA" value="1">
                        <label class="custom-control-label" for="si2">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no2" name="CEFALEA" value="0" >
                        <label class="custom-control-label" for="no2">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar2" name="CEFALEA" value="2" >
                        <label class="custom-control-label" for="sin_especificar2">Sin especificar</label>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Mialgias</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si3" name="MIALGIAS" value="1">
                        <label class="custom-control-label" for="si3">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no3" name="MIALGIAS" value="0" >
                        <label class="custom-control-label" for="no3">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar3" name="MIALGIAS" value="2" >
                        <label class="custom-control-label" for="sin_especificar3">Sin especificar</label>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Artralgias</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si4" name="ARTRALGIAS" value="1">
                        <label class="custom-control-label" for="si4">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no4" name="ARTRALGIAS" value="0">
                        <label class="custom-control-label" for="no4">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar4" name="ARTRALGIAS" value="2">
                        <label class="custom-control-label" for="sin_especificar4">Sin especificar</label>

                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Sistema Respiratorio</h3>
        <hr class="mt-2 mb-3"/>

        <div class="row  text-center">
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Rinorrea</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si5" name="RINORREA" value="1">
                        <label class="custom-control-label" for="si5">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no5" name="RINORREA" value="0" >
                        <label class="custom-control-label" for="no5">No</label>

                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Disnea</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si6" name="DISNEA" value="1">
                        <label class="custom-control-label" for="si6">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no6" name="DISNEA" value="0" >
                        <label class="custom-control-label" for="no6">No</label>

                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Cianosis</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si7" name="CIANOSIS" value="1"">
                        <label class="custom-control-label" for="si7">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no7" name="CIANOSIS" value="0" >
                        <label class="custom-control-label" for="no7">No</label>

                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Polipnea</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si" name="POLIPNEA" value="1"">
                        <label class="custom-control-label" for="si">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no" name="POLIPNEA" value="0" >
                        <label class="custom-control-label" for="no">No</label>
                        <br>
                    </div>
                </div>
            </div>
        </div>


        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Otras condiciones</h3>
        <hr class="mt-2 mb-3"/>

        <div class="row  text-center">
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Enfermedad Crónica</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si9" name="ENFERMEDAD_CRONICA" value="1">
                        <label class="custom-control-label" for="si9">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no9" name="ENFERMEDAD_CRONICA" value="0">
                        <label class="custom-control-label" for="no9">No</label>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Embarazo</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si10" name="EMBARAZO" value="1">
                        <label class="custom-control-label" for="si10">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no10" name="EMBARAZO" value="0" >
                        <label class="custom-control-label" for="no10">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar10" name="EMBARAZO" value="2" >
                        <label class="custom-control-label" for="sin_especificar10">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="mb-3">Tiene Intubación Endotraqueal</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si11" name="TIENE_INTUBACION_ENDOTRAQUEAL" value="1">
                        <label class="custom-control-label" for="si11">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no11" name="TIENE_INTUBACION_ENDOTRAQUEAL" value="0" >
                        <label class="custom-control-label" for="no11">No</label>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-2 mb-3"/>
        <h3  style="color:#00264d;" class="mb-3 text-center">Historial Médico (Antecedentes)</h3>
        <hr class="mt-2 mb-3"/>

        <div class="row  text-center">
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">EPOC</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si12" name="ANTECED_EPOC" value="1">
                        <label class="custom-control-label" for="si12">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no12" name="ANTECED_EPOC" value="0" >
                        <label class="custom-control-label" for="no12">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar12" name="ANTECED_EPOC" value="2" >
                        <label class="custom-control-label" for="sin_especificar12">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Diabetes</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si13" name="ANTECED_DIABETES" value="1">
                        <label class="custom-control-label" for="si13">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no13" name="ANTECED_DIABETES" value="0" >
                        <label class="custom-control-label" for="no13">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar13" name="ANTECED_DIABETES" value="2" >
                        <label class="custom-control-label" for="sin_especificar13">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Asma</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si14" name="ANTECED_ASMA" value="1">
                        <label class="custom-control-label" for="si14">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no14" name="ANTECED_ASMA" value="0" >
                        <label class="custom-control-label" for="no14">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar14" name="ANTECED_ASMA" value="2" >
                        <label class="custom-control-label" for="sin_especificar14">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Hipertensión</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si15" name="ANTECED_HIPERTENSION" value="1">
                        <label class="custom-control-label" for="si15">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no15" name="ANTECED_HIPERTENSION" value="0" >
                        <label class="custom-control-label" for="no15">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar15" name="ANTECED_HIPERTENSION" value="2" >
                        <label class="custom-control-label" for="sin_especificar15">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Enfermedad Cardiovascular</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si16" name="ANTECED_CARDIOVASCULAR" value="1">
                        <label class="custom-control-label" for="si16">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no16" name="ANTECED_CARDIOVASCULAR" value="0" >
                        <label class="custom-control-label" for="no16">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar16" name="ANTECED_CARDIOVASCULAR" value="2" >
                        <label class="custom-control-label" for="sin_especificar16">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Enfermedad Renal</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si17" name="ANTECED_RENAL" value="1">
                        <label class="custom-control-label" for="si17">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no17" name="ANTECED_RENAL" value="0" >
                        <label class="custom-control-label" for="no17">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar17" name="ANTECED_RENAL" value="2" >
                        <label class="custom-control-label" for="sin_especificar17">Sin especificar</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Enfermedad Epática Crónica</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si18" name="ANT_ENF_HEPATICA_CRONICA" value="1">
                        <label class="custom-control-label" for="si18">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no18" name="ANT_ENF_HEPATICA_CRONICA" value="0" >
                        <label class="custom-control-label" for="no18">No</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <h4 class="mb-3">Cáncer</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="si19" name="ANTECED_CANCER" value="1">
                        <label class="custom-control-label" for="si19">Si</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="no19" name="ANTECED_CANCER" value="0" >
                        <label class="custom-control-label" for="no19">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input required class="custom-control-input" type="radio" id="sin_especificar19" name="ANTECED_CANCER" value="2" >
                        <label class="custom-control-label" for="sin_especificar19">Sin especificar</label>
                        <br>
                    </div>
                </div>
            </div>
        </div>



        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" name="enviar_consulta"  type="submit">Procesar consulta</button>
    </form>







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
