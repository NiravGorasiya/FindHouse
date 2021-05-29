<html>
<head>
<title>doucement video</title>
</head>
<body>
<form action="{{route('saved-files')}}" method="post" enctype="multipart/form-data">
@csrf
<input type ="text" name="title" placeholder="Enter your title"><br>
 <input type="text" name="description" placeholder="enter your description"><br>
<input type="file" name="file"><br>
 <input type="submit"value="submit">
 </form>
 
</body>
</head>
</html>
