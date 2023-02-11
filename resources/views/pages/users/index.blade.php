@extends("layouts.master")
@section("links")
<link href="vendor1/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="vendor1/lightgallery/css/lightgallery.min.css" rel="stylesheet">
<link href="template/css/style.css" rel="stylesheet">

@endsection
@section("content")

    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-sm-flex d-block">
                <div class="mr-auto mb-sm-0 mb-3">
                    <h4 class="card-title mb-2">Liste des utilisateurs</h4>
                    <span>Seul le type et le statut peut être changer !</span>
                </div>
                <a href="javascript:void(0);" class="btn btn-info light mr-3"><i class="las la-download scale3 mr-2"></i>Importer la liste</a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" class="btn btn-info">+ Ajouter un Utilisateur</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table style-1" id="ListDatatableView">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom Prenom</th>
                                <th>Poste</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key=1 ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <h6>{{$key++}}.</h6>
                                    </td>
                                    <td>
                                        <div class="media style-1">
                                            <img src="images/{{$user->profile}}" class="img-fluid mr-2" alt="{{$user->nom}}">
                                            <div class="media-body">
                                                <h6>{{$user->nom." ".$user->prenom}}</h6>
                                                <span>{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6>{{$user->type_user->libelle}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="text-primary">(223){{$user->telephone}}</h6>                                            
                                        </div>
                                    </td>
                                    <td>
                                        {{$user->adresse}}
                                    </td>
                                    <td>
                                        <span class="badge  {{$user->status == 1 ? "badge-success" : "badge-warning"}} ">
                                            {{$user->status == 1 ? "Actif" : "Non Actif"}}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex action-button">
                                            <a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
                                                <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0);" class="ml-2 btn btn-xs px-2 light btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="@fat">
                                                <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title " id="exampleModalLabel">Nouvel Utilisateur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="prenom" class="col-form-label">Prenom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="Nom-text" class="col-form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nom" id="Nom" required>
                            </div>
                        </div>                 
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="telephone" class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>                 
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="type_user" class="col-form-label">Type utilisateur <span class="text-danger">*</span></label>
                                <select name="type_user_id" id="type_user" required class="form-control">
                                    <option disabled>Choisir</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" required class="form-control">
                                    <option disabled>Choisir</option>
                                    <option value="1">Activer</option>
                                    <option value="0">Désactiver</option>
                                </select>
                            </div>
                        </div>                 
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="username" class="col-form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="usename" name="username">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password" class="col-form-label">Mot de passe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                        </div>                 
                    </div>                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

          </div>
        </div>
      </div>
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger ">
              <h5 class="modal-title text-white" id="exampleModalLabel">Suprimer un utilisateur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <p>Êtes vous sûr de vouloir supprimer cet utilisateur <br>
                    la suppression échouera si des donnée lui sont ratachées ! <br>
                    <b>Il est possible de desactiver l'utilisateur</b>

                </p>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger">Continuer</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section("script")
    <script src="vendor1/datatables/js/jquery.dataTables.min.js"></script>
    <script src="template/js/plugins-init/datatables.init.js"></script>
@endsection