<?php
// Mulai session
session_start();

/*
|--------------------------------------------------------------------------
| DATA VALID (MENGGUNAKAN ARRAY)
|--------------------------------------------------------------------------
*/
$pengguna_valid = [
    "admin" => "rahasia123",
    "gandhi" => "webprog",
    "userlain" => "passlain"
];

// var untuk menyimpan pesan (feedback)
$pesan_error = "";

/*
|--------------------------------------------------------------------------
| PROSES VALIDASI
|--------------------------------------------------------------------------
*/

// 1. ngecek apakah form sudah di-submit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. ambil data yang dikirim dari form
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // 3. validasi Sederhana (apakah kosong?)
    if (empty($username_input) || empty($password_input)) {
        $pesan_error = "Username dan Password wajib diisi!";
    } 
    // 4. validasi utama (cek di dalam array)
    else {
        
        // cek apakah username ada di dalam array (sebagai key)
        if (array_key_exists($username_input, $pengguna_valid)) {
            
            // jiaka username ada, cek apakah password-nya cocok
            if ($pengguna_valid[$username_input] == $password_input) {
                
                // --- LOGIN BERHASIL
                
                $_SESSION['username'] = $username_input;
                // mengamankan variabel untuk ditampilkan
                $nama_user = htmlspecialchars($username_input);

            
                echo <<<HTML
                <!DOCTYPE html>
                <html lang="id">
                <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Login Berhasil!</title>
                
                  <style>
                    body {
                      font-family: Arial, sans-serif;
                      background-color: #f2f6fc;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      height: 100vh;
                      margin: 0;
                    }
                    .form-container {
                      background: white;
                      padding: 25px 30px;
                      border-radius: 10px;
                      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                      width: 100%;
                      max-width: 400px;
                      text-align: center; /* buat rata tengah */
                    }
                    h2 {
                      text-align: center;
                      color: #1e934f;
                      margin-bottom: 20px;
                    }
                    p {
                      font-size: 1.1em;
                      color: #333;
                      margin-bottom: 20px;
                    }
                    
                    
                    a.button-logout {
                      display: inline-block;
                      margin-top: 15px;
                      width: 90%; /* Biar tidak terlalu penuh */
                      padding: 10px;
                      background-color: #116836;
                      color: white;
                      border: none;
                      border-radius: 5px;
                      font-size: 16px;
                      cursor: pointer;
                      text-decoration: none;
                    }
                    a.button-logout:hover {
                      background-color: #12a92d;
                    }
                  </style>
                </head>
                <body>
                
                  <div class="form-container">
                    <h2>Login Berhasil!</h2>
                    <p>Selamat datang, <strong>$nama_user</strong>.</p>
                    
                    <a href="login.html" class="button-logout">Logout</a>
                  </div>
                
                </body>
                </html>
                HTML;
                
                exit(); // Tetap panggil exit()

            } else {
                // Password salah
                $pesan_error = "Username atau Password yang Anda masukkan salah.";
            }

        } else {
            // Username tidak ditemukan
            $pesan_error = "Username atau Password yang Anda masukkan salah.";
        }
    }

} else {
    // Jika file diakses langsung, kembalikan ke login.html
    header("Location: login.html");
    exit();
}

/*
|--------------------------------------------------------------------------
| TAMPILKAN KEMBALI FORM JIKA GAGAL
|--------------------------------------------------------------------------
*/
if (!empty($pesan_error)) {
    $halaman_login = file_get_contents("login.html");
    $html_error = "<div class='error-message'>" . $pesan_error . "</div>";
    $halaman_login_dengan_error = str_replace(
        '<h2>Halaman Login</h2>', 
        '<h2>Halaman Login</h2>' . $html_error, 
        $halaman_login
    );
    echo $halaman_login_dengan_error;
}
?>