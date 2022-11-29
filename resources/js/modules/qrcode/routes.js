import QrcodeList from "@/modules/qrcode/components/QrcodeList";
import QrcodeView from "@/modules/qrcode/components/QrcodeView";

export const routes = [
    {
        path: '/',
        name: 'Qrcodes',
        component: QrcodeList,
    },
    {
        path: '/qrcodes/:id',
        name: 'Show Qrcode',
        component: QrcodeView,
        hidden: true
    },
]
