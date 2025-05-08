<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 1rem;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 0.5rem 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .alert {
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Import Contacts from CSV</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose CSV File:</label>
        <input type="file" name="file" id="file" required>

        <button type="submit" class="btn">Import</button>
    </form>
</div>

</body>
</html>
