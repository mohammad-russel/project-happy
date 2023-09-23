<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>happy</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="public/image/favicon.ico" type="public/image/x-icon">
    <!-- google font "Plus Jakarta Sans" cdn for english-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- google font "Plus Jakarta Sans" cdn for English-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <!-- taiwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="public/css/main.css">

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <!-- animate aos cdn -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Dark mode script on head -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style type="text/css">
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: initial;
        }

        .bn {
            font-family: 'Baloo Da 2', cursive;

        }

        .nav-item.opennav {
            right: 1rem;
            transition: .3s;
            animation: nav .2s linear .2s;
        }

        @keyframes nav {
            0% {
                right: 1.5rem;
            }

            100% {
                right: 1rem;
            }
        }

        .overlay.show {
            display: block;
            transition: .3s;
        }

        .sub-menu:hover .sub-menu-item {
            visibility: visible;
            top: 65px;
            opacity: 1;
        }

        @media screen and (max-width: 1024px) {
            .sub-menu-item {
                display: none;
                padding: 10px;
                border-radius: 10px;
                background: #3b82f617;
                margin-top: 10px;
            }

            .sub-menu-item.show-subMenu {
                display: block;

            }

            .sub-menu-item li {
                margin-bottom: 5px;
            }
        }

        ::-moz-selection {
            /* Code for Firefox */
            color: #377dff;
            background: #377dff1a;
        }

        ::selection {
            color: #377dff;
            background: #377dff1a;
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }



        .faqContent {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .happy {
            background: linear-gradient(to right, #0472ed 20%, #8973f4 30%, #ff565e 70%, #f6bd4b 80%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-fill-color: transparent;
            background-size: 500% auto;
            animation: animation 5s ease-in-out infinite alternate;
        }

        @keyframes animation {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
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
    </style>

</head>

<body class="bg-white dark:bg-gray-900">

    <div class="overlay fixed inset-0 bg-black/20 backdrop-blur-sm dark:bg-slate-900/80 z-10 hidden" onclick="removenav()"></div>
    <!-- =========== header start =========== -->

    <header class="h-[80px] lg:h-[90px] bg-white dark:bg-[#212B44]" id="menu-area">
        <nav class="my-container flex h-full items-center justify-between">
            <!-- logo -->
            <div class="lg:w-[25%]">
                <img class="dark:hidden" src="public/image/logo-black.svg" alt="" />
                <img class="hidden dark:block" src="public/image/logo-white.svg" alt="" />
            </div>
            <!-- menu -->
            <div class="nav-item flex flex-col p-8 bg-white dark:bg-[#212B44] shadow-lg lg:shadow-none z-10 rounded-lg w-[280px] fixed top-4 lg:top-0 right-[-500px] lg:right-0 lg:relative lg:flex-row lg:justify-between lg:p-0 lg:items-center lg:bg-transparent lg:w-[80%] xl:w-[75%]">
                <div class="">
                    <ul class="flex gap-4 lg:gap-6 flex-col lg:flex-row">

                        <li class="flex justify-between"><a href="#" class="menu-item border-b !text-blue-400 border-b-blue-400 !font-[600] bn">ডিলার</a><img onclick="removenav()" src="public/image/icon/close.svg" alt="close icon" class="w-9 lg:hidden"></li>
                        <li><a href="#" class="menu-item bn">দোকানদার</a></li>
                        <li><a href="#" class="menu-item bn">বিক্রয় প্রতিনিধি</a></li>
                        <li><a href="#" class="menu-item bn">সরবরাহকারী</a></li>
                        <li><a href="#" class="menu-item bn">আমাদের সম্পর্কে</a></li>
                        <li class="relative sub-menu"><a href="#" class="menu-item bn flex items-center gap-1.5" onclick="submenu()">আরো<ion-icon name="chevron-down-outline"></ion-icon></a>

                            <ul class="sub-menu-item lg:absolute lg:top-[70px] tran lg:bg-white dark:bg-[#2c3957] lg:p-4 lg:w-[160px] lg:left-0 flex flex-col gap-2 rounded-lg lg:shadow-lg lg:invisible lg:opacity-0">
                                <li><a href="#" class="menu-item bn font-normal text-sm">বিক্রয় প্রতিনিধি</a></li>
                                <li><a href="#" class="menu-item bn font-normal text-sm">সরবরাহকারী</a></li>
                                <li><a href="#" class="menu-item bn font-normal text-sm">আমাদের সম্পর্কে</a></li>
                            </ul>

                        </li>
                    </ul>
                </div>
                <!-- right -->
                <div class="flex justify-between items-center gap-5 mt-6 lg:mt-0 md:mt-0">

                    <!-- dark mood button -->

                    <div class="bg-[#F6F8FC] text-[#8A94A6] dark:bg-[#191F34] border border-[#EFF1F6] dark:border-[#363F5E] w-10 h-10 flex justify-center items-center rounded-full hover:bg-slate-200 tran">
                        <ion-icon name="sunny-outline" class="happy-light text-xl cursor-pointer w-full h-full p-2 text-slate-500 dark:text-slate-400"></ion-icon>
                        <ion-icon name="moon-outline" class="happy-dark text-xl cursor-pointer w-full h-full p-2 text-slate-500 dark:text-slate-400"></ion-icon>
                    </div>
                    <!-- dark mood button END -->

                    <a href="#" class="primary-btn bn">যোগাযোগ</a>
                </div>
            </div>
            <!-- responsive -->
            <div class="lg:hidden" onclick="opennav()">
                <img src="public/image/icon/menu.svg" class="w-9" alt="" />
            </div>
        </nav>
    </header>

    <!-- =========== header END =========== -->


    <!-- =========== hero start =========== -->
    <section class="bg-[#F6F8FC] dark:bg-[#191F34] py-16 md:py-28">
        <!-- hero text -->
        <div class="my-container flex flex-col items-center px-6 text-center md:flex-row md:text-left md:justify-between">
            <div class="md:w-[50%]">
                <span class="lg:text-[20px] font-semibold text-[#595F84] dark:text-[#ABB0CE] block mb-5" data-aos="fade-right">" Be happy stay happy "</span>
                <h1 class="mb-5 text-[30px] sm:text-[40px] md:text-[35px] lg:text-[50px] font-[700] text-[#222950] dark:text-white" data-aos="fade-right" data-aos-delay="50">Grow your business <br> with <span class="text-[#0472ED] happy">Happy</span></h1>
                <p class="text-sm lg:text-base text-[#595F84] dark:text-[#888DAD] mb-10 max-w-lg" data-aos="fade-right" data-aos-delay="100">Happy envisions revolutionizing B2B logistics with cutting-edge technology, empowering businesses to grow effortlessly and achieve their fullest potential in the retail industry.</p>
                <a href="#" class="flex justify-center md:justify-start" onclick="getstart()">
                    <button class="primary-btn bn flex items-center gap-3 !pr-2.5">এখুনি শুরু করুন <ion-icon class="text-[30px]" name="arrow-forward-circle"></ion-icon></button>
                </a>
            </div>
            <div class="mt-10 md:w-[40%] p-6 sm:p-10 md:p-0">
                <img class="w-full" src="public/image/hero-img.svg" alt="" data-aos="fade-left">
            </div>
        </div>

        <!-- get started popup -->
        <div class="getstart popup_bg popup">

            <div class="relative mt-20 rounded-xl bg-white p-10 min-w-[315px] sm:min-w-[580px]">

                <ion-icon onclick="closeP()" class="absolute -top-16 right-0 h-6 w-6 text-blue-600 p-2 bg-white overflow-hidden rounded-full cursor-pointer" name="close-outline"></ion-icon>

                <h1 class="mb-10 text-center font-semibold bn text-[#222950] text-[18px]">আপনার শিল্প নির্বাচন করুন</h1>
                <div class="xs:grid-cols-3 grid grid-cols-2 gap-7">
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#5A6CF3]/10 text-[#5A6CF3] p-[20px] group-hover:scale-90 tran" name="storefront"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">দোকানদার</span>
                    </a>
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#FF725C]/10 text-[#FF725C] p-[20px] group-hover:scale-90 tran" name="people"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">বিক্রয় প্রতিনিধি</span>
                    </a>
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#2DCA8C]/10 text-[#2DCA8C] p-[20px] group-hover:scale-90 tran" name="bicycle"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">সরবরাহকারী</span>
                    </a>
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#0472ED]/10 text-[#0472ED] p-[20px] group-hover:scale-90 tran" name="person"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">দোকানদার</span>
                    </a>
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#5A6CF3]/10 text-[#5A6CF3] p-[20px] group-hover:scale-90 tran" name="business"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">কোম্পানি</span>
                    </a>
                    <a href="#" class="flex flex-col items-center group">
                        <ion-icon class="mb-3 h-10 w-10 rounded-3xl bg-[#FF725C]/10 text-[#FF725C] p-[20px] group-hover:scale-90 tran" name="settings"></ion-icon>
                        <span class="block text-center font-medium bn text-[#595F84] group-hover:text-blue-600 tran">মেইন্টেইনার</span>
                    </a>

                </div>
            </div>

        </div>
        <!-- hero image -->
    </section>

    <!-- =========== hero END =========== -->

    <!-- =========== trusted by =========== -->

    <section class="max-w-7xl px-4 sm:px-6 mx-auto py-16">
        <div class="flex items-center justify-between mb-8 sm:justify-start">
            <h2 class="text-[#222950] dark:text-[#DBE0FF] capitalize font-semibold text-[26px] mb-3 sm:mr-5 md:text-[30px] md:font-bold">trusted by</h2>
            <a href="#" class="tran bg-[#EBF5FF] dark:bg-slate-800 text-[#007AFF] px-4 py-1 rounded-full hover:bg-[#007AFF] hover:text-white text-sm font-medium flex justify-between gap-2 items-center">See All Brand <ion-icon name="chevron-forward-outline"></ion-icon></a>
        </div>
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-4 md:grid-cols-6 lg:gap-8" data-aos="fade-up">
            <img class="brand_logo" src="public/image/brand/b1.png" alt="logo">
            <img class="brand_logo" src="public/image/brand/b2.png" alt="logo">
            <img class="brand_logo" src="public/image/brand/b3.png" alt="logo">
            <img class="brand_logo" src="public/image/brand/b4.png" alt="logo">
            <img class="brand_logo" src="public/image/brand/b5.png" alt="logo">
            <img class="brand_logo" src="public/image/brand/b6.png" alt="logo">
        </div>
    </section>

    <!-- =========== trusted by END =========== -->


    <!-- =========== Services =========== -->

    <section class="my-container py-16 md:py-28">
        <!-- heading text -->
        <div class="flex flex-col items-center text-center" data-aos="fade-up">
            <div class="flex items-center gap-3">
                <div class="h-[2px] w-6 rounded-full bg-slate-300 dark:bg-slate-700"></div>
                <span class="text-[#007AFF] bn font-semibold">পরিষেবাগুলি</span>
                <div class="h-[2px] w-6 rounded-full bg-slate-300 dark:bg-slate-700"></div>
            </div>
            <h1 class="my-4 text-xl font-semibold text-[#222950] dark:text-white md:text-3xl lg:text-4xl bn">আপনাদের জন্য আমাদের উপলব্ধ পরিষেবাগুলি</h1>
            <p class="text-sm text-[#8A94A6] dark:text-slate-400 max-w-lg md:max-w-xl bn">"আমাদের প্রাথমিক পরিষেবাগুলি সম্পর্কে গভীরভাবে জানার জন্য অনুগ্রহ করে পড়া চালিয়ে যান৷আপনার যদি কোনো জিজ্ঞাসা বা উদ্বেগ থাকে, তাহলে আমাদের সাথে যোগাযোগ করতে দ্বিধা করবেন না ৷"</p>
        </div>

        <!-- porisheba box -->
        <div class="mt-7 md:mt-12 grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:px-12 xl:px-20">
            <div class="s-box tran" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p1.svg" alt="icon" />
                <h4 class="s-box-h4 bn">দোকানদার</h4>
                <p class="s-box-p bn">ফাস্ট-মুভিং কনজিউমার গুডস (এফএমসিজি) খুচরা বিক্রেতারা নির্দিষ্ট চ্যালেঞ্জের মুখোমুখি হয় যা ডেটা</p>
                <span class="s-box-link tran bn" onclick="popup1()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>

            </div>
            <div class="s-box tran !shadow-xl !shadow-blue-900/5 !border !border-blue-500/30" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p2.svg" alt="icon" />
                <h4 class="s-box-h4 bn ">বিক্রয় প্রতিনিধি</h4>
                <p class="s-box-p bn">একজন বিক্রয় প্রতিনিধির ভূমিকা ক্রমশ চ্যালেঞ্জিং এবং জটিল হয়ে উঠছে, বিশেষ করে আজকের</p>
                <span class="s-box-link tran bn" onclick="popup2()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>

            </div>
            <div class="s-box tran" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p3.svg" alt="icon" />
                <h4 class="s-box-h4 bn ">ডিলার</h4>
                <p class="s-box-p bn">ফাস্ট-মুভিং কনজিউমার গুডস (FMCG) শিল্পে বন্টন সমস্যা সমাধান করতে, আপনি ভোক্তাদের চাহিদার</p>
                <span class="s-box-link tran bn" onclick="popup3()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>
            </div>
            <div class="s-box tran" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p4.svg" alt="icon" />
                <h4 class="s-box-h4 bn ">TSM</h4>
                <p class="s-box-p bn">উন্নত সাপ্লাই চেইন ম্যানেজমেন্ট: হ্যাপির লজিস্টিক পরিষেবাগুলি কোম্পানিগুলিকে পরিবহন</p>
                <span class="s-box-link tran bn" onclick="popup4()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>
            </div>
            <div class="s-box tran" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p5.svg" alt="icon" />
                <h4 class="s-box-h4 bn ">কোম্পানি</h4>
                <p class="s-box-p bn">Happy's B2B রিটেইল লজিস্টিকস, সেলস রিপ্রেজেন্টেটিভ পারফরম্যান্স</p>
                <span class="s-box-link tran bn" onclick="popup5()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>
            </div>
            <div class="s-box tran" data-aos="zoom-in">
                <img class="mb-6 h-8 w-8 object-contain" src="public/image/icon/p6.svg" alt="icon" />
                <h4 class="s-box-h4 bn ">ব্যবস্থাপনা</h4>
                <p class="s-box-p bn">আমরা সমস্ত নেতৃস্থানীয় ব্র্যান্ড প্রোডাক্ট নিয়ে কাজ করি. আপনার দোকানের তাকগুলির</p>
                <span class="s-box-link tran bn" onclick="popup6()">আরও জানুন <ion-icon name="chevron-forward-outline"></ion-icon></span>
            </div>
        </div>

        <!-- Popup 1 -->
        <div class="popup1 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p1.svg" alt="">
                        <h1 class="popup_h1 bn">দোকানদার</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">
                        ইনভেন্টরি ম্যানেজমেন্ট: FMCG খুচরা বিক্রেতারা তাদের ইনভেন্টরি আরও কার্যকরভাবে পরিচালনা করতে ডেটা ব্যবহার করতে পারে। বিক্রয় ডেটা এবং স্টক স্তর বিশ্লেষণ করে, খুচরা বিক্রেতারা নিশ্চিত করতে পারে যে তাদের সঠিক সময়ে স্টকে সঠিক পণ্য রয়েছে, স্টক-আউট এবং ওভারস্টকিং হ্রাস করে। <br> <br>
                        চাহিদার পূর্বাভাস: FMCG খুচরা বিক্রেতারা তাদের পণ্যের চাহিদার পূর্বাভাস দিতে ডেটা ব্যবহার করতে পারে। ঐতিহাসিক বিক্রয় ডেটা এবং বাজারের প্রবণতা বিশ্লেষণ করে, খুচরা বিক্রেতারা সঠিকভাবে ভবিষ্যতের চাহিদা ভবিষ্যদ্বাণী করতে পারে, তাদের জায় স্তর এবং উত্পাদন সময়সূচী সেই অনুযায়ী সামঞ্জস্য করতে সক্ষম করে।<br> <br>
                        প্রচার অপ্টিমাইজেশান: FMCG খুচরা বিক্রেতারা তাদের প্রচারমূলক কৌশলগুলি অপ্টিমাইজ করতে ডেটা ব্যবহার করতে পারে। বিক্রয় ডেটা এবং ভোক্তাদের আচরণ বিশ্লেষণ করে, খুচরা বিক্রেতারা বিক্রয় বাড়ানোর জন্য সবচেয়ে কার্যকর প্রচার এবং ডিসকাউন্ট সনাক্ত করতে পারে।<br> <br>
                        গ্রাহকের আনুগত্য: FMCG খুচরা বিক্রেতারা গ্রাহকের আনুগত্য উন্নত করতে ডেটা ব্যবহার করতে পারে। গ্রাহকের আচরণ এবং পছন্দগুলি বিশ্লেষণ করে, খুচরা বিক্রেতারা ব্যক্তিগতকৃত বিপণন প্রচারাভিযান এবং আনুগত্য প্রোগ্রাম তৈরি করতে পারে যা গ্রাহকদের ফিরে আসতে উত্সাহিত করে।
                    </p>
                </div>
            </div>
        </div>
        <!-- Popup 2 -->
        <div class="popup2 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p2.svg" alt="">
                        <h1 class="popup_h1 bn">বিক্রয় প্রতিনিধি</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">
                        একজন বিক্রয় প্রতিনিধির ভূমিকা ক্রমশ চ্যালেঞ্জিং এবং জটিল হয়ে উঠছে, বিশেষ করে আজকের প্রতিযোগিতামূলক বাজারে। বিক্রয় প্রতিনিধিরা প্রায়শই প্রত্যাখ্যান, গ্রাহকদের সাথে সম্পর্ক তৈরি করা, পণ্যের জ্ঞানের সাথে আপ টু ডেট থাকা, বিক্রয় লক্ষ্য পূরণ এবং আরও অনেক কিছুর মতো অনেক চ্যালেঞ্জের মুখোমুখি হন। এই চ্যালেঞ্জগুলি ভয়ঙ্কর হতে পারে, তবে ডেটা ব্যবহার করে, এই চ্যালেঞ্জগুলি মোকাবেলা করা যেতে পারে! কিভাবে ?<br><br>
                        ডেটা বিক্রয় প্রতিনিধিদের মূল্যবান অন্তর্দৃষ্টিতে অ্যাক্সেস প্রদান করতে পারে, তাদের জন্য কার্যকরভাবে দায়িত্ব পালন করা সহজ করে তোলে। উদাহরণস্বরূপ, গ্রাহক জনসংখ্যা, ক্রয়ের ইতিহাস এবং অনলাইন আচরণ বিশ্লেষণ করে সম্ভাব্য গ্রাহকদের সনাক্ত করতে ডেটা ব্যবহার করা যেতে পারে। গ্রাহকদের উপর তাদের ফোকাস সংকুচিত করে যারা তাদের অফার করা পণ্য বা পরিষেবাগুলিতে আগ্রহী হওয়ার সম্ভাবনা বেশি, বিক্রয় প্রতিনিধিরা তাদের দায়িত্বে আরও দক্ষ এবং উত্পাদনশীল হতে পারে।<br><br>
                        বিক্রয় প্রতিনিধিরা অতীতের বিক্রয় কর্মক্ষমতা এবং অ্যাকাউন্ট কার্যকলাপের ডেটা বিশ্লেষণ করে উপার্জনের সম্ভাবনার উপর ভিত্তি করে অ্যাকাউন্টগুলিকে অগ্রাধিকার দিতে পারে। এটি করার মাধ্যমে, তারা তাদের সময় এবং সংস্থানগুলি আরও কার্যকরভাবে পরিচালনা করতে পারে এবং প্রতিটি অ্যাকাউন্টের প্রাপ্য মনোযোগ দিতে পারে।
                    </p>
                </div>
            </div>
        </div>
        <!-- Popup 3 -->
        <div class="popup3 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p3.svg" alt="">
                        <h1 class="popup_h1 bn">ডিলার</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">
                        ফাস্ট-মুভিং কনজিউমার গুডস (FMCG) শিল্পে বন্টন সমস্যা সমাধান করতে, আপনি ভোক্তাদের চাহিদার অন্তর্দৃষ্টি পেতে এবং আপনার বিতরণ নেটওয়ার্ক অপ্টিমাইজ করতে ডেটা ব্যবহার করতে পারেন। এখানে কিছু পদক্ষেপ আপনি নিতে পারেন: <br><br>
                        ভোক্তাদের পছন্দ, আচরণ এবং চাহিদার ধরণগুলির উপর ডেটা সংগ্রহ এবং বিশ্লেষণ করুন। চাহিদার পূর্বাভাস দিতে এবং আপনার ইনভেন্টরি লেভেল এবং সাপ্লাই চেইন অপ্টিমাইজ করতে ভবিষ্যদ্বাণীমূলক বিশ্লেষণ ব্যবহার করুন। সর্বোত্তম বিতরণ অবস্থান এবং রুট সনাক্ত করতে ভৌগলিক তথ্য সিস্টেম (GIS) ডেটা ব্যবহার করুন। রিয়েল-টাইমে ইনভেন্টরি, শিপমেন্ট এবং ডেলিভারি ট্র্যাক করার জন্য একটি শক্তিশালী ডিস্ট্রিবিউশন ম্যানেজমেন্ট সিস্টেম প্রয়োগ করুন। উন্নতির সুযোগগুলি সনাক্ত করতে এবং সেই অনুযায়ী আপনার বিতরণ কৌশল সামঞ্জস্য করতে ক্রমাগতভাবে পর্যবেক্ষণ এবং বিশ্লেষণ করুন। আপনার বিতরণ কৌশল অবহিত করার জন্য ডেটা ব্যবহার করে, আপনি নিশ্চিত করতে পারেন যে আপনি সঠিক সময়ে সঠিক গ্রাহকদের কাছে সঠিক পণ্য সরবরাহ করছেন, যেখানে অপচয় কমিয়ে এবং লাভ সর্বাধিক করা যায়।
                    </p>
                </div>
            </div>
        </div>
        <!-- Popup 4 -->
        <div class="popup4 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p4.svg" alt="">
                        <h1 class="popup_h1 bn">TSM</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">উন্নত সাপ্লাই চেইন ম্যানেজমেন্ট: হ্যাপির লজিস্টিক পরিষেবাগুলি কোম্পানিগুলিকে পরিবহন, গুদামজাতকরণ এবং বিতরণ প্রক্রিয়াগুলি অপ্টিমাইজ করে তাদের সাপ্লাই চেইন ম্যানেজমেন্ট উন্নত করতে সাহায্য করতে পারে। এর ফলে গ্রাহকদের কাছে দ্রুত এবং আরও নির্ভরযোগ্য ডেলিভারি, কম খরচ এবং সামগ্রিক দক্ষতা উন্নত হতে পারে। রিয়েল-টাইম ট্র্যাকিং এবং রিপোর্টিং: হ্যাপির আধুনিক ড্যাশবোর্ড রিয়েল-টাইম ডেটা এবং মূল লজিস্টিক এবং পণ্য ডেটা মেট্রিক্সের রিপোর্টিং প্রদান করে। এটি কোম্পানিগুলিকে তাদের ইনভেন্টরি লেভেল, সেলস পারফরম্যান্স এবং ডেলিভারি স্ট্যাটাস সম্পর্কে আপ-টু-ডেট থাকতে এবং তাদের ক্রিয়াকলাপ সম্পর্কে অবগত সিদ্ধান্ত নিতে দেয়। উন্নত গ্রাহক অভিজ্ঞতা: নির্ভরযোগ্য এবং দক্ষ লজিস্টিক পরিষেবা প্রদান করে, হ্যাপি কোম্পানিগুলিকে তাদের গ্রাহক অভিজ্ঞতা উন্নত করতে সাহায্য করতে পারে। এটি গ্রাহকের সন্তুষ্টি, বিশ্বস্ততা এবং পুনরাবৃত্তি ব্যবসার দিকে পরিচালিত করতে পারে।</p>
                </div>
            </div>
        </div>
        <!-- Popup 5 -->
        <div class="popup5 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p5.svg" alt="">
                        <h1 class="popup_h1 bn">কোম্পানি</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">Happy's B2B রিটেইল লজিস্টিকস, সেলস রিপ্রেজেন্টেটিভ পারফরম্যান্স, ডিলারের পারফরম্যান্স, আধুনিক ড্যাশবোর্ড এবং প্রোডাক্ট ডেটা একটি এরিয়া সেলস ম্যানেজারকে বিভিন্ন সুবিধা প্রদান করতে পারে, যার মধ্যে রয়েছে: বিক্রয় কর্মক্ষমতার মধ্যে উন্নত দৃশ্যমানতা: হ্যাপির আধুনিক ড্যাশবোর্ড রিয়েল-টাইম ডেটা এবং মূল বিক্রয় মেট্রিক্সের রিপোর্টিং প্রদান করে, এরিয়া সেলস ম্যানেজারদের তাদের দলের পারফরম্যান্স ট্র্যাক করতে এবং উন্নতির জন্য ক্ষেত্রগুলি সনাক্ত করতে দেয়।</p>
                </div>
            </div>
        </div>
        <!-- Popup 6 -->
        <div class="popup6 popup_bg popup">
            <div class="popup_box">
                <div class="popup_header">
                    <div class="flex items-center">
                        <img class="w-5 mr-2" src="public/image/icon/p6.svg" alt="">
                        <h1 class="popup_h1 bn">ব্যবস্থাপনা</h1>
                    </div>
                    <ion-icon class="popup_icon" name="close-outline" onclick="closeP()"></ion-icon>
                </div>
                <div class="px-6 py-5">
                    <p class="popup_p bn">6ইনভেন্টরি ম্যানেজমেন্ট: FMCG খুচরা বিক্রেতারা তাদের ইনভেন্টরি আরও কার্যকরভাবে পরিচালনা করতে ডেটা ব্যবহার করতে পারে। বিক্রয় ডেটা এবং স্টক স্তর বিশ্লেষণ করে, খুচরা বিক্রেতারা নিশ্চিত করতে পারে যে তাদের সঠিক সময়ে স্টকে সঠিক পণ্য রয়েছে, স্টক-আউট এবং ওভারস্টকিং হ্রাস করে।চাহিদার পূর্বাভাস: FMCG খুচরা বিক্রেতারা তাদের পণ্যের চাহিদার পূর্বাভাস দিতে ডেটা ব্যবহার করতে পারে। ঐতিহাসিক বিক্রয় ডেটা এবং বাজারের প্রবণতা বিশ্লেষণ করে, খুচরা বিক্রেতারা সঠিকভাবে ভবিষ্যতের চাহিদা ভবিষ্যদ্বাণী করতে পারে, তাদের জায় স্তর এবং উত্পাদন সময়সূচী সেই অনুযায়ী সামঞ্জস্য করতে সক্ষম করে।</p>
                </div>
            </div>
        </div>

        <div class="bg-[#F6F8FC] dark:bg-[#191F34] flex py-10 px-7 md:py-12 md:px-12 flex-col items-start rounded-xl md:rounded-2xl mt-12 md:mt-32 md:flex-row md:gap-4 md:items-center md:justify-between" data-aos="fade-up">
            <div class="mb-5 md:mb-0">
                <h1 class="text-xl mb-2 font-bold text-[#222950] dark:text-white lg:text-3xl bn">আপনার ব্যবসা উন্নত করতে <span class="text-[#0472ED] bn">যোগাযোগ করুন</span></h1>
                <p class="text-sm text-[#595F84] dark:text-slate-400 sm:max-w-sm md:text-base bn lg:font-medium">এটি কীভাবে কাজ করে এবং এটি কী করে সে সম্পর্কে প্রশ্নগুলি প্রায়শই জিজ্ঞাসা করা হয়।</p>
            </div>
            <a href="#">
                <button class="primary-btn bn flex items-center gap-3 !pr-2.5">এখুনি শুরু করুন <ion-icon class="text-[30px]" name="arrow-forward-circle"></ion-icon></button>
            </a>
        </div>
    </section>


    <!-- =========== Services END =========== -->


    <!-- =========== About =========== -->

    <section class="my-container pb-16 md:py-28">
        <div class="flex flex-col md:flex-row md:gap-10 lg:gap-20">
            <div class="mb-7 md:mb-0 md:w-2/5 md:max-h-[380px]" data-aos="zoom-in">
                <img class="sm:mb-0 p-10 md:p-0 w-full h-full object-contain" src="public/image/what.png" alt="">
            </div>
            <div class="flex flex-col gap-6 md:w-3/5" data-aos="fade-up">
                <span class="text-[#007AFF] flex items-center gap-3 font-semibold bn">পরিচিতি <div class="h-[2px] w-3 rounded-full bg-slate-300 dark:bg-slate-700"></div></span>
                <h1 class="text-2xl font-semibold text-[#222950] dark:text-white md:text-3xl lg:text-4xl bn">কি এবং কিভাবে কাজ করে !</h1>
                <p class="text-slate-600 dark:text-[#ABB0CE] font-semibold text-sm pl-4 border-l-4 border-[#0472ED] sm:max-w-lg lg:text-base bn">এটি কীভাবে কাজ করে এবং এটি কী করে সে সম্পর্কে প্রশ্নগুলি প্রায়শই জিজ্ঞাসা করা হয়।</p>
                <p class="text-slate-500 dark:text-[#888DAD] text-sm bn lg:text-base">Happy হল একটি পেশাদার B2B রিটেল লজিস্টিক প্ল্যাটফর্ম যা ব্যবসার বৃদ্ধিতে সাহায্য করার জন্য অত্যাধুনিক প্রযুক্তি ব্যবহার করে। আমরা আমাদের ক্লায়েন্টদের একটি নির্বিঘ্ন এবং দক্ষ অভিজ্ঞতা প্রদান করতে প্রতিশ্রুতিবদ্ধ যা নির্ভরযোগ্যতা, আধুনিকতা এবং সামর্থ্যের সমন্বয় করে। আমাদের প্ল্যাটফর্মের প্রতিটি দিক আমাদের ক্লায়েন্টদের চাহিদা মেটাতে ডিজাইন করা হয়েছে, এবং আমরা তাদের সাফল্যের যাত্রায় তাদের সাথে অংশীদার হতে পেরে সম্মানিত। <br> <br> আমরা বিশ্বাস করি যে দক্ষতা এবং অত্যাধুনিক প্রযুক্তির মিশ্রণের মাধ্যমে আমরা আমাদের ক্লায়েন্টদের তাদের স্বপ্নকে বাস্তবায়িত করতে সাহায্য করতে পারি। আমরা আমাদের ক্লায়েন্টদের সর্বোত্তম পরিষেবা প্রদান করছি তা নিশ্চিত করতে আমরা ক্রমাগত উদ্ভাবন এবং আমাদের প্ল্যাটফর্মের উন্নতি করছি। আমরা আত্মবিশ্বাসী যে হ্যাপি হল B2B রিটেল লজিস্টিক প্ল্যাটফর্ম যা আপনার ব্যবসার বৃদ্ধি এবং সফল হতে সাহায্য করতে পারে।</p>
            </div>
        </div>
    </section>

    <!-- =========== About END =========== -->



    <!-- =========== FAQ =========== -->
    <section class="py-16 md:py-28 bg-[#FAFBFC] dark:bg-[#191F34]">
        <div class="my-container lg:px-12 xl:px-20">
            <!-- heading text -->
            <div class="flex flex-col items-center text-center mb-7 sm:mb-10 md:mb-14" data-aos="fade-up">
                <div class="flex items-center gap-3">
                    <div class="h-[2px] w-6 rounded-full bg-slate-300 dark:bg-slate-700"></div>
                    <span class="text-[#007AFF] bn font-semibold">FAQs</span>
                    <div class="h-[2px] w-6 rounded-full bg-slate-300 dark:bg-slate-700"></div>
                </div>
                <h1 class="my-4 text-2xl font-semibold text-[#222950] dark:text-white md:text-3xl lg:text-4xl bn">প্রায়শই জিজ্ঞাসিত প্রশ্ন এবং উত্তর</h1>
            </div>

            <div class="flex flex-col gap-6 max-w-4xl mx-auto">
                <!-- single -->
                <div class="tran faq-box " data-aos="zoom-in">
                    <div class="faqHeading faq-h">
                        <button class="faq-ht bn">আমি একজন খুচরা বিক্রেতা আমার কি কোনো পরিবহন খরচ দিতে হবে পণ্য নেওয়ার জন্য?</button>
                        <ion-icon class="faq-icon" name="chevron-down-outline"></ion-icon>
                    </div>

                    <div class="faqContent bg-white bn dark:bg-[#212945]">
                        <p class="faq-p bn">আপনাকে নির্ভরযোগ্যতা, আধুনিকতা এবং সাশ্রয়ী মূল্যের সমন্বয়ে একটি নিরবচ্ছিন্ন এবং দক্ষ অভিজ্ঞতা প্রদান করতে নিবেদিত৷ আমাদের প্ল্যাটফর্মের প্রতিটি ক্ষেত্রে স্পষ্ট, এবং আপনার সাফল্যের যাত্রায় আপনার সাথে অংশীদার হতে পেরে আমরা সম্মানিত ৷</p>
                    </div>
                </div>
                <!-- single -->
                <div class="tran faq-box " data-aos="zoom-in">
                    <div class="faqHeading faq-h">
                        <button class="faq-ht bn">আমি একজন খুচরা বিক্রেতা আমার কি কোনো পরিবহন খরচ দিতে হবে পণ্য নেওয়ার জন্য?</button>
                        <ion-icon class="faq-icon" name="chevron-down-outline"></ion-icon>
                    </div>

                    <div class="faqContent bg-white bn dark:bg-[#212945]">
                        <p class="faq-p bn">আপনাকে নির্ভরযোগ্যতা, আধুনিকতা এবং সাশ্রয়ী মূল্যের সমন্বয়ে একটি নিরবচ্ছিন্ন এবং দক্ষ অভিজ্ঞতা প্রদান করতে নিবেদিত৷ আমাদের প্ল্যাটফর্মের প্রতিটি ক্ষেত্রে স্পষ্ট, এবং আপনার সাফল্যের যাত্রায় আপনার সাথে অংশীদার হতে পেরে আমরা সম্মানিত ৷</p>
                    </div>
                </div>
                <!-- single -->
                <div class="tran faq-box " data-aos="zoom-in">
                    <div class="faqHeading faq-h">
                        <button class="faq-ht bn">আমি একজন খুচরা বিক্রেতা আমার কি কোনো পরিবহন খরচ দিতে হবে পণ্য নেওয়ার জন্য?</button>
                        <ion-icon class="faq-icon" name="chevron-down-outline"></ion-icon>
                    </div>

                    <div class="faqContent bg-white bn dark:bg-[#212945]">
                        <p class="faq-p bn">আপনাকে নির্ভরযোগ্যতা, আধুনিকতা এবং সাশ্রয়ী মূল্যের সমন্বয়ে একটি নিরবচ্ছিন্ন এবং দক্ষ অভিজ্ঞতা প্রদান করতে নিবেদিত৷ আমাদের প্ল্যাটফর্মের প্রতিটি ক্ষেত্রে স্পষ্ট, এবং আপনার সাফল্যের যাত্রায় আপনার সাথে অংশীদার হতে পেরে আমরা সম্মানিত ৷</p>
                    </div>
                </div>
                <!-- single -->
                <div class="tran faq-box" data-aos="zoom-in">
                    <div class="faqHeading faq-h">
                        <button class="faq-ht bn">আমি একজন খুচরা বিক্রেতা আমার কি কোনো পরিবহন খরচ দিতে হবে পণ্য নেওয়ার জন্য?</button>
                        <ion-icon class="faq-icon" name="chevron-down-outline"></ion-icon>
                    </div>

                    <div class="faqContent bg-white bn dark:bg-[#212945]">
                        <p class="faq-p bn">আপনাকে নির্ভরযোগ্যতা, আধুনিকতা এবং সাশ্রয়ী মূল্যের সমন্বয়ে একটি নিরবচ্ছিন্ন এবং দক্ষ অভিজ্ঞতা প্রদান করতে নিবেদিত৷ আমাদের প্ল্যাটফর্মের প্রতিটি ক্ষেত্রে স্পষ্ট, এবং আপনার সাফল্যের যাত্রায় আপনার সাথে অংশীদার হতে পেরে আমরা সম্মানিত ৷</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- =========== FAQ END =========== -->



    <!-- =========== Contact =========== -->

    <section class="py-16 md:py-28">
        <div class="my-container max-w-7xl mx-auto px-4 sm:px-6">
            <!-- counter -->
            <div class="bg-gradient-to-t from-blue-500/5 p-10 m-4 rounded-2xl grid gap-12 sm:grid-cols-2 md:grid-cols-4" data-aos="fade-up">
                <div class="flex flex-col items-center gap-3 text-center">
                    <h1 class="font-bold text-3xl md:text-4xl bn text-[#3E80FB]">500+</h1>
                    <p class="font-semibold text-[#4E5D78] dark:text-slate-300 dark:font-medium bn text-sm sm:text-base">বর্তমান ব্যবহারকারী</p>
                </div>
                <div class="flex flex-col items-center gap-3 text-center">
                    <h1 class="font-bold text-3xl md:text-4xl bn text-[#34C98F]">500+</h1>
                    <p class="font-semibold text-[#4E5D78] dark:text-slate-300 dark:font-medium bn text-sm sm:text-base">বর্তমান ব্যবহারকারী</p>
                </div>
                <div class="flex flex-col items-center gap-3 text-center">
                    <h1 class="font-bold text-3xl md:text-4xl bn text-[#755FE2]">500+</h1>
                    <p class="font-semibold text-[#4E5D78] dark:text-slate-300 dark:font-medium bn text-sm sm:text-base">বর্তমান ব্যবহারকারী</p>
                </div>
                <div class="flex flex-col items-center gap-3 text-center">
                    <h1 class="font-bold text-3xl md:text-4xl bn text-[#FF565E]">500+</h1>
                    <p class="font-semibold text-[#4E5D78] dark:text-slate-300 dark:font-medium bn text-sm sm:text-base">বর্তমান ব্যবহারকারী</p>
                </div>
            </div>
            <!-- END counter -->

            <!-- contact form -->

            <div class="py-16 md:py-28 lg:px-12 xl:px-20">
                <div class="flex flex-col gap-14 sm:flex-row sm:justify-between sm:gap-4">
                    <div class="flex flex-col gap-6 md:w-3/5 sm:w-[40%] md:max-w-[370px]" data-aos="fade-right">
                        <span class="bn flex items-center gap-3 font-semibold text-[#007AFF]">
                            <div class="h-[2px] w-3 rounded-full bg-slate-300 dark:bg-slate-700"></div>যোগাযোগ
                        </span>
                        <h1 class="bn text-2xl font-semibold text-[#222950] dark:text-white md:text-3xl lg:text-4xl">সরাসরি আমাদের সাথে যোগাযোগ করুন !</h1>
                        <p class="bn mb-10 text-sm text-slate-500 dark:text-slate-400 lg:text-base">পণ্য অনুসন্ধানের জন্য বা একটি ব্যবসার প্রস্তাব জমা দেওয়ার জন্য, দয়া করে আমাদের কাছে পৌঁছানোর জন্য নীচের ফর্মটি ব্যবহার করুন।</p>
                        <img class="w-40" src="public/image/contact.png" alt="" />
                    </div>

                    <!-- form -->
                    <div class="relative" data-aos="fade-up">
                        <div class="relative rounded-xl bg-white dark:bg-[#212B44] px-6 py-8 shadow-xl shadow-blue-900/5 hover:shadow-blue-900/10 tran sm:px-12 sm:py-12 md:min-w-[380px] lg:min-w-[480px] h-fit overflow-hidden">
                            <div style="background: linear-gradient(236deg, #5fabff, #ffbc25, #ff565e);" class="absolute left-0 top-0 h-[4px] w-full"></div>
                            <form class="space-y-4 sm:space-y-6" action="#" method="#">
                                <div class="relative">
                                    <ion-icon class="absolute left-3 top-[16px] sm:left-4 w-5 text-xl text-[#595F84]" name="person-outline"></ion-icon>
                                    <input id="name" name="name" type="text" autocomplete="name" required placeholder="আপনার নাম লিখুন" class="form-input bn" />
                                </div>
                                <div class="relative">
                                    <ion-icon class="absolute left-3 top-[16px] sm:left-4 w-5 text-xl text-[#595F84]" name="mail-outline"></ion-icon>
                                    <input id="email" name="email" type="email" autocomplete="email" required placeholder="আপনার ইমেইল লিখুন" class="form-input bn" />
                                </div>
                                <div class="relative">
                                    <ion-icon class="absolute left-3 top-[16px] sm:left-4 w-5 text-xl text-[#595F84]" name="chatbox-ellipses-outline"></ion-icon>
                                    <textarea name="message" id="message" class="form-input min-h-[150px] bn" placeholder="আপনার মেসেজ লিখুন"></textarea>
                                </div>

                                <button type="submit" class="bn font-semibold w-full rounded-lg bg-[#0472ED] py-3 text-white hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition-all duration-300">জমা দিন</button>
                            </form>
                        </div>
                        <img class="absolute -z-10 w-52 -left-24 -bottom-11 sm:-left-10" src="public/image/dot.svg" alt="">
                    </div>

                </div>
            </div>

            <!-- END contact form -->

        </div>
    </section>

    <!-- =========== Contact END =========== -->



    <!-- =========== Footer =========== flex flex-col gap-12 sm:flex-row sm:flex-wrap lg:justify-between-->
    <footer class="pt-16 md:pt-28 pb-10 bg-[#F9FAFB] dark:bg-[#191F34]" data-aos="fade-up">
        <div class="my-container">
            <div class="grid gap-12 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-11">
                <div class="md:col-span-2 lg:col-span-3">
                    <h2 class="f-heading">Contact info</h2>
                    <ul class="space-y-5">
                        <li class="flex items-center gap-4">
                            <ion-icon class="min-w-[20px] h-[20px] p-[8px] rounded-full bg-white dark:bg-[#2B334F] shadow-lg text-[#3796FF]" name="call"></ion-icon>
                            <span class="f-link">01700000000</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <ion-icon class="min-w-[20px] h-[20px] p-[8px] rounded-full bg-white dark:bg-[#2B334F] shadow-lg text-[#3796FF]" name="mail"></ion-icon>
                            <span class="f-link">info@happybd.online</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <ion-icon class="min-w-[20px] h-[20px] p-[8px] rounded-full bg-white dark:bg-[#2B334F] shadow-lg text-[#3796FF]" name="location"></ion-icon>
                            <span class="f-link max-w-[15rem]">kakramari bazar 6270/6271 charghat, 6000 rajshahi</span>
                        </li>
                    </ul>
                </div>
                <div class="md:col-span-1 lg:col-span-2">
                    <h2 class="f-heading">Company</h2>
                    <ul class="space-y-3">
                        <li><a class="f-link" href="#">About</a></li>
                        <li><a class="f-link" href="#">Tutorials</a></li>
                        <li><a class="f-link" href="#">Careers</a></li>
                        <li><a class="f-link" href="#">Our Timeline</a></li>
                    </ul>
                </div>
                <div class="md:col-span-1 lg:col-span-2">
                    <h2 class="f-heading">legal info</h2>
                    <ul class="space-y-3">
                        <li><a class="f-link" href="#">Support</a></li>
                        <li><a class="f-link" href="#">Terms Conditions</a></li>
                        <li><a class="f-link" href="#">Privacy Policy</a></li>
                        <li><a class="f-link" href="#">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="md:col-span-1 lg:col-span-2">
                    <h2 class="f-heading">Quick link</h2>
                    <ul class="space-y-3">
                        <li><a class="f-link hover:text-slate-600" href="#">Support</a></li>
                        <li><a class="f-link" href="#">Terms Conditions</a></li>
                        <li><a class="f-link" href="#">Privacy Policy</a></li>
                        <li><a class="f-link" href="#">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="md:col-span-2 lg:col-span-2">
                    <img class="h-16 w-24 animate-pulse rounded-xl bg-white dark:bg-[#2B334F] p-3 shadow-xl shadow-blue-900/5 dark:hidden" src="public/image/logo-black.svg" alt="" />
                    <img class="h-16 w-24 animate-pulse rounded-xl bg-white dark:bg-[#2B334F] p-3 shadow-xl shadow-blue-900/5 hidden dark:block" src="public/image/logo-white.svg" alt="" />
                    <div class="mt-9 flex gap-4">
                        <a href="#"><img class="h-10 w-10 duration-300 hover:scale-90" src="public/image/icon/facebook.svg" alt="" /></a>
                        <a href="#"><img class="h-10 w-10 duration-300 hover:scale-90" src="public/image/icon/twitter.svg" alt="" /></a>
                        <a href="#"><img class="h-10 w-10 duration-300 hover:scale-90" src="public/image/icon/insta.svg" alt="" /></a>
                        <a href="#"><img class="h-10 w-10 duration-300 hover:scale-90" src="public/image/icon/pinterest.svg" alt="" /></a>
                    </div>
                </div>
            </div>

            <hr class="my-10 dark:border-slate-700" />

            <div class="flex justify-between gap-2 items-center">
                <p class="text-sm text-[#818CA0]">Copyright 2023 © <a href="#" class="text-[#595F84] dark:text-[#E6E6E6] underline hover:text-blue-500 tran"> happybd.online </a> All rights reserved</p>
                <div class="tran flex items-center bg-white dark:bg-[#2B334F] w-fit min-w-max px-2 sm:px-3 gap-2 rounded-full h-9 shadow-xl shadow-blue-900/5 cursor-pointer hover:-translate-y-1" onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
                    <ion-icon class="text-lg text-[#595F84] dark:text-[#9EB1C7]" name="arrow-up-circle-outline"></ion-icon>
                    <span class="text-sm text-[#9396A8] dark:text-[#9EB1C7] hidden sm:block">Back to Top</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- =========== Footer END =========== -->




    <script src="public/js/script.js"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            once: true,
        });
    </script>

    <script>
        var coll = document.getElementsByClassName("faqHeading");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var faqContent = this.nextElementSibling;
                if (faqContent.style.maxHeight) {
                    faqContent.style.maxHeight = null;
                } else {
                    faqContent.style.maxHeight = faqContent.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>