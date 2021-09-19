var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
/**
 * When document is loaded, gets the students and display them
 */
window.addEventListener("load", () => __awaiter(void 0, void 0, void 0, function* () {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/")
        .then((xhrResult) => {
        const students = JSON.parse(xhrResult);
        for (const student of students) {
            insertStudent(student);
        }
        if (students.length === 0) {
            insertStudent({
                idStudent: 0,
                lastName: "(vide)",
                firstName: "(vide)",
            });
        }
    })
        .catch(() => {
        insertStudent({
            idStudent: 0,
            lastName: "(erreur)",
            firstName: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
}));
/**
 * Displays a student. in a table
 * @param student the student to display
 */
function insertStudent(student) {
    const table = document.querySelector("#table>tbody");
    const matricule = document.createElement("td");
    const matriculeInput = document.createElement("input");
    matriculeInput.className = "invisInput";
    matriculeInput.value = student.idStudent ? student.idStudent.toString() : "(vide)";
    matricule.appendChild(matriculeInput);
    const nom = document.createElement("td");
    const nomInput = document.createElement("input");
    nomInput.className = "invisInput";
    nomInput.value = student.lastName.toString();
    nom.appendChild(nomInput);
    const prenom = document.createElement("td");
    const prenomInput = document.createElement("input");
    prenomInput.className = "invisInput";
    prenomInput.value = student.firstName.toString();
    prenom.appendChild(prenomInput);
    const tr = document.createElement("tr");
    tr.appendChild(matricule);
    tr.appendChild(nom);
    tr.appendChild(prenom);
    table.appendChild(tr);
}
