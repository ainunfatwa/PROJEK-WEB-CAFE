<?php
session_start();

if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Cafe</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="registrasi.html">
    <link rel="stylesheet" href="ulasan.html">
    <script src="dataregist.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header>
        <a href="#" class="logo">Reservasi Online Cafe ITH</a>
        <ul class="navbar">
            <li><a href="#home" id="home-link">Home</a></li>
            <li><a href="#about" id="about-link">About</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Menu</a>
                <div class="dropdown-content">
                    <a href="#food" id="food-link">Food</a>
                    <a href="#drink" id="drink-link">Drink</a>
                </div>
            </li>
            <li><a href="#" id="contact-link">Contact</a></li>
            <li><a href="logout.php">Logout</a></li> <!-- Tombol Logout -->
        </ul>
    </header>   
    <section class="home" id="home">
        <div class="home-text">
            <h1>Cafe Mahasiswa</h1>
            <h2>tell us your favorite menu at our cafe</h2>
            <h3>OPEN</h3>
            <h4>Monday-Sunday / 08.00 - 17.00 </h4>
            <a href="registrasi.html" class="btn">Enter Your Order</a>
            <a href="ulasan.html" class="btn-p">Penilaian & ulasan</a>
        </div>   
    </section>
    <section class="about" id="about-section" style="display: none;">
        <div class="about-container">
            <h2>About Us</h2>
            <p>Our cafe was established in 2024 with the aim of being
            a comfortable and inspiring gathering place for the
            student community. We offer a menu of food and drinks
            to suit the needs and tastes of students, made with fresh 
            ingredients and the best selection.</p>
                <p>Here, you can enjoy a delicious breakfast or lunch 
                while relaxing in a comfortable room and supported by adequate
                facilities for learning and creative needs. We also provide
                a selection of coffee, tea and fresh drinks that can accompany 
                your productive time.</p>
        </div>
    </section>
    <section class="contact-info" id="contact-section" style="display: none;">
        <div class="contact-container">
            <h2>Contact Information</h2>
            <p>Address: Jalan Balai Kota</p>
            <p>Email: CafeITH@gmail.com</p>
            <p>Phone: +6281234567876</p>
            <p>Operational Hours: Mon-Sun / 08 AM - 05 PM</p>
        </div> 
    </section>

    <form id="Registra-Online" style="display:none">
        <fieldset>
          <legend>Data Pribadi</legend>
          <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-input" />
          </div>
          <div>  
            <label for="tanggal_reservasi">Tanggal Reservasi:</label>
            <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" required>
          </div>
          <div>
            <label for="waktu">Waktu:</label>
            <input type="time" id="waktu" name="waktu" required>
          </div>
          <div>
            <label for="jumlah_orang">Jumlah Orang:</label>
            <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" required>
          </div>
          <div>
            <label for="no_telp">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan nomor WA anda" class="form-input" />
          </div>
          <div>
            <button type="reset" name="reset"><i class="fas fa-times"></i> BATAL</button>
            <button type="submit" name="submit"><i class="fas fa-floppy-disk"></i> PESAN SEKARANG</button>
          </div>
        </fieldset>
    </form>
    <div id="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Reservasi</th>
                    <th>Waktu</th>
                    <th>Jumlah Orang</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>

    <script> 
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan event listener untuk link "About"
            document.getElementById('about-link').addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link
                document.getElementById('about-section').style.display = 'block';
                document.getElementById('home').style.display = 'none'; 
                document.getElementById('contact-section').style.display = 'none';
                clearHomeText();
            });

            // Menambahkan event listener untuk link "Contact"
            document.getElementById('contact-link').addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link
                document.getElementById('contact-section').style.display = 'block';
                document.getElementById('home').style.display = 'none'; 
                document.getElementById('about-section').style.display = 'none';
                clearHomeText();
            });

            // Menambahkan event listener untuk link "Home"
            document.getElementById('home-link').addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link
                document.getElementById('home').style.display = 'block'; // Menampilkan informasi "Home"
                document.getElementById('about-section').style.display = 'none';
                document.getElementById('contact-section').style.display = 'none';
                restoreHomeText();
            });

            // Fungsi untuk menghapus teks di bagian home
            function clearHomeText() {
                document.querySelector('.home-text h1').innerText = '';
                document.querySelector('.home-text h2').innerText = '';
                document.querySelector('.home-text h3').style.display = 'none'; // Menyembunyikan teks OPEN
                document.querySelector('.home-text h4').style.display = 'none'; // Menyembunyikan teks Operational Hours
                document.querySelector('.home-text .btn').style.display = 'none'; // Menyembunyikan tombol Enter Your Order
            }

            // Fungsi untuk mengembalikan teks di bagian home
            function restoreHomeText() {
                document.querySelector('.home-text h1').innerText = 'Cafe Mahasiswa';
                document.querySelector('.home-text h2').innerText = 'tell us your favorite menu at our cafe';
                document.querySelector('.home-text h3').style.display = 'block';
                document.querySelector('.home-text h4').style.display = 'block';
                document.querySelector('.home-text .btn').style.display = 'block';
            }
        });

        $(document).on("click", ".toggle-password", function() {
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
                $(this).removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.attr("type", "password");
                $(this).removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });

        $(document).ready(function() {
            var daftar_regist = []; // Pastikan daftar_regist terdefinisi dan berisi data

            for (let i = 0; i < daftar_regist.length; i++) {
                $("#tbody").append(
                    "<tr id='tr-" + daftar_regist[i].id + "'>" +
                    "<td>" + daftar_regist[i].nama + "</td>" +
                    "<td>" + daftar_regist[i].tanggal_reservasi + "</td>" +
                    "<td>" + daftar_regist[i].waktu + "</td>" +
                    "<td>" + daftar_regist[i].jumlah_orang + "</td>" +
                    "<td>" + daftar_regist[i].no_telp + "</td>" +
                    "<td><i class='fas fa-eye'></i><i class='fas fa-pencil' data-id='" + daftar_regist[i].id + "'></i><i class='fas fa-trash' data-id='" + daftar_regist[i].id + "'></i></td></tr>"
                );
            }

            // Menghapus baris mahasiswa saat tombol "Hapus" ditekan
            $("#tbody").on("click", ".fa-trash", function() {
                $(this).closest("tr").remove();
            });

            // Mengisi formulir saat tombol "Edit" ditekan
            $("#tbody").on("click", ".fa-pencil", function() {
                var customerid = $(this).attr("data-id");
                var customer = daftar_regist.find(cst => cst.id == customerid);
                $('#nama').val(customer.nama);
                $('#tanggal_reservasi').val(customer.tanggal_reservasi);
                $('#waktu').val(customer.waktu);
                $('#jumlah_orang').val(customer.jumlah_orang);
                $('#no_telp').val(customer.no_telp);
                $('#Registra-Online').show();
                $('#table-container').hide();
            });

            // Tampilkan kembali tabel saat tombol "Batal" ditekan
            $('button[type="reset"]').click(function() {
                $('#Registra-Online').hide();
                $('#table-container').show();
            });

            // Tangani submit form
            $('#Registra-Online').submit(function(e) {
                e.preventDefault();
                var nama = $('#nama').val();
                var tanggal_reservasi = $('#tanggal_reservasi').val();
                var waktu = $('#waktu').val();
                var jumlah_orang = $('#jumlah_orang').val();
                var no_telp = $('#no_telp').val();

                console.log('Form Submitted');
                console.log('Nama:', nama);
                console.log('Tanggal Reservasi:', tanggal_reservasi);
                console.log('Waktu:', waktu);
                console.log('Jumlah Orang:', jumlah_orang);
                console.log('No Telp:', no_telp);

                $("#tbody").append(
                    "<tr><td>" + nama + "</td><td>" + tanggal_reservasi + "</td><td>" + waktu + "</td><td>" + jumlah_orang + "</td><td>" + no_telp + "</td><td><i class='fas fa-eye'></i><i class='fas fa-pencil'></i><i class='fas fa-trash'></i></td></tr>"
                );

                // Kosongkan formulir setelah submit
                $('#Registra-Online')[0].reset();
                $('#Registra-Online').hide();
                $('#table-container').show();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Log untuk memastikan elemen ada dan nilai diambil dengan benar
            console.log('Form Loaded');

            // Menambahkan event listener untuk link "Enter Your Order"
            document.querySelector('.btn').addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link
                document.getElementById('Registra-Online').style.display = 'block';
                document.getElementById('home').style.display = 'none';
            });
        });
    </script>
</body>
</html>
<?php
} else {
    header("Location: login.php");
    exit;
}
?>