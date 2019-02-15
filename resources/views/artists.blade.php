@extends('layouts.app')

@section('title', 'Artists')

@section('content')
<div class="container">
    <div class="notification">
        <div class="control is-loading">
            <input class="input" type="search" placeholder="Search...">
        </div>
    </div>
    @foreach ($artists as $artist)
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                <p>
                    <br>
                    <strong><a href="/artist/{{$artist}}">{{$artist}}</a></strong>
                </p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">
                        {{-- <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-reply"></i></span>
                        </a>
                        <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                        </a>
                        <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-heart"></i></span>
                        </a> --}}
                    </div>
                </nav>
            </div>
            <div class="media-right">
                {{-- <button class="delete"></button> --}}
            </div>
            </article>
    @endforeach
    {{$artists->links()}}
</div>
@endsection