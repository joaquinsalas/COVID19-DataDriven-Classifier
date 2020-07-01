args <- argv
suppressMessages(library(dummies))
suppressMessages(library(xgboost))
library(stringr)
setwd('./')
load("xgb_classifier.RData")
#rf_pred = predict(svm.classifier,strtoi(args),type = "prob")
#x = readDataSVM('a_CENSO NOMINAL DF NORESTE CIERRE 19,00hrs.CSV')
#inp = strtoi(c("90", "0", "1", "1","1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1"))
#inp = strtoi(c("69", "1", "0", "1","0", "0", "0", "1", "0", "0", "1", "1", "0", "0", "0", "0", "0", "0", "0", "0", "0"))
inp = strtoi(args)
#print(inp)
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
  "ANTECED_HIPERTENSION",         
  "ANTECED_CARDIOVASCULAR",        "ANTECED_RENAL",                
  "ANT_ENF_HEPATICA_CRONICA",
  "ANTECED_CANCER"
)
valores = c(
"INICIO_SUBITO.0",
"INICIO_SUBITO.1",
"INICIO_SUBITO.2",
"CEFALEA.0",
"CEFALEA.1",
"CEFALEA.2",
"MIALGIAS.0",                                                                                                      
"MIALGIAS.1",                                                                                                     
"MIALGIAS.2",                                                                                                      
"ARTRALGIAS.0",                                                                                                    
"ARTRALGIAS.1",                                                                                                    
"ARTRALGIAS.2",                                                                                                    
"RINORREA.0",                                                                                                      
"RINORREA.1",                                                                                                      
"DISNEA.0",                                                                                                        
"DISNEA.1",                                                                                                        
"CIANOSIS.0",                                                                                                      
"CIANOSIS.1",                                                                                                      
"POLIPNEA.0",                                                                                                      
"POLIPNEA.1",                                                                                                      
"ENFERMEDAD_CRONICA.0",                                                                                            
"ENFERMEDAD_CRONICA.1",                                                                                            
"ANTECED_EPOC.0",                                                                                                  
"ANTECED_EPOC.1",                                                                                                  
"ANTECED_EPOC.2",                                                                                                  
"ANTECED_DIABETES.0",                                                                                              
"ANTECED_DIABETES.1",                                                                                              
"ANTECED_DIABETES.2",                                                                                              
"ANTECED_ASMA.0",                                                                                                  
"ANTECED_ASMA.1",                                                                                                  
"ANTECED_ASMA.2",                                                                                                  
"EMBARAZO.0",                                                                                                      
"EMBARAZO.1",                                                                                                      
"EMBARAZO.2",                                                                                                      
"TIENE_INTUBACION_ENDOTRAQUEAL.0",                                                                                 
"TIENE_INTUBACION_ENDOTRAQUEAL.1",                                                     
"ANTECED_HIPERTENSION.0",                                                                                          
"ANTECED_HIPERTENSION.1",                                                                                          
"ANTECED_HIPERTENSION.2",                                                                                          
"ANTECED_CARDIOVASCULAR.0",                                                                                        
"ANTECED_CARDIOVASCULAR.1",                                                                                        
"ANTECED_CARDIOVASCULAR.2",                                                                                        
"ANTECED_RENAL.0",                                                                                                 
"ANTECED_RENAL.1",                                                                                                 
"ANTECED_RENAL.2",                                                                                                 
"ANT_ENF_HEPATICA_CRONICA.0",                                                                                      
"ANT_ENF_HEPATICA_CRONICA.1",
"ANTECED_CANCER.0",                                                                                                
"ANTECED_CANCER.1",                                                                                                
"ANTECED_CANCER.2" )

pp <- data.frame(matrix(ncol = 21, nrow = 1))
names(pp) <- keep
count = 1
for (factor in keep) {
  pp[factor] = inp[count]
  count = count +1
}

pit = data.frame(matrix(ncol = 50, nrow = 1))
names(pit) <- valores
for (factor in valores) {
  strinn = substr(factor, 1, str_locate(factor, "\\.")[1]-1)
  curval = strtoi(substr(factor, str_locate(factor, "\\.")[1]+1,str_locate(factor, "\\.")[1]+1))
  if (pp[strinn] == curval){
    pit[factor] = 1
  } else{
    pit[factor] = 0
  }
}


if (pp["SEXO"]==0) {
  pit["SEXO.F"]=1
  pit["SEXO.M"]=0
} else {
  pit["SEXO.F"]=0
  pit["SEXO.M"]=1
}


cicar <- rbind(pit,pit)
cicar["EDAD_ANO"] = matrix(c((inp[1]-51.17362)/16.07209,(inp[1]-51.17362)/16.07209))
clin = data.matrix(cicar[1,c(53,51,52,seq(0,50))])
#print(clin)

rf_pred = predict(xgb, clin,type = "prob")

minimo = -0.49
maximo = 1.56
rf_pred = (rf_pred - minimo)/(maximo - minimo)

if (rf_pred > 1){
  rf_pred = 1
}
if (rf_pred < 0){
  rf_pred = 0
}

print(rf_pred)

#save(xgb, file = "xgbModel.RDATA",version = 2)

