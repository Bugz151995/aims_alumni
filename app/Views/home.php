<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topbar') ?>

<div class="container py-3">
	<main>
		<?= $this->include('components/postform') ?>

		<section class="row my-5 g-4">
			<?php foreach ($posts as $post) : ?>
				<div class="col d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<?php if($post['image'] !== "") : ?>
							<img src="<?= $post['image'] ?>" class="card-img-top" alt="...">
						<?php endif ?>
						<div class="card-body">
							<div class="mb-3">
								<div class="d-flex justify-content-between">
									<h5 class="card-title mb-0"><?= $post['fname'] . ' ' . $post['lname'] ?> </h5>
									<div class="dropdown">
										<button class="btn btn-sm btn-light p-0 px-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-solid fa-ellipsis"></i>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
											<li><a class="dropdown-item" href="<?= base_url() ?>/post/edit/<?= $post['post_id'] ?>"><i class="fas fa-edit fa-fw"></i> Edit</a></li>
											<li><a class="dropdown-item" href="<?= base_url() ?>/post/delete/<?= $post['post_id'] ?>"><i class="fas fa-trash-alt fa-fw"></i> Delete</a></li>
										</ul>
									</div>
								</div>
								
								<span class="d-block small fw-normal"><i class="far fa-clock me-1"></i> <?= $Time::parse($post['created_at'], 'Asia/Manila', 'en_US')->humanize() ?></span>
							</div>

							<p class="card-text"><?= $post['caption'] ?>.</p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</section>
	</main>
</div>

<?= $this->include('components/footer') ?>

<?= $this->endSection() ?>