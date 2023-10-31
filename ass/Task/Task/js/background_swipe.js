const showBackgroundPathButton = document.getElementById('showBackgroundPath');
const background = document.getElementById('background');
const images = ['img/dog.jpeg', 'img/totoro.jpeg', 'img/sky.jpeg'];
let currentBackgroundIndex = 0;

function changeBackground(direction) {
    if (direction === 'left') {
        currentBackgroundIndex = (currentBackgroundIndex + 1) % images.length;
    } else if (direction === 'right') {
        currentBackgroundIndex = (currentBackgroundIndex - 1 + images.length) % images.length;
    }
    background.style.backgroundImage = `url('${images[currentBackgroundIndex]}')`;
    // 背景パスを更新
    document.getElementById('backgroundPath').value = images[currentBackgroundIndex];
}

// スワイプ検出
let touchStartX = 0;
let touchEndX = 0;

background.addEventListener('touchstart', (e) => {
    touchStartX = e.touches[0].clientX;
});

background.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].clientX;
    const swipeThreshold = 50; // スワイプを検出する閾値（ピクセル）
    
    if (touchEndX < touchStartX - swipeThreshold) {
        changeBackground('left'); // 左スワイプ
    } else if (touchEndX > touchStartX + swipeThreshold) {
        changeBackground('right'); // 右スワイプ
    }
});