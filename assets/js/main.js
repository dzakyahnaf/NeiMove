/**
 * NeiNeiMove - Main JavaScript
 * Handles UI interactions and icon initialization
 */

document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');

            
            // Toggle icon between menu and x
            const iconName = navMenu.classList.contains('active') ? 'x' : 'menu';
            navToggle.innerHTML = `<i data-lucide="${iconName}" style="width: 28px; height: 28px;"></i>`;
            lucide.createIcons();
            
            if (navMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden'; // Prevent scroll when menu open
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.body.style.overflow = ''; // Re-enable scroll
                if (window.scrollY <= 20) {
                    document.querySelector('.navbar').classList.remove('scrolled');
                }
            }
        });

        // Close menu when clicking a link
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
                if (window.scrollY <= 20) {
                    document.querySelector('.navbar').classList.remove('scrolled');
                }
                navToggle.innerHTML = `<i data-lucide="menu" style="width: 28px; height: 28px;"></i>`;
                lucide.createIcons();
            });
        });
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
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

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
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, staggerDelay);
                
                staggerDelay += 150;

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

    // Helper for animations
    const style = document.createElement('style');
    style.innerHTML = `
        .visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);

    // Initialize Lucide Icons at the end so it doesn't block critical events if it fails
    try {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    } catch (e) {
        console.error("Lucide Icons Error:", e);
    }
});
