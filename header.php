<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Metode Numerik</title>
    <style>
        body {
            display: grid;
            grid-template-rows: auto 1fr auto;
            min-height: 100vh;
        }   

        h1{
            text-align: center;
            color: Orange;
            font-size: 15px;
        }
/* Gaya untuk menu panel */
.menu-panel {
    background-color: red;
    padding: 10px;
    text-align: center;
}

/* Gaya untuk menu bar */
.menu-bar {
    display: flex;
    justify-content: center;
}

.menu-bar a {
    text-decoration: none;
    color: #fff;
    padding: 10px 20px;
}

.menu-bar a:hover {
    background-color: #555;
}
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            height: 50px; /* Ganti nilai ini sesuai dengan tinggi yang Anda inginkan, misalnya 300px */
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:first-child {
            background-color: #333; /* Warna latar belakang untuk baris pertama */
            color: white; /* Warna teks untuk baris pertama */
        }
        a {
            color: grey; /* Atur warna tautan menjadi biru */
        }
        .submenu-td {
            position: relative;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .form-container {
            text-align: center;
            padding: 20px;
        }

        .form-container form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-container label {
            display: block;
            margin-top: 10px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #555;
        } 
        .hasil {
        text-align: center;
        font-size: 12px;
    }

    .hasil table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .hasil table, .hasil th, .hasil td {
        border: 1px solid black;
    }

    .hasil th, .hasil td {
        padding: 5px;
        text-align: center;
    }

    .hasil th {
        background-color: #e0e0e0;
    }
    </style>
</head>
<body>
<header>
        <div class="menu-panel">
            <table>
                <tr>
                    <td style="height: 90px; width: 20%;">
                        <h1>Kalkulator Metode Numerik</h1>
                    </td>
                    <td style="height: 90px; width: 80%;"></td>
                </tr>
            </table>
        </div>
        <div class="menu-bar">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td class="submenu-td">
                        <div class="dropdown">
                            <a class="dropbtn" href="mencari_akar.php" target="_self">Mencari Akar</a>
                                <div class="dropdown-content">
                                    <a href="biseksi.php">Metode Biseksi</a>
                                    <a href="regulafalsi.php">Metode Regulafalsi</a>
                                    <a href="newton.php">Metode Newton</a>
                                    <a href="secant.php">Metode Secant</a>
                                    <a href="direct.php">Metode Direct</a>
                            </div>
                        </div>
                    </td>
                    <td class="submenu-td">
                        <div class="dropdown">
                            <a class="dropbtn" href="https://www.contoh.com/metode.pdf" target="_blank">Matriks</a>
                            <div class="dropdown-content">
                                <a href="#">Metode Eliminasi Gauss</a>
                                <a href="#">Metode Gauss Jordan</a>
                                <a href="#">Metode Gauss Jacobi</a>
                                <a href="#">Metode Gauss Seidel</a>
                            </div>
                        </div>
                    </td>
                    <td class="submenu-td">
                        <div class="dropdown">
                            <a class a="dropbtn" href="https://www.contoh.com/metode.pdf" target="_blank">Regresi</a>
                            <div class="dropdown-content">
                                <a href="regresi_linear.php">Metode Regresi Linear</a>
                                <a href="#">Regresi Non Linear</a>
                                <a href="#">Metode Regresi Polinomial</a>
                                <a href="#">Metode Regresi Lagrange</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </header>