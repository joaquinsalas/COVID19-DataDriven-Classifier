
suppressMessages(library(missForest)) #missForest



preprocessData <- function (prefix, file.root,  data.dir) {
  
  filename = paste(data.dir,"featureSelection_",prefix,".RData", sep = "")
  load(filename)
  
  keep = append(attributes, c("DIAGNOSTICO_FINAL", "DESC_MOTIVO_EGRESO"))
  
  
  #files in the data.dir directory corresponding to the Health Ministery data
  files.pattern = paste(file.root,prefix, "*.*", sep = "")
  
  
  files <- list.files(path = data.dir, pattern =  files.pattern)
  
  #############
  
  i = 1
  for (file in files) {
    
    filename = paste(data.dir, file, sep = "")
    
    dataset = readDataFeatures(filename = filename, keep)
    
    if (i == 1) {
      data = dataset
    }
    else {
      data = rbind(data, dataset)
    }
    i = i + 1
  }
  
  
  
  dim(data)
  
  
  
  
  covid = data[data$DIAGNOSTICO_FINAL == "COVID-19",!(names(data) %in% c("DIAGNOSTICO_FINAL"))]
  condicion.medica = (covid$DESC_MOTIVO_EGRESO == "MEJORIA") | 
    (covid$DESC_MOTIVO_EGRESO == "DEFUNCION")
  
  covid.diag = covid[condicion.medica,]
  
  threshold.nan = 0 # the current database is full
  
  covid.diag.pred = covid.diag[, !(names(covid.diag) %in% c("DESC_MOTIVO_EGRESO"))]
  
  #change predictor from factor <MEJORIA, DEFUNCION> to factor <0,1>
  pred = covid.diag$DESC_MOTIVO_EGRESO
  pred.num = c(0,nrow=length(pred), ncol= 1)
  pred.num[pred==c("MEJORIA")] = 0
  pred.num[pred==c("DEFUNCION")] = 1
  
  
  #maybe SVM need this to be a factor but it is not already a factor?
  #pred.num = as.factor(pred.num)
  
  too.many.nan = 
    names(covid.diag.pred)[colSums(is.na(covid.diag.pred)) > threshold.nan]
  
  
  #remove variables for which there are too many missing values
  covid.no.nan = covid.diag.pred[, !(names(covid.diag.pred) %in% c(too.many.nan))]
  
  
  
  
  ##fill missing values
  covid.imp = 
    suppressMessages(suppressWarnings(missForest(covid.no.nan, verbose=FALSE)))
  
  covid.full = covid.imp$ximp
  
  #make sure these variables are factors
  for (name in names(covid.full)) {
    if (is.factor(covid.full[,name])) {
      covid.full[,name] = droplevels(covid.full[,name])
      l = levels(droplevels(covid.full[,name]))
      if (length(l) < 2) {
        #drop factor columns with just one level
        covid.full = covid.full[,!(names(covid.full) %in% name)] 
      }
      
    }  
  }
  
  
  
  
  
  
  
  dim(covid.full)
  
  
  covid.full$EDAD_ANO = as.numeric(covid.full$EDAD_ANO)
  
  #convert categorical variables into numeric
  dummies = dummyVars( "~." , covid.full)
  transf = data.frame(predict(dummies, newdata = covid.full))
  covid.full = transf
  
  
  #normalize age
  mu = mean(covid.full$EDAD_ANO)
  print(mu)
  sigma = sd(covid.full$EDAD_ANO)
  print(sigma)
  covid.full$EDAD_ANO = c(scale(covid.full$EDAD_ANO- mu))
  
  
  #dataset for processing
  dataset = list(X = covid.full, y = pred.num, mu = mu, sigma = sigma) 
  
  
  return(dataset) 
  
}



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




