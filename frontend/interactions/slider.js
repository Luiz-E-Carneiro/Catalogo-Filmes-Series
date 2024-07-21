document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('scrollContainer');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    nextButton.addEventListener('click', () => {
        scrollContainer.scrollTo({
            top: 0,
            left: scrollContainer.scrollWidth,
            behavior: 'smooth'
        });
    });

    prevButton.addEventListener('click', () => {
        scrollContainer.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    });

    let isDown = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollContainer.classList.add('active');
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = x - startX;
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
});