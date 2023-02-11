@extends('layouts.side_header')


@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rapport Test</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#testAdd">insérer une nouvelle ligne</a></p>
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Resultats</th>
                                                    <th>Pièce Jointe</th>                                                    
                                                    <th>Patient_Id</th>
                                                    <th>User_Id</th>
                                                    <th colspan="4" style="text-align: center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($rapport as $rapports)
                                                <tr>
                                                       <td class="text-bold-500">{{$rapports->description}}</td>
                                                        <td class="text-bold-500">{{$rapports->resultat}}</td> 
                                                        <td class="text-bold-500">{{$rapports->piece_jointe}}</td>
                                                        <td class="text-bold-500">{{$rapports->patient_id}}</td>
                                                       <td class="text-bold-500">{{$rapports->user_id}}</td>
                                                        
                                                        
                                                        <td>
                                                    </td>


                                                <td>
                                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#rapportUpdate{{$rapports->id}}" href="#">
                                                    Modifier
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#rapportDestroy{{$rapports->id}}" href="#">
                                                Supprimer
                                            </a>
                                        </td>
                                    </tr>


                                </div>
                            </div>
                            <!-- End boite modale -->