@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Seance</h4>
            <div class="d-flex justify-content-center mb-3">
                <a href=" {{route('seance.create')}} " class="btn btn-primary">Ajouter un nouvel Seance</a>
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
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Classe</th>
                            <th>Enseignant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seances as $seance)
                        <tr>
                            <td>{{$seance->id}}</td>
                            <td>{{$seance->date_debut_Seance}}</td>
                            <td>{{$seance->date_fin_Seance}}</td>
                            <td>{{$seance->classe_id}}</td>
                            <td>{{$seance->enseignant_id}}</td>
                            <td>
                                <a href="{{route('seance.edit',['seance'=>$seance->id])}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet enseignant?')){document.getElementById('form-{{$seance->id}}').submit()}">Supprimer</a>
                                <form id="form-{{$seance->id}}" action="{{route('supprimerSeance',['seance'=>$seance->id])}}" method="post">
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
