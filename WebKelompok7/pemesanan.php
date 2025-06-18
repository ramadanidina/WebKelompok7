<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - Creative.Wae</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f8fb;
            color: #333;
            text-align: center;
        }
        header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            padding: 40px 20px;
            font-size: 40px;
            font-weight: bold;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            width: 80%;
            margin: auto;
        }
        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;
        }

        nav .nav-button {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
        }

        nav .nav-button:hover {
            background-color: #ff9800;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #ff9800;
        }

        footer {
            background: radial-gradient(circle, #0056b3, #003d80);
            color: white;
            padding: 20px;
            margin-top: 20px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            width: 80%;
            margin: auto;
        }

        #harga {
            font-weight: bold;
            color: #007bff;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        Pemesanan - Creative.Wae
    </header>
<nav>
        <a href="menu.html" class="nav-button">Home</a>
        <a href="katalog.php" class="nav-button">Katalog</a>
        <a href="porto1.php" class="nav-button">Portofolio</a>
        <a href="testi.php" class="nav-button">Testimoni</a>
        <a href="ketentuan.html" class="nav-button">Ketentuan</a>
        <a href="tentang_kami.html" class="nav-button">Tentang & Kontak</a>
        <a href="pemesanan.html" class="nav-button">Pesan Sekarang</a>
    </nav>

    <div class="container">
        <h2>Formulir Pemesanan</h2>
        <form action="proses_pemesanan.php" method="POST">
            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required>

            <label for="nomor">No. Telepon:</label>
            <input type="text" id="nomor" name="nomor" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="perusahaan">Nama Perusahaan:</label>
            <input type="text" id="perusahaan" name="perusahaan" required>

            <label for="alamat">Alamat Perusahaan:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="paket">Pilih Paket:</label>
            <select id="paket" name="paket" required onchange="updateSubPaket()">
                <option value="">-- Pilih Paket --</option>
                <option value="desain">Desain Grafis</option>
                <option value="editing">Editing Vidio</option>
                <option value="fotovideo">Fotografi & Videografi</option>
                <option value="web">Desain Website</option>
                <option value="produk">Foto & Video Produk</option>
            </select>

            <label for="sub-paket">Pilih Sub-Pilihan:</label>
            <select id="sub-paket" name="sub-paket" required>
                <option value="">-- Pilih Sub-Pilihan --</option>
            </select>

            <p id="harga"></p>

            <label for="message">Catatan Tambahan:</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <button type="button" onclick="window.location.href='pembayaran.php'">Pesan Sekarang</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
    </footer>

    <script>
        const hargaMap = {
            desain: {
                basic1: 150000,
                basic2: 250000
            },
            editing: {
                premium1: 300000,
                premium2: 500000
            },
            fotovideo: {
                custom1: 700000,
                custom2: 1000000
            },
            web: {
                custom1: 800000,
                custom2: 1500000
            },
            produk: {
                custom1: 400000,
                custom2: 650000
            }
        };

        function updateSubPaket() {
            const paket = document.getElementById("paket").value;
            const subPaket = document.getElementById("sub-paket");
            const hargaElement = document.getElementById("harga");

            subPaket.innerHTML = "<option value=''>-- Pilih Sub-Pilihan --</option>";
            hargaElement.textContent = "";

            if (paket && hargaMap[paket]) {
                for (const sub in hargaMap[paket]) {
                    const option = document.createElement("option");
                    option.value = sub;
                    option.textContent = sub.charAt(0).toUpperCase() + sub.slice(1).replace(/[0-9]/g, ' $&');
                    subPaket.appendChild(option);
                }
            }
        }

        document.getElementById("sub-paket").addEventListener("change", function () {
            const paket = document.getElementById("paket").value;
            const sub = this.value;
            const hargaElement = document.getElementById("harga");

            if (paket && sub && hargaMap[paket] && hargaMap[paket][sub]) {
                hargaElement.textContent = "Harga: Rp " + hargaMap[paket][sub].toLocaleString("id-ID");
            } else {
                hargaElement.textContent = "";
            }
        });
    </script>
</body>
</html>
