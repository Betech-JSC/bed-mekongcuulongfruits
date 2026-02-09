<template>
    <main>
        <section class="relative">
            <div class="absolute inset-0">
                <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[600px]" />
            </div>
            <div class="absolute inset-0 bg-opacity-30 bg-black w-full md:h-[550px] h-[550px] xl:h-[600px]"></div>
            <div class="relative">
                <div class="container">
                    <div class="pt-[160px] pb-[130px]">
                        <h1
                            class="w-max mx-auto display-1 uppercase text-center font-bold text-white bg-brand-300 bg-opacity-80 py-4 px-8 md:px-16 xl:px-20">
                            Contact Us
                        </h1>
                    </div>
                    <div
                        class="grid lg:grid-cols-2 gap-6 xl:gap-10 bg-white border-4 xl:border-8 border-brand-200 rounded-3xl p-3 md:p-4 xl:p-6">
                        <div>
                            <div class="md:space-y-5 space-y-4 xl:space-y-6">
                                <div class="md:space-y-6 space-y-4 xl:space-y-8">
                                    <div>
                                        <h2 class="headline-1 font-bold text-primary mb-2">
                                            {{ tt('Do you have any questions?') }}
                                        </h2>
                                        <p class="body-0 text-neutral-800">Please fill out the form below</p>
                                    </div>
                                    <div class="space-y-4">
                                        <JamFieldSet v-model="form.contact.data.Name" :field="{
                                            rules: rules,
                                            errors: errors,
                                            type: 'text',
                                            placeholder: tt('Enter your name'),
                                            name: 'Your Name',
                                            fieldName: 'Name',
                                            label: 'Your Name',
                                            errorText: tt('Your name is invalid'),
                                        }" :isSubmit="isSubmit" @setIsSubmit="setIsSubmit" :isContact="true" />
                                        <JamFieldSet v-model="form.contact.data.Company" :field="{
                                            rules: rules,
                                            errors: errors,
                                            type: 'text',
                                            placeholder: tt('Enter company name'),
                                            name: 'Company Name',
                                            fieldName: 'Company',
                                            label: 'Company Name',
                                            errorText: tt('Company name is invalid'),
                                        }" :isSubmit="isSubmit" @setIsSubmit="setIsSubmit" :isContact="true" />
                                        <div class="grid md:grid-cols-2 gap-4 md:gap-2">
                                            <JamFieldSet v-model="form.contact.data.Phone" :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'number',
                                                placeholder: tt('Enter phone number'),
                                                name: 'Phone Number',
                                                fieldName: 'Phone',
                                                label: 'Phone Number',
                                                errorText: tt('Phone number is invalid'),
                                            }" :isSubmit="isSubmit" @setIsSubmit="setIsSubmit" :isContact="true" />
                                            <JamFieldSet v-model="form.contact.data.Email" :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'email',
                                                placeholder: tt('Enter your email'),
                                                name: 'Email',
                                                fieldName: 'Email',
                                                label: 'Email',
                                                errorText: tt('Email is invalid'),
                                            }" :isSubmit="isSubmit" @setIsSubmit="setIsSubmit" :isContact="true" />
                                        </div>
                                        <JamFieldSet v-model="form.contact.data['Nội dung yêu cầu']" :field="{
                                            rules: rules,
                                            errors: errors,
                                            type: 'textarea',
                                            placeholder: tt('Message/ Note'),
                                            name: 'Message',
                                            fieldName: 'Note',
                                            errorText: tt('Message/ Note is invalid'),
                                        }" :isSubmit="isSubmit" @setIsSubmit="setIsSubmit" :isContact="true" />
                                        <button
                                            class="button-1 font-bold space-x-3 bg-brand-300 text-brand-100 lg:hover:bg-brand-100 lg:hover:text-brand-200 flex items-center justify-center text-center transform transition-all py-3 px-5 w-max rounded-full"
                                            @click="contact">
                                            <div>{{ tt('Send Now') }}</div>
                                            <i class="gg-spinner" v-if="isLoading"></i>
                                            <div v-else>
                                                <Arrow />
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-[#FEF8E4] rounded-2xl p-4 md:p-6 xl:p-8 space-y-4">
                                <!-- TODO: Chưa có thông tin social -->
                                <h2 class="headline-1 font-bold text-primary">Contact Information</h2>
                                <div v-for="(itemInfo, indexInfo) in infos" :key="indexInfo"
                                    class="md:flex  md:space-y-0 space-y-2 items-center justify-between border-b border-neutral-200 pb-4">
                                    <div>{{ itemInfo.title }}</div>
                                    <div class="md:max-w-[280px] w-full md:text-right">
                                        <a :href="itemInfo.link" :target="itemInfo.target"
                                            rel="noopener noreferrer nofollow"
                                            class="lg:hover:text-primary duration-300 ease-in-out">
                                            {{ itemInfo.description }}
                                        </a>
                                    </div>
                                </div>
                                <div class="md:flex md:space-y-0 space-y-2 items-center justify-between">
                                    <span>Social Media</span>
                                    <span class="w-full max-w-[300px] flex items-center md:justify-end gap-4">
                                        <a href="https://vietnamfarmer.com.vn" target="_blank"
                                            rel="noopener noreferrer nofollow"
                                            class="lg:hover:opacity-80 duration-300 ease-in-out">
                                            <JPicture src="/assets/images/icon-website.png" alt="website icon"
                                                class="w-8 h-8" />
                                        </a>
                                        <a href="https://wa.me/84909981381" target="_blank"
                                            rel="noopener noreferrer nofollow"
                                            class="lg:hover:opacity-80 duration-300 ease-in-out">
                                            <WhatApps />
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d893.3346620741389!2d106.573852333425!3d10.691734154797325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1770429316158!5m2!1svi!2s"
                style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-[600px]"></iframe>
        </section>
        <ModalSuccess @close="closePopup" :isSuccess="isSuccess" :title="tt('Request Successful')" :description="tt(
            'The system has received your request information. We will contact and advise you as soon as possible.'
        )
            " />
    </main>
</template>
<script>
import { validateForm } from '@/validator'
import Pagination from '@/Components/Paginate.vue'
import JamFieldSet from '../Components/Jam/FieldSet.vue'
import ChevronContact from '@/Components/Icons/ChevronContact.vue'
import LinkedIn from '@/Components/Icons/LinkedIn.vue'
import Facebook from '@/Components/Icons/Facebook.vue'
import Youtube from '@/Components/Icons/Youtube.vue'
import Instagram from '@/Components/Icons/Instagram.vue'
import WhatApps from '@/Components/Icons/WhatApps.vue'
import Arrow from '@/Components/Icons/Arrow.vue'
const emptyForm = {
    Name: '',
    Company: '',
    Phone: null,
    Email: '',
    Note: '',
}
export default {
    props: ['agencies'],
    components: { JamFieldSet, Pagination, ChevronContact, LinkedIn, Facebook, Youtube, Instagram, WhatApps, Arrow },
    directives: {
        'click-outside': {
            beforeMount: (el, binding) => {
                el.clickOutsideEvent = (event) => {
                    // here I check that click was outside the el and his children
                    if (!(el == event.target || el.contains(event.target))) {
                        // and if it did, call method provided in attribute value
                        binding.value()
                    }
                }
                document.addEventListener('click', el.clickOutsideEvent)
            },
            unmounted: (el) => {
                document.removeEventListener('click', el.clickOutsideEvent)
            },
        },
    },
    data() {
        return {
            banner: {
                // title: this.tt('Contact us'),
                image: '/assets/images/contact/banner.jpg',
            },
            infos: [
                {
                    title: 'Phone',
                    description: '0909 981 381',
                    link: 'tel:0909981381',
                    target: '_self',
                },
                {
                    title: 'Email',
                    description: 'info.vietnamfarmer@gmail.com',
                    link: 'mailto:info.vietnamfarmer@gmail.com',
                    target: '_self',
                },
                {
                    title: 'Address',
                    description: 'No. 4 Street 1A, Hamlet 57, Tan Nhut Commune, Ho Chi Minh City, Vietnam',
                    link: '',
                    target: '_blank',
                },
            ],
            form: {
                contact: {
                    data: {
                        ...emptyForm,
                    },
                    type: 'CONTACT_FORM',
                },
            },
            rules: {
                Name: 'required|min:3|max:25',
                Company: 'required|min:3|max:25',
                Phone: 'phone|required|min:10|max:11',
                Email: 'email|required',
            },
            errors: {},
            isSuccess: false,
            isLoading: false,
            isSubmit: false,
            breadcrumbs: [
                {
                    title: this.tt('Contact'),
                },
            ],
            isShowTypeService: false,
            servicesList: [],
            typeServiceActive: null,
            isEmptyService: false,
            screenWidth: 0,
        }
    },
    mounted() {
        if (this.$page.props.data.services && this.$page.props.data.services.length > 0) {
            this.servicesList = this.$page.props.data.services
        }
        this.screenWidth = window.innerWidth
    },
    methods: {
        contact() {
            this.errors = validateForm(this.form.contact.data, this.rules)

            if (Object.keys(this.errors).length > 0) {
                return false
            }
            this.isLoading = true

            this.$inertia.post('contacts', this.form, {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.contact.data = { ...emptyForm }
                    this.typeServiceActive = null
                    this.isEmptyService = false
                    this.isSuccess = true
                    this.isSubmit = true
                    this.isLoading = false
                    document.body.classList.add('overflow-hidden')
                },
            })
        },
        closePopup() {
            this.isSuccess = false
            document.body.classList.remove('overflow-hidden')
        },
        setIsSubmit(val) {
            this.isSubmit = val
        },
        toggleTypeService(event) {
            event.stopPropagation()
            this.isShowTypeService = !this.isShowTypeService
        },
        setTypeService(item) {
            this.typeServiceActive = item
            this.form.contact.data.Service.id = this.typeServiceActive.id
            this.form.contact.data.Service.title = this.typeServiceActive.title
            this.form.contact.data.Service.slug = this.typeServiceActive.slug
            this.isShowTypeService = false
        },
        hideBox() {
            this.isShowTypeService = false
        },
    },
}
</script>
<style lang="scss" scoped>
/* width */
::-webkit-scrollbar {
    width: 8px;
    background: white;
    border-radius: 30px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    @apply bg-gray-200 rounded-[30px];
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    @apply bg-gray-400;
}

.select-shadow {
    box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.05);
}

.gg-spinner {
    transform: scale(var(--ggs, 1));
}

.gg-spinner,
.gg-spinner::after,
.gg-spinner::before {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 1rem;
    height: 1rem;
}

.gg-spinner::after,
.gg-spinner::before {
    content: '';
    position: absolute;
    border-radius: 100px;
}

.gg-spinner::before {
    animation: spinner 1s cubic-bezier(0.6, 0, 0.4, 1) infinite;
    border: 3px solid transparent;
    border-top-color: currentColor;
}

.gg-spinner::after {
    border: 3px solid;
    opacity: 0.2;
}

@keyframes spinner {
    0% {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(359deg);
    }
}

:deep(.banner-shape) {
    img {
        @apply max-md:w-full max-md:h-full max-md:object-cover;
    }
}
</style>
