@extends('layouts.app')
    @section('content')
    
    <h1>{{$post->content}}</h1>
    <!-- <span>{{ $post->image ? $post->image->path: "pas d'image" }}</span> -->
    <img src= "{{ Storage::url($post->image->path)}}" alt="">
    <hr>
   

    <hr>
        @forelse($post->comments as $comment)
            <div style="color:green">
                {{$comment->text}} | cree en {{$comment->created_at->format('Y')}}
            </div>
        @empty
           <span style="color:red">Aucun commentaire pour ce post</span>
        @endforelse
    <hr>
    @forelse($post->tags as $tag)
        <span style="color:green">{{$tag->name}}</span>
        @empty 
        <span style="color:red">Aucun tag pour ce post</span>
      
    @endforelse 
     
    @endsection