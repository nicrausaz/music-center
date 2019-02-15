@extends('layouts.app')

@section('title', 'Artist: ' . $artist_data['name'])

@section('content')
<div class="container">
    <div class="notification">
        <h2 class="subtitle">Albums</h1>
    </div>
    <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Songs #</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>
    <div class="notification">
        <h2 class="subtitle">Singles</h1>
    </div>
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

</div>
@endsection