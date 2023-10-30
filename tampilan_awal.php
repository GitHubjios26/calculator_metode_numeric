<!DOCTYPE html>
<html>
<head>
    <title>Tampilan Awal dengan Gambar Background</title>
    <h1 style="text-align: center; color: Red">Selamat Datang di Aplikasi berbasis Web untuk menyelesaian Masalah Metode Numerik!</h1>
    <style>
        body {
            background-image: url('ilustrasimetodenumeric.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .content {
            text-align: center;
            padding: 20px;
            color: Red;
            font-size: 25px;
        }

        .calculator-form {
            margin: 20px;
            font-weight: bold;
        }

        .calculator-select {
            width: 200px;
            padding: 10px;
            font-size: 16px;
        }
        
    </style>
</head>
<body>
    <div class="content">
        <form class="calculator-form" action="code.php" method="post">
            <label for="calculator-select">Pilih Metode Numerik:</label><br><br>
            <select id="calculator-select" name="calculator_type" class="calculator-select">
                <option value="metod1">Metode Biseksi</option>
                <option value="metod2">Metode Regulafalsi</option>
                <option value="metod3">Metode Newton</option>
                <option value="metod4">Metode Secant</option>
                <option value="metod5">Metode Direct</option>
                <option value="metod6">Metode Eliminasi Gauss</option>
                <option value="metod7">Metode Gauss Jordan</option>
                <option value="metod8">Metode Gauss Jacobi</option>
                <option value="metod9">Metode Gauss Seidel</option>
                <option value="metod10">Metode Regresi Linear</option>
                <option value="metod11">Metode Regresi Non Linear</option>
                <option value="metod12">Metode Regresi Polinomial</option>
                <option value="metod13">Metode Regresi Lagrange</option>
            </select>
            <br>
            <button type="submit" name="Pilih" class="btn btn-primar">Pilih</button>
        </form>
        
    </div>
</body>
</html>
