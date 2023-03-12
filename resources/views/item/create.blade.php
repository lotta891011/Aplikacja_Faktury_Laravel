
<x-app-layout>
    <div class="px-10 py-3 text-xl ">
        <div class="pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
        </div>
    </div>
    <div class="m-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black"> 
        <div class="p-2 text-2xl font-medium text-black">
            <h2 class='font-large'>Dodaj nową pozycję</h2>
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
        <form action="{{ route('item.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="p-2">
                    <strong>Nazwa towaru:</strong>
                    <select id="ware_id" clas="form-control @error('ware_id') is-invalid @enderror" name="ware_id" required>
                        <option>Brak</option>
                        @foreach($ware as $ware)
                            <option value="{{$ware->id}}">{{$ware->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Cena:</strong>
                        <input type="text" name="price" class="form-control" placeholder="Cena">
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Ilość:</strong>
                        <input type="text" name="quantity" class="form-control" placeholder="Ilość">
                    </div>
                </div>
                <div class="p-2">
                    <strong>Numer faktury:</strong>
                    <select id="invoice_id" clas="form-control @error('invoice_id') is-invalid @enderror" name="invoice_id" required>
                        <option>Brak</option>
                        @foreach($invoices as $invoice)
                            <option value="{{$invoice->id}}">{{$invoice->number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 hover:text-green-500 text-center">
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                </div>
            </div>
            
        </form>
    </div>
</x-app-layout>