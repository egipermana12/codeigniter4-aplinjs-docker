export default function rupiahFormatPlugin(Alpine) {
    Alpine.magic('formatRupiah', () => {
        return function (number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
        };
    });

    Alpine.magic('dateFormat', () => {
        return function (dateString, locale = 'id-ID', options = { year: 'numeric', month: 'long', day: 'numeric' }) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat(locale, options).format(date);
        };
    });
}