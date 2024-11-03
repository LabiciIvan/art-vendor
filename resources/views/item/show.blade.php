<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item</title>
</head>
<body>
    <a href={{ route('item.all') }}>Back</a>
    @isset($item)
        <h4>{{$item->name}}</h4>
        <h4>{{$item->price}}</h4>
        <p>{{$item->description}}</p>
    @endisset
</body>
</html>