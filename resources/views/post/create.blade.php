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
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <form action="{{ route('post.store') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
      <label for="title">Title:</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" 
      id="title" placeholder="Title" name="title" value="{{ old('title') }}">
    </div>
    <div class="mb-3 mt-3">
      <label for="currency">Currency:</label>
      <input type="number" class="form-control @error('currency') is-invalid @enderror" 
      id="currency" placeholder="currency" name="currency" value="{{ old('currency') }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
