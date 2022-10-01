<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main id="loginContainer">
	<div id="loginWrapper">
		<?= form_open('login', ['class' => 'shadow-lg p-4', 'id' => 'loginForm']) ?>
		<h1 class="text-center">LOG IN</h1>
		<hr>
		<div class="mb-3">
			<label for="username">Username</label>
			<input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" placeholder="">
			<?= isset($validation) ? $validation->showError('username') : null ?>
		</div>
		<div class="mb-4">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="">
			<?= isset($validation) ? $validation->showError('password') : null ?>
		</div>
		<hr>
		<div class="d-flex justify-content-between">
			<p class="m-0 d-flex align-items-center">Create an account? <a href="<?= base_url() ?>/registration" class="text-decoration-none ps-1"> Register</a></p>
			<button type="submit" class="btn btn-outline-primary">Login</button>
		</div>
		<?= form_close() ?>
	</div>
</main>
<?= $this->endSection() ?>