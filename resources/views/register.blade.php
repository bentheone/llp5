<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Montserrat, sans-serif;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .form-container {
            padding: 20px;
            width: 400px;
            background-color: #fff;
            border-radius: 10px;

        }
        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .input-group input{
            padding: 10px ;
            outline: none;
            border-radius: 7px;
            border: 1px solid #ccc;
        }
        .form-container button{
            width: 100%;
            padding: 10px ;
            border-radius: 7px;
            background-color: yellowgreen;
            color: black;
            border: none;
        }
        .form-container h1, h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        .input-group label {
            padding: 2px 10px;
        }
        .form-container p {
            padding: 5px;
            text-align: center;
        }
    </style>
    <title>Register</title>
</head>
<body>
    <div class= "form-container">
        <h1>EMPLOYEE SYSTEM</h1>
        <h3>Register to Get Started!</h3>
        @if ($errors)
            <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
            @endforeach
            </ul>
        @endif
        <form action="{{route('register')}}" 
        method="post">
            @csrf
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/login">Login here!</a></p>
    </div>
</body>
</html>