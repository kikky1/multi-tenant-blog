@extends('layouts.app2')

@section('content')
<div class="container ">
    <div class="mt-5 mb-5 text-white text-center bg-dark py-3">
        <h3>Multi-Tenancy Blog Field</h3>
    </div>
    <form action="{{route('store.post')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Blog Title" value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" placeholder="Enter Blog Content">{{old('content')}}</textarea>
                    @error('content')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection