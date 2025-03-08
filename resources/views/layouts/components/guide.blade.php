<style>
    .modal {
        display: block;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80vw;
        padding: 15px;
        height: max-content;
        background: #217ace;
        border-radius: 25px;
        box-shadow: 3px 5px 7px rgba(0, 0, 0, 0.2);
        text-align: center;
        color: white;
    }

    .modal .content {
        background: #217ace;
        margin: 0;
        padding: 0;
        margin-top: 5px;
        padding-bottom: 7px;
    }

    .modal.active {
        display: block;
    }

    .modal h3 {
        font-size: 17px;
        font-weight: 600;
    }

    .modal p {
        text-align: start;
        font-size: 12px;
        font-weight: 400;
    }

    .modal .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        padding: 0px 10px
    }

    .modal .content button {
        background-color: white;
        color: #217ace;
        border-radius: 8px;
        padding: 5px 10px;
        border: 1px solid white;
        font-size: 14px;
        font-weight: 700;
    }

    .modal img {
        width: 100%;
        height: 100%;
        margin-bottom: 10px;
    }

    .exit-btn {
        margin: 0;
        padding: 0;
        margin-top: -5px;
        text-align: end;
        color: black;
        margin-right: 5px;
    }

    .exit-btn button {
        margin: 0;
        padding: 0;
        margin-right: 5px;

    }

    .exit-btn button i {
        font-size: 10px
    }
</style>




<section onload="checkModalDisplay()">
    <!-- Guide Modal -->
    <div id="guide-modal" class="modal">
        <div class="exit-btn">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="content">
            <div id="landing-content">
                <img src="{{asset('/image/guide/welcomepage.png')}}" alt="">
                <h3>Welcome to Calamba City Hall Interactive Map!</h3>
                <p>Explore the offices and facilities of Calamba City Hall with ease. Use the map to find locations, get
                    directions, and access important information. Let’s get started!</p>
                <button onclick="goToLanguageSelection()">Continue</button>
            </div>

            <div id="language-selection" style="display: none;">
                <img src="{{asset('/image/guide/select.png')}}" alt="">
                <h3>Choose your preferred language</h3>
                <p>Need help navigating City Hall? Choose your preferred language and our interactive map will guide
                    you!</p>
                <div class="buttons">
                    <button onclick="setLanguage('en')">English</button>
                    <button onclick="setLanguage('tl')">Tagalog</button>
                </div>
            </div>

            <div id="guide-content" style="display: none;">
                <img id="modal-image" src="{{ asset('images/step1.jpg') }}" alt="Step 1">
                <h3 id="modal-title">Guide</h3>
                <p id="modal-content">Step 1: Welcome to the guide!</p>
                <div class="buttons">
                    <button id="prev-btn" onclick="changeStep(-1)" disabled>Previous</button>
                    <button id="next-btn" onclick="changeStep(1)">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let step = 0;
    let selectedLanguage = "en";
    const steps = [
        { title: { en: "Step 1", tl: "Hakbang 1" }, en: "Step 1: Welcome to the guide!", tl: "Hakbang 1: Maligayang pagdating sa gabay!", img: "{{ asset('image/guide/step1.png') }}" },
        { title: { en: "Step 2", tl: "Hakbang 2" }, en: "Step 2: Learn how to use the feature.", tl: "Hakbang 2: Alamin kung paano gamitin ang tampok.", img: "{{ asset('image/guide/step1.png') }}" },
        { title: { en: "Step 3", tl: "Hakbang 3" }, en: "Step 3: You're all set!", tl: "Hakbang 3: Handa ka na!", img: "{{ asset('image/guide/step1.png') }}" }
    ];
    
    function checkModalDisplay() {
        let lastVisit = localStorage.getItem("lastVisit");
        let now = new Date().getTime();
        let sevenDays = 7 * 24 * 60 * 60 * 1000;
        
        if (!lastVisit || now - lastVisit > sevenDays) {
            localStorage.setItem("lastVisit", now);
            showModal();
        }
    }
    
    function showModal() {
        document.getElementById("guide-modal").classList.add("active");
    }
    
    function goToLanding() {
        document.getElementById("language-selection").style.display = "none";
        document.getElementById("landing-content").style.display = "block";
    }
    
    function goToLanguageSelection() {
        document.getElementById("landing-content").style.display = "none";
        document.getElementById("language-selection").style.display = "block";
    }
    
    function setLanguage(language) {
        selectedLanguage = language;
        document.getElementById("language-selection").style.display = "none";
        document.getElementById("guide-content").style.display = "block";
        updateContent();
    }
    
    function updateContent() {
        document.getElementById("modal-title").innerText = steps[step].title[selectedLanguage];
        document.getElementById("modal-content").innerText = steps[step][selectedLanguage];
        document.getElementById("modal-image").src = steps[step].img;
        document.getElementById("prev-btn").disabled = step === 0;
        document.getElementById("next-btn").innerText = step === steps.length - 1 ? "Close" : "Next";
    }
    
    function changeStep(direction) {
        step += direction;
        if (step < 0) {
            document.getElementById("guide-content").style.display = "none";
            document.getElementById("language-selection").style.display = "block";
            step = 0;
            return;
        }
        if (step >= steps.length) {
            document.getElementById("guide-modal").classList.remove("active");
            return;
        }
        updateContent();
    }
</script>