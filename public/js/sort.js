"use strict";
window.addEventListener("load", () => {
    for (const el of Array.from(document.getElementsByClassName("sortUp")).concat(Array.from(document.getElementsByClassName("sortDown")))) {
        // @ts-ignore
        el.onclick = () => { sort(el); };
    }
});
function sort(button) {
    const table = button.closest("table");
    const index = Array.from(button.parentElement.parentElement.children).indexOf(button.parentElement);
    const reverse = button.classList.contains("sortUp");
    // @ts-ignore
    const elements = Array.from(table.children[0].children).filter((el) => Array.from(el.children).map((el) => el.nodeName).every((el) => el === "TD"));
    elements.sort((a, b) => a.children[index].innerText.localeCompare(b.children[index].innerText, undefined, { numeric: true }));
    if (reverse) {
        elements.reverse();
    }
    while (table.children[0].children.length > 1) {
        table.children[0].removeChild(table.children[0].children[1]);
    }
    for (const el of elements) {
        table.children[0].appendChild(el);
    }
}
