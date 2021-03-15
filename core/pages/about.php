<?php
$scripts = ['about'];
?>

<main class="about">
    <h1>О компании</h1>

    <section class="selectors">
        <div class="container">
            <div class="selector">
                <div class="selector-item active" data-section="about">
                    О компании
                </div>
                <div class="selector-item" data-section="projects">
                    Наши проекты
                </div>
                <div class="selector-item" data-section="coop">
                    Сотрудничество
                </div>
                <div class="selector-item" data-section="jobs">
                    Вакансии
                </div>
            </div>
        </div>
    </section>

    <div class="dynamic-sections active" id="about">
        <section>
            <h2><?= $contacts['company_name'] ?></h2>

            <div class="container">
                <div class="texts-container">
                    <p>
                        Компания «<?= $contacts['company_name'] ?>» была образована в 2009 году. Мы занимаемся производством, продажей и сервисным обслуживанием
                        банковских и платежных терминалов. Мы являемся официальными дистрибьюторами и вендорами основных мировых
                        производителей комплектующих - Crane Payment Innovations (MEI, CashCode, NRI), ICT, Custom, Suzohapp, Newland,
                        ZaagTech, IRZ, Glory, MasterTouch, KeeTouch и другие. Мы поставляли оборудования собственного производства в такие
                        страны: Малайзия, Вьетнам, ОАЭ, Индия, Кыргызстан, Узбекистан, Туркменистан.
                    </p>
                    <p>
                        С 2009 года нашей компанией было реализовано более 30 000 платежных терминалов на рынке Казахстана. Среди
                        корпоративных клиентов крупнейшие компании и банки Казахстана: Казахтелеком, Каспи Банк, Народный Банк, Евразийский
                        Банк, Казкоммерцбанк, Форте Банк и другие банки второго уровня.
                    </p>
                    <p>Совместно с Каспи Банком в 2013 году реализован крупнейший в СНГ проект по платежным терминалам.</p>
                    <p>
                        Предлагаемые нами технические и технологические решения отвечают требованиям наших клиентов и являются оптимальными
                        по показателю "соотношение цены и качества".
                    </p>

                    <p>
                        В 2018 году на дистрибьюторском саммите, организатором которого является мировой лидер по производству
                        купюроприемников Crane Payment Innovations (MEI, CashCode, NRI), компания «<?= $contacts['company_name'] ?>» получила награду: кубок за
                        "Лучший Инновационный Проект”. Мы также заняли 2-место по объему продаж среди всех дистрибьюторов СНГ.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <div class="dynamic-sections" id="projects">
        <section class="projects">
            <h2>Наши проекты</h2>

            <div class="container">
                <div class="column">
                    <img src="assets/img/terminal1.webp" alt="Terminal 1">
                    <img src="assets/img/terminal5.webp" alt="Terminal 5">
                </div>
                <div class="column">
                    <img src="assets/img/terminal2.webp" alt="Terminal 2">
                </div>
                <div class="column">
                    <img src="assets/img/terminal3.webp" alt="Terminal 3">
                </div>
                <div class="column">
                    <img src="assets/img/terminal4.webp" alt="Terminal 4">
                </div>
            </div>
        </section>
    </div>

    <div class="dynamic-sections" id="coop">
        <section class="coop">
            <h2>Сотрудничество</h2>

            <div class="container">
                <div class="texts-container">
                    <p>По поводу сотрудничества обращаться: <?= $contacts['street'] ?></p>
                    <p>Тел: <?= $contacts['phone'] ?></p>
                </div>
            </div>
        </section>
    </div>

    <div class="dynamic-sections" id="jobs">
        <section class="jobs">
            <h2>Вакансии</h2>

            <div class="container">
                <a href="jobs?id=1" class="card">
                    <div class="header">
                        <h3 class="title">Требуется кто-то</h3>
                        <div class="misc">

                        </div>
                    </div>
                    <div class="body">
                        <p class="description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam in quas aut ut magni pariatur aliquam earum laudantium architecto atque deleniti, nostrum tempore velit consequuntur voluptate, optio quos libero delectus.
                            Non atque architecto labore, et fugiat in doloremque, porro odit aperiam veniam iure! Debitis ad placeat sapiente, laboriosam, molestiae quasi ea error inventore dicta magni consectetur reprehenderit. Totam, harum modi.
                            Alias molestias unde illum facere est ipsam quia quasi officiis enim sint expedita quo rerum ipsum odit minima, atque, esse sit error temporibus aspernatur corporis! Libero, nihil! Ullam, quis fugit.
                            Aut quisquam laborum, amet odit atque voluptate vero voluptatum quod sequi dignissimos fugit possimus vitae in, rem suscipit molestias. Sit quas, quae eveniet optio numquam illo blanditiis quisquam perspiciatis nemo?
                            Aspernatur consequatur dolore voluptatem magnam inventore deserunt modi, enim similique. Eos, sunt dignissimos numquam et a aut minima officiis nemo earum ratione iusto recusandae, dolores debitis impedit repellendus porro. Enim.
                        </p>
                    </div>
                </a>
                <!-- <p>В данный момент вакансий нет</p> -->
            </div>
        </section>
    </div>
</main>