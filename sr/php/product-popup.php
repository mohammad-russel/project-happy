<?php
@include "../../public/php/config.php";
$product_id = $_POST['product_id'];
$sql = "SELECT *,price/piece AS per_piece FROM product WHERE id = $product_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="relative mt-20 min-w-[280px] rounded-xl border-4 border-white bg-[#F2F3F9] md:min-w-[580px] happy-popup">
    <ion-icon onclick="closeProductDetails()" class="absolute -top-16 right-0 h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-white p-2 text-blue-600" name="close-outline"></ion-icon>

    <div class="flex h-60 w-full items-center justify-center overflow-hidden">
        <img class="h-44 w-52 object-contain" src="../public/image/product/<?php echo $row['image'] ?>" alt="" />
    </div>
    <div class="rounded-t-2xl bg-white px-6 pt-8 pb-5">
        <div class="mb-5 flex items-start justify-between">
            <h4 class="bn mb-4 text-lg font-bold text-[#222950]"><?php echo $row['name'] ?><span class="bn ml-3 text-sm text-[#8094AA]">(<?php echo $row['piece'] ?>p)</span></h4>
            <!-- price -->

            <input class="rounded-full border border-[#EBEDF5] px-4 py-2 text-[#393d58] outline-none w-[100px] text-center" type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

        </div>
        <div class="mb-5 flex gap-8">
            <div>
                <input type="radio" id="box" name="product_type" value="<?php echo $row['piece'] ?>" checked />
                <label class="bn font-semibold text-[#8A94A6]" for="box"><?php echo $row['box_type'] ?></label>
            </div>
            <div>
                <input type="radio" id="pc" name="product_type" value="1" />
                <label class="bn font-semibold text-[#8A94A6]" for="pc">পিচ</label><br />
            </div>
        </div>
        <div class="mb-5 flex flex-col gap-2 rounded-lg border border-[#EBEDF5] px-3 py-2">
            <p class="bn flex items-center justify-between text-sm font-semibold text-[#595F84]">মোট : <span class="text-red-500 bn total-price"><?php echo $row['price'] ?></span></p>
            <hr class="border-[#EBEDF5]" />
            <p class="bn flex items-center justify-between text-sm font-semibold text-[#595F84]">প্রতি পিস : <span class="text-red-500 bn"><?php echo $row['per_piece'] ?></span></p>
        </div>
        <div class="mb-4 flex justify-between gap-4">
            <button class="tran flex h-[50px] min-w-[50px] items-center justify-center rounded-lg bg-[#F2F3F9] hover:bg-blue-500 group" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                <ion-icon class="text-2xl text-[#007AFF] group-hover:text-white tran" name="remove-outline"></ion-icon>
            </button>
            <input class="quantity tran w-full rounded-lg border-2 border-[#EBEDF5] text-center outline-none focus:border-blue-500" min="0" name="quantity" value="1" type="number" />
            <button class="tran flex h-[50px] min-w-[50px] items-center justify-center rounded-lg bg-[#F2F3F9] hover:bg-blue-500 group" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                <ion-icon class="text-2xl text-[#007AFF] group-hover:text-white tran" name="add-outline"></ion-icon>
            </button>
        </div>

        <button type="#" class="tran w-full rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] py-3.5 font-semibold text-white focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Add to cart</button>
    </div>
</div>