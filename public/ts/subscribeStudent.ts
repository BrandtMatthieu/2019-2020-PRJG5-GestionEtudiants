import { Student, Course } from "./utils/types";
import { xhr } from "./utils/xhr";

/**
 * When the document is loaded
 */
window.addEventListener("load", async (): Promise<void> => {
	const studentsSelector: HTMLSelectElement = document.querySelector("#students");
	const signupButton: HTMLButtonElement = document.querySelector("#signup");

	const students_result: Student[] = JSON.parse(await xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/"));
	for(const student of students_result) {
		const option: HTMLOptionElement = document.createElement("option");
		option.value = student.idStudent.toString();
		option.innerText = `${student.idStudent} - ${student.lastName} ${student.firstName}`;
		studentsSelector.appendChild(option);
	}

	studentsSelector.onchange = async (): Promise<void> => {
		const studentId: string | null = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
		await updateStudentCourses(studentId);
	};

	signupButton.onclick = async (): Promise<void> => {
		const studentsSelector: HTMLSelectElement = document.querySelector("#students");
		const notSubscribedCoursesSelector: HTMLSelectElement = document.querySelector("#notSubscribedCourses");

		const studentId: string | null = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
		const courseId: string | null = (notSubscribedCoursesSelector.options.length > 0) ? notSubscribedCoursesSelector.options[notSubscribedCoursesSelector.selectedIndex].value : null;

		await xhr("POST", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/course/${courseId}/`);
		updateStudentCourses(studentId);
	}

	await updateStudentCourses(students_result.length > 0 ? students_result[0].idStudent.toString() : null);

});

async function getSubscribedCourses(studentId: string): Promise<Course[]> {
	return JSON.parse(await xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/subscribed/`));
}

async function getNotSubscribedCourses(studentId: string): Promise<Course[]> {
	return JSON.parse(await xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/notSubscribed/`));
}

/**
 * Updates the options for
 */
async function updateStudentCourses(studentId: string) {
	const courseTable: HTMLTableElement = document.querySelector("table>tbody");
	const notSubscribedCoursesSelector: HTMLSelectElement = document.querySelector("#notSubscribedCourses");

	while(courseTable.children.length > 3) {
		courseTable.removeChild(courseTable.children[2]);
	}

	while(notSubscribedCoursesSelector.children.length > 0) {
		notSubscribedCoursesSelector.removeChild(notSubscribedCoursesSelector.children[0]);
	}

	const subscribed: Course[] = await getSubscribedCourses(studentId);
	const notSubscribed: Course[] = await getNotSubscribedCourses(studentId);

	for(const course of subscribed) {
		insertCourse(course);
	}

	for(const course of notSubscribed) {
		const option: HTMLOptionElement = document.createElement("option");
		option.value = course.idCourse.toString();
		option.innerText = `${course.courseLabel} - ${course.courseDescription.substr(0, 10)}...`;

		notSubscribedCoursesSelector.appendChild(option);
	}
}

/**
 * Inserts a course into the table
 * @param signupControls the controls buttons
 * @param course the course to insert
 */
async function insertCourse(course: Course) {
	const courseTable: HTMLTableElement = document.querySelector("table>tbody");
	const signupControls: HTMLTableRowElement = document.querySelector("#signupControls");

	const tr: HTMLTableRowElement = document.createElement("tr");

	const cours: HTMLTableCellElement = document.createElement("td");
	cours.innerText = course.courseLabel;

	const libellé: HTMLTableCellElement = document.createElement("td");
	libellé.innerText = course.courseDescription;

	const deleter: HTMLTableCellElement = document.createElement("td");
	const deleterButton: HTMLButtonElement = document.createElement("button");
	deleterButton.innerText = "X";
	deleterButton.className = "buttonLike danger";
	deleterButton.title = "Désinscrire";
	deleterButton.setAttribute("data-courseId", course.idCourse.toString());
	deleterButton.onclick = async function(this: HTMLButtonElement): Promise<void> {
		const studentsSelector: HTMLSelectElement = document.querySelector("#students");
		const studentId: string | null = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
		const courseId: string = this.getAttribute("data-courseId");
		await xhr("DELETE", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/course/${courseId}/`);
		updateStudentCourses(studentId);
	}

	deleter.appendChild(deleterButton);

	tr.appendChild(cours);
	tr.appendChild(libellé);
	tr.appendChild(deleter);

	courseTable.insertBefore(tr, signupControls);
}
