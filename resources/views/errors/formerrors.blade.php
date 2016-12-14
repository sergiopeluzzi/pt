@if($errors->any())
    <ul class="alert bg-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </ul>
@endif