// Dark/Light Mode Toggle
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const iconMoon = document.getElementById('icon-moon');
    const iconSun = document.getElementById('icon-sun');

    // Initial state from localStorage
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark');
        iconMoon.style.display = 'none';
        iconSun.style.display = 'block';
    }

    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark');
        const isDark = document.body.classList.contains('dark');
        iconMoon.style.display = isDark ? 'none' : 'block';
        iconSun.style.display = isDark ? 'block' : 'none';
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
});

// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const header = document.querySelector('.header');

    // Mobile Menu Toggle
    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
        navToggle.classList.toggle('active');
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            navToggle.classList.remove('active');
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const targetPosition = target.offsetTop - 100;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Contact Form Handling with mailto
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const name = this.querySelector('input[name="contact_name"]').value;
            const email = this.querySelector('input[name="contact_email"]').value;
            const message = this.querySelector('textarea[name="contact_message"]').value;

            // Simple validation
            if (!name || !email || !message) {
                alert('Bitte fülle alle Felder aus.');
                return;
            }

            if (!isValidEmail(email)) {
                alert('Bitte gib eine gültige E-Mail-Adresse ein.');
                return;
            }

            // Create mailto link with form data
            const subject = encodeURIComponent('Kontaktanfrage von ' + name);
            const body = encodeURIComponent(
                'Name: ' + name + '\n' +
                'E-Mail: ' + email + '\n\n' +
                'Nachricht:\n' + message
            );

            // Open mailto link
            window.location.href = 'mailto:hello@rhyconnect.ch?subject=' + subject + '&body=' + body;

            // Optional: Reset form after opening mailto
            setTimeout(() => {
                this.reset();
            }, 500);
        });
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.feature-card, .team-member, .stat').forEach(el => {
        observer.observe(el);
    });

    // Stats Counter Animation
    function animateStats() {
        const stats = document.querySelectorAll('.stat h3');
        stats.forEach(stat => {
            const target = parseInt(stat.textContent.replace(/\D/g, ''));
            const suffix = stat.textContent.replace(/[0-9]/g, '');
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    stat.textContent = target + suffix;
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(current) + suffix;
                }
            }, 50);
        });
    }

    // Trigger stats animation when stats section is visible
    const statsSection = document.querySelector('.about-stats');
    if (statsSection) {
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        statsObserver.observe(statsSection);
    }
});

// Utility Functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-message">${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `;
    
    // Add to body
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => notification.classList.add('show'), 100);
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
    
    // Close button functionality
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    });
}

// App Screenshot Slider
let slideIndex = 1;

function changeSlide(n) {
    showSlide(slideIndex += n);
}

function currentSlide(n) {
    showSlide(slideIndex = n);
}

function showSlide(n) {
    const slides = document.querySelectorAll('.app-slide');
    const dots = document.querySelectorAll('.dot');
    const currentSlideEl = document.querySelector('.current-slide');
    
    if (slides.length === 0) return;
    
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].classList.add('active');
    }
    
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].classList.add('active');
    }
    
    // Update counter
    if (currentSlideEl) {
        currentSlideEl.textContent = slideIndex;
    }
}

// Auto-slide (optional)
function autoSlide() {
    const slides = document.querySelectorAll('.app-slide');
    if (slides.length > 1) {
        changeSlide(1);
        setTimeout(autoSlide, 5000); // Wechselt alle 5 Sekunden
    }
}

// Initialize slider
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.app-slide');
    if (slides.length > 1) {
        // Uncomment für Auto-Slide: setTimeout(autoSlide, 5000);
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') changeSlide(-1);
            if (e.key === 'ArrowRight') changeSlide(1);
        });
        
        // Touch/Swipe support for mobile
        let startX = 0;
        const slider = document.querySelector('.app-slider');
        
        if (slider) {
            slider.addEventListener('touchstart', function(e) {
                startX = e.touches[0].clientX;
            });
            
            slider.addEventListener('touchend', function(e) {
                const endX = e.changedTouches[0].clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 50) { // Minimum swipe distance
                    if (diff > 0) {
                        changeSlide(1); // Swipe left = next
                    } else {
                        changeSlide(-1); // Swipe right = previous
                    }
                }
            });
        }
    }
});

// Parallax effect for hero section (DISABLED)
/*
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.hero');
    if (parallax) {
        const speed = scrolled * 0.5;
        parallax.style.transform = `translateY(${speed}px)`;
    }
});
*/

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const navMenu = document.querySelector('.nav-menu');
        const navToggle = document.querySelector('.nav-toggle');
        if (navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            navToggle.classList.remove('active');
        }
    }
});

// Performance optimization: Lazy loading for images
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}