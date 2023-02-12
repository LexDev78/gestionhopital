@extends('layouts.side_header')


@section('content')
<section class="section">
<div class="row" id="table-striped">
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Salle enregistrés</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text">Pour <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#salleAdd">insérer un nouvelle ligne</a></p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Patient Nom</th>
                                                <th>Numero</th>
                                                <th colspan="4" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($salles as $salle)
                                            <tr>

                                                    <td class="text-bold-500">{{$salle->nom}}</td>
                                                    <td class="text-bold-500">{{$salle->patient->prenom." ".$salle->patient->nom}}</td>
                                                    <td class="text-bold-500">{{$salle->numero}}</td>
                                                    <td>
                                                </td>


                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#salleUpdate{{$salle->id}}" href="#">
                                                Modifier
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#salleDestroy{{$salle->id}}" href="#">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>


                            </div>
                        </div>
                        <!-- End boite modale -->


                        <!-- Boite modale pour la modification des visites-->
                            <div class="modal fade admin-query" id="salleUpdate{{$salle->id}}"
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
                                            action="{{route('salle.update', $salle->id)}}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                     <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="nom" autocomplete="off" name="nom"
                                                                class="form-control" value="{{ $salle->nom }}" placeholder="Nom de la salle !...">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
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
                                                                <input type="number" autocomplete="off" name="numero"
                                                                class="form-control" value="{{ $salle->numero }}" placeholder="Numero de la salle!...">
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
                                <div class="modal fade admin-query" id="salleDestroy{{$salle->id}}"
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
                                                    <form action="{{route('salle.destroy', $salle->id)}}"
                                                        method="POST">
                                                        @method("DELETE")
                                                        @csrf
                                                        <div class="form-body">
                                                            <p>
                                                                Êtes-vous sur de vouloir supprimé la salle :
                                                                {{$salle->nom}} ?
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
<div class="modal fade admin-query" id="salleAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
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

            <form method="POST" action="{{route('salle.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">

                       <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="nom" autocomplete="off" name="nom"
                                class="form-control" placeholder="Nom de la salle !...">
                                <div class="form-control-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="patient_id" class="form-control" id="patient" >
                                    <option value="">-- Choisir un Patient --</option>
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
                                <input type="number" autocomplete="off" name="numero"
                                class="form-control"  placeholder="Numero de la salle!...">
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
