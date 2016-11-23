<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  {{-- bootstrap css --}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  {{-- bootstrap js --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <title>Todo List</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    
    <div class="row">
      <h1>Edit Task #{{ $taskUnderEdit->id }}</h1>
    </div>

    {{-- flash error message --}}
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Errors:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row">
      <form action="{{ route('tasks.update', ['tasks'=>$taskUnderEdit->id]) }}" method='POST'>
        {{ csrf_field() }}
        <input type="hidden" name='_method' value='PUT'>

        <div class="form-group">
          <input type="text" name='editedTaskName' value='{{ $taskUnderEdit->name }}' class='form-control input-lg'>
        </div>
        <div class="form-group">
          <input type="submit" value='Save Changes' class='btn btn-lg btn-success'>
          <a href="{{ route('tasks.index') }}" class='btn btn-lg btn-danger pull-right'>Go Back</a>
        </div>
      </form>
    </div>

  </div>
</div>
</body>
</html>