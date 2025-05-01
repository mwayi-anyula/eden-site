class EdenSlider {
    constructor(element) {
        this.slider = element;
        this.track = this.slider.querySelector('.eden-slider-track');
        this.slides = this.slider.querySelectorAll('.eden-slide');
        this.prevBtn = this.slider.querySelector('.eden-slider-prev');
        this.nextBtn = this.slider.querySelector('.eden-slider-next');
        this.currentIndex = 0;
        
        if (this.slides.length > 1) {
            this.init();
        }
    }
    
    init() {
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        this.updateSlider();
    }
    
    prevSlide() {
        this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.slides.length - 1;
        this.updateSlider();
    }
    
    nextSlide() {
        this.currentIndex = (this.currentIndex < this.slides.length - 1) ? this.currentIndex + 1 : 0;
        this.updateSlider();
    }
    
    updateSlider() {
        const slideWidth = 100 / this.slides.length;
        this.track.style.transform = `translateX(-${this.currentIndex * slideWidth}%)`;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.eden-slider').forEach(slider => {
        new EdenSlider(slider);
    });
});