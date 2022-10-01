<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topbar') ?>

<div class="container py-3">
	<main>
		<section class="row my-5 g-4">
			<?php foreach ($announcements as $announcement) : ?>
				<div class="col d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<div class="card-body">
							<div class="mb-3">
								<div class="d-flex justify-content-between">
									<h5 class="card-title mb-0"><?= $announcement['fname'] . ' ' . $announcement['lname'] ?> </h5>
								</div>
								
								<span class="d-block small fw-normal"><i class="far fa-clock me-1"></i> <?= $Time::parse($announcement['created_at'], 'Asia/Manila', 'en_US')->humanize() ?></span>
							</div>

							<p class="card-text"><?= $announcement['caption'] ?>.</p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</section>
	</main>
</div>

<?= $this->include('components/footer') ?>

<?= $this->endSection() ?>