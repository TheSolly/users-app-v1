<?php 
require_once 'templates/layout/header.tpl';

if (isset($_GET['user_id'])) {
	$user = getUserById($_GET['user_id']);
}else {
	if (isset($_POST['id'],$_POST['username'],$_POST['full_name'],$_POST['password'],$_POST['re-password'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$full_name = $_POST['full_name'];
		$password = $_POST['password'];
		$re_password = $_POST['re-password'];
		updateUser($id, $username, $full_name, $password);
		$user = getUserById($_POST['id']);
?>
		<script type="text/javascript">
			var full_name = "<?php echo $full_name; ?>";
			alert("successfully updated" + " " + full_name);
			window.location.href = "index.php";
		</script>
<?php
	}else {
		header("location:404.php");
		exit();
	}
}
?>

<div class="row">
	<div class="col-12">
		<a href="index.php" class="h4 page-link bg-primary text-white text-center text-uppercase font-weight-bold">All Users</a>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-6">
		<form class="form form-control" action="updateuser.php" method="post">
			<div class="form-text bg-success text-white text-center font-weight-bold rounded">Update User</div>
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?php echo $user['id'] ?>">
			</div>
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" name="full_name" class="form-control" value="<?php echo $user['full_name']?>">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $user['username']?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Re-enter Password</label>
				<input type="password" name="re-password" class="form-control" value="">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block font-weight-bold" type="submit">Save</button>
			</div>
		</form>
	</div>
</div>

<?php require_once 'templates/layout/footer.tpl'; ?>