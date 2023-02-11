@extends('layouts.side_header')


@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Traitement enregistrés</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#traitementAdd">insérer un nouvelle ligne</a></p>
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Medecin</th>
                                                    <th>Patient Nom</th>
                                                    <th>Libelle</th>
                                                    <th>Prix</th>
                                                    <th colspan="4" style="text-align: center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($traites as $traite)
                                                <tr>
                                                        <td class="text-bold-500">{{$traite->user->nom}}</td>
                                                        <td class="text-bold-500">{{$traite->patient->nom}}</td>
                                                        <td class="text-bold-500">{{$traite->libelle}}</td>
                                                        <td class="text-bold-500">{{$traite->prix}}</td>
                                                        <td>
                                                    </td>


                                                <td>
                                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#traitementUpdate{{$traite->id}}" href="#">
                                                    Modifier
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#traitementDestroy{{$traite->id}}" href="#">
                                                Supprimer
                                            </a>
                                        </td>
                                    </tr>


                                </div>
                            </div>
                            <!-- End boite modale -->


                            <!-- Boite modale pour la modification des visites-->
                             <div class="modal fade admin-query" id="traitementUpdate{{$traite->id}}"
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
                                                action="{{route('traitement.update', $traite->id)}}"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">

                                                          <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                      <select name="user_id" class="form-control" id="user" >
                                                                        @foreach($users as $user)
                                                                            <option value="">{{ $user->nom }}</option>
                                                                            <option value="{{$user->id}}">{{$user -> username}}</option>
                                                                        @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <select name="patient_id" class="form-control" id="patient" >
                                                                        @foreach($patients as $patient)
                                                                            <option value="">{{ $patient->nom }}</option>
                                                                            <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" autocomplete="off" name="libelle"
                                                                    class="form-control" value="{{ $traite->libelle }}" placeholder="Libelle !...">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="number" autocomplete="off" name="prix"
                                                                    class="form-control" value="{{ $traite->prix }}" placeholder="Prix!...">
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

                                    <!-- Boite modale pour la confirmation de suppression d'une carte -->
                                    <div class="modal fade admin-query" id="traitementDestroy{{$traite->id}}"
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
                                                        <form action="{{route('traitement.destroy', $traite->id)}}"
                                                            method="POST">
                                                            @method("DELETE")
                                                            @csrf
                                                            <div class="form-body">
                                                                <p>
                                                                    Êtes-vous sur de vouloir supprimé :
                                                                    {{$traite->libelle}} ?
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




    <!-- Boite modale pour l'ajout d'une carte-->
    <div class="modal fade admin-query" id="traitementAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
    role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Enregistrement d'un test</h5>
            <button type="button" class="close" data-bs-dismiss="modal">
                x
            </button>
        </div>

        <div class="modal-body">

            <p class="text-wrap">

                <form method="POST" action="{{route('traitement.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-6">
                            <div class="form-group has-icon-left">
                            <div class="position-relative">
                                    <select name="user_id" class="form-control" id="user" >
                                        <option> --Choisir le Medecin -- </option>
                                    @foreach($users as $user)

                                        <option value="{{$user->id}}">{{$user -> username}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="patient_id" class="form-control" id="patient" >
                                    <option>--Choisir le Patient --</option>
                                    @foreach($patients as $patient)

                                        <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="libelle"
                                class="form-control"  placeholder="Libelle !...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="number" autocomplete="off" name="prix"
                                class="form-control"  placeholder="Prix!...">
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
