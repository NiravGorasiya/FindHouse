<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <tr>
     <th>id</th>
     <th>Title</th>
     <th>Description</th>
     <th>View</th>
     <th>Download</th>
     </tr>
     @foreach($document as $data)
     <tr>
       <td>{{$data->id}}</td>
       <td>{{$data->title}}</td>
       <td>{{$data->description}}</td>
       <td><a href="/view/{{$data->id}}">View</a></td>
       <td><a href="/download/{{$data->file}}">Download</a></td>
     </tr>
     @endforeach
    </table>
    
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $document->links() !!}
        </div>
</body>
</html>