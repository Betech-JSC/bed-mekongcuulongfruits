<template>
    <main class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 flex items-center justify-center p-4">
        <section
            class="w-full max-w-3xl rounded-2xl bg-white shadow-lg ring-1 ring-black/5 overflow-hidden"
            role="status"
            aria-live="polite"
        >
            <div class="px-6 py-8 md:px-10 md:py-12">
                <div class="flex items-center gap-3 mb-6">
                    <!-- Logo placeholder -->
                    <div class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="h-6 w-6 text-gray-500"
                        >
                            <path
                                d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 5a1 1 0 10-2 0v5a1 1 0 00.293.707l3 3a1 1 0 101.414-1.414L13 11.586V7z"
                            />
                        </svg>
                    </div>
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-900">Công ty TNHH Mekongcuulongfruits</h1>
                </div>

                <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-gray-900">Website đang cập nhật</h2>
                <p class="mt-2 text-gray-600">
                    Chúng tôi đang cải thiện trải nghiệm. Nếu cần hỗ trợ ngay, vui lòng liên hệ:
                </p>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    name: 'MaintenancePage',
    data() {
        return {
            companyName: 'Công ty TNHH Khơi Vị',
            taxCode: '0318965257',
            address: '91/55 Đường T8, Phường Tây Thạnh, TP Hồ Chí Minh, Việt Nam',
            hotline: '0877627657',
        }
    },
    mounted() {
        // Inject structured data for SEO (Organization)
        const data = {
            '@context': 'https://schema.org',
            '@type': 'Organization',
            name: this.companyName,
            address: {
                '@type': 'PostalAddress',
                streetAddress: '91/55 Đường T8',
                addressLocality: 'Phường Tây Thạnh',
                addressRegion: 'TP Hồ Chí Minh',
                addressCountry: 'VN',
            },
            taxID: this.taxCode,
            telephone: this.hotline,
            url: typeof window !== 'undefined' ? window.location.origin : undefined,
        }
        const script = document.createElement('script')
        script.type = 'application/ld+json'
        script.text = JSON.stringify(data)
        document.head.appendChild(script)
    },
    methods: {
        async copy(text) {
            try {
                await navigator.clipboard.writeText(text)
                this.toast('Đã sao chép!')
            } catch (_) {
                // fallback
                const area = document.createElement('textarea')
                area.value = text
                document.body.appendChild(area)
                area.select()
                document.execCommand('copy')
                document.body.removeChild(area)
                this.toast('Đã sao chép!')
            }
        },
        formatPhone(raw) {
            // simple VN spacing: 3-3-4 or 4-3-4 depending on leading 0
            const digits = (raw || '').replace(/\D/g, '')
            if (digits.length === 10) return digits.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3')
            if (digits.length === 11) return digits.replace(/(\d{4})(\d{3})(\d{4})/, '$1 $2 $3')
            return raw
        },
        addContact() {
            const vcf = `BEGIN:VCARD\nVERSION:3.0\nN:;Khoi Vi Co., Ltd;;;\nFN:Công ty TNHH Khơi Vị\nORG:Công ty TNHH Khơi Vị\nTEL;TYPE=WORK,VOICE:${this.hotline}\nADR;TYPE=WORK:;;91/55 Đường T8;TP Hồ Chí Minh;;VN\nNOTE:MST ${this.taxCode}\nEND:VCARD`
            const blob = new Blob([vcf], { type: 'text/vcard' })
            const url = URL.createObjectURL(blob)
            const a = document.createElement('a')
            a.href = url
            a.download = 'Khoi-Vi.vcf'
            document.body.appendChild(a)
            a.click()
            document.body.removeChild(a)
            URL.revokeObjectURL(url)
        },
        toast(message) {
            // lightweight toast
            const el = document.createElement('div')
            el.textContent = message
            el.className =
                'fixed bottom-4 left-1/2 -translate-x-1/2 px-3 py-2 rounded-lg bg-gray-900 text-white text-sm shadow-lg'
            document.body.appendChild(el)
            setTimeout(() => {
                el.classList.add('opacity-0')
                el.classList.add('transition-opacity')
                setTimeout(() => document.body.removeChild(el), 300)
            }, 1200)
        },
    },
}
</script>

<!-- Tailwind handled globally. No component-scoped styles needed. -->
<style>
/* Optional: smooth fade for toast */
</style>
