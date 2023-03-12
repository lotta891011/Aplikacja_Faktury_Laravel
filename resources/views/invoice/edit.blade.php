<x-app-layout>
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Edytuj Fakturę</h2>
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
     
       <form action="{{ route('invoice.update',$invoice->id) }}" method="POST">
           @csrf
           @method('PUT')
      
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Numer:</strong>
                       <input type="text" name="number" value="{{ $invoice->number }}" class="form-control" placeholder="Numer">
                   </div>
               </div>
               <div>
                <div>
                <strong>NIP Kontrahenta:</strong>
                <select id="contractor_id" class="form-control @error('contractor_id') is-invalid @enderror" name="contractor_id" required>
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
                        <input type="text" name="date_of_issue" value="{{ $invoice->date_of_issue }}" class="form-control" placeholder="Data wystawienia">
                    </div>
                </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Zatwierdź</button>
               </div>
        </form>

    <table class="table table-bordered">
         <tr>
             <th>Nazwa towaru</th>
             <th>Cena</th>
             <th>Ilość</th>
             <th>Podatek VAT</th>
             <th>Wartość</th>
             <th width="280px">Akcja</th>
         </tr>

               
               @foreach ($invoice->items as $item)
                <tr>
                    <td>{{ $item->ware->symbol }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ ($item->price)*0.23 }}</td>
                    <td>{{ ($item->quantity)*(($item->price)+(($item->price)*0.23)) }}</td>
                    <td>
                 <form action="{{ route('item.destroy',$item->id) }}" method="POST">
     
                     <a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">Edytuj</a>
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Usuń</button>
                        </form> 
             </td>
                </tr>
                @endforeach  
                </table>

               <div class="pull-right">
                 <a class="btn btn-success" href="{{route('item.create')}}"> Dodaj pozycję</a>
               </div>
           </div>
</x-app-layout>