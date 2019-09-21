window.addEventListener("load", () => {
    for(const el of Array.from(document.getElementsByClassName("sortUp")).concat(Array.from(document.getElementsByClassName("sortDown")))) {
        // @ts-ignore
        el.onclick = () => {sort(el)};
    }
});

function sort(button: HTMLSpanElement) {
    const table: HTMLTableElement = button.closest("table")!;
    const index: number = Array.from(button.parentElement!.parentElement!.children).indexOf(button.parentElement!);
    const reverse: boolean = button.classList.contains("sortUp");
    // @ts-ignore
    const elements: HTMLTableRowElement[] = Array.from(table.children[0].children).filter((el) => Array.from(el.children).map((el) => el.nodeName).every((el) => el === "TD"));
    elements.sort((a, b) => (a.children[index] as HTMLTableDataCellElement).innerText.localeCompare((b.children[index] as HTMLTableDataCellElement).innerText, undefined, {numeric: true}));
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