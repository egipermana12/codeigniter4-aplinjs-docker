import Alpine from 'alpinejs'
import {modal} from './components/modal.js'

function rupiahFormatPlugin(Apline){
    Apline.magic('formatRupiah', () => {
        return function (number) {
            return new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(number);
        };
    });

    Apline.magic('dateFormat', () => {
        return function (dateString, locale = 'id-ID', options = {year: 'numeric', month: 'long', day: 'numeric' }) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat(locale, options).format(date);
        };
    });

}

Alpine.data('modal', modal)
Alpine.plugin(rupiahFormatPlugin)

window.Alpine = Alpine

Alpine.start()