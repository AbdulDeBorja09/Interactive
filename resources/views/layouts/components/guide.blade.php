<button class="guide-toggler" onclick="showModal()"><i class=" fa-solid fa-question"></i></button>
<section class="guides" onload="checkModalDisplay()">
    <!-- Guide Modal -->
    <div id="guide-modal" class="modal">
        <div class="exit-btn">
            <a href="javascript:void(0);" onclick="closeModal()" style="color: black">
                <i class="fa-solid fa-circle-xmark"></i>
            </a>
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
                <img id="modal-image" src="" alt="Step 1">
                <h3 id="modal-title"></h3>
                <p id="modal-content"></p>
                <div class="buttons">
                    <button id="prev-btn" onclick="changeSteps(-1)" disabled>Previous</button>
                    <button id="next-btn" onclick="changeSteps(1)">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let step = 0;
    let selectedLanguage = "en";
    const steps = [
        { title: { en: "First Up: Choose your Floor!", tl: "Una: Piliin ang Iyong Palapag!" }, en: "To view different levels of City Hall, look for the buttons labeled LG, GF, 2F, 3F, and 4F.  Tap the button that corresponds to the floor you want to see.", tl: "Pindutin ang button na LG, GF, 2F, 3F, o 4F upang makita ang bawat palapag ng City Hall. Piliin ang nais mong palapag.", img: "{{ asset('image/guide/step1.png') }}" },
        { title: { en: "Identify Details", tl: "Kilalanin ang Opisina" }, en: "Tap on any labeled room to view details about the office located there. You'll find information such services offered and more!", tl: "Pindutin ang label ng silid upang makita ang detalye ng opisina. Makikita rin ang mga serbisyong inaalok nito.", img: "{{ asset('image/guide/step2.png') }}" },
        { title: { en: "Office Details", tl: "Detalye ng Opisina" }, en: "Want to know more about an office? Tap on a room to view its details and easily set it as your starting point or destination for directions.", tl: "Gusto mo bang malaman ang higit pa tungkol sa isang opisina? Pindutin ang silid upang makita ang detalye nito at itakda bilang panimulang punto o destinasyon.", img: "{{ asset('image/guide/step3.png') }}" },
        { title: { en: "Quick List", tl: "Mabilisang Listahan ng mga Opisina" }, en: 'See a list of all Lower Ground offices by clicking "Lower Ground" at the top left. Then, tap any office on the list to see its location and details.', tl: "I-click ang 'Lower Ground' sa kaliwang itaas upang makita ang listahan ng opisina. Pindutin ang opisina upang makita ang lokasyon at detalye nito.", img: "{{ asset('image/guide/step4.png') }}" },
        { title: { en: "Find your way", tl: "Hanapin ang Daan" }, en: 'Enter your starting location and desired destination within City Hall in the search bars. Then, tap "Get directions" to view the fastest route on the map.', tl: "Ilagay ang iyong panimulang lokasyon at nais na destinasyon sa loob ng City Hall sa mga search bar. Pagkatapos, pindutin ang 'Kumuha ng direksyon' upang makita ang pinakamabilis na ruta sa mapa.", img: "{{ asset('image/guide/step5.png') }}" },
        { title: { en: "Get directions with suggestions", tl: "Kumuha ng Direksyon na may Mungkahi" }, en: 'Drag this panel up to reveal a list of offices as you type your starting point or destination. Select an office from the suggestions, then tap "Get directions" to see the route within Calamba City Hall.', tl: "I-drag pataas ang panel upang ipakita ang listahan ng opisina habang nagta-type. Piliin ang opisina at pindutin ang 'Kumuha ng direksyon' upang makita ang ruta.", img: "{{ asset('image/guide/step6.png') }}" },
        { title: { en: "Follow the Path: Directions Displayed", tl: "Sundan ang Daan: Ipinapakita ang Direksyon" }, en: "Once you've entered your starting point and destination, the map will display the quickest route. Follow the highlighted path to reach your desired office within City Hall.", tl: "Ilagay ang panimulang punto at destinasyon upang makita ang pinakamabilis na ruta. Sundan ang naka-highlight na daan patungo sa opisina.", img: "{{ asset('image/guide/step7.png') }}" },  
        { title: { en: "That’s all thank you", tl: "Iyon lamang po, salamat!" }, en: "Congratulations! You've completed the tutorial. Now go explore and discover all that Calamba City Hall has to offer.", tl: "Congratulations! Natapos mo na ang tutorial. Ngayon, mag-explore at tuklasin ang lahat ng iniaalok ng Calamba City Hall.", img: "{{ asset('image/guide/step8.png') }}" },            
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
        goToLanding();
    }
    
    function closeModal() {
        document.getElementById("guide-modal").classList.remove("active");
        goToLanding();
    }
    
    function goToLanding() {
        document.getElementById("language-selection").style.display = "none";
        document.getElementById("guide-content").style.display = "none";
        document.getElementById("landing-content").style.display = "block";
        step = 0;
    }
    
    function goToLanguageSelection() {
        document.getElementById("landing-content").style.display = "none";
        document.getElementById("language-selection").style.display = "block";
    }
    
    function setLanguage(language) {
        selectedLanguage = language;
        document.getElementById("language-selection").style.display = "none";
        document.getElementById("guide-content").style.display = "block";
        step = 0;
        updateModalContent();
    }
    
    function updateModalContent() {
        document.getElementById("modal-title").innerText = steps[step].title[selectedLanguage];
        document.getElementById("modal-content").innerText = steps[step][selectedLanguage];
        document.getElementById("modal-image").src = steps[step].img;
        document.getElementById("prev-btn").disabled = step === 0;
        document.getElementById("next-btn").innerText = step === steps.length - 1 ? "Close" : "Next";
    }
    
    function changeSteps(direction) {
        step += direction;
        if (step < 0) {
            goToLanguageSelection();
            return;
        }
        if (step >= steps.length) {
            closeModal();
            return;
        }
        updateModalContent();
    }
</script>