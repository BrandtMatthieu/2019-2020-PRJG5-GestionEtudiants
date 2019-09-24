export interface Student {
    idStudent: number;
    firstName: string;
    lastName: string;
}

export interface Course {
    idCourse: number;
    courseLable: string;
    courseDescription: string;
}

export interface Subscription {
    idStudent: number;
    idcourse: number;
}