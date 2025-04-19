<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<h1 class="text-center my-4">One to Many Relation</h1>

<div class="container">
  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">User Email</th>
        <th scope="col">Maths</th>
        <th scope="col">Physics</th>
        <th scope="col">Chemistry</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user['username'] }}</td>
          <td>{{ $user['useremail'] }}</td>
          <td>
            @foreach ($user['books'] as $book)
              <span class="badge bg-primary">{{ $book['maths'] }}</span><br>
            @endforeach
          </td>
          <td>
            @foreach ($user['books'] as $book)
              <span class="badge bg-success">{{ $book['physics'] }}</span><br>
            @endforeach
          </td>
          <td>
            @foreach ($user['books'] as $book)
              <span class="badge bg-warning text-dark">{{ $book['chemistry'] }}</span><br>
            @endforeach
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
