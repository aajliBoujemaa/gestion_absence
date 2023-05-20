@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Etudiants</h4>
            <div class="d-flex justify-content-center mb-3">
                <a href=" {{route('etudiant.create')}} " class="btn btn-primary">Ajouter un nouvel étudiant</a>
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
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>CNE</th>
                            <th>Classe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{$etudiant->id}}</td>
                            <td>{{$etudiant->nom}}</td>
                            <td>{{$etudiant->prenom}}</td>
                            <td>{{$etudiant->age}}</td>
                            <td>{{$etudiant->CNE}}</td>
                            <td>{{$etudiant->classe->nom_classe}}</td>
                            <td>
                                <a href="{{route('etudiant.edit',['etudiant'=>$etudiant->id])}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet Etudiant?')){document.getElementById('form-{{$etudiant->id}}').submit()}">Supprimer</a>
                                <form id="form-{{$etudiant->id}}" action="{{route('supprimerEtudiant',['etudiant'=>$etudiant->id])}}" method="post">
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
