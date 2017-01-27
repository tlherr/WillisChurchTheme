<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<div class="row well">
<div class="col-md-3 col-sm-4 col-xs-12">
	<?php print $fields['field_portrait']->wrapper_prefix; ?>
	<?php print $fields['field_portrait']->label_html; ?>
	<?php print $fields['field_portrait']->content; ?>
	<?php print $fields['field_portrait']->wrapper_suffix; ?>
</div>
<div class="col-md-9 col-sm-8 col-xs-12">
	<?php print $fields['title']->wrapper_prefix; ?>
        <?php print $fields['title']->label_html; ?>
        <?php print $fields['title']->content; ?>
        <?php print $fields['title']->wrapper_suffix; ?>

	<?php print $fields['field_term']->wrapper_prefix; ?>
        <?php print $fields['field_term']->label_html; ?>
        <?php print $fields['field_term']->content; ?>
        <?php print $fields['field_term']->wrapper_suffix; ?>

	<?php print $fields['field_biography']->wrapper_prefix; ?>
        <?php print $fields['field_biography']->label_html; ?>
        <?php print $fields['field_biography']->content; ?>
        <?php print $fields['field_biography']->wrapper_suffix; ?>

</div>
</div>
