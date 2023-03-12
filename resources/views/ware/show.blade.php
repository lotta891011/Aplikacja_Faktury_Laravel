<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Pokaż informacje o towarze</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ware.index') }}"> Powrót</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nazwa:</strong>
                {{ $ware->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Symbol:</strong>
                {{ $ware->symbol }}
            </div>
        </div>
    </div>
</x-app-layout>