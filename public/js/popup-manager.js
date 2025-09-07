class PopupManager {
    constructor() {
        this.popups = [];
        this.currentPopup = null;
        this.isLoading = false;
        this.init();
    }

    init() {
        this.createPopupContainer();
        this.loadPopups();
        this.bindEvents();
    }

    createPopupContainer() {
        // Create popup container if it doesn't exist
        if (!document.getElementById('popup-container')) {
            const popupHTML = `
                <div id="popup-container" class="fixed inset-0 z-50 hidden">
                    <div id="popup-backdrop" class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
                    <div id="popup-content" class="relative z-10 flex items-center justify-center min-h-screen p-4">
                        <div class="popup-content bg-white rounded-2xl shadow-2xl max-w-full max-h-full overflow-hidden transform transition-all duration-300 scale-95 opacity-0">
                            <button id="popup-close" class="absolute top-4 left-4 z-20 bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-600 hover:text-gray-800 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <div id="popup-body" class="w-full h-full"></div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', popupHTML);
        }
    }

    async loadPopups() {
        if (this.isLoading) return;
        this.isLoading = true;

        try {
            console.log('Loading popups...');
            const response = await fetch('/popups/active');
            console.log('Response status:', response.status);
            
            if (!response.ok) throw new Error('Failed to load popups');
            
            this.popups = await response.json();
            console.log('Loaded popups:', this.popups);
            this.showNextPopup();
        } catch (error) {
            console.error('Error loading popups:', error);
        } finally {
            this.isLoading = false;
        }
    }

    showNextPopup() {
        console.log('showNextPopup called, popups count:', this.popups.length);
        if (this.popups.length === 0) {
            console.log('No popups to show');
            return;
        }

        // Find popup that should be shown
        const popupToShow = this.popups.find(popup => this.shouldShowPopup(popup));
        console.log('Popup to show:', popupToShow);
        
        if (popupToShow) {
            this.showPopup(popupToShow);
        } else {
            console.log('No popup should be shown');
        }
    }

    shouldShowPopup(popup) {
        console.log('Checking if popup should show:', popup);
        
        // Check if popup was already shown in this session
        if (popup.show_once_per_session) {
            const shownPopups = JSON.parse(sessionStorage.getItem('shownPopups') || '[]');
            console.log('Shown popups in session:', shownPopups);
            if (shownPopups.includes(popup.id)) {
                console.log('Popup already shown in this session');
                return false;
            }
        }

        // Check display rules (pages, user roles, etc.)
        if (popup.display_rules) {
            // Add custom logic here based on your requirements
            // For now, we'll show all popups
        }

        console.log('Popup should be shown');
        return true;
    }

    showPopup(popupData) {
        console.log('showPopup called with:', popupData);
        this.currentPopup = popupData;
        const container = document.getElementById('popup-container');
        const content = document.getElementById('popup-content');
        const body = document.getElementById('popup-body');
        
        console.log('Container elements:', { container, content, body });

        // Set popup dimensions
        content.style.width = `${popupData.width}px`;
        content.style.height = `${popupData.height}px`;
        content.style.maxWidth = '95vw';
        content.style.maxHeight = '95vh';

        // Render popup content
        body.innerHTML = this.renderPopupContent(popupData);

        // Show popup
        container.classList.remove('hidden');
        
        // Trigger animation
        setTimeout(() => {
            content.classList.add('popup-enter');
        }, 10);

        // Mark as shown in session
        if (popupData.show_once_per_session) {
            const shownPopups = JSON.parse(sessionStorage.getItem('shownPopups') || '[]');
            if (!shownPopups.includes(popupData.id)) {
                shownPopups.push(popupData.id);
                sessionStorage.setItem('shownPopups', JSON.stringify(shownPopups));
            }
        }

        // Increment display count
        this.incrementDisplayCount(popupData.id);

        // Auto close if enabled
        if (popupData.auto_close && popupData.auto_close_delay) {
            setTimeout(() => {
                this.hidePopup();
            }, popupData.auto_close_delay * 1000);
        }
    }

    renderPopupContent(popupData) {
        switch (popupData.type) {
            case 'poster':
                return this.renderPosterPopup(popupData);
            case 'video':
                return this.renderVideoPopup(popupData);
            case 'youtube':
                return this.renderYouTubePopup(popupData);
            case 'form':
            case 'survey':
                return this.renderFormPopup(popupData);
            default:
                return this.renderCustomPopup(popupData);
        }
    }

    renderPosterPopup(popupData) {
        // Try to get image from Spatie Media Library first, then fallback to image_url
        const imageUrl = (popupData.popup_images && popupData.popup_images.length > 0) 
            ? popupData.popup_images[0].url 
            : popupData.image_url;
        return `
            <div class="relative w-full h-full">
                ${imageUrl ? 
                    `<img src="${imageUrl}" alt="${popupData.title}" class="w-full h-full object-cover" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                     <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-center p-8" style="display:none;">
                         <div>
                             <h3 class="text-2xl font-bold mb-4">${popupData.title}</h3>
                             <p class="text-lg">${popupData.content || 'مرحباً بكم في سيراك'}</p>
                         </div>
                     </div>` : 
                    this.renderEmptyState('صورة', 'لا توجد صورة متاحة')
                }
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                    <h2 class="text-2xl font-bold text-white mb-2">${popupData.title}</h2>
                    ${popupData.content ? `<p class="text-white text-lg">${popupData.content}</p>` : ''}
                    ${popupData.button_text ? `
                        <button onclick="popupManager.handleButtonClick('${popupData.button_url}')" 
                                class="mt-4 bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
                            ${popupData.button_text}
                        </button>
                    ` : ''}
                </div>
            </div>
        `;
    }

    renderVideoPopup(popupData) {
        return `
            <div class="w-full h-full flex flex-col">
                <div class="flex-1 bg-black flex items-center justify-center">
                    ${popupData.video_url ? 
                        `<video controls class="w-full h-full">
                            <source src="${popupData.video_url}" type="video/mp4">
                            متصفحك لا يدعم تشغيل الفيديو
                        </video>` : 
                        this.renderEmptyState('فيديو', 'لا يوجد فيديو متاح')
                    }
                </div>
                <div class="p-6 bg-white">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">${popupData.title}</h2>
                    ${popupData.content ? `<p class="text-gray-600">${popupData.content}</p>` : ''}
                </div>
            </div>
        `;
    }

    renderYouTubePopup(popupData) {
        const embedUrl = this.getYouTubeEmbedUrl(popupData.youtube_url);
        return `
            <div class="w-full h-full flex flex-col">
                <div class="flex-1 bg-black flex items-center justify-center">
                    ${embedUrl ? 
                        `<iframe src="${embedUrl}" 
                                class="w-full h-full" 
                                frameborder="0" 
                                allowfullscreen>
                        </iframe>` : 
                        this.renderEmptyState('فيديو يوتيوب', 'رابط يوتيوب غير صحيح')
                    }
                </div>
                <div class="p-6 bg-white">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">${popupData.title}</h2>
                    ${popupData.content ? `<p class="text-gray-600">${popupData.content}</p>` : ''}
                </div>
            </div>
        `;
    }

    renderFormPopup(popupData) {
        const formFields = popupData.form_fields || [];
        const fieldsHTML = formFields.map(field => `
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">${field.label}</label>
                ${field.type === 'textarea' ? 
                    `<textarea name="${field.name}" required="${field.required}" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              rows="4" placeholder="${field.placeholder || ''}"></textarea>` :
                    `<input type="${field.type}" name="${field.name}" required="${field.required}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="${field.placeholder || ''}">`
                }
            </div>
        `).join('');

        return `
            <div class="w-full h-full flex flex-col">
                <div class="p-6 bg-white flex-1 overflow-y-auto">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">${popupData.title}</h2>
                    ${popupData.content ? `<p class="text-gray-600 mb-6">${popupData.content}</p>` : ''}
                    
                    <form id="popup-form" action="${popupData.form_action || '#'}" method="POST">
                        ${fieldsHTML}
                        <div class="flex space-x-4 space-x-reverse mt-6">
                            <button type="submit" 
                                    class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
                                إرسال
                            </button>
                            ${popupData.button_text ? `
                                <button type="button" 
                                        onclick="popupManager.handleButtonClick('${popupData.button_url}')" 
                                        class="flex-1 bg-gray-200 text-gray-800 py-3 px-6 rounded-lg font-semibold hover:bg-gray-300 transition">
                                    ${popupData.button_text}
                                </button>
                            ` : ''}
                        </div>
                    </form>
                </div>
            </div>
        `;
    }

    renderCustomPopup(popupData) {
        return `
            <div class="w-full h-full p-6 flex flex-col">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">${popupData.title}</h2>
                <div class="flex-1 overflow-y-auto">
                    ${popupData.content ? `<div class="prose max-w-none">${popupData.content}</div>` : ''}
                </div>
                ${popupData.button_text ? `
                    <div class="mt-6">
                        <button onclick="popupManager.handleButtonClick('${popupData.button_url}')" 
                                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            ${popupData.button_text}
                        </button>
                    </div>
                ` : ''}
            </div>
        `;
    }

    renderEmptyState(type, message) {
        return `
            <div class="w-full h-full flex flex-col items-center justify-center text-gray-500">
                <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <p class="text-lg">${message}</p>
            </div>
        `;
    }

    getYouTubeEmbedUrl(youtubeUrl) {
        if (!youtubeUrl) return null;
        
        const pattern = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
        const match = youtubeUrl.match(pattern);
        
        if (match && match[1]) {
            return `https://www.youtube.com/embed/${match[1]}`;
        }
        
        return null;
    }

    handleButtonClick(url) {
        if (!url) return;
        
        if (url.startsWith('#')) {
            // Internal anchor link - scroll to element
            const element = document.querySelector(url);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        } else if (url.startsWith('/')) {
            // Internal link
            window.location.href = url;
        } else {
            // External link
            window.open(url, '_blank');
        }
        
        this.hidePopup();
    }

    hidePopup() {
        const container = document.getElementById('popup-container');
        const content = document.getElementById('popup-content');
        
        if (content) {
            content.classList.remove('popup-enter');
            content.classList.add('popup-exit');
        }
        
        setTimeout(() => {
            container.classList.add('hidden');
            if (content) {
                content.classList.remove('popup-exit');
            }
            this.currentPopup = null;
        }, 300);
    }

    async incrementDisplayCount(popupId) {
        try {
            await fetch(`/popups/${popupId}/increment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        } catch (error) {
            console.error('Error incrementing display count:', error);
        }
    }

    bindEvents() {
        // Close button
        document.addEventListener('click', (e) => {
            if (e.target.id === 'popup-close' || e.target.closest('#popup-close')) {
                this.hidePopup();
            }
        });

        // Backdrop click
        document.addEventListener('click', (e) => {
            if (e.target.id === 'popup-backdrop') {
                this.hidePopup();
            }
        });

        // Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.currentPopup) {
                this.hidePopup();
            }
        });

        // Form submission
        document.addEventListener('submit', (e) => {
            if (e.target.id === 'popup-form') {
                e.preventDefault();
                // Handle form submission here
                console.log('Form submitted:', new FormData(e.target));
                this.hidePopup();
            }
        });
    }
}

// Initialize popup manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing PopupManager...');
    window.popupManager = new PopupManager();
    console.log('PopupManager initialized:', window.popupManager);
});

// Add custom CSS for responsive sizing
const style = document.createElement('style');
style.textContent = `
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
`;
document.head.appendChild(style);


