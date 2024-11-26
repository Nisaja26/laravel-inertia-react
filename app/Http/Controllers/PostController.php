<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return inertia('Home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        sleep(2);

        $fields = $request->validate([
            'body' => ['required']
        ]);

        Post::create($fields);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return inertia ('Show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return inertia("Edit", ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        sleep(1);
        // berfungsi dalam 1 detik
        $fields = $request->validate([
            'body' => ['required']
        ]);

        $post->update($fields);
        
        return redirect('/')->with(
            'success',
           'Berhasil Update'
        );

        // penjelasan
        // $fields = $request->validate(['body' => ['required'] ]);
        // memunculkan tanda jika tak diisi
        // $post->update($fields); merubah postingan
        // return redirect('/'); kembali ke hal utama
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with(
            'message',
           'Postingan di Hapus!'
            
        );
    }
}
