@extends('layouts.dashresp')

@section('content')

    <div class="main-panel">
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
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mike John responded to your email</a></li>
                                <li><a href="#">You have 5 new tasks</a></li>
                                <li><a href="#">You're now friend with Andrew</a></li>
                                <li><a href="#">Another Notification</a></li>
                                <li><a href="#">Another One</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="material-icons">person</i>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Simple Table</h4>
                    <p class="category">Here is a subtitle for this table</p>
                </div>
                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active table-responsive">
                    <table class="table  table-hover table-striped"  cellspacing="0" width="100%">
                        <thead class="text-danger" >
                        <tr>
                            <th>codigo</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Fecha Ingreso</th>
                            <th>Sucursal</th>
                            <th>Fecha Cumple</th>
                            <th>Estado</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($empleados as $empleado)
                            <tr role="row" class="odd">
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->cedula }}</td>
                                <td> {{ Carbon\Carbon::parse($empleado->fechaingreso)->format('d-m-Y')}}</td>
                                <td> {{ $empleado->sucursal->sucursal }}</td>
                                <td> {{ Carbon\Carbon::parse($empleado->fechacumple)->format('d-m-Y')}}</td>
                                <td> {{ $empleado->estado->estado }}</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
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

    </div>

@endsection
