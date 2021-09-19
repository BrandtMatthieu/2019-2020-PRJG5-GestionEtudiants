import {xhr} from "./utils/xhr";
import { Student } from "./utils/types";

/**
 * When document is loaded
 */
window.addEventListener("load", loadStudents);

/**
 * gets the students and display them
 */
async function loadStudents(): Promise<void> {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/")
    .then((xhrResult): void => {
        const students: Student[] = JSON.parse(xhrResult);
        for (const student of students) {
            insertStudent(student);
        }
        if(students.length === 0) {
            insertStudent({
                idStudent: 0,
                lastName: "(vide)",
                firstName: "(vide)",
            });
        }
    })
    .catch((): void => {
        insertStudent({
            idStudent: 0,
            lastName: "(erreur)",
            firstName: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
}

/**
 * Displays a student. in a table
 * @param student the student to display
 */
function insertStudent(student: Student): void {
    const table: HTMLTableElement = document.querySelector("#table>tbody");

    const matricule: HTMLTableDataCellElement = document.createElement("td");
    const matriculeInput: HTMLInputElement = document.createElement("input");
    matriculeInput.className = "invisInput";
    matriculeInput.value = student.idStudent ? student.idStudent.toString() : "(vide)";
    matriculeInput.addEventListener("change", idStudentEdit);
    matricule.appendChild(matriculeInput);

    const nom: HTMLTableDataCellElement = document.createElement("td");
    const nomInput: HTMLInputElement = document.createElement("input");
    nomInput.className = "invisInput";
    nomInput.value = student.lastName.toString();
    nomInput.addEventListener("change", firstNameEdit);
    nom.appendChild(nomInput);

    const prenom: HTMLTableDataCellElement = document.createElement("td");
    const prenomInput: HTMLInputElement = document.createElement("input");
    prenomInput.className = "invisInput";
    prenomInput.value = student.firstName.toString();
    prenomInput.addEventListener("change", lastNameEdit);
    prenom.appendChild(prenomInput);

    const tr: HTMLTableRowElement = document.createElement("tr");
    tr.appendChild(matricule);
    tr.appendChild(nom);
    tr.appendChild(prenom);

    table.appendChild(tr);
}


async function idStudentEdit() {
    await xhr("POST", `api.${document.location.hostname}`, parseInt(document.location.port), "students/")
}

async function firstNameEdit() {

}

async function lastNameEdit() {

}
