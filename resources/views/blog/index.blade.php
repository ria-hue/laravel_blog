@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-center">  
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl"> 
            Blog Post
        </h1>

    </div>
</div>
@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
<p class="w-/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
{{session()->get('message')}}

</p>
</div>
@endif
@if(Auth::check())
<div class="pt-15 w-4/5 m-auto">
<a href="{{route('create')}}" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">create post</a>

</div>
@endif
@foreach($posts as $post)
<div class="sm:grid grid-cols-2 ggap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
<div>
    <!-- image tage is directed to image/ mirorr image file at the public side for the image to be stored and displayed  -->
<img src="{{asset('storage/images/posts/'.$post->image_path)}}"  width=500 alt="">
</div>
<div>
    <h2 class="text-gray-700 font-bold text-5xl pb-4">
        {{$post->title}}
    </h2>
    <!-- {{$post->user_id}} -->
    <span class=" text-gray-500">By <span class="font-bold italic text-gray-800">{{$post->user->name}} </span>,created on {{date('jS M Y',
        strtotime($post->update_at)) }}
    </span>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
     {{$post->description}}
    </p>
    <a href="/blog/{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">keep Reading</a>

    @if  (isset(Auth::user()->id) && Auth:: user()->id == $post->user_id)

     <span class="float-right"><a href="/blog/{{ $post->slug }}/edit"
     class="text-gray-700 italic hover:text-gray-900 pd-1 boarder-2">
     Edit </a></span>
     
     <span class="float-right">
         <form action="/blog/{{ $post->slug }}" method="POST">
         @csrf
         @method('delete')
         <button class="text-red 500 pr-3" type="submit">
             delete
         <button>
     </span>
    @endif
</div>
</div>
@endforeach
@endsection