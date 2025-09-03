<template>
    <div class="fixed xl:bottom-40 bottom-[100px] xl:right-[32px] right-4 z-[100] space-y-3">
        <a
            :href="this.$page.props.global.general_message_fb_link ?? ''"
            target="_blank"
            rel="noopener noreferrer nofollow"
            class="w-12 h-12 rounded-full flex items-center justify-center"
        >
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="16" fill="#0068FF" />
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6.12353 20.2893L10.8235 12.8327C11.5712 11.6464 13.1721 11.351 14.2938 12.1923L18.032 14.996C18.375 15.2533 18.8468 15.2518 19.1884 14.9927L24.237 11.1612C24.9108 10.6498 25.7904 11.4562 25.3395 12.1718L20.6395 19.6285C19.8918 20.8147 18.2908 21.1102 17.1692 20.2688L13.4309 17.4651C13.088 17.2079 12.616 17.2093 12.2745 17.4685L7.22597 21.3C6.55209 21.8113 5.67247 21.0049 6.12353 20.2893Z"
                    fill="white"
                />
            </svg>
        </a>
        <a
            :href="this.$page.props.global.general_zalo_link ?? ''"
            target="_blank"
            rel="noopener noreferrer nofollow"
            class="w-12 h-12 rounded-full flex items-center justify-center"
        >
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="16" fill="#0068FF" />
                <path
                    d="M11.3939 11.88H5.16986V13.2146H9.48902L5.23046 18.4923C5.09702 18.6864 5 18.8684 5 19.2809V19.6206H10.8721C11.1633 19.6206 11.406 19.378 11.406 19.0868V18.3709H6.86842L10.8721 13.348C10.9328 13.2753 11.042 13.1418 11.0906 13.0812L11.1148 13.0447C11.3453 12.705 11.3939 12.4138 11.3939 12.062V11.88ZM19.316 19.6206H20.2017V11.88H18.8671V19.1717C18.8671 19.4144 19.0612 19.6206 19.316 19.6206ZM14.7544 13.6031C13.0801 13.6031 11.7212 14.962 11.7212 16.6363C11.7212 18.3106 13.0801 19.6694 14.7544 19.6694C16.4287 19.6694 17.7875 18.3106 17.7875 16.6363C17.7997 14.962 16.4408 13.6031 14.7544 13.6031ZM14.7544 18.4198C13.7716 18.4198 12.9709 17.619 12.9709 16.6363C12.9709 15.6536 13.7716 14.8528 14.7544 14.8528C15.7371 14.8528 16.5379 15.6536 16.5379 16.6363C16.5379 17.619 15.7492 18.4198 14.7544 18.4198ZM24.1449 13.5544C22.4584 13.5544 21.0875 14.9254 21.0875 16.6118C21.0875 18.2982 22.4584 19.6693 24.1449 19.6693C25.8313 19.6693 27.2023 18.2982 27.2023 16.6118C27.2023 14.9254 25.8313 13.5544 24.1449 13.5544ZM24.1449 18.4196C23.15 18.4196 22.3492 17.6188 22.3492 16.6239C22.3492 15.6291 23.15 14.8283 24.1449 14.8283C25.1398 14.8283 25.9405 15.6291 25.9405 16.6239C25.9405 17.6188 25.1398 18.4196 24.1449 18.4196Z"
                    fill="white"
                />
                <path
                    d="M17.0856 19.6204H17.8014V13.7725H16.5518V19.0987C16.5518 19.3778 16.7944 19.6204 17.0856 19.6204Z"
                    fill="white"
                />
            </svg>
        </a>
        <a
            :href="`tel:${this.$page.props.global.general_phone}`"
            rel="noopener noreferrer nofollow"
            class="w-12 h-12 rounded-full flex items-center justify-center"
        >
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="16" fill="url(#paint0_radial_10750_3329)" />
                <g clip-path="url(#clip0_10750_3329)">
                    <path
                        d="M22.7162 18.5022C21.7366 18.5022 20.7747 18.349 19.8633 18.0478C19.4167 17.8954 18.8676 18.0352 18.595 18.3151L16.796 19.6732C14.7096 18.5595 13.4245 17.2748 12.326 15.204L13.6441 13.4519C13.9865 13.1099 14.1094 12.6103 13.9622 12.1415C13.6597 11.2253 13.506 10.2639 13.506 9.28392C13.5061 8.57596 12.9301 8 12.2222 8H9.28387C8.57596 8 8 8.57596 8 9.28387C8 17.3985 14.6016 24 22.7162 24C23.4241 24 24 23.424 24 22.7161V19.786C24 19.0781 23.424 18.5022 22.7162 18.5022Z"
                        fill="white"
                    />
                </g>
                <defs>
                    <radialGradient
                        id="paint0_radial_10750_3329"
                        cx="0"
                        cy="0"
                        r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(3.5 6) rotate(42.3736) scale(38.5778 55.1989)"
                    >
                        <stop stop-color="#1DA89F" />
                        <stop offset="1" stop-color="#025E33" />
                    </radialGradient>
                    <clipPath id="clip0_10750_3329">
                        <rect width="16" height="16" fill="white" transform="translate(8 8)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
</template>
<script>
export default {}
</script>
