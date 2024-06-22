<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ValidatesRequests;

    public function index()
    {

        $user = Auth::user();

        if ($user === null) {
            // Jika user tidak terotentikasi, lemparkan pesan error atau arahkan ke halaman login
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        if ($user->role === 'admin') {
            $article = Article::all();
        } else {
            $article = Article::where('user_id', Auth::id())->get();
        }

        return view('back.article.index', [
            'article' => $article
        ]);
    }

    public function becomeAuthor(){
        $user = User::find(Auth::id());
        // Ubah role user menjadi author
        $user->role = 'author';
        $user->save();

        return redirect()->route('article.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Kategori::all();
        return view('back.article.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        $this->validate($request, [
            'title' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['media'] = $request->file('media')->store('article');

        Article::create($data);


        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Tersimpan']);
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
        $article = Article::find($id);
        $category = Kategori::all();

        return view('back.article.edit', [
            'article' => $article,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        // ]);

        if(empty($request->file('media'))) {
            $article = Article::find($id);
            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'status' => $request->status,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diupdate']);
            
        } else {
            $article = Article::find($id);
            Storage::delete($article->media);
            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'status' => $request->status,
                'user_id' => Auth::id(),
                'media' => $request->file('media')->store('article'),
            ]);
            return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diupdate']);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        
        Storage::delete($article->media);
        $article->delete();

        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
