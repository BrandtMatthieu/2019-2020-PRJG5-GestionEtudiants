/**
 * Represents a student
 */
export interface Student {
    idStudent: number;
    firstName: string;
    lastName: string;
}

/**
 * Represents a course
 */
export interface Course {
    idCourse: number;
    courseLabel: string;
    courseDescription: string;
}
