<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("location:login");
  $aid = $_SESSION["user_id"];
}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

    .addreatailer,
    .edit-popup {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      overflow: auto;
      width: 100%;
      background: #000;
      z-index: 100000000000;
      display: flex;
      justify-content: center;
      padding: 20px 0px;
      display: none;
    }

    .show {
      display: flex;
    }

    .edit-box {
      height: max-content;
    }

    .empty {
      border: 1px solid red;
    }

    .exist {
      border: 1px solid green;
    }
  </style>

</head>

<body class="lg:bg-[#f4f9ff] lg:h-screen lg:flex lg:justify-center lg:items-center">
  <div class="relative lg:overflow-hidden mx-auto bg-white p-4 lg:min-h-[770px] lg:w-[380px] lg:rounded-3xl lg:border-[6px] lg:border-[#f4f9ff] lg:p-6 lg:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)]">
    <div class="mb-12 flex h-10 justify-between">
      <ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"></ion-icon>

      <div class="flex items-center gap-3">
        <a href="#" class="tran money flex items-center gap-3 rounded-full bg-[#FAFCFF] px-4 py-2 text-sm text-[#007AFF] border border-[#007AFF2B] font-semibold"><img src="wallet.svg" alt=""> Tk 50.00</a>
        <a href="php/logout" class="tran flex items-center gap-3 rounded-full bg-[#F8F8FB] px-4 py-2 hover:bg-red-50 hover:text-red-500 hover:ring-1 group hover:ring-red-500 text-sm text-[#8A94A6]">Logout
          <ion-icon class="text-[#595F84] group-hover:text-red-500 text-lg" name="log-out-outline"></ion-icon></a>
      </div>
    </div>
    <form action="#" class="flex flex-col gap-4">
      <select name="upazila" id="upazila" class="upazila reatailer-input text-[#222950]">
        <option value="">Select Upazila</option>
      </select>
      <select name="union" id="union" class="union reatailer-input text-[#222950]">
        <option value="">Select Union</option>
      </select>
      <select name="bazar" id="bazar" class="bazar bazar-get-ret reatailer-input text-[#222950]">
        <option value="">Select Bazar</option>
      </select>
    </form>
    <div class="retailer-list grid grid-cols-2 gap-4 pb-20 pt-10 lg:max-h-[500px] lg:overflow-auto">
    </div>
    <!-- add new icon -->
    <div class="add-new tran fixed bottom-8 right-8 z-20 flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full bg-blue-500 shadow-md ring-2 ring-white hover:bg-blue-600 lg:absolute">
      <ion-icon class="text-3xl text-white" name="add-outline"></ion-icon>
    </div>

    <div class="edit-popup bg-[#007AFF]">

      <div class="edit-box relative mt-20 min-w-[315px] rounded-xl bg-white p-5 md:min-w-[580px]">
        <ion-icon class="close-edit absolute -top-16 right-0 h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-white p-2 text-blue-600" name="close-outline"></ion-icon>

        <div class="mb-8 flex items-center justify-between">
          <h1 class="bn text-[18px] font-semibold text-[#595F84]">Add New Retailer</h1>
        </div>

        <form action="php/insert-retailer" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
          <input type="number" name="number" id="number" placeholder="Reatailer Number" class="reatailer-input text-[#222950]" required>
          <div class="show-retailer">
          </div>
          <label for="shop-image">Shop Image</label>
          <input type="file" name="shop-image" id="shop-image" class="reatailer-input text-[#222950]">
          <label for="shop-image">Retailer Image</label>
          <input type="file" name="retailer-image" id="retailer-image" class="reatailer-input text-[#222950]">
          <input type="text" name="name" id="name" placeholder="Reatailer Name" class="reatailer-input text-[#222950]" required>
          <input type="text" name="shop" id="shop" placeholder="Shop Name" class="reatailer-input text-[#222950]" required>
          <select name="upazila" id="upazila" class="upazila reatailer-input text-[#222950]" required>
            <option value="">Select Upazila</option>
          </select>
          <select name="union" id="union" class="union reatailer-input text-[#222950]" required>
            <option value="">Select union</option>
          </select>
          <select name="bazar" id="bazar" class="bazar reatailer-input text-[#222950]" required>
            <option value="">Select Bazar</option>
          </select>
          <!-- <input type="text" name="other" id="OtherBazarInput" class="hidden reatailer-input text-[#222950]" placeholder="Enter your Hat/Bazar/Mor/Para"> -->
          <input type="text" name="area" id="area" placeholder="area" class="reatailer-input text-[#222950]" required>
          <button type="submit" name="add" class="w-full py-4 rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] font-semibold text-white transition-all duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Add
            Reatailer</button>
        </form>
      </div>

    </div>
  </div>




  <script src="script.js"></script>
  <script>

  </script>
  <script>
    $(document).ready(function() {
      function load_upazila() {
        $.ajax({
          url: "php/load-area",
          type: "post",
          success: function(data) {
            $(".upazila").html(data)
          }
        })
      }
      load_upazila()
      // ------------------------------
      $(document).on("change", ".upazila", function() {
        var upazila = $(this).val()
        var upa = $(this)
        $.ajax({
          url: "php/load-area",
          type: "POST",
          data: {
            upazila: upazila
          },
          success: function(data) {
            upa.siblings(".union").html(data)
          }
        })
      })
      // -----------------------------
      $(document).on("change", ".union", function() {
        var union = $(this).val()
        var uni = $(this)
        $.ajax({
          url: "php/load-area",
          type: "POST",
          data: {
            union: union
          },
          success: function(data) {
            uni.siblings(".bazar").html(data)
          }
        })
      })
      // ------------------
      $(document).on("change", ".bazar-get-ret", function() {
        var bazar = $(this).val();
        $.ajax({
          url: "php/load-retailer",
          type: "post",
          data: {
            bazar: bazar
          },
          success: function(data) {
            $(".retailer-list").html(data)
          }
        })
      })
      // ------------------
      function load_retailer() {
        $.ajax({
          url: "php/load-retailer",
          type: "post",
          success: function(data) {
            $(".retailer-list").append(data)

            function calculateSum() {
              let sum = 0;
              // Iterate through each input field and sum their values
              $('.amount').each(function() {
                sum += parseFloat($(this).val());
              });
              var total_amount = sum * 0.10;
              // Display the sum
              $('.money').text("৳" + total_amount);
            }
            // Calculate and display the initial sum
            calculateSum();
          }
        })
      }
      load_retailer()
      // ------------------
      $(document).on("click", ".edit-btn", function() {
        $(this).siblings(".edit-popup").addClass("show")
      })
      $(document).on("click", ".close-edit", function() {
        $(".edit-popup").removeClass("show")
      })
      $(".add-new").click(function() {
        $(this).siblings(".edit-popup").addClass("show")
      })
    })
  </script>
</body>

</html>