<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1790426964,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '1.12.34',
  'phpVersion' => 80400,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional], earlyTerminatingFunctionCalls: [abort, dd], excludePaths: {analyseAndScan: [*.blade.php], analyse: []}, mixinExcludeClasses: [Eloquent], bootstrapFiles: [D:\\Rizkia\\Project Software\\Greentify\\vendor\\larastan\\larastan\\bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: false, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, viewDirectories: [], checkModelProperties: false, checkPhpDocMissingReturn: false, checkUnusedViews: false, checkModelAppends: false, level: 6, paths: [D:\\Rizkia\\Project Software\\Greentify\\app], tmpDir: D:\\Rizkia\\Project Software\\Greentify\\.phpstan\\cache}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: [{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\Extension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Types\\RelationDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelRelationsDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationFindExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFindExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\BuilderModelFindExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EnumerableGenericStaticMethodDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EnumerableGenericStaticMethodDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\RelationParserHelper, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @currentPhpVersionSimpleDirectParser, reflectionProvider: @reflectionProvider}}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\PhpMyAdminDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}]}',
  'analysedPaths' => 
  array (
    0 => 'D:\\Rizkia\\Project Software\\Greentify\\app',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    'D:/Rizkia/Project Software/Greentify/composer.lock' => '6ff20de57567a29f288ea8e9e0a592fa96bec659',
  ),
  'composerInstalled' => 
  array (
    'D:/Rizkia/Project Software/Greentify/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'brick/math' => 
        array (
          'pretty_version' => '0.12.1',
          'version' => '0.12.1.0',
          'reference' => 'f510c0a40911935b77b86859eb5223d58d660df1',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.0.10',
          'version' => '2.0.10.0',
          'reference' => '5817d0659c5b50c9b950feb9af7b9668e2c436bc',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.3.3',
          'version' => '3.3.3.0',
          'reference' => 'adfb1f505deb6384dc8b39804c5065dd3c8c8c0a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.2',
          'version' => '4.0.2.0',
          'reference' => 'ebaaf5be6c0286928352e054f2d5125608e5405e',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.23.1',
          'version' => '1.23.1.0',
          'reference' => 'bfb4fe148adbf78eff521199619b93a52ae3554b',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.15.4',
          'version' => '2.15.4.0',
          'reference' => 'a139776fa3f5985a50b509f2a02ff0f709d2a546',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => '3d158f36e7875e2f040f37bc0573956240a5a38b',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '41042bc7ab002487b876a0683fc8dce04ddce104',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'bbff78d96034045e58e13dedd6ad91b5d1253223',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.6.2',
          'version' => '2.6.2.0',
          'reference' => '45b30f99ac27b5ca93cb4831afe16285f57b8221',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'ecea8feef63bd4fef1f037ecb288386999ecc11c',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.11.0',
          ),
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v2.9.8',
          'version' => '2.9.8.0',
          'reference' => '340badd89b0eb5bddbc503a4829c08cf9a2819d7',
          'type' => 'phpstan-extension',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v11.11.0',
          'version' => '11.11.0.0',
          'reference' => '194102876df42f9f5bb618efa55fa7e15ebf40aa',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.16.1',
          'version' => '1.16.1.0',
          'reference' => '9266a47f1b9231b83e0cfd849009547329d871b1',
          'type' => 'project',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.1.24',
          'version' => '0.1.24.0',
          'reference' => '409b0b4305273472f3754826e68f4edbd0150149',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.29.3',
          'version' => '1.29.3.0',
          'reference' => 'e35b3ffe1b9ea598246d7e99197ee8799f6dc2e5',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/sanctum' => 
        array (
          'pretty_version' => 'v4.3.3',
          'version' => '4.3.3.0',
          'reference' => 'fee27a573d1a013af3721d86153a65e0b11927e6',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/sanctum',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v1.3.3',
          'version' => '1.3.3.0',
          'reference' => '3dbf8a8e914634c48d389c1234552666b3d43754',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.9.0',
          'version' => '2.9.0.0',
          'reference' => '502e0fe3f0415d06d5db1f83a472f0f3b754bafe',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.4.2',
          'version' => '2.4.2.0',
          'reference' => '91c24291965bd6d7c46c46a12ba7492f83b1cadf',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.28.0',
          'version' => '3.28.0.0',
          'reference' => 'e611adab2b1ae2e3072fa72d62c62f52c2bf1f0c',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.28.0',
          'version' => '3.28.0.0',
          'reference' => '13f22ea8be526ea58c2ddff9e158ef7c296e4f40',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.15.0',
          'version' => '1.15.0.0',
          'reference' => 'ce0f4d1e8a6f4eb0ddff33f57c69c50fd09f4301',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.6.0',
          'version' => '3.6.0.0',
          'reference' => '4b18b21a5527a3d5ffdac2fd35d3ab25a9597654',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.12.0',
          'version' => '1.12.0.0',
          'reference' => '3a6b9a42cd8f8771bd4295d13e1423fa7f3d942c',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.5.0',
          'version' => '3.5.0.0',
          'reference' => '415782b7e48223342f1a616c16c45a95b15b2318',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.5',
          'version' => '1.3.5.0',
          'reference' => 'f0ab1a3cda782dbc5da270d28545236aa80c4002',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.5',
          'version' => '4.1.5.0',
          'reference' => 'b043439dbdf954e6c28b5ea7e34b0100f83165e0',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.0.2',
          'version' => '5.0.2.0',
          'reference' => '139676794dc1e9231bf7bcd123cfc0c99182cb13',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.1.1',
          'version' => '8.1.1.0',
          'reference' => '13e5d538b95a744d85f447a321ce10adb28e9af9',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => '58c4c58cf23df7f498daeb97092e34f5259feb6a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpmyadmin/sql-parser' => 
        array (
          'pretty_version' => '5.11.1',
          'version' => '5.11.1.0',
          'reference' => '1b70d03526df92bd1e170e2670b7d3510e1b722b',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpmyadmin/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '1.12.34',
          'version' => '1.12.34.0',
          'reference' => '4dd89ca7aa30fdc6760be21550d583bcc32e8476',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.3',
          'version' => '11.0.3.0',
          'reference' => '7e35a2cbcabac0e6865fd373742ea432a3c34f92',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => '99e95c94ad9500daca992354fa09d7b99abe2210',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => '5d8d9355a16d8cc5a1305b0a85342cfa420612be',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => 'd38f6cbff1cdb6f40b03c9811421561668cc133e',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.0',
          'version' => '7.0.0.0',
          'reference' => '8a59d9e25720482ee7fcdf296595e08795b84dc5',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.2.3',
          'version' => '11.2.3.0',
          'reference' => '8475044fbb0af57c8daea06bcfe21e2785401f97',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.4',
          'version' => '0.12.4.0',
          'reference' => '2fd717afa05341b4f8152547f142cd2f130f6818',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => 'a4b48764bfbb8f3a6a4d1aeb1a35bb5e9ecac4a5',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.7.6',
          'version' => '4.7.6.0',
          'reference' => '91039bc1faa45ba123c4328958e620d382ec7088',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.7.6',
          ),
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '00a74d5568694711f0222e54fb281e1d15fdf04a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '6634549cb8d702282a04a774e36a7477d2bd9015',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => 'df80c875d3e459b45c6039e4d9b71d4fbccae25d',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.0.0',
          'version' => '6.0.0.0',
          'reference' => 'bd0f2fa5b9257c69903537b266ccb80fcf940db8',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => '88a434ad86150e11a606ac4866b09130712671f0',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'ab83243ecc233de5655b76f577711de9f842e712',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.1.0',
          'version' => '7.1.0.0',
          'reference' => '4eb3a442574d0e9d141aab209cd4aaf25701b09a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.1.2',
          'version' => '6.1.2.0',
          'reference' => '507d2333cbc4e6ea248fbda2d45ee1511e03da13',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => 'c3a307e832f2e69c7ef869e31fc644fde0e7cb3e',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '376c5b3f6b43c78fdc049740bca76a7c846706c0',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.0',
          'version' => '6.0.0.0',
          'reference' => 'f75f6c460da0bbd9668f43a3dde0ec0ba7faa678',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => 'bb2a6255d30853425fd38f032eb64ced9f7f132d',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => '2f15508e17af4ea35129bbc32ce28a814d9c7426',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => 'b8502785eb3523ca0dd4afe9ca62235590020f3f',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => '13999475d2cb1ab33cb73403ba356a814fdbb001',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '3dfc8b084853586de51dd1441c6242c76a28cbe7',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '9b008f2d7b21c74ef4d0c3de6077a642bc55ece3',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '1c7cee86c6f812896af54434f8ce29c8d94f9ff4',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.5.0',
          'version' => '3.5.0.0',
          'reference' => '0e0d29ce1f20deffb4ab1b016a7257c4f1e789a1',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'e9b8bbce0b4f322939332ab7b6b81d8c11da27dd',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '9fa7f7a21beb22a39a8f3f28618b29e50d7a55a7',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.5.0',
          'version' => '3.5.0.0',
          'reference' => '8f93aec25d41b72493c6ddff14e916177c9efc50',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'fbb0ba67688b780efbc886c1a0a0948dcf7205d6',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '74d171d5b6a1d9e4bfee09a41937c17a7536acfa',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'fa8d1c75b5f33b1302afccf81811f93976c6e26f',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '2eaad2e167cae930f25a3d731fec8b2ded5e751e',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '21027eaacc1a8a20f5e616c25c3580f5dd3a15df',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '141046a8f9477948ff284fa65be2095baafb94f2',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => '64647a7c30b2283f5d49b874d84a18fc22054b7a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => 'a6e83bdeb3c84391d1dfe16f42e40727ce524a5c',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => 'a95281b0be0d9ab48050ebd988b967875cdb9fdb',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => 'd3d318bad5e7a1bfbd026009c8bfb8d8f99ae6b6',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php72' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => '10112722600777e02d2745716b70c5db4ca70442',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-php72',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => 'dfb55726c3a76ea3b6459fcfda1ec2d80a682411',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => 'dbdcdf1a4dcc2743591f1079d0c35ab1e2dcbbc9',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.30.0',
          'version' => '1.30.0.0',
          'reference' => '2ba1f33797470debcda07fe9dce20a0003df18e9',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'febf90124323a093c7ee06fdb30e765ca3c20028',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '60c31bab5c45af7f13091b87deb708830f3c96c0',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.5.0',
          'version' => '3.5.0.0',
          'reference' => 'bd1d9e59a81d8fa4acdcea3f617c581f7475a80f',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => '60bc311c74e0af215101235aa6f471bcbc032df2',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'cf5ae136e124fc7681b34ce9fac9d5b9ae8ceee3',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.5.0',
          'version' => '3.5.0.0',
          'reference' => 'b9d2189887bb6b2e0367a9fc7136c5239ab9b05a',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'bb59febeecc81528ff672fad5dab7f06db8c8277',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'deb2c2b506ff6fdbb340e00b34e9901e1605f293',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.1.1',
          'version' => '7.1.1.0',
          'reference' => 'fa34c77015aa6720469db7003567b9f772492bf2',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.2.3',
          'version' => '1.2.3.0',
          'reference' => '737eda637ed5e28c3413cb1ebe8bb52cbf1ca7a2',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.2.7',
          'version' => '2.2.7.0',
          'reference' => '83ee6f38df0a63106a9e4536e3060458b74ccedb',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.4',
          'version' => '5.6.4.0',
          'reference' => '416df702837983f8d5ff48c9c3fee4f5f57b980b',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '8e1051fe39379367aecf014f41744ce7539a856f',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '1.11.0',
          'version' => '1.11.0.0',
          'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
          'type' => 'library',
          'install_path' => 'D:\\Rizkia\\Project Software\\Greentify\\vendor\\composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'D:\\Rizkia\\Project Software\\Greentify\\vendor\\larastan\\larastan\\bootstrap.php' => '7ec7406cae3f706d3c160e03d7967840a5d9f98c',
    'phar://D:\\Rizkia\\Project Software\\Greentify\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute.php' => 'eaf9127f074e9c7ebc65043ec4050f9fed60c2bb',
    'phar://D:\\Rizkia\\Project Software\\Greentify\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => '0b4b78277eb6545955d2ce5e09bff28f1f8052c8',
    'phar://D:\\Rizkia\\Project Software\\Greentify\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => 'a3e6299b87ee5d407dae7651758edfa11a74cb11',
    'phar://D:\\Rizkia\\Project Software\\Greentify\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1b349aa997a834faeafe05fa21bc31cae22bf2e2',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'bcmath',
    7 => 'calendar',
    8 => 'ctype',
    9 => 'curl',
    10 => 'date',
    11 => 'dom',
    12 => 'exif',
    13 => 'fileinfo',
    14 => 'filter',
    15 => 'gd',
    16 => 'hash',
    17 => 'iconv',
    18 => 'intl',
    19 => 'json',
    20 => 'libxml',
    21 => 'mbstring',
    22 => 'mysqli',
    23 => 'mysqlnd',
    24 => 'openssl',
    25 => 'pcre',
    26 => 'pdo_mysql',
    27 => 'pdo_sqlite',
    28 => 'random',
    29 => 'readline',
    30 => 'session',
    31 => 'sqlite3',
    32 => 'standard',
    33 => 'tokenizer',
    34 => 'xml',
    35 => 'xmlreader',
    36 => 'xmlwriter',
    37 => 'xsl',
    38 => 'zip',
    39 => 'zlib',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '6',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AdController::getActiveAds() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
       'line' => 12,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AdController::trackClick() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
       'line' => 20,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::index() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Support\\Collection<(int|string), App\\Models\\Article>::loadCount().',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Support\\Collection<(int|string), App\\Models\\Article>::load().',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::create() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::store() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 64,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::show() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 93,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 93,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::edit() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 129,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 129,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::update() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 137,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 137,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::destroy() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 175,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 175,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleController::myArticles() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'line' => 189,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 189,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ArticleInteractionController::indexBookmarks() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AuthController::showLoginForm() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'line' => 11,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 11,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AuthController::login() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'line' => 16,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 16,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AuthController::showRegistrationForm() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AuthController::register() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\AuthController::logout() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'line' => 62,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 62,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\CommentController::store() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
       'line' => 12,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\CommentController::reply() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ContactFormController::showForm() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ContactFormController::store() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
       'line' => 15,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 15,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\NotificationController::index() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ProfileController::show() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
       'line' => 9,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 9,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ReportController::create() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ReportController::store() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'line' => 28,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 28,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ReportController::index() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\ReportController::review() has no return type specified.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'line' => 79,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 79,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Article::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Article>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Category> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Article::category() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Category> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Category, App\\Models\\Article>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Comment>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Article> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 32,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::article() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Article> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Article, App\\Models\\Comment>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Comment> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::parent() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Comment> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Comment, App\\Models\\Comment>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Donation::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Donation>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 33,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Membership::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Membership>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 32,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\MembershipTier> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Membership::tier() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\MembershipTier> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\MembershipTier, App\\Models\\Membership>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\AffiliateCategory> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Product::affiliateCategory() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\AffiliateCategory> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\AffiliateCategory, App\\Models\\Product>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Report::reporter() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Report>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 27,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Report::reportable() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\MorphTo does not specify its types: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Report::reviewedBy() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Report>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Generic type Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> in PHPDoc tag @return does not specify all template types of class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo: TRelatedModel, TChildModel',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'generics.lessTypes',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\SponsoredPost::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\SponsoredPost>.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\User::role() return type with generic class Illuminate\\Database\\Eloquent\\Casts\\Attribute does not specify its types: TGet, TSet',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
       'line' => 168,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 168,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ArticleBookmarked::via() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ArticleBookmarked::toDatabase() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ArticleLiked::via() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ArticleLiked::toDatabase() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\NewComment::via() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php',
       'line' => 20,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\NewComment::toDatabase() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ReportSubmitted::via() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php',
       'line' => 18,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 18,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\ReportSubmitted::toDatabase() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php',
       'line' => 23,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 23,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\UserFollowed::via() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php',
       'line' => 17,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 17,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Notifications\\UserFollowed::toDatabase() return type has no value type specified in iterable type array.',
       'file' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php',
       'line' => 22,
       'canBeIgnored' => true,
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 22,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'admin.dashboard',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'blogspot',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'articles.create',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'articles.show',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'articles.edit',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'articles.my-articles',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'bookmarks.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'auth.login',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'auth.register',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'contact',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'donation.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'marketplace.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'marketplace.show',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'membership.pricing',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'membership.status',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'newsletter.unsubscribe',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'notifications.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'profile.show',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'reports.create',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'reports.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'sponsored.index',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'sponsored.show',
       'filePath' => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php',
       'collectorType' => 'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector',
    )),
  ),
); },
	'dependencies' => array (
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php' => 
  array (
    'fileHash' => 'a73b7201736dd53f097a32fbd9dd678cec8c7afc',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php' => 
  array (
    'fileHash' => '21e9df6478beb2727d6ea498c5a0d1fce573f32d',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ApiAuthController.php' => 
  array (
    'fileHash' => '726ebac2c2ce760c8c8991cfae2c853115d78faa',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php' => 
  array (
    'fileHash' => '47e9a2f5163ec3e1b9d8fd1f7c374c2674016aff',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\CategoryController.php' => 
  array (
    'fileHash' => 'a1404d0ca09f7bb6b8b9f21eac6ea4d8156fbd41',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php' => 
  array (
    'fileHash' => 'b9830c2887c78a2f13aea0414d1301e7763a46f0',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php' => 
  array (
    'fileHash' => '637d37c44227bbe1e39036c9493cbcf1f0cdbe02',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php' => 
  array (
    'fileHash' => 'ee37220daec7a9e0df535b05b2db4373abeab4b1',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php' => 
  array (
    'fileHash' => '737e6a6883c10924fe8ef2eafd20578772e65391',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php' => 
  array (
    'fileHash' => '5e536757c824253977c1b44ed23dbcb88b473d5b',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => 'a33a5105f92c73a309c9f8a549905dcdf6dccbae',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ApiAuthController.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php',
      4 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\CategoryController.php',
      5 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
      6 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
      7 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
      8 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
      9 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
      10 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php',
      11 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\FollowController.php',
      12 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php',
      13 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
      14 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php',
      15 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php',
      16 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
      17 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
      18 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php' => 
  array (
    'fileHash' => '474a3e76f016e8097c0448b00c91505f7240c4e9',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\FollowController.php' => 
  array (
    'fileHash' => '3a874c2085738d4210fcdf83eda01ee6416c46db',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php' => 
  array (
    'fileHash' => 'b732ce406e35acbc3555b1dba9767cc40cde5484',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php' => 
  array (
    'fileHash' => '304155644280ce60c3230cd6cc3f1501f382442a',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php' => 
  array (
    'fileHash' => '085f4034ed4b1c0ff3658711d2a6e9cff2cea541',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    'fileHash' => 'b2a6229e9166c213af662d70432013685e1794e7',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    'fileHash' => '7177c915c56ea36a85d2396415463e3a7f0ef79c',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    'fileHash' => '85ea521a4af8f4becb7b50f2ffc884b83810228e',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php' => 
  array (
    'fileHash' => '474e686fd8faf01f23ab67cb621336f950dd0048',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckAdminRole.php' => 
  array (
    'fileHash' => '8b93442a0452208122b048e31d3094a3394bd8bf',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckMembershipAccess.php' => 
  array (
    'fileHash' => 'f4b81a92788fdf66db5e752f2d54babf1de3bf81',
    'dependentFiles' => 
    array (
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\ArticleResource.php' => 
  array (
    'fileHash' => '1e92d772ff33e2d079060416b1fcb94a46dc795b',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\CategoryResource.php' => 
  array (
    'fileHash' => '4e1765bcaed9440750c784600b1222c115420f36',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\CategoryController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Mail\\NewsletterEmail.php' => 
  array (
    'fileHash' => '48d9b3013b21309aa7e4cefb41522b088cd2eb65',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Ad.php' => 
  array (
    'fileHash' => '756df0afbf418ef683641c8800ad5ed0b4d4ca5e',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\AffiliateCategory.php' => 
  array (
    'fileHash' => 'e0ac72a968d05510fe4992260882df62264878da',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php' => 
  array (
    'fileHash' => 'e0cd2dfc2abd87d1eb4c8b597d27bbd1bd796958',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
      4 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
      5 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
      6 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
      7 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\ArticleResource.php',
      8 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Category.php',
      9 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
      10 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Category.php' => 
  array (
    'fileHash' => 'dd57835abe64e1cd705e53a4a4e600a8ced7ab50',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\CategoryController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\ArticleResource.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\CategoryResource.php',
      4 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php' => 
  array (
    'fileHash' => '9ca86acc16ec48b492c4bfe8f6da2f04f47851f2',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php' => 
  array (
    'fileHash' => '852bb8a9d90d84b2318c6f676618c19c739cce07',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php' => 
  array (
    'fileHash' => '2a80b512bd1299f88f4fbc21d094fc9a1d648920',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckMembershipAccess.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\MembershipTier.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\MembershipTier.php' => 
  array (
    'fileHash' => '76fa2ae07e967181032039d20af772cb877a92b7',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckMembershipAccess.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Pesan.php' => 
  array (
    'fileHash' => 'ff9f3d86e69c497631289594e6bd802201a746ae',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php' => 
  array (
    'fileHash' => '69b4f60ec990a8cd1a70c9d10097f4a06a066d4b',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\AffiliateCategory.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php' => 
  array (
    'fileHash' => '1a06d4c434024464c73583817152f5c0ed7190d1',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php' => 
  array (
    'fileHash' => '607194786986732fd6c0e822e8dd58e6f5ebf817',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Subscriber.php' => 
  array (
    'fileHash' => 'd615dc93f58900205689f3e45be9628d3f54eec5',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php' => 
  array (
    'fileHash' => 'eb472b614a36fa811bf77ed9e54afb39aaaf713a',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php',
      1 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ApiAuthController.php',
      2 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php',
      3 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
      4 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php',
      5 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
      6 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\FollowController.php',
      7 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php',
      8 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php',
      9 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php',
      10 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
      11 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckAdminRole.php',
      12 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckMembershipAccess.php',
      13 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\ArticleResource.php',
      14 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php',
      15 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php',
      16 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php',
      17 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php',
      18 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php',
      19 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php' => 
  array (
    'fileHash' => '615759e883e926e8d73e90fbd30aa1e102f4155e',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php' => 
  array (
    'fileHash' => '33f8fdfd1763ee4bd77f21c5789587522bbe1df9',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php' => 
  array (
    'fileHash' => '191b9bfdf966577692fa341fbb06c071d7e8edc9',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php' => 
  array (
    'fileHash' => '2b9633d5bb301b953af20fa675c02d57792a5b60',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php' => 
  array (
    'fileHash' => 'd74719c7d381bc51ff9f7f537564dac5f2c5e48d',
    'dependentFiles' => 
    array (
      0 => 'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\FollowController.php',
    ),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => '01bf9e5cf5bb666446625056b618445ae4749675',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AdController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getActiveAds',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get active ads for a specific position.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'ad' => 'App\\Models\\Ad',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'position',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'trackClick',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Track ad click.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'ad' => 'App\\Models\\Ad',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'ad',
               'type' => 'App\\Models\\Ad',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AdminDashboardController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AdminDashboardController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the admin dashboard.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'article' => 'App\\Models\\Article',
              'donation' => 'App\\Models\\Donation',
              'user' => 'App\\Models\\User',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ApiAuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\ApiAuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'login',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\ArticleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\ArticleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Public listing: published articles only, newest first.
     *
     * \'tags\' used to be eager-loaded here, but no such relation exists on
     * the model — every request died with RelationNotFoundException.
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'articleresource' => 'App\\Http\\Resources\\ArticleResource',
              'article' => 'App\\Models\\Article',
              'request' => 'Illuminate\\Http\\Request',
              'anonymousresourcecollection' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Single article, addressed by primary key — the documented API
     * contract is /api/articles/{id} while the model binds by slug, so we
     * resolve explicitly instead of relying on implicit binding.
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'articleresource' => 'App\\Http\\Resources\\ArticleResource',
              'article' => 'App\\Models\\Article',
              'request' => 'Illuminate\\Http\\Request',
              'anonymousresourcecollection' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\ArticleResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Api\\CategoryController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\CategoryController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display a listing of the resource.
     *
     * Only categories that actually have a published article — an empty
     * category is dead weight in a mobile client.
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'categoryresource' => 'App\\Http\\Resources\\CategoryResource',
              'category' => 'App\\Models\\Category',
              'anonymousresourcecollection' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Single category by primary key — the documented contract is
     * /api/categories/{id} while the model binds by slug, so resolve it
     * explicitly rather than through implicit binding.
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'categoryresource' => 'App\\Http\\Resources\\CategoryResource',
              'category' => 'App\\Models\\Category',
              'anonymousresourcecollection' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\CategoryResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'category',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ArticleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'myArticles',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ArticleInteractionController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ArticleInteractionController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggleLike',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggleBookmark',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'indexBookmarks',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showLoginForm',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'login',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showRegistrationForm',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\CommentController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'article',
               'type' => 'App\\Models\\Article',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reply',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ContactFormController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ContactFormController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showForm',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\DonationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\DonationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the donation page.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'donation' => 'App\\Models\\Donation',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'str' => 'Illuminate\\Support\\Str',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process a donation (mock payment).
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'donation' => 'App\\Models\\Donation',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'str' => 'Illuminate\\Support\\Str',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\FollowController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\FollowController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggleFollow',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MarketplaceController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\MarketplaceController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the green marketplace listing.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'affiliatecategory' => 'App\\Models\\AffiliateCategory',
              'product' => 'App\\Models\\Product',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display a single product detail.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'affiliatecategory' => 'App\\Models\\AffiliateCategory',
              'product' => 'App\\Models\\Product',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'product',
               'type' => 'App\\Models\\Product',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\MembershipController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\MembershipController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pricing',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display membership pricing page.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'membership' => 'App\\Models\\Membership',
              'membershiptier' => 'App\\Models\\MembershipTier',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'subscribe',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Subscribe the current user to a membership tier.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'membership' => 'App\\Models\\Membership',
              'membershiptier' => 'App\\Models\\MembershipTier',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tier',
               'type' => 'App\\Models\\MembershipTier',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'cancel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Cancel the current user\'s membership.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'membership' => 'App\\Models\\Membership',
              'membershiptier' => 'App\\Models\\MembershipTier',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'status',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the current user\'s membership status.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'membership' => 'App\\Models\\Membership',
              'membershiptier' => 'App\\Models\\MembershipTier',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NewsletterController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\NewsletterController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showUnsubscribeForm',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Show the newsletter unsubscribe page.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'newsletteremail' => 'App\\Mail\\NewsletterEmail',
              'subscriber' => 'App\\Models\\Subscriber',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'mail' => 'Illuminate\\Support\\Facades\\Mail',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'unsubscribe',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process unsubscribe request.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'newsletteremail' => 'App\\Mail\\NewsletterEmail',
              'subscriber' => 'App\\Models\\Subscriber',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'mail' => 'Illuminate\\Support\\Facades\\Mail',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'subscribe',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Subscribe an email address.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'newsletteremail' => 'App\\Mail\\NewsletterEmail',
              'subscriber' => 'App\\Models\\Subscriber',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'mail' => 'Illuminate\\Support\\Facades\\Mail',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'send',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Send a newsletter (admin action - simplified for demo).
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'newsletteremail' => 'App\\Mail\\NewsletterEmail',
              'subscriber' => 'App\\Models\\Subscriber',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'mail' => 'Illuminate\\Support\\Facades\\Mail',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\NotificationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAllAsRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ProfileController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ReportController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'review',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'report',
               'type' => 'App\\Models\\Report',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Controllers\\SponsoredPostController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\SponsoredPostController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display a listing of sponsored posts.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'sponsoredpost' => 'App\\Models\\SponsoredPost',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the specified sponsored post.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'sponsoredpost' => 'App\\Models\\SponsoredPost',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sponsoredPost',
               'type' => 'App\\Models\\SponsoredPost',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckAdminRole.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\CheckAdminRole',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming request.
     *
     * @param  \\Closure(\\Illuminate\\Http\\Request): (\\Symfony\\Component\\HttpFoundation\\Response)  $next
     */',
             'namespace' => 'App\\Http\\Middleware',
             'uses' => 
            array (
              'closure' => 'Closure',
              'request' => 'Illuminate\\Http\\Request',
              'response' => 'Symfony\\Component\\HttpFoundation\\Response',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Middleware\\CheckMembershipAccess.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\CheckMembershipAccess',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming request.
     *
     * @param  \\Closure(\\Illuminate\\Http\\Request): (\\Symfony\\Component\\HttpFoundation\\Response)  $next
     */',
             'namespace' => 'App\\Http\\Middleware',
             'uses' => 
            array (
              'closure' => 'Closure',
              'request' => 'Illuminate\\Http\\Request',
              'response' => 'Symfony\\Component\\HttpFoundation\\Response',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'minTier',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\ArticleResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\ArticleResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin \\App\\Models\\Article
 */',
         'namespace' => 'App\\Http\\Resources',
         'uses' => 
        array (
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources',
             'uses' => 
            array (
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Http\\Resources\\CategoryResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\CategoryResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin \\App\\Models\\Category
 */',
         'namespace' => 'App\\Http\\Resources',
         'uses' => 
        array (
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources',
             'uses' => 
            array (
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Mail\\NewsletterEmail.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Mail\\NewsletterEmail',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Mail\\Mailable',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
        1 => 'Illuminate\\Queue\\SerializesModels',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new message instance.
     */',
             'namespace' => 'App\\Mail',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'mailable' => 'Illuminate\\Mail\\Mailable',
              'content' => 'Illuminate\\Mail\\Mailables\\Content',
              'envelope' => 'Illuminate\\Mail\\Mailables\\Envelope',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subjectLine',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'unsubscribeUrl',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'envelope',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the message envelope.
     */',
             'namespace' => 'App\\Mail',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'mailable' => 'Illuminate\\Mail\\Mailable',
              'content' => 'Illuminate\\Mail\\Mailables\\Content',
              'envelope' => 'Illuminate\\Mail\\Mailables\\Envelope',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Mail\\Mailables\\Envelope',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'content',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the message content definition.
     */',
             'namespace' => 'App\\Mail',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'mailable' => 'Illuminate\\Mail\\Mailable',
              'content' => 'Illuminate\\Mail\\Mailables\\Content',
              'envelope' => 'Illuminate\\Mail\\Mailables\\Envelope',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Mail\\Mailables\\Content',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Ad.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Ad',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<Ad>  $query
     * @return Builder<Ad>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\AffiliateCategory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\AffiliateCategory',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'products',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Product>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Article.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Article',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'category',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\Category>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'comments',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Comment>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'likedBy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'bookmarkedBy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRouteKeyName',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Category.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Category',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'articles',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Article>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRouteKeyName',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Comment.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Comment',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'article',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\Article>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\Comment>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'replies',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Comment>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Donation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Donation',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCompleted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<Donation>  $query
     * @return Builder<Donation>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Membership.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Membership',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'tier',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\MembershipTier>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isExpired',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\MembershipTier.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\MembershipTier',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'memberships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Membership>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Pesan.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Pesan',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Product.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Product',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'affiliateCategory',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\AffiliateCategory>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Report.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Report',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reporter',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reportable',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reviewedBy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\SponsoredPost.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SponsoredPost',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopePublished',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<SponsoredPost>  $query
     * @return Builder<SponsoredPost>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\Subscriber.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Subscriber',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var array<int, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Laravel\\Sanctum\\HasApiTokens',
        1 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        2 => 'Illuminate\\Notifications\\Notifiable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ROLE_USER',
               'value' => '\'user\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ROLE_MODERATOR',
               'value' => '\'moderator\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ROLE_ADMIN',
               'value' => '\'admin\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'knownRoles',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Every role the application understands.
     *
     * @return list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isAdmin',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isModerator',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isStaff',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Admins and moderators both reach the staff-only surfaces.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasRole',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'articles',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Article>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'comments',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Comment>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'donations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Donation>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reports',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasMany<\\App\\Models\\Report>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'likes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\Article>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'bookmarks',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\Article>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'membership',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\HasOne<\\App\\Models\\Membership>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'following',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'followers',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return \\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany<\\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var array<int, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var array<int, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'role',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Coerce unknown roles to \'user\' so a bad write can never produce a
     * user that silently passes — or silently fails — every access gate.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'attribute' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleBookmarked.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Notifications\\ArticleBookmarked',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleTitle',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'bookmarkerId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'bookmarkerName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDatabase',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ArticleLiked.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Notifications\\ArticleLiked',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleTitle',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'likerId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'likerName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDatabase',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\NewComment.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Notifications\\NewComment',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'articleTitle',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'commenterId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'commenterName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'commentBody',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDatabase',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\ReportSubmitted.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Notifications\\ReportSubmitted',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reportId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reportableType',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reportableId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDatabase',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Notifications\\UserFollowed.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Notifications\\UserFollowed',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'followerId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'followerName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDatabase',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'D:\\Rizkia\\Project Software\\Greentify\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
