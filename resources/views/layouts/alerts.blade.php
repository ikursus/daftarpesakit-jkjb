@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Sekiranya ada session bernama mesej-berjaya, paparkan mesej tersebut --}}
@if (session('mesej-berjaya'))
<div class="alert alert-success">
    {{ session('mesej-berjaya') }}
</div>
@endif
