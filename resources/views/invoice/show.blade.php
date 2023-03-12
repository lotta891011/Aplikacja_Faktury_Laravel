<x-app-layout>
    <div class="px-10 py-3 text-xl ">
        <div class="pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
        </div>
    </div>
    <div class="m-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black"> 
        <div class="p-2 font-medium text-black text-center">
            <strong>Faktura nr {{ $invoice->number }}</strong>
        </div> 

        <div class="row">
            <div class="p-2">
                <div class="form-group">
                    <strong>Nazwa Kontrahenta:</strong>
                    {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->name }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>NIP Kontrahenta:</strong>
                    {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->nip }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Adres:</strong>
                    {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->address }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Telefon:</strong>
                    {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->phone }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>E-mail:</strong>
                    {{ DB::select('select * from contractors where id = :id', ['id' => $invoice->contractor_id])[0]->email }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Data wystawienia:</strong>
                    {{ $invoice->date_of_issue }}
                </div>
            </div>
            <div  class ="p-6">
                <table class="text-sm w-fit text-white dark:text-black">
                    <thead class="text-black uppercase  dark:bg-gray-700 dark:text-white border-2 border-black">
                        <tr>
                            <th class="px-6 py-3">Symbol towaru</th>
                            <th class="px-6 py-3">Cena</th>
                            <th class="px-6 py-3">Ilość</th>
                            <th class="px-6 py-3">Podatek VAT</th>
                            <th class="px-6 py-3">Wartość</th>
                        </tr>
                    </thead>
                    @if ($items = $invoice->items)
                    @foreach ($items as $item)
                    <tr  class="border-2 border-black hover:bg-gray-200">
                        <td class="px-6 py-3">{{ $item->ware->symbol}}</td>
                        <td class="px-6 py-3">{{ $item->price }}</td>
                        <td class="px-6 py-3">{{ $item->quantity }}</td>
                        <td class="px-6 py-3">{{ ($item->price)*0.23 }}</td>
                        <td class="px-6 py-3">{{ ($item->quantity)*(($item->price)+(($item->price)*0.23)) }}</td>
                    </tr>
                    @endforeach  
                    @endif
                </table>
            </div>
        </div>
    </div>    
</x-app-layout>