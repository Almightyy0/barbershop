function updateCountdown() {
    var countdown = localStorage.getItem("countdown") || 60;
    // Dapatkan elemen countdown
    var countdownElement = document.getElementById("countdown");

    // Tampilkan hitungan mundur di dalam elemen countdown
    countdownElement.innerHTML = countdown;

    // Kurangi countdown setiap detik
    countdown--;

    localStorage.setItem("countdown", countdown);

    if (countdown < 0) {
        clearInterval(countdownInterval);

        // Dapatkan elemen <p> yang ada

        // Buat elemen <a>
        var linkElement = document.createElement("a");
        linkElement.href = "/resend-otp"; // Ganti dengan URL yang sesuai
        linkElement.textContent = "Kirim ulang"; // Ganti dengan teks yang sesuai

        // Sisipkan elemen <a> setelah elemen <p>
        countdownElement.innerHTML = '';
        countdownElement.appendChild(linkElement);
        localStorage.removeItem("countdown");



    }

}

// Panggil fungsi updateCountdown setiap detik
var countdownInterval = setInterval(updateCountdown, 1000);