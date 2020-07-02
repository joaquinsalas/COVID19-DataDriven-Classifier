<html>
    <head>
        <title>Predictor de Covid-19</title>
        <link rel= "stylesheet" type= "text/css"
        href="style.css">
    </head>
    <body>
        <div class="headings">
                <div class="box"><h2>Ingresa tus datos<img src="ipn.png" class="figure" height="60" width="60"/></h2></div>
                
            </div>
<?php

$NACIMIENTO="1996-04-23";
?>

        <div class="container">
        <form method ="post" action= "index.php" >
            <label for="nacimiento" >FECHA DE NACIMIENTO:</label>
            <input type="date" id="nacimiento" name="NACIMIENTO" value=<?php echo  $NACIMIENTO; ?> > <br>
            Sexo <br>
            <input type="radio" id="hombre" name="SEXO" value="1"<?php if(isset($_POST["SEXO"]) && $_POST["SEXO"] =="1" ){echo "checked";}?>>
                    <label for="hombre">HOMBRE</label>
                    <input type="radio" id="mujer" name="SEXO" value="0"<?php if(isset($_POST["SEXO"]) && $_POST["SEXO"] =="0" ){echo "checked";}?>>
                    <label for="mujer">MUJER</label>
                <br>
            <h3>Responda las siguientes preguntas de acuerdo a sus condiciones</h3>
            INICIO SUBITO<br> 
                    <input type="radio" id="si" name="INICIO_SUBITO" value="1"<?php if(isset($_POST["INICIO_SUBITO"]) && $_POST["INICIO_SUBITO"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="INICIO_SUBITO" value="0" <?php if(isset($_POST["INICIO_SUBITO"]) && $_POST["INICIO_SUBITO"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="INICIO_SUBITO" value="2" <?php if(isset($_POST["INICIO_SUBITO"]) && $_POST["INICIO_SUBITO"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            CEFALEA<br> 
                    <input type="radio" id="si" name="CEFALEA" value="1"<?php if(isset($_POST["CEFALEA"]) && $_POST["CEFALEA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="CEFALEA" value="0" <?php if(isset($_POST["CEFALEA"]) && $_POST["CEFALEA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="CEFALEA" value="2" <?php if(isset($_POST["CEFALEA"]) && $_POST["CEFALEA"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            MIALGIAS<br> 
                    <input type="radio" id="si" name="MIALGIAS" value="1"<?php if(isset($_POST["MIALGIAS"]) && $_POST["MIALGIAS"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="MIALGIAS" value="0" <?php if(isset($_POST["MIALGIAS"]) && $_POST["MIALGIAS"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="MIALGIAS" value="2" <?php if(isset($_POST["MIALGIAS"]) && $_POST["MIALGIAS"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ARTRALGIAS<br> 
                    <input type="radio" id="si" name="ARTRALGIAS" value="1"<?php if(isset($_POST["ARTRALGIAS"]) && $_POST["ARTRALGIAS"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ARTRALGIAS" value="0" <?php if(isset($_POST["ARTRALGIAS"]) && $_POST["ARTRALGIAS"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ARTRALGIAS" value="2" <?php if(isset($_POST["ARTRALGIAS"]) && $_POST["ARTRALGIAS"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            RINORREA<br> 
                    <input type="radio" id="si" name="RINORREA" value="1"<?php if(isset($_POST["RINORREA"]) && $_POST["RINORREA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="RINORREA" value="0" <?php if(isset($_POST["RINORREA"]) && $_POST["RINORREA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            DISNEA<br> 
                    <input type="radio" id="si" name="DISNEA" value="1"<?php if(isset($_POST["DISNEA"]) && $_POST["DISNEA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="DISNEA" value="0" <?php if(isset($_POST["DISNEA"]) && $_POST["DISNEA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            CIANOSIS<br> 
                    <input type="radio" id="si" name="CIANOSIS" value="1"<?php if(isset($_POST["CIANOSIS"]) && $_POST["CIANOSIS"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="CIANOSIS" value="0" <?php if(isset($_POST["CIANOSIS"]) && $_POST["CIANOSIS"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            POLIPNEA<br> 
                    <input type="radio" id="si" name="POLIPNEA" value="1"<?php if(isset($_POST["POLIPNEA"]) && $_POST["POLIPNEA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="POLIPNEA" value="0" <?php if(isset($_POST["POLIPNEA"]) && $_POST["POLIPNEA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            ENFERMEDAD_CRONICA<br> 
                    <input type="radio" id="si" name="ENFERMEDAD_CRONICA" value="1"<?php if(isset($_POST["ENFERMEDAD_CRONICA"]) && $_POST["ENFERMEDAD_CRONICA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ENFERMEDAD_CRONICA" value="0" <?php if(isset($_POST["ENFERMEDAD_CRONICA"]) && $_POST["ENFERMEDAD_CRONICA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            EMBARAZO<br> 
                    <input type="radio" id="si" name="EMBARAZO" value="1"<?php if(isset($_POST["EMBARAZO"]) && $_POST["EMBARAZO"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="EMBARAZO" value="0" <?php if(isset($_POST["EMBARAZO"]) && $_POST["EMBARAZO"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="EMBARAZO" value="2" <?php if(isset($_POST["EMBARAZO"]) && $_POST["EMBARAZO"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            TIENE_INTUBACION_ENDOTRAQUEAL<br> 
                    <input type="radio" id="si" name="TIENE_INTUBACION_ENDOTRAQUEAL" value="1"<?php if(isset($_POST["TIENE_INTUBACION_ENDOTRAQUEAL"]) && $_POST["TIENE_INTUBACION_ENDOTRAQUEAL"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="TIENE_INTUBACION_ENDOTRAQUEAL" value="0" <?php if(isset($_POST["TIENE_INTUBACION_ENDOTRAQUEAL"]) && $_POST["TIENE_INTUBACION_ENDOTRAQUEAL"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            ANTECED_EPOC<br>
                    <input type="radio" id="si" name="ANTECED_EPOC" value="1"<?php if(isset($_POST["ANTECED_EPOC"]) && $_POST["ANTECED_EPOC"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_EPOC" value="0" <?php if(isset($_POST["ANTECED_EPOC"]) && $_POST["ANTECED_EPOC"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_EPOC" value="2" <?php if(isset($_POST["ANTECED_EPOC"]) && $_POST["ANTECED_EPOC"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANTECED_DIABETES<br>
                    <input type="radio" id="si" name="ANTECED_DIABETES" value="1"<?php if(isset($_POST["ANTECED_DIABETES"]) && $_POST["ANTECED_DIABETES"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_DIABETES" value="0" <?php if(isset($_POST["ANTECED_DIABETES"]) && $_POST["ANTECED_DIABETES"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_DIABETES" value="2" <?php if(isset($_POST["ANTECED_DIABETES"]) && $_POST["ANTECED_DIABETES"]=="2"){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANTECED_ASMA<br>
                    <input type="radio" id="si" name="ANTECED_ASMA" value="1"<?php if(isset($_POST["ANTECED_ASMA"]) && $_POST["ANTECED_ASMA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_ASMA" value="0" <?php if(isset($_POST["ANTECED_ASMA"]) && $_POST["ANTECED_ASMA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_ASMA" value="2" <?php if(isset($_POST["ANTECED_ASMA"]) && $_POST["ANTECED_ASMA"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANTECED_HIPERTENSION<br> 
                    <input type="radio" id="si" name="ANTECED_HIPERTENSION" value="1"<?php if(isset($_POST["ANTECED_HIPERTENSION"]) && $_POST["ANTECED_HIPERTENSION"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_HIPERTENSION" value="0" <?php if(isset($_POST["ANTECED_HIPERTENSION"]) && $_POST["ANTECED_HIPERTENSION"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_HIPERTENSION" value="2" <?php if(isset($_POST["ANTECED_HIPERTENSION"]) && $_POST["ANTECED_HIPERTENSION"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANTECED_CARDIOVASCULAR<br> 
                    <input type="radio" id="si" name="ANTECED_CARDIOVASCULAR" value="1"<?php if(isset($_POST["ANTECED_CARDIOVASCULAR"]) && $_POST["ANTECED_CARDIOVASCULAR"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_CARDIOVASCULAR" value="0" <?php if(isset($_POST["ANTECED_CARDIOVASCULAR"]) && $_POST["ANTECED_CARDIOVASCULAR"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_CARDIOVASCULAR" value="2" <?php if(isset($_POST["ANTECED_CARDIOVASCULAR"]) && $_POST["ANTECED_CARDIOVASCULAR"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANTECED_RENAL<br> 
                    <input type="radio" id="si" name="ANTECED_RENAL" value="1"<?php if(isset($_POST["ANTECED_RENAL"]) && $_POST["ANTECED_RENAL"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_RENAL" value="0" <?php if(isset($_POST["ANTECED_RENAL"]) && $_POST["ANTECED_RENAL"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_RENAL" value="2" <?php if(isset($_POST["ANTECED_RENAL"]) && $_POST["ANTECED_RENAL"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>
            ANT_ENF_HEPATICA_CRONICA<br> 
                    <input type="radio" id="si" name="ANT_ENF_HEPATICA_CRONICA" value="1"<?php if(isset($_POST["ANT_ENF_HEPATICA_CRONICA"]) && $_POST["ANT_ENF_HEPATICA_CRONICA"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANT_ENF_HEPATICA_CRONICA" value="0" <?php if(isset($_POST["ANT_ENF_HEPATICA_CRONICA"]) && $_POST["ANT_ENF_HEPATICA_CRONICA"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <br>
            ANTECED_CANCER<br> 
                    <input type="radio" id="si" name="ANTECED_CANCER" value="1"<?php if(isset($_POST["ANTECED_CANCER"]) && $_POST["ANTECED_CANCER"] =="1" ){echo "checked";}?>>
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="ANTECED_CANCER" value="0" <?php if(isset($_POST["ANTECED_CANCER"]) && $_POST["ANTECED_CANCER"] =="0" ){echo "checked";}?>>
                    <label for="no">No</label>
                    <input type="radio" id="sin_especificar" name="ANTECED_CANCER" value="2" <?php if(isset($_POST["ANTECED_CANCER"]) && $_POST["ANTECED_CANCER"] =="2" ){echo "checked";}?>>
                    <label for="sin_especificar">Sin especificar</label>
                    <br>



            <input name="enviar_consulta" type="submit">
            
            </div>
        </form>
        </div>
        <div class="container">
        <?php
            
            if (isset($_POST["enviar_consulta"]))
            {
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
                $results = shell_exec("r InferirBoost_EX.R $edad $SEXO $INICIO_SUBITO $CEFALEA $MIALGIAS $ARTRALGIAS $RINORREA $DISNEA $CIANOSIS $POLIPNEA $ENFERMEDAD_CRONICA $ANTECED_EPOC $ANTECED_DIABETES $ANTECED_ASMA $EMBARAZO $TIENE_INTUBACION_ENDOTRAQUEAL $ANTECED_HIPERTENSION $ANTECED_CARDIOVASCULAR $ANTECED_RENAL $ANT_ENF_HEPATICA_CRONICA $ANTECED_CANCER ");

                print($results);

            #r InferirSVM.R 69 1 0 1 0 0 0 1 0 0 1 1 0 0 0 0 0 0 0 0 0
            }
        ?>
        </div>

<br>
Visualización liderada por el Instituto Politécnico Nacional. <br> <br>

Blog de información: https://github.com/joaquinsalas/COVID19-DataDriven-Classifier
<br><br>

Términos y condiciones de uso del sitio web: este sitio web, la interface y el análisis ("sitio web") han sido elaborados por el Instituto Politécnico Nacional y se proporcionan al público estrictamente para la salud pública, la educación, y la investigación académica. El sitio web se basa en datos hechos públicos por la 
Secretaría de Salud. El Instituto Politécnico Nacional declara que no ofrece garantías con respecto al sitio web, incluida la precisión, la idoneidad para el uso, y la fiabilidad. Se prohíbe estrictamente confiar en el sitio web para obtener orientación médica o usar el sitio web para fines comerciales. También se prohíbe 
estrictamente el uso del nombre y logotipo del Instituto Politécnico Nacional con fines promocionales o comerciales.
<br><br>
Consulte la información oficial de la Secretaría de Salud en donde expertos ayudan a mejorar la comprensión del virus SARS-CoV-2, informar al público, formular políticas para guiar una respuesta, mejorar la atención y salvar vidas.
<br><br><br>
Participantes:<br>
Omar Montoya <br>
Dagoberto Pulido <br>
Alejandro Gómez <br>
Joaquín Salas <br>
Isaac Ruiz <br>
<br><br>

Mayor información: <br>
Instituto Politécnico Nacional <br>
Cerro Blanco 141, Colinas del Cimatario <br>
Querétaro, 76090, México <br>
jsalasr@ipn.mx ó salas@ieee.org <br>


</html>
