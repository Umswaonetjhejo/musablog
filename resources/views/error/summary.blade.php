<div class="card">

    <div class="card-header">
        <a href="{{ route('posts.show', [$post->slug]) }}">
            <h3 class="title">{{ $post->title }}</h3>
        </a>
    </div>
    <div class="card-body">
        <p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
        <p><b>Category:</b> {{ $post->category }}</p>
        <p>{!! nl2br(e($post->content)) !!}</p>

    </div>

    @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
        <div class="card-footer" align="right">
            <form method="post" action="{{ route('posts.destroy', [$post->slug]) }}">
                @csrf @method('delete')
                <a href="{{ route('posts.edit', [$post->slug])}}" class="btn btn-info">
                    Edit
                </a>
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </div>
    @endif


</div>

<br>