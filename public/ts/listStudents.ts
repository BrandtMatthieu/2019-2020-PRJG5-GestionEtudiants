import {xhr} from "./utils/xhr";
import { Student } from "./utils/types";

window.addEventListener("load", async () => {
    const results: Student[] = JSON.parse((await xhr("GET", document.location.hostname, parseInt(document.location.port), "/students/")).responseText);
    for (const result of results) {
        const matricule: HTMLTableDataCellElement = document.createElement("td");
        matricule.innerText = result.idStudent.toString();
        
        const nom: HTMLTableDataCellElement = document.createElement("td");
        nom.innerText = result.lastName;

        const prenom: HTMLTableDataCellElement = document.createElement("td");
        prenom.innerText = result.firstName;

        const tr: HTMLTableRowElement = document.createElement("tr");
        tr.appendChild(matricule);
        tr.appendChild(nom);
        tr.appendChild(prenom);

        document.getElementById("table").appendChild(tr);
    }
});