<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensors</title>
</head>

<body>
    @foreach($temperature as $temp)
        <p>{{$temp->name}}: {{$temp->temperature}}</p>
    @endforeach

    @foreach($infrared as $ifr)
        <p>{{$ifr->name}}: {{$ifr->ifr_value}} : {{$ifr->fire}}</p>
    @endforeach
</body>

</html>