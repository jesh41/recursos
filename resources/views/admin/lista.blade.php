@extends('layouts.dashresp')
@section('pageTitle', 'Lista de Colaboradores')
@section('content')

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Lista de Colaboradores</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" id="formsearch" action="JavaScript:search();" method="GET">
                    {{ csrf_field() }}
                    <div class="form-group form-search is-empty">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda">
                        <span class="material-input"></span>
                        <span class="material-input"></span><span class="material-input"></span></div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Todos los Colaboradores</h4>
                            <p class="category">Alvia Comercial</p>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive">
                                    <table class="table  table-hover table-striped"  cellspacing="0" width="100%">
                                        <thead class="text-danger" >
                                            <tr>
                                                <th class="text-center">codigo</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Cedula</th>
                                                <th class="text-center">Fecha Ingreso</th>
                                                <th class="text-center">Sucursal</th>
                                                <th class="text-center">Fecha Cumple</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbusqueda">
                                            @foreach($empleados as $empleado)
                                            <tr role="row" class="odd">
                                                <td align="center">{{ $empleado->id }}</td>
                                                <td align="center">{{ $empleado->nombre }}</td>
                                                <td align="center">{{ $empleado->cedula }}</td>
                                                <td align="center"> {{ Carbon\Carbon::parse($empleado->fechaingreso)->format('d-m-Y')}}</td>
                                                <td align="center"> {{ $empleado->sucursal->sucursal }}</td>
                                                <td align="center"> {{ Carbon\Carbon::parse($empleado->fechacumple)->format('d-m-Y')}}</td>
                                                <td align="center">
                                                    <?php
                                                        //{{ $empleado->estado->estado }}
                                                        switch($empleado->estado->estado){
                                                            case "Activo":
                                                                echo '<i class="material-icons btn-success">check</i>';
                                                                break;
                                                            case "Inactivo":
                                                                echo '<i class="material-icons btn-danger">close</i>';
                                                                break;
                                                            }
                                                    ?>
                                                </td>
                                                <td class="td-actions text-center">
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Inactivar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $empleados->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
