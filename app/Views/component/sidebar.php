<div class="w-full items center justify-between flex bg-white">
    <span class="mt-2 text-gray-900 p-4 text-4xl top-5 left-4 cursor-pointer lg:hidden w-full" onClick="Open()">
        <i class="fa-solid fa-bars px-2 lg:hidden"></i>
    </span>
    <div class="avatar lg:hidden">
        <div class="w-16 my-2 mr-4 rounded-full">
            <img src="<?=base_url('img/' . $barber['foto'])?>" alt="logo" />
        </div>
    </div>
</div>

<div
    class="sidebar z-50 transition-transform duration-500 ease-in-out fixed top-0 bottom-0 lg:left-0 left-[-250px] p2 w-[250px] lg:w-[300px] overflow-y-auto text-center bg-gradient-to-r from-stone-950 to-slate-800">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex justify-between items-center gap-4">
            <div class="col-xl-4 flex justify-center gap-4 col-lg-2 col-md-3 items-center">
                <img src="<?=base_url('assets/img/logo/logo.png')?>" class="w-16 ms-24" alt="logo">
                <h1 class="text-green-700 font-bold text-lg">Barbershop</h1>
            </div>
            <nav class="lg:hidden"> <i class="fa-solid fa-xmark mx-4 mt-2.5 cursor-pointer rouded" onClick="Open()"></i>
            </nav>
        </div>
    </div>
    <a href="<?=base_url('pegawai');?>">
        <div class="p-2.5 mx-auto mt-3 flex items-center rounded-md px-4 duration-300
    cursor-pointer w-[98%] <?=$title == 'Dashboard' ? 'bg-green-700 ' : '';?> hover:bg-green-700 text-white">
            <i class="fa-solid text-xl fa-house"></i>
            <span class="text-[15x] ml-4 text-white">Dashboard</span>

        </div>
    </a>
    <a href="<?=base_url('pegawai/jadwal');?>">
        <div class="p-2.5 mt-3 mx-auto w-[98%] flex items-center rounded-md px-4 duration-300
    cursor-pointer <?=$title == 'Jadwal' ? 'bg-green-700 ' : '';?> hover:bg-green-700 text-white">
            <i class="fa-solid fa-calendar-days text-xl"></i>
            <span class="text-[15x] ml-4 text-white">Jadwal</span>

        </div>
    </a>
    <a href="<?=base_url('pegawai/histori');?>">
        <div class="p-2.5 mt-3 flex items-center mx-auto w-[98%]  rounded-md px-4 duration-300 <?=$title == 'Histori' ? 'bg-green-700 ' : '';?>
    cursor-pointer hover:bg-green-700 text-white">
            <i class="fa-solid fa-receipt text-xl"></i>
            <span class="text-[15x] ml-4 text-white">Histori</span>

        </div>
    </a>

    <a href="<?=base_url('pegawai/profil');?>">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 mx-auto w-[98%] duration-300 <?=$title == 'Profil' ? 'bg-green-700 ' : '';?>
    cursor-pointer hover:bg-green-700 text-white">
            <i class="fa-solid text-xl fa-user"></i>
            <span class="text-[15x] ml-4 text-white">Profil</span>

        </div>
    </a>
    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 mx-auto w-[98%]
    cursor-pointer hover:bg-green-700 text-white">
        <i class="fa-solid fa-right-from-bracket text-xl"></i>
        <span class="text-[15x] ml-4 text-white"><a href="/logout">Logout</a></span>
    </div>
</div>