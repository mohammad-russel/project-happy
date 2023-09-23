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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Route</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- google font "Plus Jakarta Sans" cdn for english-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- google font "Plus Jakarta Sans" cdn for English-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- taiwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/main.css" />

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <style type="text/css">
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: initial;
        }

        .bn {
            font-family: 'Baloo Da 2', cursive;

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

        .popup.openPopup {
            display: flex;
            animation: popup .3s ease;
        }

        @keyframes popup {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* SVG icon */
            background-image: url("images/icon/arrow-down.svg");
            background-size: 12px;
            background-position: calc(100% - 1em) center;
            background-repeat: no-repeat;
        }

        select::-ms-expand {
            display: none;
        }
    </style>
</head>

<body class="lg:flex lg:h-screen lg:items-center lg:justify-center lg:bg-[#f4f9ff]">
    <div class="relative mx-auto bg-white p-4 lg:min-h-[770px] lg:w-[380px] lg:overflow-hidden lg:rounded-3xl lg:border-[6px] lg:border-[#f4f9ff] lg:p-6 lg:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)]">
        <div class="mb-8 flex h-11 items-center justify-between">
            <a href="home.html">
                <ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"> </ion-icon>
            </a>
            <h1 class="text-lg font-bold text-[#222950]">Route</h1>
            <span class="w-7"></span>
        </div>

        <div class="mb-10 flex items-center justify-between rounded-xl border border-[#F562622B] bg-[#FFFAFA] px-6 py-7">
            <div class="flex items-center">
                <img class="mr-4 w-9" src="images/icon/route-page.svg" alt="" />
                <p class="font-medium text-gray-700">Total Route</p>
            </div>
            <h1 class="text-3xl font-bold text-[#F56262]">06</h1>
        </div>

        <!-- <h1 class="mb-6 font-bold text-slate-600">Route List</h1> -->

        <div class="grid grid-cols-2 gap-4">
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">শনিবার</p>
            </a>
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">রবিবার</p>
            </a>
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">সোমবার</p>
            </a>
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">মঙ্গলবার</p>
            </a>
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">বুধবার</p>
            </a>
            <a href="route-day.html" class="route-day group">
                <img class="w-8" src="images/icon/folder.png" alt="" />
                <p class="bn tran font-semibold text-slate-600 group-hover:text-blue-500">বৃহস্পতিবার</p>
            </a>
        </div>
        <!-- add new icon -->
        <div onclick="myRoute()" class="tran fixed bottom-8 right-8 z-20 flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full bg-blue-500 shadow-md ring-2 ring-white hover:bg-blue-600 lg:absolute">
            <ion-icon class="text-3xl text-white" name="add-outline"></ion-icon>
        </div>

        <!-- add route popup -->
        <div class="myRoute popup_bg popup !z-[100]">

            <div class="relative mt-20 min-w-[315px] rounded-xl bg-white p-5 md:min-w-[580px]">
                <ion-icon onclick="closeP()" class="absolute -top-16 right-0 h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-white p-2 text-blue-600" name="close-outline"></ion-icon>

                <div class="mb-8 flex items-center justify-between">
                    <h1 class="bn text-[18px] font-semibold text-[#595F84]">Add New Route</h1>
                </div>

                <form action="" class="flex flex-col gap-4">
                    <select name="union" id="union" class="reatailer-input text-[#222950]">
                        <option value="">Select Day</option>
                        <option value="day">sunday</option>
                        <option value="day">sunday</option>
                        <option value="day">sunday</option>
                        <option value="day">sunday</option>
                        <option value="day">sunday</option>
                    </select>
                    <select name="union" id="union" class="reatailer-input text-[#222950]">
                        <option value="">Select Union</option>
                        <option value="union">Union Name</option>
                        <option value="union">Union Name</option>
                        <option value="union">Union Name</option>
                        <option value="union">Union Name</option>
                    </select>
                    <select name="bazar" id="bazar" class="reatailer-input text-[#222950]">
                        <option value="">Select Bazar</option>
                        <option value="bazar">Bazar Name</option>
                        <option value="bazar">Bazar Name</option>
                        <option value="bazar">Bazar Name</option>
                        <option value="bazar">Bazar Name</option>
                    </select>
                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] font-semibold text-white transition-all duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Add Route</button>
                    <button type="reset" onclick="closeP()" class="w-full py-4 rounded-xl border border-[#E5E7F0] hover:border-red-500/50 hover:text-red-500 tran font-semibold">Cancel</button>
                </form>
            </div>

        </div>
    </div>

    <?php @include "components/nav.php"; ?>

    <script src="script.js"></script>
    <script>
        var myRoutee = document.querySelector(".myRoute");

        function myRoute() {
            myRoutee.classList.add("openPopup");
        }

        function closeP() {
            myRoutee.classList.remove("openPopup");
        }
    </script>
</body>

</html>