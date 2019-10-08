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
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "logs/")
        .then((xhrResult) => {
        const logs = JSON.parse(xhrResult);
        for (const log of logs) {
            insertStudent(log);
        }
        if (logs.length === 0) {
            insertStudent({
                timestamp: 0,
                login: "(vide)",
                idAction: -1,
                idStudent: 0,
                value: "(vide)",
            });
        }
    })
        .catch(() => {
        insertStudent({
            timestamp: 0,
            login: "(erreur)",
            idAction: -1,
            idStudent: 0,
            value: "(erreur)",
        });
        console.error("Error happened during xhr");
    });
}));
/**
 * Displays a student. in a table
 * @param student the student to display
 */
function insertStudent(log) {
    const table = document.querySelector("#table>tbody");
    const timestamp = document.createElement("td");
    timestamp.innerText = log.timestamp ? new Date(log.timestamp).toLocaleString() : "(vide)";
    const login = document.createElement("td");
    login.innerText = log.login.toString();
    const action = document.createElement("td");
    switch (log.idAction) {
        case 0:
            action.innerText = `a ajouté l'étudiant ${log.idStudent}`;
            break;
        case 1:
            action.innerText = `a supprimé l'étudiant ${log.idStudent}`;
            break;
        case 2:
            action.innerText = `a changé l'id de l'étudiant ${log.idStudent} par ${log.value}`;
            break;
        case 3:
            action.innerText = `a changé le prénom de l'étudiant ${log.idStudent} par ${log.value}`;
            break;
        case 4:
            action.innerText = `a changé le nom de famille de l'étudiant ${log.idStudent} par ${log.value}`;
            break;
        case 5:
            action.innerText = `a inscrit l'étudiant ${log.idStudent} au cours ${log.value}`;
            break;
        case 6:
            action.innerText = `a désinscrit l'étudiant ${log.idStudent} du cours ${log.value}`;
            break;
        default:
            action.innerText = log.value;
            break;
    }
    const tr = document.createElement("tr");
    tr.appendChild(timestamp);
    tr.appendChild(login);
    tr.appendChild(action);
    table.appendChild(tr);
}
