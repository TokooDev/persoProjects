<!DOCTYPE html>
<html>
<head>
	<title>CRUD With VUE JS</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
	<div id="app">
		<div class="container-fluid">
			<div class="row bg-dark">
				<div class="lg-12 md-12 sm-12">
					<p class="text-center text-light display-4 pt-2">Crud app avec vue js et php/mysql</p>
				</div>
			</div>
			
		</div>
		<div class="container">
			<div class="row mt-3">
				<div class="col-lg-8 md-8 sm-12">
					<h3 class="text-info"><i class="fas fa-list"></i>&nbsp;Liste des utilisateurs</h3>
				</div>
				<div class="col-lg-4 md-8 sm-12">
					<button class="btn btn-info float-right">
						<i class="fas fa-user"></i>&nbsp;&nbsp;Ajouter un utilisateur
					</button>
				</div>
			</div>
		<hr class="bg-info">	
		  <!-- MESSAGES -->
		  	<div class="alert alert-danger" role="alert" v-if="errorMessage">
                errorMessage
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-success" role="alert" v-if="successMessage">
	            successMessage
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
            				<tr class="text-center">
            					<td>1</td>
            					<td>tokosel</td>
            					<td>tokosel@gmail.com</td>
            					<td>774640304</td>
            					<td><a href="#" class="text-warning"><i class="fas fa-edit"></i></a></td>
            					<td><a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            				</tr>
            				<tr class="text-center">
            					<td>1</td>
            					<td>tokosel</td>
            					<td>tokosel@gmail.com</td>
            					<td>774640304</td>
            					<td><a href="#" class="text-warning"><i class="fas fa-edit"></i></a></td>
            					<td><a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            				</tr>
            				<tr class="text-center">
            					<td>1</td>
            					<td>tokosel</td>
            					<td>tokosel@gmail.com</td>
            					<td>774640304</td>
            					<td><a href="#" class="text-warning"><i class="fas fa-edit"></i></a></td>
            					<td><a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            				</tr>
            				<tr class="text-center">
            					<td>1</td>
            					<td>tokosel</td>
            					<td>tokosel@gmail.com</td>
            					<td>774640304</td>
            					<td><a href="#" class="text-warning"><i class="fas fa-edit"></i></a></td>
            					<td><a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            				</tr>
            			</tbody>
            			
            		</table>
            	</div>
            </div>
              
		</div>
	</div>

<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>