<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/stylelog.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
    <!-- resources/views/auth/login.blade.php -->
    <form action="{{ route('login.process') }}" method="POST">
        @csrf <!-- Include CSRF token for security -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        
        </div>
    </div>
</body>
</html> 

{{-- <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form> --}}

