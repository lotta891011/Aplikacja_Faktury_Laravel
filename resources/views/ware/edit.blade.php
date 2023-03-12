
<x-app-layout>
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Edytuj informacje o towarze</h2>
               </div>
               <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('ware.index') }}"> Powrót</a>
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
     
       <form action="{{ route('ware.update',$ware->id) }}" method="POST">
           @csrf
           @method('PUT')
      
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Nazwa:</strong>
                       <input type="text" name="name" value="{{ $ware->name }}" class="form-control" placeholder="Nazwa">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Symbol:</strong>
                        <input type="text" name="symbol" value="{{ $ware->symbol }}" class="form-control" placeholder="Symbol">
                    </div>
                </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Zatwierdź</button>
               </div>
           </div>
      
       </form>
</x-app-layout>