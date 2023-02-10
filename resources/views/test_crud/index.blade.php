@extends('layouts.side_header')


@section('content')

<div class="card">
        <h5 class="card-header">Tests</h5>
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
             Ajouter Tests
        </button><br><br>

        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Utilisateur</th>
                        <th>Nom Complet Patient</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($test as $tests)
                    <tr>
                        <td>{{$tests -> id}}</td>
                        <td>{{$tests -> user_id}}</td>
                        <td>{{$tests -> patient_id}}</td>
                        <td>{{$tests -> nom}}</td>
                        <td>{{$tests -> prix}}</td>
                        
                        <td>
                        
                            <a class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#TestUpdate{{$tests->id}}" href="#">
                                Modifier
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#testDestroy{{$tests->id}}" href="#">
                                Supprimer
                            </a>
                        </td>               
                    
                    </tr>
                    <!-- Boite modale pour la modification des visites-->
                    <div class="modal fade admin-query" id="TestUpdate{{$tests->id}}"
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
                                        action="{{route('test.update', $tests->id)}}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <label for="user" class="col-md-6"  tabindex="0">
                                                                <span class="d-none d-sm-block">Nom Utilisateur</span>
                                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                                <select name="patient_id" class="form-control" id="patient" >
                                                                    @foreach($users as $user)
                                                                        <option value="{{ $user->nom }}"></option>
                                                                        <option value="{{$user -> id}}">{{$user -> username}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <label for="user" class="col-md-6"  tabindex="0">
                                                                <span class="d-none d-sm-block">Nom Patient</span>
                                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                                <select name="patient_id" class="form-control" id="patient" >
                                                                    @foreach($patients as $patient)
                                                                        <option value="{{ $patient->nom }}"></option>
                                                                        <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <label for="user" class="col-md-6"  tabindex="0">
                                                                <span class="d-none d-sm-block">Nom du test</span>
                                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                                <input type="text" autocomplete="off" name="nom"
                                                                class="form-control" value="{{ $tests->nom }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <label for="user" class="col-md-6"  tabindex="0">
                                                                <span class="d-none d-sm-block">Prix du test</span>
                                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                                <input type="double" autocomplete="off" name="prix"
                                                                class="form-control" value="{{ $tests->prix }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <div class="col-12 d-flex justify-content-end mt-1 ">
                                                    <div class="col-5 d-flex justify-content-center">
                                                        <button type="submit"
                                                        class="btn btn-success me-1 mb-1">Enregistrer</button>
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
                            <div class="modal fade admin-query" id="testDestroy{{$tests->id}}"
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
                                                <form action="{{route('test.destroy', $tests->id)}}"
                                                    method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <div class="form-body">
                                                        <p>
                                                            Êtes-vous sur de vouloir supprimé :
                                                            {{$tests->nom}} ?
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
                        </div>   
                    </div>     
                    @empty
                    Pas d'insertion pour le moment !!!
                    @endforelse
                </tbody>
                
            </table>
            
        </div>
    </div>
    @if(session()->get('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}  
    </div><br />
    @endif

    
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter Tests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
        
                <div class="container-xxl flex-grow-1 container-p-y">
      
                    <div class="row">
                        <div class="col-md-12">

        
                            <form id="formAccountSettings" method="POST" action="{{route('test.store') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="user" class="col-md-6"  tabindex="0">
                                            <span class="d-none d-sm-block">Nom Utilisateur</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <select name="user_id" class="form-control" id="user" > 
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user -> username}}</option>
                                            @endforeach
                                            </select>                         
                                        </label><br>

                                        <label for="patient" class="col-md-8"  tabindex="0">
                                            <span class="d-none d-sm-block">Nom patient</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <select name="patient_id" class="form-control" id="patient" > 
                                            @foreach($patients as $patient)
                                                <option value="{{$patient -> id}}">{{$patient -> nom}}</option>
                                            @endforeach
                                            </select>                         
                                        </label><br>

                                        <label for="nom" class="col-md-8"  tabindex="0">Nom</label>
                                        <input type="text" name="nom" id="nom" class="form-control col-md-8">

                                        <label for="prix" class="col-md-6">Prix</label>
                                        <input type="text" name="prix" id="prix" class="form-control col-md-6">
                                        <div class="mb-3 col-md-8">
                        
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection




