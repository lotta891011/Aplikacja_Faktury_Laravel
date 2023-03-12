<x-app-layout>
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Edytuj pozycję</h2>
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
     
       <form action="{{ route('item.update',$item->id) }}" method="POST">
           @csrf
           @method('PUT')
      
            <div class="row">
            <div>
            <strong>Symbol towaru:</strong>
                <select id="ware_id" clas="form-control @error('ware_id') is-invalid @enderror" name="ware_id" required>
                    <option>Brak</option>
                    @foreach($ware as $ware)
                        <option value="{{$ware->id}}">{{$ware->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cena:</strong>
                        <input type="text" name="price" value="{{ $item->price }}" class="form-control" placeholder="Cena">
                    </div>
                </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ilość:</strong>
                        <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control" placeholder="Ilość">
                    </div>
                </div>
                <div>
                <strong>Numer faktury:</strong>
                <select id="invoice_id" clas="form-control @error('invoice_id') is-invalid @enderror" name="invoice_id" required>
                    <option>Brak</option>
                    @foreach($invoices as $invoice)
                        <option value="{{$invoice->id}}">{{$invoice->number}}</option>
                    @endforeach
                </select>
            </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Zatwierdź</button>
               </div>
           </div>
      
       </form>
<x-app-layout>