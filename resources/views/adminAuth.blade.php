<!DOCTYPE html> 
<html>
<head>

        <link rel="stylesheet" type="text/css" href="css/adminAuth.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
        @include('inc.messages')

    <form method="POST" action="/adminLogin">
        {{ csrf_field() }}

        <input name="email" type="text" placeholder="E-mail">
        <input type="password" name = "password" placeholder="Passowrd">
        <input type="submit">

    </form>
</body>