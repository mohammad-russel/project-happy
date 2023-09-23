<?php
session_start();
if (isset($_SESSION["sr_id"])) {
    header("Location:dashboard");
    // exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>happy-login</title>

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
    </style>

</head>

<body class="sm:bg-[#f4f9ff] sm:h-screen sm:flex sm:justify-center sm:items-center">
    <div class="sm:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)] bg-white sm:w-[380px] mx-auto p-4 sm:p-6 sm:border-[6px] sm:border-[#f4f9ff] sm:min-h-[770px] sm:rounded-3xl">


        <div class="mb-12 h-10">
            <ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"></ion-icon>
        </div>
        <div class="mb-12 flex items-center justify-center">
            <img class="" src="../public/image/login.svg" alt="" />
        </div>
        <div class="mb-12 text-center">
            <h1 class="relative text-3xl font-bold text-[#222950]">Happy <span class="rounded-lg border border-blue-200 px-2 text-base font-semibold text-blue-500 shadow-md shadow-blue-950/5">SR</span>
            </h1>
        </div>
        <div class="">
            <form class="flex flex-col gap-4" action="php/login" method="POST">
                <!-- <div class="relative">
                    <ion-icon class="absolute left-3 top-[19px] w-5 text-xl text-[#595F84] sm:left-4" name="call-outline"></ion-icon>
                    <select name="role" id="role" class="block w-full rounded-xl border border-[#E5E7F0] py-[18px] pl-12 pr-4 outline-none duration-300 placeholder:text-[#8A94A6] dark:text-white focus:border-blue-500/50">
                        <option value="">ok lol</option>
                    </select>
                </div> -->
                <div class="relative">
                    <ion-icon class="absolute left-3 top-[19px] w-5 text-xl text-[#595F84] sm:left-4" name="call-outline"></ion-icon>
                    <input id="number" name="number" type="number" autocomplete="cc-number" required placeholder="Phone Number" class="block w-full rounded-xl border border-[#E5E7F0] py-[18px] pl-12 pr-4 outline-none duration-300 placeholder:text-[#8A94A6] dark:text-white focus:border-blue-500/50" />
                </div>
                <div class="relative">
                    <ion-icon class="absolute left-3 top-[19px] w-5 text-xl text-[#595F84] sm:left-4" name="lock-closed-outline"></ion-icon>
                    <input id="password" name="password" type="password" autocomplete="password" required placeholder="Password" class="block w-full rounded-xl border border-[#E5E7F0] py-[18px] pl-12 pr-4 outline-none duration-300 placeholder:text-[#8A94A6] dark:text-white focus:border-blue-500/50" />
                </div>
                <a href="#" class="tran mb-2 text-right text-sm text-blue-600 hover:opacity-60">Forget password?</a>

                <button type="submit" name="submit" class="w-full py-[18px] rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] font-semibold text-white transition-all duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Login</button>
            </form>
        </div>



    </div>




    <script src="script.js"></script>

</body>

</html>