let currentIndex = 0;

function showTestimonial(index) {
    const testimonials = document.querySelector('.testimonial-inner');
    const cardWidth = document.querySelector('.testimonial-card').offsetWidth;
    testimonials.style.transform = `translateX(${-index * cardWidth}px)`;
}

function nextTestimonial() {
    const totalTestimonials = document.querySelectorAll('.testimonial-card').length;
    currentIndex = (currentIndex + 1) % totalTestimonials;
    showTestimonial(currentIndex);
}

function prevTestimonial() {
    const totalTestimonials = document.querySelectorAll('.testimonial-card').length;
    currentIndex = (currentIndex - 1 + totalTestimonials) % totalTestimonials;
    showTestimonial(currentIndex);
}
