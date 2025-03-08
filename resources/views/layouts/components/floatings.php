<section class="floor-title">
    <a id="dragger">
        <h1><span id="floor-title"></span><i id="icon-rotate" class="fa-solid fa-chevron-right"></i></h1>
    </a>
</section>

<button class="reset-button" id="clearBtn"><i class="fa-solid fa-arrows-rotate"></i></button>


<section id="roomlistbox" class="floor-room-list">
    <div class="div" id="room-list">
    </div>
    <div class="room-handle">
        <h1>Offices</h1>
    </div>
</section>

<section class="floors">
    <ul>
        <li><a href="#" data-floor="4F">4F</a></li>
        <li><a href="#" data-floor="3F">3F</a></li>
        <li><a href="#" data-floor="2F">2F</a></li>
        <li><a href="#" data-floor="GF">GF</a></li>
        <li><a href="#" data-floor="LG">LG</a></li>
    </ul>
</section>



<script>
    document.getElementById("clearBtn").addEventListener("click", function() {
        document.getElementById("end-hidden").value = "";
        document.getElementById("start-hidden").value = "";
        document.getElementById("start-search").value = "";
        document.getElementById("end-search").value = "";
    });
</script>