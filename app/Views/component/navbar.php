<?php if (session()->get('role') == 'pelanggan'): ?>
<!--? Header Start -->
<div class="header-area header-transparent w-full pt-20">
    <div class=" main-header header-sticky">
        <div class="container-fluid">
            <div class="flex items-center lg:justify-normal justify-between">
                <!-- Logo -->
                <div class="col-xl-4 hidden lg:flex justify-center gap-4 col-lg-2 col-md-3 items-center"
                    data-aos="fade-right">
                    <div class="logo">
                        <img src="<?=base_url('assets/img/logo/logo.png')?>" alt="logo">
                    </div>
                    <h1 class="text-yellow-400 brand text-4xl font-bold">Abdurrachman</h1>
                    <h1 class="text-green-700 text-4xl font-bold">Barbershop</h1>
                </div>
                <div class="lg:hidden mx-4 relative">
                    <div>
                        <i onClick="toogleDropdown()"
                            class="fa-solid fa-bars hover:text-green-600 text-green-700 text-6xl"></i>
                    </div>
                    <div id="dropdown"
                        class="hidden transition duration-700 ease-in-out w-[330px] mt-[16px] absolute border-solid border-gray-600 shadow-md rounded py-10 opacity-0 bg-white">
                        <ul class="ml-16 text-2xl flex flex-col gap-4">
                            <li><a class="no-underline hover:text-green-600" href="#dashboard">Beranda</a></li>
                            <li><a class="no-underline hover:text-green-600" href="#about">Tentang
                                    Kami</a></li>
                            <li><a class="no-underline hover:text-green-600" href=" #layanan">Layanan</a></li>
                            <li><a class="no-underline hover:text-green-600" href="#galeri">Galeri</a></li>
                        </ul>
                    </div>
                </div>
                <div class="avatar online lg:hidden hover:brightness-50 mx-4">
                    <div class="w-24 rounded-full" onClick="showDialog()">
                        <img src="img/<?=$pelanggan['foto'];?>" />
                    </div>
                </div>
                <div class="w-full absolute">
                    <div id="dialog" onClick="hideDialog()"
                        class="fixed w-full h-screen top-0 start-0 bg-black bg-opacity-50 opacity-0 hidden transition-opacity duration-700 ">
                        <div class="bg-gray-100 overflow-hidden rounded-2xl mx-auto w-[340px] mt-48">
                            <div class="w-full bg-stone-900 flex justify-start items-center gap-2">
                                <div class="my-4 ms-4">
                                    <div class="w-24">
                                        <img src="<?=base_url('assets/img/logo/logo.png')?>" />
                                    </div>
                                </div>
                                <h1 class="text-2xl font-bold text-yellow-600">Abdurrachman</h1>
                                <h1 class="text-2xl font-bold text-green-700">Barbershop</h1>
                                <i onClick="hideDialog()"
                                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-200 fa-xmark"></i>
                            </div>
                            <hr>
                            <div>
                                <div class="w-full bg-white flex rounded-t-2xl justify-start items-center gap-4">
                                    <div class="avatar online my-4 ms-6">
                                        <div class="w-20 rounded-full">
                                            <img src="img/<?=$pelanggan['foto'];?>" />
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <h1 class="text-xl font-semibold text-stone-900 antialiased">
                                            <?=$pelanggan['nama'];?></h1>
                                        <h1 class=" text-lg mt-2 text-stone-900 antialiased"><?=$akun['email'];?>
                                        </h1>
                                    </div>
                                    <!-- <div>
                                        <i
                                            class="fa-light px-2 relative py-1 rounded-full hover:bg-grey-200 fa-bell cursor-pointer text-3xl ms-12">
                                            <div class="absolute w-2 rounded-full bg-red-500 h-2 top-2 end-2"></div>
                                        </i>
                                    </div> -->

                                </div>
                                <hr class="shadow-lg mb-4">
                                <div class="bg-gray-100 ms-2 flex flex-col cursor-pointer justify-center text-2xl pb-8">

                                    <a href="/pesanan" class="hover:text-stone-900">
                                        <div class="hover:bg-slate-200 transition duration-500 ease-in-out"><i
                                                class="fa-solid fa-table-list px-4 py-4"></i></i>Pesanan</div>
                                    </a>
                                    <a href="/histori" class="hover:text-stone-900">
                                        <div class="hover:bg-slate-200 transition duration-500 ease-in-out"><i
                                                class="fa-solid fa-receipt py-4 px-4"></i>Histori
                                        </div>
                                    </a>
                                    <a href="/profil" class="hover:text-stone-900">
                                        <div class="hover:bg-slate-200 transition duration-500 ease-in-out"><i
                                                class="fa-solid py-4 fa-user px-4"></i>Profil
                                        </div>
                                    </a>

                                    <a class="hover:text-stone-900" href="/logout">
                                        <div class="hover:bg-slate-200 transition duration-500 ease-in-out"><i
                                                class="fa-solid fa-right-from-bracket py-4 px-4"></i>Logout</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-10 col-md-9 ms-[-100px] hidden lg:block">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav id="list-example ">
                                <ul id="navigation">

                                    <li class="nav-link active"><a class="no-underline" href="#dashboard">Beranda</a>
                                    </li>
                                    <li class="nav-link"><a class="no-underline" href="#about">Tentang
                                            Kami</a>
                                    </li>
                                    <li class="nav-link"><a class="no-underline" href=" #layanan">Layanan</a></li>
                                    <li class="nav-link"><a href="#galeri">Galeri</a>

                                    <li>
                                        <div onClick="showDialog()"
                                            class="avatar online cursor-pointer py-2 px-2 rounded-full active:bg-gray-700 hover:brightness-50 mx-10 mt-[-40px] hidden lg:block absolute">
                                            <div class="w-24 rounded-full">
                                                <img src="img/<?=$pelanggan['foto'];?>" />
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <?php else: ?>
    <!--? Header Start -->
    <div class="header-area header-transparent w-full justify-between pt-20">
        <div class=" main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-4 flex justify-center gap-4 col-lg-2 col-md-3 items-center"
                        data-aos="fade-right">
                        <div class="logo">
                            <img src="<?=base_url('assets/img/logo/logo.png')?>" alt="logo">
                        </div>
                        <h1 class="text-yellow-400 brand text-4xl font-bold">Abdurrachman</h1>
                        <h1 class="text-green-700 text-4xl font-bold">Barbershop</h1>
                    </div>
                    <div class="col-xl-8 col-lg-10 col-md-9">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav id="list-example">
                                    <ul id="navigation">

                                        <li class="nav-link active"><a class="no-underline"
                                                href="#dashboard">Beranda</a>
                                        </li>
                                        <li class="nav-link"><a class="no-underline" href="#about">Tentang
                                                Kami</a>
                                        </li>
                                        <li class="nav-link"><a class="no-underline" href=" #layanan">Layanan</a></li>
                                        <li class="nav-link"><a href="#galeri">Galeri</a>
                                        <li>
                                            <a class="login font-bold text-center text-2xl px-6 py-3 no-underline bg-green-700 text-white rounded-full hover:bg-green-800"
                                                href='../login'>Masuk / Daftar</a>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class=" col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <script>
        function toogleDropdown() {
            let dropdown = document.getElementById("dropdown");
            if (dropdown.classList.contains("opacity-0")) {
                dropdown.classList.remove("hidden");
                setTimeout(() => {
                    dropdown.classList.remove("opacity-0");
                }, 20);
                setTimeout(() => {
                    dialog.classList.add("opacity-100");
                }, 50);
            } else {
                dropdown.classList.remove("opacity-100");
                setTimeout(() => {
                    dropdown.classList.add("opacity-0");
                }, 20)
                setTimeout(() => {
                    dropdown.classList.add("hidden");
                }, 500)

            }

        }

        function showDialog() {
            let dialog = document.getElementById("dialog");
            dialog.classList.remove("hidden");
            setTimeout(() => {
                dialog.classList.add("opacity-100");
            }, 100);
        }

        function hideDialog() {
            let dialog = document.getElementById("dialog");
            dialog.classList.add("opacity-0");
            setTimeout(() => {
                dialog.classList.remove("opacity-100");

            }, 300);
            setTimeout(() => {
                dialog.classList.add("hidden");;

            }, 600);

        }
        </script>

        <!-- Header End -->