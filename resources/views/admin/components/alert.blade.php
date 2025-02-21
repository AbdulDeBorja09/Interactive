<div class="error-container container ">
    @if(session('error'))
    <div class="w-50 alert error-alert d-flex" role="alert" id="errorAlert">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <b>Error!</b> {{ session('error') }}
        </div>
        <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Closes"></button>
    </div>
    @endif

    @if(session('success'))
    <div class="w-50 alert success-alert  fade show d-flex align-items-center w-100" role="alert" id="successAlert">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <b>Success!</b> {{ session('success') }}
        </div>
        <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Close"></button>
    </div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="w-50 alert error-alert d-flex" role="alert" id="errorAlert">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <b>Error!</b> {{ $error}}
        </div>
        <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Closes"></button>
    </div>
    @endforeach
    @endif

</div>
<script>
    function closeAlert(button) {
        let alertElement = button.closest('.alert'); 
        if (alertElement) {
            alertElement.style.transition = "opacity 0.5s, transform 0.5s";
            alertElement.style.opacity = "0";
            alertElement.style.transform = "translateY(-20px)";
            setTimeout(() => {
                alertElement.style.display = "none";
            }, 500);
        }
    }
</script>