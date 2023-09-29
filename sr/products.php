<?php
session_start();
if (!isset($_SESSION["sr_id"])) {
    header("Location:./");
    exit();
}
@include "../public/php/config.php";

// echo $today;
$sr_id = $_SESSION["sr_id"];
$sql_s = "SELECT * FROM sr WHERE id = $sr_id";
$result_s = mysqli_query($con, $sql_s);
$row_s = mysqli_fetch_assoc($result_s);
$retailer_id = $_GET['retailer_id'];
$sql_r = "SELECT * FROM retailer WHERE id = $retailer_id";
$result_r = mysqli_query($con, $sql_r);
$row_r = mysqli_fetch_assoc($result_r);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- google font "Plus Jakarta Sans" cdn for english-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- google font "Plus Jakarta Sans" cdn for English-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- taiwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/main.css" />

    <script src="../public/js/code.jquery.com_jquery-3.7.1.min.js"></script>
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

        .popup.cartPopup {
            display: flex;
            animation: cartpopup .3s ease;
        }

        @keyframes popup {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes cartpopup {
            0% {
                bottom: -800px;
                filter: blur(10px);
            }

            100% {
                bottom: 0;
                filter: blur(0);
            }
        }


        /* radio */
        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            display: none;
        }

        [type="radio"]:checked+label,
        [type="radio"]:not(:checked)+label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        [type="radio"]:checked+label:before,
        [type="radio"]:not(:checked)+label:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 1px solid #007AFF;
            border-radius: 50px;
        }

        [type="radio"]:checked+label:after,
        [type="radio"]:not(:checked)+label:after {
            content: "";
            width: 12px;
            height: 12px;
            background: #007AFF;
            position: absolute;
            top: 4px;
            left: 4px;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        [type="radio"]:not(:checked)+label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        [type="radio"]:checked+label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        /* quntity */

        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        @media screen and (max-width : 380px) {
            .happy-popup {
                transform: scale(0.8);
            }
        }
    </style>
</head>

<body class="lg:flex lg:h-screen lg:items-center lg:justify-center lg:bg-[#f4f9ff]">
    <div class="relative mx-auto bg-white p-4 lg:min-h-[770px] lg:w-[380px] lg:overflow-hidden lg:rounded-3xl lg:border-[6px] lg:border-[#f4f9ff] lg:p-6 lg:shadow-[0_20px_50px_-20px_rgba(0,26,130,0.21)]">
        <div class="mb-8 flex h-11 items-center justify-between">
            <a href="reatailer.html">
                <ion-icon name="chevron-back-outline" class="tran h-7 w-7 cursor-pointer rounded-full bg-[#F8F8FB] p-2 text-[#8A94A6] hover:ring-1 hover:ring-slate-400"> </ion-icon>
            </a>

            <h1 class="font bn text-[17px] font-semibold text-[#222950]"><?php echo $row_r['name'] ?></h1>
            <span class="w-7"></span>
        </div>

        <div class="p-[2px] pb-20 lg:max-h-[600px] lg:overflow-auto">
            <!-- product c -->
            <div class="grid grid-cols-3 gap-4">
                <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a href="#" class="product-c tran">
                        <input type="hidden" name="category_id" id="category_id" class="category_id" value="<?php echo $row['id'] ?>">
                        <img class="mb-4 w-12" src="../public/image/icon/<?php echo $row['icon'] ?>" alt="" />
                        <h3 class="bn text-[10px] font-semibold xs:text-sm">ক্যান্ডি</h3>
                    </a>
                <?php  }
                ?>

            </div>

            <!-- title -->
            <a href="#" class="my-8 flex justify-between">
                <h1 class="text-lg font-semibold text-[#222950]">Featured products</h1>
                <ion-icon class="tran h-5 w-5 rounded-full bg-slate-100 p-1 text-[#8A94A6] hover:text-slate-700" name="chevron-forward-outline"></ion-icon>
            </a>
            <!-- product -->
            <div class="product-list grid grid-cols-2 gap-6">

            </div>
        </div>

        <!-- Product details popup -->
        <div class="productDetails popup_bg popup !z-[100] overflow-auto">

        </div>

        <!-- nav -->
        <?php @include "components/nav.php"; ?>

        <!-- my cart popup hidden-->
        <div class="myCart hidden popup !z-[100] fixed sm:absolute inset-0 bg-black/50 backdrop-blur-sm">
            <div class="absolute w-full rounded-t-3xl bg-white h-[95%] overflow-auto bottom-0 p-5 xs:p-7 lg:p-5 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-lg text-[#222950] font-bold">My Cart</h1>
                        <ion-icon onclick="closemyCart()" class="h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-[#F2F3F9] p-2 text-blue-600" name="close-outline"></ion-icon>
                    </div>
                    <div class="flex flex-col gap-4 mb-8 min-h-[320px] lg:min-h-[420px]">
                        <!-- cart item -->
                        <div class="cart-item">
                            <!-- delete item -->
                            <a href="#" class="delete-item"><ion-icon name="trash-outline"></ion-icon></a>

                            <img class="mr-4 h-[80px] w-[80px] object-contain" src="images/product/pusti-happy-time.png" alt="" />

                            <div class="flex flex-col">
                                <h4 class="bn mb-4 font-bold text-[#222950]">মিল্ক বিস্কুট<span class="bn ml-3 text-xs text-[#8094AA]">(50g)</span></h4>
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-between gap-1">
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="remove-outline"></ion-icon>
                                        </button>
                                        <input class="quantity tran w-full rounded-lg border-2 border-[#EBEDF5] text-center outline-none focus:border-blue-500" min="0" name="quantity" value="1" type="number" />
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="add-outline"></ion-icon>
                                        </button>
                                    </div>
                                    <p class="min-w-[70px] rounded-full border border-[#EBEDF5] text-center text-[#595F84] text-sm py-1 font-semibold">৳ 500</p>
                                </div>
                            </div>
                        </div>
                        <!-- cart item -->
                        <div class="cart-item">
                            <!-- delete item -->
                            <a href="#" class="delete-item"><ion-icon name="trash-outline"></ion-icon></a>

                            <img class="mr-4 h-[80px] w-[80px] object-contain" src="images/product/pusti-happy-time.png" alt="" />

                            <div class="flex flex-col">
                                <h4 class="bn mb-4 font-bold text-[#222950]">মিল্ক বিস্কুট<span class="bn ml-3 text-xs text-[#8094AA]">(50g)</span></h4>
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-between gap-1">
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="remove-outline"></ion-icon>
                                        </button>
                                        <input class="quantity tran w-full rounded-lg border-2 border-[#EBEDF5] text-center outline-none focus:border-blue-500" min="0" name="quantity" value="1" type="number" />
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="add-outline"></ion-icon>
                                        </button>
                                    </div>
                                    <p class="min-w-[70px] rounded-full border border-[#EBEDF5] text-center text-[#595F84] text-sm py-1 font-semibold">৳ 500</p>
                                </div>
                            </div>
                        </div>
                        <!-- cart item -->
                        <div class="cart-item">
                            <!-- delete item -->
                            <a href="#" class="delete-item"><ion-icon name="trash-outline"></ion-icon></a>

                            <img class="mr-4 h-[80px] w-[80px] object-contain" src="images/product/pusti-happy-time.png" alt="" />

                            <div class="flex flex-col">
                                <h4 class="bn mb-4 font-bold text-[#222950]">মিল্ক বিস্কুট<span class="bn ml-3 text-xs text-[#8094AA]">(50g)</span></h4>
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-between gap-1">
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="remove-outline"></ion-icon>
                                        </button>
                                        <input class="quantity tran w-full rounded-lg border-2 border-[#EBEDF5] text-center outline-none focus:border-blue-500" min="0" name="quantity" value="1" type="number" />
                                        <button class="tran group flex h-[28px] min-w-[28px] items-center justify-center rounded bg-[#F2F3F9] hover:bg-blue-500" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <ion-icon class="tran text-xl text-[#007AFF] group-hover:text-white" name="add-outline"></ion-icon>
                                        </button>
                                    </div>
                                    <p class="min-w-[70px] rounded-full border border-[#EBEDF5] text-center text-[#595F84] text-sm py-1 font-semibold">৳ 500</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-5 flex flex-col gap-2 rounded-lg bg-[#F2F3F9] p-3">
                        <p class="flex items-center justify-between text-sm font-medium text-[#595F84]">Total item : <span>03</span></p>
                        <hr class="border-slate-200" />
                        <p class="flex items-center justify-between text-sm font-bold text-[#007AFF]">Subtotal : <span>৳ 600</span></p>
                    </div>
                    <a href="order-complete.html"><button type="#" class="tran w-full rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] py-3.5 font-semibold text-white focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Check out</button></a>
                </div>

            </div>
        </div>
    </div>

    </div>

    <script src="script.js"></script>
    <script>
        // productView popup
        var productDetails = document.querySelector(".productDetails");

        function productView() {
            productDetails.classList.add("openPopup");
        }

        function closeProductDetails() {
            productDetails.classList.remove("openPopup");
        }

        // productView popup
        var cartItem = document.querySelector(".myCart");

        function myCart() {
            cartItem.classList.add("cartPopup");
        }

        function closemyCart() {
            cartItem.classList.remove("cartPopup");
        }
    </script>
    <script>
        $(document).ready(function() {
            function load_product() {
                $.ajax({
                    url: "php/load-product",
                    type: "POST",
                    success: function(data) {
                        $(".product-list").append(data);
                    }
                })
            }
            load_product()
            $(".product-c").click(function() {
                var category_id = $(this).children(".category_id").val();
                // alert(category_id)
                $.ajax({
                    url: "php/load-product",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $(".product-list").html(data);
                    }
                })
            })
            $(document).on("click", ".s-product", function() {
                var product_id = $(this).children(".product_id").val();
                $.ajax({
                    url: "php/product-popup",
                    type: "POST",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        $(".productDetails").html(data);
                    }
                })
            })
            // ------------------------- 
            $(document).on("click", "input[id=pc]", function() {
                var value = $(this).val();
                var per_price = $(".per_price").val();
                var quantity = $(".quantity").val();
                var total = quantity * per_price;
                $(".total-price").html(total)
                $(".total-price-input").val(total)
            });
            $(document).on("click", "input[id=box]", function() {
                var value = $(this).val();
                var piece = $(".price").val();
                var quantity = $(".quantity").val();
                var total = quantity * piece;
                // alert(total)
                $(".total-price").html(total)
                $(".total-price-input").val(total)
            });
            $(document).on("click", ".c-btn", function() {
                var per_price = $(".per_price").val();
                var piece = $("input[name=product_type]:checked").val();
                var quantity = $(".quantity").val();
                var total = quantity * piece * per_price;
                // alert(total)
                $(".total-price-input").val(total)
                $(".total-price").html(total)

            });
            $(document).on("keyup", ".quantity", function() {
                var quantity = $(this).val();
                var per_price = $(".per_price").val();
                var piece = $("input[name=product_type]:checked").val();
                var total = quantity * piece * per_price;
                // alert(total)
                $(".total-price-input").val(total)
                $(".total-price").html(total)
            });
            // -----------------
            $(document).on("click", ".submit-btn", function() {
                var product_id = $(this).siblings(".product_id").val();
                var retailer_id = <?php echo $retailer_id ?>;
                var pieceOfbox = $("input[name=product_type]:checked").val();
                var quantity = $(".quantity").val();
                var piece = pieceOfbox * quantity;
                var price = $(".per_price").val();
                var total_amount = piece * price; // Fix the variable name here
                var sr_total_amount = $(".total-price-input").val();
                var sr_price = sr_total_amount / piece;
                var status = "order";
                var sr_id = <?php echo $sr_id ?>;
                var deller_id = <?php echo $row_s['deller_id'] ?>;

                // Create an object to hold your data
                var dataToSend = {
                    product_id: product_id,
                    retailer_id: retailer_id,
                    pieceOfbox: pieceOfbox,
                    quantity: quantity,
                    piece: piece,
                    price: price,
                    total_amount: total_amount,
                    sr_total_amount: sr_total_amount,
                    sr_price: sr_price,
                    status: status,
                    sr_id: sr_id,
                    deller_id: deller_id
                };

                // Use AJAX to send the data to the server
                $.ajax({
                    url: 'php/order', // Replace with the actual URL of your PHP script
                    method: 'POST', // You can also use 'GET' depending on your server-side script
                    data: dataToSend,
                    success: function(response) {
                        productDetails.classList.remove("openPopup");
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the AJAX request
                        console.error(xhr.responseText);
                    }
                });

            })
        })
    </script>
</body>

</html>