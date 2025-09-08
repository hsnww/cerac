<!-- Popup Container -->
<div id="popup-container" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div id="popup-backdrop" class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
    
    <!-- Popup Content -->
    <div id="popup-content" class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="popup-content bg-white rounded-2xl shadow-2xl max-w-full max-h-full overflow-hidden transform transition-all duration-300 scale-95 opacity-0">
            <!-- Close Button -->
            <button id="popup-close" class="absolute top-4 left-4 z-20 bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-600 hover:text-gray-800 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <!-- Popup Body -->
            <div id="popup-body" class="w-full h-full">
                <!-- Content will be loaded here dynamically -->
            </div>
        </div>
    </div>
</div>

<style>
/* Popup Animations */
.popup-enter {
    animation: popupEnter 0.3s ease-out forwards;
}

.popup-exit {
    animation: popupExit 0.3s ease-in forwards;
}

@keyframes popupEnter {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(-20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

@keyframes popupExit {
    from {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
    to {
        opacity: 0;
        transform: scale(0.9) translateY(-20px);
    }
}

/* Responsive popup sizing */
@media (max-width: 768px) {
    .popup-content {
        width: 95vw !important;
        height: 80vh !important;
        max-width: 95vw !important;
        max-height: 80vh !important;
    }
}

@media (max-width: 480px) {
    .popup-content {
        width: 98vw !important;
        height: 85vh !important;
        max-width: 98vw !important;
        max-height: 85vh !important;
    }
}
</style>





