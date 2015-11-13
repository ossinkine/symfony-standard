<?php

/** @var Symfony\Component\Form\FormView $form */
/** @var Symfony\Bundle\FrameworkBundle\Templating\PhpEngine $view */
/** @var Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper $formHelper */
$formHelper = $view['form'];
?>

<?php echo $formHelper->widget($form['choice']) ?>
