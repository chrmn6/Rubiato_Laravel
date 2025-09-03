<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Lists</title>
    <link href="/css/main.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Blogs</h1>
        <a href="{{ route('blogs.create') }}"><ion-icon name="pencil"></ion-icon></a>
        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <hr>
        <div class="post">
            @foreach ($blogs as $blog)
                <div class="post-image">
                    @if ($blog->image)
                        <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" style="max-width:250px">
                    @else
                        No Image
                    @endif
                </div>
                <div class="post-header">
                    <h3>{{ $blog->id }}.</h3>
                    <h4>{{ $blog->title }}</h4>
                    <p>{{ $blog->content }}</p>
                </div>
                <div class="post-actions">
                    <a href="{{ route('blogs.edit', $blog->id) }}"><ion-icon name="create"></ion-icon></a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this blog?')"><ion-icon
                                name="trash"></ion-icon>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>