<h1>posts</h1>

@foreach ($posts as $post)
    <p>{{ $post->title }}</p>
@endforeach
