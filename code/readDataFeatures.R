#ReadDataFeatures
#Read data from the csv file and process it for classification.
#Although I created this file for processing with a SVM classifier,
#it should be good for other classifiers based on the IMSS dataset.
#2020.04.10
#2020.06.28 documented and cleaned up the code
#Joaquin Salas. salas@ieee.org





#this function reads the data from a csv file and filters out 
#data with too many missing values

readDataFeatures <- function (filename, keep) {
  
  #leer el archivo csv
  data <- read.csv(file = filename,  header=TRUE, 
                   stringsAsFactors = TRUE, encoding = "UTF-8")
  names(data) = toupper(names(data))
  
  dim(data)
  
  
  
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




