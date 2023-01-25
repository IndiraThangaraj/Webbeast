from sklearn import metrics
from sklearn.datasets import load_iris
from sklearn.model_selection import StratifiedKFold,train_test_split
from sklearn.neighbors import KNeighborsClassifier
iris = load_iris()
X = iris.data
Y = iris.target
count=1;
skf = StratifiedKFold(n_splits=10, shuffle=True, random_state=1)
for train_index, test_index in skf.split(X,Y) :
   X_train,X_test,Y_train,Y_test = X[train_index],X[test_index],Y[train_index],Y[test_index]
   classifier_knn = KNeighborsClassifier(n_neighbors=3)
   classifier_knn.fit(X_train, Y_train)
   Y_pred = classifier_knn.predict(X_test)
   print(count,"Accuracy:", metrics.accuracy_score(Y_test, Y_pred))
   count=count+1
   accuracy=accuracy+metrics.accuracy_score(Y_test, Y_pred)