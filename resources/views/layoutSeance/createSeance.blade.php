@extends("master")


@section("content")


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajout d'un nouvel Seance</h4>
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
                        <form class="forms-sample" method="post" action="{{route('ajouterSeance')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Date debut Seance</label>
                                <input type="date" class="form-control" id="exampleInputName1" placeholder="debut" name="date_debut_Seance">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Date fin Seance</label>
                                <input type="date" class="form-control" id="exampleInputName2" placeholder="fin" name="date_fin_Seance">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Classe</label>
                                <select class="form-control" id="exampleSelectGender" name="classe_id">
                                    <option></option>
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->nom_classe}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Classe</label>
                                <select class="form-control" id="exampleSelectGender" name="enseignant_id">
                                    <option></option>
                                    @foreach($enseignants as $enseignant)
                                    <option value="{{$enseignant->id}}">{{$enseignant->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                            <a href="{{route('seance')}}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
