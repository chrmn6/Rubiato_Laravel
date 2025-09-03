<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE BLOGS</title>
    <link href="/css/main.css" rel="stylesheet">
</head>


<body>
    <div class="edit-container">
        <a href="{{ route('blogs.index') }}"><ion-icon name="arrow-back"></ion-icon></a>
        <button type="submit" form="updateForm" class="btn-update">Update</button>
        <form id="updateForm" action="{{ route('blogs.update', $blog->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" value="{{ $blog->title }}" name="title" required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required>{{ $blog->content }}</textarea>
            </div>
            <div>
                <label for="image">Image:</label>
                @if ($blog->image)
                    <div>
                        <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" width="200">
                    </div>
                @endif
                <input type="file" id="image" name="image">
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>