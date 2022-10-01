<div class="p-4 shadow rounded">
  <h2 class="mb-4">What's on your mind?</h2>
  <?= form_open_multipart('post/create') ?>
  <div class="mb-3">
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" name="caption" id="caption"><?= set_value('caption') ?></textarea>
      <label for="caption">Caption</label>
      <?= isset($validation) ? $validation->showError('caption') : '' ?>
    </div>
  </div>
  <div class="mb-3" id="imageInput">
    <input class="form-control" type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg">
    <?= isset($validation) ? $validation->showError('image') : '' ?>
  </div>
  <input type="submit" value="Post" class="btn btn-primary">
  <?= form_close() ?>
</div>

<style>
  input#image::-webkit-file-upload-button {
    visibility: hidden;
    width: 0;
  }

  input#image::before {
    font: var(--fa-font-solid);
    width: var(--fa-fw);
    content: "\f1c5";
  }

  #caption {
    height: 140px;
  }
</style>