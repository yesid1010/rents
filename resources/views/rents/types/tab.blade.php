<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Abiertos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cerrados</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
{{-- cliente --}}
<div class="tab-pane  fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    @include('rents.types.abiertos')
</div> 
{{-- fin cliente  --}}

{{-- servicio --}}
<div class="tab-pane fade mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    @include('rents.types.cerrados')
</div>
{{-- fin servicio --}}

</div>
{{-- fin tap --}}