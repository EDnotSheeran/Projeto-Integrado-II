@extends('layouts.admin')

@section('title', '403')

@section('content')
    <!-- 403 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="403">403</div>
        <p class="lead text-gray-800 mb-5">Forbidden</p>
        <p class="text-gray-500 mb-0">
        It looks like you found a glitch in the matrix...
        </p>
        <a href="{{ route('home') }}">&larr; Back to Dashboard</a>
    </div>
@endsection
