

<?php $__env->startSection('styles'); ?>
    <meta name="og:url" property="og:url"
        content='https://www.aspsnippets.com/questions/198784/Play-audio-mp3-with-HTML5-audio-player-using-jQuery-in-ASPNet/demos/1' />

    <style>
        .file-upload {
            background-color: #ffffff;
            width: 250px;
            margin: 0 auto;
            padding: 20px;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #1FB264;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #15824B;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #1AA059;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #1FB264;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit'), false); ?>

            <?php echo e($user->roles->contains(3) ? 'Teacher' : ($user->roles->contains(4) ? 'Student' : trans('cruds.user.title_singular')), false); ?>

        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.users.update', [$user->id]), false); ?>" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label class="required" for="name"><?php echo e(trans('cruds.user.fields.name'), false); ?> (English)</label>
                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>" type="text"
                                name="name" id="name" value="<?php echo e(old('name', $user->name), false); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name'), false); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.name_helper'), false); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="required"
                                for="email"><?php echo e(!$user->roles->contains(4) ? 'Email' : 'Student ID', false); ?></label>
                            <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : '', false); ?>" type="text"
                                name="email" id="email" value="<?php echo e(old('email', $user->email), false); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('email'), false); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.email_helper'), false); ?></span>
                        </div>
                        <?php if($user->roles->contains(3)): ?>
                            <div class="form-group">
                                <label class="required" for="phone"><?php echo e('Phone', false); ?></label>
                                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : '', false); ?>" type="text"
                                    name="phone" id="phone" value="<?php echo e(old('phone', $user->phone), false); ?>" required>
                                <?php if($errors->has('phone')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('phone'), false); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label class="" for="namekh"><?php echo e(trans('cruds.user.fields.name'), false); ?> (Khmer)</label>
                            <input class="form-control <?php echo e($errors->has('namekh') ? 'is-invalid' : '', false); ?>" type="text"
                                name="namekh" id="namekh" value="<?php echo e(old('namekh', $user->namekh), false); ?>">
                            <?php if($errors->has('namekh')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('namekh'), false); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.name_helper'), false); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password"><?php echo e(trans('cruds.user.fields.password'), false); ?></label>
                            <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : '', false); ?>" type="password"
                                name="password" id="password">
                            <?php if($errors->has('password')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('password'), false); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.password_helper'), false); ?></span>
                        </div>



                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <img src="<?php echo e($user->photo ? asset('storage/photo/' . $user->photo ?? '') : asset('storage/image/' . ($user->roles->contains(4) ? 'student-avatar.png' : 'teacher-avatar.png')), false); ?>"
                                class="img-thumbnail btn btn-outline-primary" id="img_thumbnail" alt="select thumbnail"
                                width="150px" height="150px">
                            <input type="file" id="imgupload" name="imgupload" style="display:none" />
                        </div>

                    </div>
                </div>
                <?php if($user->roles->contains(4)): ?>
                    
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label class="required">Nationality</label>
                                <input id="nationality" name="nationality" type="text"
                                    class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                    value="<?php echo e(old('name', $user->nationality), false); ?>" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="required">Birth Date</label>
                                <input id="birth_date" name="birth_date" type="text"
                                    class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                    value="<?php echo e(old('name', $user->birth_date), false); ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">Gender</label>

                            <select class="form-control select2 <?php echo e($errors->has('class') ? 'is-invalid' : '', false); ?>"
                                name="gender" id="gender" required>
                                <option value="male" <?php if($user->gender == 'male'): ?> selected <?php endif; ?>>Male</option>
                                <option value="female" <?php if($user->gender == 'female'): ?> selected <?php endif; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">

                    <?php if($user->roles->contains(3)): ?>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="" for="class_id"><?php echo e(trans('cruds.user.fields.class'), false); ?></label>

                                <select class="form-control select2 <?php echo e($errors->has('class') ? 'is-invalid' : '', false); ?>"
                                    name="class_id[]" id="class_id" multiple>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id, false); ?>"
                                            <?php echo e(in_array($id, old('class_id', [])) || $user->classteacher->contains($id) ? 'selected' : '', false); ?>>
                                            <?php echo e($class, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('class'), false); ?>

                                    </div>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.user.fields.class_helper'), false); ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="" for="course_id">Course</label>

                                <select class="form-control select2 <?php echo e($errors->has('class') ? 'is-invalid' : '', false); ?>"
                                    name="course_id[]" id="course_id" multiple>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id, false); ?>"
                                            <?php echo e(in_array($id, old('course_id', [])) || $user->courseteacher->contains($id) ? 'selected' : '', false); ?>>
                                            <?php echo e($course, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('course')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('course'), false); ?>

                                    </div>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.user.fields.class_helper'), false); ?></span>
                            </div>

                        </div>
                    <?php endif; ?>
                </div>
                <?php if($user->roles->contains(3)): ?>
                    <input type="hidden" name="roles[]" value="3">
                <?php elseif($user->roles->contains(4)): ?>
                    <input type="hidden" name="roles[]" value="4">
                <?php else: ?>
                    <div class="form-group">
                        <label class="required" for="roles"><?php echo e(trans('cruds.user.fields.roles'), false); ?></label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                style="border-radius: 0"><?php echo e(trans('global.select_all'), false); ?></span>
                            <span class="btn btn-info btn-xs deselect-all"
                                style="border-radius: 0"><?php echo e(trans('global.deselect_all'), false); ?></span>
                        </div>
                        <select class="form-control select2 <?php echo e($errors->has('roles') ? 'is-invalid' : '', false); ?>"
                            name="roles[]" id="roles" multiple required>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id, false); ?>"
                                    <?php echo e(in_array($id, old('roles', [])) || $user->roles->contains($id) ? 'selected' : '', false); ?>>
                                    <?php echo e($roles, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('roles')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('roles'), false); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.user.fields.roles_helper'), false); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($user->roles->contains(4)): ?>
                    
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label class="required">Present Class</label>
                                <input id="present_class" name="present_class" type="text"
                                    class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                    value="<?php echo e(old('name', $user->present_class), false); ?>" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="required" for="class_id"><?php echo e(trans('cruds.user.fields.class'), false); ?></label>
                                <select class="form-control select2 <?php echo e($errors->has('class') ? 'is-invalid' : '', false); ?>"
                                    name="class_id" id="class_id" required>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id, false); ?>"
                                            <?php echo e(($user->class ? $user->class->id : old('class_id')) == $id ? 'selected' : '', false); ?>>
                                            <?php echo e($class, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('class'), false); ?>

                                    </div>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.user.fields.class_helper'), false); ?></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="required">Start Date</label>
                                <input id="start_date" name="start_date" type="text"
                                    class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                    value="<?php echo e(old('name', $user->start_date), false); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label>
                                    <div class="form-switch">
                                        <input class="form-check-input" type="checkbox" id="scanrfid_option">
                                        <label class="form-check-label"
                                            for="flexSwitchCheckChecked"><?php echo e('RFID Card', false); ?></label>
                                    </div>
                                </label>

                                <input class="form-control <?php echo e($errors->has('rfidcard') ? 'is-invalid' : '', false); ?>" readonly
                                    type="text" name="rfidcard" id="rfidcard"
                                    value="<?php echo e(old('rfidcard', $user->rfidcard), false); ?>">
                                <?php if($errors->has('rfidcard')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('rfidcard'), false); ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group text-nowrap align-bottom">
                                
                                <br />
                                <input name="audio_voice" id="audio_voice" class="file-upload-input" type='file'
                                    accept="audio/mp3" />
                                
                                <button class="btn btn-sm btn-primary" style="position:inline" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Upload Voice
                                    (Audio)</button>
                                <audio controls autoplay
                                    style="height: 10px; width: 150px;position:inline;padding-top:10px;margin:0">
                                    <?php if($user->voice): ?>
                                        <source src="<?php echo e(asset('storage/audio/' . $user->voice), false); ?>" type="audio/mp3">
                                    <?php endif; ?>
                                </audio>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" for="guardian_info">Collection Card</label>
                    </div>
                    <div class="row">
                        <div class="col-2 text-center">
                            <div class="form-group">
                                
                                <input type="file" id="collect_imgupload1" name="collect_imgupload1"
                                    style="display:none" />
                            </div>
                            <div class="form-group">
                                <select name="guardian1" id="guardian1" class="form-select">
                                    <?php $__currentLoopData = $collection_guardian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item == 'Select One Item' ? '' : $item, false); ?>"
                                            <?php echo e(($user->guardian1 ? $user->guardian1 : old('guardian1')) == $item ? 'selected' : '', false); ?>>
                                            <?php echo e($item, false); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="form-group">
                                <img src="<?php echo e($user->guardian2 ? asset('storage/photo/' . "{$user->id}_guardian2.png" ?? '') : asset('storage/image/guardian-avatar.png'), false); ?>"
                                    class="img-thumbnail btn btn-outline-primary" id="collect_thumbnail2"
                                    alt="select thumbnail" width="150px" height="150px">
                                <input type="file" id="collect_imgupload2" name="collect_imgupload2"
                                    style="display:none" />
                            </div>
                            <div class="form-group">
                                <select name="guardian2" id="guardian2" class="form-select">
                                    <?php $__currentLoopData = $collection_guardian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item == 'Select One Item' ? '' : $item, false); ?>"
                                            <?php echo e(($user->guardian2 ? $user->guardian2 : old('guardian2')) == $item ? 'selected' : '', false); ?>>
                                            <?php echo e($item, false); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-2 text-center">
                            <div class="form-group">
                                <img src="<?php echo e($user->guardian3 ? asset('storage/photo/' . "{$user->id}_guardian3.png" ?? '') : asset('storage/image/guardian-avatar.png'), false); ?>"
                                    class="img-thumbnail btn btn-outline-primary" id="collect_thumbnail3"
                                    alt="select thumbnai" width="150px" height="150px">
                                <input type="file" id="collect_imgupload3" name="collect_imgupload3"
                                    style="display:none" />
                            </div>
                            <div class="form-group">
                                <select name="guardian3" id="guardian3" class="form-select">
                                    <?php $__currentLoopData = $collection_guardian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item == 'Select One Item' ? '' : $item, false); ?>"
                                            <?php echo e(($user->guardian3 ? $user->guardian3 : old('guardian3')) == $item ? 'selected' : '', false); ?>>
                                            <?php echo e($item, false); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 text-right" style="padding-right:30px">
                            <div class="form-group">

                                <?php echo empty($user->rfidcard) ? '' : QrCode::size(150)->generate($user->rfidcard); ?>

                            </div>
                        </div>
                        
                    </div>
                <?php endif; ?>
                <input type="hidden" name="tableParent" id="tableParent">
                <input type="hidden" name="tableSibling" id="tableSibling">
                <input type="hidden" name="tableStudyHistory" id="tableStudyHistory">
                <div class="form-group">
                    <button class="btn btn-danger" id="submitFormBtn">
                        <?php echo e(trans('global.save'), false); ?>

                    </button>
                </div>


            </form>
            
            <?php if($user->roles->contains(4)): ?>
                <div>
                    
                    <div class="card border-dark ">
                        <div class="card-body">
                            <div class="p-3 bg-dark text-white">
                                <h4>Parent</h4>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table-info table-sm table-bordered table-striped table-hover datatable"
                                    id="dataParent">
                                    <thead>
                                        <tr>
                                            
                                            <th>Parent</th>
                                            <th>Name</th>
                                            <th>Nationality</th>
                                            <th>Work Address</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($p->type, false); ?></td>
                                                <td><?php echo e($p->name, false); ?></td>
                                                <td><?php echo e($p->nationality, false); ?></td>
                                                <td><?php echo e($p->work_address, false); ?></td>
                                                <td><?php echo e($p->phone_number, false); ?></td>
                                                <td><?php echo e($p->email_address, false); ?></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary mr-1"onclick="editParent(this)">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="deleteParent(this)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row ml-1">
                                <div class="col-1 form-check">
                                    <input class="form-check-input" type="checkbox" id="fatherCheck" checked>
                                    <label>Father</label>
                                </div>
                                <div class="col-1 form-check">
                                    <input class="form-check-input" type="checkbox" id="matherCheck">
                                    <label>Mather</label>
                                </div>
                            </div>
                            <form id="parent_form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="parent_name" name="parent_name" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nationality</label>
                                            <input id="parent_nationality" name="parent_nationality" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Work Address</label>
                                            <input id="work_address" name="work_address" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input id="phone_number" name="phone_number" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email Address </label>
                                            <input id="email_address" name="email_address" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <button class="btn btn-dark" onclick="addParent()">
                                <?php echo e(trans('global.save'), false); ?> Parent
                            </button>
                        </div>
                    </div>
                    
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="p-3 bg-facebook text-white">
                                <h4>Siblings</h4>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table-primary table-sm table-bordered table-striped table-hover datatable"
                                    id="dataSibling">
                                    <thead>
                                        <tr>
                                            
                                            <th>Family Name</th>
                                            <th>First Name</th>
                                            <th>Birth Date</th>
                                            <th>Grade/Level</th>
                                            <th>School</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $sibling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($s->family_name, false); ?></td>
                                                <td><?php echo e($s->first_name, false); ?></td>
                                                <td><?php echo e($s->birth_date, false); ?></td>
                                                <td><?php echo e($s->level, false); ?></td>
                                                <td><?php echo e($s->school, false); ?></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary mr-1"onclick="editSibling(this)">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="deleteSibling(this)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <form id="sibling_form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Family Name</label>
                                            <input id="family_name" name="family_name" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input id="first_name" name="first_name" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <input id="sibling_birth_date" name="sibling_birth_date" type="text"
                                                class="form-control datetimepicker">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">Grade/Level
                                            <label></label>
                                            <input id="sibling_level" name="sibling_level" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>School</label>
                                            <input id="sibling_school" name="sibling_school" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <button class="btn btn-facebook" onclick="addSibling()">
                                <?php echo e(trans('global.save'), false); ?> Sibling
                            </button>
                        </div>
                    </div>
                    
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="p-3 bg-primary text-white">
                                <h4>Study History</h4>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table-info table-sm table-bordered table-striped table-hover datatable"
                                    id="dataStudyHistory">
                                    <thead>
                                        <tr>
                                            
                                            <th>School Name</th>
                                            <th>Location</th>
                                            <th>Language</th>
                                            <th>Level</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $studyHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($sh->school_name, false); ?></td>
                                                <td><?php echo e($sh->location, false); ?></td>
                                                <td><?php echo e($sh->language, false); ?></td>
                                                <td><?php echo e($sh->level, false); ?></td>
                                                <td><?php echo e($sh->start_date, false); ?></td>
                                                <td><?php echo e($sh->end_date, false); ?></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary mr-1"onclick="editStudyHistory(this)">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="deleteStudyHistory(this)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <form id="study_history_form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>School Name</label>
                                            <input id="school_name" name="school_name" type="text"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input id="location" name="location" type="text" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Language</label>
                                            <input id="language" name="language" type="text" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>level</label>
                                            <input id="level" name="level" type="text" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> Start Date </label>
                                            <input id="history_start_date" name="history_start_date" type="text"
                                                class="form-control datetimepicker ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>End Date </label>
                                            <input id="end_date" name="end_date" type="text"
                                                class="form-control datetimepicker ">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <button class="btn btn-info" onclick="addStudyHistory()">
                                <?php echo e(trans('global.save'), false); ?> Study History
                            </button>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modelEditParent">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header mb-5">
                                    <h1 class="modal-title">Update Parent</h1>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input form-check-lg" type="checkbox"
                                                id="edit_fatherCheck" checked>
                                            <label>Father</label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_matherCheck">
                                            <label>Mather </label>
                                        </div>
                                    </div>
                                </div>
                                <form id="edit_parent_form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input id="edit_parent_name" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input id="edit_parent_nationality" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Work Address</label>
                                                <input id="edit_work_address" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input id="edit_phone_number" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input id="edit_email_address" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="modal-footer mt-5">
                                    <button class="btn btn-dark " onclick="updateParent()">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modelEditStudyHistory">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content p-5">
                                <div class="modal-header mb-5">
                                    <h1 class="modal-title">Update Study History</h1>
                                </div>
                                <form id="study_history_form ">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>School Name</label>
                                                <input id="edit_school_name" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input id="edit_location" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Language</label>
                                                <input id="edit_language" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>level</label>
                                                <input id="edit_level" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label> Start Date </label>
                                                <input id="edit_history_start_date" type="text"
                                                    class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                                    value="<?php echo e(old('name', ''), false); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>End Date </label>
                                                <input id="edit_end_date" type="text"
                                                    class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                                    value="<?php echo e(old('name', ''), false); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-primary"
                                        onclick="updateStudtHistory()">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modelEditSibling">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header mb-5">
                                    <h1 class="modal-title">Update Sibling</h1>
                                </div>
                                <form id="sibling_form ">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Family Name</label>
                                                <input id="edit_family_name" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input id="edit_first_name" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input id="edit_sibling_birth_date" type="text" value="sdfjsfjs"
                                                    class="form-control datetimepicker">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Grade/Level</label>
                                                <input id="edit_sibling_level" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>School</label>
                                                <input id="edit_sibling_school" type="text" class="form-control ">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-primary"
                                        onclick="updateSibling()">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.rfid.js'), false); ?>"></script>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });
            'use strict';

            var rfidParser = function(rawData) {
                console.log(rawData);
                if (rawData.length != 11) return null;
                else return rawData;

            };

            // Called on a good scan (company card recognized)
            var goodScan = function(cardData) {
                $("#rfidcard").val(cardData.substr(0, 10));

            };

            // Called on a bad scan (company card not recognized)
            var badScan = function() {
                console.log("Bad Scan.");
            };

            // Initialize the plugin.
            // $.rfidscan({
            //     parser: rfidParser,
            //     success: goodScan,
            //     error: badScan
            // });

            var default_scan = false;

            $('#scanrfid_option').change(function() {
                default_scan = !default_scan;
                if (default_scan)
                    $.rfidscan({
                        enabled: true,
                        parser: rfidParser,
                        success: goodScan,
                        error: badScan
                    });
                else {
                    $.rfidscan({
                        enabled: false,
                        parser: rfidParser,
                        success: goodScan,
                        error: badScan
                    });
                    $(document).unbind(".rfidscan");
                }

            });

            $('#img_thumbnail').click(function() {
                $('#imgupload').trigger('click');
            });

            $('#collect_thumbnail1').click(function() {
                $('#collect_imgupload1').trigger('click');
            });

            $('#collect_thumbnail2').click(function() {
                $('#collect_imgupload2').trigger('click');
            });

            $('#collect_thumbnail3').click(function() {
                $('#collect_imgupload3').trigger('click');
            });

            $('#imgupload').change(function(e) {
                var filename = e.target.files[0].name;
                var reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#img_thumbnail').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);

            });


            $('#collect_imgupload1').change(function(e) {
                var filename = e.target.files[0].name;
                var reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#collect_thumbnail1').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);

            });


            $('#collect_imgupload2').change(function(e) {
                var filename = e.target.files[0].name;
                var reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#collect_thumbnail2').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);

            });


            $('#collect_imgupload3').change(function(e) {
                var filename = e.target.files[0].name;
                var reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#collect_thumbnail3').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);

            });

            <?php echo $user->voice ? '' : '$("audio").hide();'; ?>


            $('input[name="audio_voice"]').change(function() {
                var fileInput = document.getElementById('audio_voice');
                var files = fileInput.files;
                // console.log(files);
                var fileURL = URL.createObjectURL(files[0]);
                document.querySelector('audio').src = fileURL;
                $("audio").show();
            });



        });
        // var j = <?php echo e(count($sibling), false); ?>;
        // var i = <?php echo e(count($studyHistory), false); ?>;
        // var k = <?php echo e(count($parents), false); ?>;

        function addParent() {
            if ($('#parent_name').val() != "" || $('#parent_nationality').val() != "" || $('#work_address').val() != "" ||
                $(
                    '#phone_number').val() != "" || $('#email_address').val() != "") {
                var parent_name = $('#parent_name').val();
                var parent_nationality = $('#parent_nationality').val();
                var work_address = $('#work_address').val();
                var phone_number = $('#phone_number').val();
                var email_address = $('#email_address').val();
                if ($('#fatherCheck').prop('checked')) {
                    var parent = "Father";
                    $('#fatherCheck').prop('checked', false);
                    $('#matherCheck').prop('checked', true);
                } else {
                    var parent = "Mather";
                    $('#fatherCheck').prop('checked', true);
                    $('#matherCheck').prop('checked', false);
                }
                var newRow = '<tr>' +
                    // '<td>' + k + '</td>' +
                    '<td>' + parent + '</td>' +
                    '<td>' + parent_name + '</td>' +
                    '<td>' + parent_nationality + '</td>' +
                    '<td>' + work_address + '</td>' +
                    '<td>' + phone_number + '</td>' +
                    '<td>' + email_address + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-sm btn-primary mr-1"onclick="editParent(this)">Edit</button>' +
                    '<button type="button" class="btn btn-sm btn-danger" onclick="deleteParent(this)">Delete</button>' +
                    '</td>' +
                    '</tr>';
                $('#dataParent tbody').append(newRow);
                $('#parent_form')[0].reset();
            }
        }

        function addSibling() {
            if ($('#family_name').val() != "" || $('#first_name').val() != "" || $('#sibling_birth_date').val() != "" || $(
                    '#sibling_level').val() != "" || $('#sibling_school').val() != "") {
                var family_name = $('#family_name').val();
                var first_name = $('#first_name').val();
                var sibling_birth_date = $('#sibling_birth_date').val();
                var sibling_level = $('#sibling_level').val();
                var sibling_school = $('#sibling_school').val();
                // j = j + 1;
                var newRow = '<tr>' +
                    // '<td>' + j + '</td>' +
                    '<td>' + family_name + '</td>' +
                    '<td>' + first_name + '</td>' +
                    '<td>' + sibling_birth_date + '</td>' +
                    '<td>' + sibling_level + '</td>' +
                    '<td>' + sibling_school + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-sm btn-primary mr-1"onclick="editSibling(this)">Edit</button>' +
                    '<button type="button" class="btn btn-sm btn-danger" onclick="deleteSibling(this)">Delete</button>' +
                    '</td>' +
                    '</tr>';
                $('#dataSibling tbody').append(newRow);
                $('#sibling_form')[0].reset();
            }
        }

        function addStudyHistory() {
            if ($('#school_name').val() != "" || $('#location').val() != "" || $('#language').val() != "" || $(
                    '#level').val() != "" || $('#history_start_date').val() != "" || $('#end_date').val() != "") {
                var school_name = $('#school_name').val();
                var location = $('#location').val();
                var language = $('#language').val();
                var level = $('#level').val();
                var history_start_date = $('#history_start_date').val();
                var end_date = $('#end_date').val();
                var newRow = '<tr>' +
                    // '<td>' + i + '</td>' +
                    '<td>' + school_name + '</td>' +
                    '<td>' + location + '</td>' +
                    '<td>' + language + '</td>' +
                    '<td>' + level + '</td>' +
                    '<td>' + history_start_date + '</td>' +
                    '<td>' + end_date + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-sm btn-primary mr-1"onclick="editStudyHistory(this)">Edit</button>' +
                    '<button type="button" class="btn btn-sm btn-danger" onclick="deleteStudyHistory(this)">Delete</button>' +
                    '</td>' +
                    '</tr>';
                $('#dataStudyHistory tbody').append(newRow);
                $('#study_history_form')[0].reset();
            }
        }

        function deleteParent(button) {
            var table = $('#dataParent').DataTable();
            table.row($(button).closest('tr')).remove().draw();
            table.destroy();
        }

        function deleteStudyHistory(button) {
            var table = $('#dataStudyHistory').DataTable();
            table.row($(button).closest('tr')).remove().draw();
            table.destroy();
        }

        function deleteSibling(button) {
            var table = $('#dataSibling').DataTable();
            table.row($(button).closest('tr')).remove().draw();
            table.destroy();
        }
        var indexEditStudyHistory = "";

        function editStudyHistory(button) {
            var table = $('#dataStudyHistory').DataTable();
            var row = table.row($(button).closest('tr')).data();
            indexEditStudyHistory = button.closest('tr').rowIndex;
            console.log(indexEditStudyHistory);
            $('#edit_school_name').val(row[0] ?? '');
            $('#edit_location').val(row[1] ?? '');
            $('#edit_language').val(row[2] ?? '');
            $('#edit_level').val(row[3] ?? '');
            $('#edit_history_start_date').val(row[4] ?? '');
            $('#edit_end_date').val(row[5] ?? '');
            $('#modelEditStudyHistory').modal('show');
            table.destroy();
        }
        var indexEditParent;

        function editParent(button) {
            var table = $('#dataParent').DataTable();
            var row = table.row($(button).closest('tr')).data();
            indexEditParent = button.closest('tr').rowIndex;
            if (row[0] == "Father") {
                $('#edit_matherCheck').prop('checked', false);
                $('#edit_fatherCheck').prop('checked', true);
            } else {
                $('#edit_matherCheck').prop('checked', true);
                $('#edit_fatherCheck').prop('checked', false);
            }
            $('#edit_parent_name').val(row[1] ?? '');
            $('#edit_parent_nationality').val(row[2] ?? '');
            $('#edit_work_address').val(row[3] ?? '');
            $('#edit_phone_number').val(row[4] ?? '');
            $('#edit_email_address').val(row[5] ?? '');
            $('#modelEditParent').modal('show');
            table.destroy();
        }

        var indexSibling;

        function editSibling(button) {
            var table = $('#dataSibling').DataTable();
            var row = table.row($(button).closest('tr')).data();
            indexSibling = button.closest('tr').rowIndex;
            $('#edit_family_name').val(row[0] ?? '');
            $('#edit_first_name').val(row[1] ?? '');
            $('#edit_sibling_birth_date').val(row[2] ?? '');
            $('#edit_sibling_level').val(row[3] ?? '');
            $('#edit_sibling_school').val(row[4] ?? '');
            $('#modelEditSibling').modal('show');
            table.destroy();
        }

        function updateStudtHistory(buttton) {
            var table = document.getElementById('dataStudyHistory');
            var cells = table.rows[indexEditStudyHistory].cells;
            cells[0].innerHTML = $('#edit_school_name').val();
            cells[1].innerHTML = $('#edit_location').val();
            cells[2].innerHTML = $('#edit_language').val();
            cells[3].innerHTML = $('#edit_level').val();
            cells[4].innerHTML = $('#edit_history_start_date').val();
            cells[5].innerHTML = $('#edit_end_date').val();
            $('#modelEditStudyHistory').modal('hide');
        }

        function updateSibling(button) {
            var table = document.getElementById('dataSibling');
            var cells = table.rows[indexSibling].cells;
            cells[0].innerHTML = $('#edit_family_name').val();
            cells[1].innerHTML = $('#edit_first_name').val();
            cells[2].innerHTML = $('#edit_sibling_birth_date').val();
            cells[3].innerHTML = $('#edit_sibling_level').val();
            cells[4].innerHTML = $('#edit_sibling_school').val();
            $('#modelEditSibling').modal('hide');
        }

        function updateParent() {
            var table = document.getElementById('dataParent');
            var cells = table.rows[indexEditParent].cells;
            if ($('#edit_fatherCheck').prop('checked')) {
                cells[0].innerHTML = "Father";
            } else {
                cells[0].innerHTML = "Mather";
            }
            cells[1].innerHTML = $('#edit_parent_name').val();
            cells[2].innerHTML = $('#edit_parent_nationality').val();
            cells[3].innerHTML = $('#edit_work_address').val();
            cells[4].innerHTML = $('#edit_phone_number').val();
            cells[5].innerHTML = $('#edit_email_address').val();
            $('#modelEditParent').modal('hide');
        }
        $('#fatherCheck').change(function() {
            if ($(this).prop('checked')) {
                $('#matherCheck').prop('checked', false);
            }
        });

        $('#matherCheck').change(function() {
            if ($(this).prop('checked')) {
                $('#fatherCheck').prop('checked', false);
            }
        });
        $('#edit_fatherCheck').change(function() {
            if ($(this).prop('checked')) {
                $('#edit_matherCheck').prop('checked', false);
            }
        });
        $('#edit_matherCheck').change(function() {
            if ($(this).prop('checked')) {
                $('#edit_fatherCheck').prop('checked', false);
            }
        });
        $('#submitFormBtn').click(function() {
            console.log("khmer sl khmer");
            // if ($('#present_class').val() != "" && $('#name').val() != "" && $('#email').val() !=
            //     "" &&
            //     $('#password').val() != "" && $('#phone').val() != "" && $('#parent_nationality').val() !=
            //     "" &&
            //     $('#birth_date').val() != "" && $('#class_id').val() != "" && $('#history_start_date')
            //     .val() !=
            //     "") {
            var dataParent = $('#dataParent').DataTable().rows().data().toArray();
            var dataSibling = $('#dataSibling').DataTable().rows().data().toArray();
            var dataStudyHistory = $('#dataStudyHistory').DataTable().rows().data().toArray();
            $('#tableParent').val(JSON.stringify(dataParent));
            $('#tableSibling').val(JSON.stringify(dataSibling));
            $('#tableStudyHistory').val(JSON.stringify(dataStudyHistory));
            // }
            $('#myForm').submit();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\VANNAK\Desktop\backend_school\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>