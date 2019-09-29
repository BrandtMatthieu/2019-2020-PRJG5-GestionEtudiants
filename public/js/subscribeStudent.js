var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
/**
 * When the document is loaded
 */
window.addEventListener("load", () => __awaiter(this, void 0, void 0, function* () {
    const studentsSelector = document.querySelector("#students");
    const signupButton = document.querySelector("#signup");
    const students_result = JSON.parse(yield xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/"));
    for (const student of students_result) {
        const option = document.createElement("option");
        option.value = student.idStudent.toString();
        option.innerText = `${student.idStudent} - ${student.lastName} ${student.firstName}`;
        studentsSelector.appendChild(option);
    }
    studentsSelector.onchange = () => __awaiter(this, void 0, void 0, function* () {
        const studentId = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
        yield updateStudentCourses(studentId);
    });
    signupButton.onclick = () => __awaiter(this, void 0, void 0, function* () {
        const studentsSelector = document.querySelector("#students");
        const notSubscribedCoursesSelector = document.querySelector("#notSubscribedCourses");
        const studentId = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
        const courseId = (notSubscribedCoursesSelector.options.length > 0) ? notSubscribedCoursesSelector.options[notSubscribedCoursesSelector.selectedIndex].value : null;
        yield xhr("POST", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/course/${courseId}/`);
        updateStudentCourses(studentId);
    });
    yield updateStudentCourses(students_result.length > 0 ? students_result[0].idStudent.toString() : null);
}));
function getSubscribedCourses(studentId) {
    return __awaiter(this, void 0, void 0, function* () {
        return JSON.parse(yield xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/subscribed/`));
    });
}
function getNotSubscribedCourses(studentId) {
    return __awaiter(this, void 0, void 0, function* () {
        return JSON.parse(yield xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/notSubscribed/`));
    });
}
/**
 * Updates the options for
 */
function updateStudentCourses(studentId) {
    return __awaiter(this, void 0, void 0, function* () {
        const courseTable = document.querySelector("table>tbody");
        const notSubscribedCoursesSelector = document.querySelector("#notSubscribedCourses");
        while (courseTable.children.length > 3) {
            courseTable.removeChild(courseTable.children[2]);
        }
        while (notSubscribedCoursesSelector.children.length > 0) {
            notSubscribedCoursesSelector.removeChild(notSubscribedCoursesSelector.children[0]);
        }
        const subscribed = yield getSubscribedCourses(studentId);
        const notSubscribed = yield getNotSubscribedCourses(studentId);
        for (const course of subscribed) {
            insertCourse(course);
        }
        for (const course of notSubscribed) {
            const option = document.createElement("option");
            option.value = course.idCourse.toString();
            option.innerText = `${course.courseLabel} - ${course.courseDescription.substr(0, 10)}...`;
            notSubscribedCoursesSelector.appendChild(option);
        }
    });
}
/**
 * Inserts a course into the table
 * @param signupControls the controls buttons
 * @param course the course to insert
 */
function insertCourse(course) {
    return __awaiter(this, void 0, void 0, function* () {
        const courseTable = document.querySelector("table>tbody");
        const signupControls = document.querySelector("#signupControls");
        const tr = document.createElement("tr");
        const cours = document.createElement("td");
        cours.innerText = course.courseLabel;
        const libellé = document.createElement("td");
        libellé.innerText = course.courseDescription;
        const deleter = document.createElement("td");
        const deleterButton = document.createElement("button");
        deleterButton.innerText = "X";
        deleterButton.className = "buttonLike danger";
        deleterButton.title = "Désinscrire";
        deleterButton.setAttribute("data-courseId", course.idCourse.toString());
        deleterButton.onclick = function () {
            return __awaiter(this, void 0, void 0, function* () {
                const studentsSelector = document.querySelector("#students");
                const studentId = (studentsSelector.options.length > 0) ? studentsSelector.options[studentsSelector.selectedIndex].value : null;
                const courseId = this.getAttribute("data-courseId");
                yield xhr("DELETE", `api.${document.location.hostname}`, parseInt(document.location.port), `students/${studentId}/course/${courseId}/`);
                updateStudentCourses(studentId);
            });
        };
        deleter.appendChild(deleterButton);
        tr.appendChild(cours);
        tr.appendChild(libellé);
        tr.appendChild(deleter);
        courseTable.insertBefore(tr, signupControls);
    });
}
