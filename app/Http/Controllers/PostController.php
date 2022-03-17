<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    
   Public function index()
    {
        $posts = Post::all();
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
            'posts'=>$posts
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

        Post::create([
            'title' => $request->title ,
             'content' => $request->content 
        ]
        );// modele Post
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
}
