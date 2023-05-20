@extends("master")


@section("content")




<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edition d'un Classe</h4>
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
                        <form class="forms-sample" method="post" action="{{route('updateClasse',['classe'=>$classe->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputName1">Nom Classe</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="nom" value="{{$classe->nom_classe}}">
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
