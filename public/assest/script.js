lucide.createIcons();

// Mobile Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const menuClose = document.getElementById('menu-close');
const mobileMenu = document.getElementById('mobile-menu');
const overlay = document.getElementById('overlay');

menuToggle.addEventListener('click', () => {
    mobileMenu.classList.add('open');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
});

menuClose.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('active');
    document.body.style.overflow = 'auto';
});

overlay.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('active');
    document.body.style.overflow = 'auto';
});

// Bottom Navigation
const bottomNav = document.getElementById('bottom-nav');

// Show bottom nav after page load
window.addEventListener('load', () => {
    setTimeout(() => {
        bottomNav.classList.add('active');
    }, 500);
});

// Handle bottom nav item clicks
const bottomNavItems = document.querySelectorAll('#bottom-nav a');
bottomNavItems.forEach(item => {
    item.addEventListener('click', (e) => {
        // Remove active class from all items
        bottomNavItems.forEach(navItem => {
            navItem.classList.remove('text-primary');
            navItem.classList.add('text-gray-500');
        });

        // Add active class to clicked item
        e.currentTarget.classList.remove('text-gray-500');
        e.currentTarget.classList.add('text-primary');
    });
});

// Slider Functionality
const slider = document.getElementById('slider');
const slides = document.querySelectorAll('.slide');
const indicators = document.querySelectorAll('.slider-indicator');
const prevButton = document.getElementById('prev-slide');
const nextButton = document.getElementById('next-slide');

let currentSlide = 0;
const totalSlides = slides.length;

// Function to update slider position
function updateSlider() {
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;

    // Update indicators
    indicators.forEach((indicator, index) => {
        if (index === currentSlide) {
            indicator.classList.remove('bg-gray-300', 'opacity-50');
            indicator.classList.add('bg-primary', 'opacity-100');
        } else {
            indicator.classList.remove('bg-primary', 'opacity-100');
            indicator.classList.add('bg-gray-300', 'opacity-50');
        }
    });
}

// Next slide
nextButton.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlider();
});

// Previous slide
prevButton.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlider();
});

// Indicator click
indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        currentSlide = index;
        updateSlider();
    });
});

// Auto slide every 5 seconds
setInterval(() => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlider();
}, 5000);

// Simple date setting for the date input
const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 1);

const formattedDate = tomorrow.toISOString().split('T')[0];
document.querySelector('input[type="date"]').value = formattedDate;
