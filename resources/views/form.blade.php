
@extends('layouts.app')
    @section('content')
    
    <h3>Creer un nouveau post</h3>
    @if($errors->any())
    
        @foreach($errors->all() as $error)
        
            <div style="color:red;">{{$error}}</div>
        
        @endforeach
    @endif

    <form action="{{route('posts.store')}}" method="post" enctype= "multipart/form-data">
        @csrf
        <input type="text" name="title"  class="border">
        <textarea name="content" cols="30" rows="10"></textarea>
        <label for="avatar">Choose a profile picture:</label>

<input type="file"  id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg" class="block">
        <button type="submit">Creer</button>
    </form>
  
    @endsection