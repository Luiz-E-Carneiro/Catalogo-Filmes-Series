document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('scrollContainer');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let isDown = false;
    let startX;
    let scrollLeft;
    let isDragging = false;
    let clickTimeout;

    nextButton.addEventListener('click', () => {
        scrollContainer.scrollTo({
            top: 0,
            left: scrollContainer.scrollLeft + scrollContainer.clientWidth,
            behavior: 'smooth'
        });
    });

    prevButton.addEventListener('click', () => {
        scrollContainer.scrollTo({
            top: 0,
            left: scrollContainer.scrollLeft - scrollContainer.clientWidth,
            behavior: 'smooth'
        });
    });

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        isDragging = false;
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
        scrollContainer.classList.add('active');
        clickTimeout = setTimeout(() => {
            isDragging = true;
        }, 200);
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
        clearTimeout(clickTimeout);
    });

    scrollContainer.addEventListener('mouseup', (e) => {
        if (!isDragging) {
            const form = e.target.closest('form');
            if (form) {
                form.submit();
            }
        }
        isDown = false;
        scrollContainer.classList.remove('active');
        clearTimeout(clickTimeout);
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = x - startX;
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
});