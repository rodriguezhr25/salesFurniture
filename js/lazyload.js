const images = document.querySelectorAll('img[data-src]');

function preloadImage(img) {
    const src = img.getAttribute("data-src");
    if (!src) {
        return;
    }
    img.src = src;
    img.onload = () => { img.removeAttribute('data-src'); };
}
const imgOptions = {
    threshold: 0,
    rootMargin: "0px 0px -200px 0px"

}

if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((items, observer) => {
        items.forEach((item) => {
            if (item.isIntersecting) {
                preloadImage(item.target);
                observer.unobserve(item.target);
            }
        });
    });
    images.forEach((img) => {
        observer.observe(img);
    }, imgOptions);
} else {

    images.forEach((img) => {
        loadImages(img);
    });

}