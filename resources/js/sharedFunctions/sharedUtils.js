export async function debuggingEnabled() {
	let debugStatus = false;
	await axios.get('/api/debug-status')
		.then(response => {
			debugStatus = response.data.debug;
		})
		.catch(error => {
			log("Error fetching debug status: " + error);
		});
	return debugStatus;
}

export async function log(info) {
	if(await debuggingEnabled()) {
		console.log(info);
		await axios.post('/api/log',{
			info:info
		}).catch(error => {
			console.error("Error logging info: " + error);
		});
	}
}
