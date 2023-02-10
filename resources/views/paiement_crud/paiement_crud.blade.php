@extends('layouts.side_header')


@section('content')



{{--  --}}

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Paiement</h1>

    <a 
        type="button" class="btn btn-primary mb-4"
        data-toggle="modal"
        data-target="#AddPaie"
        class="btn btn-sm btn-white me-2">
        <i class="fa fa-signal me-1"></i> Ajouter un nouveau paiement 
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des paiements</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paiements as $paiement)
                        <tr>
                            <td>{{$paiement->patient->nom}} {{$paiement->patient->prenom}}</td>
                            <td>{{$paiement->montant}}</td>
                            <td>{{$paiement->date}}</td>
                            <td>
                                <a 
                                    type="button" class="btn btn-info mb-4"
                                    data-toggle="modal"
                                    data-target="#ModPaie{{$paiement->id}}"
                                    class="btn btn-sm btn-white me-2">
                                    <i class="fa fa-edit me-1"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('Paiement.destroy', $paiement->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <input type="submit" class="btn btn-danger " value="Supprimer">
                                    
                                </a>    
                                </form>
                                
                            </td>

                            {{-- Modal Update --}}
                            <div class="modal fade" id="ModPaie{{$paiement->id}}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modification d'un d'un paiement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Paiement.update', $paiement->id )}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="mb-3 col-md-12">

                                                                            
                                                    <label for="pat" class="col-md-12"  tabindex="0">Patient</label>
                                                    <select name="patient_id" class="form-control col-md-12" id="pat" >
                                                        <option value="{{$paiement->patient->id}}" selected>{{$paiement->patient->nom}} {{$paiement->patient->prenom}}</option> 
                                                        
                                                        @foreach($patients as $user)
                                                            <option value="{{$user->id}}">{{$user->prenom}} {{$user->nom}}</option>
                                                        @endforeach
                                                    </select> 
                                                    <br>

                                                    <label for="mot" class="col-md-12">Motif</label>
                                                    <input type="text" value="{{$paiement->motif}}" name="motif" id="mot" class="form-control col-md-12">
                                                    <br>
                                                    
                                                    <label for="prix" class="col-md-12">Prix</label>
                                                    <input type="text" name="montant" value="{{$paiement->montant}}" id="prix" class="form-control col-md-12 mb-4">
                                                    
                                                    <label for="prix" class="col-md-12">Date de paiement</label>
                                                    <input type="date" name="date" value="{{$paiement->date}}" id="date" class="form-control col-md-12 mb-4">
                                                    
                                                    
                                                    <button type="reset" class="btn btn-secondary">
                                                        Annuler
                                                    </button>
                                                    <button type="submit" class="btn btn-info">
                                                        Valider
                                                    </button>
                                                </div>
                                            </form>        
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Annuler
                                            </button>
                                            <form action="{{route('services.destroy', encrypt($service->id) )}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>


                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

{{-- Modal Add --}}
<div class="modal fade" id="AddPaie" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Validation d'un paiement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Paiement.store')}}" method="post">
                    @csrf
                    <div class="mb-3 col-md-12">

                                                
                        <label for="pat" class="col-md-12"  tabindex="0">Patient</label>
                        <select name="patient_id" class="form-control col-md-12" id="pat" >
                            <option disabled selected>Selectionnez un patient</option> 
                            @foreach($patients as $user)
                                <option value="{{$user->id}}">{{$user->prenom}} {{$user->nom}}</option>
                            @endforeach
                        </select> 
                        <br>

                        <label for="mot" class="col-md-12">Motif</label>
                        <input type="text" name="motif" id="mot" class="form-control col-md-12">
                        <br>
                        
                        <label for="prix" class="col-md-12">Prix</label>
                        <input type="text" name="montant" id="prix" class="form-control col-md-12 mb-4">
                        
                        
                        
                        <button type="reset" class="btn btn-secondary">
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-info">
                            Valider
                        </button>
                    </div>
                </form>        
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Annuler
                </button>
                <form action="{{route('services.destroy', encrypt($service->id) )}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div> --}}
        </div>
    </div>
</div>

@endsection
