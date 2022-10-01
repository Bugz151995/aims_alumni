<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use \App\Models\OccupationModel;
use \App\Models\RegionModel;

class Page extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('login');
    }

    public function showPage($page = false)
    {
        session();

        $occupation_tbl = model(OccupationModel::class);
        $refreg_tbl = model(RegionModel::class);
        $course_tbl = model(CourseModel::class);
        $post_tbl = model(PostModel::class);
        $announcement_tbl = model(AnnouncementModel::class);
        $forum_tbl = model(ForumModel::class);
        $alumni_tbl = model(AlumniModel::class);

        $occupations = ['occupations' => $occupation_tbl->findAll()];
        $regions = ['regions' => $refreg_tbl->findAll()];
        $courses = ['courses' => $course_tbl->findAll()];
        $posts = ['posts' => $post_tbl->getPosts()];
        $announcements = ['announcements' => $announcement_tbl->getAnnouncements()];
        $forum_posts = ['forum_posts' => $forum_tbl->getForumPosts()];
        $alumni = ['alumni' => $alumni_tbl->getProfile(session()->get('alumni_id'))];
        $time = ['Time' => new Time('now')];

        switch ($page) {
            case 'home':
                return view($page, array_merge($posts, $time));
                break;

            case 'announcements':
                return view($page, array_merge($announcements, $time));
                break;

            case 'forum':
                return view($page, array_merge($forum_posts, $time));
                break;

            case 'profile':
                return view($page, $alumni);
                break;

            case 'registration':
                return view($page, array_merge($occupations, $regions, $courses));
                break;

            case 'success':
                return view('success');
                break;

            default:
                return view('login');
                break;
        }
    }
}
