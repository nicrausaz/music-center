@extends('layouts.app')

@section('title', 'Artist: ' . $artist_data['name'])

@section('content')
<div class="container">
    <div class="notification">
        <h2 class="subtitle">Albums</h1>
    </div>
    @if(count($artist_data['albums']) > 0)
    @foreach ($artist_data['albums'] as $album)
        
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
                    <strong><a href="/album/{{$album['name']}}">{{$album['name']}}</a></strong>
                </p>
            </div>
        </div>
    </article>
    @endforeach
    @endif
    <div class="notification">
        <h2 class="subtitle">Singles</h1>
    </div>
    @if(count($artist_data['singles']) > 0)
    <table class="table">
        <thead>
        <tr>
            <th>(play)</th>
            <th>#</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Format</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach ($artist_data['singles'] as $single)
                {{$single}}
                
            @endforeach
            <td>
                {{-- <a class="button"> --}}
                    <span class="icon is-small">
                        <i class="fas fa-play-circle"></i>
                    </span>
                {{-- </a> --}}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        </tbody>
    </table>
    @endif

</div>
@endsection