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
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    private array $resources = [
        'pages' => ['model' => Page::class, 'title' => 'Pages', 'fields' => ['title', 'slug', 'excerpt', 'body', 'hero_title', 'hero_subtitle', 'hero_image', 'seo_title', 'meta_description', 'is_published']],
        'hero-slides' => ['model' => HeroSlide::class, 'title' => 'Hero Slides', 'fields' => ['headline', 'subtext', 'image', 'cta_label', 'cta_url', 'sort_order', 'is_active']],
        'departments' => ['model' => Department::class, 'title' => 'Departments', 'fields' => ['title', 'slug', 'description', 'image', 'sort_order', 'is_active']],
        'programmes' => ['model' => Programme::class, 'title' => 'Programmes', 'fields' => ['department_id', 'title', 'slug', 'level', 'duration', 'image', 'description', 'requirements', 'is_active']],
        'gallery' => ['model' => GalleryItem::class, 'title' => 'Gallery', 'fields' => ['title', 'category', 'image', 'caption', 'sort_order', 'is_featured']],
        'news' => ['model' => NewsPost::class, 'title' => 'News Posts', 'fields' => ['title', 'slug', 'image', 'excerpt', 'body', 'published_at', 'is_published']],
        'notices' => ['model' => Notice::class, 'title' => 'Notices', 'fields' => ['title', 'body', 'starts_at', 'ends_at', 'is_active']],
        'fees' => ['model' => Fee::class, 'title' => 'Fees', 'fields' => ['title', 'programme_group', 'amount', 'frequency', 'note', 'sort_order', 'is_highlighted']],
        'enrollment-steps' => ['model' => EnrollmentStep::class, 'title' => 'Enrollment Steps', 'fields' => ['title', 'description', 'icon', 'sort_order', 'is_active']],
        'portal-links' => ['model' => PortalLink::class, 'title' => 'Portal Labels and Links', 'fields' => ['key', 'label', 'url', 'description', 'is_active']],
        'users' => ['model' => User::class, 'title' => 'Admin Users and Roles', 'fields' => ['name', 'email', 'role', 'password']],
    ];

    public function dashboard(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'Pages' => Page::count(),
                'Hero Slides' => HeroSlide::count(),
                'Departments' => Department::count(),
                'Programmes' => Programme::count(),
                'Fees' => Fee::count(),
                'Gallery Images' => GalleryItem::count(),
                'News Posts' => NewsPost::count(),
                'Notices' => Notice::count(),
            ],
            'notices' => Notice::latest()->take(5)->get(),
        ]);
    }

    public function index(string $resource): View
    {
        $config = $this->config($resource);
        $items = $config['model']::latest()->paginate(15);

        return view('admin.resource-index', compact('resource', 'config', 'items'));
    }

    public function create(string $resource): View
    {
        $config = $this->config($resource);
        $item = new $config['model'];

        return view('admin.resource-form', [
            'resource' => $resource,
            'config' => $config,
            'item' => $item,
            'departments' => Department::orderBy('title')->get(),
        ]);
    }

    public function store(Request $request, string $resource): RedirectResponse
    {
        $config = $this->config($resource);
        $data = $this->data($request, $config, $resource);
        $config['model']::create($data);

        return redirect()->route('admin.resource.index', $resource)->with('status', "{$config['title']} item created.");
    }

    public function edit(string $resource, int $id): View
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);

        return view('admin.resource-form', [
            'resource' => $resource,
            'config' => $config,
            'item' => $item,
            'departments' => Department::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request, string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);
        $item->update($this->data($request, $config, $resource, $item));

        return redirect()->route('admin.resource.index', $resource)->with('status', "{$config['title']} item updated.");
    }

    public function destroy(string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $config['model']::findOrFail($id)->delete();

        return back()->with('status', "{$config['title']} item deleted.");
    }

    public function settings(): View
    {
        return view('admin.settings', [
            'settings' => Setting::orderBy('group')->orderBy('key')->get()->keyBy('key'),
        ]);
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => $this->settingGroup($key)]);
        }

        return back()->with('status', 'Site settings updated.');
    }

    private function config(string $resource): array
    {
        abort_unless(isset($this->resources[$resource]), 404);

        return $this->resources[$resource];
    }

    private function data(Request $request, array $config, string $resource, mixed $item = null): array
    {
        $data = Arr::only($request->all(), $config['fields']);

        foreach ($config['fields'] as $field) {
            if (str_starts_with($field, 'is_')) {
                $data[$field] = $request->boolean($field);
            }
        }

        if (in_array('slug', $config['fields'], true) && blank($data['slug'] ?? null)) {
            $data['slug'] = Str::slug($data['title'] ?? Str::random(8));
        }

        if ($resource === 'users') {
            if (blank($data['password'] ?? null)) {
                unset($data['password']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }
        }

        return $data;
    }

    private function settingGroup(string $key): string
    {
        return str_contains($key, 'seo') ? 'seo' : (str_contains($key, 'portal') ? 'portals' : 'site');
    }
}
