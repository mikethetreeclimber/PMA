<div>
    <div class="row">
      @isset($totalWorksites)
      <div class="col">

        <x-adminlte-info-box title="Authorized" text="{{ $totalAuthorized }} / {{ $totalWorksites }}"
            icon="fas fa-lg fa-tasks text-success" theme="success" icon-theme="dark"
            progress="{{ round(($totalAuthorized / $totalWorksites) * 100, 2) }}" progress-theme="dark"
            description="{{ round(($totalAuthorized / $totalWorksites) * 100, 2) }}% of the worksites are Authorized" />
    </div>
    <div class="col">

        <x-adminlte-info-box title="Refused" text="{{ $totalRefused }} / {{ $totalWorksites }}"
            icon="fas fa-lg fa-tasks text-danger" theme="danger" icon-theme="dark"
            progress="{{ round(($totalRefused / $totalWorksites) * 100, 2) }}" progress-theme="dark"
            description="{{ round(($totalRefused / $totalWorksites) * 100, 2) }}% of the worksites are Refused" />
    </div>
    <div class="col">

        <x-adminlte-info-box title="Pending" text="{{ $totalPending }} / {{ $totalWorksites }}"
            icon="fas fa-lg fa-tasks text-info" theme="info" icon-theme="dark"
            progress="{{ round(($totalPending / $totalWorksites) * 100, 2) }}" progress-theme="dark"
            description="{{ round(($totalPending / $totalWorksites) * 100, 2) }}% of the worksites are pending" />

    </div>
      @endisset

    </div>
</div>