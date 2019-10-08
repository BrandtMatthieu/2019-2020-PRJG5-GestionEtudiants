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

export interface Log {
    timestamp: number;
    login: string;
    idAction: number;
    idStudent: number;
    value: string;
}
