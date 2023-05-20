@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Classes</h4>
            <div class="d-flex justify-content-center mb-3">
                <a href=" {{route('etudiant.create')}} " class="btn btn-primary">Ajouter un nouvel Classe</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                @if(session()->has("successDelete"))
                        <div class="alert alert-success">
                            <h4> {{session()->get("successDelete")}} </h4>
                        </div>
                        @endif
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom Classe</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $classe)
                        <tr>
                            <td>{{$classe->id}}</td>
                            <td>{{$classe->nom_classe}}</td>
                            <td>
                                <a href="{{route('classe.edit',['classe'=>$classe->id])}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet Etudiant?')){document.getElementById('form-{{$classe->id}}').submit()}">Supprimer</a>
                                <form id="form-{{$classe->id}}" action="{{route('supprimerClasse',['classe'=>$classe->id])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
