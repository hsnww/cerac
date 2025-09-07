import './bootstrap';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Initialize Swiper
document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider
    const heroSwiper = new Swiper('.hero-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});

// Popup Manager
class PopupManager {
    constructor() {
        this.popups = [];
        this.currentPopup = null;
        this.init();
    }

    async init() {
        try {
            console.log('Loading popups from /popups/active...');
            const response = await fetch('/popups/active');
            console.log('Response status:', response.status);
            this.popups = await response.json();
            console.log('Loaded popups:', this.popups);
            this.showNextPopup();
        } catch (error) {
            console.error('Error loading popups:', error);
        }
    }

    showNextPopup() {
        console.log('showNextPopup called, popups count:', this.popups.length);
        if (this.popups.length === 0) {
            console.log('No popups to show');
            return;
        }

        const popup = this.popups[0];
        console.log('Checking popup:', popup);
        if (this.shouldShowPopup(popup)) {
            console.log('Showing popup:', popup);
            this.displayPopup(popup);
        } else {
            console.log('Popup should not be shown');
        }
    }

    shouldShowPopup(popup) {
        console.log('shouldShowPopup called with:', popup);
        
        if (!popup.is_active) {
            console.log('Popup is not active');
            return false;
        }

        // Check if popup should show once per session
        if (popup.show_once_per_session) {
            const shown = sessionStorage.getItem(`popup_${popup.id}_shown`);
            if (shown) {
                console.log('Popup already shown in this session');
                return false;
            }
        }

        // Check time constraints
        const now = new Date();
        if (popup.starts_at && new Date(popup.starts_at) > now) {
            console.log('Popup start time not reached');
            return false;
        }
        if (popup.ends_at && new Date(popup.ends_at) < now) {
            console.log('Popup end time passed');
            return false;
        }

        console.log('Popup should be shown');
        return true;
    }

    displayPopup(popup) {
        console.log('displayPopup called with:', popup);
        this.currentPopup = popup;
        this.createPopupElement(popup);
        this.markAsShown(popup);
    }

    createPopupElement(popup) {
        console.log('createPopupElement called with:', popup);
        const overlay = document.createElement('div');
        overlay.className = 'popup-overlay';
        overlay.id = `popup-${popup.id}`;

        const content = document.createElement('div');
        content.className = 'popup-content';
        content.style.width = `${popup.width}px`;
        content.style.height = `${popup.height}px`;

        // Close button
        if (popup.show_close_button) {
            const closeBtn = document.createElement('button');
            closeBtn.className = 'popup-close';
            closeBtn.innerHTML = '×';
            closeBtn.onclick = () => this.closePopup();
            content.appendChild(closeBtn);
        }

        // Content based on type
        switch (popup.type) {
            case 'poster':
                this.createPosterContent(content, popup);
                break;
            case 'video':
                this.createVideoContent(content, popup);
                break;
            case 'youtube':
                this.createYouTubeContent(content, popup);
                break;
            case 'form':
            case 'survey':
                this.createFormContent(content, popup);
                break;
            default:
                this.createCustomContent(content, popup);
        }

        overlay.appendChild(content);
        document.body.appendChild(overlay);
        console.log('Popup element created and added to DOM');

        // Auto close
        if (popup.auto_close && popup.auto_close_delay) {
            setTimeout(() => this.closePopup(), popup.auto_close_delay * 1000);
        }

        // Close on overlay click
        overlay.onclick = (e) => {
            if (e.target === overlay) this.closePopup();
        };
    }

    createPosterContent(content, popup) {
        console.log('createPosterContent called with:', popup);
        
        // Create image container
        const imgContainer = document.createElement('div');
        imgContainer.style.position = 'relative';
        imgContainer.style.width = '100%';
        imgContainer.style.height = '100%';
        
        const img = document.createElement('img');
        img.src = popup.image_url || popup.popup_images[0]?.url || '';
        console.log('Image src:', img.src);
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'cover';
        imgContainer.appendChild(img);
        
        // Add button if button_url exists
        if (popup.button_url) {
            const buttonContainer = document.createElement('div');
            buttonContainer.style.position = 'absolute';
            buttonContainer.style.bottom = '20px';
            buttonContainer.style.left = '50%';
            buttonContainer.style.transform = 'translateX(-50%)';
            buttonContainer.style.zIndex = '10';
            
            const button = document.createElement('a');
            button.href = popup.button_url;
            button.textContent = popup.button_text || 'عرض المزيد';
            button.className = 'popup-button-primary';
            button.style.textDecoration = 'none';
            
            buttonContainer.appendChild(button);
            imgContainer.appendChild(buttonContainer);
        }
        
        content.appendChild(imgContainer);
    }

    createVideoContent(content, popup) {
        const video = document.createElement('video');
        video.src = popup.video_url;
        video.controls = true;
        video.autoplay = true;
        video.style.width = '100%';
        video.style.height = '100%';
        content.appendChild(video);
    }

    createYouTubeContent(content, popup) {
        console.log('createYouTubeContent called with:', popup);
        const iframe = document.createElement('iframe');
        
        // Convert YouTube URL to embed URL
        let embedUrl = popup.youtube_url;
        if (popup.youtube_url) {
            if (popup.youtube_url.includes('youtube.com/watch')) {
                const videoId = popup.youtube_url.split('v=')[1]?.split('&')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            } else if (popup.youtube_url.includes('youtu.be/')) {
                const videoId = popup.youtube_url.split('youtu.be/')[1]?.split('?')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            }
        }
        
        console.log('Original YouTube URL:', popup.youtube_url);
        console.log('Converted embed URL:', embedUrl);
        
        iframe.src = embedUrl;
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.frameBorder = '0';
        iframe.allowFullscreen = true;
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
        content.appendChild(iframe);
        
        // Add close button for YouTube popup
        if (popup.button_text) {
            const buttonContainer = document.createElement('div');
            buttonContainer.style.position = 'absolute';
            buttonContainer.style.bottom = '20px';
            buttonContainer.style.left = '50%';
            buttonContainer.style.transform = 'translateX(-50%)';
            buttonContainer.style.zIndex = '10';
            
            const button = document.createElement('button');
            button.textContent = popup.button_text;
            button.className = 'popup-button-secondary';
            button.onclick = () => this.closePopup();
            
            buttonContainer.appendChild(button);
            content.appendChild(buttonContainer);
        }
        
        console.log('YouTube iframe created and added to content');
    }

    createFormContent(content, popup) {
        const form = document.createElement('form');
        form.action = popup.form_action;
        form.method = 'POST';

        // Add CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken.getAttribute('content');
            form.appendChild(csrfInput);
        }

        // Add form fields
        if (popup.form_fields) {
            popup.form_fields.forEach(field => {
                const div = document.createElement('div');
                div.className = 'mb-4';

                const label = document.createElement('label');
                label.textContent = field.label;
                label.className = 'block text-sm font-medium text-gray-700 mb-2';

                const input = document.createElement('input');
                input.type = field.type || 'text';
                input.name = field.name;
                input.required = field.required || false;
                input.className = 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500';

                div.appendChild(label);
                div.appendChild(input);
                form.appendChild(div);
            });
        }

        // Submit button
        const submitBtn = document.createElement('button');
        submitBtn.type = 'submit';
        submitBtn.textContent = popup.button_text || 'إرسال';
        submitBtn.className = 'popup-button-primary';

        form.appendChild(submitBtn);
        content.appendChild(form);
    }

    createCustomContent(content, popup) {
        content.innerHTML = popup.content || '';
    }

    closePopup() {
        if (this.currentPopup) {
            const popupElement = document.getElementById(`popup-${this.currentPopup.id}`);
            if (popupElement) {
                popupElement.remove();
            }
            this.currentPopup = null;
        }
    }

    markAsShown(popup) {
        console.log('markAsShown called for popup:', popup.id);
        if (popup.show_once_per_session) {
            sessionStorage.setItem(`popup_${popup.id}_shown`, 'true');
            console.log('Popup marked as shown in session storage');
        }

        // Increment display count
        fetch(`/popups/${popup.id}/increment`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).catch(error => console.error('Error incrementing popup count:', error));
    }
}

// Make PopupManager available globally
window.PopupManager = PopupManager;

// Initialize PopupManager when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing PopupManager...');
    console.log('PopupManager type:', typeof PopupManager);
    console.log('window.PopupManager type:', typeof window.PopupManager);
    
    if (typeof PopupManager !== 'undefined') {
        new PopupManager();
        console.log('PopupManager initialized successfully');
    } else {
        console.error('PopupManager class not found');
        console.log('Available window properties:', Object.keys(window).filter(k => k.includes('Popup')));
    }
});
