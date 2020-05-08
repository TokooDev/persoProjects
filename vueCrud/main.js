var app = new Vue({
	el: '#app',
	data:{
		errorMessage: "",
		successMessage: "",
		showAddModel: false,
		showEditModel: false,
		showDeleteModel: false,
		users: [],
		newUser: {name: "",email: "",phone: ""},
		currentUser: {}
	},
	mounted: function(){
		this.getAllUsers();
	},
	methods:{
		//Affichage
		getAllUsers(){
			axios.get("http://localhost/persoProjects/vueCrud/process.php?action=read").then(function(response){
				if (response.data.error) {
					app.errorMessage= response.data.message;
				}else{
					app.users= response.data.users;
				}
			});
		},
		//Ajout
		addUser(){
			var formData = app.toFormData(app.newUser);
			axios.post("http://localhost/persoProjects/vueCrud/process.php?action=create", formData).then(function(response){
				app.newUser = {name: "",email: "",phone: ""};
				if (response.data.error) {
					app.errorMessage= response.data.message;
				}else{
					app.successMessage= response.data.message;
					app.getAllUsers();
				}
			});
		},
		//Mofification
		updateUser(){
			var formData = app.toFormData(app.currentUser);
			axios.post("http://localhost/persoProjects/vueCrud/process.php?action=update", formData).then(function(response){
				app.currentUser = {};
				if (response.data.error) {
					app.errorMessage= response.data.message;
				}else{
					app.successMessage= response.data.message;
					app.getAllUsers();
				}
			});
		},
		toFormData(obj){
			var fd = new FormData();
			for (var i in obj) {
				fd.append(i,obj[i]);
			}
			return fd;
		},
		selectUser(user){
			app.currentUser = user;
		}
	}
});