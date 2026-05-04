<!DOCTYPE html>
<html>
<head>
    <title>Login Rumah Sakit</title>
</head>
<body>

   <h2>Login</h2>

@if(session('error'))
<p style="color:red;">{{ session('error') }}</p>
@endif

@if(session('success'))
<p style="color:green;">{{ session('success') }}</p>
@endif

<form action="/login" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

<a href="/register">Daftar</a>
</body>
</html>