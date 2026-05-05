/**
 * NeiMove - Main JavaScript
 * Handles UI interactions and icon initialization
 */

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Initialize Swiper for Hero Section
    if (typeof Swiper !== 'undefined' && document.querySelector('.heroSwiper')) {
        new Swiper(".heroSwiper", {
            loop: true,
            effect: "fade",
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }

    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Advanced Animation on Scroll (AOS) with Staggered Fade
    const fadeElements = document.querySelectorAll('.car-card, .filter-wrapper, .detail-main, .detail-sidebar');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    let staggerDelay = 0;
    let resetStaggerTimeout = null;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Apply a staggered delay based on appearance time
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, staggerDelay);
                
                staggerDelay += 150; // 150ms delay between each element

                // Reset stagger if no new elements intersect soon
                clearTimeout(resetStaggerTimeout);
                resetStaggerTimeout = setTimeout(() => {
                    staggerDelay = 0;
                }, 300);

                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(el);
    });
});

// Helper for animations
document.addEventListener('DOMContentLoaded', () => {
    const style = document.createElement('style');
    style.innerHTML = `
        .visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
});
