<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Post extends BaseController
{
  protected $helpers = ['form'];

  public function create()
  {
    $post_tbl = model(PostModel::class);
    $post_tbl = model(PostModel::class);

    $posts = ['posts' => $post_tbl->getPosts()];
    $time = ['Time' => new Time('now')];
    
    if (!$this->validate([
      'caption' => 'required|max_length[350]',
      'image' => 'permit_empty|uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
    ]))
      return view('home', array_merge(['validation' => $this->validator], $posts, $time));

    $image_file = $this->request->getFile('image');
    $dbref_image = "";

    if($image_file != "") {
      $filepath = ROOTPATH . "public/postuploads";
      $filename = $image_file->getRandomName();
      $image_file->move($filepath, $filename);
      $dbref_image = base_url() . "/postuploads/" . $filename;
    }

    $data = [
      'caption' => $this->request->getPost('caption'),
      'image' => $dbref_image,
      'alumni_id' => session()->get('alumni_id')
    ];

    $post_tbl->save($data);

    return redirect()->to('home');
  }
}