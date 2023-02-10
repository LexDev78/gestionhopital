@extends('layouts.side_header')


@section('content')
<section class="section">
<div class="row" id="table-striped">
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient enregistrés</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#patientAdd">insérer un nouvelle ligne</a></p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th colspan="4" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($patients as $patient)
                                            <tr>
                                                    <td class="text-bold-500">{{$patient->matricule}}</td>
                                                    <td class="text-bold-500">{{$patient->nom}}</td>
                                                    <td class="text-bold-500">{{$patient->prenom}}</td>
                                                    <td class="text-bold-500">{{$patient->adresse}}</td>
                                                    <td class="text-bold-500">{{$patient->telephone}}</td>
                                                    <td class="text-bold-500">{{$patient->email}}</td>
                                                    <td>
                                                </td>


                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#patientUpdate{{$patient->id}}" href="#">
                                                Modifier
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#patientDestroy{{$patient->id}}" href="#">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>


                            </div>
                        </div>
                        <!-- End boite modale -->


                        <!-- Boite modale pour la modification des patrient-->
                            <div class="modal fade admin-query" id="patientUpdate{{$patient->id}}"
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
                                            action="{{route('Patient.update', $patient->id)}}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" disabled autocomplete="off" name="matricule"
                                                                class="form-control" value="{{ $patient->matricule }}" placeholder="Matricule !...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" autocomplete="off" name="nom"
                                                                class="form-control" value="{{ $patient->nom }}" placeholder="Nom!...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" autocomplete="off" name="prenom"
                                                                class="form-control" value="{{ $patient->prenom }}" placeholder="Prenom!...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" autocomplete="off" name="adresse"
                                                                class="form-control" value="{{ $patient->adresse }}" placeholder="Adresse!...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" autocomplete="off" name="telephone"
                                                                class="form-control" value="{{ $patient->telephone }}" placeholder="Telephone!...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="mail" autocomplete="off" name="email"
                                                                class="form-control" value="{{ $patient->email }}" placeholder="Email!...">
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

                                <!-- Boite modale pour la confirmation de suppression d'un patient -->
                                <div class="modal fade admin-query" id="patientDestroy{{ $patient->id }}"
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
                                                    <form action="{{route('Patient.destroy', $patient->id)}}"
                                                        method="POST">
                                                        @method("DELETE")
                                                        @csrf
                                                        <div class="form-body">
                                                            <p>
                                                                Êtes-vous sur de vouloir supprimé :
                                                                {{$patient->nom}} ?
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




<!-- Boite modale pour l'ajout d'une patient-->
<div class="modal fade admin-query" id="patientAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Enregistrement d'un patient</h5>
        <button type="button" class="close" data-bs-dismiss="modal">
            x
        </button>
    </div>

    <div class="modal-body">

        <p class="text-wrap">

            <form method="POST" action="{{route('Patient.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">


                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="nom"
                                class="form-control"  placeholder="Nom!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="prenom"
                                class="form-control"  placeholder="Prenom!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="adresse"
                                class="form-control"  placeholder="Adresse!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" autocomplete="off" name="telephone"
                                class="form-control" placeholder="Telephone!...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="mail" autocomplete="off" name="email"
                                class="form-control"  placeholder="Email!...">
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
