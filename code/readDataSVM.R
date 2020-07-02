#ReadDataSVM
#Read data from the csv file and process it for classification.
#Although I created this file for processing with a SVM classifier,
#it should be good for other classifiers based on the IMSS dataset.
#2020.04.10
#2020.06.28 documented and cleaned up the code
#Joaquin Salas. salas@ieee.org





#this function reads the data from a csv file and filters out 
#data with too many missing values

readDataSVM <- function (filename) {
  
  #leer el archivo csv
  data <- read.csv(file = filename,  header=TRUE, 
                   stringsAsFactors = TRUE, encoding = "UTF-8")
  
  dim(data)
  
  
  #keep the variables deemed important by boruta
  keep = c(
    "EDAD_ANO",                     
    "SEXO",                          
    "INICIO_SUBITO",                          
    "CEFALEA",
    "MIALGIAS",                     
    "ARTRALGIAS",                  
    "RINORREA",                   
    "DISNEA",                        
    "CIANOSIS",
    "POLIPNEA",                     
    "ENFERMEDAD_CRONICA",            "ANTECED_EPOC",                 
    "ANTECED_DIABETES",              "ANTECED_ASMA",                 
    "EMBARAZO",                 
    "TIENE_INTUBACION_ENDOTRAQUEAL",          
    "DESC_MOTIVO_EGRESO",                 
    "ANTECED_HIPERTENSION",         
    "ANTECED_CARDIOVASCULAR",        "ANTECED_RENAL",                
    "ANT_ENF_HEPATICA_CRONICA",
    "ANTECED_CANCER",  
    "DIAGNOSTICO_FINAL"
  )
  
  no.factors = c( "EDAD_ANO")
  factors = keep[!(keep %in% no.factors)]
  
  
  ## remove the variables that for now will not be taken into account
  data.keep = data[, (names(data) %in% c(keep))]
  
  #make sure these variables are factors
  for (factor in factors) {
    #print(factor)
    data.keep[,factor] = as.factor(data.keep[,factor])
    
  }
  
  

  #dates are converted in relative days
  data.keep$EDAD_ANO = as.numeric(data.keep$EDAD_ANO)
  
  
  
  
  return (data.keep)
  
  
}




