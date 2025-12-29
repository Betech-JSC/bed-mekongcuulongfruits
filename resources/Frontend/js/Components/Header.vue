<template>
    <header 
        class="fixed inset-x-0 top-0 z-[1000] transition-all duration-300" 
        :class="{ 'bg-brand-300 shadow-md': isScrolled || isToggleMenu }"
        @mouseleave="menuSelected = null"
    >
        <div class="relative h-full">
            <div class="container flex items-center justify-between py-2">
                <Logo />

                <ul class="hidden md:flex items-center xl:space-x-8 md:space-x-5">
                    <template v-for="(menu, index) in menus" :key="index">
                        <li
                            v-if="menu && menu.title !== ''"
                            @mouseover="setMenuSelected(menu)"
                            @mouseenter="setFirstSubMenu"
                        >
                            <Link
                                :href="menu.slug"
                                class="flex items-center space-x-2 relative duration-150 ease-in-out"
                                :class="fullPath.includes(menu.slug) ? 'text-brand-100' : 'text-white lg:hover:text-brand-100'"
                                @click="menuSelected = null"
                            >
                                <div>{{ menu.title }}</div>
                            </Link>
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
                                class="flex items-center justify-between py-2"
                                :class="fullPath.includes(menuMb.slug) ? 'text-primary-800' : 'text-primary-900'"
                            >
                                <Link :href="menuMb.slug" @click="closeMenu()" class="block w-full">
                                    {{ menuMb.title }}
                                </Link>
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
                    subMenu: [],
                },
                {
                    title: this.tt('Careers'),
                    slug: this.route('recruitment.index'),
                    type: 'recruitment',
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
        closeMenu() {
            document.body.classList.remove('overflow-hidden', 'menu-is-opened')
            this.isToggleMenu = false
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