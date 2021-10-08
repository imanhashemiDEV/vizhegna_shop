@if ($errors->any())
    <div class="callout callout-danger">
        <ul  class="m-0 p-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
