#ReadDataDateSelect
#This is derive from ReadDataDate
#In ReadDataSelect, we construct a classifier to distinguish between confirmed and discarted based on a 
#set of features with medical meaning.
#2020.04.10
#Joaquin Salas. salas@ieee.org





#this function reads the data from a csv file and filters out 
#data with too many missing values

readDataDateSelectSS <- function (filename, sep, fileEncoding = "") {
  
  #leer el archivo csv
  data <- read.csv(file = filename,  header=TRUE, stringsAsFactors = TRUE,  
                   fileEncoding= fileEncoding, sep =sep)
  
  dim(data)
  
  
  #keep this variables
  keep = c(
    "ORIGEN",             
    "SECTOR",            
    "ENTIDAD_UM",         
    "SEXO",              
    #"ENTIDAD_NAC",   
    "ENTIDAD_RES",         
    #"MUNICIPIO_RES",      
    "TIPO_PACIENTE",       "FECHA_INGRESO",       "FECHA_SINTOMAS",                
    "NEUMONIA",            "EDAD",               
    #"NACIONALIDAD",       
    "EMBARAZO",              "DIABETES",            "EPOC",               
    "ASMA",                "INMUSUPR",            "HIPERTENSION",        "OTRA_COM",           
    "CARDIOVASCULAR",      "OBESIDAD",            "RENAL_CRONICA",       "TABAQUISMO",         
    "OTRO_CASO",           "RESULTADO",           "MIGRANTE",          
    #"PAIS_NACIONALIDAD",  
    "PAIS_ORIGEN"          
  )
  
  no.factors = c("EDAD_ANO" )
  factors = keep[!(keep %in% no.factors)]
  
  
  ## remove the variables that for now will not be taken into account
  data.keep = data[, (names(data) %in% c(keep))]
  
  #make sure these variables are factors
  for (factor in factors) {
    
    data.keep[,factor] = as.factor(data.keep[,factor])
    
  }
  
  
  #dates are converted in relative days
  data.keep$FECHA_INGRESO = ymd(data.keep$FECHA_INGRESO) - ymd(data.keep$FECHA_SINTOMAS)
  data.keep$FECHA_INGRESO = as.numeric(data.keep$FECHA_INGRESO, units="days") 
  data.keep = data.keep[, !(names(data.keep) %in% c("FECHA_SINTOMAS"))] 
  
  
  data.imp = data.keep
  
  #remove data for which there is not yet a resutl
  X = data.imp[!(data.imp$RESULTADO == 3), ]
  
  #this is the variable of interest
  y =droplevels(X$RESULTADO)
  
  
  X = X[, !names (X) %in% c("RESULTADO")]
  
  dim(X)
  
  dataset = list(X = X,  y = y)
  
  return (dataset)
  
  
}



#perform feature analysis using Boruta
selectFeatures <- function (dataset) {


  #select features
  boruta.train = suppressWarnings(Boruta(dataset$X, dataset$y, pValue = 0.01, maxRuns = 100, mcAdj = TRUE))


  # save boruta results
  filename = paste("boruta5-",posfix,".jpg", sep="")
  jpeg(filename, width = 1400, height = 700)

  plot(boruta.train, xlab = "", xaxt = "n", yaxt = "n", ylab = "Importance", cex.lab=2)
  lz<-lapply(1:ncol(boruta.train$ImpHistory),function(i)
  boruta.train$ImpHistory[is.finite(boruta.train$ImpHistory[,i]),i])
  names(lz) <- colnames(boruta.train$ImpHistory)
  Labels <- sort(sapply(lz,median))
  index <- order(sapply(lz,median))
  num.labels = sprintf("%d",index)
  
  #because names are so long, written in Spanish, I choose to use numeric labels
  axis(side = 1,las=2,labels = num.labels,at = 1:ncol(boruta.train$ImpHistory), cex.axis = 2)
  axis(side = 2,las=1, cex.axis = 2, cex.lab = 4)
  # 3. Close the file
  dev.off()


  #decide on undecided
  boruta.final <- TentativeRoughFix(boruta.train)

  #get the surviving attributes after feature selection
  attributes = getSelectedAttributes(boruta.final, withTentative = F)

 

  #statistical summary of Boruta run in an attribute centered way.
  boruta.df = attStats(boruta.final)


  confirmed = boruta.df[which(boruta.df$decision == "Confirmed"),]


  rejected = boruta.df[which(boruta.df$decision == "Rejected"),]


  important = data.frame(confirmed[order(-confirmed$meanImp),c(1,2)]);
  unimportant = rejected[order(rejected$meanImp),c(1,2)];
  print(round(important,2))
  

  features <- list(important = important, unimportant = unimportant, attributes = attributes)
  return (features)

}




