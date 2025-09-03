<template>
    <main class="py-[12px] notranslate">
        <section class="xl:pt-[24px] md:pt-[17px] pt-[12px] xl:pb-[32px] md:pb-[22px] pb-[16px]">
            <div class="container grid grid-cols-12">
                <div class="md:col-start-2 md:col-span-10 col-span-full">
                    <div class="grid grid-cols-12 xl:gap-x-[32px] md:gap-x-[22px] max-lg:gap-y-4 max-md:gap-y-2">
                        <!-- Mobile -->
                        <div v-if="list_sidebar && list_sidebar.length" class="col-span-full lg:hidden">
                            <div
                                @click="togglePolicyMobile"
                                class="relative overflow-hidden bg-white shadow-xs cursor-pointer"
                            >
                                <div
                                    class="w-full relative py-[10px] px-[12px] md:px-[16px] flex items-center space-x-[8px] border-l-[5px] overflow-hidden text-grey-700 text-base border-primary-600"
                                >
                                    {{ content.title }}
                                </div>
                                <div
                                    class="absolute top-0 right-[12px] md:right-[16px] flex items-center justify-center h-full"
                                >
                                    <div
                                        class="scale-150 -rotate-90 opacity-50"
                                        :class="{ '!rotate-90': isOpenMobile }"
                                    >
                                        <IconCaretDown />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Desktop  -->
                        <div
                            v-if="isOpenMobile"
                            class="fixed inset-0 duration-200 bg-black lg:hidden opacity-70"
                            :class="isOpenMobile && 'z-[80]'"
                            @click="togglePolicyMobile"
                        ></div>
                        <div
                            v-if="list_sidebar && list_sidebar.length"
                            class="relative col-span-3 max-lg:fixed max-lg:h-screen max-lg:top-[60px] max-lg:left-0 max-lg:duration-200 max-lg:w-1/2 max-md:w-3/4 max-lg:bg-white max-lg:shadow-sm max-lg:p-2"
                            :class="[
                                isOpenMobile ? '' : 'max-lg:transform max-lg:translate-x-[-100%]',
                                isOpenMobile ? 'z-[80]' : '',
                            ]"
                        >
                            <div
                                class="md:sticky md:top-[20px] xl:space-y-[12px] md:space-y-[8px] space-y-[6px] font-medium rounded-[12px] p-[12px] bg-gray-100"
                            >
                                <Link
                                    :href="route('policies.show', policy.slug)"
                                    v-for="(policy, index) in list_sidebar"
                                    :key="index"
                                    class="title-3 xl:py-[12px] md:py-[8px] py-[6px] xl:px-[16px] md:px-[11px] px-[8px] xl:space-x-[8px] md:space-x-[6px] space-x-[4px] flex items-center text-gray-900 policy-item"
                                    :class="{
                                        'active-tab-policy': checkActive(policy.slug),
                                    }"
                                >
                                    <div class="flex gap-x-2">
                                        <div class="pt-[4px]">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.6673 1.89136V5.33348C11.6673 5.80018 11.6673 6.03354 11.7581 6.2118C11.838 6.3686 11.9655 6.49609 12.1223 6.57598C12.3006 6.66681 12.5339 6.66681 13.0007 6.66681H16.4428M11.6673 14.1667H6.66732M13.334 10.8334H6.66732M16.6673 8.3236V14.3334C16.6673 15.7335 16.6673 16.4336 16.3948 16.9684C16.1552 17.4388 15.7727 17.8212 15.3023 18.0609C14.7675 18.3334 14.0674 18.3334 12.6673 18.3334H7.33398C5.93385 18.3334 5.23379 18.3334 4.69901 18.0609C4.2286 17.8212 3.84615 17.4388 3.60647 16.9684C3.33398 16.4336 3.33398 15.7335 3.33398 14.3334V5.66675C3.33398 4.26662 3.33398 3.56655 3.60647 3.03177C3.84615 2.56137 4.2286 2.17892 4.69901 1.93923C5.23379 1.66675 5.93385 1.66675 7.33398 1.66675H10.0105C10.6219 1.66675 10.9277 1.66675 11.2154 1.73582C11.4705 1.79707 11.7143 1.89808 11.938 2.03515C12.1903 2.18975 12.4065 2.40594 12.8389 2.83832L15.4957 5.49517C15.9281 5.92755 16.1443 6.14374 16.2989 6.39604C16.436 6.61972 16.537 6.86358 16.5982 7.11867C16.6673 7.40639 16.6673 7.71213 16.6673 8.3236Z"
                                                    :stroke="checkActive(policy.slug) ? 'white' : 'black'"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </div>
                                        <div class="title-3">
                                            {{ policy.title }}
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        </div>

                        <div v-if="content" class="bg-white col-span-full lg:col-span-9 space-y-[1rem]">
                            <div
                                class="space-y-[12px] md:py-[48px] max-md:p-[12px] md:px-[32px] bg-gray-100 rounded-[12px]"
                            >
                                <div class="title-3 text-gray-700 font-bold space-x-[12px]">
                                    <span class="body-2 text-gray-700 font-normal">Cập nhập ngày:</span>
                                    <span class="title-3 font-bold text-gray-700">{{
                                        content.formatted_updated_at
                                    }}</span>
                                </div>
                                <h1 class="headline-1 text-primary-800 font-bold uppercase">
                                    {{ content.title }}
                                </h1>
                            </div>
                            <div v-html="content.content" class="prose" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    props: ['list_sidebar', 'content'],
    data() {
        return {
            isOpenMobile: false,
        }
    },

    methods: {
        togglePolicyMobile() {
            this.isOpenMobile = !this.isOpenMobile
        },

        checkActive(url) {
            const fullPath = this.$page.url
            const arrPath = fullPath.split('/')
            this.currentPolicy = this.list_sidebar.find((x) => x.slug === arrPath[arrPath.length - 1])
            return url == arrPath[arrPath.length - 1]
        },
    },
}
</script>

<style lang="scss">
.active-tab-policy {
    @apply bg-primary-600 text-white shadow-xs rounded-[8px];
}

.policy-item {
    svg path {
        @apply duration-200;
    }
}

.icon-policy {
    svg {
        @apply w-[28px] h-[28px];
    }
}
</style>
