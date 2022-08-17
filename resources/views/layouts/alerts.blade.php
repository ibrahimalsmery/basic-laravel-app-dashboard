@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" onclick="this.parentNode.remove()">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Errors</h5>
        @foreach ($errors->all() as $key => $e)
            {{ $e }}<br>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" onclick="this.parentNode.remove()">×</button>
        <h5><i class="icon fas fa-check"></i> Errors</h5>
        {{ session('success') }}
    </div>
@endif
