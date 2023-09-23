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
    <title>happy-Reatailer</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- google font "Plus Jakarta Sans" cdn for english-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- google font "Plus Jakarta Sans" cdn for English-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

    <script src="../public/js/code.jquery.com_jquery-3.7.1.min.js"></script>

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
            background-size: 15px;
            background-position: calc(100% - 1.2em) center;
            background-repeat: no-repeat;
        }

        select::-ms-expand {
            display: none;
        }

        @media screen and (max-width : 380px) {
            .happy-popup {
                transform: scale(0.8);
            }
        }
    </style>

</head>

<body class="lg:bg-[#f4f9ff] lg:h-screen lg:flex lg:justify-center lg:items-center">

    <div class="relative mx-auto bg-white p-4 lg:min-h-[770px] lg:w-[380px] lg:overflow-hidden lg:rounded-3xl lg:border-[6px] lg:border-[#f4f9ff] lg:p-6 lg:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)]">
        <div class="mb-8 flex h-11 justify-between">
            <a href="dashboard"><ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"></ion-icon></a>

            <div class="relative min-w-[250px]">
                <input type="search" name="search" class="tran w-full h-full rounded-full bg-[#F2F3F9] px-5 text-[#8A94A6] outline-none focus:ring-2" placeholder="Search Reatailer" />
                <ion-icon class="absolute right-3 top-3 text-xl text-[#595F84]" name="search-outline"></ion-icon>
            </div>
            <!-- <ion-icon name="options-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-blue-600 hover:ring-1"></ion-icon> -->
        </div>

        <div class="relative flex h-24 justify-center">
            <img class="tran h-full w-full rounded-xl object-cover hover:scale-95" src="../public/image/icon/Route.svg" alt="" />
            <div onclick="myRoute()" class="tran absolute -bottom-6 z-10 flex w-[90%] justify-between items-center rounded-xl border border-[#2E318514] bg-white px-4 py-3 cursor-pointer shadow-lg shadow-blue-800/5 hover:shadow-blue-800/10">
                <h3 class="text-[15px] text-[#595F84] bn font-medium">আমার রুট</h3>
                <ion-icon class="w-5 text-[#C3CAD9]" name="chevron-down-outline"></ion-icon>
            </div>
        </div>

        <!-- route list popup -->
        <div class="myRoute popup_bg popup !z-[100] overflow-auto">
            <div class="relative mt-20 rounded-xl bg-white p-5 min-w-[315px] md:min-w-[580px]">
                <ion-icon onclick="closeP()" class="absolute -top-16 right-0 h-6 w-6 text-blue-600 p-2 bg-white overflow-hidden rounded-full cursor-pointer" name="close-outline"></ion-icon>
                <div class="mb-8 flex items-center justify-between">
                    <h1 class="bn text-[18px] font-semibold text-[#595F84]">আমার রুট</h1>
                    <a href="#"><button class="tran rounded-full bg-[#E6F8F5] px-3 py-1 text-sm font-medium text-[#05B59B] hover:opacity-80 bn">Add New</button></a>
                </div>
                <div class="">
                    <ul class="flex flex-col gap-2">
                        <?php
                        @include "../public/php/config.php";
                        $sql = "SELECT *,bazar_id,COUNT(retailer.id) AS count_retailer FROM retailer INNER JOIN bazar ON retailer.bazar_id = bazar.id GROUP BY bazar_id ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="flex justify-between items-center rounded-lg bg-[#EBF5FF] px-3 py-2">
                                <label class="flex items-center gap-3">
                                    <input type="checkbox" name="bazar" id="bazar" checked />
                                    <span class="font-medium text-[#595F84]">1 -</span>
                                    <p class="font-medium text-[#595F84] bn"><?php echo $row['bazar_name'] ?></p>
                                </label>
                                <span class="flex items-center justify-center rounded-full bg-[#1F84FF] px-2 h-5 text-sm text-white"><?php echo $row['count_retailer'] ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>

        </div>

        <!-- retailer list -->
        <div class="retailer-list flex flex-col gap-8 p-1 pb-20 pt-14 lg:max-h-[500px] lg:overflow-auto">

        </div>
        <div class="load-more">More</div>
        <!-- add new icon -->
        <div onclick="addreatailer()" class="fixed lg:absolute bottom-[100px] z-20 right-10 w-[50px] h-[50px] rounded-full bg-blue-500 tran hover:bg-blue-600 cursor-pointer flex justify-center items-center ring-2 ring-white shadow-md">
            <ion-icon class="text-3xl text-white" name="add-outline"></ion-icon>
        </div>

        <!-- add reatailer popup -->
        <div class="addreatailer popup_bg popup !z-[100]">

            <div class="relative mt-20 min-w-[315px] rounded-xl bg-white p-5 md:min-w-[580px]">
                <ion-icon onclick="closeReatailer()" class="absolute -top-16 right-0 h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-white p-2 text-blue-600" name="close-outline"></ion-icon>

                <div class="mb-8 flex items-center justify-between">
                    <h1 class="bn text-[18px] font-semibold text-[#595F84]">Add New Retailer</h1>
                </div>

                <form action="" class="flex flex-col gap-4">
                    <input id="name" name="name" type="number" placeholder="Phone Number" class="reatailer-input" />
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
                    <input id="name" name="name" type="text" autocomplete="name" placeholder="Reatailer Name" class="reatailer-input" />
                    <input id="name" name="name" type="text" placeholder="Shop Name" class="reatailer-input" />
                    <input id="name" name="name" type="text" placeholder="Area" class="reatailer-input" />
                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] font-semibold text-white transition-all duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Add Reatailer</button>
                </form>
            </div>

        </div>

        <!-- nav -->

        <?php @include "components/nav.php"; ?>
    </div>

    <!-- https://play.tailwindcss.com/NkiIxjfq4q -->
    <!-- <script src="script.js"></script> -->
    <script>
        var myRoutee = document.querySelector(".myRoute");

        function myRoute() {
            myRoutee.classList.add("openPopup");
        }

        function closeP() {
            myRoutee.classList.remove("openPopup");
        }

        // addreatailer
        var reatailer = document.querySelector(".addreatailer");

        function addreatailer() {
            reatailer.classList.add("openPopup");
        }

        function closeReatailer() {
            reatailer.classList.remove("openPopup");
        }
    </script>
    <script>
        $(document).ready(function() {
            function load_retailer() {
                $.ajax({
                    url: "php/load-retailer",
                    type: "POST",
                    success: function(data) {
                        $(".retailer-list").append(data);
                    }
                })
            }
            load_retailer()
        })
    </script>
</body>

</html>