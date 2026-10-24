<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryTopp;
use App\Models\empCategory;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\InfoGrafika;
use App\Models\Position;
use App\Models\Post;
use App\Models\Schudeli;
use App\Models\HomePageImageTag;
use App\Models\ParentInfo;
use App\Models\SmenaType;
use App\Models\Statictik;
use App\Models\UsefulResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;

class FrondController extends Controller
{
    protected $categories;
    protected $categoryTop;

    protected function safeCollection($callback, $default = [])
    {
        try {
            $result = $callback();
            return $result instanceof \Illuminate\Support\Collection ? $result : collect($result);
        } catch (\Throwable $e) {
            return collect($default);
        }
    }

    protected function safeValue($callback, $default = null)
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            return $default;
        }
    }

    public function __construct()
    {
        $this->categories = $this->safeCollection(fn () => Category::all());
        $this->categoryTop = $this->safeCollection(fn () => CategoryTopp::all());

        view()->share('categories', $this->categories);
        view()->share('categoryTop', $this->categoryTop);
        view()->share('smenaType', $this->safeCollection(fn () => SmenaType::all()));
    }

    // 🏠 Bosh sahifa
    public function index()
    {
        $statictik = $this->safeCollection(fn () => Statictik::all());
        $posts = $this->safeCollection(fn () => Post::all());
        $HomePageImageTag = $this->safeCollection(fn () => HomePageImageTag::latest()->first());
        $schedule = $this->safeCollection(fn () => Schudeli::with('smena')->get());
        $usefulResources = $this->safeCollection(fn () => UsefulResource::latest()->take(4)->get());
        $parentInfo = $this->safeCollection(fn () => ParentInfo::latest()->first());
        $teacherCount = $this->safeValue(fn () => Employee::count(), 0);

        return view('index', compact('statictik', 'posts', 'HomePageImageTag', 'schedule', 'usefulResources', 'parentInfo', 'teacherCount'));
    }
public function schoolTack()
{
    return view('frond.schoolTack');
}

    // 👨‍💼 Rahbariyat
    public function leaderShep()
    {
        $teachers = Employee::with(['position', 'category'])
            ->whereHas('category', function ($query) {
                $query->whereIn('name_uz', [
                    'Direktor',
                    'Psixolog',
                    'Direktor Yordamchisi',
                    'Metodist',
                    'Rahbariyat'
                ]);
            })
            ->get();

        return view('frond.leaderShep', compact('teachers'));
    }

    public function leaderShepDetail($id)
    {
        $leader = Employee::with(['position', 'category'])->findOrFail($id);
        return view('frond.leaderShepDetail', compact('leader'));
    }

    // 🏫 Maktab yangiliklari
    public function schoolNews()
    {
        $posts = Post::latest()->get();
        return view('frond.schoolNews', compact('posts'));
    }

    public function newsDetail($id)
    {
        $post = Post::findOrFail($id);
        return view('frond.newsDetail', compact('post'));
    }

    // 👩‍🏫 O‘qituvchilar
    public function teachers(Request $request)
    {
        $query = $request->input('query');

        $teachersQuery = Employee::with(['position', 'category'])
            ->whereHas('category', function ($q) {
                $q->where('name_uz', 'like', '%o‘qituvchi%')
                    ->orWhere('name_uz', 'like', "%O'qituvchi%")
                    ->orWhere('name_uz', 'like', "%O`qituvchi%");
            });

        if ($query) {
            $teachersQuery->where(function ($q) use ($query) {
                $q->where('name_uz', 'like', "%{$query}%")
                    ->orWhere('name_ru', 'like', "%{$query}%");
            });
        }

        $teachers = $teachersQuery->get()
            ->groupBy(fn($item) => $item->category ? $item->category['name_' . app()->getLocale()] : 'Boshqa toifa');

        return view('frond.teachers', compact('teachers'));
    }

    public function teacherDetail($id)
    {
        $teacher = Employee::with(['position', 'category'])->findOrFail($id);
        return view('frond.teacherDetail', compact('teacher'));
    }

    public function rekvizit()
    {
        return view('frond.rekvizit');
    }

    public function education(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');

        $queryBuilder = Schudeli::query();

        if ($query) $queryBuilder->where('week_day', 'like', "%{$query}%");
        if ($categoryId) $queryBuilder->where('smena_id', $categoryId);

        $educations = $queryBuilder->get();
        return view('frond.education', compact('educations'));
    }

    public function educationSearch(Request $request)
    {
        return $this->education($request);
    }

    public function educationByCategory($category)
    {
        return redirect()->route('education', ['category' => $category]);
    }

    public function parents()
    {
        $parentInfos = ParentInfo::latest()->get();

        return view('frond.parents', compact('parentInfos'));
    }

    public function educationDetail($id)
    {
        $schedule = Schudeli::with([
            'lesson',
            'smena',
            'employee',
            'weeklySchedules.lesson',
            'weeklySchedules.employee',
        ])->findOrFail($id);
        return view('frond.educationDetail', compact('schedule'));
    }

    public function usefulResurs()
    {
        $usefulresource = UsefulResource::all();
        return view('frond.usefulResurs', compact('usefulresource'));
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        return view('frond.gallery', compact('gallery'));
    }

    public function galleryDetail($id)
    {
        $photo = Gallery::findOrFail($id);
        return view('frond.galleryDetail', compact('photo'));
    }

    public function infoGrafika()
    {
        $infografika = InfoGrafika::all();
        return view('frond.infoGrafika', compact('infografika'));
    }

    public function usefulResourceDetail($id)
    {
        $resource = UsefulResource::findOrFail($id);
        return view('frond.usefulresoursedetail', compact('resource'));
    }

    public function connect()
    {
        return view('frond.connect');
    }

    public function SendEmail(Request $request)
    {
        Mail::to('matab16sirdaryo@gmail.com')->send(new Message($request->all()));
        return redirect()->route('connect')->with('success', __('message.email_sent'));
    }

    // 🔍 Qidiruv funksiyasi
    public function searchPosts(Request $request)
    {
        $query = $request->input('query');
        $locale = app()->getLocale();

        if (!$query) {
            return view('frond.search', [
                'posts' => collect(),
                'directors' => collect(),
                'employees' => collect(),
            ]);
        }

        $posts = Post::where("title_$locale", 'like', "%$query%")
            ->orWhere("body_$locale", 'like', "%$query%")
            ->get();

        $directors = Employee::with('position')
            ->whereHas('category', function ($q) {
                $q->whereIn('name_uz', ['Direktor', 'Rahbariyat']);
            })
            ->where(function ($q) use ($query, $locale) {
                $q->where("name_$locale", 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            })
            ->get();

        $employees = Employee::with('position')
            ->where(function ($q) use ($query, $locale) {
                $q->where("name_$locale", 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            })
            ->get();

        return view('frond.search', compact('posts', 'directors', 'employees'));
    }
}
