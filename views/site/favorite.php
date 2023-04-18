<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<div class="site-about">
    <table id="favorite" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Calories</th>
                <th>Carbohydrates</th>
                <th>Protein</th>
                <th>Fat</th>
                <th>Sugar</th>
                <th>Favorite</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $field){ ?>
            <tr>
                <td data-search="<?= $field->name; ?>" data-order="<?= $field->name; ?>" data-value="<?= $field->id; ?>"><?= $field->name; ?></td>
                <td data-search="<?= $field->calories; ?>" data-order="<?= $field->calories; ?>"><?= $field->calories; ?></td>
                <td data-search="<?= $field->carbohydrates; ?>" data-order="<?= $field->carbohydrates; ?>"><?= $field->carbohydrates; ?></td>
                <td data-search="<?= $field->protein; ?>" data-order="<?= $field->protein; ?>"><?= $field->protein; ?></td>
                <td data-search="<?= $field->fat; ?>" data-order="<?= $field->fat; ?>"><?= $field->fat; ?></td>
                <td data-search="<?= $field->sugar; ?>" data-order="<?= $field->sugar; ?>"><?= $field->sugar; ?></td>
                <td data-value="<?php if($field->favorite !=0) echo "active"?>">
                    <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 501.28 501.28" xml:space="preserve" style="width:25px;height:25px;" class="favorite <?php if($field->favorite !=0) echo "active"?>">
                    <g>
                        <polygon style="fill:#9BC9FF;" points="501.28,194.37 335.26,159.33 250.64,12.27 250.64,419.77 405.54,489.01 387.56,320.29 	"/>
                        <polygon style="fill:#BDDBFF;" points="166.02,159.33 0,194.37 113.72,320.29 95.74,489.01 250.64,419.77 250.64,12.27 	"/>
                    </g>
                    </svg>
                </td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Calories</th>
                <th>Carbohydrates</th>
                <th>Protein</th>
                <th>Fat</th>
                <th>Sugar</th>
                <th>Favorite</th>
            </tr>
        </tfoot>
    </table>
</div>
