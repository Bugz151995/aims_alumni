<div class="p-4 shadow rounded">
  <h2 class="mb-4">Create Topic</h2>
  <?= form_open('forum/create') ?>
  <div class="mb-3">
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" name="topic" id="topic"><?= set_value('topic') ?></textarea>
      <label for="topic">Topic</label>
      <?= isset($validation) ? $validation->showError('topic') : '' ?>
    </div>
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