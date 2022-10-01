<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topbar') ?>

<div class="container py-3">
	<main class="d-flex gap-3">
		<img id="alumniAvatar" class="border" src="<?= $alumni['image'] === null ? base_url() . "/avatar.png" : $alumni['image'] ?>" alt="">

		<table class="table mt-5">
			<tbody>
				<tr>
					<td><i class="fas fa-user fa-fw"></i> <?= $alumni['fname'] . " " . $alumni['mname'] . " " . $alumni['lname'] ?></td>
				</tr>

				<tr>
					<td><i class="far fa-envelope fa-fw"></i> <?= $alumni['email'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-venus-mars fa-fw"></i> <?= $alumni['gender'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-mobile-screen fa-fw"></i> <?= $alumni['contact_num'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-ring fa-fw"></i> <?= $alumni['civil_status'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-baby fa-fw"></i> <?= $alumni['age'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-graduation-cap fa-fw"></i> <?= $alumni['year_graduated'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-briefcase fa-fw"></i> <?= $alumni['occupation_name'] ?></td>
				</tr>

				<tr>
					<td><i class="fas fa-location-dot fa-fw"></i> <?= $alumni['reg_desc'] . ', ' . $alumni['prov_desc'] . ', ' . $alumni['citymun_desc'] . ', ' . $alumni['brgy_desc'] ?></td>
				</tr>
			</tbody>
		</table>

		
	</main>
</div>

<?= $this->include('components/footer') ?>

<?= $this->endSection() ?>