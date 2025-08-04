<div class="w-full aspect-video relative overflow-hidden">

    <div class="">

        <img src="images/Jumbotron.jpg" alt="" class="absolute inset-0 w-full h-full aspect-video ">
        <div class="absolute inset-0 right-[25dvw] left-vignette opacity-90 transition-opacity duration-500">
        </div>
        <div class="absolute -bottom-[0.25dvw] z-10 w-full h-[30dvh] hero-vignette bg-top bg-[length:100%_100%]">
        </div>
    </div>
    <div class="absolute inset-0 w-full h-full">
        <div class="flex flex-col justify-end left-[4%] w-[36%] bottom-[35%] absolute top-0 ">
            <div class="  relative min-h-[13.2dvh]" id="title-wrapper">

                <img src="images/jumbotron-title.webp" alt="" class="w-full" draggable="false">
            </div>
            <div class="flex flex-col gap-2 mb-[1dvw]" id="text-wrap">
                <p class="text-white text-[1.6vw] tracking-wide font-semibold" id="heading">
                    {{ $headingInfo }}
                </p>
                <p class="text-white text-[1.2vw] tracking-wide font-normal">
                    {{ $subtitleInfo }}
                </p>
            </div>
            <div class="flex justify-start w-full mr-auto gap-[1dvw]  " id="cta-jumbotron">

                <livewire:primary-button text="Putar" icon="play" style="light" />

                <livewire:primary-button text="Selengkapnya" icon="info" style="dark" />
            </div>
        </div>
    </div>

</div>
