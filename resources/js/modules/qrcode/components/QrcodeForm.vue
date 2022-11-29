<template>
    <section id="qrcode-form">
        <el-form
            ref="form"
            :model="form"
            label-width="120px"
            :rules="rules"
            size="small"
            @submit.native.prevent="saveSubmit"
        >
            <el-form-item
                label="Content"
                prop="content"
                :error="errors.get('content')"
            >
                <el-input
                    placeholder="Nvix USA"
                    v-model="form.content"
                    suffix-icon="el-icon-edit"
                    @change="errors.clear('content')"
                />
            </el-form-item>

            <el-form-item
                label="Size"
                prop="size"
                :error="errors.get('size')"
            >
                <el-input
                    placeholder="500"
                    v-model="form.size"
                    suffix-icon="el-icon-edit"
                    @change="errors.clear('size')"
                />
            </el-form-item>

            <el-form-item
                label="Color RGBA"
                prop="fill_color"
                :error="errors.get('fill_color')"
            >
                <el-input
                    placeholder="255,255,255"
                    v-model="form.fill_color"
                    suffix-icon="el-icon-edit"
                    @change="errors.clear('fill_color')"
                />
            </el-form-item>

            <el-form-item
                label="Background"
                prop="background_color"
                :error="errors.get('background_color')"
            >
                <el-input
                    placeholder="255,255,255"
                    v-model="form.background_color"
                    suffix-icon="el-icon-edit"
                    @change="errors.clear('background_color')"
                />
            </el-form-item>


        </el-form>

        <div
            slot="footer"
            class="dialog-footer"
        >
            <el-button
                size="small"
                @click.native="cancel"
            >
                {{ $t('global.cancel') }}
            </el-button>
            <el-button
                :loading="formLoading"
                type="success"
                size="small"
                class="float-right"
                @click.native="saveSubmit"
            >
                {{ $t('global.save') }}
            </el-button>
        </div>
    </section>
</template>

<script>
import {Errors} from '@/includes/Errors'
import qrcodeApi from '../api'

export default {
    name: 'QrcodeForm',
    props: {
        initialForm: {
            type: Object,
            default: {}
        },
    },
    data() {
        return {
            errors: new Errors(),
            formLoading: false,
            formTitle: 'New Qrcode',
            form: {},
            rules: {
                content: [
                    { required: true, message: 'qrcode content is required' },
                ],
            },
        }
    },
    mounted() {
        this.form = Object.assign({}, this.initialForm)
    },
    watch: {
        initialForm(formData) {
            if(_.isEmpty(formData)) this.clearForm()
            this.form = Object.assign({}, formData)
        }
    },
    methods: {
        saveSubmit() {
            this.$refs.form.validate((valid) => {
                if (valid) {
                    this.formLoading = true
                    this.errors.clear()
                    let action = this.form.id ? qrcodeApi.update : qrcodeApi.create

                    action(this.form).then((response) => {
                        this.$message({
                            message: 'Successfully created',
                            type: 'success'
                        })
                        if(response.data)
                            this.$emit('saved')
                    }).catch(error => {
                        if (error.response.data.errors)
                            this.errors.record(error.response.data.errors)
                    }).finally(() => this.formLoading = false)
                }
            })
        },
        cancel() {
            this.clearForm()
            this.$emit('cancel')
        },
        clearForm() {
            this.errors.clear()
            if (this.$refs.form)
                this.$refs.form.resetFields()
        }
    },
}
</script>
