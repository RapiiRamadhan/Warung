<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="moto col-md-4">
                <div class="footer-brand">
                    <img src="img/Logo.png" alt="Warung Makan Pak Bilal">
                    <a href="/">Warung Makan Pak Bilal</a>
                </div>
                <div class="kolom1">
                    <p>Aplikasi ini seperti memiliki dapur yang mudah dibawa di dalam saku Anda</p>
                </div>
                <div class="kolom2">
                    <p>Nikmati beragam makanan dan fitur khusus pelanggan di aplikasi Warung Makan Pak Bilal.</p>
                </div>
                <h6>Follow us:</h6>
                <div class="social-icons">
                    <ul>
                        <li><a href="https://web.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="tools col-md-4">
                <h5>Menu</h5>
                <div class="fitur">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('products.index') }}">Menu</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('cart.index') }}">Keranjang Belanja</a></li> <!-- Tambahkan tautan ini jika dibutuhkan -->
                    </ul>
                </div>
            </div>
            <div class="address col-md-4">
                <h5>Tentang Kami</h5>
                <div class="info">
                    <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i><p class="text-1">Pujasera Pasar Bulu, Jl. Suyudono No.10A</p>
                    <i class="fa-solid fa-phone" style="color: #ffffff;"></i><p class="text-2">+6285701329404</p>
                    <i class="fa-solid fa-envelope" style="color: #ffffff;"></i><p class="text-3"><a href="mailto:achmadbilal783@gmail.com">achmadbilal783@gmail.com</a></p>
                    <i class="fa-solid fa-clock" style="color: #ffffff;"></i><p class="text-4">Senin s/d Kamis dan Sabtu (11.00 - 16.30 WIB)<br>Jumat dan Minggu Libur</p>
                </div>                
            </div>
        </div>
        <div class="row">
            <img class="line" src="img/line3.jpg" />
            <div class="copyright col-md-12">
                <p>Copyright &copy; <?php echo date("Y"); ?> Warung Makan Pak Bilal | All Rights Reserved | 
                    <span>Terms and Conditions</span> |
                    <span>Privacy Policy</span>
                </p>
            </div>
        </div>
    </div>
</footer>
