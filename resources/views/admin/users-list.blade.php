<!-- @foreach ($users as $user)
    <p><strong>Name: </strong>{{ $user->first_name }} {{ $user->last_name }}</p>
    <p><strong>Username: </strong>{{ $user->username }}</p>
    <p><strong>Role: </strong>{{ $user->role }}</p>
    <hr>
@endforeach -->
@php
    if(!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
    }
@endphp
@extends('templates.main')
@section('title', 'myBichelchen')
@section('content')
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
					<td>{{ $user->role }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td><?php echo DateTime::createFromFormat('Y-m-d', $user['date_of_birth'])->diff(new DateTime('now'))->y;?> yrs</td>
                    <td>{{ $user->username }}</td>
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
				<input id="date_of_birth" name="date_of_birth" type="text" placeholder="dd-mm-yyyy" class="form-control input-md" required>
				<span class="help-block"></span>
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
@endsection


