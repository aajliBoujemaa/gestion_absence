@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <a class="btn btn-info" href="{{route('etudiant')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Nombre des Etudiants</p>
                            <p class="fs-30 mb-2">{{$studentCount}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Nomber des Enseignants</p>
                            <p class="fs-30 mb-2">{{$enseignantCount}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Nombre de Classes</p>
                            <p class="fs-30 mb-2">{{$classeCount}}</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Nombre de Matieres</p>
                            <p class="fs-30 mb-2">{{$matiereCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap mb-5">
                        <div class="mr-5 mt-3">
                            <p class="text-muted">Matieres</p>
                            <h3 class="text-primary fs-30 font-weight-medium">{{$matiereCount}}</h3>
                        </div>
                        <div class="mr-5 mt-3">
                            <p class="text-muted">classe</p>
                            <h3 class="text-primary fs-30 font-weight-medium">{{$classeCount}}</h3>
                        </div>
                        <div class="mr-5 mt-3">
                            <p class="text-muted">Users</p>
                            <h3 class="text-primary fs-30 font-weight-medium">{{$userCount}}</h3>
                        </div>
                    </div>
                    <canvas id="order-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <html>
                    <canvas id="combinedChart" width="400" height="400"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var studentCount = "{{ $studentCount }}";
                        var teacherCount = "{{$enseignantCount}}";

                        var combinedChartCtx = document.getElementById('combinedChart').getContext('2d');
                        var combinedChart = new Chart(combinedChartCtx, {
                            type: 'bar',
                            data: {
                                labels: ['Etudiant', 'Enseignant'],
                                datasets: [{
                                    label: 'Etudiant',
                                    data: [studentCount, 0],
                                    backgroundColor: 'blue'
                                }, {
                                    label: 'Enseignant',
                                    data: [0, teacherCount],
                                    backgroundColor: 'green'
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 50
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>


    @endsection
