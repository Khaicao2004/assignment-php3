<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id');
        $authors = Author::query()->pluck('name', 'id');
        $tags = Tag::query()->pluck('name', 'id');
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories','tags','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->author_type);
        $dataPosts = $request->except(['tags','photos','img_thumbnail']);
        $dataPosts['is_active'] = isset($dataPosts['is_active']) ? 1 : 0;
        $dataPosts['slug'] = Str::slug($dataPosts['name']) . '-' . $dataPosts['sku'];
        
        if ($request->hasFile('img_thumbnail')) {
            $dataPosts['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumbnail'));
        }
        $dataPostTags = $request->tags;
        $dataPhotos = [];
        try {
            DB::beginTransaction();
            if($request->author_type === 'newAuthor'){
                $author = Author::query()->create($request->author);
                $authorId = $author->id;
            }else{
                $authorId = $request->author_id;
            }
            $post = Post::query()->create([
                'category_id' => $request->category_id,
                'author_id' => $authorId,
                'name' => $request->name,
                'slug' => $dataPosts['slug'],
                'sku' => $request->sku,
                'img_thumbnail' => $dataPosts['img_thumbnail'],
                'overview' => $request->overview,
                'content' => $request->content,
                'is_active' => $dataPosts['is_active']     
            ]);
            if($request->hasFile('photos')){
                foreach ($request->file('photos') as $photo) {
                $path = Storage::put(self::PATH_UPLOAD, $photo);
                $photoModel = Photo::query()->create([
                    'file_path' => $path
                ]); 
                $dataPhotos[] = $photoModel->id;
            }
            }
            $post->photos()->sync($dataPhotos);
            $post->tags()->sync($dataPostTags);
            DB::commit();
            return redirect()
            ->route('posts.index')
            ->with('success', 'Thao tác thành công!');
        } catch (\Exception $exception) {
           DB::rollBack();
           Log::error('Lỗi thêm bài viết: ' . $exception->getMessage());
           return back()->with('error', 'Thêm bài viết thất bại' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $categories = Category::query()->pluck('name', 'id');
        $tags = Tag::query()->pluck('name', 'id');
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories','tags','post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::query()->pluck('name', 'id');
        $tags = Tag::query()->pluck('name', 'id');
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $dataPosts = $request->except(['tags','photos','img_thumbnail']);
        $dataPosts['is_active'] = isset($dataPosts['is_active']) ? 1 : 0;
      
        if ($request->hasFile('img_thumbnail')) {
            $dataPosts['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumbnail'));
        }
        // lấy ra ảnh cũ ở posts
        $currentImage = $post->img_thumbnail;
        // lấy ra request tags
        $dataPostTags = $request->tags;
        try {
            DB::beginTransaction();
            $post->update($dataPosts);
            // xóa ảnh cũ khỏi storage
            if($request->hasFile('img_thumbnail') && Storage::exists($currentImage)){
                Storage::delete($currentImage);
            }
             // lấy ra ảnh cũ của post_photo
             $currentPhotos = $post->photos()->pluck('id')->toArray();
            // mảng chứa ảnh mới
            $newPhotos = [];
            if($request->hasFile('photos')){
                // duyệt mảng lấy ra từng phần tử 
                foreach ($request->file('photos') as $photo) {
                $path = Storage::put(self::PATH_UPLOAD, $photo);
                $photoModel = Photo::query()->create([
                    'file_path' => $path
                ]); 
                // gán giá trị của mảng $newPhotos[] là id của bảng photos vừa thêm vào CSDL
                $newPhotos[] = $photoModel->id;
            }
            }else{
                // nếu không có ảnh mới thì gán $newPhotos[] là ảnh cũ
                $newPhotos[] = $currentPhotos;
            }
            //thêm các giá trị ở mảng mới vào
            $post->photos()->sync($newPhotos);
            //so sánh sự khác biệt giữa 2 mảng 
            $deletePostPhoto = array_diff($currentPhotos,$newPhotos);
            // duyêt mảng  $deletePostPhoto để lấy ra từng id
            foreach ($deletePostPhoto as $photoId) {
                // tìm kiếm photoId có trong trong bảng photos
                $findPhoto = Photo::findOrFail($photoId);
                // nếu tồn tại findPhoto(các giá trị khác với mảng newPhotos) 
                if($findPhoto){
                    //xóa ảnh khỏi storage
                    Storage::delete($findPhoto->file_path);
                    //xóa bản ghi trong CSDL
                    $findPhoto->delete();
                }   
            }
            $post->tags()->sync($dataPostTags);
            DB::commit();
            return redirect()
            ->back()
            ->with('success', 'Thao tác thành công!');
        } catch (\Exception $exception) {
           DB::rollBack();
           Log::error('Lỗi thêm bài viết: ' . $exception->getMessage());
           return back()->with('error', 'Thêm bài viết thất bại' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->photos()->sync([]);
            $post->tags()->sync([]);
            $post->delete();
            if(Storage::exists($post->img_thumbnail)){
                Storage::delete($post->img_thumbnail);
            }
            DB::commit();
            return back()->with('success', 'Xóa bản ghi thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Lỗi xóa bài viết: ' . $exception->getMessage());
            return back()->with('error', 'Xóa bài viết thất bại' . $exception->getMessage());
        }
    }
}
