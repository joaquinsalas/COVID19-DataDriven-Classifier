#ReadDataDateSelect
#This is derive from ReadDataDate
#In ReadDataSelect, we construct a classifier to distinguish between confirmed and discarted based on a 
#set of features with medical meaning.
#2020.04.10
#Joaquin Salas. salas@ieee.org





#this function reads the data from a csv file and filters out 
#data with too many missing values

readData <- function (filename) {
  
  #leer el archivo csv
  data <- read.csv(file = filename,  header=TRUE, 
                   stringsAsFactors = TRUE, encoding = "UTF-8")
  
  dim(data)
  
  
  #keep this variables
  keep = c(
    "EDAD_ANO",                     
    "SEXO",                          
    "INICIO_SUBITO",                
    "FIEBRE",                        "TOS",                          
    "CEFALEA",                       "ODINOFAGIA",                   
    "ATAQUE_AL_ESTADO_GENERAL",      "MIALGIAS",                     
    "ARTRALGIAS",                    "POSTRACION",                   
    "RINORREA",                      "ESCALOFRIO",                   
    "CONGESTION_NASAL",              "DISFONIA",                     
    "DOLOR_ABDOMINAL",               "CONJUNTIVITIS",                
    "DISNEA",                        "CIANOSIS",                     
    "LUMBALGIA",                     "DIARREA",                      
    "DOLOR_TORACICO",                "POLIPNEA",                     
    #"IRRITABILIDAD_MENOS5AÑOS",   
    "CORIZA",                       
    "ANOSMIA",                       "DISGEUSIA",                   
    "OTROS",                                   
    "ENFERMEDAD_CRONICA",            "ANTECED_EPOC",                 
    "ANTECED_DIABETES",              "ANTECED_ASMA",                 
    "ANTECED_INMUNOSUPRESION",       "ANTECED_TABAQUISMO",           
    "ANTECED_OBESIDAD",              "ANTECED_VIH_EVIH",             
    "EMBARAZO",                             
    "LACTANCIA",                     "PUERPERIO",                    
    "RECIBIO_VACUNA",                "TIENE_ANTIMICROBIANOS",        
    "TIENE_ANTIVIRAL",                 
    "TIENE_INTUBACION_ENDOTRAQUEAL",          
    "DESC_MOTIVO_EGRESO",                 
    "ANTECED_CERDOS",                "ANTECED_HIPERTENSION",         
    "ANTECED_CARDIOVASCULAR",        "ANTECED_RENAL",                
    "ANTECED_OTRA",                            
    "ANT_ENF_HEPATICA_CRONICA",      "ANT_ANEMIA_HEMOLITICA",        
    "ANT_ENF_NEUROLOGICA",           "DIAG_CLIN_NEUMONIA",           
    "RECIBIO_VAC_NEUMOCOCO",        
    "REC_TXANTIVIRAN",              
    "REC_TXANTIVIRD",                
    "REC_TXANTIBIOAN",              
    "TXANTIBIOD",                                          
    "TXANTIPIRETICO",               
    "ANTECED_TUBERCULOSIS",         
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




