# bearsunday-spike

## 手順

1. プロジェクト作成。`composer create-project -n bear/skeleton MyVendor.MyProject` ... OK
2. コンパイル。`composer run compile` ... OK
3. InputQuery を使った[リソース](MyVendor.MyProject/src/Resource/Page/Index2.php)作成。
4. コンパイル。`composer run compile` ... NG
5. ライブラリアップデート（`bear/resource (1.26.0 => 1.26.1)`） `composer run compile` ... OK

## Error

```text
> ./vendor/bin/bear.compile 'MyVendor\MyProject' prod-app ./
............................................................
................................
PHP Fatal error:  Uncaught InvalidArgumentException: Required parameter "name" is missing and has no default value in /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php:393
Stack trace:
#0 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(376): Ray\InputQuery\InputQuery->getDefaultValueOrThrow(Object(ReflectionParameter), 'Required parame...')
#1 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(239): Ray\InputQuery\InputQuery->getDefaultValue(Object(ReflectionParameter))
#2 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(205): Ray\InputQuery\InputQuery->resolveBuiltinType(Object(ReflectionParameter), Array, Array, Object(ReflectionNamedType))
#3 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(143): Ray\InputQuery\InputQuery->resolveInputParameter(Object(ReflectionParameter), Array, Array)
#4 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(90): Ray\InputQuery\InputQuery->resolveParameter(Object(ReflectionParameter), Array)
#5 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(112): Ray\InputQuery\InputQuery->getArguments(Object(ReflectionMethod), Array)
#6 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/resource/src/InputParam.php(39): Ray\InputQuery\InputQuery->newInstance('MyVendor\\MyProj...', Array)
#7 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/resource/src/NamedParameter.php(28): BEAR\Resource\InputParam->__invoke('input', Array, Object(Ray\Compiler\CompileInjector))
#8 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileClassMetaInfo.php(71): BEAR\Resource\NamedParameter->getParameters(Array, Array)
#9 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileClassMetaInfo.php(42): BEAR\Package\Compiler\CompileClassMetaInfo->saveNamedParam(Object(BEAR\Resource\NamedParameter), Object(MyVendor\MyProject\Resource\Page\Index2), 'onGet')
#10 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileDiScripts.php(50): BEAR\Package\Compiler\CompileClassMetaInfo->__invoke(Object(Doctrine\Common\Annotations\PsrCachedReader), Object(BEAR\Resource\NamedParameter), 'MyVendor\\MyProj...')
#11 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileDiScripts.php(37): BEAR\Package\Compiler\CompileDiScripts->scanClass(Object(Doctrine\Common\Annotations\PsrCachedReader), Object(BEAR\Resource\NamedParameter), 'MyVendor\\MyProj...')
#12 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler.php(90): BEAR\Package\Compiler\CompileDiScripts->__invoke(Object(BEAR\AppMeta\Meta))
#13 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/bin/bear.compile.php(15): BEAR\Package\Compiler->compile()
#14 {main}
  thrown in /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php on line 393

Fatal error: Uncaught InvalidArgumentException: Required parameter "name" is missing and has no default value in /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php:393
Stack trace:
#0 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(376): Ray\InputQuery\InputQuery->getDefaultValueOrThrow(Object(ReflectionParameter), 'Required parame...')
#1 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(239): Ray\InputQuery\InputQuery->getDefaultValue(Object(ReflectionParameter))
#2 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(205): Ray\InputQuery\InputQuery->resolveBuiltinType(Object(ReflectionParameter), Array, Array, Object(ReflectionNamedType))
#3 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(143): Ray\InputQuery\InputQuery->resolveInputParameter(Object(ReflectionParameter), Array, Array)
#4 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(90): Ray\InputQuery\InputQuery->resolveParameter(Object(ReflectionParameter), Array)
#5 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php(112): Ray\InputQuery\InputQuery->getArguments(Object(ReflectionMethod), Array)
#6 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/resource/src/InputParam.php(39): Ray\InputQuery\InputQuery->newInstance('MyVendor\\MyProj...', Array)
#7 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/resource/src/NamedParameter.php(28): BEAR\Resource\InputParam->__invoke('input', Array, Object(Ray\Compiler\CompileInjector))
#8 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileClassMetaInfo.php(71): BEAR\Resource\NamedParameter->getParameters(Array, Array)
#9 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileClassMetaInfo.php(42): BEAR\Package\Compiler\CompileClassMetaInfo->saveNamedParam(Object(BEAR\Resource\NamedParameter), Object(MyVendor\MyProject\Resource\Page\Index2), 'onGet')
#10 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileDiScripts.php(50): BEAR\Package\Compiler\CompileClassMetaInfo->__invoke(Object(Doctrine\Common\Annotations\PsrCachedReader), Object(BEAR\Resource\NamedParameter), 'MyVendor\\MyProj...')
#11 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler/CompileDiScripts.php(37): BEAR\Package\Compiler\CompileDiScripts->scanClass(Object(Doctrine\Common\Annotations\PsrCachedReader), Object(BEAR\Resource\NamedParameter), 'MyVendor\\MyProj...')
#12 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Compiler.php(90): BEAR\Package\Compiler\CompileDiScripts->__invoke(Object(BEAR\AppMeta\Meta))
#13 /PATH/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/bin/bear.compile.php(15): BEAR\Package\Compiler->compile()
#14 {main}
  thrown in /PATH/bearsunday-spike/MyVendor.MyProject/vendor/ray/input-query/src/InputQuery.php on line 393
Compilation (2/2) took 0.020000 seconds and used 3.329000MB of memory
autoload.php: /PATH/bearsunday-spike/MyVendor.MyProject/autoload.php (overwritten)
Script ./vendor/bin/bear.compile 'MyVendor\MyProject' prod-app ./ handling the compile event returned with error code 255
```
