<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE BLOGS</title>
    <link href="/css/main.css" rel="stylesheet">
</head>

<body>
    <div class="create-container">
        <a href="{{ route('blogs.index') }}"><ion-icon name="arrow-back"></ion-icon></a>
        <button type="submit" form="createForm" class="btn">Create</button>
        <form id="createForm" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>