<x-app-layout>
    <div class="px-10 py-3 text-xl">
        <div class="pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
        </div>
    </div>
    <div class="m-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black"> 
        <div class="p-2 text-xl font-medium text-black">
            <h2 class='font-large'>Edytuj fakturę</h2>
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
               <div class="p-2">
                   <div class="form-group">
                       <strong>Numer:</strong>
                       <input type="text" name="number" value="{{ $invoice->number }}" class="form-control" placeholder="Numer">
                   </div>
                </div>
                <div class="p-2">
                    <div>
                        <strong>NIP Kontrahenta:</strong>
                        <select id="contractor_id" class="form-control @error('contractor_id') is-invalid @enderror" name="contractor_id" required>
                            <option value="{{$invoice->contractor->id}}">{{$invoice->contractor->nip}}</option>
                            @foreach($contractors as $contractor)
                                <option value="{{$contractor->id}}">{{$contractor->nip}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Data wystawienia:</strong>
                        <input type="text" name="date_of_issue" value="{{ $invoice->date_of_issue }}" class="form-control" placeholder="Data wystawienia">
                    </div>
                </div>
                <div class="p-2 hover:text-green-500">
                    <button type="submit" class="px-3 w-fit rounded-lg border-2 border-black">Zatwierdź</button>
                </div>
            </div>
        </form>
        <div class ="p-6">
            <table class="text-sm w-fit text-white dark:text-black">
                <div class="pull-right hover:text-blue-500">
                    <button onclick="addElement()">Dodaj pozycję</button>
                </div> 
                <thead class="text-black uppercase  dark:bg-gray-700 dark:text-white border-2 border-black">
                    <tr>
                        <th class="px-6 py-3">Nazwa towaru</th>
                        <th class="px-6 py-3">Cena</th>
                        <th class="px-6 py-3">Ilość</th>
                        <th class="px-6 py-3">Podatek VAT</th>
                        <th class="px-6 py-3">Wartość</th>
                        <th class="px-6 py-3">Akcja</th>
                    </tr>
                </thead> 
                <?php $sum_quantity = 0?>
                <?php $sum_VAT = 0?>
                <?php $sum_value = 0; ?>
                @foreach ($invoice->items as $item)
                <tr class="border-2 border-black hover:bg-gray-200">
                    <td class="px-6 py-3">{{ $item->ware->symbol }}</td>
                    <td class="px-6 py-3">{{ $item->price }}</td>
                    <td class="px-6 py-3">{{ $item->quantity }}</td>
                    <td class="px-6 py-3">{{ ($item->price)*0.23 }}</td>
                    <td class="px-6 py-3">{{ ($item->quantity)*(($item->price)+(($item->price)*0.23)) }}</td>
                    <td class="px-6 py-3">
                        <form action="{{ route('item.destroy',$item->id) }}" method="POST">
            
                            <a class="btn btn-primary hover:text-blue-500" href="{{ route('item.edit',$item->id) }}">Edytuj</a>
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger hover:text-red-500">Usuń</button>
                        </form> 
                    </td>
                </tr>
                <?php $sum_quantity += $item->quantity ?>
                <?php $sum_VAT += ($item->price)*0.23 ?>
                <?php $sum_value += ($item->quantity)*(($item->price)+(($item->price)*0.23)) ?>
                @endforeach
                
                <form action="{{ route('item.store') }}" method="POST">
                
                    @csrf
                    <tr id='element'class="hidden">
                        <td>
                            <select id="ware_id" class="form-control @error('ware_id') is-invalid @enderror" name="ware_id" required>
                                <option>Brak</option>
                                @foreach($wares as $ware)
                                    <option value="{{$ware->id}}">{{$ware->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="price" class="form-control" placeholder="Cena">
                        </td>
                        <td>
                            <input type="text" name="quantity" class="form-control" placeholder="Ilość">
                        </td>
                        <td>
                            <div class="col-xs-12 col-sm-12 col-md-12 hidden">
                                
                                <input type="text" name="invoice_id" class="form-control" value="{{ $invoice->id }}">
                                
                            </div>
                        </td>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary">Zatwierdź</button>
                        </td>
                    </tr> 
                </form>
                  
                <div class="hidden"> 
                <tr>
                    <td><b>Suma:</b></td>
                    <td></td>
                    <td></td>
                    <td><b>{{round($sum_VAT,2)}}</b></td>
                    <td><b>{{round($sum_value,2)}}</b></td>
                    <td></td>
                </tr>
                </div>     
            </table>
        </div>
    </div>    
    <script>
        var x = document.getElementById("element");
        
        console.log(x)
        function addElement(){
            
            x.classList.remove("hidden")
            console.log(x)
        }
    </script>
</x-app-layout>