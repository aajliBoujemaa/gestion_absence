@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Enseignant</h4>
            <div class="d-flex justify-content-center mb-3">
                <a href=" {{route('enseignant.create')}} " class="btn btn-primary">Ajouter un nouvel Enseignant</a>
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
                    @foreach($enseignants as $enseignant)
                        <tr>
                            <td>{{$enseignant->id}}</td>
                            <td>{{$enseignant->nom}}</td>
                            <td>{{$enseignant->prenom}}</td>
                            <td>{{$enseignant->age}}</td>
                            <td>{{$enseignant->CNE}}</td>
                            <td>{{$enseignant->classe_id}}</td>
                            <td>
                                <a href="{{route('enseignant.edit',['enseignant'=>$enseignant->id])}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet enseignant?')){document.getElementById('form-{{$enseignant->id}}').submit()}">Supprimer</a>
                                <form id="form-{{$enseignant->id}}" action="{{route('supprimerEnseignant',['enseignant'=>$enseignant->id])}}" method="post">
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
