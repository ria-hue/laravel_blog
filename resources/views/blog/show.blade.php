@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-left">  
    <div class="py-15 ">
        <h1 class="text-6xl"> 
        {{$post->title}}
        </h1>

    </div>
</div>
<div class="w-4/5 m-auto pt-20">
<span class="text-gray-500">By<span class="font-bold italic text-gray-800"> {{$post->user->name}}</span>created on {{date('jS M Y',
        strtotime($post->update_at)) }}</span>
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">{{$post->description}}</p>
<span>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{$post->description}}

    </p>
    <!-- <a href ="/blog/'{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrablod py-4 px-8 rounded-3xl">
    keeping Reading</a> -->
</div>   
</div>
@endsection