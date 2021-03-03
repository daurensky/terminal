<?php require_once 'blocks/header.php' ?>

<main class="contacts">
    <div class="container">
        <div class="title">
            <h1>Контакты</h1>
        </div>
    </div>
    <section class="info">
        <div class="container">
            <div class="text">
                <div class="icon-text">
                    <i class="material-icons-outlined">place</i>
                    <p>Республика Казахстан, г.Павлодар ул. Ломова д. 45к2</p>
                </div>
                <div class="icon-text">
                    <i class="material-icons-outlined">phone</i>
                    <p>+7 (777) 777-77-77</p>
                </div>
                <div class="icon-text">
                    <i class="material-icons-outlined">email</i>
                    <p>info@online-shop.kz</p>
                </div>
                <div class="btn-wrapper">
                    <button class="btn-outlined">Реквизиты компании</button>
                </div>
                <div class="btn-wrapper">
                    <button class="btn-outlined">Наш офис</button>
                </div>
            </div>
            <div style="position: relative; overflow: hidden; background-color: #fff; border-radius: 10px">
                <a href="https://yandex.kz/maps/190/pavlodar/?utm_medium=mapframe&utm_source=maps" style="color: #000; font-size: 12px; position: absolute; top: 0px">
                    Павлодар
                </a>
                <a href="https://yandex.kz/maps/geo/53168267/?ll=76.940947%2C52.285577&utm_medium=mapframe&utm_source=maps&z=12" style="color: #000; font-size: 12px; position: absolute; top: 14px">
                    Павлодар — Яндекс.Карты
                </a>
                <iframe src="https://yandex.ru/map-widget/v1/-/CCUQ5CCf3B" height="400" frameborder="0" allowfullscreen="true" style="position: relative; width: 100%"></iframe>
            </div>
        </div>
    </section>
    <section class="profiles">
        <div class="container">
            <div class="profile">
                <img src="assets/img/no-image-user.png" alt="User" class="avatar">
                <b>Кубахова Валентина Егоровна</b>
                <i>Директор</i>
                <p>+7 (777) 777-77-77</p>
                <p>Email: dir@online-shop.kz</p>
            </div>
            <div class="profile">
                <img src="assets/img/user.png" alt="User" class="avatar">
                <b>Тё Дмитрий Николаевич</b>
                <i>Главный программист</i>
                <p>+7 (777) 777-77-77</p>
                <p>Email: almas@online-shop.kz</p>
                <p>Discord: TyoDN#7596</p>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="container">
            <div class="title">
                <h1>Пишите нам</h1>
            </div>

            <form action="sended.php" method="POST">
                <div class="form-column">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ваше имя" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" data-inputmask="'mask': '+7 (999) 999-99-99'" placeholder="+7 (___) ___-__-__" required>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <select name="type">
                            <option value="tech">Техническая поддержка</option>
                            <option value="info">Информационная поддержка</option>
                        </select>
                        <div>
                            <button class="btn" type="submit">Отправить</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="5" placeholder="Ваше сообщение" required></textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php require_once 'blocks/footer.php' ?>