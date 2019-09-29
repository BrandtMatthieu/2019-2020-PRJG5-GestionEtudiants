var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
/**
 * When document is loaded, gets the students and display them
 */
window.addEventListener("load", () => __awaiter(this, void 0, void 0, function* () {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "students/")
        .then((xhrResult) => {
        const students = JSON.parse(xhrResult);
        for (const student of students) {
            insertStudent(student);
        }
        if (students.length === 0) {
            insertStudent({
                idStudent: null,
                lastName: "(vide)",
                firstName: "(vide)",
            });
        }
    })
        .catch(() => {
        insertStudent({
            idStudent: null,
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
    matricule.innerText = student.idStudent ? student.idStudent.toString() : "(vide)";
    const nom = document.createElement("td");
    nom.innerText = student.lastName.toString();
    const prenom = document.createElement("td");
    prenom.innerText = student.firstName.toString();
    const tr = document.createElement("tr");
    tr.appendChild(matricule);
    tr.appendChild(nom);
    tr.appendChild(prenom);
    table.appendChild(tr);
}
