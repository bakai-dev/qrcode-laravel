<template>
    <section id="qrcode_show">
        <div class="text-center" v-html="qrcode" >
        </div>
    </section>
</template>

<script>
import qrcodeApi from '../api'

export default {
    name: 'QrcodeView',
    components: {},
    data() {
        return {
            qrcode: {},
        }
    },
    methods: {
        async fetchQrcode() {
            const response = await qrcodeApi.find(this.$route.params.id)
            this.qrcode = response.data
        },
    },
    mounted() {
        this.fetchQrcode()
    },
}
</script>
