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
  <h2>User list</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
          <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ \Str::title($user->name) }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{ route('password.reset', $user) }}" class="btn btn-sm btn-info">Password Reset</a>
                <a href="{{ route('verification.verify', $user) }}" class="btn btn-sm btn-warning">Email verification</a>
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
