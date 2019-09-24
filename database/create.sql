CREATE TABLE IF NOT EXISTS "Students" (
	"idStudent"	INTEGER NOT NULL UNIQUE,
	"firstName"	TEXT NOT NULL,
	"lastName"	TEXT NOT NULL,
	PRIMARY KEY("idStudent")
)

CREATE TABLE IF NOT EXISTS "Courses" (
	"idCourse"	INTEGER NOT NULL UNIQUE,
	"courseLabel"	TEXT NOT NULL,
	"courseDescription"	TEXT NOT NULL,
	PRIMARY KEY("idCourse")
);

CREATE TABLE IF NOT EXISTS "Subscriptions" (
	"idStudent"	INTEGER NOT NULL,
	"idCourse"	TEXT NOT NULL,
	PRIMARY KEY("idStudent", "idCourse")
)

INSERT INTO Students VALUES (58702, "Bruce", "Horloge");
INSERT INTO Students VALUES (59286, "Bernard", "Urluberlu");
INSERT INTO Students VALUES (59865, "Grégory", "Lustucru");
INSERT INTO Students VALUES (61039, "Peter", "File");
INSERT INTO Students VALUES (65834, "Edouard", "LeBriscard");
INSERT INTO Students VALUES (67554, "Phillipe", "Arbre");
INSERT INTO Students VALUES (70128, "Jean", "Poire");
INSERT INTO Students VALUES (71009, "Thierry", "Brocante");

INSERT INTO Courses VALUES (1, "ERP", "Progiciel de gestion intégré");
INSERT INTO Courses VALUES (2, "MOB", "Développement mobile");
INSERT INTO Courses VALUES (3, "PRJ", "Gestion de projet");
INSERT INTO Courses VALUES (4, "TEX", "Expression et communication");
INSERT INTO Courses VALUES (5, "ORG", "Organisation des entreprises");
INSERT INTO Courses VALUES (6, "WEB", "Développement web");
INSERT INTO Courses VALUES (7, "PER", "Persistance des données");
INSERT INTO Courses VALUES (8, "SYS", "Systèmes d'exploitation");
INSERT INTO Courses VALUES (9, "VEI", "Veilles technologiques");

INSERT INTO Subscriptions VALUES (59865, 3);
INSERT INTO Subscriptions VALUES (61039, 5);
INSERT INTO Subscriptions VALUES (65834, 2);
INSERT INTO Subscriptions VALUES (67554, 4);
INSERT INTO Subscriptions VALUES (67554, 5);
INSERT INTO Subscriptions VALUES (70128, 1);
