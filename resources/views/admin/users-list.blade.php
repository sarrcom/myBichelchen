@php
    session_start();
@endphp
@extends('templates.main')

@section('title', 'myBichelchen')

@section('content')
<?php
//connect to database
require_once 'connect.php';
//order the users first by initializing the order variable
$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){
    //order list alphabetically by lastname
	if($_GET['column'] == 'lastname'){
		$order = ' ORDER BY lastname';
    }
    //order list alphabetically by firstname
	elseif($_GET['column'] = 'first_name'){
		$order = ' ORDER BY first_name';
    }
    //order list numerically by birthdate
	elseif($_GET['column'] == 'date_of_birth'){
		$order = ' ORDER BY date_of_birth';
    }
    //ascending list order
	if($_GET['order'] == 'asc'){
		$order.= ' ASC';
    }
    //descending list order
	elseif($_GET['order'] == 'desc'){
		$order.= ' DESC';
	}
}

//select all the users
$queryUsers = $db->prepare('SELECT * FROM jerd_users'. $order);
if($queryUsers->execute()){
	$users = $queryUsers->fetchAll();
}

//audits for adding a new user, if the fields ARE NOT empty check for these particular criterias
if(!empty($_POST)){

    //declare and initialize an empty array called $errors
    $errors=[];

    //this is to prevent injections
	foreach($_POST as $key => $value){
		$_POST[$key] = strip_tags(trim($value));
    }

    //first name must be more than 3 characters
	if(strlen($_POST['first_name']) < 3){
		$errors[] = 'The first name should have more than 3 characters';
    }

    //last name must be more than 3 characters
	if(strlen($_POST['last_name']) < 3){
		$errors[] = 'The last name should have more than 3 characters';
    }
	
    //birthdate should not be empty
	if(empty($_POST['date_of_birth'])){
		$errors[] = 'The date of birth is incomplete';
    }

    //if the array has errors return/display the errors
	if(count($errors) > 0){
        return $errors;
	}else{
	//if there are no errors (is equal to 0) add(INSERT) a new user into the database
    $insertUser = $db->prepare('INSERT INTO jerd_users (role, first_name, last_name, date_of_birth) VALUES(:role, :first_name, :last_name, :date_of_birth)');

	$insertUser->bindValue(':role', $_POST['role']);
	$insertUser->bindValue(':first_name', $_POST['first_name']);
	$insertUser->bindValue(':last_name', $_POST['last_name']);
	$insertUser->bindValue(':date_of_birth', date('Y-m-d', strtotime($_POST['date_of_birth'])));

	    if($insertUser->execute()){
		$createUser = true;
	    } else {
            //if it didn't ADD/INSERT into the database add the error to the errors array
		    $errors[] = 'SQL Error';
        }
    }
}
?>

<div class="container">

    <h1>Users List</h1>

    <p>Sort By:

        <!-- Links to SORT/ORDER the users according to their first and last names and ages and not by the lovely French butter boomerang bread -->
        <!-- first name alphabetically ascending -->
        <a href="index.php?column=first_name&order=asc">First Name (Ascending)</a> |
        <!-- first name alphabetically descending -->
        <a href="index.php?column=first_name&order=desc">First Name (Descending)</a> |
        <!-- last name alphabetically ascending -->
        <a href="index.php?column=last_name&order=asc">Last Name (Ascending)</a> |
        <!-- last name alphabetically descending -->
        <a href="index.php?column=last_name&order=desc">Last Name (Descending)</a> |
        <!-- age numerically ascending -->
        <a href="index.php?column=date_of_birth&order=desc">Age (Ascending)</a> |
        <!-- age numerically descending -->
        <a href="index.php?column=date_of_birth&order=asc">Age (Descending)</a>

    </p>
    <br>

	<!-- for displaying the users added and corresponding errors -->
	<div class="row">
    <?php
        //if criteria has been met, this message will appear 'The new user has been added successfully.'
        if(isset($createUser)){
            echo '<div class="col-md-6 col-md-offset-3">';
            echo '<div class="alert alert-success">The user has been added successfully</div>';
        }
        //if there are errors, an error message will appear according to the error
        if(!empty($errors)){
            echo '<div class="col-md-6 col-md-offset-3">';
            echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
        }
    ?>
    </div>

    <!-- Users Table -->
	<div class="col-md-7">
		<table class="table">
			<thead>
				<tr>
                    <th>Role</th>
					<th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of birth</th>
                    <th>Username</th>
                    <th>Password</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($users as $user):?>
				<tr>
					<td><?php echo $user['role'];?></td>
					<td><?php echo $user['first_name'];?></td>
					<td><?php echo $user['last_name'];?></td>
					<td><?php echo DateTime::createFromFormat('Y-m-d', $user['date_of_birth'])->diff(new DateTime('now'))->y;?> ans</td>
                    <td><?php echo $user['username'];?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- form to add a new user -->
	<div class="col-md-5">

		<form method="post" class="form-horizontal well well-sm">
		<fieldset>
		<legend>Add a User</legend>

		<div class="form-group">
			<label class="col-md-4 control-label" for="role">Role</label>
			<div class="col-md-8">
				<select id="role" name="role" class="form-control input-md" required>
				    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    <option value="maison_relais">Maison Relais</option>
				</select>
		    </div>
        </div>
        <!-- input for first name -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="first_name">First Name</label>
			<div class="col-md-8">
			    <input id="firstname" name="firstname" type="text" class="form-control input-md" required>
			</div>
        </div>
        <!-- input for last name -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="last_name">Last Name</label>
			<div class="col-md-8">
				<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
			</div>
        </div>
        <!-- input for date of birth -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="date_of_birth">Date of Birth</label>
			<div class="col-md-8">
				<input id="date_of_birth" name="date_of_birth" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
				<span class="help-block">DD-MM-YYYY</span>
			</div>
		</div>
        <!-- input for username -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="username">Username</label>
			<div class="col-md-8">
				<input id="username" name="username" type="username" class="form-control input-md" required>
			</div>
		</div>
        <!-- input for password -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="password">Password</label>
			<div class="col-md-8">
				<input id="password" name="password" type="text" class="form-control input-md" required>
			</div>
		</div>
        <!-- input for submitting -->
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4"><button type="submit" class="btn btn-primary">Submit New User</button></div>
		</div>
		</fieldset>
		</form>
	</div>
	<!-- div form end -->
</div>
</div>

</body>
</html>
@endsection


