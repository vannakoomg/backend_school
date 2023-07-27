
<?php $__env->startSection('styles'); ?>
    <style>
        article {
            --img-scale: 1.001;
            --title-color: black;
            --link-icon-translate: -20px;
            --link-icon-opacity: 0;
            position: relative;
            border-radius: 16px;
            box-shadow: none;
            background: #fff;
            transform-origin: center;
            transition: all 0.4s ease-in-out;
            overflow: hidden;
        }

        article a::after {
            position: absolute;
            inset-block: 0;
            inset-inline: 0;
            cursor: pointer;
            content: "";
        }

        /* basic article elements styling */
        article h2 {
            /* margin: 0 0 18px 0; */
            /* font-family: "Bebas Neue", cursive; */
            font-size: 1.9rem;
            /* letter-spacing: 0.06em; */
            color: var(--title-color);
            transition: color 0.3s ease-out;
        }

        figure {
            margin: 0;
            padding: 0;
            aspect-ratio: 16 / 9;
            overflow: hidden;
        }

        article img {
            max-width: 100%;
            transform-origin: center;
            transform: scale(var(--img-scale));
            transition: transform 0.4s ease-in-out;
        }

        .article-body {
            padding: 20px;
        }

        article a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #28666e;
        }

        article a:focus {
            outline: 1px dotted #28666e;
        }

        article a .icon {
            min-width: 24px;
            width: 24px;
            height: 24px;
            margin-left: 5px;
            transform: translateX(var(--link-icon-translate));
            opacity: var(--link-icon-opacity);
            transition: all 0.3s;
        }

        /* using the has() relational pseudo selector to update our custom properties */
        article:has(:hover, :focus) {
            --img-scale: 1.1;
            --title-color: #28666e;
            --link-icon-translate: 0;
            --link-icon-opacity: 1;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }


        /************************
                                                                                                                                                                                                                                                        Generic layout (demo looks)
                                                                                                                                                                                                                                                        **************************/

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .articles {
            display: grid;
            max-width: 20%;
            margin-inline: auto;
            padding-inline: 24px;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        @media  screen and (max-width: 960px) {
            article {
                container: card/inline-size;
            }

            .article-body p {
                display: none;
            }
        }

        @container  card (min-width: 380px) {
            .article-wrapper {
                display: grid;
                grid-template-columns: 20px 1fr;
                gap: 15px;

            }

            .article-body {
                padding-left: 0;
            }

            figure {
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            figure img {
                height: 100%;
                aspect-ratio: 1;
                object-fit: cover;
            }
        }

        .sr-only:not(:focus):not(:active) {
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create'), false); ?>

        </div>
        <div class="card-body bg-instagram">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school_class_create')): ?>
                <div style="margin-bottom: 20px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="<?php echo e(route('admin.gallary.create'), false); ?>">
                            Add Gallary
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school_class_create')): ?>
                <div class="d-flex flex-wrap">
                    <?php $__currentLoopData = $gallary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallarysss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-25 pb-2">
                            <article class="mr-3 mb-1">
                                <div class="article-wrapper mr-0">
                                    <figure>
                                        <img src="https://picsum.photos/id/1011/800/450" alt="" />
                                    </figure>
                                    <div class="article-body">
                                        <h2> <?php echo e($gallarysss->name, false); ?></h2>
                                        <p>
                                            <?php echo e($gallarysss->description, false); ?>

                                        </p>

                                    </div>

                                </div>
                            </article>

                            <form class=" w-25" method="POST" action="<?php echo e(route('admin.gallary.destroyGallary'), false); ?>"
                                onsubmit="return confirm('<?php echo e(trans('global.areYouSure'), false); ?>');" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-xs btn-danger" name="id" value=<?php echo e($gallarysss->id, false); ?>>Delete</button>
                                <form>
                                    <a class="btn btn-xs btn-facebook"
                                        href="<?php echo e(route('admin.gallary.edit', $gallarysss->id), false); ?>">Edit</a>

                        </div>


                        
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/gallary/index.blade.php ENDPATH**/ ?>