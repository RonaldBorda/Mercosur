<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCOSUR</title>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
    <!--Navegacion-->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand">MERCOSUR</a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <!--Fin navegacion-->
    </header>
    <main style=""><br>
    
    <section class="container">
    <h4 style="">Relaciones Comerciales</h4>
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fecha</th>
              <th scope="col">Pais A</th>
              <th scope="col">Representa A</th>
              <th scope="col">Pais B</th>
              <th scope="col">Representa B</th>
              <th scope="col">Tipo</th>
              <th scope="col">Producto</th>
              <th scope="col">Descripción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comercials as $comercial)
            <tr>
              <td>{{$comercial->id}}</td>
              <td>{{$comercial->fecha}}</td>
              <td>{{$comercial->pais_a}}</td>
              <td>{{$comercial->representante_a}}</td>
              <td>{{$comercial->pais_b}}</td>
              <td>{{$comercial->representante_b}}</td>
              <td>{{$comercial->tipo}}</td>
              <td>{{$comercial->producto}}</td>
              <td>{{$comercial->descripcion}}</td>
            </tr>
            @endforeach
          </tbody>
      </table><br>

      <h4 style="">Relaciones Diplomaticas</h4>
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fecha</th>
              <th scope="col">Pais A</th>
              <th scope="col">Representa A</th>
              <th scope="col">Pais B</th>
              <th scope="col">Representa B</th>
              <th scope="col">Pais C</th>
              <th scope="col">Representa C</th>
              <th scope="col">Producto</th>
              <th scope="col">Descripción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($diplomaticas as $diplomatica)
            <tr>
              <td>{{$diplomatica->id}}</td>
              <td>{{$diplomatica->fecha}}</td>
              <td>{{$diplomatica->pais_a}}</td>
              <td>{{$diplomatica->representante_a}}</td>
              <td>{{$diplomatica->pais_b}}</td>
              <td>{{$diplomatica->representante_b}}</td>
              <td>{{$diplomatica->pais_c}}</td>
              <td>{{$diplomatica->representante_c}}</td>
              <td>{{$diplomatica->producto}}</td>
              <td>{{$diplomatica->descripcion}}</td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </section>
    





    
    </main>








    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
