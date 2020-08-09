# Data-Driven Inference of COVID-19 Clinical Outcome
 

As a final stage of the COVID-19 epidemy, patients either improve or die. The analysis of previous cases could reduce the uncertainty in the final diagnosis and possibly offer some guidelines along which we could improve attention, make arrangements, and assign resources to the patients. Giving a medical condition and clinic diagnosis, our study aims to infer the final outcome for the patient. 
  
Starting with patients registers in a medical dataset, including predictors and resulting patient outcome, 
our proposal is to detect the relative importance of each characteristic and then construct a classifier with them.
For feature selection, we use Boruta, a wrapper method constructed on top of Random Forest (RF). For the classifier, we 
try an ensemble blending the output of a XGBoost, Support Vector Machine (SVM), RF, and Logististic Regression classifiers.

We have set up a web server which runs the classifier [here](http://imagenes.cicataqro.ipn.mx). Also, we are proving the source code for the 
feature selector, and the classifiers in this github. To run the code, you will have to 
modify the corresponding directories in the Rmd file to accomodate the configuration in your machine.
The feature selector and classifiers use the 20200628registers.csv dataset.


The programs use R 3.6.3. You may have to install packages to run the program. 

The paper, under review,  describing the results of the program [is here](AofMR_Data_Driven_Inference_of__COVID_19_qRT_PCR_Results.pdf)

