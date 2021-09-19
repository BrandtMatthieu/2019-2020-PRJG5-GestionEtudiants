export function xhr(type, host, port, address) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = (event) => {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200) {
                    resolve(xhr.responseText);
                }
                else {
                    reject();
                }
            }
        };
        xhr.open(type, `http://${host}${port ? `:${port}` : ""}/${address}`, true);
        xhr.send(null);
    });
}
