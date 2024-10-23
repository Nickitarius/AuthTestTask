<?php require_once '../src/controllers/protected.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Внутренняя страница']) ?>
<div class="row justify-content-md-center">
    <div class="col col-6">
        <div class="row justify-content-md-center">
            <div class="card" style="width: 18rem;">
                <img src="<?= $pictureSrc ?>" id="dog-pic" class="card-img-top p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Собакен</h5>
                    <p class="card-text">Ради него всё и затевалось.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php view('footer'); ?>