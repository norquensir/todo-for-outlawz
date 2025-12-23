import './bootstrap';

document.addEventListener('alpine:init', () => {
    Alpine.data('dropdown', () => ({
        open: false,
        toggle() {
            if (this.open) {
                return this.close();
            }

            this.$refs.button.focus();

            this.open = true;
        },
        close(focusAfter) {
            if (!this.open) {
                return;
            }

            this.open = false;

            focusAfter && focusAfter.focus();
        },
    }));

    Alpine.data('modals', () => ({
        init() {
            this.$wire.on('open-edit-modal', () => {
                this.openEditModal();
            });
            this.$wire.on('close-edit-modal', () => {
                this.closeEditModal();
            });
        },
        clearValues() {
            this.$wire.formCreateTask.title = null;
            this.$wire.formCreateTask.description = null;
            this.$wire.formCreateTask.deadline = null;
            this.$wire.formCreateTask.priority = 'medium';
        },
        openModal() {
            this.clearValues();
            this.$refs.modalCreateTask.classList.remove('hidden');
            this.$refs.modalCreateTask.classList.add('flex');
        },
        closeModal() {
            this.clearValues();
            this.$refs.modalCreateTask.classList.remove('flex');
            this.$refs.modalCreateTask.classList.add('hidden');
        },
        openEditModal() {
            this.$refs.modalEditTask.classList.remove('hidden');
            this.$refs.modalEditTask.classList.add('flex');
        },
        closeEditModal() {
            this.$refs.modalEditTask.classList.remove('flex');
            this.$refs.modalEditTask.classList.add('hidden');
        },
    }));
})
