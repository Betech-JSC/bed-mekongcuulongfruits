<template>
    <main>
        <BannerImage :banner="banner" classBanner="h-[320px]" />
        <section class="xl:py-20 md:py-16 py-12">
            <div class="container">
                <div class="grid md:grid-cols-2 gap-6 xl:gap-16">
                    <div>
                        <div class="md:space-y-5 space-y-4 xl:space-y-6">
                            <div class="md:space-y-6 space-y-4 xl:space-y-8">
                                <div>
                                    <p class="title-1 text-primary-800">
                                        {{ tt('Chúng tôi luôn đồng hành cùng bạn.') }}
                                    </p>
                                    <h2 class="display-3 text-primary-800 uppercase mt-3 mb-4 md:mb-6 xl:mb-8">
                                        {{ tt('Liên hệ với Sip N Source') }}
                                    </h2>
                                    <div class="body-1 text-gray-900">
                                        {{
                                            tt(
                                                'Bạn có một ý tưởng đang ấp ủ, một chiến dịch cần triển khai, hay chỉ đơn giản là muốn tìm một đối tác hiểu ngành rượu?'
                                            )
                                        }}
                                    </div>
                                </div>
                                <div class="bg-primary-50 p-4 md:p-6 xl:p-8 md:space-y-5 space-y-4 xl:space-y-6">
                                    <div class="title-1 text-gray-900">{{ tt('Gửi yêu cầu cho chúng tôi') }}</div>
                                    <div class="md:space-y-5 space-y-4 xl:space-y-6 body-1">
                                        <JamFieldSet
                                            v-model="form.contact.data.Name"
                                            :field="{
                                                rules: rules,
                                                errors: errors,
                                                type: 'text',
                                                placeholder: tt('Họ và tên'),
                                                name: 'Họ và tên',
                                                fieldName: 'Name',
                                                errorText: tt('Họ tên không hợp lệ'),
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
                                                placeholder: tt('Email'),
                                                name: 'Email',
                                                fieldName: 'Email',
                                                errorText: tt('Email không hợp lệ'),
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
                                                placeholder: tt('Số điện thoại'),
                                                name: 'Số điện thoại',
                                                fieldName: 'Phone',
                                                errorText: tt('Số điện thoại không hợp lệ'),
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
                                                placeholder: tt('Nội dung yêu cầu'),
                                                name: 'Nội dung yêu cầu',
                                                fieldName: 'note',
                                                errorText: tt('Họ tên không hợp lệ'),
                                            }"
                                            :isSubmit="isSubmit"
                                            @setIsSubmit="setIsSubmit"
                                            :isContact="true"
                                        />
                                    </div>
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
                    <div class="aspect-w-4 aspect-h-5">
                        <JPicture
                            src="/assets/images/contact/image-contact.webp"
                            alt="image contact"
                            class="w-full h-full object-cover"
                        />
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
    Phone: null,
    Email: '',
    note: '',
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
                title: this.tt('Liên hệ'),
                image: '/assets/images/contact/bg-banner.webp',
                breadcrumbs: [
                    {
                        title: this.tt('Liên hệ'),
                    },
                ],
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
