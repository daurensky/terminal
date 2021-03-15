<footer>
    <div class="to-top">
        <div class="container"><i class="material-icons-outlined">arrow_upward</i> Наверх</div>
    </div>
    <div class="container">
        <small>© 2021-2021 Интернет-магазин ИП Кубахова В.Е.</small>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js" integrity="sha512-BXASbMmKLu+RC5TDnkupyhvrjiOQXILh/5zgIS8k5JAC71a73lNweVEg/X+9XJQ7GK22PH9WpztY3zqrji+xrQ==" crossorigin="anonymous"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js" integrity="sha512-7G7ueVi8m7Ldo2APeWMCoGjs4EjXDhJ20DrPglDQqy8fnxsFQZeJNtuQlTT0xoBQJzWRFp4+ikyMdzDOcW36kQ==" crossorigin="anonymous"></script>
<script src="assets/js/global.js"></script>
<?php foreach ($scripts as $script) { ?>
    <script src="assets/js/<?= $script ?>.js"></script>
<?php } ?>
</body>

</html>