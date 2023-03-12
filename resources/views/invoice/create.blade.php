
<x-app-layout>
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Dodaj nową Fakturę</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
          </div>
      </div>
  </div>
     
  @if ($errors->any())
      <div class="alert alert-danger">
          There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
     
  <form action="{{ route('invoice.store') }}" method="POST">
      @csrf
    
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Numer:</strong>
                  <input type="text" name="number" class="form-control" placeholder="Numer">
              </div>
          </div>
          <div>
          
            <div>
            <strong>NIP Kontrahenta:</strong>
                <select id="contractor_id" clas="form-control @error('contractor_id') is-invalid @enderror" name="contractor_id" required>
                    <option>Brak</option>
                    @foreach($contractors as $contractor)
                        <option value="{{$contractor->id}}">{{$contractor->nip}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Data wystawienia:</strong>
                  <input type="text" name="date_of_issue" class="form-control" placeholder="Data wystawienia">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Zatwierdź</button>
          </div>
      </div>
    
  </form>
</x-app-layout>