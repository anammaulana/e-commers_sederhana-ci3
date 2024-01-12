<footer class="p-3 mt-4">
    <div class="row">
        <p>&copy; 2024 Toko Simple. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Dark mode toggle logic
document.getElementById('darkModeToggle').addEventListener('click', function() {
    // Toggle kelas 'navbar-dark' dan 'bg-dark' pada elemen navbar
    document.querySelector('nav').classList.toggle('bg-dark');

    // Toggle kelas 'dark-mode' pada body
    document.body.classList.toggle('dark-mode');
    
    // Toggle kelas 'text-light' pada elemen-elemen yang ingin diubah warnanya
    var lightTextElements = document.querySelectorAll('.text-light');
    lightTextElements.forEach(function(element) {
        element.classList.toggle('text-light');
    });

    // Simpan preferensi tema ke localStorage
    var isDarkMode = document.body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
});

// Periksa apakah preferensi tema sudah disimpan di localStorage
var isDarkMode = localStorage.getItem('darkMode') === 'enabled';

// Terapkan tema sesuai dengan preferensi yang disimpan
if (isDarkMode) {
    document.querySelector('nav').classList.add('navbar-dark', 'bg-dark');
    document.body.classList.add('dark-mode');
}

</script>
</body>

</html>