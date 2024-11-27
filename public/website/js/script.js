// dropdown
console.log('js working')

document.addEventListener("DOMContentLoaded", function () {
    // Prevent closing parent dropdown when clicking on sub-dropdown
    document.querySelectorAll(".btn-group.dropend").forEach(function (dropdown) {
        dropdown.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });


    const updateGuestQuantity = () => {
        let totalGuests = 0;
        document.querySelectorAll('.number-input').forEach(input => {
            totalGuests += parseInt(input.value) || 0; // Add value or default to 0
        });
        document.getElementById('guest_quantity').textContent = totalGuests; // Update total
    };

    document.querySelectorAll('.btn-plus').forEach(button => {
        button.addEventListener('click', () => {
            const targetInput = document.getElementById(button.dataset.target);
            const max = parseInt(targetInput.getAttribute('max')) || 10;
            const currentValue = parseInt(targetInput.value) || 0;
            if (currentValue < max) {
                targetInput.value = currentValue + 1;
                updateGuestQuantity();
            }
        });
    });

    document.querySelectorAll('.btn-minus').forEach(button => {
        button.addEventListener('click', () => {
            const targetInput = document.getElementById(button.dataset.target);
            const min = parseInt(targetInput.getAttribute('min')) || 0;
            const currentValue = parseInt(targetInput.value) || 0;
            if (currentValue > min) {
                targetInput.value = currentValue - 1;
                updateGuestQuantity();
            }
        });
    });

    const swiper = new Swiper('.swiper', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        spaceBetween: 20,
        slidesPerView: "auto",
        centeredSlides: true,
    });
    const about_swiper = new Swiper('.about-swiper', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        spaceBetween: 20,
        slidesPerView: 1,
    });
});