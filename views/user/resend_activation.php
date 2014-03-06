<?php 
$this->pageTitle=Yii::t("UserModule.user", "Activate");

$this->breadcrumbs=array(
	Yum::t('Login') => array('//user/user/login'),
	Yum::t('Activate'));

$this->title = Yum::t('Activate'); 
?>

<?php 
if(Yii::app()->user->hasFlash('registration'))
{ 
?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php 
}
?>

<?php if($activateFromWeb): ?>

<?php echo CHtml::beginForm(array('registration/activation'),'GET',array()); ?> 

<div id="activatiion_code">
<div class="row-fluid">
<div class="span12">
<?php echo Yii::t("UserModule.user", "Enter the activation code you received below."); ?>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<?php if(isset($form->email)){ 
echo CHtml::hiddenField('email',$form->email);  
 }else{ 
	echo CHtml::activeLabelEx($user,'email');
	echo CHtml::textField('email',$form->email);
		}
?>

<?php echo CHtml::activeLabelEx($user,'activationKey'); ?>
<?php echo CHtml::textField('activationKey'); //fixme ?> 
</div>
</div>
<div class="row-fluid_submit row-fluid">
<div class="span12">
<?php echo CHtml::submitButton(Yii::t("UserModule.user", "Activate")); ?>
</div>
</div>
<?php echo CHtml::endForm(); ?>
<?php endif;?>
<?php echo $this->renderPartial('/user/_resend_activation_partial', array('user'=>$user,'form'=>$form)); ?>
