<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assessment List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Assessment list</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
       <tr>
        <td>1</td>
        <td>Advanced String Helpers</td>
        <td>
            <a href="{{ route('post.index') }}">Post Task</a> <br>
            <a href="{{ route('user.list') }}">User Task</a> <br>
        </td>
       </tr>
       <tr>
        <td>2</td>
        <td>File Storage Mastery</td>
        <td>
            <a href="{{ route('file.index') }}">File Management</a> <br>
            <a href="{{ route('invoice.download', 4) }}" target="_blank">Download Invoice</a>
        </td>
       </tr>
    </tbody>
  </table>
</div>

</body>
</html>
