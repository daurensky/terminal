<?php
$scripts = [];
?>

<main class="job">
    <h1>Работа 1</h1>

    <section>
        <div class="container">
            <div class="texts-container">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat vitae, corporis laudantium impedit facere ad, earum possimus natus, minus quisquam dolor vero quaerat! Explicabo, totam exercitationem velit voluptas aut accusantium?
                    Totam sint porro dolor veniam quos quaerat, odit adipisci aspernatur rem voluptates mollitia. Tenetur doloribus distinctio quo officia. Ratione ab omnis quibusdam in asperiores nam magni quidem amet, eveniet minus!
                    Sit repudiandae sint nobis voluptatem illo impedit distinctio! Assumenda, recusandae corporis! Aliquam hic quod rem doloremque commodi eum eos veritatis aliquid. Culpa dignissimos in id at exercitationem alias deserunt est?
                    Et consequuntur adipisci aperiam numquam inventore officiis natus quos placeat provident dolore, cupiditate esse deserunt minima voluptas. Explicabo consequuntur alias ad quod harum, quos eum error eos aut corrupti incidunt?
                    Saepe expedita odio asperiores molestias voluptas quaerat unde aspernatur nemo eius veritatis. Quo illo tempora qui consequatur provident inventore, illum necessitatibus officiis distinctio similique! Sit sed nam labore dignissimos expedita.
                </p>
                <p>Обязанности</p>
                <p>Требования</p>
                <p>comment</p>
            </div>
        </div>

        <h2>Откликнуться</h2>

        <div class="container">
            <form method="POST" enctype="multipart/form-data" class="feedback">
                <div class="form-group">
                    <label for="summary">Резюме:</label>
                    <div>
                        <label class="file-btn">
                            Выбрать файл
                            <input type="file" name="summary" id="summary" required>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Имя и фамилия:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон:</label>
                    <input type="text" name="phone" id="phone" data-inputmask="'mask': '+7 (999) 999-99-99'" placeholder="+7 (___) ___-__-__" required>
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта:</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="comment">Расскажите о себе и своем опыте:</label>
                    <textarea type="text" name="comment" id="comment" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>