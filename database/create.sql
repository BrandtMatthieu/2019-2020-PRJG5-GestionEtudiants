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