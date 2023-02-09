@extends("layouts.master")
@section("title","Profile")
@section("links")
<link href="vendor1/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="vendor1/lightgallery/css/lightgallery.min.css" rel="stylesheet">
<link href="template/css/style.css" rel="stylesheet">

@endsection
@section("content")
<div class="container-fluid">
    <!-- Add Project -->
    <div class="modal fade" id="addProjectSidebar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="text-black font-w500">Project Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Deadline</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Client Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Salut, Bon retour Mr {{Auth::user()->nom}}!</h4>
                <p class="mb-0">Votre espace personnel</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="images/{{Auth::user()->profile}}" class="img rounded-circle" alt="" height="120px" width="120px">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{Auth::user()->prenom." ".Auth::user()->nom}}</h4>
                                <p>{{Auth::user()->type_user->libelle}}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="670e09010827021f060a170b024904080a">{{Auth::user()->email}}</a></h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ml-auto">
                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">A la une</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">A propos de nous</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Parametrage</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Le titre de votre publication"></textarea> 
                                            <a href="javascript:void(0);" class="btn btn-primary light px-3" data-toggle="modal" data-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="linkModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Social Links</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a class="btn-social facebook" href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                                                            <a class="btn-social google-plus" href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
                                                            <a class="btn-social linkedin" href="javascript:void(0)"><i class="fa fa-linkedin"></i></a>
                                                            <a class="btn-social instagram" href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                                                            <a class="btn-social twitter" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                                                            <a class="btn-social youtube" href="javascript:void(0)"><i class="fa fa-youtube"></i></a>
                                                            <a class="btn-social whatsapp" href="javascript:void(0)"><i class="fa fa-whatsapp"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary light mr-1 px-3" data-toggle="modal" data-target="#cameraModal"><i class="fa fa-camera m-0"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="cameraModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Upload images</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input">
                                                                    <label class="custom-file-label">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#postModal">Post</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="postModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Post</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                                             <a class="btn btn-primary btn-rounded" href="javascript:void(0)">Post</a>																		 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                            <img src="template/images/profile/8.jpg" alt="" class="img-fluid w-100">
                                            <a class="post-title" href="post-details.html"><h3 class="text-black">Reunion pour la mise en place d'un logiciel de Gestion du CHU</h3></a>
                                            <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                of spare which enjoy whole heart.</p>
                                            <button class="btn btn-primary mr-2"><span class="mr-2"><i class="fa fa-heart"></i></span>Aimer</button>
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#replyModal"><span class="mr-2"><i class="fa fa-reply"></i></span>Commenter</button>
                                        </div>

                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">A propos de nous</h4>
                                            <p class="mb-2">Le CHU Gabriel TOURE est situé en commune III du District de Bamako, dans le quartier Centre commercial rue Van Vollehoven, porte 40.
                                                Il est bâti sur une superficie de 3,1 hectares, limité par la Gare ferroviaire au Sud, l’Etat-major de la Gendarmerie au Nord, l’Ecole Nationale des Ingénieurs à l’Ouest et le quartier Médina coura à l’Est
                                            </p>
                                            <p>L’ancien dispensaire central de Bamako a été créé en 1951 et érigé en hôpital le 17 janvier 1959.</p>
                                        </div>
                                    </div>
                                    <div class="profile-lang  mb-5">
                                        <h4 class="text-primary mb-2">Nos Missions</h4>
                                        <p><b>Elles sont relatives à un Hôpital général de 3e référence et portent sur :</b></p>
                                        <p class="ml-4">
                                            <span><i class="fa fa-chevron-right"></i> Assurer le diagnostic, le traitement des malades, des blessés et des femmes enceintes ;</span><br>
                                            <span><i class="fa fa-chevron-right"></i> Assurer la prise en charge des urgences et des cas référés ;</span><br>
                                            <span><i class="fa fa-chevron-right"></i> Participer à la formation initiale et continue des professionnels de la santé et des étudiants ;</span><br>
                                            <span><i class="fa fa-chevron-right"></i> Conduire les travaux de recherche dans le domaine médical.</span>
                                        </p>
                                    </div>
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Information Personnel</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Nom et Prenom <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{Auth::user()->nom." ".Auth::user()->prenom}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Adresse <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" >{{Auth::user()->adresse}}</a></span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Telephone <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>+223 ({{Auth::user()->telephone}})</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Poste<span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{Auth::user()->type_user->libelle}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email<span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{Auth::user()->email}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Nom d'utilisateur<span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{Auth::user()->username}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Parametrage du Compte</h4>
                                            <form method="POST" enctype="multipart/form-data" action="{{route('user.up')}}"> 
                                                @csrf                                            
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Prenom</label>
                                                        <input type="text" placeholder="Prenom" class="form-control" name="prenom" value="{{Auth::user()->prenom}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nom</label>
                                                        <input type="text" placeholder="Nom" class="form-control" name="nom" value="{{Auth::user()->nom}}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Adresse</label>
                                                        <input type="text" placeholder="Adresse" class="form-control" name="adresse" value="{{Auth::user()->adresse}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telephone</label>
                                                        <input type="text" placeholder="Numero de telephone" class="form-control" name="telephone" value="{{Auth::user()->telephone}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Username</label>
                                                        <input disabled type="text" class="form-control" value="{{Auth::user()->username}}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Status</label>
                                                        <select disabled class="form-control default-select" id="inputState">
                                                            <option>{{Auth::user()->type_user->libelle}}</option>
                                                        </select>
                                                    </div>
                                      
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Photo</label>
                                                        <input type="file" class="form-control" name="file"/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>                                             

                                                <button class="text-align-center btn btn-primary" type="submit">Changer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Commentaire</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4" placeholder="Votre commentaire"></textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                                        <button type="button" class="btn btn-primary">Commenter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("script")
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/global/global.min.js"></script>
<script src="vendor1/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor1/lightgallery/js/lightgallery-all.min.js"></script>
<script src="template/js/custom.min.js"></script>
<script src="template/js/deznav-init.js"></script>
<script src="template/js/demo.js"></script>
<script src="template/js/styleSwitcher.js"></script>
@endsection