var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
/**
 * When document is loaded, gets the courses and display them
 */
window.addEventListener("load", () => __awaiter(this, void 0, void 0, function* () {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "courses/")
        .then((xhrResult) => {
        const courses = JSON.parse(xhrResult);
        for (const course of courses) {
            insertCourse(course);
        }
        if (courses.length === 0) {
            insertCourse({
                idCourse: null,
                courseLabel: "(vide)",
                courseDescription: "(vide)",
            });
        }
    })
        .catch(() => {
        insertCourse({
            idCourse: null,
            courseLabel: "(erreur)",
            courseDescription: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
}));
/**
 * Displays a course in a table
 * @param course the course to display
 */
function insertCourse(course) {
    const table = document.querySelector("#table>tbody");
    const id = document.createElement("td");
    id.innerText = course.idCourse.toString();
    const label = document.createElement("td");
    label.innerText = course.courseLabel.toString();
    const description = document.createElement("td");
    description.innerText = course.courseDescription.toString();
    const tr = document.createElement("tr");
    tr.appendChild(id);
    tr.appendChild(label);
    tr.appendChild(description);
    table.appendChild(tr);
}
