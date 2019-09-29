import {xhr} from "./utils/xhr";
import { Student } from "./utils/types";

/**
 * When document is loaded, gets the students and display them
 */
window.addEventListener("load", async (): Promise<void> => {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/")
    .then((xhrResult): void => {
        const students: Student[] = JSON.parse(xhrResult);
        for (const student of students) {
            insertStudent(student);
        }
        if(students.length === 0) {
            insertStudent({
                idStudent: null,
                lastName: "(vide)",
                firstName: "(vide)",
            });
        }
    })
    .catch((): void => {
        insertStudent({
            idStudent: null,
            lastName: "(erreur)",
            firstName: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
});

/**
 * Displays a student. in a table
 * @param student the student to display
 */
function insertStudent(student: Student): void {
    const table: HTMLTableElement = document.querySelector("#table>tbody");

    const matricule: HTMLTableDataCellElement = document.createElement("td");
    matricule.innerText = student.idStudent ? student.idStudent.toString() : "(vide)";

    const nom: HTMLTableDataCellElement = document.createElement("td");
    nom.innerText = student.lastName.toString();

    const prenom: HTMLTableDataCellElement = document.createElement("td");
    prenom.innerText = student.firstName.toString();

    const tr: HTMLTableRowElement = document.createElement("tr");
    tr.appendChild(matricule);
    tr.appendChild(nom);
    tr.appendChild(prenom);

    table.appendChild(tr);
}
