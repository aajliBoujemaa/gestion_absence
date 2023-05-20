@extends("master")


@section("content")


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajout d'un nouvel Etudiant</h4>
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
                        <form class="forms-sample" method="post" action="{{route('ajouterClasse')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nom Classe</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="nom_classe">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                            <a href="{{route('home')}}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
