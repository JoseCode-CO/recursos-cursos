<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>create</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="nav-link text-danger" href="/home">INICIO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
      </nav>

      <div class="text">
        <h1 class="text-center pt-4">Agregar categoria</h1>
      </div>

      <div class="container">
        <div class="row mb-3 pt-4">
            <div class="col-sm-8 mx-auto">
                <div class="card border-0 shadow  pl-3">
                    <div class="card-body">
                    <form action="{{ route('categoria') }}" method="POST" class="row g-3 needs-validation">
                        <div class="col col-6">
                            <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off">
                        </div>
                        <div class="col col-6">
                            @csrf
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row  mb-3">
              <div class="col-sm-8 mx-auto mt-2">
                  <div class="card border-0 shadow">
                      <div class="card-body">
                          
                          <table class="table thead-dark">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>NOMBRE</th>
                                      <th>ACCION</th>
                                      <th>&nbsp;</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($categorias as $datos )
                                  <tr>
                                      <td>{{$datos->id }}</td>
                                      <td>{{$datos->nombre_categoria }}</td>
                                      <td>
                                          <form action="{{route('destroy', $datos)}}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <input type="submit"
                                              value="Eliminar"
                                              class="btn btn-sm btn-danger"
                                              onclick="return confirm('¿Desea Eliminar... ?')"
                                              >
                                          </form>
                                      </td>
                                  </tr>
                                 @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>