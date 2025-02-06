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

export async function getAccount(email_address,password) {
	if(!email_address || !password) return false;

	let params = {};
	if(email_address) params.username = email_address;
	if(password) params.password = password;

	let accountResult = await axios.post('/api/getAccount',params).then((response) => {
		return response.data;
	})
	.catch((error) => {
		log(`Error Getting Account: ${error}`);
		return false;
	});

	if(accountResult) {
		return accountResult;
	}

	return false;
}
