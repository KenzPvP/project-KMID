import '../css/app.css';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
                menuToggle.setAttribute('aria-expanded', 'true');
                if (menuIcon) menuIcon.classList.add('rotate-90');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.setAttribute('aria-expanded', 'false');
                if (menuIcon) menuIcon.classList.remove('rotate-90');
            }
        });

        // Close mobile menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.setAttribute('aria-expanded', 'false');
                if (menuIcon) menuIcon.classList.remove('rotate-90');
            });
        });
    }

    // 2. Header Scroll Effect
    const siteHeader = document.getElementById('site-header');
    if (siteHeader) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                siteHeader.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-sm', 'py-3');
                siteHeader.classList.remove('py-5');
            } else {
                siteHeader.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-sm', 'py-3');
                siteHeader.classList.add('py-5');
            }
        });
    }

    // 3. FAQ Accordion Interactivity
    const faqButtons = document.querySelectorAll('.faq-trigger');
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.faq-card');
            const content = card.querySelector('.faq-content');
            const icon = button.querySelector('.faq-icon');
            const isOpen = card.classList.contains('is-open');

            // Close all other open FAQs
            document.querySelectorAll('.faq-card.is-open').forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.classList.remove('is-open');
                    const otherContent = otherCard.querySelector('.faq-content');
                    const otherIcon = otherCard.querySelector('.faq-icon');
                    if (otherContent) {
                        otherContent.style.maxHeight = '0px';
                        otherContent.classList.add('opacity-0');
                    }
                    if (otherIcon) {
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });

            // Toggle current FAQ
            if (isOpen) {
                card.classList.remove('is-open');
                content.style.maxHeight = '0px';
                content.classList.add('opacity-0');
                icon.style.transform = 'rotate(0deg)';
            } else {
                card.classList.add('is-open');
                content.classList.remove('opacity-0');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(45deg)';
            }
        });
    });

    // 4. Achievements Pagination Interaction
    const pageButtons = document.querySelectorAll('[data-page]');
    const achievementCards = document.querySelectorAll('.achievement-card');

    pageButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const targetPage = btn.getAttribute('data-page');

            pageButtons.forEach(b => {
                b.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-md');
                b.classList.add('text-[#004ADA]', 'hover:bg-blue-50');
            });

            btn.classList.add('bg-[#004ADA]', 'text-white', 'shadow-md');
            btn.classList.remove('text-[#004ADA]', 'hover:bg-blue-50');

            // Fade cards briefly to simulate page transition
            achievementCards.forEach(card => {
                card.classList.add('opacity-40', 'scale-95');
                setTimeout(() => {
                    card.classList.remove('opacity-40', 'scale-95');
                }, 200);
            });
        });
    });

    // 5. Scroll Reveal Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-8');
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-on-scroll').forEach(el => {
        el.classList.add('transition-all', 'duration-700', 'ease-out', 'opacity-0', 'translate-y-8');
        revealObserver.observe(el);
    });
});
