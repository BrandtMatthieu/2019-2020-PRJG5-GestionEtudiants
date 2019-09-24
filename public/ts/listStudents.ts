import {xhr} from "./utils/xhr";
import { Student } from "./utils/types";

window.addEventListener("load", async () => {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "/students/")
    .then((xhrResult) => {
        for (const result of JSON.parse(xhrResult.responseText)) {
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
});