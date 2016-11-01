<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <h1 class="bar-detail-h1">Bares & Patios Cerveceros</h1>
        <div id="nearbyBarsInfo">
            <span><a class="waves-effect waves-light" href="javascript:getLocation();">Quiero ver lugares cercanos</a></span>
        </div>
        <div id="nearbyBarsMap"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps" async defer></script>
    </div>

    <div class="row">
    <?php if($bars): ?>
        <?php echo $__env->renderEach('bars.listingview', $bars, 'bar'); ?>
    <?php else: ?>
        <p>No encontramos resultados para tu búsqueda... =(</p>
    <?php endif; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>