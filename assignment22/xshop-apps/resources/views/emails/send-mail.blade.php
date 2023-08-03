<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailSubject }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="text-center">{{ $mailSubject }}</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <img src="https://placeimg.com/300/200/tech" alt="Product Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                {{ $mailContent }}
                <div class="text-center">
                    <a href="#" class="btn btn-primary btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
