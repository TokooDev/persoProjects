<!DOCTYPE html>
<html>
<head>
	<title>CRUD With VUE JS</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="app">
		<div class="container-fluid">
			<div class="row bg-dark">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<a class="nav-link" href="./"><h1 class="text-center text-light pt-1">Crud app avec vue js et php/mysql</h1></a>
				</div>
			</div>
			
		</div>
		<div class="container">
			<div class="row mt-3">
				<div class="col-lg-8 md-8 sm-12">
					<h3 class="text-info"><i class="fas fa-list"></i>&nbsp;Liste des utilisateurs</h3>
				</div>
				<div class="col-lg-4 md-8 sm-12">
					<button class="btn btn-info float-right" @click="showAddModel=true">
						<i class="fas fa-user"></i>&nbsp;&nbsp;Ajouter un utilisateur
					</button>
				</div>
			</div>
		<hr class="bg-info">	
		  <!-- MESSAGES -->
		  	<div class="alert alert-danger" role="alert" v-if="errorMessage">
                {{ errorMessage }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-success" role="alert" v-if="successMessage">
	            {{ successMessage }}
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
            </div>
            <!-- Affichage des utilisateurs -->
            <div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12">
            		<table class="table table-bordered table-striped">
            			<thead>
            				<tr class="text-center bg-info text-light">
            					<th>ID</th>
            					<th>NOM</th>
            					<th>EMAIL</th>
            					<th>TELEPHONE</th>
            					<th>MODIFIER</th>
            					<th>SUPPRIMER</th>
            				</tr>
            			</thead>
            			<tbody>
            				<tr class="text-center" v-for="user in users">
            					<td>{{ user.id }}</td>
            					<td>{{ user.name }}</</td>
            					<td>{{ user.email }}</</td>
            					<td>{{ user.phone }}</</td>
            					<td><a href="#" class="text-warning" @click="showEditModel=true"><i class="fas fa-edit"></i></a></td>
            					<td><a href="#" class="text-danger" @click="showDeleteModel=true"><i class="fas fa-trash-alt"></i></a></td>
            				</tr>
            			</tbody>
            			
            		</table>
            	</div>
            </div>
              
		</div>

		<!-- add -->
		<div id="overlay" v-if="showAddModel">
			<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Ajout d'un nouveau utilisateur</h5>
		        <button type="button" class="close" @click="showAddModel=false">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	            <form action="" method="POST">
		          <div class="form-group">
		            <input type="text" name="name" class="form-control" placeholder="Nom de l'utilisateur" v-model="newUser.name">
		          </div>
		          <div class="form-group">
		            <input type="email" name="email" class="form-control" placeholder="Email de l'utilisateur" v-model="newUser.email">
		          </div>
		          <div class="form-group">
		            <input type="tel" name="phone" class="form-control" placeholder="Téléphone de l'utilisateur" v-model="newUser.phone">
		          </div>
		          <div class="form-group">
		            <input type="submit" name="create" class="btn btn-info btn-block" value="Enregistrer" @click="showAddModel=false; addUser();">
		          </div>
		          
		        </form>
		        </div>
		      </div>
		    </div>
		</div>
		<!-- edit -->
		<div id="overlay" v-if="showEditModel">
			<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Modification d'un  utilisateur</h5>
		        <button type="button" class="close" @click="showEditModel=false">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	            <form action="" method="POST">
		          <div class="form-group">
		            <input type="text" name="name" class="form-control" placeholder="Nom de l'utilisateur" autofocus>
		          </div>
		          <div class="form-group">
		            <input type="email" name="email" class="form-control" placeholder="Email de l'utilisateur" autofocus>
		          </div>
		          <div class="form-group">
		            <input type="tel" name="phone" class="form-control" placeholder="Téléphone de l'utilisateur" autofocus>
		          </div>
		          <div class="form-group">
		            <input type="submit" name="update" class="btn btn-info btn-block" value="Modifier" @click="showEditModel=false">
		          </div>
		          
		        </form>
		        </div>
		      </div>
		    </div>
		</div>
		<!-- delete -->
		<div id="overlay" v-if="showDeleteModel">
			<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title text-center">Suppression d'un utilisateur</h5>
		        <button type="button" class="close" @click="showDeleteModel=false">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	            <form action="" method="POST">
		          <div class=" row form-group">
		          	<div class="col-lg-12  mb-4">
		          		<h5 class="text-danger text-center">Etes-vous sûr(e) de vouloir supprimer ?</h5>
		          		<h6 class="text-center">Vous êtes entrain de supprimer 'tokosel'</h6>
		          	</div>
		          	<div class="col-lg-6 offset-2">
		          		<input type="submit" name="delete" class="btn btn-danger" value="Oui" @click="showDeleteModel=false">
		          	</div>
		            <div class="col-lg-2">
		          		<input type="submit" name="delete" class="btn btn-info" value="Non" @click="showDeleteModel=false">
		          	</div>
		          </div>
		          
		        </form>
		        </div>
		      </div>
		    </div>
		</div>
		  
		  
	</div>

<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>