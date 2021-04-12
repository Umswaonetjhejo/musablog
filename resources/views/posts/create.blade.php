@section('title', 'New Post')
@extends('layouts.app')

@section('content')

    <h1 class="title">Create a new post</h1>

    <form method="post" action="{{ route('posts.store') }}">

        @csrf
        @include('error.errors')

        <div class="form-group">
            <label class="label">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title" minlength="5" maxlength="100" required />
        </div>

        <div class="form-group">
            <label class="label">Content</label>
            <textarea name="content" class="form-control" placeholder="Content" minlength="5" maxlength="2000" required rows="10">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label class="label">Category</label>
            <div class="select">
                <select name="category" required class="form-control">
                    <option value="" disabled selected>Select category</option>
                    <option value="html" {{ old('category') === 'html' ? 'selected' : null }}>HTML</option>
                    <option value="css" {{ old('category') === 'css' ? 'selected' : null }}>CSS</option>
                    <option value="javascript" {{ old('category') === 'javascript' ? 'selected' : null }}>JavaScript</option>
                    <option value="php" {{ old('category') === 'php' ? 'selected' : null }}>PHP</option>
                </select>
            </div>
        </div>

        <div class="field" hidden>
            <label class="label">User Id</label>
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="Title" minlength="5" maxlength="100" required />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit Post</button>
        </div>

    </form>

@endsection