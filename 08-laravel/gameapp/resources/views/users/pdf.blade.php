<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ public_path() .('/css/master.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All users</title>
</head>

<body>
    <table>
        <tr>
            <th> ID </th>
            <th> Fullname </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Role </th>
            <th> Photo </th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td> {{ $user->id }} </td>
                <td> {{ $user->fullname }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->phone }} </td>
                <td> {{ $user->role }} </td>
                <td> <img class="mask" src={{ public_path() . ('/images/profile/' . $user->photo) }} > </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
