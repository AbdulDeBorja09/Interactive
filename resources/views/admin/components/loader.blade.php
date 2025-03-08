<div id="loader">
    <img src="{{asset('../image/logo.png')}}" alt="LoaderLogo" />
    <h1>Calamba City Hall <br />Interactive Map</h1>
    <div class="dots-loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <p>Loading...</p>
    <div class="loader-bottom ">
        <div class="d-flex">
            <img class="nu-logo" src="{{asset('/image/NULogo.png')}}" alt="">
            <div class="text">
                <p>Powered By</p>
                <p>NU Laguna</p>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function() {
    setTimeout(() => {
        document.getElementById("loader").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
        }, 500);
    }, 1500); 
});
</script>