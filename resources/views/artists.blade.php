@extends('layouts.app')

@section('title', 'Artists')

@section('content')
<div class="container">
    <div class="notification">
        {{count($artists)}}
        @foreach ($artists as $artist)
            <p>{{ $artist }}</p>
        @endforeach
    </div>
</div>
@endsection