<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="<?php echo e($blog->metadescription ?? ''); ?>">
 <meta name="keywords" content="<?php echo e($blog->metakeywords ?? ''); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-login common-container">
<h1 class="title page-title"><span><?php echo e($blog->title); ?></span></h1>
<div class="container blog-post">
<div class="row">
<div id="content" class="p-0">
<div class="post-details">
<div class="post-image">
<span class="p-date p-date-image"><?php echo blogDateFormat($blog->created_at); ?></span>
<img src="<?php echo e(imagePath($blog->image)); ?>" srcset="<?php echo e(imagePath($blog->image)); ?>" width="1060" height="400" alt="What is a Sunburn?" title="<?php echo e($blog->title); ?>">
</div>
<div class="post-stats">
<span class="p-posted">Posted By</span>
<span class="p-author">Admin</span>
<span class="p-comment"><?php echo e($blog->comments()->where('active',1)->where('delete','!=',1)->count()); ?> Comment(s)</span>
</div>
<div class="post-content cstm-post_content">
	<?php echo $blog->content; ?>

</div>
</div>
<div class="post-comments mb-5">
<div class="comment-form">
<h3 class="title">Leave a Comment</h3>
<form method="post" class="form-horizontal" action="<?php echo e(route('add-blog-comment',base64_encode($blog->_id))); ?>" onsubmit="blogComment.add(this)">
	 <?php echo csrf_field(); ?>
	 <?php echo method_field('post'); ?>
	<fieldset>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-name">Your Name</label>
			<div class="col-sm-10">
			   <input type="text" name="name" value="" id="input-name" class="form-control">
			   <span class="text text-danger err-msg" id="name_error"></span>
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
			<div class="col-sm-10">
			   <input type="text" name="email" value="" id="input-email" class="form-control">
			   <span class="text text-danger err-msg" id="email_error"></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="input-website">Web Site</label>
			<div class="col-sm-10">
			   <input type="text" name="website" value="" id="input-website" class="form-control">
			   <span class="text text-danger err-msg" id="website_error"></span>
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-comment">Comments</label>
			<div class="col-sm-10">
			   <textarea name="comment" rows="10" id="input-comment" class="form-control" spellcheck="false"></textarea>
			   <span class="text text-danger err-msg" id="comment_error"></span>
			</div>
		</div>
	</fieldset>
	<div class="buttons">
		<div class="pull-right">
		    <button type="submit" class="btn comment-submit">Submit</button>
		</div>
	</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => $blog->title,'pageTitle' => $blog->pagetitle ?? '' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/blog/blog.blade.php ENDPATH**/ ?>