<?php

$categories = DB::call()->query('SELECT id, name, logo FROM categories')->fetchAll();

if (isset($_GET['category'])) {
    $products = DB::call()->query('SELECT id, name, price, image FROM products WHERE category_id = ?', [$_GET['category']])->fetchAll();
}

function activeClass($id)
{
    return @$_GET['category'] === $id ? 'class="active"' : '';
}

?>

<main class="catalog">
    <h1>Каталог</h1>

    <section>
        <div class="container">
            <?php if (isset($_GET['category'])) { ?>
                <div>
                    <aside class="categories">
                        <?php foreach ($categories as $category) { ?>
                            <a href="catalog?category=<?= $category['id'] ?>" <?= activeClass($category['id']) ?>>
                                <?= $category['name'] ?>
                            </a>
                        <?php } ?>
                    </aside>
                </div>

                <?php if ($products) { ?>
                    <div class="products">
                        <?php foreach ($products as $product) { ?>
                            <div class="product-card">
                                <a href="product?id=<?= $product['id'] ?>">
                                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                                </a>
                                <a href="product?id=<?= $product['id'] ?>" class="price"><?= $product['price'] ?> ₸</a>
                                <a href="product?id=<?= $product['id'] ?>" class="title"><?= $product['name'] ?></a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <p>В данный момент продукты в этой категории отсутствуют</p>
                <?php } ?>
            <?php } else { ?>
                <div class="select-category">
                    <?php foreach ($categories as $category) { ?>
                        <a href="catalog?category=<?= $category['id'] ?>" <?= activeClass($category['id']) ?>>
                            <img src="<?= $category['logo'] ?>" alt="<?= $category['name'] ?>">
                            <p><?= $category['name'] ?></p>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>