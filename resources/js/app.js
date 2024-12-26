// resources/js/app.js o en tu archivo de JavaScript relevante

document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('openCreateModal', function() {
        const createModal = document.querySelector('[data-filament-modal-id="create"]');
        if (createModal) {
            createModal.classList.add('open');
        }
    });
});
