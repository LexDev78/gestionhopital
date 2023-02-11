@extends('layouts.side_header')


@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Test Rapport</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#rapportAdd">insérer une nouvelle ligne</a></p>
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Resultats</th>
                                                    <th>Pièce Jointe</th>                                                    
                                                    <th>Patient_Nom</th>
                                                    <th>Username</th>
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
                             <!-- Boite modale pour la modification des rapports-->
                             <div class="modal fade admin-query" id="rapportUpdate{{$rapports->id}}"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
                                role="dialog" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Modification</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal">
                                                x
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p class="text-wrap">
                                                <form method="POST"
                                                action="{{route('rapport.update', $rapports->id)}}"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">

                                                          <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                <label for="user">Nom_Utilisateur</label>
                                                                      <select name="user_id" class="form-control" id="user" >
                                                                        @foreach($users as $user)
                                                                            <option value="{{ $user->nom }}"></option>
                                                                            <option value="{{$user->id}}">{{$user -> username}}</option>
                                                                        @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                <label for="patient">Patient_nom</label>
                                                                    <select name="patient_id" class="form-control" id="patient" >
                                                                        @foreach($patients as $patient)
                                                                            <option value="{{ $patient -> nom }}"></option>
                                                                            <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" autocomplete="off" name="description"
                                                                    class="form-control" value="{{ $rapports->description }}" placeholder="Description !...">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" autocomplete="off" name="resultat"
                                                                    class="form-control" value="{{ $rapports->resultat}}" placeholder="Resultat!...">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" autocomplete="off" name="piece_jointe"
                                                                    class="form-control" value="{{ $rapports->piece_jointe}}" placeholder="Piece jointe!...">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="col-12 d-flex justify-content-end mt-1 ">
                                                            <div class="col-5 d-flex justify-content-center">
                                                                <button type="submit"
                                                                class="btn btn-success me-1 mb-1">Sauvegarder</button>
                                                                <button type="reset" data-bs-dismiss="modal"
                                                                class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End boite modale -->

                                    <!-- Boite modale pour la confirmation de suppression d'un  rapport -->
                                    <div class="modal fade admin-query" id="rapportDestroy{{$rapports->id}}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
                                        role="dialog" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Suppression</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal">
                                                        x
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <p class="text-wrap">
                                                        <form action="{{route('rapport.destroy', $rapports->id)}}"
                                                            method="POST">
                                                            @method("DELETE")
                                                            @csrf
                                                            <div class="form-body">
                                                                <p>
                                                                    Êtes-vous sur de vouloir supprimé :
                                                                    {{$rapports->description}} ?
                                                                </p>
                                                            </div>

                                                        </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> Non </button>
                                                        <button type="submit" name="okmodalvote"
                                                        class="btn btn-primary"> Oui </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End boite modale -->
                                    @empty
                                    Pas d'insertion pour le moment !!!
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    </section>
    <!-- Boite modale pour l'ajout d'un rapport-->
    <div class="modal fade admin-query" id="rapportAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
    role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Enregistrement d'un rapport</h5>
            <button type="button" class="close" data-bs-dismiss="modal">
                x
            </button>
        </div>

        <div class="modal-body">

            <p class="text-wrap">

                <form method="POST" action="{{route('rapport.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-6">
                            <div class="form-group has-icon-left">
                            <div class="position-relative">
                            <label for="user">Nom_Utilisateur</label>
                                    <select name="user_id" class="form-control" id="user" >
                                    @foreach($users as $user)
                                        <option value="{{ $user->nom }}"></option>
                                        <option value="{{$user->id}}">{{$user -> username}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <label for="patient">Nom_patient</label>
                                <select name="patient_id" class="form-control" id="patient" >
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->nom }}"></option>
                                        <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <textarea type="text" autocomplete="off" name="description"
                                class="form-control"  placeholder="Description !..."></textarea>
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="resultat"
                                class="form-control"  placeholder="Resultat!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="piece_jointe"
                                class="form-control"  placeholder="Piece Jointe!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>
                </p>
            </div>

            <div class="modal-footer">
                <div class="col-12 d-flex justify-content-end mt-3 ">
                    <div class="col-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success me-1 mb-1">Enregistrer</button>
                        <button type="reset" data-bs-dismiss="modal"
                        class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- End boite modale -->

    @endsection