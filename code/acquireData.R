


acquireData <- function (data.dir, files.pattern) {
  

  
  
  
  files <- list.files(path = data.dir, pattern =  files.pattern)
  
  
  #############
  
  i = 1
  for (file in files) {
    print(file)
    filename = paste(data.dir, file, sep = "")
    
    dataset = readData(filename = filename)
    
    if (i == 1) {
      data = dataset
    }
    else {
      data = rbind(data, dataset)
    }
    i = i + 1
  }
  
  
  covid = data[data$DIAGNOSTICO_FINAL == "COVID-19",]
  condicion.medica = (covid$DESC_MOTIVO_EGRESO == "MEJORIA") | 
    (covid$DESC_MOTIVO_EGRESO == "DEFUNCION")
  covid.end = covid[condicion.medica,]
  
  threshold.nan = 0 # the current database is full
  
  X = covid.end[, !(names(covid.end) %in% c("DESC_MOTIVO_EGRESO"))]
  v = covid.end$DESC_MOTIVO_EGRESO
  y = c(0,nrow=length(v), ncol= 1)
  y[v==c("DEFUNCION")] = 1
  y[v==c("MEJORIA")] = 0
  
  y = as.factor(y)
  
  too.many.nan = names(X)[colSums(is.na(X)) > threshold.nan]
  
  
  #remove variables for which there are too many missing values
  Xp = X[, !(names(X) %in% c(too.many.nan))]
  
  
  ##fill missing values
  Xp.imp = suppressMessages(suppressWarnings(missForest(Xp, verbose=FALSE)))
  
  
  #dataset for processing
  dataset = list(X = Xp.imp$ximp, y = y) 
  
  dim(dataset$X)
  return (dataset)
}



#this function reads the data from a csv file and filters out 
#data with too many missing values

readData <- function (filename) {
  
  #leer el archivo csv
  data <- read.csv(file = filename,  header=TRUE, 
                   stringsAsFactors = TRUE, encoding = "UTF-8")
  
  names(data) = toupper(names(data))
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
    #if I eliminate the records associated with predictors with more than two levels,
    #the dataset of QT is reduced from 5,880 to 3887 records.
    
  }
  
  
  
  #dates are converted in relative days
  data.keep$EDAD_ANO = as.numeric(data.keep$EDAD_ANO)
  
  
  
  
  return (data.keep)
  
  
}




balanceData <- function (X, y) {
  
  num.death = sum(y == 1) #deaths
  num.improv = sum(y == 0) #improvement
  if (num.death < num.improv) {
    indx = which(y == 0) #improvements 
    
    
  }else {
    indx = which(y == 1) #death
    
  }
  s = sample(indx, size=num.improv - num.death)
  Xp = X[-s,]
  yp = y[-s]
  
  result = list(X = Xp, y = yp)
  return (result)
}



balanceDataFactor <- function (X) {
  num.death = sum(X$y == "negative") #deaths
  num.improv = sum(X$y == "positive") #improvement
  if (num.death < num.improv) {
    indx = which(X$y == "positive") #improvements 
    
  }else {
    indx = which(X$y == "negative") #death
    
  }
  s = sample(indx, size=num.improv - num.death)
  Xp = X[-s,]
  return (Xp)
  
}


