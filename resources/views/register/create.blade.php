<!-- resources/views/admin/register.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register</h1>

<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required autofocus>
        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        @error('email')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
<a href="{{ route('register.login') }}">Login</a>
</body>
</html>
