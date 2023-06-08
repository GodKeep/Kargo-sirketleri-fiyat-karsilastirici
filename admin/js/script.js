function showSection(sectionId) {
    var sections = document.getElementsByClassName("section");
    for (var i = 0; i < sections.length; i++) {
        sections[i].classList.remove("active");
    }
    var section = document.getElementById(sectionId);
    section.classList.add("active");
}

function openWhatsApp(number) {
    var url = "https://web.whatsapp.com/send?phone=" + number;
    window.open(url, "_blank");
}

// Başlangıçta ilk bölümü göster
showSection('iletisim-mesajlari');
