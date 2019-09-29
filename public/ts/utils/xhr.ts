export function xhr(type: "GET" | "POST" | "DELETE" | "PUT" | "OPTIONS", host: string, port: number, address: string): Promise<string> {
	return new Promise<string>((resolve, reject) => {
		const xhr = new XMLHttpRequest();
		xhr.onreadystatechange = (event) => {
			if (xhr.readyState === xhr.DONE) {
				if (xhr.status === 200) {
					resolve(xhr.responseText);
				} else {
					reject();
				}
			}
		};
		xhr.open(type, `http://${host}${port ? `:${port}` : ""}/${address}`, true);
		xhr.send(null);
	});
}
