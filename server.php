<?php
$titles = $_POST['titles'] ?? [];
$contents = $_POST['contents'] ?? [];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна - Результат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="block block-1">
        <h1>Результат</h1>
        <a href="index.html" class="btn">← Назад</a>
    </div>

    <div class="block block-2">
        <h3>Статус</h3>
        <p>Сторінку згенеровано успішно.</p>
    </div>

    <div class="block block-3">
        <h3>Меню</h3>
        <ul>
            <li><a href="index.html">Нова форма</a></li>
        </ul>
    </div>

    <div class="block block-4">
        <h3>Ваші блоки Collapse</h3>

        <?php if (!empty($titles)): ?>
            <div class="collapse-container">
                <?php for ($i = 0; $i < count($titles); $i++): ?>
                    <div class="collapse-item">
                        <button class="collapse-btn">
                            <?php echo htmlspecialchars($titles[$i]); ?>
                        </button>
                        
                        <div class="collapse-content">
                            <div class="collapse-inner">
                                <?php echo nl2br(htmlspecialchars($contents[$i])); ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        <?php else: ?>
            <p>Даних не отримано. <a href="index.html">Повернутися</a></p>
        <?php endif; ?>
    </div>

    <div class="block block-5">
        <h3>Інфо</h3>
        <p>Натисніть на заголовки, щоб розгорнути текст.</p>
    </div>

    <div class="block block-6"><h2>Promo</h2></div>

    <div class="block block-7">
        <h3>© 2025 Student Lab</h3>
    </div>
</div>

<script>
    var coll = document.getElementsByClassName("collapse-btn");
    
    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            
            var content = this.nextElementSibling;
            
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    }
</script>

</body>
</html>