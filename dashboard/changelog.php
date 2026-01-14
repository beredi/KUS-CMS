<?php ob_start(); ?>
<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--    MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">


    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i>
        Zobraziť stránku</a>

	<?php
	include 'includes/profile_dropdown.php';
	?>
</div><!--//LG SCREEN NAVBAR-->
</nav>

<div class="container-fluid">
    <div class="row">
		<?php
		include "includes/navigation.php";  //INCLUDE NAVIGATION
		?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-muted">Changelog</h1>
            </div>

            <h5><strong>CMS KUS</strong> <?= $VERSION ?></h5>

            <table class="table table-hover table-striped" id="changelog">
                <thead>
                <tr>
                    <th style="width: 10%;">Dátum</th>
                    <th style="width: 90%;">Popis</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 10%;">14. 01. 2026</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Zmena v článkoch</li>
                            <li>Redesign predchádzajúcich podujatí</li>
                            <li>Zmenená paginácia v predchádzajúcich podujatiach</li>
                            <li>Export článkov do PDF</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">26. 11. 2023</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Redesign stránky</li>
                            <li>Vyhodené kľúčové slová z článkov</li>
                            <li>Názov článku 20-70 znakov</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">08. 07. 2023</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Členom možno priradiť jednotlivé sekcie</li>
                            <li>Pridané nastavenia a sekcie</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">26. 04. 2023</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Pridaná user role: tajomník</li>
                            <li>Pridané platby pre členov spolku</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">7. 6. 2022</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Fix: Nadchádzajúce podujatia - zoradenie podľa dátumu, nezobrazujú sa tie, čo už boli.
                            </li>
                            <li>Pridaný menu item: Členovia spolku</li>
                            <li>Zmenení užívatelia na používateľov</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">7. 12. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Pridaná "hviezdička" pri required poliach vo formulároch</li>
                            <li>Pridaná možnosť pridávania súborov na stiahnutie</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">1. 12. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Vytvorený changelog</li>
                            <li>Pridané Datatables</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">16. 6. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Vytvorená foto výzva</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">18. 5. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Navigácia - pridaný email</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">11. 5. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Článok - pridaný opis obrázku cez ALT atribút</li>
                            <li>Stránky sekcie - pridaný opis obrázku cez ALT atribút</li>
                            <li>JIRA</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%;">7. 5. 2021</td>
                    <td style="width: 90%;">
                        <ul>
                            <li>Pridaná sekcia "Tajné správy"</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>


        </main>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#changelog').DataTable({
            "order": [],
            "pageLength": 10
        });
    });
</script>

<?php

include 'includes/footer.php';


?>

