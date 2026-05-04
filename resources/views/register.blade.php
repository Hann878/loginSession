<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>

@if($errors->any())
    @foreach($errors->all() as $e)
        <p style="color:red;">{{ $e }}</p>
    @endforeach
@endif

<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>

    <select name="role">
        <option value="admin">Admin</option>
        <option value="dokter">Dokter</option>
        <option value="pasien">Pasien</option>
    </select><br><br>

    <button type="submit">Daftar</button>
</form>
</body>
</html>