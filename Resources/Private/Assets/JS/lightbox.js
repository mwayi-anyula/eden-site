class EdenLightbox {
    constructor() {
        this.lightbox = null;
        this.currentIndex = 0;
        this.images = [];
        this.groups = {};
        
        this.init();
    }
    
    init() {
        document.querySelectorAll('[data-lightbox]').forEach(el => {
            const group = el.getAttribute('data-lightbox');
            if (!this.groups[group]) {
                this.groups[group] = [];
            }
            this.groups[group].push(el);
            
            el.addEventListener('click', (e) => {
                e.preventDefault();
                this.openLightbox(group, this.groups[group].indexOf(el));
            });
        });
        
        this.createLightboxElement();
    }
    
    createLightboxElement() {
        this.lightbox = document.createElement('div');
        this.lightbox.className = 'eden-lightbox-container fixed inset-0 bg-black bg-opacity-90 z-50 hidden';
        this.lightbox.innerHTML = `
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <button class="eden-lightbox-close absolute top-4 right-4 text-white text-3xl focus:outline-none">&times;</button>
                <button class="eden-lightbox-prev absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-3xl focus:outline-none">❮</button>
                <div class="eden-lightbox-content max-w-full max-h-full">
                    <img src="" alt="" class="max-w-full max-h-full">
                    <div class="eden-lightbox-caption mt-4 text-white text-center"></div>
                </div>
                <button class="eden-lightbox-next absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-3xl focus:outline-none">❯</button>
            </div>
        `;
        
        document.body.appendChild(this.lightbox);
        
        this.lightbox.querySelector('.eden-lightbox-close').addEventListener('click', () => this.closeLightbox());
        this.lightbox.querySelector('.eden-lightbox-prev').addEventListener('click', () => this.prevImage());
        this.lightbox.querySelector('.eden-lightbox-next').addEventListener('click', () => this.nextImage());
        
        document.addEventListener('keydown', (e) => {
            if (this.lightbox && !this.lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') this.closeLightbox();
                if (e.key === 'ArrowLeft') this.prevImage();
                if (e.key === 'ArrowRight') this.nextImage();
            }
        });
    }
    
    openLightbox(group, index) {
        this.currentGroup = group;
        this.currentIndex = index;
        this.images = this.groups[group];
        
        this.updateLightbox();
        this.lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    closeLightbox() {
        this.lightbox.classList.add('hidden');
        document.body.style.overflow = '';
    }
    
    prevImage() {
        this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.images.length - 1;
        this.updateLightbox();
    }
    
    nextImage() {
        this.currentIndex = (this.currentIndex < this.images.length - 1) ? this.currentIndex + 1 : 0;
        this.updateLightbox();
    }
    
    updateLightbox() {
        const currentImage = this.images[this.currentIndex];
        const imgSrc = currentImage.getAttribute('href');
        const imgTitle = currentImage.getAttribute('data-title') || '';
        
        const imgElement = this.lightbox.querySelector('.eden-lightbox-content img');
        const captionElement = this.lightbox.querySelector('.eden-lightbox-caption');
        
        imgElement.setAttribute('src', imgSrc);
        imgElement.setAttribute('alt', imgTitle);
        captionElement.textContent = imgTitle;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new EdenLightbox();
});