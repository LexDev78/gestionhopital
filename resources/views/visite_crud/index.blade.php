@extends('layouts.side_header')


@section('content')
<section class="section">
<div class="row" id="table-striped">
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Visiteur enregistrés</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#visiteAdd">insérer un nouvelle ligne</a></p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Patients</th>
                                                <th>Medecin</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th colspan="4" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($visites as $visite)
                                            <tr>

                                                    <td class="text-bold-500">{{$visite->patient->matricule}}</td>
                                                    <td class="text-bold-500">{{$visite->patient->prenom." ".$visite->patient->nom}}</td>
                                                    <td class="text-bold-500">{{$visite->user->prenom." ".$visite->user->nom}}</td>
                                                    <td class="text-bold-500">{{$visite->date}}</td>
                                                    <td class="text-bold-500">{{$visite->heure}}</td>
                                                    <td>
                                                </td>


                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#visiteUpdate{{$visite->id}}" href="#">
                                                Modifier
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#visiteDestroy{{$visite->id}}" href="#">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>


                            </div>
                        </div>
                        <!-- End boite modale -->


                        <!-- Boite modale pour la modification des visites-->
                            <div class="modal fade admin-query" id="visiteUpdate{{$visite->id}}"
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
                                            action="{{route('Visite.update', $visite->id)}}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

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
                                                                <input type="date" autocomplete="off" name="date"
                                                                class="form-control" value="{{ $visite->date }}" placeholder="Date !...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="time" autocomplete="off" name="heure"
                                                                class="form-control" value="{{ $visite->heure }}" placeholder="Heure!...">
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
                                <div class="modal fade admin-query" id="visiteDestroy{{$visite->id}}"
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
                                                    <form action="{{route('Visite.destroy', $visite->id)}}"
                                                        method="POST">
                                                        @method("DELETE")
                                                        @csrf
                                                        <div class="form-body">
                                                            <p>
                                                                Êtes-vous sur de vouloir supprimé la visite de  :
                                                                {{$visite->patient->prenom." ".$visite->patient->nom}} ?
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
<div class="modal fade admin-query" id="visiteAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Enregistrement d'un Visiteur</h5>
        <button type="button" class="close" data-bs-dismiss="modal">
            x
        </button>
    </div>

    <div class="modal-body">

        <p class="text-wrap">

            <form method="POST" action="{{route('Visite.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input  list="patient_id" name="patient_matricule" class="form-control">
                                    <datalist id="patient_id">
                                        @foreach($patients as $patient)
                                            <option value="{{$patient -> matricule}}">{{$patient->nom." ".$patient->prenom}}</option>
                                        @endforeach
                                    </datalist>                                   
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input  list="dataliste" name="user_id" class="form-control">
                                    <datalist id="dataliste">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->nom." ".$user->prenom}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="date" autocomplete="off" name="date"
                                    class="form-control" value="" placeholder="Date !...">
                                    <div class="form-control-icon">
                                        <i class="bi bi-pencil"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="time" autocomplete="off" name="heure"
                                    class="form-control" value="" placeholder="Heure!...">
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
