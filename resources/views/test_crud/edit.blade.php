@extends('layouts.side_header')

@section('content')

   <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button> -->



@endsection







<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

        
                            <form id="formAccountSettings" method="POST" action="{{ route('test.update', $test->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="user" class="col-md-6"  tabindex="0">
                                            <span class="d-none d-sm-block">Nom Utilisateur</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <select name="user_id" class="form-control" id="user" > 
                                        
                                                <option value=""></option>
                                        
                                            </select>                         
                                        </label><br>

                                        <label for="patient" class="col-md-8"  tabindex="0">
                                            <span class="d-none d-sm-block">Nom patient</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <select name="patient_id" class="form-control" id="patient" > 
                                            
                                                <option value=""></option>
                                            
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
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div> -->