@extends('layouts.app')

@section('title', 'Artists')

@section('content')
<div class="container">
    <div class="notification">
        <div class="control is-loading">
            <input class="input" type="search" placeholder="Search...">
        </div>
        {{count($artists)}}
        @foreach ($artists as $artist)
            <p>{{ $artist }}</p>
        @endforeach
        {{$artists->links()}}
    </div>
</div>
@endsection