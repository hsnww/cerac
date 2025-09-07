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
            const response = await fetch('/api/popups/active');
            this.popups = await response.json();
            this.showNextPopup();
        } catch (error) {
            console.error('Error loading popups:', error);
        }
    }

    showNextPopup() {
        if (this.popups.length === 0) return;

        const popup = this.popups[0];
        if (this.shouldShowPopup(popup)) {
            this.displayPopup(popup);
        }
    }

    shouldShowPopup(popup) {
        if (!popup.is_active) return false;

        // Check if popup should show once per session
        if (popup.show_once_per_session) {
            const shown = sessionStorage.getItem(`popup_${popup.id}_shown`);
            if (shown) return false;
        }

        // Check time constraints
        const now = new Date();
        if (popup.starts_at && new Date(popup.starts_at) > now) return false;
        if (popup.ends_at && new Date(popup.ends_at) < now) return false;

        return true;
    }

    displayPopup(popup) {
        this.currentPopup = popup;
        this.createPopupElement(popup);
        this.markAsShown(popup);
    }

    createPopupElement(popup) {
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
        const img = document.createElement('img');
        img.src = popup.image_url || popup.popup_images[0]?.url || '';
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'cover';
        content.appendChild(img);
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
        const iframe = document.createElement('iframe');
        iframe.src = popup.youtube_url;
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.frameBorder = '0';
        iframe.allowFullscreen = true;
        content.appendChild(iframe);
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
        submitBtn.className = 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600';

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
        if (popup.show_once_per_session) {
            sessionStorage.setItem(`popup_${popup.id}_shown`, 'true');
        }

        // Increment display count
        fetch(`/api/popups/${popup.id}/increment`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).catch(error => console.error('Error incrementing popup count:', error));
    }
}

// Initialize popup manager
new PopupManager();
