const toggleButton = document.getElementById('toggleButton');
const closeButton = document.getElementById('closeButton');
const sidebar = document.querySelector('.sidebar');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('open'); // クラスをトグルして展開・非展開を切り替え
});

closeButton.addEventListener('click', () => {
    sidebar.classList.remove('open'); // サイドバーを閉じる
});