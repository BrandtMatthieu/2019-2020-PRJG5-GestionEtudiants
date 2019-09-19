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

INSERT INTO Courses VALUES (121,"YMCA");
INSERT INTO Courses VALUES (133,"Senatus Populusque Romanus");
INSERT INTO Courses VALUES (025,"JTM");
INSERT INTO Courses VALUES (094,"XD");
INSERT INTO Courses VALUES (101,"JPP");

INSERT INTO Subscriptions VALUES (67554,121);
INSERT INTO Subscriptions VALUES (67554,133);
INSERT INTO Subscriptions VALUES (59865,101);
INSERT INTO Subscriptions VALUES (61039,133);
INSERT INTO Subscriptions VALUES (70128,025);
INSERT INTO Subscriptions VALUES (65834,094);
