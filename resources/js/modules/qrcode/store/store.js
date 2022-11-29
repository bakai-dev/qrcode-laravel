import * as types from './types'
import {actions} from './actions'

export const store = {
    state: {
        qrcodes: [],
        qrcodesMeta: [],
        qrcodesLoading: true,
    },
    getters: {
        qrcodes: state => state.qrcodes,
        qrcodesMeta: state => state.qrcodesMeta,
        qrcodesLoading: state => state.qrcodesLoading,
    },
    mutations: {
        [types.QRCODE_OBTAIN](state, qrcodes) {
            state.qrcodes = qrcodes
        },
        [types.QRCODE_CLEAR](state) {
            state.qrcodes = []
        },
        [types.QRCODE_SET_LOADING](state, loading) {
            state.qrcodesLoading = loading
        },
        [types.QRCODE_META](state, meta) {
            state.qrcodesMeta = meta
        },
    },
    actions
}
