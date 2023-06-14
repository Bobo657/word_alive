

@if ($errors->any())
<div class="alert alert-danger solid alert-dismissible fade show">
    
    @foreach ($errors->all() as $error)
   {{ $error }}<br>
    @endforeach
   
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
</div>
@endif
