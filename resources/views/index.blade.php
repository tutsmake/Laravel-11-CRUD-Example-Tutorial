<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 11 CRUD Operation Example Tutorial - Tutsmake.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 11 CRUD Operation Example Tutorial - Tutsmake.com</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('notes.create') }}"> Create Note</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($notes as $nts)
        <tr>
            <td>{{ $nts->id }}</td>
            <td>{{ $nts->title }}</td>
            <td>{{ $nts->description }}</td>
            <td>
                <form action="{{ route('notes.destroy',$nts->id) }}" method="Post">
    
                    <a class="btn btn-primary" href="{{ route('notes.edit',$nts->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $notes->links() !!}
</body>
</html>