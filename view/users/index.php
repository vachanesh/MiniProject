<div class="row">
	<div class="col-sm-12">
		<center><h1>Users Form</h1></center>
	</div>
</div>
<div class="form-div">
	<form id="users-form" method="get" action="" novalidate >
		<div class="row">
			<div class="col-sm-6">
			  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
			  </div>
			</div>
			<div class="col-sm-6">
			  <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
			  </div>
			</div>
			<div class="col-sm-6">
			  <div class="form-group">
			    <label for="telephone">Telephone</label>
			    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone Number" required>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
			  <input class="btn btn-primary" type="submit" value="Submit">
			</div>
		</div>
	</form>
</div>

<div class="row">
	<div class="col-md-12">
	  <table class="table table-responsive">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Telephone</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody id="table-rows">
		  
		  </tbody>
		</table>
	</div>
</div>
