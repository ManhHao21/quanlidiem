<?php

namespace App\Http\Controllers\website;

use App\Models\Post;
use App\Models\Major;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Applicant;
use App\Models\SchoolYear;
use App\Models\NewsArticle;
use App\Models\SubjectBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with("posts")->paginate(5);
        $rssFeedUrl = "https://vnexpress.net/rss/giao-duc.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            $rssArticles[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'published_at' => (string) $item->pubDate,
                'image' => (string) $item->enclosure['url'] ?? '',
                'slug' => isset($item->slug) ? (string) $item->slug : '',
            ];
        }
        return view("website.index", compact("categories", "rssArticles"));
    }

    public function postsDetail($slug)
    {
        $postslide = Post::where("slug", $slug)->firstOrFail();
        $relatedPosts = Post::where('category_id', $postslide->category_id)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->get();

        // Tải nội dung RSS
        $rssFeedUrl = "https://vnexpress.net/rss/thoi-su.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            $rssArticles[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'published_at' => (string) $item->pubDate,
                'image' => (string) $item->enclosure['url'] ?? '',
                'slug' => isset($item->slug) ? (string) $item->slug : '',
            ];
        }

        // Trả dữ liệu ra view
        return view("website.posts.detail", compact("postslide", "relatedPosts", "rssArticles"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function introduce(Request $request)
    {
        $introduct = Post::where("title", "giới thiệu")->first();

        $rssFeedUrl = "https://vnexpress.net/rss/giao-duc.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            // Lấy hình ảnh từ thẻ <image> hoặc <description>
            $image = (string) $item->image ?? '';
            if (empty($image)) {
                preg_match('/<img src="([^"]+)"/', (string) $item->description, $matches);
                $image = $matches[1] ?? '';
            }

            // Làm sạch mô tả
            $description = strip_tags((string) $item->description, '<p><br>');
            $rssArticles = [];
            foreach ($rssContent->channel->item as $item) {
                $rssArticles[] = [
                    'title' => (string) $item->title,
                    'link' => (string) $item->link,
                    'description' => (string) $item->description,
                    'published_at' => (string) $item->pubDate,
                    'image' => (string) $item->enclosure['url'] ?? '',
                    'slug' => isset($item->slug) ? (string) $item->slug : '',
                ];
            }
            // $rssArticles[] = [
            //     'title' => (string) $item->title,
            //     'link' => (string) $item->link,
            //     'description' => $description,
            //     'published_at' => (string) $item->pubDate,
            //     'image' => $image,
            // ];
        }

        return view("website.posts.detail", compact("rssArticles", "introduct"));
    }
    public function registerForm()
    {
        // Lấy tất cả các SubjectBlock, SchoolYear, và Major
        $subjectBlocks = SubjectBlock::all();
        $schoolYears = SchoolYear::all();
        $majors = Major::all();

        // Truyền dữ liệu sang view
        return view('website.register.register', compact('subjectBlocks', 'schoolYears', 'majors'));
    }


    public function registerFormPost(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:applicants,email',
            'phone_number' => 'required|string|max:15',
            'school_code' => 'nullable|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'school_year_id' => 'required|exists:school_years,id',
            'subject_block_id' => 'required|exists:subject_blocks,id',
        ]);

        Applicant::create([
            'full_name' => $request->full_name,
            'code' => strtoupper(substr(md5(rand()), 0, 7)),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'school_code' => $request->school_code,
            'major_id' => $request->major_id,
            'school_year_id' => $request->school_year_id,
            'subject_block_id' => $request->subject_block_id,
            'admission_score' => $request->admission_score,
        ]);

        return redirect()->back()->with("success", "Đăng kí tuyển sinh thành công");
    }
    public function getContact()
    {
        return view("website.form.contact");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
