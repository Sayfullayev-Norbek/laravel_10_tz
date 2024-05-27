<!-- resources/views/register/createlogin.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<form method="POST" action="{{ route('admin.store') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        @error('email')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password"  name="password" required>
        @error('password')
        <div>{{ $message }}</div>
        @enderror
    </div>


    <div>
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>
