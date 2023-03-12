<x-app-layout>
    <div class="px-10 py-3 text-xl ">
        <div class="pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Powrót</a>
        </div>
    </div>
    <div class="m-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black"> 
        <div class="p-2 text-xl font-medium text-black">
            <h2 class='font-large'>Dodaj nową Fakturę</h2>
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
                <div class="p-2">
                    <div class="form-group">
                        <strong>Numer:</strong>
                        <input type="text" name="number" class="form-control" placeholder="Numer">
                    </div>
                </div>
                <div class="p-2">
                    <strong>NIP Kontrahenta:</strong>
                    <select id="contractor_id" clas="form-control @error('contractor_id') is-invalid @enderror" name="contractor_id" required>
                        <option>Brak</option>
                        @foreach($contractors as $contractor)
                            <option value="{{$contractor->id}}">{{$contractor->nip}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Data wystawienia:</strong>
                        <input type="text" name="date_of_issue" class="form-control" placeholder="Data wystawienia">
                    </div>
                </div>
                <div class="p-2 hover:text-green-500 text-center">
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                </div>
            </div>
            
        </form>
    </div>
</x-app-layout>