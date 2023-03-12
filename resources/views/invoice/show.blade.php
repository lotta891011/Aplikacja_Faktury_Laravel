<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Podgląd faktury</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numer:</strong>
                {{ $invoice->number }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nazwa Kontrahenta:</strong>
                {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP Kontrahenta:</strong>
                {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->nip }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adres:</strong>
                {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefon:</strong>
                {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data wystawienia:</strong>
                {{ $invoice->date_of_issue }}
            </div>
        </div>
        <table class="table table-bordered">
         <tr>
             <th>Symbol towaru</th>
             <th>Cena</th>
             <th>Ilość</th>
             <th>Podatek VAT</th>
             <th>Wartość</th>
         </tr>
         
            @if ($items = $invoice->items)
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->ware->symbol}}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ ($item->price)*0.23 }}</td>
                <td>{{ ($item->quantity)*(($item->price)+(($item->price)*0.23)) }}</td>
            </tr>
            @endforeach  
            @endif
        </table>
    </div>
</x-app-layout>