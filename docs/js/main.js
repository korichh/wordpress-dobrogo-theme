'use strict';

// Image background
const ibg_init = function () {
    const ibg = document.querySelectorAll('.ibg');
    for (let i = 0; i < ibg.length; i++) {
        if (ibg[i].querySelector('img')) {
            ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
        }
    }
}();

// Navigation
const navigation_init = function () {
    const burger = document.querySelector('.header-burger');
    const headerNav = document.querySelector('.header-nav');
    const overlay = document.querySelector('.overlay');

    if (!burger || !headerNav || !overlay) return;

    function toggleBurger() {
        document.body.classList.toggle('_lock');
        burger.classList.toggle('_active');
        headerNav.classList.toggle('_active');
        overlay.classList.toggle('_active');
    }
    // Burger icon
    burger.addEventListener('click', () => {
        toggleBurger();
    })

    overlay.addEventListener('click', () => {
        toggleBurger();
    })


    const headerWrapper = document.querySelector('.header-wrapper');

    function headerScroll() {
        if (window.scrollY > 60) {
            headerWrapper.classList.add('_active');
        } else {
            headerWrapper.classList.remove('_active');
        }
    }

    window.addEventListener('scroll', headerScroll);
    headerScroll();
}();

const hero__init = function () {
    const heroSwiperWrapper = document.querySelector('.hero-inner__swiper');
    if (!heroSwiperWrapper) return;

    const heroSelector = heroSwiperWrapper.querySelector('.swiper');
    const heroSwiperPrev = heroSwiperWrapper.querySelector('.swiper-button-prev');
    const heroSwiperNext = heroSwiperWrapper.querySelector('.swiper-button-next');

    const heroSwiper = new Swiper(heroSelector, {
        loop: true,

        spaceBetween: 50,

        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        speed: 1000,

        navigation: {
            prevEl: heroSwiperPrev,
            nextEl: heroSwiperNext,
        }
    });
}();

const news__init = function () {
    const newsSwiperWrapper = document.querySelector('.news-inner__swiper');
    if (!newsSwiperWrapper) return;

    const newsSelector = newsSwiperWrapper.querySelector('.swiper');
    const newsPagination = newsSwiperWrapper.querySelector('.swiper-pagination');

    const newsSwiper = new Swiper(newsSelector, {
        loop: true,
        grabCursor: true,

        slidesPerView: 1,
        spaceBetween: 20,

        breakpoints: {
            600: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 90,
            }
        },

        pagination: {
            el: newsPagination,
            clickable: true,
        },
    });
}();

const team__init = function () {
    const teamSwiperWrapper = document.querySelector('.team-inner__swiper');
    if (!teamSwiperWrapper) return;

    const teamSelector = teamSwiperWrapper.querySelector('.swiper');
    const teamPagination = teamSwiperWrapper.querySelector('.swiper-pagination');

    const teamSwiper = new Swiper(teamSelector, {
        loop: true,
        grabCursor: true,

        slidesPerView: 1,
        spaceBetween: 20,

        breakpoints: {
            550: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            860: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 50,
            }
        },

        pagination: {
            el: teamPagination,
            clickable: true,
        },
    });
}();

const reports__init = function () {
    const navItems = document.querySelectorAll('.reports-nav__item');
    const bodyItems = document.querySelectorAll('.reports-body__item');

    if (!navItems || !bodyItems) return;

    for (const navItem of navItems) {
        navItem.addEventListener('click', (e) => {
            e.preventDefault();
            if (navItem.classList.contains('_active')) return;

            for (const navItem of navItems) {
                navItem.classList.remove('_active');
            }
            navItem.classList.add('_active');

            const selector = navItem.querySelector('a').getAttribute('href').replace('#', '');
            for (const bodyItem of bodyItems) {
                bodyItem.classList.remove('_active');
                if (bodyItem.id === selector) {
                    bodyItem.classList.add('_active');
                }
            }
        })
    }
}();

const orders__init = function () {
    const items = document.querySelectorAll('.orders-item');
    if (items.length == 0) return;

    for (const ordersItem of items) {
        const aim = clear(ordersItem.querySelector('.aim'));
        const already = clear(ordersItem.querySelector('.already'));
        const still = ordersItem.querySelectorAll('.still');
        const progress = ordersItem.querySelectorAll('.progress');

        const stillCount = new Intl.NumberFormat('ua').format(aim - already);
        for (const st of still) {
            st.innerHTML = stillCount;
        }

        const prPercent = (100 * already) / aim;
        for (const pr of progress) {
            pr.style.width = `${prPercent}%`
        }
    }

    function clear(el) {
        return el.textContent.trim().split(' ').join('')
    }
}();

const form__init = function () {
    const form = document.querySelector('.contacts-form');
    if (!form) return;

    form.addEventListener('submit', (e) => {
        const inputContact = form.querySelector('#input-contact');
        const value = inputContact.value;

        if (value.match(/((\+)?\b(8|38)?(\()?(0[\d]{2})(\))?)([\d-]{5,8})([\d]{2})/) ||
            value.match(/(https?:\/\/)?(www[.])?(telegram|t)\.me\/([a-zA-Z0-9_-]*)\/?$/) ||
            value.match(/@/)) {
            inputContact.classList.remove('_invalid');
        } else {
            inputContact.classList.add('_invalid');
            inputContact.focus();
            e.preventDefault();
        }
    })
}();

const popup__init = function () {
    const popup = document.querySelector('.popup');
    if (!popup) return;

    popup.addEventListener('click', (e) => {
        if (!e.target.closest('.popup-wrapper')) {
            popup.classList.remove('_active');
            document.body.classList.remove('_lock');
            const elems = popup.querySelectorAll('.popup-elem');
            for (const el of elems) {
                el.classList.remove('_active');
            }
        }
    })

    const donateButtons = document.querySelectorAll('.donate-button');
    if (donateButtons.length > 0) {
        for (const button of donateButtons) {
            button.querySelector('a').addEventListener('click', (e) => {
                popup.querySelector('.popup-donate').querySelector('.title').textContent =
                    button.closest('.orders-item').querySelector('.title').textContent.trim();
                popup.classList.add('_active');
                document.body.classList.add('_lock');
                popup.querySelector('.popup-donate').classList.add('_active');
                e.preventDefault();
            })
        }
    }
}();

const accordion__init = function () {
    const accordions = document.querySelectorAll('.accordion');
    if (accordions.length == 0) return;

    for (const accordion of accordions) {
        const button = accordion.querySelector('.accordion-button');
        const body = accordion.querySelector('.accordion-body');
        const moreIcon = document.createElement('img');

        moreIcon.setAttribute('src', 'img/svg/more.svg');
        moreIcon.setAttribute('alt', 'more icon');
        button.append(moreIcon);

        button.addEventListener('click', (e) => {
            e.preventDefault();

            for (const iterAccordion of accordions) {
                if (iterAccordion != accordion) {
                    iterAccordion.classList.remove('_open');
                    const body = iterAccordion.querySelector('.accordion-body');
                    body.style.height = '';
                }
            }

            if (accordion.classList.contains('_open')) {
                accordion.classList.remove('_open')
                body.style.height = '';
            } else {
                accordion.classList.add('_open')
                body.style.height = `${body.scrollHeight}px`;
            }
        })
    }
}();

document.addEventListener('click', (e) => { if (e.target.closest('a')) { const href = e.target.closest('a').getAttribute('href'); if (href.includes('#')) return; e.preventDefault(); window.location.href = '/wordpress-dobrogo-theme' + href } })