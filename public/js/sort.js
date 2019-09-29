"use strict";
/**
 * When the document is loaded, add an eventListener to the sort buttons
 */
window.addEventListener("load", () => {
    for (const el of Array.from(document.getElementsByClassName("sortUp"))
        .concat(Array.from(document.getElementsByClassName("sortDown")))) {
        // @ts-ignore
        el.onclick = (el) => {
            sort(el);
        };
    }
});
/**
 * Sorts the elements in a table
 * @param button the sorting button of the table
 */
function sort(button) {
    const table = button.closest("table"); // table to sort
    const index = Array.from(button.parentElement.parentElement.children)
        .indexOf(button.parentElement); // sorting criteria
    const reverse = button.classList.contains("sortUp"); // if reverse sorted
    // @ts-ignore
    const elements = Array.from(table.children[0].children) // elements to sort
        .filter((el) => {
        return Array.from(el.children).map((el) => {
            return el.nodeName;
        }).every((el) => {
            return el === "TD";
        });
    });
    elements.sort((a, b) => {
        return a.children[index].innerText.localeCompare(b.children[index].innerText, undefined, { numeric: true });
    });
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
