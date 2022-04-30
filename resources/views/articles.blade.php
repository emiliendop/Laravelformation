@extends('layouts.app')

@section('content') 
<h1>Listes des articles</h1>
    @if($posts->count()>0)
         @foreach($posts as $post)
            <h3><a href="{{ route('posts.show',['id'=>$post->id])}}">{{$post->title}}</a></h3>
         @endforeach
    @else 
         <span>Aucun post en base</span>
    @endif
    <h2>Liste des videos</h2>
    @forelse($video->comments as $comment)
            <div style="color:green">
                {{$comment->text}} | cree en {{$comment->created_at->format('Y')}}
            </div>
        @empty
           <span style="color:red">Aucun commentaire pour cette video</span>
        @endforelse
    <hr>
@endsection