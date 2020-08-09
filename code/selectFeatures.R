


#perform feature analysis using Boruta
selectFeatures <- function (dataset, prefix) {
  
  
  #select features
  boruta.train = suppressWarnings(Boruta(dataset$X, dataset$y, pValue = 0.01, maxRuns = 100, mcAdj = TRUE))
  
  
  # save boruta results
  filename = paste(figures.dir, "boruta_", prefix,".jpg", sep = "")
  jpeg(filename, width = 700, height = 350)
  
  plot(boruta.train, xlab = "", xaxt = "n")
  lz<-lapply(1:ncol(boruta.train$ImpHistory),function(i)
    boruta.train$ImpHistory[is.finite(boruta.train$ImpHistory[,i]),i])
  names(lz) <- colnames(boruta.train$ImpHistory)
  Labels <- sort(sapply(lz,median))
  index <- order(sapply(lz,median))
  num.labels = sprintf("%d",index)
  
  #because names are so long, written in Spanish, I choose to use numeric labels
  axis(side = 1,las=2,labels = num.labels,at = 1:ncol(boruta.train$ImpHistory), cex.axis = 0.7)
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
