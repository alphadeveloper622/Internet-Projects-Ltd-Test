<?php

/** @var yii\web\View $this */
use app\widgets\Alert;

$this->title = 'Fruits';
?>
<div class="site-index">
    <table id="fruits" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Favorite</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $field){ ?>
            <tr>
                <td data-search="<?= $field->name; ?>" data-order="<?= $field->name; ?>" ><?= $field->name; ?></td>
                <td data-search="<?= $field->family; ?>"><?= $field->family; ?></td>
                <td><?= $field->order1; ?></td>
                <td><?= $field->genus; ?></td>
                <td data-id="<?= $field->id; ?>" data-value="<?= $field->favorite !=0? 'active':'' ?>">
                    <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 501.28 501.28" xml:space="preserve" style="width:25px;height:25px;" class="favorite <?php if($field->favorite !=0) echo "active"?>" onclick="setFavorite(event,<?= $field->favorite ==0 ? true : false;?>)">
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
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Favorite</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php
    $message = 'This is an error message';
    Yii::$app->session->setFlash('error', $message);
    $renderingResult = Alert::widget(); 
?>
<div id="snackbar">The number of Favorites is over than ten!</div>