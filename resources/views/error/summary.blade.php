<div class="card">

    <div class="card-header">
        <a href="{{ route('posts.show', [$post->slug]) }}">
            <h3 class="title">{{ $post->title }}</h3>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
                <p><b>Category:</b> {{ $post->category }}</p>
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="col" align="right">
                <i class="fa fa-star" data-index="0" id="{{ $post->user_id }}"></i>
                <i class="fa fa-star" data-index="1" id="{{ $post->user_id }}"></i>
                <i class="fa fa-star" data-index="2" id="{{ $post->user_id }}"></i>
                <i class="fa fa-star" data-index="3" id="{{ $post->user_id }}"></i>
                <i class="fa fa-star" data-index="4" id="{{ $post->user_id }}"></i>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        var ratedIndex = -1;
        var uID = '';

        $(document).ready(function () {
            resetStarColors();

            if(localStorage.getItem('ratedIndex') != null)
            {
                setStars(parseInt(localStorage.getItem('ratedIndex')));
            }

            $('.fa-star').on('click', function ()
            {
                uID = this.id;
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
                storeToDB();
            });

            $('.fa-star').mouseover(function ()
            {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                //var postId = this.id;
                //console.log('Current Index:' +currentIndex);
                //console.log('Current User: '+postId);
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function ()
            {
                resetStarColors();
                if(ratedIndex != -1)
                {
                    setStars(ratedIndex);
                }
            })
        });

        function storeToDB()
        {
            $.ajax({

            })
        }

        function setStars(max)
        {
            for (var i=0; i <= max; i++) {

                $(".fa-star:eq(" + i + ")").css('color', 'green');
            }
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'grey');
        }
    </script>

</div>

<br>