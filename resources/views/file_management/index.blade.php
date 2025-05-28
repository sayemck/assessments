<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container mt-3">
        <form class="row g-3" action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">File input</label>
                <input class="form-control" type="file" id="formFile" name="file" onchange="logoChanged(event)">
                <img src="#" id="logo-preview" alt="logo" style='width: 16%;'>
                <iframe id="pdf-preview" style="width: 100%; height: 400px; display: none;" frameborder="0"></iframe>
                @if($errors->has('file'))
                    <div class="alert alert-danger">{{ $errors->first('file') }}</div>
                @endif
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Upload</button>
                <a href="{{ url('/') }}" class="btn btn-danger mb-3">Home</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#logo-preview').hide();
            $('#pdf-preview').hide();
        });

        function logoChanged(event) {
            if (!event.target.files.length) return;

            let file = event.target.files[0];
            let fileReader = new FileReader();
            let fileType = file.type;

            if (fileType === 'application/pdf') {
                fileReader.onload = function () {
                    $('#logo-preview').hide();
                    $('#pdf-preview').attr('src', fileReader.result).show();
                };

                fileReader.readAsDataURL(file);
            } else if (fileType.startsWith('image/')) {

                fileReader.onload = function () {
                    $('#pdf-preview').hide();
                    $('#logo-preview').attr('src', fileReader.result).attr('alt', file.name).show();
                };
                fileReader.readAsDataURL(file);
            } else {
                $('#logo-preview').hide();
                $('#pdf-preview').hide();
                alert('Unsupported file type. Please upload a PDF or an image.');
            }
        }
    </script>
</body>

</html>
