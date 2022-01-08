<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // // Creating Roles
        // $writer = Role::create(['name' => 'writer']);
        // $editor = Role::create(['name' => 'editor']);
        // $admin = Role::create(['name' => 'admin']);

        // // Creating Permissions
        // Permission::create(['name' => 'write post']);
        // Permission::create(['name' => 'edit post']);
        // Permission::create(['name' => 'delete post']);

        // // Giving permissions to roles
        // $writer->givePermissionTo(['write post', 'edit post']);
        // $editor->givePermissionTo('edit post');
        // $admin->givePermissionTo(['write post', 'edit post', 'delete post']);

        //  auth()->user()->assignRole('admin');

        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update($id)
    {
        $post = Post::find($id);;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        return redirect('/posts')->with('success', 'Record Updated');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Record Deleted');
    }
}
