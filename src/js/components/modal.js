export const modal = () => ({
    isOpen: true,

    modalOpen() {
        this.isOpen =! this.isOpen
    }
})