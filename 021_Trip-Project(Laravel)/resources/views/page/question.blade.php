<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('delete')}}" method="POST" class="form">
        @csrf
        @method('delete')
        <input type="submit" name="yes" class="yes" value="Yes">
        <input type="submit" name="no" class="no" value="No">                
    </form>
</body>
</html>