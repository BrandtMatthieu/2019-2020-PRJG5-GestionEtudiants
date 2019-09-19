CREATE TABLE "Students" (
	"idStudent"	INTEGER NOT NULL UNIQUE,
	"firstName"	TEXT NOT NULL,
	"lastName"	TEXT NOT NULL,
	PRIMARY KEY("idStudent")
)

CREATE TABLE "Courses" (
	"idCourse"	INTEGER NOT NULL UNIQUE,
	"label"	TEXT NOT NULL,
	PRIMARY KEY("idCourse")
);

CREATE TABLE "Subscriptions" (
	"idStudent"	INTEGER NOT NULL,
	"idCourse"	INTEGER NOT NULL,
	PRIMARY KEY("idStudent","idCourse")
)

INSERT INTO Students VALUES (67554,"Phillipe","Arbre");
INSERT INTO Students VALUES (59865,"Grégory","Lustucru");
INSERT INTO Students VALUES (71009,"Thierry","Brocante");
INSERT INTO Students VALUES (65834,"Edouard","LeBriscard");
INSERT INTO Students VALUES (70128,"Jean","Poire");
INSERT INTO Students VALUES (58702,"Bruce","Horloge");
INSERT INTO Students VALUES (61039,"Peter","File");
INSERT INTO Students VALUES (59286,"Bernard","Urluberlu");

INSERT INTO Courses VALUES ("YMCA","Yoga Malin Comme Alain");
INSERT INTO Courses VALUES ("SPQR","Senatus Populusque Romanus");
INSERT INTO Courses VALUES ("JTM","Joute Terminale Magnifique");
INSERT INTO Courses VALUES ("XD","Xénologie Délibérée");
INSERT INTO Courses VALUES ("JPP","Jazz Précédant Poutine");

INSERT INTO Subscriptions VALUES (67554,"YMCA");
INSERT INTO Subscriptions VALUES (67554,"JPP");
INSERT INTO Subscriptions VALUES (59865,"JPP");
INSERT INTO Subscriptions VALUES (61039,"SPQR");
INSERT INTO Subscriptions VALUES (70128,"JTM");
INSERT INTO Subscriptions VALUES (65834,"XD");

