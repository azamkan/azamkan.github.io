const modeToggle = document.getElementById("mode-mode");
const body = document.body;

modeToggle.addEventListener("click", () => {
    if (body.classList.contains("dark-mode")) {
        body.classList.remove("dark-mode");
        modeToggle.innerText = "Dark Mode";
    } else {
        body.classList.add("dark-mode");
        modeToggle.innerText = "Light Mode";
    }
});

function peringatannav(){
    alert("menu akan di tambahkan nanti")
}

// Ambil semua elemen dengan class 'koleksi-card'
const koleksiCards = document.querySelectorAll('.koleksi-card');

// Fungsi untuk menampilkan pesan
function tampilkanPesan(e) {
    // Buat elemen pesan
    const pesan = document.createElement('div');
    pesan.className = 'balon-pesan';
    pesan.innerText = 'Rincian Koleksi akan segera hadir';

    // Atur posisi pesan
    pesan.style.position = 'absolute';
    pesan.style.bottom = '0';
    pesan.style.left = '50%';
    pesan.style.transform = 'translateX(-50%)';
    pesan.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
    pesan.style.color = 'white';
    pesan.style.padding = '8px';
    pesan.style.borderRadius = '4px';

    // Tempelkan pesan ke dalam elemen yang diklik
    e.currentTarget.appendChild(pesan);
}

// Fungsi untuk menyembunyikan pesan
function sembunyikanPesan(e) {
    // Cari elemen pesan dalam elemen yang diklik dan hapus pesannya
    const pesan = e.currentTarget.querySelector('.balon-pesan');
    if (pesan) {
        pesan.remove();
    }
}

// Tambahkan event listener ke setiap elemen koleksi-card
koleksiCards.forEach(card => {
    card.addEventListener('mouseover', tampilkanPesan);
    card.addEventListener('mouseout', sembunyikanPesan);
});
