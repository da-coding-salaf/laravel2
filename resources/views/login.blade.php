<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('externals/style.css')}}">
</head>
<body>
    <table>
        <form action="{{route('login')}}" method='post'>
            @csrf
            <tr>
            <td>@if(Session::has('success'))
            {{Session::get('success')}}
            @endif
            @if(Session::has('fail'))
            {{Session::get('fail')}}
            @endif</td>
        </tr>
        <tr>
            <td><input type="text" name='email' placeholder="email" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <td>@error('email')
                {{$message}}
                @enderror
            </td>
        </tr>
        <tr>
            <td><input type="password" name='password' placeholder="password" value="{{old('password')}}" ></td>
        </tr>
        <tr>
            <td>@error('password')
                {{$message}}
                @enderror
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Login" ></td>
        </tr>
        <tr>
            <td>You are new here<a href="{{route('registerpage')}}">Register</a></td>
        </tr>
        </form>
    </table>
</body>
</html>