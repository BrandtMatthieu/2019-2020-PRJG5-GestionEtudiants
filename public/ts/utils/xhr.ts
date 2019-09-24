export function xhr(type: "GET" | "POST" | "DELETE", host: string, port: number, address: string): Promise<XMLHttpRequest> {
	return new Promise<XMLHttpRequest>((resolve, reject) => {
		const xhr = new XMLHttpRequest();
		xhr.onreadystatechange = (event) => {
			if (this.readyState === xhr.DONE) {
				if (this.status === 200) {
					resolve(xhr);
				} else {
					reject();
				}
			}
		};
		xhr.open(type, `${host}${port ? `:${port}` : ""}${address}`, false);
		xhr.send();
	});
}
