<div class="sidenav">

    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
        <ul id="menu">
            <li><input type="checkbox" name="list" id="nivel1-1"><label for="nivel1-1">Categories</label>
                <ul class="interior">
                <?php
                    require_once ("models/section.php");
                    $objMainSections = new section('', '', '', '');
                    $objMainSections->get_All_Sections_Side();
                ?>
                </ul>
            </li>
        </ul>
    </div>
</div>