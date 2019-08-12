<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Scroll slider</title>
    <meta name="description" content="Lightweight scrollable slider based on jQuery">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style_test.scss">

    <script src="js/testjs.js"></script>


</head>
<body>

<div class="grid-container sagh">
    <header class="grid-item header">
        <h2>🍽 CSS Grid Tem-plated 🍽</h2>

    </header>
    <div class="grid-item title">
        <h1>So you wanna side scroll, eh?</h1>
    </div>
    <main class="grid-item main">
        <div class="items">
            <div class="item item1"></div>
            <div class="item item2"></div>
            <div class="item item3"></div>
            <div class="item item4"></div>
            <div class="item item5"></div>
            <div class="item item6"></div>
            <div class="item item7"></div>
            <div class="item item8"></div>
            <div class="item item9"></div>
            <div class="item item10"></div>
        </div>
        <p>🐰🥚Click & Drag <i>powered by Javascript</i></p>
    </main>
    <footer class="grid-item footer">
        <h2>More Things</h2>
        <a>All of the Things</a>
        <a>Some of the Things</a>
        <a>None of the Things</a>
    </footer>
</div>

</body>
<script>

    const slider = document.querySelector('.items');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
    });
</script>

</html>