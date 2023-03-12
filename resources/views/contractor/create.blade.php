
<x-app-layout>
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Dodaj nowego Kontrahenta</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('contractor.index') }}"> Powrót</a>
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
     
  <form action="{{ route('contractor.store') }}" method="POST">
      @csrf
    
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nazwa:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Nazwa">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>NIP:</strong>
                  <input type="text" name="nip" class="form-control" placeholder="NIP">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Adres:</strong>
                  <input type="text" name="address" class="form-control" placeholder="Adres">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Telefon:</strong>
                  <input type="text" name="phone" class="form-control" placeholder="Telefon">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Mail:</strong>
                  <input type="text" name="email" class="form-control" placeholder="Mail">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Zatwierdź</button>
          </div>
      </div>
     
  </form>
</x-app-layout>