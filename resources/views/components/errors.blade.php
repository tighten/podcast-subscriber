@if (count($errors) > 0)
    <div class="mb-4">
        <strong>Whoops!</strong> There were problems with input:
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
