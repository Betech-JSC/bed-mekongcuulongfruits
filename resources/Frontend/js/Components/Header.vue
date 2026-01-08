<template>
    <header 
        class="fixed inset-x-0 top-0 z-[1000] transition-all duration-300" 
        :class="{ 'bg-brand-300 shadow-md': isScrolled || isToggleMenu }"
        @mouseleave="menuSelected = null"
    >
        <div class="relative h-full">
            <div class="container flex items-center justify-between py-2">
                <Logo />

                <ul class="hidden md:flex items-center xl:space-x-7 md:space-x-5">
                    <template v-for="(menu, index) in menus" :key="index">
                        <li
                            v-if="menu && menu.title !== ''"
                            @mouseover="setMenuSelected(menu)"
                            @mouseenter="setFirstSubMenu"
                            class="relative group"
                        >
                            <div
                                v-if="menu.subMenu && menu.subMenu.length > 0"
                                :href="menu.slug"
                                class="flex items-center gap-1 relative duration-150 ease-in-out py-1.5 px-3 rounded-[12px]"
                                :class="fullPath.includes(menu.slug) ? 'text-brand-100' : 'text-white lg:hover:bg-primary'"
                                @click="menuSelected = null"
                            >
                                <div>{{ menu.title }}</div>
                            </div>
                            <Link
                                v-else
                                :href="menu.slug"
                                class="flex items-center gap-1 relative duration-150 ease-in-out p-1.5 rounded-[12px]"
                                :class="fullPath.includes(menu.slug) ? 'text-brand-100' : 'text-white lg:hover:bg-primary'"
                                @click="menuSelected = null"
                            >
                                <div>{{ menu.title }}</div>
                            </Link>

                            <!-- Desktop Dropdown -->
                            <div 
                                v-if="menu.subMenu && menu.subMenu.length > 0"
                                class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 w-max"
                            >
                                <ul class="bg-white rounded-[12px] overflow-hidden py-3">
                                    <li v-for="(subItem, subIndex) in menu.subMenu" :key="subIndex">
                                        <Link 
                                            :href="subItem.slug"
                                            class="block px-4 py-2 body-2 text-gray-900 hover:bg-brand-200 hover:text-brand-500 transition-colors duration-300 ease-in-out"
                                            :class="{'bg-brand-50 text-brand-500': fullPath.includes(subItem.slug)}"
                                            @click="menuSelected = null"
                                        >
                                            {{ subItem.title }}
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </template>
                </ul>

                <div class="flex items-center justify-center">
                    <Link :href="route('contact')" class="max-lg:hidden btn btn-primary">Get in touch</Link>
                    <button @click="onToggleMenu()" class="lg:hidden">
                        <Hamburger :isToggleMenu="isToggleMenu" />
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                class="fixed md:top-[var(--header-height-md)] top-[var(--header-height-sm)] w-full h-full z-[1000] lg:hidden"
                :class="isToggleMenu ? 'right-0' : '-right-full'"
                style="transition: right 0.5s"
            >
                <div
                    class="w-full md:w-[50vw] h-full bg-primary-25 absolute z-30 duration-300 px-6 py-10 space-y-4"
                    :class="isToggleMenu ? 'right-0' : '-right-full'"
                    style="transition: right 0.5s"
                >
                    <ul class="space-y-4">
                        <template v-for="(menuMb, menuMbIndex) in menus" :key="menuMbIndex">
                            <li
                                class="flex flex-col py-2 border-b border-gray-100 last:border-0"
                                :class="fullPath.includes(menuMb.slug) ? 'text-primary-800' : 'text-primary-900'"
                            >
                                <div class="flex items-center justify-between w-full">
                                    <Link :href="menuMb.slug" @click="closeMenu()" class="flex-1">
                                        {{ menuMb.title }}
                                    </Link>
                                    <button 
                                        v-if="menuMb.subMenu && menuMb.subMenu.length > 0"
                                        @click="toggleMobileSubMenu(menuMbIndex)"
                                        class="p-2 -mr-2 text-primary-600 hover:text-primary-800 focus:outline-none"
                                    >
                                        <DropdownArrow 
                                            class="w-5 h-5 transition-transform duration-300"
                                            :class="{ 'rotate-180': activeMobileSubMenus.includes(menuMbIndex) }"
                                        />
                                    </button>
                                </div>

                                <!-- Mobile Submenu Accordion -->
                                <div 
                                    v-if="menuMb.subMenu && menuMb.subMenu.length > 0"
                                    class="overflow-hidden transition-[max-height] duration-300 ease-in-out"
                                    :style="{ maxHeight: activeMobileSubMenus.includes(menuMbIndex) ? '500px' : '0px' }"
                                >
                                    <ul class="pl-4 mt-2 space-y-2 border-l-2 border-primary-200 ml-1">
                                        <li v-for="(subItem, subIndex) in menuMb.subMenu" :key="subIndex">
                                            <Link 
                                                :href="subItem.slug"
                                                @click="closeMenu()"
                                                class="block py-1 text-sm text-primary-700 hover:text-primary-900"
                                                :class="{'font-medium text-primary-900': fullPath.includes(subItem.slug)}"
                                            >
                                                {{ subItem.title }}
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </template>
                    </ul>

                    <!-- Google Translate Element (hidden) -->
                    <div id="google_translate_element" class="hidden"></div>
                </div>
            </div>
        </div>

        <!-- Background Overlay -->
        <div
            @mouseenter="setBackgroundHover('leave')"
            :class="hoverBackground ? 'visible duration-100' : 'invisible duration-100'"
            class="absolute w-screen h-screen bg-black opacity-50 z-1"
        ></div>
    </header>
</template>

<script>
import DropdownArrow from './Icons/DropdownArrow.vue'

export default {
    props: {
        fullPath: {
            type: String,
            default: '',
        },
        fullRoute: {
            type: String,
            default: '',
        },
    },
    components: { DropdownArrow },
    data() {
        return {
            inited: false,
            isScrolled: false,
            menus: [
                {
                    title: this.tt('Home'),
                    slug: this.route('home'),
                    type: 'home',
                    subMenu: [],
                },
                {
                    title: this.tt('About us'),
                    slug: this.route('histories.index'),
                    type: 'histories',
                    subMenu: [],
                },
                {
                    title: this.tt('Products'),
                    slug: this.route('products.index'),
                    type: 'products',
                    subMenu: [
                        {
                            title: "Banana",
                            slug: this.route('products.show', { slug: 'banana' }),
                        },
                        {
                            title: "Pineapple",
                            slug: this.route('products.show', { slug: 'pineapple' }),
                        },
                        {
                            title: "Lemon",
                            slug: this.route('products.show', { slug: 'lemon' }),
                        },
                    ],
                },
                {
                    title: this.tt('Careers'),
                    slug: this.route('jobs'),
                    type: 'jobs',
                    subMenu: [],
                },
                {
                    title: this.tt('News'),
                    slug: this.route('posts'),
                    type: 'posts',
                    subMenu: [],
                },
                {
                    title: this.tt('Contact'),
                    slug: this.route('contact'),
                    type: 'contact',
                    subMenu: [],
                },
            ],
            hoverBackground: false,
            menuSelected: null,
            subMenuSelected: null,
            isToggleMenu: false,
            activeMobileSubMenus: [],
        }
    },
    methods: {
        handleScroll() {
            this.isScrolled = window.scrollY > 100
        },
        setMenuSelected(item) {
            this.menuSelected = item
        },
        setFirstSubMenu() {
            if (this.menuSelected?.subMenu?.length > 0) {
                this.subMenuSelected = this.menuSelected.subMenu[0]
            }
        },
        setBackgroundHover(type) {
            this.hoverBackground = type === 'enter'
        },
        onToggleMenu() {
            this.isToggleMenu = !this.isToggleMenu
            document.body.classList.toggle('overflow-hidden', this.isToggleMenu)
        },
        toggleMobileSubMenu(index) {
            if (this.activeMobileSubMenus.includes(index)) {
                this.activeMobileSubMenus = this.activeMobileSubMenus.filter(i => i !== index)
            } else {
                this.activeMobileSubMenus.push(index)
            }
        },
        closeMenu() {
            document.body.classList.remove('overflow-hidden', 'menu-is-opened')
            this.isToggleMenu = false
            this.activeMobileSubMenus = []
        },
        switchLang(lang) {
            const target = lang === 'en' ? 'en' : 'vi'

            const apply = () => {
                const sel = document.querySelector('select.goog-te-combo')
                if (!sel) return false
                sel.value = target
                sel.dispatchEvent(new Event('change'))

                this.nukeBanner()
                this.ensureBodyTop()

                this.$inertia.visit(`/${target === 'vi' ? '' : 'en'}`, {
                    replace: true,
                    preserveState: true,
                    onFinish: () => {
                        window.location.reload()
                    },
                })

                return true
            }

            if (!apply()) {
                let tries = 0
                const itv = setInterval(() => {
                    tries++
                    if (apply() || tries > 50) clearInterval(itv)
                }, 100)
            }

            this.isToggleMenu = false
        },
        nukeBanner() {
            const killOnce = () => {
                document.querySelectorAll('iframe.goog-te-banner-frame').forEach((el) => {
                    el.style.setProperty('display', 'none', 'important')
                    try {
                        el.parentNode?.removeChild(el)
                    } catch {}
                })

                const tt = document.getElementById('goog-gt-tt')
                if (tt) tt.style.setProperty('display', 'none', 'important')

                document
                    .querySelectorAll('.goog-te-balloon-frame, .goog-te-menu-frame')
                    .forEach((el) => el.style.setProperty('display', 'none', 'important'))

                this.ensureBodyTop()
            }

            killOnce()
            let count = 0
            const itv = setInterval(() => {
                killOnce()
                count++
                if (count > 40) clearInterval(itv)
            }, 100)
        },
        ensureBodyTop() {
            try {
                document.body.style.setProperty('top', '0px', 'important')
                document.documentElement.style.setProperty('top', '0px', 'important')
            } catch {}
        },
        injectCssHacks() {
            const css = `
                .goog-te-banner-frame { display: none !important; }
                body { top: 0 !important; }
                #goog-gt-tt, .goog-te-balloon-frame, .goog-te-menu-frame { display: none !important; }
                .goog-text-highlight { background: none !important; box-shadow: none !important; }
                .goog-te-gadget { display: none !important; }
                html { position: static !important; }
            `
            const style = document.createElement('style')
            style.type = 'text/css'
            style.appendChild(document.createTextNode(css))
            document.head.appendChild(style)

            const mo = new MutationObserver(() => {
                const banner = document.querySelector('.goog-te-banner-frame')
                if (banner) {
                    banner.style.setProperty('display', 'none', 'important')
                    try {
                        banner.remove()
                    } catch {}
                }
                this.ensureBodyTop()
            })
            mo.observe(document.documentElement, { childList: true, subtree: true })
        },
    },
    mounted() {
        // Add scroll event listener
        window.addEventListener('scroll', this.handleScroll)

        this.injectCssHacks()

        window.googleTranslateElementInit = () => {
            try {
                new window.google.translate.TranslateElement(
                    {
                        pageLanguage: 'vi',
                        includedLanguages: 'vi,en',
                        autoDisplay: false,
                    },
                    'google_translate_element'
                )
                this.inited = true
            } catch (e) {
                // no-op
            }
        }

        if (!document.getElementById('google-translate-script')) {
            const s = document.createElement('script')
            s.id = 'google-translate-script'
            s.type = 'text/javascript'
            s.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'
            document.head.appendChild(s)
        } else {
            if (typeof window.googleTranslateElementInit === 'function') {
                window.googleTranslateElementInit()
            }
        }
    },
    beforeUnmount() {
        // Remove scroll event listener
        window.removeEventListener('scroll', this.handleScroll)
    },
}
</script>

<style lang="scss">
body {
    --header-height-sm: 60px;
    --header-height-md: 60px;
    --header-height-lg: 104px;
    --header-height-xl: 104px;
}
</style>

<style lang="scss" scoped>
.menu {
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: max-height 0.4s ease-in-out, opacity 0.4s ease-in-out;
}

.group:hover .menu {
    max-height: 90vh;
    opacity: 1;
}
</style>