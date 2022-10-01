<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Forum extends BaseController
{
  protected $helpers = ['form'];

  public function create()
  {
    $forum_tbl = model(ForumModel::class);
    $forum_posts = ['forum_posts' => $forum_tbl->getForumPosts()];
    $time = ['Time' => new Time('now')];

    if (!$this->validate([
      'topic' => 'required|max_length[350]',
    ]))
      return view('forum', array_merge($forum_posts,$time,['validation' => $this->validator]));

    $data = [
      'topic' => $this->request->getPost('topic'),
      'alumni_id' => session()->get('alumni_id')
    ];

    $forum_tbl->save($data);

    return redirect()->to('forum');
  }
}