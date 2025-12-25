<template>
    <div class="absolute bottom-4 md:bottom-6 left-1/2 -translate-x-1/2 w-full">
        <div class="container">
           <div class="overflow-x-auto bg-white p-2 rounded-[16px] md:rounded-full max-w-[1090px] w-full">
             <div class="flex md:flex-row flex-col items-center gap-2 w-full md:w-max mx-auto">
                <div
                    v-for="(itemTab, indexTab) in tabs"
                    :key="indexTab"
                    :class="[
                        'button-1 max-xl:text-[16px] duration-300 ease-in-out font-bold py-2 xl:py-3 px-4 xl:px-5 rounded-full w-full text-center md:w-max cursor-pointer text-[#B61F04]',
                        active === itemTab.value ? 'bg-[#E5C025]' : 'lg:hover:bg-[#E5C025]',
                    ]"
                    @click="goToSection(itemTab.value)"
                >
                    {{ itemTab.title }}
                </div>
            </div>
           </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tabs: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            active: this.tabs && this.tabs.length ? this.tabs[0].value : null,
        }
    },
    methods: {
        goToSection(id) {
            this.active = id
            const el = document.getElementById(id)
            if (el) {
                const headerOffset = 80
                const elementPosition = el.getBoundingClientRect().top + window.pageYOffset
                const offsetPosition = elementPosition - headerOffset
                window.scrollTo({ top: offsetPosition, behavior: 'smooth' })
            }
            this.$emit('tab-click', id)
        },
    },
}
</script>
