@extends('layouts.estiloAdmin')

<!-- Estilo Datatable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
<!-- Estilo Datatable -->

@section('contenidoAdmin')

<!-- USER DATA-->
                                <div class="user-data m-b-30 m-r-30 m-l-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Datos de Usuario</h3>
                                    <div class="table table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Nombre</td>
                                                    <td>Age</td>
                                                    <td>role</td>
                                                    <td>Salary</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>32</td>
                                                    <td>
                                                        <span class="role admin">admin</span>
                                                    </td>
                                                    <td>$320,800</td>
                                                    
                                                </tr>
                                                <tr>
                                                    
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>27</td>
                                                    <td>
                                                        <span class="role user">Empleado</span>
                                                    </td>
                                                    <td>$170,750</td>
                                                    
                                                </tr>
                                                <tr>
                                                    
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>41</td>
                                                    <td>
                                                        <span class="role user">Empleado</span>
                                                    </td>
                                                    <td>$86,000</td>
                                                    
                                                </tr>
                                                <tr>
                                                    
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>22</td>
                                                    <td>
                                                        <span class="role member">Técnico</span>
                                                    </td>
                                                    <td>$433,060</td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <!-- END USER DATA-->

@endsection

@section('scripts')

@endsection