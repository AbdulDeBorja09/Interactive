<div id="loader">
    <img src="{{asset('../image/logo.png')}}" alt="LoaderLogo" />
    <h1>Calamba City Hall <br />Interactive Map</h1>
    <div class="dots-loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <p>Loading...</p>
</div>

<script>
    window.addEventListener("load", function() {
    setTimeout(() => {
        document.getElementById("loader").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
        }, 500);
    }, 3000); 
});


</script>