let carousel_slider = document.getElementById('carousel_slider');
let prev = document.getElementById('prev');
let next = document.getElementById('next');


let idx = 0;

function changeImage() {
    if (idx > 3) {
        idx = 0;
    } else if (idx < 0) {
        idx = 3
    }
    carousel_slider.style.transform = `translateX(${-idx * 100}%)`;
}

next.addEventListener('click', function change() {
    idx++;
    resetInterval();
    changeImage();
})

prev.addEventListener('click', function change() {
    idx--;
    resetInterval();
    changeImage();
})

let interval = setInterval(run, 4000);

function run() {
    idx++;
    changeImage();
}

function resetInterval(){
    clearInterval(interval);
    interval = setInterval(run, 5000);
}