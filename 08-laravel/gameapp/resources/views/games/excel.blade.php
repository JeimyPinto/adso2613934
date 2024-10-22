<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Games</title>
</head>

<body>
    <table>
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Image </th>
            <th> Developver </th>
            <th> Release Date </th>
            <th> Category </th>
            <th> User </th>
            <th> Price </th>
            <th> Gender </th>
            <th> Description </th>
            <th> Created At </th>
            <th> Updated At </th>
        </tr>
        @foreach ($games as $game)
            <tr>
                <td> {{ $game->id }} </td>
                <td> {{ $game->title }} </td>
                <td> <img class="mask" src="{{ public_path() . ('/images/games/' . $game->image) }}" width="40px"> </td>
                <td> {{ $game->developer }} </td>
                <td> {{ $game->releasedate }} </td>
                <td> {{ $game->category->name }} </td>
                <td> {{ $game->user->fullname }} </td>
                <td> {{ $game->price }} </td>
                <td> {{ $game->gender }} </td>
                <td>{{$game->description}}</td>
                <td>{{$game->created_at}}</td>
                <td>{{$game->updated_at}}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>