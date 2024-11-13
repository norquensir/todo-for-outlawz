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
        clearValues() {
            this.$wire.formCreateTask.title = null;
            this.$wire.formCreateTask.description = null;
            this.$wire.formCreateTask.deadline = null;
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
    }));
})
