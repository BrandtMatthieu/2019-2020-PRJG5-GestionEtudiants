#tables SQL
Student
-idStudent
-lastName
-firstName


Cours
-idCours
-label

Inscription
-idCours
-idStudent
-dateInscription

#requetes SQL

getStudents()
addStudent(nom, prénom, matricule?)
getCourses()
subscribeToCourse(matricule, idCours)