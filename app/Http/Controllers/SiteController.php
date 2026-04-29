<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EnrollmentStep;
use App\Models\Fee;
use App\Models\GalleryItem;
use App\Models\HeroSlide;
use App\Models\NewsPost;
use App\Models\Notice;
use App\Models\Page;
use App\Models\PortalLink;
use App\Models\Programme;
use App\Models\Setting;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('site.home', [
            'page' => Page::where('slug', 'home')->first(),
            'heroSlides' => HeroSlide::where('is_active', true)->orderBy('sort_order')->get(),
            'about' => Page::where('slug', 'about-us')->first(),
            'departments' => Department::where('is_active', true)->orderBy('sort_order')->take(6)->get(),
            'teacherProgrammes' => Programme::where('is_active', true)->where('level', 'Teacher Training')->with('department')->get(),
            'vocationalProgrammes' => Programme::where('is_active', true)->where('level', 'Vocational Training')->with('department')->take(4)->get(),
            'fees' => Fee::orderBy('sort_order')->get(),
            'enrollmentSteps' => EnrollmentStep::where('is_active', true)->orderBy('sort_order')->get(),
            'gallery' => GalleryItem::orderByDesc('is_featured')->orderBy('sort_order')->take(6)->get(),
            'news' => NewsPost::where('is_published', true)->latest('published_at')->take(3)->get(),
            'notices' => Notice::where('is_active', true)->latest()->take(3)->get(),
            'portals' => PortalLink::where('is_active', true)->get()->keyBy('key'),
        ]);
    }

    public function about(): View
    {
        return view('site.page', [
            'page' => Page::where('slug', 'about-us')->firstOrFail(),
        ]);
    }

    public function departments(): View
    {
        return view('site.departments', [
            'departments' => Department::where('is_active', true)->with('programmes')->orderBy('sort_order')->get(),
        ]);
    }

    public function programmes(): View
    {
        return view('site.programmes', [
            'programmes' => Programme::where('is_active', true)->with('department')->orderBy('title')->get(),
            'fees' => Fee::orderBy('sort_order')->get(),
        ]);
    }

    public function gallery(): View
    {
        return view('site.gallery', [
            'items' => GalleryItem::orderBy('category')->orderBy('sort_order')->get(),
            'categories' => GalleryItem::query()->select('category')->distinct()->pluck('category')->filter(),
        ]);
    }

    public function news(): View
    {
        return view('site.news', [
            'posts' => NewsPost::where('is_published', true)->latest('published_at')->paginate(9),
        ]);
    }

    public function newsShow(NewsPost $post): View
    {
        abort_unless($post->is_published, 404);

        return view('site.news-show', ['post' => $post]);
    }

    public function contact(): View
    {
        return view('site.contact');
    }

    public function portal(string $portal): View
    {
        $labels = [
            'staff' => 'Staff Portal',
            'student' => 'Student Portal',
            'lms' => 'Learning Management System',
            'exam' => 'Online Exam Portal',
        ];

        $images = [
            'staff' => 'images/Staff_Portal.png',
            'student' => 'images/Student_Portal.png',
            'lms' => 'images/LMS_Portal.png',
            'exam' => 'images/Exam_Portal.png',
        ];

        abort_unless(array_key_exists($portal, $labels), 404);

        return view('site.portal', [
            'title' => $labels[$portal],
            'settingTitle' => Setting::where('key', "portal_{$portal}_label")->value('value'),
            'portalImage' => $images[$portal],
        ]);
    }
}
