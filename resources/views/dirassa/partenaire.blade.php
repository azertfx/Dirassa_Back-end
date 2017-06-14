<!-- partenaire -->
    <hr class="bottom_lign_shadow" id="eee">
    <div class="partenair" id="eee">
      <div class="container">
        <div id="partenaire" class="row owl-carousel partenaire_m_bot">
          @foreach($partners as $partner)
          <div class="col s12">
            <img src="{{ASSET}}/images/{{$partner->logo}}" alt="{{$partner->name}}">
          </div>
          @endforeach
        </div>
      </div>
    </div>