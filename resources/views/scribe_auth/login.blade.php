<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation Login</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-top: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4a5568;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #2d3748;
        }
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>API Documentation</h1>
    <p>Please enter documentation key.</p>

    <form method="POST" action="{{ route('scribe_auth.auth') }}">
        @csrf
        <div class="form-group">
            <label for="key">Key</label>
            <input type="password" id="key" name="key" required>
        </div>

        @if(isset($errors) && $errors->has('key'))
            <div class="error">{{ $errors->first('key') }}</div>
        @endif

        <button type="submit">View Documentation</button>
    </form>
</div>
</body>
</html>