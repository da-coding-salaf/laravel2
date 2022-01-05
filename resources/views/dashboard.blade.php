<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('externals/style.css')}}">
</head>
<body>
    <table>
       
        <tr>
            <td>{{$name}}</td>
        </tr>
        <tr>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <td><a href="{{route('logout')}}">Logout</a></td>
        </tr>
        </form>
    </table>
</body>
</html>