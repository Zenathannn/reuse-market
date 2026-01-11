<!-- Modal Component -->
<div id="modalOverlay" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 animate-scale-in">
        <div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white p-6 rounded-t-2xl flex items-center justify-between">
            <h2 id="modalTitle" class="text-2xl font-bold">Modal Title</h2>
            <button onclick="closeModal()" class="text-white hover:text-green-100 text-2xl leading-none">
                &times;
            </button>
        </div>
        <div class="p-6">
            <p id="modalContent" class="text-gray-700 text-center mb-8 leading-relaxed">Modal content here</p>
            <div class="flex gap-3" id="modalButtons">
                <button onclick="closeModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl transition">
                    Tutup
                </button>
                <button onclick="confirmModalAction()" class="flex-1 bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-3 rounded-xl transition">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-scale-in {
        animation: scaleIn 0.3s ease-out;
    }
</style>

<script>
    let modalCallback = null;
    let modalFormToSubmit = null;

    function openModal(title, content, callback = null) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').innerHTML = content;
        modalCallback = callback;
        document.getElementById('modalOverlay').classList.remove('hidden');
    }

    function openConfirmModal(title, content, onConfirm) {
        openModal(title, content, onConfirm);
        const buttons = document.getElementById('modalButtons');
        buttons.innerHTML = `
            <button onclick="closeModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl transition">
                Batal
            </button>
            <button onclick="confirmModalAction()" class="flex-1 bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-3 rounded-xl transition">
                Konfirmasi
            </button>
        `;
    }

    function confirmModalAction() {
        if (modalCallback) {
            modalCallback();
        }
        closeModal();
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.add('hidden');
        modalCallback = null;
    }

    // Close modal when clicking outside
    document.getElementById('modalOverlay')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('modalOverlay').classList.contains('hidden')) {
            closeModal();
        }
    });

    // Replace global alert
    window.customAlert = function(title, message) {
        openModal(title, message);
    };

    // Replace global confirm
    window.customConfirm = function(title, message, onConfirm) {
        openConfirmModal(title, message, onConfirm);
        return false;
    };
</script>