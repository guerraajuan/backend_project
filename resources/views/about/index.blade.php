@extends('base')
@section('title') About @endsection
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "About" }}</h1>
    </div>

    <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container-fluid">
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="btn btn-primary" aria-current="page" href="{{ route("about.create") }}">+ Nuevo</a>
              </li>
              
            </ul>
            
            <form action="{{route("about.search")}}" method="POST"  class="d-flex">
                {{ csrf_field() }}
              <input class="form-control me-2" type="search" placeholder="Buscar" name="search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>



    <div class="row">
        <table>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($abouts as $about) 
                        <tr>
                            <th scope="row">{{ $about->id }}</th>
                            <td>{{ $about->name }}</td>
                            <td>{{ $about->email }}</td>
                            <td>{{ $about->phone }}</td>
                            <td>{{ $about->message }}</td>
                            <td style="display: flex" >
                                <a href="{{ route("about.edit",$about->id) }}" class="btn btn-sm btn-primary" style = "margin-right: 10px" >Edit</a>
                                <form action="{{ route("about.destroy",$about->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                  @endforeach
                 
                </tbody>
              </table>
        </table>
    </div>
@endsection
