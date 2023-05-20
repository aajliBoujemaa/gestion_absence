@extends("master")


@section("content")


<div class="col-lg-11 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listes Des Absence</h4>
            <div class="d-flex justify-content-center mb-3">
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    @if(session()->has("successDelete"))
                    <div class="alert alert-success">
                        <h4> {{session()->get("successDelete")}} </h4>
                    </div>
                    @endif

                    <form class="forms-sample" action="{{ route('absence') }}" method="GET">
                        <input class="form-control" type="text" name="search" placeholder="Rechercher par id">
                        <button class="btn btn-info" type="submit">Rechercher </button>
                    </form>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Enseignant</th>
                            <th>Etudiant(id)</th>
                            <th>Classe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->id}}</td>
                            <td>{{$absence->date}}</td>
                            <td>{{$absence->enseignant_id}}</td>
                            <td>{{$absence->etudiant->nom}}({{$absence->etudiant_id}})</td>
                            <td>{{$absence->classe->nom_classe}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
