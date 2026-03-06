<template>
    <div class="fixed xl:bottom-28 bottom-[74px] md:bottom-[84px] xl:right-[26px] md:right-4 right-2 z-[100] space-y-4">
        <a :href="whatappLink" target="_blank" rel="noopener noreferrer nofollow"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center relative z-10 box-chatapp">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-full h-full relative z-10 rounded-full overflow-hidden shadow-sm">
                <path
                    d="M12.2116 0.01194C7.47256 0.01194 11.7015 -0.014925 10.9224 0.01194C10.1432 0.0388051 8.63954 0.0924666 7.86041 0.280532C7.08129 0.468597 6.03399 0.737138 5.22821 1.14003C4.42243 1.54291 3.56294 2.16068 2.8646 2.85902C2.16626 3.55735 1.57539 4.38993 1.14561 5.22262C0.715835 6.05532 0.420414 7.02218 0.286117 7.80111C0.151819 8.58003 0.0569552 10.1282 0.0175247 10.9168C-0.0219058 11.7054 0.0175247 7.34953 0.0175247 12.206C0.0175247 17.0625 0.0175247 30.9319 0.0175247 35.7884C0.0175247 40.6449 -0.0219058 36.289 0.0175247 37.0776C0.0569552 37.8662 0.0980512 39.3605 0.286117 40.1396C0.474182 40.9187 0.742723 41.966 1.14561 42.7718C1.5485 43.5776 2.16626 44.4371 2.8646 45.1354C3.56294 45.8337 4.39552 46.4246 5.22821 46.8544C6.0609 47.2842 7.02777 47.5796 7.80669 47.7139C8.58562 47.8482 10.1338 47.943 10.9224 47.9825C11.711 48.0219 7.35512 47.9825 12.2116 47.9825C17.0681 47.9825 30.9375 47.9825 35.794 47.9825C40.6505 47.9825 36.2946 48.0219 37.0832 47.9825C37.8718 47.943 39.3661 47.9019 40.1452 47.7139C40.9243 47.5258 41.9716 47.2573 42.7774 46.8544C43.5832 46.4515 44.4426 45.8337 45.141 45.1354C45.8393 44.4371 46.4302 43.6045 46.86 42.7718C47.2898 41.9391 47.5852 40.9722 47.7195 40.1933C47.8538 39.4144 47.9612 37.8299 47.9881 37.0776C48.0149 36.3254 47.9881 40.5274 47.9881 35.7884C47.9881 31.0494 47.9881 16.9451 47.9881 12.206C47.9881 7.46697 48.0149 11.6959 47.9881 10.9168C47.9612 10.1376 47.9075 8.63395 47.7195 7.85483C47.5314 7.0757 47.2629 6.0284 46.86 5.22262C46.4571 4.41685 45.8393 3.55735 45.141 2.85902C44.4426 2.16068 43.6101 1.5698 42.7774 1.14003C41.9447 0.710251 40.9778 0.414829 40.1989 0.280532C39.42 0.146235 37.8355 0.0388047 37.0832 0.01194C36.331 -0.0149246 40.533 0.01194 35.794 0.01194C31.0549 0.01194 16.9506 0.01194 12.2116 0.01194Z"
                    fill="url(#paint0_linear_17971_2302)" />
                <path
                    d="M32.7321 26.5477C32.3023 26.3328 30.1536 25.3122 29.7775 25.151C29.4015 24.9899 29.0792 24.9362 28.8106 25.3659C28.542 25.7957 27.6825 26.7626 27.4676 27.0312C27.1991 27.2998 26.9842 27.3535 26.5544 27.1386C26.1247 26.9237 24.728 26.494 23.0627 25.0436C21.7735 23.9155 20.914 22.5188 20.6454 22.0891C20.3768 21.6593 20.6454 21.4445 20.8603 21.2296C21.0752 21.0147 21.29 20.7461 21.5049 20.4775C21.7198 20.2089 21.7735 20.0478 21.9347 19.7792C22.0958 19.5106 21.9884 19.242 21.8809 19.0271C21.7735 18.8123 20.914 16.7173 20.538 15.8578C20.1619 15.052 19.8396 15.1594 19.571 15.1057C19.3025 15.1057 19.0339 15.1057 18.7653 15.1057C18.4967 15.1057 18.0132 15.2131 17.6372 15.6429C17.2612 16.0726 16.1331 17.0933 16.1331 19.1883C16.1331 21.2833 17.6909 23.2709 17.9058 23.5932C18.1206 23.8618 20.9677 28.1593 25.2652 29.9857C26.2858 30.4154 27.0916 30.684 27.7362 30.8989C28.7569 31.2212 29.7238 31.1675 30.4759 31.0601C31.2817 30.9526 33.0544 30.0394 33.3767 29.0725C33.7527 28.1055 33.7527 27.2461 33.6453 27.0849C33.4304 26.87 33.1618 26.7626 32.7321 26.5477ZM24.5131 37.6137C21.9347 37.6137 19.4636 36.9154 17.2612 35.6261L16.724 35.3038L11.3521 36.7005L12.8025 31.4898L12.4802 30.9526C11.0835 28.6965 10.3315 26.118 10.3315 23.4321C10.3315 15.6429 16.724 9.30411 24.5669 9.30411C28.2734 9.30411 31.8726 10.7545 34.5585 13.4404C37.2444 16.1263 38.6948 19.6718 38.6948 23.4321C38.6948 31.2212 32.3023 37.6137 24.5131 37.6137ZM36.5998 11.3991C33.3767 8.17603 29.0792 6.40332 24.5131 6.40332C15.1124 6.40332 7.43069 14.0313 7.43069 23.4321C7.43069 26.4403 8.23646 29.3411 9.68686 31.9196L7.26953 40.7294L16.2942 38.3658C18.7653 39.7087 21.6123 40.4608 24.4594 40.4608C33.8601 40.4608 41.5419 32.8328 41.5419 23.4321C41.5956 18.9197 39.8229 14.6222 36.5998 11.3991Z"
                    fill="white" />
                <defs>
                    <linearGradient id="paint0_linear_17971_2302" x1="24.019" y1="0.0224552" x2="24.019" y2="47.95"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#62FA7F" />
                        <stop offset="0.6865" stop-color="#22CC40" />
                        <stop offset="1" stop-color="#05B723" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="absolute inset-0 rounded-full pulse-green shadow-green-500/50"></div>
            <div class="absolute inset-0 rounded-full pulse-green delay-700 shadow-green-500/40"></div>
        </a>
        <a :href="phoneLink" target="_blank" rel="noopener noreferrer nofollow"
            class="group duration-300 ease-in-out relative z-10 box-phone block">
            <div
                class="relative rounded-full bg-primary shadow-sm w-10 h-10 md:w-12 md:h-12 flex items-center justify-center">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="relative z-10 block">
                    <rect width="32" height="32" rx="16" fill="url(#paint0_radial_10750_3329)"></rect>
                    <g clip-path="url(#clip0_10750_3329)">
                        <path
                            d="M22.7162 18.5022C21.7366 18.5022 20.7747 18.349 19.8633 18.0478C19.4167 17.8954 18.8676 18.0352 18.595 18.3151L16.796 19.6732C14.7096 18.5595 13.4245 17.2748 12.326 15.204L13.6441 13.4519C13.9865 13.1099 14.1094 12.6103 13.9622 12.1415C13.6597 11.2253 13.506 10.2639 13.506 9.28392C13.5061 8.57596 12.9301 8 12.2222 8H9.28387C8.57596 8 8 8.57596 8 9.28387C8 17.3985 14.6016 24 22.7162 24C23.4241 24 24 23.424 24 22.7161V19.786C24 19.0781 23.424 18.5022 22.7162 18.5022Z"
                            fill="white"></path>
                    </g>
                </svg>
                <span
                    class="absolute right-0 h-12 w-12 rounded-full lg:group-hover:w-[180px] bg-primary duration-300 z-[-1] ease-in-out overflow-hidden hidden md:flex items-center pl-4 text-white body-1">
                    +84909981381
                </span>
            </div>
            <div class="absolute inset-0 rounded-full pulse-primary shadow-primary-500/50"></div>
            <div class="absolute inset-0 rounded-full pulse-primary delay-700 shadow-primary-500/40"></div>
        </a>
    </div>
</template>

<script>
export default {
    computed: {
        whatappLink() {
            return this.$page?.props?.global?.general_whatapp_link ?? 'https://wa.me/84909981381'
        },
        phoneLink() {
            return this.$page?.props?.global?.general_phone_link ?? 'tel:+84 909981381'
        },
        zaloLink() {
            return this.$page?.props?.global?.general_zalo_link ?? 'https://zalo.me/0909981381'
        },
    },
}
</script>

<style scoped>
.pulse-green {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    animation: pulse-green 2s infinite;
}

.pulse-primary {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    animation: pulse-primary 2s infinite;
}

.delay-700 {
    animation-delay: 0.7s;
}

@keyframes pulse-green {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(98, 250, 127, 0.7);
    }

    70% {
        transform: scale(1.1);
        box-shadow: 0 0 0 8px rgba(168, 85, 247, 0);
    }

    100% {
        transform: scale(1.1);
        box-shadow: 0 0 0 0 rgba(168, 85, 247, 0);
    }
}

@keyframes pulse-primary {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgb(96, 20, 10, 0.5);
    }

    70% {
        transform: scale(1.1);
        box-shadow: 0 0 0 8px rgba(96, 20, 10, 0);
    }

    100% {
        transform: scale(1.1);
        box-shadow: 0 0 0 0 rgba(168, 85, 247, 0);
    }
}

.box-chatapp,
.box-phone {
    transition: all 0.3s ease;
}

.box-chatapp:hover,
.box-phone:hover {
    transform: scale(1.1);
}
</style>
