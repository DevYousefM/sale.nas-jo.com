@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p style="display: flex;">{{ $error }}</p>
        @endforeach
    </div>
@endif
