CREATE TABLE `students` (
	`idStudent`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`firstName`	varchar NOT NULL,
	`lastName`	varchar NOT NULL
);

CREATE TABLE `courses` (
	`idCourse`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`courseLabel`	varchar NOT NULL,
	`courseDescription`	varchar NOT NULL
);

CREATE TABLE `subscriptions` (
	`idStudent`	integer NOT NULL,
	`idCourse`	integer NOT NULL,
	FOREIGN KEY(`idStudent`) REFERENCES `students`(`idStudent`),
	PRIMARY KEY(`idStudent`,`idCourse`),
	FOREIGN KEY(`idCourse`) REFERENCES `courses`(`idCourse`)
);

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

INSERT INTO subscriptions VALUES (59865, 3);
INSERT INTO subscriptions VALUES (61039, 5);
INSERT INTO subscriptions VALUES (65834, 2);
INSERT INTO subscriptions VALUES (67554, 4);
INSERT INTO subscriptions VALUES (67554, 5);
INSERT INTO subscriptions VALUES (70128, 1);
