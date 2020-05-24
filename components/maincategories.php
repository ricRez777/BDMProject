<nav class="MainCategories">
    <ul>

        <?php
            require_once ("models/section.php");
            $objMainSections = new section('', '', '', '');
            $objMainSections->get_All_Sections_Main();
        ?>

    </ul>
    <hr>
</nav>