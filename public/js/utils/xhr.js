export function xhr(type, host, port, address) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = (event) => {
            if (this.readyState === xhr.DONE) {
                if (this.status === 200) {
                    resolve(xhr);
                }
                else {
                    reject();
                }
            }
        };
        xhr.open(type, `${host}${port ? `:${port}` : ""}${address}`, false);
        xhr.send();
    });
}
