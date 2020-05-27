<?php

$css_id = $this->get_css_id();

$fields['typo_heading'][ $css_id ]                  = $fields['typo_heading']['css'];
$fields['typo_heading'][ $css_id ][0]['selector'][] = '.btn-bs-pagination.btn-bs-pagination';
