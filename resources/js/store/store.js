import {defineStore} from 'pinia';

export const useGlobalStore = defineStore('Global', {
	// Values
	state: () => ({
		// Mobile View
		isMobileView: false,

		// User Data
		userData: null,
	}),

	// Functions
	actions: {
		// Mobile View
		updateViewType() {
			this.isMobileView = (window.innerWidth <= 1299);
		},

		// User Data
		getUser() {
			return this.userData;
		},
		setUser(data) {
			this.userData = data;
		},
		clearUser() {
			this.userData = null;
		},
		logoutIfUserExpired() {
			return // Temporary - sort out later
			// Logout if session older than 12 hours.
			if(this.userData !== null) {
				let dateCreated = new Date(this.userData.date_created);
				let now = new Date(); // Get the current time
				let diffInHours = (now - dateCreated) / (1000 * 60 * 60); // Calculate difference in hours

				if(diffInHours > 12) {
					this.clearUser();
				}
			}
		},
	},

	// Persistence
	persist:{
		enabled:true,
		strategies:[
			{
				key:'i2a_user',
				storage:localStorage, // or sessionStorage based on requirements
			}
		]
	}
})
