@extends('layouts.app')

@section('content')

    <div class="container">
        welcome {{auth()->user()->name}}
    </div>
    
@endsection