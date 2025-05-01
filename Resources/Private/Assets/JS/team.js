class EdenTeamCarousel {
    constructor(element) {
        this.carousel = element;
        this.track = this.carousel.querySelector('.eden-team-track');
        this.slides = this.carousel.querySelector('.eden-team-slides');
        this.prevBtn = this.carousel.querySelector('.eden-team-prev');
        this.nextBtn = this.carousel.querySelector('.eden-team-next');
        this.slideItems = this.carousel.querySelectorAll('.eden-team-slide');
        this.currentIndex = 0;
        
        if (this.slideItems.length > 0) {
            this.init();
        }
    }
    
    init() {
        // Set up navigation
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Set initial slide positions
        this.updateSlides();
    }
    
    prevSlide() {
        this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.slideItems.length - 1;
        this.updateSlides();
    }
    
    nextSlide() {
        this.currentIndex = (this.currentIndex < this.slideItems.length - 1) ? this.currentIndex + 1 : 0;
        this.updateSlides();
    }
    
    updateSlides() {
        const slideWidth = this.slideItems[0].offsetWidth;
        this.slides.style.transform = `translateX(-${this.currentIndex * slideWidth}px)`;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.eden-team-carousel').forEach(carousel => {
        new EdenTeamCarousel(carousel);
    });
});