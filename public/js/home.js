// Home.js
document.addEventListener("DOMContentLoaded", function () {
    const bannerSlider = document.querySelector('.banner-slider');
    const slides = document.querySelectorAll('.slide');
    const slideImages = [
        '/public/images/banner_images/slide1.jpg',
        '/public/images/banner_images/slide2.jpg',
        '/public/images/banner_images/slide3.jpg',
        // Add more image paths as needed
    ];

    let currentSlide = 0;
    let slideInterval;

    // Function to show the current slide
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.transform = `translateX(${100 * (i - index)}%)`;
        });
    }

    // Function to update slide content based on index
    function updateSlideContent(index) {
        const currentSlideImage = slideImages[index];
        const currentSlideContent = slides[index].querySelector('.slide-content');

        // Update image
        slides[index].querySelector('img').src = currentSlideImage;

        // Update text content
        currentSlideContent.querySelector('h1').textContent = getSlideTitle(index);
        currentSlideContent.querySelector('p').textContent = getSlideDescription(index);
        currentSlideContent.querySelector('.subscribe-button').href = getSlideButtonLink(index);
    }

    // Function to get slide title based on index
    function getSlideTitle(index) {
        // Placeholder title
        return `Slide ${index + 1} Title`;
    }

    // Function to get slide description based on index
    function getSlideDescription(index) {
        // Placeholder description
        return `This is a placeholder description for Slide ${index + 1}.`;
    }

    // Function to get slide button link based on index
    function getSlideButtonLink(index) {
        // Placeholder button link
        return '#';
    }

    // Event listener for the left arrow
    document.querySelector('.arrow-left').addEventListener('click', function () {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
        updateSlideContent(currentSlide);
        clearInterval(slideInterval); // Stop automatic sliding
    });

    // Event listener for the right arrow
    document.querySelector('.arrow-right').addEventListener('click', function () {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
        updateSlideContent(currentSlide);
        clearInterval(slideInterval); // Stop automatic sliding
    });

    // Automatic sliding every 5 seconds (adjust as needed)
    slideInterval = setInterval(function () {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
        updateSlideContent(currentSlide);
    }, 5000);
});
