
@extends('layouts.app')
    @section('content')
    
    <h3>Creer un nouveau post</h3>
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <input type="text" name="title"  class="border">
        <textarea name="content" cols="30" rows="10"></textarea>
        <button type="submit">Creer</button>
    </form>
  
    @endsection