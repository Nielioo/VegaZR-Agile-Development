@section('title', '404 Not Found')

<x-guest-layout>
    <!-- Page Container -->
    <div id="page-container" class="flex flex-col mx-auto w-full min-h-screen">
        <!-- Page Content -->
        <main id="page-content" class="flex flex-auto flex-col max-w-full">
            <div class="min-h-screen flex items-center relative overflow-hidden">

                <!-- Error Content -->
                <div class="text-center space-y-10 relative container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
                    <div>
                        <div class="text-6xl md:text-9xl font-extrabold mb-10 md:mb-20 inline-block relative">
                            <span
                                class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-orange-400 relative">
                                404
                            </span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">
                            Oops.. halaman tidak ditemukan
                        </h2>
                        <p class="text-lg md:text-xl md:leading-relaxed font-medium text-gray-500 lg:w-2/3 mx-auto">
                            Mohon periksa kembali tautan yang Anda masukkan
                        </p>
                        <br>
                        <a href="{{ route('/') }}">
                            <x-primary-button class="w-fit">Kembali ke beranda</x-primary-button>
                        </a>
                    </div>
                </div>
                <!-- END Error Content -->
            </div>
        </main>
        <!-- END Page Content -->
    </div>
    <!-- END Page Container -->
</x-guest-layout>