/**
 * When the document is loaded, add an eventListener to the sort buttons
 */
window.addEventListener("load", (): void => {
    for(const el of Array.from(document.getElementsByClassName("sortUp"))
                    .concat(Array.from(document.getElementsByClassName("sortDown")))) {
        // @ts-ignore
        el.onclick = (el: HTMLSpanElement): void => {
            sort(el);
        };
    }
});

/**
 * Sorts the elements in a table
 * @param button the sorting button of the table
 */
function sort(button: HTMLSpanElement): void {
    const table: HTMLTableElement = button.closest("table")!; // table to sort
    const index: number = Array.from(button.parentElement!.parentElement!.children)
                                .indexOf(button.parentElement!); // sorting criteria
    const reverse: boolean = button.classList.contains("sortUp"); // if reverse sorted
    // @ts-ignore
    const elements: HTMLTableRowElement[] = Array.from(table.children[0].children) // elements to sort
        .filter((el): boolean => {
            return Array.from(el.children).map((el): string => {
                return el.nodeName;
            }).every((el): boolean => {
                return el === "TD";
            });
        });

    elements.sort((a, b): number => {
        return (a.children[index] as HTMLTableDataCellElement).innerText.localeCompare((b.children[index] as HTMLTableDataCellElement).innerText, undefined, {numeric: true});
    });
    if(reverse) {
        elements.reverse();
    }

    while(table.children[0].children.length > 1) {
        table.children[0].removeChild(table.children[0].children[1]);
    }
    for(const el of elements) {
        table.children[0].appendChild(el);
    }
}
