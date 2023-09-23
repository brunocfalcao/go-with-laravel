/*
Template Name: Appexy - Tailwind CSS Landing Page Template
Version: 1.0
Author: coderthemes
Email: support@coderthemes.com
File: js file
*/

// !-- =========== Sticky Navbar =========== --!
function windowScroll() {
    const navbar = document.getElementById("navbar-sticky");
    if (navbar) {
        if (
            document.body.scrollTop >= 50 ||
            document.documentElement.scrollTop >= 50
        ) {
            navbar.classList.add("nav-sticky");
        } else {
            navbar.classList.remove("nav-sticky");
        }
    }
}
window.addEventListener("scroll", (ev) => {
    ev.preventDefault();
    windowScroll();
});
// !-- =========== Sticky Navbar end =========== --!

// !-- =========== Back To Top Start =========== --!
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var mybutton = document.getElementById("back-to-top");
    if (mybutton != null) {
        if (
            document.body.scrollTop > 500 ||
            document.documentElement.scrollTop > 500
        ) {
            mybutton.classList.add("opacity-100");
            mybutton.classList.remove("opacity-0");
        } else {
            mybutton.classList.add("opacity-0");
            mybutton.classList.remove("opacity-100");
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
// !-- =========== Back To Top Start end =========== --!

// !-- =========== #testimonial_1 =========== --!
function testimonial_1() {
    new Swiper(".hero-6-swiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
        },
    });
}
testimonial_1();

function index2() {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3.5,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4.2,
                spaceBetween: 20,
            },
        },
    });
}

index2();
// !-- =========== #testimonial_1 end =========== --!

// !-- =========== Navbar Active Class =========== --!
var spy = new Gumshoe("#navbar-navlist a", {
    // Active classes
    // navClass: 'active', // applied to the nav list item
    // contentClass: 'active', // applied to the content
    offset: 80,
});
// !-- =========== Navbar Active Class end =========== --!

// !-- =========== Toogle button on pricing section =========== --!
document.addEventListener("DOMContentLoaded", function () {
    const monthlyBtn = document.getElementById("monthlyBtn");
    const yearlyBtn = document.getElementById("yearlyBtn");
    const monthlyPlan = document.getElementById("monthlyPlan");
    const yearlyPlan = document.getElementById("yearlyPlan");

    function showPlan(planType) {
        if (planType === "monthly") {
            monthlyPlan.style.display = "grid";
            yearlyPlan.style.display = "none";
            monthlyBtn.classList.add("bg-blue-600");
            monthlyBtn.classList.remove("bg-transparent");
            monthlyBtn.style.color = "#ffffff";
            yearlyBtn.classList.remove("bg-blue-600");
            yearlyBtn.classList.add("bg-transparent");
            yearlyBtn.style.color = "#374151";
        } else if (planType === "yearly") {
            monthlyPlan.style.display = "none";
            yearlyPlan.style.display = "grid";
            yearlyBtn.classList.add("bg-blue-600");
            yearlyBtn.classList.remove("bg-transparent");
            yearlyBtn.style.color = "#ffffff";
            monthlyBtn.classList.remove("bg-blue-600");
            monthlyBtn.classList.add("bg-transparent");
            monthlyBtn.style.color = "#374151";
        }
    }

    monthlyBtn.addEventListener("click", function () {
        showPlan("monthly");
    });

    yearlyBtn.addEventListener("click", function () {
        showPlan("yearly");
    });

    showPlan("monthly");
});
// !-- =========== Toogle button on pricing section end =========== --!

// !-- =========== Popup Modal =========== --!
document.addEventListener("DOMContentLoaded", function () {
    const loginModal = document.getElementById("login-modal");
    const signupModal = document.getElementById("signup-modal");
    const forgetPasswordModal = document.getElementById(
        "forget-password-modal"
    );

    const showLoginLinks = document.querySelectorAll(
        "[data-fc-target='login-modal']"
    );
    const showForgetLinks = document.querySelectorAll(
        "[data-fc-target='forget-password-modal']"
    );
    const showSignupLinks = document.querySelectorAll(
        "[data-fc-target='signup-modal']"
    );

    function hideAllModals() {
        loginModal.style.display = "none";
        signupModal.style.display = "none";
        forgetPasswordModal.style.display = "none";
    }

    showLoginLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            hideAllModals();
            loginModal.style.display = "block";
        });
    });

    showForgetLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            hideAllModals();
            forgetPasswordModal.style.display = "block";
        });
    });

    showSignupLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            hideAllModals();
            signupModal.style.display = "block";
        });
    });
});

// !-- =========== Popup Modal =========== --!

// !-- =========== close popup-modal =========== --!
// function closeModal(modalId) {
//     var modal = document.getElementById(modalId);
//     if (modal) {
//         modal.style.display = "none";
//         // Additionally, hide the overlay or background
//         document.body.style.overflow = "auto";
//     }
// }
// // Add event listeners to close buttons for each modal
// document
//     .getElementById("login-elementToClose")
//     .addEventListener("click", function () {
//         closeModal("login-modal");
//     });

// document
//     .getElementById("signup-elementToClose")
//     .addEventListener("click", function () {
//         closeModal("signup-modal");
//     });

// document
//     .getElementById("forget-password-elementToClose")
//     .addEventListener("click", function () {
//         closeModal("forget-password-modal");
//     });

document.addEventListener("DOMContentLoaded", function () {
    const modals = document.querySelectorAll(".modal");

    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    function hideModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.display = "none";
    }

    window.closeModal = function (modalId) {
        hideModal(modalId);
    };

    modals.forEach(function (modal) {
        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                hideModal(modal.id);
            }
        });
    });
});

// !-- ===========close popup-modal end =========== --!

// !-- =========== counter =========== --!
const counter = document.querySelectorAll(".counter_value");
const speed = 250; // The lower the slower

counter.forEach((counter_value) => {
    const updateCount = () => {
        const target = +counter_value.getAttribute("data-target");
        const count = +counter_value.innerText;

        // Lower inc to slow and higher to slow
        const inc = target / speed;

        // console.log('inc:',inc);
        // console.log('count:',count);

        // Check if target is reached
        if (count < target) {
            // Add inc to count and output in counter_value
            counter_value.innerText = (count + inc).toFixed(0);
            // Call function every ms
            setTimeout(updateCount, 1);
        } else {
            counter_value.innerText = target;
        }
    };

    updateCount();
});
// !-- =========== counter end =========== --!



