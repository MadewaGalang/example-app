<div>
    <div class="grid bg-white overflow-hidden p-4 sm:p-8">
        
        <!-- Header -->
        <div class="grid pt-4 mt-10">
            <p class="text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">
                TENTANG KAMI
            </p>
        </div>

        <!-- Content -->
        <div class="mx-auto mt-8 mb-12 grid max-w-7xl grid-cols-1 gap-6 md:grid-cols-2 px-4 sm:px-6 lg:px-8">
            
            <!-- TEXT -->
            <div class="flex flex-col justify-center">
                <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    VENDREDI SAINT
                </p>

                <p class="mt-4 text-base leading-7 text-gray-600">
                    Vendredi Saint adalah brand fashion yang hadir untuk memenuhi kebutuhan gaya 
                    berpakaian modern yang elegan dan penuh percaya diri. Kami menghadirkan koleksi 
                    pakaian berkualitas tinggi yang dirancang untuk mencerminkan kepribadian dan gaya 
                    hidup pelanggan kami. Dengan identitas brand yang kuat, Vendredi Saint berkomitmen 
                    untuk memberikan pengalaman berbelanja yang menyenangkan dan memuaskan bagi 
                    setiap pelanggannya.
                </p>

                <dl class="mt-6 space-y-6 text-gray-600">

                    <div class="relative pl-9">
                        <dt class="inline font-semibold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24"
                                class="absolute left-1 top-1 h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248Z"/>
                            </svg>
                            Stay Stylish, Stay Confident
                        </dt>
                    </div>

                    <div class="relative pl-9">
                        <dt class="inline font-semibold text-gray-900">
                            <svg class="absolute left-1 top-1 h-5 w-5 text-black" fill="currentColor">
                                <path
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
                            </svg>
                            Discover Your Perfect Look
                        </dt>
                    </div>

                    <div class="relative pl-9">
                        <dt class="inline font-semibold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="absolute left-1 top-1 h-5 w-5 text-black">
                                <path
                                d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                            </svg>
                            Upgrade Your Style with VDST
                        </dt>
                    </div>

                </dl>
            </div>

            <!-- SLIDER -->
            <div class="flex justify-center"
                x-data='{
                    images: [
                        "/asset/img/image1.png",
                        "/asset/img/image2.png",
                        "/asset/img/image3.png",
                        "/asset/img/image4.png"
                    ],
                    active: 0
                }'
                x-init="setInterval(() => active = (active + 1) % images.length, 3000)"
            >

                <div class="relative w-full max-w-sm h-[350px] overflow-hidden rounded-xl shadow-xl">

                    <template x-for="(img, index) in images" :key="index">
                        <img 
                            :src="img"
                            x-show="active === index"
                            x-transition.opacity.duration.700ms
                            class="w-full h-full object-cover absolute top-0 left-0"
                        >
                    </template>

                </div>

            </div>

        </div>
    </div>
</div>