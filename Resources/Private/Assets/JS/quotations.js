class EdenQuotations {
    constructor(element) {
        this.container = element;
        this.track = this.container.querySelector('.eden-quotations-track');
        this.quotations = this.container.querySelectorAll('.eden-quotation');
        this.dots = this.container.querySelectorAll('.eden-quotation-dot');
        this.currentIndex = 0;
        
        if (this.quotations.length > 1) {
            this.init();
        }
    }
    
    init() {
        // Set up dots navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToQuote(index));
        });
        
        // Auto-rotate quotes
        this.interval = setInterval(() => this.nextQuote(), 5000);
        
        // Pause on hover
        this.container.addEventListener('mouseenter', () => {
            clearInterval(this.interval);
        });
        
        this.container.addEventListener('mouseleave', () => {
            this.interval = setInterval(() => this.nextQuote(), 5000);
        });
    }
    
    nextQuote() {
        this.currentIndex = (this.currentIndex < this.quotations.length - 1) ? this.currentIndex + 1 : 0;
        this.updateQuotations();
    }
    
    goToQuote(index) {
        this.currentIndex = index;
        this.updateQuotations();
    }
    
    updateQuotations() {
        // Update track position
        this.track.style.transform = `translateX(-${this.currentIndex * 100}%)`;
        
        // Update active dot
        this.dots.forEach(dot => dot.classList.remove('bg-blue-600'));
        this.dots[this.currentIndex].classList.add('bg-blue-600');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.eden-quotations').forEach(container => {
        new EdenQuotations(container);
    });
});