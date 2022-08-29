@if ($projectTotalWorksites > 0)
    <div class="row">
        <div class="col">
            <x-adminlte-card style="width: 300px; height: 450px;" title="Prioject Total Authorized" theme="success"
                icon="fas fa-check">
                <canvas id="authorizedChart"></canvas>
                <h5>{{ round(($projectTotalAuthorized / $projectTotalWorksites) * 100, 2) }}% of the project is
                    Authorized
                </h5>
                <h5>{{ $projectTotalAuthorized }} / {{ $projectTotalWorksites }} Worksites Authorized</h5>
            </x-adminlte-card>
        </div>
        <div class="col">
            <x-adminlte-card style="width: 300px; height: 450px;" title="Project Total Refused" theme="danger"
                icon="fas fa-times">
                <canvas id="refusedChart"></canvas>
                <h5>{{ round(($projectTotalRefused / $projectTotalWorksites) * 100, 2) }}% of the project is Refused
                </h5>
                <h5>{{ $projectTotalRefused }} / {{ $projectTotalWorksites }} Worksites Refused</h5>
            </x-adminlte-card>
        </div>
        <div class="col">
            <x-adminlte-card style="width: 300px; height: 450px;" title="Project Overview" theme="info"
                icon="fas fa-tasks">
                <canvas id="overviewChart"></canvas>
                <h5>{{ round((($projectTotalAuthorized + $projectTotalRefused) / $projectTotalWorksites) * 100, 2) }}%
                    of
                    project is
                    Complete</h5>
                <h5>{{ $projectTotalAuthorized + $projectTotalRefused }} / {{ $projectTotalWorksites }} Worksites
                    Complete
                </h5>
            </x-adminlte-card>
        </div>
    </div>
    @push('charts')
        <script>
            const authorizedCtx = document.getElementById('authorizedChart').getContext('2d');
            const authorizedChart = new Chart(authorizedCtx, {
                type: 'pie',
                data: {
                    labels: ['Worksites', 'Authorized'],
                    datasets: [{
                        label: 'Authorized',
                        data: [{{ $projectTotalWorksites - $projectTotalAuthorized }},
                            {{ $projectTotalAuthorized }}
                        ],
                        backgroundColor: [
                            'rgba(52,58,64, .8)',
                            'rgba(40,167,69, .8)',
                        ],
                        borderColor: [
                            'rgb(0, 0, 0)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            const refusedCtx = document.getElementById('refusedChart').getContext('2d');
            const refusedChart = new Chart(refusedCtx, {
                type: 'pie',
                data: {
                    labels: ['Worksites', 'Refused', ],
                    datasets: [{
                        label: 'Refused',
                        data: [{{ $projectTotalWorksites - $projectTotalRefused }},
                            {{ $projectTotalRefused }}
                        ],
                        backgroundColor: [
                            'rgba(52,58,64, .8)',
                            'rgba(220,53,69, .8)',
                        ],
                        borderColor: [
                            'rgb(0, 0, 0)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            const overviewCtx = document.getElementById('overviewChart').getContext('2d');
            const overviewChart = new Chart(overviewCtx, {
                type: 'pie',
                data: {
                    labels: ['Authorized', 'Refused', 'Pending'],
                    datasets: [{
                        label: 'Refused',
                        data: [{{ $projectTotalAuthorized }}, {{ $projectTotalRefused }},
                            {{ $projectTotalPending }}
                        ],
                        backgroundColor: [
                            'rgba(40,167,69, .8)',
                            'rgba(220,53,69, .8)',
                            'rgba(54, 162, 235, .8)',
                        ],
                        borderColor: [
                            'rgb(0, 0, 0)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {}
                    }
                }
            });
        </script>
    @endpush
@else
    <div class="row">
        <div class="col">
            <x-adminlte-card title="No Data To Display" theme="dark">
                @if (auth()->user()->is_admin)
                    <h4>Import Data from Clearion to see circuit and project data</h4>
                    <h6>Import a file below </h6>
                    <livewire:admin.import-new-data-form>
                @else
                    Contact the admin to upload data
                @endif

            </x-adminlte-card>
        </div>
    </div>
@endif
