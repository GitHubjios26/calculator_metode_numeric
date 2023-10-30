<?php

if (isset($_POST['calculator_type'])) {
    $calculator_type = $_POST['calculator_type'];

    echo "Selected option: " . $calculator_type . "<br>";

    switch ($calculator_type) {
        case 'metod1':
            header("Location: biseksi.php");
            exit();
        case 'metod2':
            header("Location: Metode_Regulafalsi.php");
            exit();
        case 'metod3':
            header("Location: Metode_Newton.php");
            exit();
        case 'metod4':
            header("Location: Metode_Secant.php");
            exit();
        case 'metod5':
            header("Location: Metode_Direct.php");
            exit();
        case 'metod6':
            header("Location: Metode_Eliminasi_Gauss.php");
            exit();
        case 'metod7':
            header("Location: Metode_Gauss_Jordan.php");
            exit();
        case 'metod8':
            header("Location: Metode_Gauss_Jacobi.php");
            exit();
        case 'metod9':
            header("Location: Metode_Gauss_Seidel.php");
            exit();
        case 'metod10':
            header("Location: Metode_Regresi_Linear.php");
            exit();
        case 'metod11':
            header("Location: Metode_Regresi_NonLinear.php");
            exit();
        case 'metod12':
            header("Location: Metode_Regresi_Polinomial.php");
            exit();
        case 'metod13':
            header("Location: Metode_Regresi_Lagrange.php");
            exit();
        default:
            header("Location: form.php");
            exit(); 
    }
}
?>