<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
  ->in([__DIR__.'/src', __DIR__.'/public']);

return (new PhpCsFixer\Config())
  ->setRiskyAllowed(true)
  ->setRules([
      '@PSR12' => true,
      '@PhpCsFixer:risky' => true,
      '@PHP82Migration:risky' => true,
      '@Symfony' => true,
      'strict_param' => true,
      'array_syntax' => ['syntax' => 'short'],
      'blank_line_after_opening_tag' => true,
      'declare_strict_types' => true,
      'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
  ])
  ->setFinder($finder)
;
