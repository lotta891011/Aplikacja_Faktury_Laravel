<x-app-layout>
    <div class="px-10 py-3 text-xl ">
        <div class="py-5 pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('contractor.index') }}"> Powrót</a>
        </div>
        <div class="text-xl font-medium text-black">
            <h2 class='font-large'>Pokaż kontrahenta</h2>
        </div>
    </div>
    <div class="mx-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black">     
        <div class="row">
            <div class="p-2">
                <div class="form-group">
                    <strong>Nazwa:</strong>
                    {{ $contractor->name }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>NIP:</strong>
                    {{ $contractor->nip }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Adres:</strong>
                    {{ $contractor->address }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Telefon:</strong>
                    {{ $contractor->phone }}
                </div>
            </div>
            <div class="p-2">
                <div class="form-group">
                    <strong>Mail:</strong>
                    {{ $contractor->email }}
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>