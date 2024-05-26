export default function fetchData() {
    return {
        isOpen: false,
        isLoadingBtn: false,
        modalOpen() {
            this.isOpen = !this.isOpen;
        },
        init() {
            // Inisialisasi data atau fungsi lain di sini
        }
    };
}