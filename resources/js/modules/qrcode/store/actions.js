import * as types from './types'
import qrcodeApi from '../api'

export const actions = {
    async [types.QRCODE_FETCH]({commit}, data = null) {
        commit(types.QRCODE_SET_LOADING, true)
        const response = await qrcodeApi.all(data)
        commit(types.QRCODE_OBTAIN, response.data.data)
        commit(types.QRCODE_META, response.data.meta)
        commit(types.QRCODE_SET_LOADING, false)
    },
}
