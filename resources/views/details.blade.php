<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{$document->title}}</h2>
    </h3>{{$document->description}}</h3>
    <p><iframe src="{{url('storage/'.$document->file)}}" ></iframe></p>
</body>
</html>