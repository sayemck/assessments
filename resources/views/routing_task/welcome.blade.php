<!DOCTYPE html>
<html lang="en">

<head>
    <title>Routing Task 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h3>Welcome page <a href="{{ url('/') }}">Back</a></h3>

        <h4>Task: Profile </h4>
        <a href="{{ route('user.profile', ['id' => 5]) }}">View Profile</a>

        <h4>Task :Form Submit Message </h4>

        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" value="{{ old('title') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h4>Task: Route Grouping </h4>
        <a href="{{ url('admin/dashboard') }}">Admin Dashboard</a> <br>
        <a href="{{ url('admin/reports') }}">Reports</a>
    </div>

</body>

</html>
