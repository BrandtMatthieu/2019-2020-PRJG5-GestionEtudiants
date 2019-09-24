var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { xhr } from "./utils/xhr";
window.addEventListener("load", () => __awaiter(this, void 0, void 0, function* () {
    xhr("GET", `api.${document.location.hostname}`, parseInt(document.location.port), "/students/")
        .then((xhrResult) => {
        for (const result of JSON.parse(xhrResult.responseText)) {
            const matricule = document.createElement("td");
            matricule.innerText = result.idStudent.toString();
            const nom = document.createElement("td");
            nom.innerText = result.lastName;
            const prenom = document.createElement("td");
            prenom.innerText = result.firstName;
            const tr = document.createElement("tr");
            tr.appendChild(matricule);
            tr.appendChild(nom);
            tr.appendChild(prenom);
            document.getElementById("table").appendChild(tr);
        }
    });
}));
