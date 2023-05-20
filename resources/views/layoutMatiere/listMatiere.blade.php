@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Matiere</h4>
            <div class="d-flex justify-content-center mb-3">
                <a href=" {{route('matiere.create')}} " class="btn btn-primary">Ajouter un nouvel étudiant</a>
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
                            <th>Nom Matiere</th>
                            <th>Classe</th>
                            <th>Enseignant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($matieres as $matiere)
                        <tr>
                            <td>{{$matiere->id}}</td>
                            <td>{{$matiere->nom_matiere}}</td>
                            <td>{{$matiere->classe->nom_classe}}</td>
                            <td>{{$matiere->enseignant_id}}</td>
                            <td>
                                <a href="{{route('matiere.edit',['matiere'=>$matiere->id])}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet Etudiant?')){document.getElementById('form-{{$matiere->id}}').submit()}">Supprimer</a>
                                <form id="form-{{$matiere->id}}" action="{{route('supprimerMatiere',['matiere'=>$matiere->id])}}" method="post">
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
