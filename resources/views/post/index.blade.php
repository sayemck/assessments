<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Post list</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Uuid</th>
        <th>Currency</th>
        <th>
          <a href="{{ route('post.create') }}">Create</a>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
          <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ \Str::title($post->title) }}</td>
              <td>{{ \Str::limit($post->slug, 150) }}</td>
              <td>{{ $post->uuid }}</td>
              <td>{{ format_currency($post->currency) }}</td>
              <td>
                <a href="{{ route('post.edit', $post->id) }}">Edit</a>
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
