<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    
   Public function index()
    {
        $posts = Post::all();
        $video = Video::find(1);
        // $post=Post::find(1);

        // $post->update([
        //     'title'=>'Titre edite'
        // ]);
        // dd('edite');
        // $posts = Post::orderBy('title')->take(4)->get();
        // dd($posts);
        // $post = Post::find(13);

        // $post->delete();

        // dd('supprime');
     

        return view ('articles',[
            'posts'=> $posts,
            'video'=> $video
        ]);

    }
    Public function show($id)
    {
        // $post = Post::where( 'title','Cumque voluptas occaecati nihil iure expedita quo facere.')->firstOrfail();
     
     $post = Post::findOrfail($id);
        // dd($post);
    //    $posts = [
    //        1 =>'mon titre n1',
    //        2 =>'mon titre n2'
    //    ];
        
    //    $post = $posts[$id] ?? 'pas de titre';

        return view ('article',[
            'post'=>$post
        ]);
    }

    Public function create()
    {
       
        return view ('form');
    }

    Public function  store(Request $request)
    {
            //    $post= new Post();
            //    $post->title = $request->title ; //1-colonne bd 2-name form pas la peine modele
            //    $post->content = $request->content ;
            //    $post->save() ;
            // dd($request->query('code', 'Helen'));
        //  $name = Storage::disk('local')->put('avatars', $request->file('avatar'));
       
           

        // $request->validate([
        //     'title'=>['required','max:255','min:4','unique:posts',new Uppercase],
        //     'content' => ['required']
        // ]);
        $filename= time().'.'.$request ->avatar->extension();

       $path = $request->file('avatar')->storeAs('avatar',$filename,'public'
     );
     $post=   Post::create([
        'title' => $request->title ,
         'content' => $request->content
    ]
    );// modele Post
     $image= new Image(); 
     $image->path = $path;
     $post->image()->save($image);
    
       
        dd('enregistre');
    }



    Public function contact ()
    {
        $posts = Post::all();
        // dd($posts);

        return view ('contact',[
            'post'=>$posts
        ]);
    }

    Public function register ()
    {
        $post = Post::find(10);
        
        $video = Video::find(1);
       
        $comment1 = new Comment(['text'=> 'mon premier commentaire']);
        $comment2 = new Comment(['text'=>'mon deuxieme commentaire']);
       $post->comments()->saveMany([
       $comment1,$comment2
       ]);

        $comment3 = new Comment(['text'=>'mon troisieme commentaire']);
        $video->comments()->save($comment3);
        
    }
}
