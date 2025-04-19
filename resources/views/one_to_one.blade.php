<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<h1 class="text-center my-4">One to One</h1>

<div class="container">
  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> Arun</th>
        <th scope="col"> Anjul</th>
        <th scope="col"> A.k</th>
        <th scope="col">sapna</th>
        <th scope="col">Simran</th>
        <th scope="col">Anjali</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $user)
        <tr>
          <td>{{ $user['aman'] }}</td>
          <td>{{ $user['aryan'] }}</td>
          <td>{{ $user['sumit'] }}</td>
          <td> <span class="badge bg-primary">{{ $user->girl->sapna }}</span></td>
          <td><span class="badge bg-success">{{ $user->girl->Simran }}</span></td>
          <td><span class="badge bg-warning text-dark">{{ $user->girl->Anjali }}</span></td>
        
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
