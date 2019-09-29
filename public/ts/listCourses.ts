import {xhr} from "./utils/xhr";
import { Course } from "./utils/types";

/**
 * When document is loaded, gets the courses and display them
 */
window.addEventListener("load", async (): Promise<void> => {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "courses/")
    .then((xhrResult): void => {
        const courses: Course[] = JSON.parse(xhrResult);
        for (const course of courses) {
            insertCourse(course);
        }
        if(courses.length === 0) {
            insertCourse({
                idCourse: null,
                courseLabel: "(vide)",
                courseDescription: "(vide)",
            });
        }
    })
    .catch((): void => {
        insertCourse({
            idCourse: null,
            courseLabel: "(erreur)",
            courseDescription: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
});

/**
 * Displays a course in a table
 * @param course the course to display
 */
function insertCourse(course: Course): void {
    const table: HTMLTableElement = document.querySelector("#table>tbody");

    const id: HTMLTableDataCellElement = document.createElement("td");
    id.innerText = course.idCourse.toString();

    const label: HTMLTableDataCellElement = document.createElement("td");
    label.innerText = course.courseLabel.toString();

    const description: HTMLTableDataCellElement = document.createElement("td");
    description.innerText = course.courseDescription.toString();

    const tr: HTMLTableRowElement = document.createElement("tr");
    tr.appendChild(id);
    tr.appendChild(label);
    tr.appendChild(description);

    table.appendChild(tr);
}
