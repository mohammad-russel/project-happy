<!DOCTYPE html>
<html lang="en">

<head>
    <?php @include "components/head.php"; ?>
    <title>Dealer List</title>
</head>

<body>
    <div class="dealer-list">
        <div class="dealer-list__title-area">
            <a href="../">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20.5" cy="20.5" r="20.5" fill="#F7F7FA" />
                    <path d="M23 15L17 21L23 27" stroke="#8A94A6" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <h3 class="dealser-list__title-area-title">Dealer List</h3>
            <a href="#">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div>
        <div class="dealer-list__items">

            <a href="pages/check-summery">
                <div class="dealer-list__item">
                    <div class="dealer-list__person">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group 4910">
                                <rect id="Rectangle 33" width="38" height="38" rx="10" fill="#E9F7FD" />
                                <g id="Group 4920">
                                    <path id="Vector" d="M22.195 15.1138C22.068 16.826 20.7701 18.2228 19.3451 18.2228C17.9202 18.2228 16.6199 16.8263 16.4952 15.1138C16.3657 13.3326 17.6287 12.0048 19.3451 12.0048C21.0615 12.0048 22.3245 13.365 22.195 15.1138Z" stroke="#0472ED" stroke-width="1.44203" stroke-linecap="round" stroke-linejoin="round" />
                                    <path id="Vector_2" d="M19.3452 20.2953C16.5277 20.2953 13.6681 21.8498 13.1389 24.7839C13.0751 25.1376 13.2753 25.477 13.6454 25.477H25.045C25.4155 25.477 25.6156 25.1376 25.5518 24.7839C25.0223 21.8498 22.1627 20.2953 19.3452 20.2953Z" stroke="#0472ED" stroke-width="1.44203" stroke-miterlimit="10" />
                                </g>
                            </g>
                        </svg>

                        <h3 class="dealer-list__item-title">মোহাম্মদ নাজমুল আলী</h3>
                    </div>
                    <div class="dealer-list__btn-ctontainer">
                        <button class="dealer-list__btn">
                            <span>Total SR</span> <span>(4)</span>
                        </button>
                        <button class="dealer-list__btn">
                            <span>Product</span> <span>(4)</span>
                        </button>
                    </div>
                </div>
            </a>

        </div>
    </div>
</body>

</html>