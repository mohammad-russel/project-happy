<?php
session_start();
if (!isset($_SESSION["sr_id"])) {
    header("Location:./");
    exit();
}
$sr_id = $_SESSION["sr_id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>happy-home</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- google font "Plus Jakarta Sans" cdn for english-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- google font "Plus Jakarta Sans" cdn for English-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <!-- taiwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/main.css">

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <!-- animate aos cdn -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style type="text/css">
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: initial;
        }

        .bn {
            font-family: 'Baloo Da 2', cursive;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f4f9ff;
        }

        ::-webkit-scrollbar-thumb {
            background: #d5e0ec;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #bac4d0;
        }
    </style>

</head>

<body class="lg:bg-[#f4f9ff] lg:h-screen lg:flex lg:justify-center lg:items-center">
    <div class="relative lg:overflow-hidden mx-auto bg-white p-4 lg:min-h-[770px] lg:w-[380px] lg:rounded-3xl lg:border-[6px] lg:border-[#f4f9ff] lg:p-6 lg:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)]">
        <div class="mb-12 flex h-10 justify-between">
            <ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"></ion-icon>
            <a href="php/logout" class="tran flex items-center gap-3 rounded-full bg-[#F8F8FB] px-4 py-2 hover:bg-red-50 hover:text-red-500 hover:ring-1 group hover:ring-red-500 text-sm text-[#8A94A6]">Logout <ion-icon class="text-[#595F84] group-hover:text-red-500 text-lg" name="log-out-outline"></ion-icon></a>
        </div>

        <div class="mb-8 flex items-center justify-between">
            <div class="">
                <h1 class="text-xl font-semibold text-[#222950] mb-1">Muhammad Rasel</h1>
                <span class="text-[#8A94A6]">Sales officer</span>
            </div>
            <img class="h-14 w-14 rounded-2xl bg-slate-300 object-cover" src="https://t4.ftcdn.net/jpg/03/26/98/51/360_F_326985142_1aaKcEjMQW6ULp6oI9MYuv8lN9f8sFmj.jpg" alt="" />
        </div>
        <div class="grid grid-cols-2 gap-5 pb-20 lg:max-h-[500px] lg:overflow-scroll p-1">
            <a href="scan" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Scan.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Scan</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">Scan Reatailer</span>
            </a>
            <a href="dashboard" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Dashboard.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Dashboard</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">information</span>
            </a>
            <a href="retailer" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Reatailer.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Reatailer</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">Reatail Store</span>
            </a>
            <a href="summary" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Summary.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Summary</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">Your Order info</span>
            </a>
            <a href="inventory" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Inventory.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Inventory</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">Your Stock info</span>
            </a>
            <a href="route" class="home-link tran">
                <img class="mb-3 w-14" src="../public/image/icon/Route.svg" alt="" />
                <h3 class="font-bold text-[#363636] mb-1">Route</h3>
                <span class="text-sm sm:text-[12px] text-[#8A94A6]">Your Route</span>
            </a>

        </div>
        r
        <!-- nav -->
        <?php @include "components/nav.php"; ?>
    </div>




    <script src="script.js"></script>

</body>

</html>