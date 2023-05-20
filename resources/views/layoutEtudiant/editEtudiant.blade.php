@extends("master")


@section("content")




<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edition d'un Etudiant</h4>
                        @if(session()->has("success"))
                        <div class="alert alert-success">
                            <p> {{session()->get("success")}} </p>
                        </div>
                        @endif
                        @foreach($errors->all() as $error)
                        <ul class="alert alert-danger">
                            {{$error}}
                         </ul>
                        @endforeach
                        <form class="forms-sample" method="post" action="{{route('updateEtudiant',['etudiant'=>$etudiant->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputName1">Nom</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="nom" value="{{$etudiant->nom}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Prenom</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Prenom" name="prenom" value="{{$etudiant->prenom}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName3">Age</label>
                                <input type="number" class="form-control" id="exampleInputName3" placeholder="Age" name="age" value="{{$etudiant->age}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName4">CNE</label>
                                <input type="text" class="form-control" id="exampleInputName4" placeholder="CNE" name="cne" value="{{$etudiant->cne}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Classe</label>
                                <select class="form-control" id="exampleSelectGender" name="classe_id">
                                    <option></option>
                                    @foreach($classes as $classe)
                                    @if($classe->id == $etudiant->classe_id)
                                    <option value="{{$classe->id}}" selected>{{$classe->nom_classe}}</option>
                                    @else
                                    <option value="{{$classe->id}}">{{$classe->nom_classe}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                            <a href="{{route('etudiant')}}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection
