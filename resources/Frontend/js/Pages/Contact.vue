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
                        <h1 class="w-max mx-auto display-1 uppercase text-center font-bold text-white bg-[#E7C226] bg-opacity-80 py-4 px-20">Contact us</h1>
                    </div>
                <div class="grid md:grid-cols-2 gap-6 xl:gap-16 bg-white border-8 border-[#F6E8D4] rounded-3xl p-6">
                    <div>
                        <div class="md:space-y-5 space-y-4 xl:space-y-6">
                            <div class="md:space-y-6 space-y-4 xl:space-y-8">
                                <div>                                    
                                    <h2 class="headline-1 text-[#60140A] mb-2">
                                        {{ tt('Do you have any questions?') }}
                                    </h2>
                                    <p class="body-0 text-neutral-800">
                                        Please fill out the form below
                                    </p>
                                </div>
                                <div class="space-y-4">
                                        <JamFieldSet
                                            v-model="form.contact.data.Name"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'text',
                                                placeholder: tt('Enter your name'),
                                                name: 'Your name',
                                                fieldName: 'Name',
                                                errorText: tt('Your name is invalid'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />
                                        <JamFieldSet
                                            v-model="form.contact.data.Company"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'text',
                                                placeholder: tt('Enter your company name'),
                                                name: 'Your company name',
                                                fieldName: 'Company',
                                                errorText: tt('Your company name is invalid'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />
                                        <JamFieldSet
                                            v-model="form.contact.data.Phone"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'number',
                                                placeholder: tt('Enter phone number'),
                                                name: 'Your phone number',
                                                fieldName: 'Phone',
                                                errorText: tt('Your phone is invalid'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />
                                        <JamFieldSet
                                            v-model="form.contact.data.Email"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'email',
                                                placeholder: tt('Enter your email'),
                                                name: 'Email',
                                                fieldName: 'Email',
                                                errorText: tt('Email is invalid'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />                                       
                                        <JamFieldSet
                                            v-model="form.contact.data['Nội dung yêu cầu']"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'text',
                                                placeholder: tt('Message/ notes'),
                                                name: 'Message',
                                                fieldName: 'Note',
                                                errorText: tt('Message/ notes is invalid'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />
                                    <button
                                        class="button-1 space-x-[12px] bg-primary-800 lg:hover:bg-primary-900 text-primary-100 flex items-center justify-center text-center transform transition-all py-[12px] w-full rounded-full button-1"
                                        @click="contact"
                                    >
                                        <div>{{ tt('Gửi yêu cầu') }}</div>
                                        <i class="gg-spinner" v-if="isLoading"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="display-2 text-[#60140A]">Contact information</h2>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <ModalSuccess
            @close="closePopup"
            :isSuccess="isSuccess"
            :title="tt('Yêu cầu thành công')"
            :description="
                tt(
                    'Hệ thống đã nhận thông tin yêu cầu của khách hàng. Chúng tôi sẽ liên hệ và tư vấn Quý khách trong thời gian sớm nhất.'
                )
            "
        />
    </main>
</template>
<script>
import { validateForm } from '@/validator'
import Pagination from '@/Components/Paginate.vue'
import JamFieldSet from '../Components/Jam/FieldSet.vue'
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
import ChevronContact from '@/Components/Icons/ChevronContact.vue'
const emptyForm = {
    Name: '',
    Company: '',
    Phone: null,
    Email: '',
    Note: '',
}
export default {
    props: ['agencies'],
    components: { JamFieldSet, Pagination, JamBreadcrumb, ChevronContact },
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
                    title: this.tt('Liên hệ'),
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
